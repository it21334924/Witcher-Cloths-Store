<?php
    session_start();
    $db_name = "shopping";
    $connection = mysqli_connect("localhost","root","",$db_name);

    if(isset($_POST["add"]))
	{
        if(isset($_SESSION["shopping_cart"])){
            $item_array_id = array_column($_SESSION["shopping_cart"],"product_id");
            if(!in_array($_GET["id"],$item_array_id)){
                $count = count($_SESSION["shopping_cart"]);
                $item_array = array(
                    'product_id' => $_GET["id"],
                    'product_name' => $_POST["hidden_name"],
                    'product_price' => $_POST["hidden_price"],
                    'product_quantity' => $_POST["quantity"],
                );
                $_SESSION["shopping_cart"][$count] = $item_array;
                echo '<script>window.location="index.php"</script>';
            }else{
                echo '<script>alert("Product is already in  the cart")</script>';
                echo '<script>window.location="index.php"</script>';
            }
        }
		else{
            $item_array = array(
                'product_id' => $_GET["id"],
                'product_name' => $_POST["hidden_name"],
                'product_price' => $_POST["hidden_price"],
                'product_quantity' => $_POST["quantity"],
            );
            $_SESSION["shopping_cart"][0] = $item_array;
        }
    }

    if(isset($_GET["action"])){
        if($_GET["action"] == "delete"){
            foreach($_SESSION["shopping_cart"] as $keys => $value){
                if($value["product_id"] == $_GET["id"]){
                    unset($_SESSION["shopping_cart"][$keys]);
                    echo '<script>alert("Product has been removed")</script>';
                    echo '<script>window.location="index.php"</script>';
                }
            }
        }
    }
?>

<!DOCTYPE html>
<html>
	<head>
		<title>WitcherCloths</title>
		<link rel="stylesheet" href="styles/storestyle.css">
		<style>
		
				ul
		{ 	
			list-style-type:none;
			margin:0;
			padding:0;
			overflow:hidden;
			background-color: #333;
		}

		li
		{
			float:left;
			padding-left:100px;
		}


		li a
		{
			display:block;
			text-align:center;
			color:white;
			padding:14px 16px;
			text-decoration:none;
			font-family:Helvetica, sans-serif;
			font-size:19px;
		}


		li a:hover
		{
			background-color:#111;
		}
		
		
		
		</style>
		
		
		
	</head>
	

	<body style="background-image:url(images/backgii.jpg); ">
		
		<div>
		<a href="http://localhost/1_iwt2/index.html"><img class="logo" src="images/logo4.png" alt="mainlogo" height=11% width=11%></a>
	

		<a href="http://localhost/2_saraf/login.html"><img class="left" src="images/users.png" height=6% width=6%></a>
		
		<hr class="lefti" style="height:40px;  border:3px solid white; border-radius:6px; background-color:white; display:inline; "  >
		<a href="#"><img class="left" src="images/cart.png" height=6% width=6%></a>
		<hr class="lefti" style="height:40px;  border:3px solid white; border-radius:6px; background-color:white; display:inline; "  >	
		<a href="#"><img class="left" src="images/search.png" height=6% width=6%></a>	
		
		
		</div>
<div class="leftii">
<input type=text  style="padding-top:5px; padding-bottom:5px; border:5px solid white; border-radius:30px; background-color:white; padding-left:30px;" value="SEARCH HERE...">
</div>


		<div style="padding-top:95px;">
		<hr style="border:5px solid white; border-radius:8px; background-color:white; width:1500px;">
		</div>
		
		
<!--start of navi bar::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::::-->
		
<br><br>
	<ul>
<center>
		<li>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</li>
		<li><a href="http://localhost/1_iwt2/index.html">Home</a></li>
		<li><a href="http://localhost/aman/index.php">Men</a></li>
		<li><a href="http://localhost/4_deni/accessories.html">Accessories</a></li>
		<li><a href="http://localhost/4_deni/women.html">Women</a></li>
		<li><a href="http://localhost/4_deni/kids.html">Kids</a></li>
		<li><a href="">About Us</a></li>
</center>
	</ul>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopping Cart</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
    <style>
        .product{
            border: 1px solid #eaeaec;
            margin: 2px 2px 8px 2px;
            padding: 10px;
            text-align: center;
            background-color: #efefef;
        }
        table,th,tr{
              text-align: center;
        }
        .title2{
            text-align: center;
            color: #66afe9;
            background-color: #efefef;
            padding: 2%;
        }
        h2{
            text-align: center;
            color: #66afe9;
            background-color: #efefef;
            padding: 2%;
        }
        table th{
            background-color: #efefef;
        }
    </style>
</head>
<body>
    <div class="container" style="width: 65%">
    <br></br>
        <h2>MEN'S SHIRTS</h2>
        <br></br>
        <?php
            $query = "select * from product order by id asc";
            $result = mysqli_query($connection,$query);
            if(mysqli_num_rows($result)>0){
                while($row = mysqli_fetch_array($result)){
                    ?>
                    <div class="col-md-3" style="float: left;">
                        <form method="post" action="index.php?action=add&id=<?php echo $row["id"];?>">
                            <div class="product">
                                <img src="<?php echo $row["image"];?>" width="190px" height="200px" class="img-responsive">
                                <h5 class="text-info"><?php echo $row["description"];?></h5>
                                <h5> LKR </h5>
                                <h5 class="text-danger"  ><?php echo $row["price"];?></h5>
                                <h5>quantity</h5>
                                <input type="text" name="quantity" class="form-control" value="1">
                                <input type="hidden" name="hidden_name" value="<?php echo $row["description"];?>">
                                <input type="hidden" name="hidden_price" value="<?php echo $row["price"];?>">
                                <input type="submit" name="add" style="margin-top: 5px;" class="btn btn-success" value="Add to cart">
                                <input type="submit" style="margin-top: 5px;" class="btn btn-success" value="Check Out">
                            </div>
                        </form>
                    </div>
        <?php
                }
            }
        ?>

        <div style="clear: both"></div>
        <br></br>
        <h3 class="title2">Shopping Cart Details</h3>
     
        <div class="table-responsive">
            <table class="table table-bordered" style="background-color:OldLace;" >
            <tr>
                <th width="30%">Product Description</th>
                <th width="10%">Quantity</th>
                <th width="13%">Price Details</th>
                <th width="10%">Total Price</th>
                <th width="17%">Remove Item</th>
            </tr>
            <?php
                if(!empty($_SESSION["shopping_cart"])){
                    $total=0;
                    foreach($_SESSION["shopping_cart"] as $key => $value){
                    ?>
                <tr>
                        <td><?php echo $value["product_name"];?></td>
                        <td><?php echo $value["product_quantity"];?></td>
                        <td><?php echo $value["product_price"];?></td>
                        <td><?php echo number_format($value["product_quantity"]*$value["product_price"],2);?></td>
                        <td><a href="index.php?action=delete&id=<?php echo $value["product_id"]; ?>"><span class="text-danger">Remove Item</span></a></td>
                </tr>
                <?php
                    $total = $total + ($value["product_quantity"]*$value["product_price"]);
                    }
                ?>
                <tr>
                        <td colspan="3" align="right">Total</td>
                        <td align="right"><?php echo number_format($total,2);?></td>
                        <td><a href="http://localhost/1_iwt2/payment.html"><span class="text-danger">PROCCED TO PAY</span></a</td>
                </tr>
                <?php
                }
                ?>
            </table>
        </div>

    </div>
    <br><br><br><br><br><br><br><br><br><br>
	<div style="bottom:20px;">
			<hr style="border:10px solid white; border-radius:10px; background-color:white;">
			<center style="font-family:arial; color:white;">COPYRIGHTS RESERVED WITHER_CLOTHES@</center>
	</div>

	</body>
</html>
</body>
</html>