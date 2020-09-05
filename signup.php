<?php
session_start();
include ("connection.php");
$errors = "";
$missingField = "<p>All Fields are Required.</p>";
$username = $_POST["username"];
$email = $_POST["email"];
$password = $_POST["password"];
$password2 = $_POST["password2"];
if(empty($_POST["email"])||empty($_POST["password"])||empty($_POST["password2"])||empty($_POST["username"])){
    $errors .= $missingField;
}else{
    $username = filter_var($username,FILTER_SANITIZE_STRING);
    $email = filter_var($email,FILTER_SANITIZE_EMAIL);
   $password = filter_var($password,FILTER_SANITIZE_STRING);
   $password2 = filter_var($password2,FILTER_SANITIZE_STRING);
    if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
        $errors .="<p>Invalid Email Address</p>";
    }
    if($password!==$password2){
        $errors .="<p>Password does not match.</p>";
    }
    if(!(strlen($_POST["password"])>6
         and preg_match('/[A-Z]/',$_POST["password"])
         and preg_match('/[0-9]/',$_POST["password"])
        )
       ){
    $errors .= "<p>Invalid Password!<br />Password should be at least 6 characters long and include one capital letter and one number.</p>";}
    
}
if($errors){
    $resultmessage = "<div class='alert alert-danger'>$errors</div>";
    echo $resultmessage;
    exit;
}
else{
 $username = mysqli_real_escape_string($link,$username);
 $email = mysqli_real_escape_string($link,$email);
 $phone = mysqli_real_escape_string($link,$phone);
 $password = mysqli_real_escape_string($link,$password);
// $password = md5($password);
 $password = hash('sha256',$password);
 $sql = "SELECT * FROM users WHERE username = '$username'";
 $result = mysqli_query($link,$sql);
 if(!$result){
 echo "<div class='alert alert-danger'>Error Occured while running the query.".mysqli_error($link)."</div>";
 exit;
 }
 $result = mysqli_num_rows($result);
 if($result){
 echo "<div class='alert alert-danger'>Username already exist.</div>";
 exit;
 }
 $sql = "SELECT * FROM users WHERE email = '$email'";
 $result = mysqli_query($link,$sql);
 if(!$result){
 echo "<div class='alert alert-danger'>Error Occured while running the query.".mysqli_error($link)."</div>";
 exit;
 }
 $result = mysqli_num_rows($result);
 if($result){
 echo "<div class='alert alert-danger'>Email Address already exist.</div>";
 exit;
 }

 //$activationKey = bin2hex(openssl_random_pseudo_bytes(16));
$qrcode = mt_rand(100000,999999);
 $sql = "INSERT INTO users ( `email`, `password`,`username`,`qrcode`) VALUES ( '$email', '$password','$username','$qrcode')";
 $result = mysqli_query($link,$sql);
 if(!$result){
 echo "<div class='alert alert-danger'>Error Occured while running the insertion query.".mysqli_error($link)."</div>";
 exit;
 }else{
 $_SESSION['username']=$username;
 $_SESSION['qrcode']=$qrcode;
 }
}

echo "success";
?>
