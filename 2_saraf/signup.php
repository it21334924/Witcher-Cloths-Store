<?php

$servername="localhost";
$username="root";
$password="";
$database_name="login";

$conn=new mysqli($servername,$username,$password,$database_name);

if($conn->connect_error){
	die("Connection Failed :".$conn->connect_error);
	
	
	}if(isset($_POST['submit'])){
		$name=$_POST['name'];
		$email=$_POST['email'];
		$password=$_POST['password'];
		$image = $_FILES['image']['name'];
		$image_tmp_name = $_FILES['image']['tmp_name'];
		$image_folder = 'uploaded_img/'.$image;
	}
		$sql_query= "INSERT INTO details(name,email,password,image) VALUES('$name','$email','$password','$image')";

if($conn-> query ($sql_query)==TRUE){
		echo "Entry Success!!!!";
		 if($sql_query){
            move_uploaded_file($image_tmp_name, $image_folder);
            header('location:login.html');
         }
		 else{
            echo "registeration failed!";
         }
}
else{
	echo "Error".$sql_query.$conn->error;
}
$conn->close();

?>