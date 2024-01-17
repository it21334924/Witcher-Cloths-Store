<?php
session_start();
$conn= mysqli_connect("localhost","root","","login");

if(isset($_POST['submit'])){
		$email=$_POST['email'];
		$password=$_POST['password'];
		
		$sql_query= mysqli_query($conn, "SELECT * FROM `details` WHERE email = '$email' AND password = '$password'") or die('query failed');
		
		if(mysqli_num_rows($sql_query) > 0){
		$row = mysqli_fetch_assoc($sql_query);
		$_SESSION['user_id'] = $row['id'];
		header('location:home.php');
   }else{
      echo "incorrect email or password!";
   }

	}
?>