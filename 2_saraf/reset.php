<?php
session_start();
$conn= mysqli_connect("localhost","root","","login");
if($conn->connect_error){
	die("Connection Failed :".$conn->conn_error);
}

if(isset($_POST['submit'])){
		$email = $_POST['email'];
		$password=$_POST['password'];
		$sql = "UPDATE `details` SET password='$password' WHERE email='$email'";
		if($conn-> query ($sql)==TRUE){
			echo "Update Success!!!!";
			 if($sql){
				header('location:login.html');
			 }
			 
			else{
			"Failed " .$conn->error;
			}
		
			$conn->close();
		}
	}
?>



