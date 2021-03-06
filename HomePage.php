
<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Home Page</title>

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
							<a onclick="document.getElementById('id01').style.display='block'">LOG IN</a>
                            <a onclick="document.getElementById('id02').style.display='block'">SIGN UP</a>
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

        <div id="id01" class="modal">
        <form class="modal-content animate" method="POST">
            <div class="imgcontainer">
                <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">&times;</span>
                <img src="images/login.jpg" alt="Avatar" class="avatar">
            </div>

            <div class="text-center">
                <label for="email"><b>Email</b></label><br>
                <input type="text" placeholder="Enter Email" id="email" oninput="removeBorder('email')"><br>

                <label for="psw" class="text-center"><b>Password</b></label><br>
                <input type="password" placeholder="Enter Password" id="password" oninput="removeBorder('password')"><br>
                    
                <p id="ErrMsg" class="text-center text-danger"></p>

                <button type="button" class="modelbutton" onclick="login()">Login</button>
            </div>

            <div class="container" style="background-color:#f1f1f1;width:100%;">
                <button type="button" onclick="document.getElementById('id01').style.display='none'" class="modelbutton cancelbtn">Cancel</button>
            
            </div>

        </form>
        </div>


        <div id="id02" class="modal">
        <form class="modal-content animate" method="POST">

            <div>
                <span onclick="document.getElementById('id02').style.display='none'" class="close" title="Close Modal">&times;</span>
            </div>
            

            <div class="text-center contact-form">

                <label for="fname">Full Name</label>
                <input type="text" id="fullname" name="fullname" placeholder="Kumar Sangakkara" oninput="removeBorder('fullname')">
                <label for="birthday">Birthday</label><br>
                <input type="date" name="birthday" id="birthday" oninput="removeBorder('birthday')">
                <input type="radio" name="gender" id="male" value="male" style="width:30px;height:10px"> Male
                <input type="radio" name="gender" id="female" value="female" style="width:30px;height:10px;margin-left:20px"> Female<br><br>
                <label for="email">Email Address</label>
                <input type="text" id="emai" name="email" placeholder="computer@gmail.com" oninput="removeBorder('emai')">
                <p id="ErrEmail" class="text-center text-danger"></p>
                <label for="pnumber">Phone Number</label>
                <input type="text" id="pnumber" name="pnumber" placeholder="0717303215" oninput="removeBorder('pnumber')">
                <label for="address">Address</label>
                <input type="text" id="address" name="address" placeholder="Address" oninput="removeBorder('address')">
                <label for="password">Password</label>
                <input type="password" id="PW" name="password" placeholder="Password" oninput="removeBorder(PW')">

                
                <button type="button" class="btn gradient-bg" onclick="save()">SUBMIT</button>


            </div>

            <div class="container" style="background-color:#f1f1f1;width:100%;">
                <button type="button" onclick="document.getElementById('id02').style.display='none'" class="modelbutton cancelbtn">Cancel</button>
            
            </div>

        </form>
        </div>

        <script>
            function login(){
                if(document.getElementById("email").value=="" && document.getElementById("password").value==""){
                    document.getElementById("email").style.border="1px solid #ff8080";
                    document.getElementById("password").style.border="1px solid #ff8080";
                }else if(document.getElementById("email").value==""){
                    document.getElementById("email").style.border="1px solid #ff8080";
                }else if(document.getElementById("password").value==""){
                    document.getElementById("password").style.border="1px solid #ff8080";
                }else{
                
                    var email=document.getElementById("email").value;
                    var password=document.getElementById("password").value;
                
                    var xmlhttp=new XMLHttpRequest();
                    xmlhttp.onreadystatechange=function(){
                    
                        if(this.readyState==4 && this.status==200){
                           // alert(this.responseText);
                            
                            if(this.responseText=="success-admin"){
                                window.location.href = "indexAdmin.php";
                            }else if(this.responseText=="success-member"){
                                window.location.href="indexMember.php";
                            }else if(this.responseText=="Invalid Email"){
                                document.getElementById("email").style.border="1px solid #ff8080";
                                document.getElementById("ErrMsg").innerHTML="Invalid Email";
                            }else if(this.responseText=="Password Incorrect"){
                                document.getElementById("password").style.border="1px solid #ff8080";
                                document.getElementById("ErrMsg").innerHTML="Incorrect Password";
                                
                            }else if(this.responseText=="not-created"){
                                document.getElementById("ErrMsg").innerHTML="Your account has not been approved yet";
                            }
                        }   
                    }   
                    xmlhttp.open("POST","login.php",true);
                    xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                    xmlhttp.send("email="+email+"&password="+password); 
                }
            }
            function save(){
                    if(document.getElementById("fullname").value==""){
                        document.getElementById("fullname").style.border="1px solid #ff4d4d";
                    }   
                    if(document.getElementById("birthday").value==""){
                        document.getElementById("birthday").style.border="1px solid #ff4d4d";
                    }
                    if(document.getElementById("emai").value==""){
                        document.getElementById("emai").style.border="1px solid #ff4d4d";
                    } 
                       
                    if(document.getElementById("pnumber").value==""){
                        document.getElementById("pnumber").style.border="1px solid #ff4d4d";
                    }   
                    if(document.getElementById("address").value==""){
                        document.getElementById("address").style.border="1px solid #ff4d4d";
                    }   
                    if(document.getElementById("PW").value==""){
                        document.getElementById("PW").style.border="1px solid #ff4d4d";
                    }   
                    else{
                        var fname=document.getElementById("fullname").value;
                        var birthday=document.getElementById("birthday").value;
                        var email=document.getElementById("emai").value;
                        var pnumber=document.getElementById("pnumber").value;
                        var address=document.getElementById("address").value;
                        var password=document.getElementById("PW").value;
                        
                        var gender;
                        if(document.getElementById("male").checked){
                            gender=document.getElementById("male").value;
                        }else if(document.getElementById("female").checked){
                            gender=document.getElementById("female").value;
                        }
                        
                        var xmlhttp=new XMLHttpRequest();
                        xmlhttp.onreadystatechange=function(){
                            if(this.readyState==4 && this.status==200){
                                alert("Details saved");
                                window.location.href = "HomePage.php";
                            }
                        }
                        xmlhttp.open("POST","addMemberDatabase.php",true);
                        xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                        xmlhttp.send("fname="+fname+"&birthday="+birthday+"&email="+email+"&pnumber="+pnumber+"&address="+address+"&password="+password+"&gender="+gender);
                        
                    }                           
            }
            function checkDuplication(){
                var email=document.getElementById("emai").value;
                var xmlhttp=new XMLHttpRequest();
                xmlhttp.onreadystatechange=function(){
                    if(this.readyState==4 && this.status==200){
                        alert(this.responseText);
                        if(this.responseText=="do"){
                            alert(this.responseText);
                            document.getElementById("ErrEmail").value="Email already exists";
                        }
                    }
                }
                xmlhttp.open("POST","checkValidity.php",true);
                xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                xmlhttp.send("email="+email);
            }
            function removeBorder(idname){
                    document.getElementById(idname).style.border="1px solid #d6d6c2";
                    document.getElementById("ErrMsg").innerHTML="";
            }
            
        </script>


    </header><!-- .site-header -->

    

    
        <div class="swiper-wrapper">
            <div class="swiper-slide hero-content-wrap">
                <img src="images/srilanka.jpg" alt="">

                <div class="hero-content-overlay position-absolute w-100 h-100">
                    <div class="container h-100">
                        <div class="row h-100">
                            <div class="col-12 col-lg-8 d-flex flex-column justify-content-center align-items-start">
                                <header class="entry-header">
                                    <h1>Donate</h1>
                                    <h4>for a better Sri Lanka</h4>
                                </header><!-- .entry-header -->

                                <div class="entry-content mt-4">
                                    <p>The value of life is not in its duration, but in its donation. You are not important because of how long you live, you are important beacuse of how effective you live</p>
                                </div><!-- .entry-content -->

                                <footer class="entry-footer d-flex flex-wrap align-items-center mt-5">
                                    <a href="DonationDetails.php" class="btn gradient-bg mr-2">Donate Now</a>
                                    
                                </footer><!-- .entry-footer -->
                            </div><!-- .col -->
                        </div><!-- .row -->
                    </div><!-- .container -->
                </div><!-- .hero-content-overlay -->
            </div><!-- .hero-content-wrap -->

      

        
    </div><!-- .hero-slider -->

    <div class="home-page-icon-boxes">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-6 col-lg-4 mt-4 mt-lg-0">
                    <div class="icon-box active">
                        <figure class="d-flex justify-content-center">
                            <img src="images/hands-gray.png" alt="">
                            <img src="images/hands-white.png" alt="">
                        </figure>

                        <header class="entry-header">
                            <h3 class="entry-title">Become a Member</h3>
                        </header>

                        <div class="entry-content">
                            <p>As an active member you can contribute your donations and can help directy by joining to the projects </p>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-md-6 col-lg-4 mt-4 mt-lg-0">
                    <div class="icon-box active">
                        <figure class="d-flex justify-content-center">
                            <img src="images/donation-gray.png" alt="">
                            <img src="images/donation-white.png" alt="">
                        </figure>

                        <header class="entry-header">
                            <h3 class="entry-title">Donate & Help</h3>
                        </header>

                        <div class="entry-content">
                            <p>Your individual donations make huge effect to the society and to the people. Be a proud donor  </p>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-md-6 col-lg-4 mt-4 mt-lg-0">
                    <div class="icon-box active">
                        <figure class="d-flex justify-content-center">
                            <img src="images/charity-gray.png" alt="">
                            <img src="images/charity-white.png" alt="">
                        </figure>

                        <header class="entry-header">
                            <h3 class="entry-title">Ideas & Suggestions</h3>
                        </header>

                        <div class="entry-content">
                            <p>You can give  ideas and suggestions for new projects and for the current projects  </p>
                        </div>
                    </div>
                </div>
            </div><!-- .row -->
        </div><!-- .container -->
    </div><!-- .home-page-icon-boxes -->

    <div class="home-page-welcome">
        <div class="container">
            <div class="row">
                <div class="col-12 col-lg-6 order-2 order-lg-1">
                    <div class="welcome-content">
                        <header class="entry-header">
                            <h2 class="entry-title">Our Vision & Target</h2>
                        </header><!-- .entry-header -->

                        <div class="entry-content mt-5">
                            <p>There are more than 5000 schools in Srilanka with less facilities with difficulties. Our aim is supporting those students to giving study materiel and uniforms. Also try to improve the schools with some physical support with Library projects etc..</p>
                        </div><!-- .entry-content -->

                        
                    </div><!-- .welcome-content -->
                </div><!-- .col -->

                <div class="col-12 col-lg-6 mt-4 order-1 order-lg-2">
                    <img src="images/welcome1.jpg" alt="welcome">
                </div><!-- .col -->
            </div><!-- .row -->
        </div><!-- .container -->
    </div><!-- .home-page-icon-boxes -->

    

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
                                            <a href="DonationDetails.php" class="btn gradient-bg mr-2">Donate Now</a>
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