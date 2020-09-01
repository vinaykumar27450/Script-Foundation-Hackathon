<?php
//Start session
session_start();
//Connect to the database
include("connection.php");
//Check user inputs
$password = $_POST["password"];
$email = $_POST["email"];
$username = $_POST["username"];
    //Define error messages
$missingEmail = '<p><stong>Please enter your email address!</strong></p>';
$missingUsername = '<p><stong>Please enter your Username!</strong></p>';
$missingPassword = '<p><stong>Please enter your password!</strong></p>'; 
$errors = "";
    //Get email and password
    //Store errors in errors variable
if(empty($_POST["email"])){
    $errors .= $missingEmail; 
    $resultMessage = '<div class="alert alert-danger">' . $errors .'</div>';
    echo $resultMessage;
    exit;
}else{
    $email = filter_var($_POST["email"], FILTER_SANITIZE_EMAIL);
}
if(empty($_POST["username"])){
    $errors .= $missingUsername;   
    $resultMessage = '<div class="alert alert-danger">' . $errors .'</div>';
    echo $resultMessage;
    exit;
}else{
    $password = filter_var($_POST["username"], FILTER_SANITIZE_STRING);
}
if(empty($_POST["password"])){
    $errors .= $missingPassword; 
    $resultMessage = '<div class="alert alert-danger">' . $errors .'</div>';
    echo $resultMessage;
    exit;
}else{
    $password = filter_var($_POST["password"], FILTER_SANITIZE_STRING);
}


 $email = mysqli_real_escape_string($link, $email);
 $username = mysqli_real_escape_string($link, $username);
$password = mysqli_real_escape_string($link, $password);
$password = hash('sha256', $password);
 //Run query: Check combinaton of email & password exists
$sql = "SELECT * FROM users WHERE email='$email' AND password='$password' AND username='$username'";
$result = mysqli_query($link, $sql);
if(!$result){
 echo '<div class="alert alert-danger">Error running the query!</div>';
 exit;
}
 //If email & password don't match print error
$count = mysqli_num_rows($result);
if($count ==0){
 echo '<div class="alert alert-danger">Invalid Details! Please try again.</div>';
}
else {
 //log the user in: Set session variables
 $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
 $_SESSION['user_id']=$row['user_id'];
 $_SESSION['username']=$row['username'];
 $_SESSION['email']=$row['email'];
 echo "success";
}

                    ?>
