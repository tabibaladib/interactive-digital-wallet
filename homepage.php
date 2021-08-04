<!DOCTYPE html>
<html>
<head>
	<title>Home</title>
</head>
<body>
	<h1>Page 1 [Home]</h1>
	<h2>Digital Wallet</h2>
	<?php echo "1.<a href='https://localhost/interactive-digital-wallet/homepage.php'>Home</a>  2.<a href='https://localhost/interactive-digital-wallet/transection-history.php'>Transaction History</a>" ; ?>
	
    <h2>Fund Transfer</h2>

	<?php

   require 'db-insert.php';


    $trnc_type = $phone = $amount = "";

	$trnc_typeErr = $phoneErr = $amountErr = "";

	$successMessage = $errMessage ="";
	$isValid = true;
	
	   if($_SERVER['REQUEST_METHOD'] === "POST") 
	   	{ 
          $trnc_type = $_POST['trnc_type'];
          $phone = $_POST['phone'];
          $amount = $_POST['amount'];

           

	      if(empty($_POST['trnc_type']))
	      {
            $trnc_typeErr = "Please select an option!";
            $isValid = false;
	      }

          if(empty($_POST['phone']))
	      {
            $phoneErr = "Please input valid phone number!";
            $isValid = false;
	      }

	      if(empty($_POST['amount']))
	      {
            $amountErr = "Please input valid amount!";
            $isValid = false;
	      }



	      if($isValid)
	      {
	      	$trnc_type = test_input($trnc_type);
	      	$phone = test_input($phone);
	      	$amount = test_input($amount);

	      	$response = transection($trnc_type, $phone, $amount);

            if($response)
            {
               $successMessage = "Transaction Successfull!";
            }


            
	      }

	      else
	      {
	      	$errMessage = "Transaction Unuccessfull!";
	      }

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
	   	<option value="none" selected disabled hidden>Select 
         </option>
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

<script>
	function isValid() 
	{
		var flag = true;

		var trnc_typeErr = document.getElementById("trnc_typeErr");
		var phoneErr = document.getElementById("phoneErr");
		var amountErr = document.getElementById("genderErr");


		var trnc_type = document.forms["regform"]["trnc_type"].value;
		var phone = document.forms["regform"]["phone"].value;
		var amount = document.forms["regform"]["amount"].value;

		trnc_typeErr.innerHTML = "";
		phoneErr.innerHTML = "";
		amountErr.innerHTML = "";


		if(trnc_type === "")
		{
			flag = false;
			document.getElementById("trnc_typeErr").innerHTML = "Transection Type must be selected!";
		}

		if(phone === "")
		{
			flag = false;
			document.getElementById("phoneErr").innerHTML = "Phone can't be empty!";
		}

		if(amount === "")
		{
			flag = false;
			document.getElementById("amountErr").innerHTML = "Amount can't be empty!";
		}

	
		return flag;

	}
	
</script>

</body>	
</html>
