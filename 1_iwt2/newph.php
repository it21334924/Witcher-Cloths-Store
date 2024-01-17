<html>
<head>


</head>

<body style="background-image:url(img/backgii.jpg)">


<?php

$server="localhost";
$username="root";
$password="";
$db="payHub";

$con=new mysqli($server,$username,$password,$db);

if($con->connect_error)
{
	die("non success".$con->connect_error);
	
	
}
	

echo"successful connection";

if(isset($_POST['sub']))
{
	$name=$_POST['name'];
	$add=$_POST['address'];
	$cun=$_POST['country'];
	$maili=$_POST['email'];
	$cardname=$_POST['name_card'];
	$cardnum=$_POST['cnum'];
	$expiry=$_POST['expiry'];
	$cvv=$_POST['cvv'];
	
}
else 
{
	echo"values not filled";
	
}





$qry="insert into payerdetails(fullname,address,country,mail,name_c,number_c,expiry,cvv) values('$name','$add','$cun','$maili','$cardname','$cardnum','$expiry','$cvv')";



if($con->query($qry)=== TRUE)
{
	

	
	echo  '<center><img src="img/logo4.png" height=30% left=50%></center> ;<center style="padding-top:100px;">
				
				<div style="width:600px; height:300px; background-color:rgba(255,255,255,0.2); overflow:hidden; justify:center; color:white; font-family:calibri; font-size:20px;">
				
				payment verification<br><br>';
				
	$read="SELECT * FROM payerdetails ORDER BY id DESC LIMIT 1";

	$result=$con->query($read);
	if($result->num_rows>0)
	{
		while($row=$result->fetch_assoc())
		{
		
			echo '<div style="height:400px; width:300px; float:left ">
					Name<br>Street-City<br>Country<br>Mail-Id<br>Card Number';
			
					echo '	<br><br><br><br><br><a href="payment.html" style="float:left; color:white; text-decoration:none; background-color:#333; display:block; border:2px solid #333; padding-left:70px;">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbspConfirm&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</a>
					</div>';
					
						echo '<div style="height:400px; width:300px; float:right; ">';
					
					echo "$row[fullname]"."<br>"."$row[address]"."<br>"."$row[country]"."<br>"."$row[mail]"."<br>"."$row[number_c]"	;
					echo '<br><br><br><br><br><a href="confirm.php" style="float:left; color:white; text-decoration:none; padding-left:130px; display:block; background-color:#333; border:2px solid #333;">Delete&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</a></div>';
			
		}
		
	}
	else 
	{
		echo "0 rows";
	}

				
	
			


	
}	

else 
{
 echo"<br> insert failed". $con->error;	
	
}








































?>

</body>
</html>