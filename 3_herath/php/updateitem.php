<!-- Created by H M S C HERATH IT21334924 -->

<?php
include "connection.php";


if(isset($_POST['updateitem'])){
	
	
	
	
	$I_id = mysqli_real_escape_string($con,$_POST['I_id']);
	
	

	
	
	$i_name = mysqli_real_escape_string($con,$_POST['I_name']);
	$i_colour = mysqli_real_escape_string($con,$_POST['colour']);
	$i_Manufacturer = mysqli_real_escape_string($con,$_POST['Manufacturer']);
	$i_category = mysqli_real_escape_string($con,$_POST['category']);
	$i_description = mysqli_real_escape_string($con,$_POST['description']);

	
	
	//select item id
	$query = mysqli_query($conn, "SELECT * FROM item WHERE I_id = '$I_id'");
	

	
	if(mysqli_num_rows($query) >0){
		
		$row = mysqli_fetch_row($query);
 
	
		//update password
		$update = "UPDATE item SET i_name = '$i_name', i_colour = '$i_colour', i_Manufacturer = '$i_Manufacturer', i_category = '$i_category', i_description = '$i_description' WHERE I_id = '$I_id'";
		$result = mysqli_query($conn,$update);
		
		if($result){
			
			echo "<script> alert('Updated Item Successfully '); window.location.href='admin.php'; </script>";
		
		}else{
			
			echo "<script> alert('Unsucessful'); window.location.href='../html/updateitem.html'; </script>";
		}
	
	
	}else{
		
		echo "<script> alert('Invalid Item'); window.location.href='../html/updateitem.html'; </script>";
	}
}
?>