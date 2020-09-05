<?php
session_start();
include('connection.php');
include('logout.php');
$user_id = $_SESSION['user_id'];
$sql = "SELECT user_id FROM userinfo WHERE `user_id` =".$_SESSION['user_id'];
$result = mysqli_query($link,$sql);
$result = mysqli_num_rows($result);


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <link href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700,900" rel="stylesheet" />
    <!-- <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet"> -->

    <!-- <link rel="stylesheet" href="css/icon-font.css" /> -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.4.1/components/icon.min.css">
    <link rel="stylesheet" href="css/navigation.css" />
    <link rel="stylesheet" href="css/cards.css" />
    <link rel="stylesheet" href="css/style.css" />
    <link rel="icon" type="image/png" href="favicon/favicon.png" />

    <title>Health Card</title>
</head>

<body>
    <!-- <a href="https://icons8.com/icon/43185/qr-code">QR Code icon by Icons8</a> -->

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
                        <!--
                        <li>
                            <a href="menu.html" data-after="Form" class="active">&lt;Firstname&gt;</a>
                        </li>
                        <li><a href="" data-after="Form">Logout</a></li>
-->
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
                    echo '<li><a href="profile.php" data-after="Form">'.$_SESSION['username'].'</a></li>';
                    echo '<li><a href="index.php?logout=1" data-after="Form">Logout</a></li>';
                }  
                ?>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <!-- Navigation Bar end -->

    <!---------- Header -------------->
    <header class="header-menu">
        <div class="container header__text-box">
            <h1 class="heading-primary heading-primary-menu">Add Report</h1>
            <h2>
                <form action="adduserdocument.php" method="post" enctype="multipart/form-data">
                    <input type="file" name="fileToUpload" id="fileToUpload">

                    <input type="submit" value="Upload Image" name="submit">
                </form>
            </h2>
            <!--            <h3 class="heading-primary--sub"></h3>-->
        </div>
    </header>
    <!--------- End Header --------->

    <!-- Footer -->
    <div class="jumbotron">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-lg-4 align-self-center">
                    <strong>Navigate</strong>
                    <ul>
                        <li><a href="profile.php" class="ft">Profile</a></li>
                        <?php
                        echo '<li><a href="edituserinfo.php?id='.$user_id.'" class="ft">Edit Profile</a></li>';
    ?>
                        <li><a href="index.php?logout=1">Logout</a></li>
                    </ul>
                </div>
                <div class="col-md-6 col-lg-4 align-self-center">
                    <strong>Our Developers </strong><i class="cog icon"></i>
                    <ul>
                        <li><a href="#" class="ft">Namita Goyal</a></li>
                        <li><a href="https://github.com/Shubh4m-B" class="ft">Shubham Bhardwaj</a></li>
                        <li><a href="https://github.com/varunvj1" class="ft">Varun Jain</a></li>
                        <li><a href="https://github.com/vinaykumar27450" class="ft">Vinay Kumar</a></li>
                    </ul>
                </div>
                <div class="col-md-6 col-lg-4 align-self-center">
                    <strong>Contact Us</strong>
                    <ul>
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
    <!--    </main>-->
</body>

<script src="https://code.jquery.com/jquery-1.12.4.min.js" integrity="sha384-nvAa0+6Qg9clwYCGGPpDQLVpLNn0fRaROjHqs13t4Ggj3Ez50XnGQqc/r8MhnRDZ" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<script src="js/navigation.js"></script>
<script src="js/index.js"></script>


</html>
