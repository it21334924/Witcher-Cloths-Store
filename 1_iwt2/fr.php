<?php

$servername="localhost";
$username="root";
$password="";
$database_name="payment";

$conn=new mysqli($servername,$username,$password,$database_name);

if($conn->connect_error){
	die("Connection Failed :".$conn->connect_error);
	
	
	}if(isset($_POST['submit'])){
		$name=$_POST['name'];
		$address=$_POST['address'];
		$country=$_POST['country'];
		$email = $_POST['email'];
		$name_card = $_POST['name_card'];
		$cnum = $_POST['cnum'];
		$expiry = $_POST['expiry'];
		$cvv = $_POST['cvv'];
		
	}
		$sql_query= "INSERT INTO form(name,address,country,email,name_c,numberc,expiry,cvv) VALUES('$name','$address','$country','$email',$name_card,$cnum,$expiry,$cvv)";

if($conn-> query ($sql_query)==TRUE){
		echo "Entry Success!!!!";
}
else{
	echo "Error".$sql_query.$conn->error;
}
$conn->close();

?>
