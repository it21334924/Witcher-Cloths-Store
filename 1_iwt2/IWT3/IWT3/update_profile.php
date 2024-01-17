<?php

session_start();
$conn= mysqli_connect("localhost","root","","login");
$user_id = $_SESSION['user_id'];

if(isset($_POST['update'])){

   $update_name = mysqli_real_escape_string($conn, $_POST['update_name']);
   $update_email = mysqli_real_escape_string($conn, $_POST['update_email']);

   mysqli_query($conn, "UPDATE `details` SET name = '$update_name', email = '$update_email' WHERE id = '$user_id'") or die('query failed');

   $old_pass = $_POST['old_pass'];
   $update_pass = mysqli_real_escape_string($conn,($_POST['update_pass']));
   $new_pass = mysqli_real_escape_string($conn,($_POST['new_pass']));
   $confirm_pass = mysqli_real_escape_string($conn,($_POST['confirm_pass']));

   if(!empty($update_pass) || !empty($new_pass) || !empty($confirm_pass)){
      if($update_pass != $old_pass){
         $message[] = 'old password not matched!';
      }elseif($new_pass != $confirm_pass){
         $message[] = 'confirm password not matched!';
      }else{
         mysqli_query($conn, "UPDATE `details` SET password = '$confirm_pass' WHERE id = '$user_id'") or die('query failed');
         $message[] = 'password updated successfully!';
      }
   }

   $update_image = $_FILES['update_image']['name'];
   $update_image_tmp_name = $_FILES['update_image']['tmp_name'];
   $update_image_folder = 'uploaded_img/'.$update_image;

   if(!empty($update_image)){
         $image_update_query = mysqli_query($conn, "UPDATE `details` SET image = '$update_image' WHERE id = '$user_id'") or die('query failed');
         if($image_update_query){
            move_uploaded_file($update_image_tmp_name, $update_image_folder);
         }
		 echo "image updated succesfully";
   }

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>update profile</title>

   <!-- custom css file link  -->
   <link rel="stylesheet" href="styles/Styles.css">

</head>
<body>
   
<div>

   <?php
      $select = mysqli_query($conn, "SELECT * FROM `details` WHERE id = '$user_id'") or die('query failed');
      if(mysqli_num_rows($select) > 0){
         $fetch = mysqli_fetch_assoc($select);
      }
   ?>
   <div class="temp">
<center>
   <form action="" method="post" enctype="multipart/form-data">
      <?php
         if($fetch['image'] == ''){
            echo '<img src="images/default-avatar.png" style="width:50%">';
         }else{
            echo '<img src="uploaded_img/'.$fetch['image'].'" style="width:50%">';
         }
         if(isset($message)){
            foreach($message as $message){
               echo '<div class="message">'.$message.'</div>';
            }
         }
      ?>
	  </center>
      
         
            <span>username </span>
            <input type="text" name="update_name" value="<?php echo $fetch['name']; ?>" >
            <span>your email </span>
            <input type="email" name="update_email" value="<?php echo $fetch['email']; ?>">
            <span>update your pic :</span>
            <input type="file" name="update_image" accept="image/jpg, image/jpeg, image/png" >
         </br>
            <input type="hidden" name="old_pass" value="<?php echo $fetch['password']; ?>">
            <span>old password </span>
            <input type="password" name="update_pass" placeholder="enter previous password" >
            <span>new password </span>
            <input type="password" name="new_pass" placeholder="enter new password">
            <span>confirm password </span>
            <input type="password" name="confirm_pass" placeholder="confirm new password">
   
      </div>
      <input type="submit" value="update profile" name="update">
      <a href="home.php">go back</a>
   </form>

</div>

</body>
</html>