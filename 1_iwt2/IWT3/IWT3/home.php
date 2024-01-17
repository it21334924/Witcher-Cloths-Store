<?php

session_start();
$conn= mysqli_connect("localhost","root","","login");
$user_id = $_SESSION['user_id'];

if(!isset($user_id)){
   header('location:login.html');
};

if(isset($_GET['logout'])){
   unset($user_id);
   session_destroy();
   header('location:login.html');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>home</title>

    <!-- custom css file link  -->
    <link rel="stylesheet" href="styles/home.css">

</head>
<body >

<div class="card">
<h2>user profile</h2>
      <?php
         $sql_query = mysqli_query($conn, "SELECT * FROM `details` WHERE id = '$user_id'") or die('query failed');
         if(mysqli_num_rows($sql_query) > 0){
            $fetch = mysqli_fetch_assoc($sql_query);
         }
         if($fetch['image'] == ''){
            echo '<img src="images/default-avatar.png" style="width:100%">';
         }else{
            echo '<img src="uploaded_img/'.$fetch['image'].'" style="width:100%" >';
         }
      ?>
      <h1><?php echo $fetch['name']; ?></h1>
      <a href="update_profile.php" ><button>update profile</button></br></a>
      <a href="home.php?logout=<?php echo $user_id; ?>" class=""><button>logout</button></a>
      <p>new <a href="login.html" class="">login</a> or <a href="signup.html" class="add">register</a></p>
	
</div>
</center>

</body>
</html>


