<?php
session_start();
include ("connection.php");
$user_id = $_SESSION['user_id'];
$errors = "";

$sql = "SELECT * FROM userinfo WHERE `user_id` =".$_SESSION['user_id'];
$result = mysqli_query($link,$sql);
$result = mysqli_num_rows($result);
if($result)
{
    $sql = "DELETE FROM userinfo WHERE `user_id` =".$_SESSION['user_id'];
$result = mysqli_query($link,$sql);
}

$sql = "INSERT INTO userinfo(`user_id`";

foreach($_POST as $item => $value)
{
    if($value != "")
    {
        $sql .= ", `$item`";
    }
}
$sql .= ") VALUES ('$user_id'";
foreach($_POST as $item => $value)
{
    if($value != "")
    {
    $value = mysqli_real_escape_string($link,$value);
        $sql .= ", '$value'";
    }
}
$sql .= ")";
//
//    $username = filter_var($username,FILTER_SANITIZE_STRING);
//    $phone = filter_var($phone,FILTER_SANITIZE_STRING);
//    $email = filter_var($email,FILTER_SANITIZE_EMAIL);
//   $password = filter_var($password,FILTER_SANITIZE_STRING);
//   $password2 = filter_var($password2,FILTER_SANITIZE_STRING);
//    if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
//        $errors .="<p>Invalid Email Address</p>";
//    }
//    
//if($errors){
//$resultmessage = "<div class='alert alert-danger'>$errors</div>";
//echo $resultmessage;
//exit;
//}
//else{
// $sql = "SELECT * FROM users WHERE email = '$email'";
//$result = mysqli_query($link,$sql);
//if(!$result){
//echo "<div class='alert alert-danger'>Error Occured while running the query.".mysqli_error($link)."</div>";
//exit;
// }
// $result = mysqli_num_rows($result);
// if($result){
// echo "<div class='alert alert-danger'>Email Address already exist.</div>";
// exit;
// }
//
// //$activationKey = bin2hex(openssl_random_pseudo_bytes(16));
//
// $sql = "INSERT INTO userinfo (`user_id`, `email`, `password`,`username`) VALUES ('$phone', '$email', '$password','$username')";
$result = mysqli_query($link,$sql);
if(!$result){
echo "<div class='alert alert-danger'>Error Occured while running the insertion query.".mysqli_error($link)."</div>";
exit;
}
// }
//}
echo "success";
?>
