
<!DOCTYPE html>
<html lang="en">
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Confirm Donations</title>

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
                         <a href="#">Donate Now</a>
                          <a onclick="document.getElementById('id01').style.display='block'">My Profile</a>
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
                        <li class="current-menu-item"><a href="indexAdmin.php">Home</a></li>
                                <li><a href="ProjectsView.php">Projects</a></li>
                                <li><a href="AdminViewProposedProjects.php">Proposed Projects</a></li>
                                <li><a href="AdminNewProject.php">Add Project</a></li>
                                <li><a href="AdminEditProjects.php">Edit Project</a></li>
                                <li><a onclick="addMember()">Add Member</a></li>
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
                    <h1>Donation Approving</h1>
                </div><!-- .col -->
            </div><!-- .row -->
        </div><!-- .container -->
    </div><!-- .page-header -->

    <div class="contact-page-wrap">
        <div class="container">
            <div class="row">
                <div class="col-12 col-lg-1">
                   
                </div><!-- .col -->

                <div class="col-12 col-lg-10">
				<form class="contact-form" action="createNewProjectCode.php" method="post" enctype="multipart/form-data">
				
<?php

require_once('Database Connection ObjectPool.php');
$conn = $dbConnectionPool->get();

if ($conn->connect_error){                                   // check whether the connection is correctly established or not
    die("Connection failed: " . $conn->connect_error);
}                                                            // upto here ,connection is established

echo '<h3><a class="" href="#C4"><b>Pending Donations</b></a></h3>';

$sql = "SELECT id,ProjectID,amount,submitdate,submittime,BankSlip,isMember,UserID,fullname,NIC,email,pnumber,approved FROM donation Where approved=false"; //reading things from the table

$result = $conn->query($sql);
if ($result->num_rows > 0){
    while($row = $result->fetch_assoc()){       //while loop
        echo "<b>Data & Time  : </b>".$row["submitdate"]." ".$row["submittime"];
        echo "<br>";
       
        echo "<b>Name         : </b>".$row["fullname"];
        echo "<br>";
        echo '<b>Email        : </b><a href="mailto:'.$row["email"].'?Subject=Samaja%20Sathkara&body=" target="_top">'.$row["email"].'</a>';
        echo '(Click this link to send a email)';
        echo "<br>";
        echo "<b>Phone Number : </b>".$row["pnumber"];
        echo "<br>";
        echo "<b>ProjectID    : </b>".$row["ProjectID"];
        echo "<br>";
        echo "<b>amount       : </b>".$row["amount"];
        echo "<br>";
        echo "<b>BankSlip     : </b>".$row["BankSlip"];
        echo "<br>";
        echo "<b>isMember     : </b>".$row["isMember"];
        echo "<br>";
        echo "<b>UserID       : </b>".$row["UserID"];
        echo "<br>";
        echo "<b>NIC          : </b>".$row["NIC"];
        echo "<br>";
        echo '<p>Mark as Approved: <label class="switch"> <input type="checkbox" id="'.$row["id"].'" onclick="myFunction('.$row["id"].')"><span class="slider round"></span></label></p>';
        echo "<hr>";
      }
    }else{
    //echo "All submitted contact forms have been readed.";
  }

echo "<hr>";echo "<hr>";
echo '<h2 id="C4"><b>Approved Donations</b></h2>';

$sql = "SELECT id,ProjectID,amount,submitdate,submittime,BankSlip,isMember,UserID,fullname,NIC,email,pnumber,approved FROM Donation Where approved=true"; //reading things from the table

$result = $conn->query($sql);
if ($result->num_rows > 0){
    while($row = $result->fetch_assoc()){       //while loop
        echo "<b>Data & Time  : </b>".$row["submitdate"]." ".$row["submittime"];
        echo "<br>";
       
        echo "<b>Name         : </b>".$row["fullname"];
        echo "<br>";
        echo '<b>Email        : </b><a href="mailto:'.$row["email"].'?Subject=Samaja%20Sathkara&body=" target="_top">'.$row["email"].'</a>';
        echo '(Click this link to send a email)';
        echo "<br>";
        echo "<b>Phone Number : </b>".$row["pnumber"];
        echo "<br>";
        echo "<b>ProjectID    : </b>".$row["ProjectID"];
        echo "<br>";
        echo "<b>amount       : </b>".$row["amount"];
        echo "<br>";
        echo "<b>BankSlip     : </b>".$row["BankSlip"];
        echo "<br>";
        echo "<b>isMember     : </b>".$row["isMember"];
        echo "<br>";
        echo "<b>UserID       : </b>".$row["UserID"];
        echo "<br>";
        echo "<b>NIC          : </b>".$row["NIC"];
        echo "<br>";
        //echo '<p>Mark as Read: <label class="switch"> <input type="checkbox" id="'.$row["id"].'" onclick="myFunction('.$row["id"].')"><span class="slider round"></span></label></p>';
        echo '<p>Mark as Approved: <label class="switch"> <input type="checkbox" checked id="'.$row["id"].'" onclick="myFunction('.$row["id"].')"><span class="slider round"></span></label></p>';
      
        echo "<hr>";
      }
    }else{
    //echo "All submitted contact forms have been readed.";
  }

  $dbConnectionPool->dispose($conn); // sent the connection object to unlocked list in the objectpool
$conn->close();    //close the connection with database

?>

<script>
function myFunction(a) {
    var checkBox = document.getElementById(a);
  //var text = document.getElementById("text");
  if (checkBox.checked == true){
    var ajax=new XMLHttpRequest();
    var url='markasConfirmed.php';
    //ajax.onreadystatechange=response;
    ajax.open('POST',url,true);
    ajax.setRequestHeader('Content-Type','application/x-www-form-urlencoded');
    ajax.send('read='+a);
  } else {
    var ajax=new XMLHttpRequest();
    var url='markasNotConfirmed.php';
    //ajax.onreadystatechange=response;
    ajax.open('POST',url,true);
    ajax.setRequestHeader('Content-Type','application/x-www-form-urlencoded');
    ajax.send('read='+a);
  }



    
      
}
</script>

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
