<script src="https://code.jquery.com/jquery-2.1.1.min.js" type="text/javascript"></script>
<script>
function checkAvailability() {
	$("#loaderIcon").show();
	jQuery.ajax({
	url: "check_availability.php",
	data:'name='+$("#name").val(),
	type: "POST",
	success:function(data){
		$("#user-availability-status").html(data);
		$("#loaderIcon").hide();
	},
	error:function (){}
	});
}
</script>
<!DOCTYPE html>
<html lang="en">
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
    <title>New project</title>

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

     <script>
        var noOfMembers=0;
        function test(){
            var members=[]
            var count=0;
            for(i=1;i<100;i++){
                if(document.getElementById(i).checked){
                    alert('done');
                    var mail=document.getElementById(i).value;
                    var xmlhttp=new XMLHttpRequest();

                    xmlhttp.onreadystatechange=function(){

                        if(this.readyState==4 && this.status==200){
                         
                        }
                    }
                
                    xmlhttp.open("GET","approveMember.php?mail="+mail,true);
                    xmlhttp.send();
                }
            }
            alert('Accounts Created');

        }


         function addMember(){
            document.getElementById("slider").style.display="none";
            document.getElementById("home-page-boxes").style.display="none";
            document.getElementById("home-page-welcome").style.display="none";
            document.getElementById("our-causes").style.display="none";
            document.getElementById("causes").style.display="none";
            document.getElementById("approve-member").style.display="block";






            var xmlhttp=new XMLHttpRequest();

            xmlhttp.onreadystatechange=function(){

                if(this.readyState==4 && this.status==200){
                    document.getElementById("member-details").innerHTML=this.responseText;
                    
                }
            }
                
            xmlhttp.open("GET","getRequestedMember.php",true);
            xmlhttp.send();


            
         }


        class buttn{
            constructor(mail){
                this.mail=mail; 
                var btn="<button class='button1' id='$mail'>Approve</button>";
            }

            approve(mail){
                var xmlhttp=new XMLHttpRequest();

                xmlhttp.onreadystatechange=function(){

                    if(this.readyState==4 && this.status==200){
                        alert("Account Created");
                    }
                }
                
                xmlhttp.open("GET","approveMember.php?mail="+mail,true);
                xmlhttp.send();
            }
        }


        function approveMember(){
            alert('done');
            var xmlhttp=new XMLHttpRequest();

            xmlhttp.onreadystatechange=function(){

                if(this.readyState==4 && this.status==200){
                    alert("Accounts Created");
                }
            }
                
            xmlhttp.open("GET","approveMember.php?mail="+mail,true);
            xmlhttp.send();
        }
     </script>  


    <div class="page-header">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h1>Add a New Project</h1>
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

                                        <label for="pname">Project Name</label>
                                        <input type="text" id="name" name="name" placeholder="Project 1" onBlur="checkAvailability()"><span id="user-availability-status"></span>
																				<p><img src="LoaderIcon.gif" id="loaderIcon" style="display:none" /></p>

                                        <label for="Description">Project Description</label><br>
                                        <textarea name="description" placeholder="Please give a brief description about the project" rows="10" cols="50">
																				</textarea>

																				<label for="estcost">Estimated Cost</label>
                                        <input type="text" id="estcost" name="estcost" placeholder="000.00">

																				<input class="btn gradient-bg" type="file" name="fileToUpload" id="fileToUpload">
    																		

    
										<input class="btn gradient-bg" type="submit" value="SUBMIT">
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
