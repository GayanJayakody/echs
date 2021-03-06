<?php

$project_id=$_POST['project_id'];
$name=$_POST['name'];
$filename = ''.$name." complete.php";
$link='./CompletedProjects/'.$filename.''; //this is is with spaces
$newlink=str_replace(' ','%20',$link); // replace spaces with %20 since url cannot have spaces

// including the database connection file
include_once("Database Connection ObjectPool.php");
$conn = $dbConnectionPool->get();
$result = mysqli_query($conn, "UPDATE projects SET state='1' WHERE project_id=$project_id");

$dbConnectionPool->dispose($conn); // sent the connection object to unlocked list in the objectpool
$conn->close();    //close the connection with databasev



$strOut='
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Hello World</title>

    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../css/bootstrap.min.css">

    <!-- FontAwesome CSS -->
    <link rel="stylesheet" href="../css/font-awesome.min.css">

    <!-- ElegantFonts CSS -->
    <link rel="stylesheet" href="../css/elegant-fonts.css">

    <!-- themify-icons CSS -->
    <link rel="stylesheet" href="../css/themify-icons.css">

    <!-- Swiper CSS -->
    <link rel="stylesheet" href="../css/swiper.min.css">

    <!-- Styles -->
    <link rel="stylesheet" href="../style.css">
</head>
<body>
<header class="site-header">
<div class="top-header-bar">
    <div class="container">
        <div class="row flex-wrap justify-content-center justify-content-lg-between align-items-lg-center">
            <div class="col-12 col-lg-8 d-none d-md-flex flex-wrap justify-content-center justify-content-lg-start mb-3 mb-lg-0">
                <div class="header-bar-email">
                    MAIL: <a href="#">everyonecanhelpsomeone@gmail.com</a>
                </div><!-- .header-bar-email -->

                <div class="header-bar-text">
                    <p>PHONE: <span>+94112564517 / +94775672431</span></p>
                </div><!-- .header-bar-text -->
            </div><!-- .col -->

            <div class="col-12 col-lg-4 d-flex flex-wrap justify-content-center justify-content-lg-end align-items-center">
                <div class="donate-btn">
                    <a href="../DonationDetails.php">Donate Now</a>
                    
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
                   <a class="d-block" href="index.html" rel="home"><img class="d-block" src="../images/logo4.png" alt="logo" style="width: 400px; height: 50px"></a>
                </div><!-- .site-branding -->

                <nav class="site-navigation d-flex justify-content-end align-items-center">
                    <ul class="d-flex flex-column flex-lg-row justify-content-lg-end align-content-center">
                        <li class="current-menu-item"><a href="../HomePage.php">Home</a></li>
                        <li><a href="../aboutUs.php">About us</a></li>
                        
                        <li><a href="../portfolio.html">Gallery</a></li>
                        <li><a href="../ProjectsView.php">Projects</a></li>
                        <li><a href="../ContactForm.php">Contact</a></li>
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

    <div class="swiper-container hero-slider">
        

        

        <!-- Add Arrows -->
        <div class="swiper-button-next flex justify-content-center align-items-center">
            <span><svg viewBox="0 0 1792 1792" xmlns="http://www.w3.org/2000/svg"><path d="M1171 960q0 13-10 23l-466 466q-10 10-23 10t-23-10l-50-50q-10-10-10-23t10-23l393-393-393-393q-10-10-10-23t10-23l50-50q10-10 23-10t23 10l466 466q10 10 10 23z"/></svg></span>
        </div>

        <div class="swiper-button-prev flex justify-content-center align-items-center">
            <span><svg viewBox="0 0 1792 1792" xmlns="http://www.w3.org/2000/svg"><path d="M1203 544q0 13-10 23l-393 393 393 393q10 10 10 23t-10 23l-50 50q-10 10-23 10t-23-10l-466-466q-10-10-10-23t10-23l466-466q10-10 23-10t23 10l50 50q10 10 10 23z"/></svg></span>
        </div>
    </div><!-- .hero-slider -->

     <div class="home-page-welcome">
        <div class="container">
            <div class="row">
			<?php
												
//to get a database connection object from objectpool
require_once("../Database Connection ObjectPool.php");
$conn = $dbConnectionPool->get();

$sql = "SELECT name,description,img_link,report_link FROM projects WHERE project_id='.$project_id.'"; //reading things from the table
$result=$conn->query($sql);

if ($result){
	
}
$results = mysqli_fetch_array($result);

$pname = $results["name"];
$pdescription = $results["description"];
$pimg_link = $results["img_link"];
$preport_link= $results["report_link"];

$dbConnectionPool->dispose($conn); // sent the connection object to unlocked list in the objectpool
$conn->close();    //close the connection with database

               echo\' <div class="col-12 col-lg-6 order-2 order-lg-1">
                    <div class="welcome-content">
                        <header class="entry-header">
                            <h2 class="entry-title">\'.$pname.\'</h2>
                        </header><!-- .entry-header -->

                        <div class="entry-content mt-5">
                            <p>\'.$pdescription.\'</p>
                            <a class="btn gradient-bg" href="uploads/\'.$preport_link.\'" >View the Report</a>
                        </div><!-- .entry-content -->
                        
                        

                    </div><!-- .welcome-content -->
                </div><!-- .col -->

                <div class="col-12 col-lg-6 mt-4 order-1 order-lg-2">
                    <img src="../newProjects/\'.$pimg_link.\'" alt="welcome" style="width:400px;height:400px;">
                </div><!-- .col -->\'
				?>
            </div><!-- .row -->
        </div><!-- .container -->
    </div><!-- .home-page-icon-boxes -->

    <script type=\'text/javascript\' src=\'js/jquery.js\'></script>
    <script type=\'text/javascript\' src=\'js/jquery.collapsible.min.js\'></script>
    <script type=\'text/javascript\' src=\'js/swiper.min.js\'></script>
    <script type=\'text/javascript\' src=\'js/jquery.countdown.min.js\'></script>
    <script type=\'text/javascript\' src=\'js/circle-progress.min.js\'></script>
    <script type=\'text/javascript\' src=\'js/jquery.countTo.min.js\'></script>
    <script type=\'text/javascript\' src=\'js/jquery.barfiller.js\'></script>
    <script type=\'text/javascript\' src=\'js/custom.js\'></script>

</body>
</html>
';

echo($filename);
$handle = fopen('./completedProjects/'.$filename, 'w') or die('cannot open the file');
fwrite($handle,$strOut);
fclose($handle);
echo('<a href='.$newlink.'>Click here</a> to test if the build worked.');

?> 