<!DOCTYPE html>
<html>
<head>
	<title>Home</title>
</head>
<body>
	<h1>Page 1 [Home]</h1>
	<h2>Digital Wallet</h2>
	<?php echo "1.<a href='https://localhost/digital_wallet/homepage.php'>Home</a>  2.<a href='https://localhost/digital_wallet/transection-history.php'>Transaction History</a>" ; ?>
	
    <h2>Fund Transfer</h2>

	<?php

    define("filepath", "user.json");

    $trnc_type = $phone = $amount = "";

	$trnc_typeErr = $phoneErr = $amountErr = "";

	$successMessage = $errMessage ="";
	$flag = false;
	
	   if($_SERVER['REQUEST_METHOD'] === "POST") 
	   	{ 
          $religion = $_POST['trnc_type'];
          $phone = $_POST['phone'];
          $phone = $_POST['amount'];

           

	      if(empty($_POST['trnc_type']))
	      {
            $trnc_typeErr = "Please select an option!";
            $flag = true;
	      }

          if(empty($_POST['phone']))
	      {
            $phoneErr = "Please input valid phone number!";
            $flag = true;
	      }

	      if(empty($_POST['amount']))
	      {
            $amountErr = "Please input valid amount!";
            $flag = true;
	      }



	      if(!$flag)
	      {
	      	$trnc_type = test_input($trnc_type);
	      	$phone = test_input($phone);
	      	$amount = test_input($amount);

            $data = array("Trnsaction_Type"=>$trnc_type, "Phone"=>$phone, "Amount"=>$amount);
	      	$data_encode = json_encode($data);
	      	$result1 = write($data_encode);
            if($result1)
            {
               $successMessage = "Transaction Successfull!";
            }


            
	      }

	      else
	      {
	      	$errMessage = "Transaction Unuccessfull!";
	      }

	    }

     function write($content)
     {
           $resource = fopen(filepath, "a");
           $fw = fwrite($resource, $content."\n");
           fclose($resource);
           return$fw;
     }
	     
     function test_input($data)
     {
     	$data = trim($data);
     	$data = stripslashes($data);
     	$data = htmlspecialchars($data);
     		return $data;
     }

	 
	?>

	<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF'])?>" method="POST">

	   <label for="trnc_type">Select Category: </label>
	   <select name = "trnc_type" id="trnc_type">
	  	<option value = "mobile_recharge">Mobile Recharge</option>
	  	<option value = "send_money">Send Money</option>
	  	<option value = "marchent_pay">Marchent Pay</option>
	   <span style="color: red;"><?php echo $trnc_typeErr; ?></span>
	   </select>

       <br><br>
	   <label for="phone">To: </label>
	   <input type="phone" id="phone" name="phone" value="<?php echo $phone;?>" >
	   <span style="color: red;"><?php echo $phoneErr; ?></span>
	   <br> <br>

	   <label for="amount">Amonut: </label>
	   <input type="number" id="amount" name="amount" value="<?php echo $amount;?>" >
	   <span style="color: red;"><?php echo $amountErr; ?></span>

	   <br>
      
	   <br>

	   </fieldset>
	   <br> 
	   <input class="submit" type="submit" value="Submit">
	   <span style="color: green;"><?php echo $successMessage; ?></span>
       <span style="color: red;"><?php echo $errMessage; ?></span>

	     
</form>




</body>	
</html>
