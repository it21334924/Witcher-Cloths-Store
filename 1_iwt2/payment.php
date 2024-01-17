<html>
<head>
<style>
body
{
margin:0;
justify-content:center;
font-family:Helvetica, sans-serif;
background-color:#10181c;



}



.container
{
display:flex;
position:relative;
background-color:rgba(255,255,255,0.1);
height:320px;
width:720px;
top:200px;
justify-content:center;

}

.one
{
left:10px;
position:absolute;
color:white;

font-size:20px;
}

.two
{
right:10px;
color:white;
position:absolute;

font-size:20px;
}


.sub_btn
{
	position:absolute;
	bottom:20px;
	color:30;
	background-color:red;
	


}

img
{
	display:block;
	margin:0;
	position:absolute;


}




.left
{
padding-top:20px;
display:inline;
float:left;

}


.logo
{

padding-top:5px;
padding-left:0px;
padding-right:0px;
float:left;
}


.lefti
{
padding-top:25px;
display:inline;
float:left;

}


</style>



<script>
function submitted()
{
	alert("payment Success");



}




</script>
<head>

<body style="background-image:url(img/backgii.jpg); ">
<script>
alert("payment deleted");

</script>
<div>
		<a href="index.html"><img class="logo" src="img/logo4.png" alt="mainlogo" height=20%;></a>
	

		<a href="http://localhost/aman/index.php"><img style="right:10px; top:20px;" src="img/close.png" height=15%;></a>

		
		


		
		
		</div>


<center>
<form action="newph.php" method="post">
<div class="container">
<center style="color:white; font-size:26px; padding-top:10px;	"><b>Payment</b></center><br><br>
<div class="one">
<br><br><br>

<label>Full Name&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp:</label><input type="text"  name="name" required><br><br>
<label>Address&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp:</label><input type="text" name="address"  placeholder="Street-City" pattern="[a-zA-z]{3}+[a-zA-z]{3}" required><br><br>
<label>Country&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp:</label><select 	name="country" required style="border-right:4px solid white;" >
								<option>Srilanka&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp</option>
								<option>India</option>
								<option>Austraila</option>
								<option>German</option>
								<option>China</option>
						
							
																</select><br><br>
<label>Email Address:</label><input type="text"  name="email" required><br><br>

</div>



<div class="two">
<br><br><br>

<label>Name on card:</label><input type="text" name="name_card" required><br><br>
<label>Card Number&nbsp:</label><input type="number"  name="cnum" required id="p1"><br><br>
<label style="float:left;">&nbspCard Expiry&nbsp&nbsp&nbsp:</label><input type="date" name="expiry" style="border-right:23px solid white; border-left:5px solid white;" required><br><br>
<label>CVV:</label><input name="cvv" type="number" min="100" max="999" required><br><br>


</div>



<div class="sub_btn">
<center style="bottom:20px; color:white; background-color:#111;"><input type="submit" name="sub" value="PROCCED PAY" style=" " onclick="submitted()"></center>
</div>
</form>
</div>
</center>

<script>
function submitted()
{
	alert("payment Success");



}




</script>



</body>



</html>