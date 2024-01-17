<?php
// database connection string
$host = "localhost"; //your localhost name
$user = "root"; //your username
$pass = ""; //your password
$dbName="shop";  //your database name

$dbConnection = mysqli_connect($host, $user, $pass, $dbName);

// confirm db connection
if (!$dbConnection) {
    echo "Could not connect to server\n";
    trigger_error(mysqli_error(), E_USER_ERROR);
} else {
    echo "Connection established \n";
}

// get values from page2.html page
$feedback = $_POST['feedback'];
echo $feedback;

//query to insert feedback value
$query_insertFeedback = "insert into feedback values('" . $feedback ."')";

if($dbConnection -> query($query_insertFeedback) === true){
    echo "new record inserted";
} else {
    echo "error: " . $query_insertFeedback . "<br>" . $dbConnection->error;
}




//Database connection
//$myphp = new mysqli('localhost', 'root', '', 'recruitment_company_system');
//if ($myphp->connect_error){
//    die('Connection Failed :'.$myphp->connect_error);
//}
//else{
//    $stm = $myphp->prepare("insert into feedback(Feedback) values(?)");
//    $stm->bind_param("s",$Feedback);
//    $stm->execute();
//    echo "Thank you for your feedback!";
//    $stm->close();
//    $myphp->close();
//}

?>



