
<!DOCTYPE html>
<html lang="en">
<head>
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
                        <a class="d-block" href="HomePage.php" rel="home"><img class="d-block" src="images/logo4.png" alt="logo" style="width: 400px; height: 50px"></a>
                    </div><!-- .site-branding -->

                    <nav class="site-navigation d-flex justify-content-end align-items-center">
                        <ul class="d-flex flex-column flex-lg-row justify-content-lg-end align-content-center">
                            <li class="current-menu-item"><a href="HomePage.php">Home</a></li>
                                <li><a href="aboutUs.php">About us</a></li> 
                                <li><a href="portfolio.html">Gallery</a></li>
                                <li><a href="projectsView.php">Projects</a></li>
                                <li><a href="ContactForm.php">Contact</a></li>
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
                    <h1>Our Projects</h1>
                </div><!-- .col -->
            </div><!-- .row -->
        </div><!-- .container -->
    </div><!-- .page-header -->

    
    
    <div class="our-causes">
        <div class="container">
            <div class="row">
                <div class="coL-12">
                    <div class="section-heading">
                        <h2 class="entry-title">Current Projects</h2>
                    </div><!-- .section-heading -->
                </div><!-- .col -->
            </div><!-- .row -->

            <div class="row">
                <div class="col-12">
                    <div class="swiper-container causes-slider">
                        <div class="swiper-wrapper">
<?php
												
                            //to get a database connection object from objectpool
                            require_once('Database Connection ObjectPool.php');
                            $conn = $dbConnectionPool->get();
                                                
                                            $sql = "SELECT name,description,page_link,img_link,estimated_cost,raised FROM projects WHERE state=0"; //reading things from the table
                                            $result = $conn->query($sql);
                                            if ($result->num_rows > 0){
                                                //echo'<select name="currentprojects" style="width: 400px; height: 40px">';
                                                while($row = $result->fetch_assoc()){       //while loop
                                                    //echo ''. $row["name"];
                                                    echo'<div class="swiper-slide">
                                <div class="cause-wrap">
                                    <figure class="m-0">
                                        <img src="newProjects/'. $row["img_link"].'" alt="">

                                        <div class="figure-overlay d-flex justify-content-center align-items-center position-absolute w-100 h-100">
                                            <a href="#" class="btn gradient-bg mr-2">Donate Now</a>
                                        </div><!-- .figure-overlay -->
                                    </figure>

                                    <div class="cause-content-wrap">
                                        <header class="entry-header d-flex flex-wrap align-items-center">
                                            <h3 class="entry-title w-100 m-0"><a href="'. $row["page_link"].'">'. $row["name"].'</a></h3>
                                        </header><!-- .entry-header -->

                                        <div class="entry-content">
                                            <p class="m-0">'. $row["description"].'</p>
                                        </div><!-- .entry-content -->

                                        <div class="entry-footer mt-5">
                                        <a href="'. $row["page_link"].'" class="btn gradient-bg mr-2">Read More</a>
                                    </div><!-- .entry-footer -->
                            

                                        <div class="fund-raised w-100">
                                            <div class="fund-raised-bar-1 barfiller">
                                                <div class="tipWrap">
                                                    <span class="tip"></span>
                                                </div><!-- .tipWrap -->

                                                <span class="fill" data-percentage="83"></span>
                                            </div><!-- .fund-raised-bar -->

                                            <div class="fund-raised-details d-flex flex-wrap justify-content-between align-items-center">
                                                <div class="fund-raised-total mt-4">
                                                    Raised: '. $row["raised"].'
                                                </div><!-- .fund-raised-total -->

                                                <div class="fund-raised-goal mt-4">
                                                    Goal: '. $row["estimated_cost"].'
                                                </div><!-- .fund-raised-goal -->
                                            </div><!-- .fund-raised-details -->
                                        </div><!-- .fund-raised -->
                                    </div><!-- .cause-content-wrap -->
                                </div><!-- .cause-wrap -->
                            </div><!-- .swiper-slide -->';
                                                   
                                                }
                                                	
                                            }else{
                                                echo "No current Projects available";
                                            }


                                            ?>
                                                                    </div><!-- .swiper-wrapper -->

</div><!-- .swiper-container -->

<!-- Add Arrows -->
<div class="swiper-button-next flex justify-content-center align-items-center">
    <span><svg viewBox="0 0 1792 1792" xmlns="http://www.w3.org/2000/svg"><path d="M1171 960q0 13-10 23l-466 466q-10 10-23 10t-23-10l-50-50q-10-10-10-23t10-23l393-393-393-393q-10-10-10-23t10-23l50-50q10-10 23-10t23 10l466 466q10 10 10 23z"/></svg></span>
</div>

<div class="swiper-button-prev flex justify-content-center align-items-center">
    <span><svg viewBox="0 0 1792 1792" xmlns="http://www.w3.org/2000/svg"><path d="M1203 544q0 13-10 23l-393 393 393 393q10 10 10 23t-10 23l-50 50q-10 10-23 10t-23-10l-466-466q-10-10-10-23t10-23l466-466q10-10 23-10t23 10l50 50q10 10 10 23z"/></svg></span>
</div>
</div><!-- .col -->
</div><!-- .row -->
</div><!-- .container -->
</div><!-- .our-causes -->


<div class="our-causes">
        <div class="container">
            <div class="row">
                <div class="coL-12">
                    <div class="section-heading">
                        <h2 class="entry-title">Completed Projects</h2>
                    </div><!-- .section-heading -->
                </div><!-- .col -->
            </div><!-- .row -->

            <div class="row">
                <div class="col-12">
                    <div class="swiper-container causes-slider">
                        <div class="swiper-wrapper">
<?php
												
                                               
                                            $sql = "SELECT name,description,page_link,img_link,estimated_cost,raised FROM projects WHERE state=1"; //reading things from the table
                                            $result = $conn->query($sql);
                                            if ($result->num_rows > 0){
                                                
                                                while($row = $result->fetch_assoc()){       //while loop
                                                    //echo ''. $row["name"];
                                                    echo'<div class="swiper-slide">
                                <div class="cause-wrap">
                                    <figure class="m-0">
                                        <img src="newProjects/'. $row["img_link"].'" alt="">

                                        <div class="figure-overlay d-flex justify-content-center align-items-center position-absolute w-100 h-100">
                                            <a href="#" class="btn gradient-bg mr-2">Donate Now</a>
                                        </div><!-- .figure-overlay -->
                                    </figure>

                                    <div class="cause-content-wrap">
                                        <header class="entry-header d-flex flex-wrap align-items-center">
                                            <h3 class="entry-title w-100 m-0"><a href="'. $row["page_link"].'">'. $row["name"].'</a></h3>
                                        </header><!-- .entry-header -->

                                        <div class="entry-content">
                                            <p class="m-0">'. $row["description"].'</p>
                                        </div><!-- .entry-content -->

                                        <div class="entry-footer mt-5">
                                        <a href="completedProjects/'. $row["name"].' complete.php" class="btn gradient-bg mr-2">Read More</a>
                                    </div><!-- .entry-footer -->
                            

                        
                                    </div><!-- .cause-content-wrap -->
                                </div><!-- .cause-wrap -->
                            </div><!-- .swiper-slide -->';
                                                   
                                                }
                                                	
                                            }else{
                                                echo "No Projects available";
                                            }
                                            $dbConnectionPool->dispose($conn); // sent the connection object to unlocked list in the objectpool
                                            $conn->close();    //close the connection with database

                                            ?>
                                                                    </div><!-- .swiper-wrapper -->

</div><!-- .swiper-container -->

<!-- Add Arrows -->
<div class="swiper-button-next flex justify-content-center align-items-center">
    <span><svg viewBox="0 0 1792 1792" xmlns="http://www.w3.org/2000/svg"><path d="M1171 960q0 13-10 23l-466 466q-10 10-23 10t-23-10l-50-50q-10-10-10-23t10-23l393-393-393-393q-10-10-10-23t10-23l50-50q10-10 23-10t23 10l466 466q10 10 10 23z"/></svg></span>
</div>

<div class="swiper-button-prev flex justify-content-center align-items-center">
    <span><svg viewBox="0 0 1792 1792" xmlns="http://www.w3.org/2000/svg"><path d="M1203 544q0 13-10 23l-393 393 393 393q10 10 10 23t-10 23l-50 50q-10 10-23 10t-23-10l-466-466q-10-10-10-23t10-23l466-466q10-10 23-10t23 10l50 50q10 10 10 23z"/></svg></span>
</div>
</div><!-- .col -->
</div><!-- .row -->
</div><!-- .container -->
</div><!-- .our-causes -->


 <div class="help-us">
        <div class="container">
            <div class="row">
                <div class="col-12 d-flex flex-wrap justify-content-between align-items-center">
                    <h2>You can propose a new project now</h2>

                    <a class="btn orange-border" href="ProposeProject.php">Propose a Project</a>
                </div>
            </div>
        </div>
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