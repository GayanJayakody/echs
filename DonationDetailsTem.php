<!DOCTYPE html>
<html lang="en">
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Hello World</title>

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
<body class="single-page about-page">
<header class="site-header">
    <div class="top-header-bar">
        <div class="container">
            <div class="row flex-wrap justify-content-center justify-content-lg-between align-items-lg-center">
                <div class="col-12 col-lg-7 d-none d-md-flex flex-wrap justify-content-center justify-content-lg-start mb-3 mb-lg-0">
                    <div class="header-bar-email">
                        MAIL: <a href="#">contact@ourcharity.com</a>
                    </div><!-- .header-bar-email -->

                    <div class="header-bar-text">
                        <p>PHONE: <span>+24 3772 120 091 / +56452 4567</span></p>
                    </div><!-- .header-bar-text -->
                </div><!-- .col -->

                <div class="col-12 col-lg-5 d-flex flex-wrap justify-content-center justify-content-lg-end align-items-center">
                    <div class="donate-btn">
                        <a href="DonationDetails.php">Donate Now</a>
						<a href="#">Log in</a>
						<a href="#">Sign in</a>
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
                            <li class="current-menu-item"><a href="HomePage.php">Home</a></li>
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

    <div class="page-header">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h1>Donation Details</h1>
                </div><!-- .col -->
            </div><!-- .row -->
        </div><!-- .container -->
    </div><!-- .page-header -->

    <div class="contact-page-wrap">
        <div class="container">
            <div class="row">
                <div class="col-12 col-lg-5">
                    <div class="entry-content">
                        <h2>Bank Account Information</h2>

                        <p>Please deposit your donations to our bank account in Bank of Ceylon. After depositing fill the below form. Keep the recipt with you untill we confirm your donation via Email</p>

                       

                        <ul class="contact-info p-0">
                                        <ul><li><span>Bank:</span> Bank of Ceylon</li></ul>
										<ul><li><span>Account Number:</span> 00 000 000 00 <li></ul>
										<ul><li><span>Account Name  :</span> Everyone Can Help Someone</li></ul>
                        </ul>
                    </div>
                </div><!-- .col -->

                <div class="col-12 col-lg-7">
                    
                <form class="contact-form" action="sendToDonationDetails.php" method="post" />

<label for="fname">First Name</label><br>
<input type="text" name="firstname" placeholder="Kumar"><br>

  <label for="lname">Last Name</label><br>
<input type="text" name="lastname" placeholder="Sangakkara"><br>

  <label for="nic">NIC/passport </label><br>
  <input type="text" name="nic" placeholder="000000000v"><br>

  <label for="email">Email Address</label><br>
  <input type="text" name="email" placeholder="computer@gmail.com"><br>

  <label for="pnumber">Phone Number</label><br>
  <input type="text" name="pnumber" placeholder="0717303215"><br>

<label for="amount">Amount Rs.</label><br>
  <input type="text" name="amount" placeholder="00.00"><br>

  <label for="refno">Fund Transfer Refference Number</label><br>
  <input type="text" name="refno" placeholder="00000000000"><br>

  <label for="date">Transfer Date</label><br>
  <input type="text" name="transferdate" placeholder="2010/10/10"><br>

  <label for="project">To which ongoing projects would you like to donate</label><br>

<?php

  //to get a database connection object from objectpool
  require_once('Database Connection ObjectPool.php');
  $conn = $dbConnectionPool->get();
  //echo ''.spl_object_id($conn);


$sql = "SELECT project_id,name FROM projects WHERE state=0"; //reading things from the table
$result = $conn->query($sql);
if ($result->num_rows > 0){
  echo'<select name="project" style="width: 400px; height: 40px">';
  
  while($row = $result->fetch_assoc()){       //while loop
      echo '<option value="'.$row['project_id'].'">' . $row['name'] . '</option>
      ';
      
  }
  echo'</select>';	
}else{
  echo "0 results";
}
$dbConnectionPool->dispose($conn); // sent the connection object to unlocked list in the objectpool
$conn->close();    //close the connection with database

?>
<br>


<input class="submit-btn" type="submit" value="SUBMIT">
</form>
					

                </div><!-- .col -->

                
            </div><!-- .row -->
        </div><!-- .container -->
    </div>

    
<footer class="site-footer">
        <div class="footer-widgets">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-md-6 col-lg-3">
                        <div class="foot-about">
                            
                            <ul class="d-flex flex-wrap align-items-center">
                                <li><a href="#"><i class="fa fa-pinterest-p"></i></a></li>
                                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fa fa-dribbble"></i></a></li>
                                <li><a href="#"><i class="fa fa-behance"></i></a></li>
                                <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                            </ul>
                        </div><!-- .foot-about -->
                    </div><!-- .col -->

                    <div class="col-12 col-md-6 col-lg-3 mt-5 mt-md-0">
					<div class="foot-contact">
					<ul>
                        <li><i class="fa fa-phone"></i><span>+94112564517 / +94775672431</span></li>
						</ul>
						</div>
                    </div><!-- .col -->

                    <div class="col-12 col-md-6 col-lg-3 mt-5 mt-md-0">
					<div class="foot-contact">
						<ul>
                            <li><i class="fa fa-envelope"></i><span>EcanhelpSone@gmail.com</span></li>
								</ul>
								</div>
                    </div><!-- .col -->

                    <div class="col-12 col-md-6 col-lg-3 mt-5 mt-md-0">
                        <div class="foot-contact">
						<ul>
                            <li><i class="fa fa-map-marker"></i><span>Main Str. no 45-46, b3, Katubedda, Moratuwa, Sri Lanka</span></li>
							</ul>

                        </div><!-- .foot-contact -->

                        <div class="col-12">
                           
                        </div><!-- .search-widget -->
                    </div><!-- .col -->
                </div><!-- .row -->
            </div><!-- .container -->
        </div><!-- .footer-widgets -->

        <div class="footer-bar">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <p class="m-0">
Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved by HALOGEN</a>
</p>
                    </div><!-- .col-12 -->
                </div><!-- .row -->
            </div><!-- .container -->
        </div><!-- .footer-bar -->
    </footer><!-- .site-footer -->

    <script type='text/javascript' src='js/jquery.js'></script>
    <script type='text/javascript' src='js/jquery.collapsible.min.js'></script>
    <script type='text/javascript' src='js/swiper.min.js'></script>
    <script type='text/javascript' src='js/jquery.countdown.min.js'></script>
    <script type='text/javascript' src='js/circle-progress.min.js'></script>
    <script type='text/javascript' src='js/jquery.countTo.min.js'></script>
    <script type='text/javascript' src='js/jquery.barfiller.js'></script>
    <script type='text/javascript' src='js/custom.js'></script>

</body>
</html>
