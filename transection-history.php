<?php 

     require 'db-read.php';
     session_start();
     $showDate = date("Y.m.d");
     $_SESSION['storeDate'] = $showDate;

     $successMessage = $errMessage = "";
     $showDate = empty($_GET['showDate']) ? "" : $_GET['showDate'];
     if(empty($_GET['search']) or empty($showDate))
     {
     	$translist = getalltrans();
     }
     else
     {
     	$translist = gettrans();
     }
?>


<!DOCTYPE html>
<html>
<head>
	<title>Home</title>

	<style>
		table, th, tr, td
		{
			border: 1px solid black;
		}
	</style>
</head>
<body>
	<h1>Page 2 [Transaction History]</h1>
	<h2>Digital Wallet</h2>
	<?php echo "1.<a href='https://localhost/interactive-digital-wallet/homepage.php'>Home</a>  2.<a href='https://localhost/interactive-digital-wallet/transection-history.php'>Transaction History</a>" ; ?>

	<form action="<?php echo $_SERVER['PHP_SELF']; ?>" METHOD="GET">
	<input type="text" name="$showDate" value="<?php $showDate; ?>">
	<input type="submit" name="search" value="Search">
	</form>
	
    <h2>Total Records:</h2>
    
    <?php

 if(count($translist) > 0)
 {
	echo"<table>";
	echo "<tr>";
	echo "<th>Transection Type</th>";
	echo "<th>Phone</th>";
	echo "<th>Amount</th>";
	echo "<th>Time</th>";
	echo "</tr>";
	    for($i = 0; $i < count($translist); $i++)
	    {
	    	echo "<tr>";
	        echo "<td>". $translist[$i]["trnc_type"]."</td>";
	        echo "<td>". $translist[$i]["phone"]."</td>";
	        echo "<td>". $translist[$i]["amount"]."</td>";
	        echo "<td>". $translist[$i]["showDate"]."</td>";
	        echo "</tr>";

	    }
	    echo "</table>";
	}

	else 
	{
		echo "<h3> No records found! </h3>";

	}

	?>


</body>
</html>    