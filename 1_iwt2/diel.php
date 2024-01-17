<?php
include 'newph.php';


$serv="localhost";
$usern="root";
$pass="";
$dbn="payHub";

$conni=new mysqli($serv,$usern,$pass,$dbn);

if($conni->connect_error)
{
	echo "connection failed"."$Conni->connect_error";
	
}

else 
{
	echo "connection sucess";
}




if(isset($_POST['de_row']))
{
	$delq="DELETE FROM payerdetails where id='$delid'";
	if($con->query($delq)===TRUE)
	{
		echo '<script>alert("row affected successfully")</script>';
		
		
	}
	
	
}
else 
{
	
	echo '<script>alert("no row afftected")</script>';
}



?>