<?php
include "newph.php";


$qry="insert into payerdetails(fullname,address,country,mail,name_c,number_c,expiry,cvv) values('$name','$add','$cun','$maili','$cardname','$cardnum','$expiry','$cvv')";



if($con->query($qry)=== TRUE)
{
	
	echo "<br>"."insertion sucessful"."good day";
	
	
}	
else{}
	
?>


	