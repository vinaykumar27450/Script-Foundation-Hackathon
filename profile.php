<?php
session_start();
if(empty($_SESSION['username'])){
header("Location:index.php");
}
$user_id = $_SESSION['user_id'];
$sql = "SELECT user_id FROM userinfo WHERE `user_id` =".$_SESSION['user_id'];
$result = mysqli_query($link,$sql);
$result = mysqli_num_rows($result);
?>
<!doctype html>
<html lang="en">

<head>
    <title>Profile</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <!-- CSS files -->
    <link rel="stylesheet" href="css/navigation.css" />
    <link rel="stylesheet" href="css/forms.css">
    <link rel="icon" href="favicon/favicon.png">
</head>

<body>
    <!-- Navigation bar -->
    <section id="header">
        <div class="header-navbar">
            <div class="nav-bar container">
                <div id="logo">
                    <a href="index.html">
                        <h1>Health<span>Card</span></h1>
                    </a>
                </div>
                <div class="nav-list">
                    <div class="hamburger">
                        <div class="bar"></div>
                    </div>
                    <ul>
                        <li>
                            <a href="index.php" data-after="Home">Home</a>
                        </li>
                        <?php
                        if(isset($_SESSION['username']))
                        {
                            if($result)
                    {
                        echo '<li><a href="edituserinfo.php?id='.$user_id.'" data-after="Form">Edit</a></li>';
                    }
                    else{
                        echo '<li><a href="userinfo.html?userid='.$_SESSION['user_id'].'" data-after="Form">Form</a></li>';
                    }
                            echo '<li><a href="profile.php" data-after="Form" class="active">'.$_SESSION['username'].'</a></li>';
                            echo '<li><a href="index.php?logout=1" data-after="Form">Logout</a></li>';
                        }
                        ?>
                        <!-- <li><a href="contact.html" data-after="Contact">Contact</a></li> -->
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <!-- Navigation Bar end -->
    <div class="container" style="padding-top: 100px">
        <div class="row">
            <div class="col-sm-6 col-lg-4  form-body" style="margin-top: 50px;">

                <?php 
                include("test.php");
//                echo $_SESSION['user_id']; 
                ?>

            </div>
        </div>
    </div>
    <div class="jumbotron">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-lg-4 align-self-center">
                    <ul>
                        <strong>Navigate</strong>
                        <li><a href="index.php" class="ft">HOME</a></li>
                        <!-- <li><a href="#" class="ft">About</a></li>
                    <li><a href="#" class="ft">Index</a></li> -->
                        <li><a href="login.html" class="ft">Login</a></li>
                        <li><a href="signup.html">Enroll Now</a></li>
                    </ul>
                </div>
                <div class="col-md-6 col-lg-4 align-self-center">
                    <ul>
                        <strong>Our Developers </strong><i class="cog icon"></i>
                        <li><a href="#" class="ft">Namita Goyal</a></li>
                        <li><a href="https://github.com/Shubh4m-B" class="ft">Shubham Bhardwaj</a></li>
                        <li><a href="https://github.com/varunvj1" class="ft">Varun Jain</a></li>
                        <li><a href="https://github.com/vinaykumar27450" class="ft">Vinay Kumar</a></li>
                    </ul>
                </div>
                <div class="col-md-6 col-lg-4 align-self-center">
                    <ul>
                        <strong>Contact Us</strong>
                        <li><a href="#" class="ft"><i class="envelope icon"></i>Email</a></li>
                        <li><a href="#" class="ft"><i class="phone icon"></i>Phone</a></li>
                        <li><a href="#" class="ft"><i class="fax icon"></i>Fax</a></li>
                        <li><a href="#" class="ft"><i class="ellipsis horizontal icon"></i>More</a></li>
                    </ul>
                </div>
            </div>
            <div class="row justify-content-center">
                Script Foundation Hackathon: Delhi Hacks &#169; 2020
            </div>
        </div>
    </div>
    <div id="back1"></div>
    <div id="back2"></div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-1.12.4.min.js" integrity="sha384-nvAa0+6Qg9clwYCGGPpDQLVpLNn0fRaROjHqs13t4Ggj3Ez50XnGQqc/r8MhnRDZ" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="js/navigation.js"></script>
    <script src="js/index.js"></script>
</body>

</html>
