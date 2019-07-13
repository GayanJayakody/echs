<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>My Page</title>

    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css">

    <!-- FontAwesome CSS -->
    <link rel="stylesheet" href="css/font-awesome.min.css">

    <!-- ElegantFonts CSS -->
    <link rel="stylesheet" href="css/elegant-fonts.css">

    <!-- themify-icons CSS -->
    <link rel="stylesheet" href="css/themify-icons.css">

    <!-- Swiper CSS -->
    <link rel="stylesheet" href="css/swiper.min.css">

    <!-- Styles -->
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header class="site-header">
        <div class="top-header-bar">
            <div class="container">
                <div class="row flex-wrap justify-content-center justify-content-lg-between align-items-lg-center">
                    <div class="col-12 col-lg-7 d-none d-md-flex flex-wrap justify-content-center justify-content-lg-start mb-3 mb-lg-0">
                        <div class="header-bar-email">
                            MAIL: <a href="#">everyonecanhelpsomeone@gmail.com</a>
                        </div><!-- .header-bar-email -->

                        <div class="header-bar-text">
                            <p>PHONE: <span>+94112564517 / +94775672431</span></p>
                        </div><!-- .header-bar-text -->
                    </div><!-- .col -->

                    <div class="col-12 col-lg-5 d-flex flex-wrap justify-content-center justify-content-lg-end align-items-center">
                        <div class="donate-btn">
                            <a href="DonationDetails.php">Donate Now</a>
                        </div><!-- .donate-btn -->
                    </div><!-- .col -->
                </div><!-- .row -->
            </div><!-- .container -->
        </div><!-- .top-header-bar -->

        <div class="nav-bar">
            <div class="container">
                <div class="row">
                    <div class="col-12 d-flex flex-wrap justify-content-between align-items-center">
                        <div class="site-branding d-flex align-items-center">
                           <a class="d-block" href="index.html" rel="home"><img class="d-block" src="images/logo4.png" alt="logo" style="width: 400px; height: 50px"></a>
                        </div><!-- .site-branding -->

                        <nav class="site-navigation d-flex justify-content-end align-items-center">
                            <ul class="d-flex flex-column flex-lg-row justify-content-lg-end align-content-center">
                                <li class="current-menu-item"><a href="index.html">Home</a></li>
                                <li><a href="aboutUs.php">About us</a></li>
                                
                                <li><a href="portfolio.html">Gallery</a></li>
                                <li><a href="ProjectsView.php">Projects</a></li>
                                <li><a href="ContactForm.php">Contact</a></li>
                            </ul>
                        </nav><!-- .site-navigation -->

                        <div class="hamburger-menu d-lg-none">
                            <span></span>
                            <span></span>
                            <span></span>
                            <span></span>
                        </div><!-- .hamburger-menu -->
                    </div><!-- .col -->
                </div><!-- .row -->
            </div><!-- .container -->
        </div><!-- .nav-bar -->

        </header><!-- .site-header -->


        <div class="home-page-welcome"  style="height:70%">
        <div class="container">
            <div class="row">
                <div class="col-12 col-lg-6 order-2 order-lg-1">
                    <div class="welcome-content">

                    <?php
                        $conn = new mysqli("localhost", "root", "", "echs_database");
                        // Check connection
                        if ($conn->connect_error) {
                            die("Connection failed: " . $conn->connect_error);
                        }
                        $mail1= $_SESSION['email'];
                        $sql="SELECT * FROM accountdetails WHERE Email='$mail1'";
                        $result = $conn->query($sql);
                        
                        if ($result->num_rows > 0) {
                            // output data of each row
                            while($row = $result->fetch_assoc()) {
                                
                                    $name=$row['FullName'];
                                    $birthday=$row['dob'];
                                    $contact=$row['ContactNo'];
                                    $address=$row['Address'];
                                    $gender=$row['gender'];

                                
                            }
                            
                        }
                        
                        
                        $conn->close();
                            
                    

                        echo "<header class='entry-header'>";
                        echo "<h2 class='entry-title'>".$name."</h2>";
                        echo "</header><!-- .entry-header -->";

                        echo "<div class='entry-content mt-5'>";

                        echo "<label>Email Address : </label>";
                        echo "<label>  ".  $_SESSION['email']."</label> <br>";
                        echo "<label>Contact No : </label>";
                        echo "<label>  ".  $contact."</label> <br>";
                        echo "<label>Address : </label>";
                        echo "<label>  ".  $address."</label> <br>";
                        echo "<label>Date of Birth : </label>";
                        echo "<label>  ".  $birthday."</label> <br>";
                        

                        echo "</div><!-- .entry-content -->";
                    ?>
                        
                    </div><!-- .welcome-content -->
                </div><!-- .col -->

                <div class="col-12 col-lg-6 mt-4 order-1 order-lg-2">
                    
                </div><!-- .col -->
            </div><!-- .row -->
        </div><!-- .container -->
    </div><!-- .home-page-icon-boxes -->


    </body>
</html>