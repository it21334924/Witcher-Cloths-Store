<?php
$server="localhost";
$username="root";
$password="";
$db="payHub";

$con=new mysqli($server,$username,$password,$db);

if($con->connect_error)
{
	die("non success".$con->connect_error);
	
	
}

	$read="SELECT * FROM payerdetails ORDER BY id DESC LIMIT 1";
	$row=$con->query($read);
	$aim=$row->fetch_assoc();
	$delid="$aim[id]";
	echo "$delid"."<br>";
	$delq="DELETE FROM payerdetails WHERE `payerdetails`.`id` = '$delid'";
	if($con->query($delq)===TRUE)
	{
		header("Location:payment.php");
		echo '<script>alert("row affected successfully")</script>';
		exit;
		
		
		
	}
	
	
	

else 
{
	
	echo "no change";
}

		
?>


	