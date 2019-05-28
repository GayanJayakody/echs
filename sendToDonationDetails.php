<!DOCTYPE html>

<html lang="en">
<head>
	<style>
	.button1 {
  background-color : #4CAF50; 
  color: white; 
  border: 2px solid #4CAF50;
   padding: 4px 30px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 23px;
}

.button1:hover {
  background-color: #45a049;
  border: 2px solid #45a049;
  color: white;
   padding: 4px 30px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 23px;
}

dropdown{
 width:250px;   
}

	</style>
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
	
	<!-- ====================================================
	header section -->
	
    <header class="site-header">
        <div class="top-header-bar">
            <div class="container">
                <div class="row flex-wrap justify-content-center justify-content-lg-between align-items-lg-center">
                    <div class="col-12 col-lg-8 d-none d-md-flex flex-wrap justify-content-center justify-content-lg-start mb-3 mb-lg-0">
                        <div class="header-bar-email">
                            MAIL: <a href="#">contact@ourcharity.com</a>
                        </div><!-- .header-bar-email -->

                        <div class="header-bar-text">
                            <p>PHONE: <span>+24 3772 120 091 / +56452 4567</span></p>
                        </div><!-- .header-bar-text -->
                    </div><!-- .col -->

                    <div class="col-12 col-lg-4 d-flex flex-wrap justify-content-center justify-content-lg-end align-items-center">
                        <div class="donate-btn">
                            <a href="#">Donate Now</a>
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
                           <a class="d-block" href="index.html" rel="home"><img class="d-block" src="images/logo.png" alt="logo"></a>
                        </div><!-- .site-branding -->

                        <nav class="site-navigation d-flex justify-content-end align-items-center">
                            <ul class="d-flex flex-column flex-lg-row justify-content-lg-end align-content-center">
                                <li class="current-menu-item"><a href="index.html">Home</a></li>
                                <li><a href="about.html">About us</a></li>
                                <li><a href="causes.html">Causes</a></li>
                                <li><a href="portfolio.html">Gallery</a></li>
                                <li><a href="news.html">News</a></li>
                                <li><a href="contact.html">Contact</a></li>
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

			
			<!-- map section -->
			<section class="api-map" id="contact">
				<div class="container-fluid">
					<div class="row">
						<div class="col-md-12 map" id="map"></div>
					</div>
				</div>
			</section><!-- end of map section -->

			<!-- contact section starts here -->
			<section class="contact">
				<div class="container">
					<div class="row">
							<div class="contact-caption clearfix">
								<div class="contact-heading text-center">
									<h2>Donation Details</h2>
								</div>






								<div class="col-md-6 col-md-offset-1 contact-form">
									<p></p>
                                    <?php
                                        $firstname=$_POST['firstname'];
                                        echo "Your First Name: ".$firstname."<br>";
                                        $lastname=$_POST['lastname'];
                                        echo "Your Last Name: ".$lastname."<br>";
                                        $nic=$_POST['nic'];
                                        echo "NIC/Passport Number: ".$nic."<br>";
                                        $email=$_POST['email'];
                                        echo "Your Emali Address: ".$email."<br>";
                                        $pnumber=$_POST['pnumber'];
                                        echo "Your Phone Number: ".$pnumber."<br>";
                                        $amount=$_POST['amount'];
                                        echo "Amount is: ".$amount."<br>";
                                        $refno=$_POST['refno'];
                                        echo "Referrence number: ".$refno."<br>";
                                        $transferdate=$_POST['transferdate'];
                                        echo "Transfer Date: ".$transferdate."<br>";
                                        $project=$_POST['project'];
                                        echo "Project: ".$project."<br>";
                                        $id=$_POST['id'];
                                        echo "Project: ".$id."<br>";

                                        $date=strval(date("Y-m-d"));
                                        $time= strval(date("H:i:s"));


																				//to get a database connection object from objectpool
																				require_once('Database Connection ObjectPool.php');
																				$conn = $dbConnectionPool->get();
																				//echo ''.spl_object_id($conn);

                                        $sql = "INSERT INTO donation(ProjectID,amount,submitdate,submittime,BankSlip,isMember,UserID,fullname,NIC,email,pnumber,approved) VALUES ('$id','$amount','$date','$time','jghjf',true,'152','$firstname','$nic','$email','$pnumber',false)"; // insert data to the created table
                                        if ($conn->query($sql)===TRUE){
                                            echo "<h3>Your Donation details has been submitted.</h3>"."<h3>We will update after confirming the details</h3>";
                                        }else{
                                            echo "Error: ". $sql ."<br>" . $conn->error;
                                        }
																				$dbConnectionPool->dispose($conn); // sent the connection object to unlocked list in the objectpool
                                        $conn->close();    //close the connection with database

                                        ?>
								</div>

							</div>
					</div>
				</div>
			</section><!-- end of contact section -->

</body>
</html>



