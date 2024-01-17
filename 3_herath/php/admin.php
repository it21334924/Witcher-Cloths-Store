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

<style>
		.ul
		{ 	
			list-style-type:none;
			margin:0;
			padding:0;
			overflow:hidden;
			background-color: #333;
		}

		.li
		{
			float:left;
			padding-left:130px;
		}


		.li a
		{
			display:block;
			text-align:center;
			color:white;
			padding:14px 16px;
			text-decoration:none;
			font-family:Helvetica, sans-serif;
			font-size:19px;
		}


		.li a:hover
		{
			background-color:#111;
		}
		


</style>





</head>

<body>
<body style="background-image:url(../images/backgii.jpg); ">
	
<center><a href="http://localhost/1_iwt2/index.html"><img src="../images/logo4.png" height="30%"></a></center>

		

<!--start of navi bar::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::-->
		
<br><br>
	<ul class="ul">
		<li class="li">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</li>
		<li class="li"><a href="http://localhost/1_iwt2/index.html">Home</a></li>
		<li class="li"><a href="#">Men</a></li>
		<li class="li"><a href="http://localhost/3_herath/php/accessories.php">Accessories</a></li>
		<li class="li"><a href="http://localhost/3_herath/php/women.php">Women</a></li>
		<li class="li"><a href="http://localhost/3_herath/php/kids.php">Kids</a></li>

	</ul>
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
					$sql = "SELECT * FROM item where i_category = 'MEN'";
					$result = $conn->query($sql);
					
					if ($result->num_rows > 0) {
					// output data of each row
					while($row = $result->fetch_assoc()) {		
	                    $I_id = $row["I_id"];					
						echo '<img src = "data:image;base64,'.base64_encode($row['i_image']).'" class = "b_img" ><br><br>';
						echo "Name: " . $row["i_name"]."<br>".
						"Colour: " . $row["i_colour"]. "<br>".
						"Description:" . $row["i_description"]."<br>".
						"Manufacturer:" . $row["i_Manufacturer"]."<br>".
						"Category:" . $row["i_category"]."<br>";
						
						//delete the current item
						echo "<a href = 'delete.php?I_id=$I_id'>" ."<img src = '../images/rejected.jpg' style='width:100px;height:100px'; class='icon' >" ."</a>";
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
