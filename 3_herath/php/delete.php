
<?php
//Created by Sahan Herath IT21334924
include "connection.php"; 

$Iid = $_GET['I_id'];



$delete = "DELETE FROM item WHERE I_id = '$Iid'";
$del = mysqli_query($conn,$delete); // delete query


if($del)
{
    mysqli_close($conn); // Close connection
    header("location:admin.php"); // redirect to admin page
    exit;	
}
else
{
    echo "Error deleting record"; // display error message if not delete
}
?>

