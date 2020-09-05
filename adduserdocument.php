<?php
$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
  $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
  if($check !== false) {
    echo "File is an image - " . $check["mime"] . ".";
    $uploadOk = 1;
  } else {
    echo "File is not an image.";
    $uploadOk = 0;
  }
}

// Check if file already exists
//if (file_exists($target_file)) {
// echo "Sorry, file already exists.";
// $uploadOk = 0;
//}

// Check file size

// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
  echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
  $uploadOk = 0;
}

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
  echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
//    $qrcode = mt_rand(100000,999999);
    $filename   = uniqid() . "-" . time(); // 5dab1961e93a7-1571494241
$extension  = pathinfo( $_FILES["fileToUpload"]["name"], PATHINFO_EXTENSION ); // jpg
$basename   = $filename . "." . $extension; // 5dab1961e93a7_1571494241.jpg

$source       = $_FILES["fileToUpload"]["tmp_name"];
$destination  = "uploads/{$basename}";

/* move the file */
//move_uploaded_file( $source, $destination );    
    $newfilename= date('dmYHis').str_replace(" ", "", basename($_FILES["fileToUpload"]["tmp_name"]));
  if (move_uploaded_file($source, $destination)) {
    echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
      session_start();
include('connection.php');
$user_id = $_SESSION['user_id'];
$sql = "INSERT INTO userdocument(`user_id`,`docname`) VALUES('$user_id','$basename')";
$result = mysqli_query($link,$sql);
      if(!$result)
      {
          echo "error";
      }
header("Location:menu.php");
      
  } else {
    echo "Sorry, there was an error uploading your file.";
  }
}
?>
