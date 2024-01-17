<?php

$host = "localhost"; //your localhost name
$user = "root"; //your username
$pass = ""; //your password
$db="shop";  //your database name

$r = mysqli_connect($host, $user, $pass);

if (!$r) {
    echo "Could not connect to server\n";
    trigger_error(mysqli_error(), E_USER_ERROR);
} else {
echo "Connection established\n";
}

echo mysqli_get_server_info($r) . "\n";
$r2 = mysqli_select_db($r, $db);

if (!$r2) {
echo "Cannot select database\n";
 trigger_error(mysqli_error($r), E_USER_ERROR);
} else {
echo "database selected\n";
}
 mysqli_close($r);
 ?>