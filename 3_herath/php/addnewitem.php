
<?php
include 'connection.php';

if (count($_FILES) > 0) {
    if (is_uploaded_file($_FILES['image']['tmp_name'])) {
        $imgData = addslashes(file_get_contents($_FILES['image']['tmp_name']));
        
	if(isset($_POST['addnewitem'])){

		$itemname = $_POST['I_name'];
		$Manufacturer = $_POST['Manufacturer'];
		$colour = $_POST['colour'];
		$category = $_POST['category'];
		$description = $_POST['description'];
	 
		 // Insert record
		 $query = "INSERT INTO item (i_name, i_Manufacturer, i_colour, i_category, i_description, i_image ) values('".$itemname."' , '".$Manufacturer."' , '".$colour."' , '".$category."'  , '".$description."' , '".$imgData."')";
		 $result = mysqli_query($conn,$query);
	  

	  }
 
	}
}

    // if successfully insert data into database, displays message "Successful and redirect to a URL ". 
    if($result)  

    {		 
			echo "<script> alert('Successful'); window.location.href='../html/addnewitem.html'; </script>";
    }
	else
	{
			echo "<script> alert('Failed'); window.location.href='../html/addnewitem.html'; </script>";
	}
?>

