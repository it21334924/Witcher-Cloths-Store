<?php
session_start();
$conn= mysqli_connect("localhost","root","","login");

if(isset($_POST['submit'])){
		$email=$_POST['email'];
		$password=$_POST['password'];
		
		$sql_query= mysqli_query($conn, "SELECT * FROM `details` WHERE email = '$email' AND password = '$password'") or die('query failed');
		
		$row = mysqli_fetch_array($sql_query);

		if($row["email"]=="admin@gmail.com"){
			header('location:http://localhost/3_herath/html/admin.html');
		}
		else if($row["email"]!="admin@gmail.com"){
		$_SESSION['user_id'] = $row['id'];
		header('location:home.php');
  		 }	
  		else {
      	echo "incorrect email or password!";
  		 }

	}
?>