<!-- Created by Sahan Herath IT21334924 -->
<?php
$I_id = $_GET['I_id'];
?>
<!DOCTYPE html>
<html>
	<head>
		<title>WitcherCloths</title>
		<link rel="stylesheet" href="../styles/storestyle.css">

		<!--link register style sheet!-->
		<link rel="stylesheet" href="../styles/addnewitem.css" />
		<meta name="viewpoint" content="width=device-width, intial-scale=1.0">
	</head>
	

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
			<a href="../php/admin.php" class="navig">MEN</a>
		</div>
		<div style="padding-top:40px; padding-left:110px; display:INLINE;">
			<a href="../php/women.php" class="navig">WOMEN</a>
		</div>
		<div style="padding-top:40px; padding-left:130px; display:INLINE;">
			<a href="../html/index.html" class="navig">HOME</a>
		</div>
		<div style="padding-top:40px; padding-left:110px; display:INLINE;">
			<a href="../php/accessories.php" class="navig">ACCESSORIES</a>
		</div>
		<div style="padding-top:40px; padding-left:110px; display:INLINE;">
			<a href="../php/kids.php" class="navig">KIDS</a>
		</div>
		</div>


		
<!--go back!-->
<img src="../images/back2.png" class="backImg" onclick="location.href = '../php/admin.php';">
<input type="button" value="Go back" class="back" onclick="location.href = '../php/admin.php';">


<br><br><br><br>



<script>
var loadFile = function(event) {
	var image = document.getElementById('output');
	image.src = URL.createObjectURL(event.target.files[0]);
};
</script>

<div class="div_form">

	

	<!--heading!-->
	<h1 class="header1">UPDATE ITEM</h1><br><br>

	<!--form!-->
	<form method="POST" action="../php/updateitem.php">
	
	<!--image!-->
	<p><input type="file"  accept="image/*" name="file" id ="file" onchange="loadFile(event)" style="display: none;"></p>
	<p><img id="output" width="200"/></p>
	<p style="color:black"><label for="file" class = "upload">Upload Image</label></p><br>
	

	<!--name!-->
	<label class="label" for = "I_name">Item Name</label><br><br>
	<input type = "text" id = "I_name" name = "I_name" placeholder="Item name..." required><br><br>

	<!--Manufacturer!-->
	<label class="label" for = "Manufacturer">Manufacturer</label><br><br>
	<input type = "text" id = "Manufacturer" name = "Manufacturer" placeholder="Manufacturer..." required><br><br>


	<!--colour!-->
	<label class="label" for = "colour">Colour</label><br><br>
	<input type = "text" id = "colour" name = "colour" placeholder="Colour..." required><br><br>
	
	<!--Category!-->
	<label class="label" for="category">Category</label><br><br>
	<select name = "category" id="category">
	<option value="Men">Select</option>
	  <option value="Men">Men</option>
	  <option value="Woman">Woman</option>
	  <option value="Kids">Kids</option>
	  <option value="Accessories">Accessories</option>
	  
	</select><br><br>
	
	<!--Description!-->
	<label class="label" for = "description">Description</label><br><br>
	<textarea id="description" name="description" rows="50" cols="50" placeholder="Description..."></textarea><br><br>


<input type = "hidden" id = "I_id" name = "I_id" placeholder="<?php echo $I_id;?>" value="<?php echo $I_id;?>">
	
	<button type="submit" class="updateitem" name="updateitem">Update Item</button>

	</form>
</div>
<br><br><br><br>

<hr style="border:5px solid white; border-radius:8px; background-color:white; width:1500px;"><br><br>


		
	</body>
</html>