<!DOCTYPE html>

<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Donation Details</title>

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
                            <a href="#">Donate Now</a>
							<a href="#">Login</a>
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
                                <li><a href="about.html">About us</a></li>
                                
                                <li><a href="portfolio.html">Gallery</a></li>
                                <li><a href="news.html">Projects</a></li>
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


								<div class="col-md-5 contact-info text-left">
									<h3>Bank Account information</h3>
									<div class="info-detail">
									<p>Please deposit your donations to our bank account in Bank of Ceylon. After depositing fill the below form. Keep the recipt with you untill we confirm your donation via Email</p>
										<ul><li><span>Bank:</span> Bank of Ceylon</li></ul>
										<ul><li><span>Account Number:</span> 00 000 000 00 <li></ul>
										<ul><li><span>Account Name  :</span> Everyone Can Help Someone</li></ul>
									</div>
								</div>



								<div class="col-md-6 col-md-offset-1 contact-form">
									<p></p>
									<form action="sendToDonationDetails.php" method="post" />

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
														echo '<option value="'.$row['name'].'">' . $row['name'] . '</option>
														<input type="hidden" name="id" value="'.$row['project_id'].'">';
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
								</div>

							</div>
					</div>
				</div>
			</section><!-- end of contact section -->
 



</body>
</html>