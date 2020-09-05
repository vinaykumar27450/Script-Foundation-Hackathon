<?php
session_start();
include ("connection.php");
$qrcode = $_GET['qrcode'];
$errors = "";

$sql = "SELECT * FROM userinfo WHERE `user_id` = (SELECT `user_id` FROM users WHERE `qrcode` = '$qrcode')";
$result = mysqli_query($link,$sql);
$row = mysqli_fetch_array($result, MYSQLI_ASSOC);

$result = mysqli_num_rows($result);

?>
<!doctype html>
<html lang="en">

<head>
    <title>User Detail</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
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
                            <a href="profile.php" data-after="Form" class="active"><?php echo $row['firstname'];?></a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <!-- Navigation Bar end -->
    <?php
if(!$result)
{
    echo '<style>
    #userdetail{
    display:none;
    }
    </style>';
    echo '<div style="height:200px;margin-top:200px;margin-left:40px;"><h1>No Details Found</h1></div>';
}
?>
    <!-- Userdetail -->
    <div class="conatainer" style="margin: 100px 30px 0px 30px;" id="userdetail">
        <div class="row">
            <div class="col-12 col-sm-10 col-md-8 col-lg-6 offset-sm-1 offset-md-2 offset-lg-3">
                <h1 class="row-detail">User Details</h1>

                <div class="row detail-row">
                    <div class="col-6">Name:</div>
                    <div class="col-6"><?php  echo $row['firstname']." ".$row['lastname']; ?> </div>
                </div>



                <div class="row detail-row">
                    <div class="col-6">Date of Birth:</div>
                    <div class="col-6"> <?php  echo $row['dob']; ?></div>
                </div>

                <div class="row detail-row">
                    <div class="col-6">Place of Birth:</div>
                    <div class="col-6"> <?php  echo $row['place']; ?></div>
                </div>

                <div class="row detail-row">
                    <div class="col-6">Address:</div>
                    <div class="col-6"> <?php  echo $row['addressline1']; ?></div>
                </div>

                <div class="row detail-row">
                    <div class="col-6">City:</div>
                    <div class="col-6"> <?php  echo $row['city']; ?></div>
                </div>

                <div class="row detail-row">
                    <div class="col-6">State:</div>
                    <div class="col-6"> <?php  echo $row['state']; ?></div>
                </div>

                <div class="row detail-row">
                    <div class="col-6">Zip Code:</div>
                    <div class="col-6"> <?php  echo $row['zip']; ?></div>
                </div>

                <?php
                if($row['email2'])
                {
                    echo "<div class='row detail-row'><div class='col-6'>Alternate Email:</div><div class='col-6'>".$row['email2']." </div></div>";
                }
                ?>
                <?php
                if($row['phone2'])
                {
                    echo "<div class='row detail-row'><div class='col-6'>Alternate Contact No.:</div><div class='col-6'>".$row['phone2']." </div></div>";
                }
                ?>
                <div class="row detail-row">
                    <div class="col-6">Height:</div>
                    <div class="col-6"> <?php  echo $row['height']; ?></div>
                </div>

                <div class="row detail-row">
                    <div class="col-6">Weight:</div>
                    <div class="col-6"> <?php  echo $row['weight']; ?></div>
                </div>

                <div class="row detail-row">
                    <div class="col-6">Blood Group:</div>
                    <div class="col-6"> <?php  echo $row['bloodgroup']; ?></div>
                </div>

                <?php
                if($row['illness'])
                {
                    echo "<div class='row detail-row'><div class='col-6'>Illness:</div><div class='col-6'>".$row['illness']." </div></div>";
                }
                ?>

                <?php
                if($row['medication'])
                {
                    echo "<div class='row detail-row'><div class='col-6'>Medication:</div><div class='col-6'>".$row['medication']." </div></div>";
                }
                ?>
            </div>
        </div>
    </div>

    <div class="conatainer" style="margin: 100px 30px 0px 30px;">
        <div class="row">
            <?php
                $sql = "SELECT * FROM userdocument WHERE user_id = ".$_SESSION['user_id'];
                $result = mysqli_query($link,$sql);
//                $row = mysqli_fetch_array($result,mysqli_num);

                $count = mysqli_num_rows($result);
                if($count)
                {
                    for($i=0;$i<$count;$i++)
                    {
                        $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
                        echo '<div class="row detail-row">
                    <div class="col-6"><a href="uploads/'.$row['docname'].'" target="_blank"><img src="uploads/'.$row['docname'].'"></a></div></div>';
                    }
                    
                }
                ?>
        </div>
    </div>

    <!-- Userdetail End -->
    <!-- Footer -->
    <div id="userinfo">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-lg-4 align-self-center">
                    <ul>
                        <strong>Navigate</strong>
                        <li><a href="#" class="ft">QR Code</a></li>
                        <li><a href="#" class="ft">Profile</a></li>
                        <li><a href="#" class="ft">Edit Profile</a></li>
                        <li><a href="#">Logout</a></li>
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
    <!-- Footer end -->

    <!-- Optional JavaScript -->

    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="js/navigation.js"></script>
</body>

</html>
