<?php
// error_reporting returns the old error code
$old_error_reporting = error_reporting(0);

include('connection.php');

//select lists
$tab1_item = mysqli_query($conn,"SELECT * FROM item WHERE i_category = 'Men'");


    

    // reset error_reporting to its old value
    error_reporting($old_error_reporting);
?>


<html>

<!-- Created by Sahan Herath IT21334924 -->
<head>
		<title>WitcherCloths</title>
		<link rel="stylesheet" href="../styles/storestyle.css">

		<!--link register style sheet!-->
		<link rel="stylesheet" href="../styles/addnewitem.css" />

		<!-- styles admin  -->
		<link rel="stylesheet" href="../styles/styles_admin.css">	
</head>

<body>
<body style="background-image:url(../images/backgii.jpg); ">	
		<div>
		<img class="logo" src="../images/logo4.png" alt="mainlogo" height=11% width=11%>

		<a href="#"><img class="left" src="../images/users.png" height=6% width=6%></a>
		
		<hr class="lefti" style="height:40px;  border:3px solid white; border-radius:6px; background-color:white; display:inline; "  >
		<a href="#"><img class="left" src="../images/cart.png" height=6% width=6%></a>
		<hr class="lefti" style="height:40px;  border:3px solid white; border-radius:6px; background-color:white; display:inline; "  >	
		<a href="#"><img class="left" src="../images/search.png" height=6% width=6%></a>	
		
		</div>
		
<div class="leftii">
<input type=text  style="padding-top:5px; padding-bottom:5px; border:5px solid white; border-radius:30px; background-color:white; padding-left:30px;" value="SEARCH HERE...">
</div>
		<div style="padding-top:95px;">
		<hr style="border:5px solid white; border-radius:8px; background-color:white; width:1500px;">
		</div>
				
<!--start of navi bar::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::-->
		
<br><br>
<div style="display:block;border:15px solid #5A5858; padding-top:0px; border-radius:13px; background-color:#5A5858; opacity:100%">
		<div style="padding-top:40px; padding-left:300px; display:INLINE	; ">
			<a onclick="location.href = '../php/admin.php'" class="navig">MEN</a>
		</div>
		<div style="padding-top:40px; padding-left:110px; display:INLINE;">
			<a href="women.php" class="navig">WOMEN</a>
		</div>
		<div style="padding-top:40px; padding-left:130px; display:INLINE;">
			<a href="../html/index.html" class="navig">HOME</a>
		</div>
		<div style="padding-top:40px; padding-left:110px; display:INLINE;">
			<a href="accessories.php" class="navig">ACCESSORIES</a>
		</div>
		<div style="padding-top:40px; padding-left:110px; display:INLINE;">
			<a href="kids.php" class="navig">KIDS</a>
		</div>
</div>
	<!-- js -->
	<script src="../js/admin.js"></script>
	
	<br><br><br>

<!-- left main menu -->
<div class = "lmenu">
	<img src = "../images/admin.png" alt = "Profile">
	<p>Admin</p>

	<form class = "lmenu_form">
		<!--btn -->
		<a href='../html/addnewitem.html' class = "addbtn" id = "Bookbtn" >Add Item</a>			
		<br>
		
		<a href="home.php" class = "logoutbtn" >Logout</a>
	</form>
</div>

<!--tabs items-->
<div class = "tabs" id = "tab_1"  >
		<input checked = "checked" id = "tab1" type = "radio" name = "tab">
		<nav>
			<ul>
				<li class  = "tab1">
					<label for = "tab1">Cloths</label>
				</li>				
			</ul>
		</nav>
		
		<section>
			<!--tab 1-->
			<div class = "tab1">
				<h2>Items</h2>
				
				<!-- display list of items -->
				<?php					
					$sql = "SELECT * FROM item where i_category = 'Kids'";
					$result = $conn->query($sql);
					
					if ($result->num_rows > 0) {
					// output data of each row
					while($row = $result->fetch_assoc()) {		
	$I_id = $row["I_id"];					
						echo '<img src = "data:image;base64,'.base64_encode($row['i_image']).'" class = "b_img" ><br>';
						echo "Name: " . $row["i_name"]."<br>".
						"Colour: " . $row["i_colour"]. "<br>".
						"Description:" . $row["i_description"]."<br>".
						"Manufacturer:" . $row["i_Manufacturer"]."<br>".
						"Category:" . $row["i_category"]."<br>";
						
						//delete the current item
						echo "<a href = 'delete.php?I_id=$I_id'>" ."<img src = '../images/rejected.jpg' style='width:100px;height:100px'; class = 'icon' >" ."</a>";
						//update the current item
						echo "<a href = 'updateitemform.php?I_id=$I_id'>" ."<img src = '../images/update.jpg' style='width:100px;height:100px'; class = 'icon' >" ."</a>";
						echo "<br><br><br><br><br>";
					};
					} else {
				echo "0 results";
				}

				?>
				
			</div>					
		</section>
</div>

<br>
</body>

</html>
<?php 
mysqli_close($conn);
?>
