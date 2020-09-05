<?php
session_start();
include('connection.php');
include('logout.php');
$user_id = $_SESSION['user_id'];
$sql = "SELECT * FROM userinfo WHERE `user_id` =".$_SESSION['user_id'];
$result = mysqli_query($link,$sql);
$row = mysqli_fetch_array($result, MYSQLI_ASSOC);

?>


<!doctype html>
<html lang="en">

<head>
    <title>User Information</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <!-- CSS files -->
    <link rel="stylesheet" href="css/forms.css">
    <link rel="stylesheet" href="css/navigation.css" />
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
                        <!--<li><a href="userinfo.html" class="active">Form</a></li> -->
                        <!-- <li><a href="contact.html" data-after="Contact">Contact</a></li> -->
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <div class="container" style="padding-top: 100px">
        <h1>User Info</h1>
        <div class="row">
            <div class="col-11">
                <form action="#" id="userinfoform">
                    <h5>Personal Information</h5>
                    <div class="form-group row">
                        <label for="firstname" class="col-3 col-md-2 col-form-label align-self-center">First Name:</label>
                        <?php echo '<input type="text" class="form-control col-9 col-md-4" id="firstname" placeholder="First Name" name="firstname" value="'.$row["firstname"].'">';
                        ?>
                        <label for="lastname" class="col-3 col-md-2 col-form-label align-self-center">Last name:</label>
                        <?php echo '<input type="text" class="form-control col-9 col-md-4" id="lastname" placeholder="Last Name" name="lastname" value="'.$row["lastname"].'">';
                        ?>
                    </div>
                    <div class="form-group row">
                        <label for="dob" class="col-3 col-md-2 col-form-label align-self-center">Date of Birth:</label>
                        <?php echo '<input type="date" class="form-control col-9 col-md-4" id="dob" placeholder="Date Of Birth" name="dob" value="'.$row["dob"].'">';
                        ?>
                        <label for="place" class="col-3 col-md-2 col-form-label align-self-center">Place of Birth:</label>
                        <input type="text" class="form-control col-9 col-md-4" id="place" name="place" placeholder="Place of Birth" value="<?php echo $row['place'] ;?>">

                    </div>
                    <br>
                    <h5>Address and Contact</h5>
                    <div class="form-group row">
                        <label for="addressline1" class="col-3 col-md-2 col-form-label align-self-center">Address Line 1:</label>
                        <textarea id="addressline1" class="col-9 col-md-10 form-control" name="addressline1" rows="2"> <?php echo $row['addressline1'] ;?></textarea>
                    </div>
                    <div class="form-group row">
                        <label for="city" class="col-3 col-md-2 col-form-label align-self-center">City:</label>
                        <input type="text" class="form-control col-9 col-md-4" id="city" name="city" placeholder="City" value="<?php echo $row['city'] ;?>">
                        <label for="state" class="col-3 col-md-2 col-form-label align-self-center">State/ Province:</label>
                        <select name="state" id="state" class="form-control col-9 col-md-4" value="<?php echo $row['state']; ?>">
                            <option value="">--Select State--</option>
                            <option value="Andhra Pradesh">Andhra Pradesh</option>
                            <option value="Andaman and Nicobar Islands">Andaman and Nicobar Islands</option>
                            <option value="Arunachal Pradesh">Arunachal Pradesh</option>
                            <option value="Assam">Assam</option>
                            <option value="Bihar">Bihar</option>
                            <option value="Chandigarh">Chandigarh</option>
                            <option value="Chhattisgarh">Chhattisgarh</option>
                            <option value="Dadar and Nagar Haveli">Dadar and Nagar Haveli</option>
                            <option value="Daman and Diu">Daman and Diu</option>
                            <option value="Delhi">Delhi</option>
                            <option value="Lakshadweep">Lakshadweep</option>
                            <option value="Puducherry">Puducherry</option>
                            <option value="Goa">Goa</option>
                            <option value="Gujarat">Gujarat</option>
                            <option value="Haryana">Haryana</option>
                            <option value="Himachal Pradesh">Himachal Pradesh</option>
                            <option value="Jammu and Kashmir">Jammu and Kashmir</option>
                            <option value="Jharkhand">Jharkhand</option>
                            <option value="Karnataka">Karnataka</option>
                            <option value="Kerala">Kerala</option>
                            <option value="Madhya Pradesh">Madhya Pradesh</option>
                            <option value="Maharashtra">Maharashtra</option>
                            <option value="Manipur">Manipur</option>
                            <option value="Meghalaya">Meghalaya</option>
                            <option value="Mizoram">Mizoram</option>
                            <option value="Nagaland">Nagaland</option>
                            <option value="Odisha">Odisha</option>
                            <option value="Punjab">Punjab</option>
                            <option value="Rajasthan">Rajasthan</option>
                            <option value="Sikkim">Sikkim</option>
                            <option value="Tamil Nadu">Tamil Nadu</option>
                            <option value="Telangana">Telangana</option>
                            <option value="Tripura">Tripura</option>
                            <option value="Uttar Pradesh">Uttar Pradesh</option>
                            <option value="Uttarakhand">Uttarakhand</option>
                            <option value="West Bengal">West Bengal</option>
                        </select>
                    </div>
                    <div class="form-group row">
                        <label for="zip" class="col-3 col-md-2 col-form-label align-self-center">Zip Code:</label>
                        <input type="text" class="form-control col-9 col-md-4" id="zip" name="zip" placeholder="Zip Code" value="<?php echo $row['zip'] ;?>">
                    </div>
                    <div class="form-group row">
                        <label for="email2" class="col-3 col-md-2 col-form-label align-self-center">Alternate email address:</label>
                        <input type="email" class="form-control col-9 col-md-4" id="email2" name="email2" placeholder="Alternate email (if any)" value="<?php echo $row['email2'] ;?>">
                        <label for="phone2" class="col-3 col-md-2 col-form-label align-self-center">Alternate Contact Number:</label>
                        <input type="text" class="form-control col-9 col-md-4" id="phone2" name="phone2" placeholder="Alternate Contact Number(if any)" value="<?php echo $row['phone2'] ;?>">
                    </div>
                    <br>
                    <h5>Medical Information</h5>
                    <div class="form-group row">
                        <label for="height" class="col-3 col-md-2 col-form-label align-self-center">Height:</label>
                        <input type="text" class="form-control col-9 col-md-2" id="height" name="height" placeholder="Height(in ft)" value="<?php echo $row['height'] ;?>">
                        <label for="weight" class="col-3 col-md-2 col-form-label align-self-center">Weight:</label>
                        <input type="text" class="form-control col-9 col-md-2" id="weight" name="weight" placeholder="Weight(in kgs)" value="<?php echo $row['weight'] ;?>">
                        <label for="bloodgroup" class="col-3 col-md-2 col-form-label align-self-center">Blood Group:</label>
                        <input type="text" class="form-control col-9 col-md-2" id="blood" name="bloodgroup" placeholder="Blood Group" value="<?php echo $row['bloodgroup'] ;?>">
                    </div>
                    <div class="form-group row">
                        <label for="illness" class="col-3 col-md-2 col-form-label align-self-center">Illness (if any):</label>
                        <textarea id="illness" class="col-9 col-md-10 form-control" name="illness" rows="2"><?php echo $row['illness'] ;?></textarea>
                    </div>
                    <div class="form-group row">
                        <label for="medication" class="col-3 col-md-2 col-form-label align-self-center">Medication (if any):</label>
                        <textarea id="medication" class="col-9 col-md-10 form-control" name="medication" rows="2"><?php echo $row['medication'] ;?></textarea>
                    </div>
                    <div class="form-group row">
                        <div id="userinfoformmessage" class="col-sm-6 col-md-4 offset-sm-4 offset-md-5"></div>
                    </div>
                    <div class="form-group row">
                        <div class="col-sm-6 col-md-4 offset-sm-4 offset-md-5">
                            <input type="submit" class="btn btn-outline-primary btn-md btn-block submit">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Footer -->
    <div id="userinfo">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-lg-4 align-self-center">
                    <ul>
                        <strong>Navigate</strong>
                        <li><a href="index.php" class="ft">HOME</a></li>
                        <li><a href="index.php?logout=1" class="ft">Logout</a></li>
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

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-1.12.4.min.js" integrity="sha384-nvAa0+6Qg9clwYCGGPpDQLVpLNn0fRaROjHqs13t4Ggj3Ez50XnGQqc/r8MhnRDZ" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="js/navigation.js"></script>
    <script src="js/index.js"></script>
</body>

</html>
