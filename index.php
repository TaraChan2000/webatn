<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ATN</title>
    <link rel="shortcut icon"href="images/logo.png"/>
    
    <!-- Google Fonts -->
    <link href='http://fonts.googleapis.com/css?family=Titillium+Web:400,200,300,700,600' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Roboto+Condensed:400,700,300' rel='stylesheet' type='text/css'>
    <link href='http://fonts.googleapis.com/css?family=Raleway:400,100' rel='stylesheet' type='text/css'>
    
    <!-- Bootstrap -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="css/font-awesome.min.css">
    
    <!-- Custom CSS -->
    <link rel="stylesheet" href="css/owl.carousel.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="css/responsive.css">
    
    <!-- Tao menu cap -->
    <link href="csseshop/bootstrap.min.css" rel="stylesheet">
    <link href="csseshop/font-awesome.min.css" rel="stylesheet">
    <link href="csseshop/prettyPhoto.css" rel="stylesheet">
    <link href="csseshop/price-range.css" rel="stylesheet">
    <link href="csseshop/animate.css" rel="stylesheet">
	<link href="csseshop/main.css" rel="stylesheet">
	<link href="csseshop/responsive.css" rel="stylesheet">
    
    <link href="css/salomon.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet" type="text/css" />
    <link href="css/petmart.css" rel="stylesheet" type="text/css" />
    <link href="css/product.css" rel="stylesheet" type="text/css" />
    <link href="css/title.css" rel="stylesheet" type="text/css" />
    <link href="css/headerbottom.css" rel="stylesheet" type="text/css" />
    <link href="css/colorna.css" rel="stylesheet" type="text/css" />


<!--datatable-->
	<script src="js/jquery-3.2.0.min.js"/></script>
    <script src="js/jquery.dataTables.min.js"/></script>
    <script src="js/dataTables.bootstrap.min.js"/></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" />

<style>
.mySlides {display:none;}
</style>
	<!--[if IE 6]>
		<link href="css/ie6.css" rel="stylesheet" type="text/css" />
	<![endif]-->
	<!--[if IE 7]>
        <link href="css/ie7.css" rel="stylesheet" type="text/css" />  
	<![endif]-->
</head>
<?php
    session_start();
    include_once("connection.php");
?>
<body>

<div class="header-bottom">
<li href="?page=index" id="logo"><img src="images/Logo.png" width="94" height="94" alt="" title=""></li>
    <div class="container">
        <div class="col-sm-9">
                <div class="navbar-header">
                    
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
								<span class="sr-only">Toggle navigation</span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
				</button>
                
        <div class="mainmenu pull-left">
		<ul class="nav navbar-nav collapse navbar-collapse">
	    <!--<div id="header">-->
			<!--<ul class="navigation"> -->
                
				<li class="active"><a href="index.php">Home</a></li>
				<li><a href="?page=store_management">Store</a></li>
                
				<li><a href="?page=category_management">Category</a></li>
							<li><a href="?page=product_management">Product</a></li>
				                <?php
                                    if(isset($_SESSION['us']) && $_SESSION['us'] != ""){
                                ?>
                                    <li><a hrefclass="#" style="color:white;width:100px" href="?page=update_customer">Hi,<?php echo $_SESSION['us']?></a></li>
                                    
								
                                    <li><a href="?page=logout" style="color:white" class="#"> Logout</a></li>
                                     
                                <?php
                                    }
                                    else{
                                ?>
                                <li><a href="?page=login">Login</a></li>
                                <li><a href="?page=register">Register</a></li>
                                <?php
                                    }
                                    ?>
                                    <style>
body {
  font-family: Arial;
}

* {
  box-sizing: border-box;
}

form.example input[type=text] {
  padding: 10px;
  font-size: 17px;
  border: 1px solid grey;
  float: left;
  width: 80%;
  background: #f1f1f1;
}

form.example button {
  float: left;
  width: 20%;
  padding: 10px;
  background: #2196F3;
  color: white;
  font-size: 17px;
  border: 1px solid grey;
  border-left: none;
  cursor: pointer;
}

form.example button:hover {
  background: #0b7dda;
}

form.example::after {
  content: "";
  clear: both;
  display: table;
}
</style>
</head>
<body>

<form class="example" method="POST" action="?page=search" style="margin:auto;max-width:510px">
  <input type="text" placeholder="Search" name="search">
  <button type="submit"><i class="fa fa-search"></i></button>
</form>
		</ul>
        </div>
        
    </div>
    </div>
</div>
</div>

	<?php
        if(isset($_GET['page'])){
            $page = $_GET['page'];
            if($page=="register"){
                include_once("register.php");
            }
			elseif($page=="petfood"){
                include_once("petfood.php");
            }
            elseif($page=="login"){
                include_once("login.php");
            }
            elseif($page=="search"){
                include_once("search.php");
            }
            elseif($page=="category_management"){
                include_once("category_management.php");
            }
            elseif($page=="store_management"){
                include_once("store_management.php");
            }
            elseif($page=="product_management"){
                include_once("product_management.php");
            }
            elseif($page=="add_category"){
                include_once("add_category.php");
            }
            elseif($page=="update_category"){
                include_once("update_category.php");
            }
            elseif($page=="update_store"){
                include_once("update_store.php");
            }
            elseif($page=="logout"){
                include_once("logout.php");
            }
            elseif($page=="add_product"){
                include_once("add_product.php");
            }
            elseif($page=="add_store"){
                include_once("add_store.php");
            }
            elseif($page=="update_product"){
                include_once("update_product.php");
            }
        }
        else{
            include_once("content.php");
        }
	?>
			

<footer id="dk-footer" class="dk-footer">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-lg-4">
                    <div class="dk-footer-box-info">
                        <a href="index.html" class="footer-logo">
                            <img src="https://cdn.pixabay.com/photo/2016/11/07/13/04/yoga-1805784_960_720.png" alt="footer_logo" class="img-fluid">
                        </a>
                        <p class="footer-info-text">
                            HePet is a chain of pet shops specializing in providing food, shower gel, cages and accessories for pets in Can Tho.                        <div class="footer-social-link">
                            <h3>Follow us</h3>
                            <ul>
                                <li>
                                    <a href="index.php">
                                        <i class="fa fa-facebook"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="index.php">
                                        <i class="fa fa-google-plus"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="index.php">
                                        <i class="fa fa-instagram"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <!-- End Social link -->
                    </div>
                    <!-- End Footer info -->
                    <div class="footer-awarad">
                        <img src="images/icon/best.png" alt="">
                        <p>Best Design Company 2019</p>
                    </div>
                </div>
                <!-- End Col -->
                <div class="col-md-12 col-lg-8">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="contact-us">
                                <div class="contact-icon">
                                    <i class="fa fa-map-o" aria-hidden="true"></i>
                                </div>
                                <!-- End contact Icon -->
                                <div class="contact-info">
                                    <h3>Can Tho</h3>
                                    <p>Ninh Kieu District</p>
                                </div>
                                <!-- End Contact Info -->
                            </div>
                            <!-- End Contact Us -->
                        </div>
                        <!-- End Col -->
                        <div class="col-md-6">
                            <div class="contact-us contact-us-last">
                                <div class="contact-icon">
                                    <i class="fa fa-volume-control-phone" aria-hidden="true"></i>
                                </div>
                                <!-- End contact Icon -->
                                <div class="contact-info">
                                    <h3>(84+)383659449</h3>
                                    <p>Give us a call</p>
                                </div>
                                <!-- End Contact Info -->
                            </div>
                            <!-- End Contact Us -->
                        </div>
                        <!-- End Col -->
                    </div>
                    <!-- End Contact Row -->
                    <div class="row">
                        <div class="col-md-12 col-lg-6">
                            <div class="footer-widget footer-left-widget">
                                <div class="section-heading">
                                    <h3>Utilities</h3>
                                    <span class="animate-border border-black"></span>
                                </div>
                                <ul>
                                    <li>
                                        <a href="index.php">About us</a>
                                    </li>
                                    <li>
                                        <a href="index.php">Services</a>
                                    </li>
                                    <li>
                                        <a href="index.php">Projects</a>
                                    </li>
                                    <li>
                                        <a href="index.php">Our Team</a>
                                    </li>
                                </ul>
                                <ul>
                                    <li>
                                        <a href="index.php">Contact us</a>
                                    </li>
                                    <li>
                                        <a href="index.php">Blog</a>
                                    </li>
                                    <li>
                                        <a href="index.php">Testimonials</a>
                                    </li>
                                    <li>
                                        <a href="index.php">Faq</a>
                                    </li>
                                </ul>
                            </div>
                            <!-- End Footer Widget -->
                        </div>
                        <!-- End col -->
                        <div class="col-md-12 col-lg-6">
                            <div class="footer-widget">
                                <div class="section-heading">
                                    <h3>Subscribe</h3>
                                    <span class="animate-border border-black"></span>
                                </div>
                                <p><!-- Don’t miss to subscribe to our new feeds, kindly fill the form below. -->
                                The content and images of the articles on the HePet site have been registered with the Digital Millennium Copyright Act (DMCA) under the Creative Commons Attribution-NoDerivs 3.0 Unported License standard.</p>
                                <form action="#">
                                    <div class="form-row">
                                        <div class="col dk-footer-form">
                                            <input type="email" class="form-control" placeholder="Email Address">
                                            <button type="submit">
                                                <i class="fa fa-send"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                                <!-- End form -->
                            </div>
                            <!-- End footer widget -->
                        </div>
                        <!-- End Col -->
                    </div>
                    <!-- End Row -->
                </div>
                <!-- End Col -->
            </div>
            <!-- End Widget Row -->
        </div>
        <!-- End Contact Container -->


        <div class="copyright">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <span>Copyright © 2021, All Right Reserved Seobin</span>
                    </div>
                    <!-- End Col -->
                    
                    <!-- End col -->
                </div>
                <!-- End Row -->
            </div>
            <!-- End Copyright Container -->
        </div>
        <!-- End Copyright -->
        <!-- Back to top -->
        <div id="back-to-top" class="back-to-top">
            <button class="btn btn-dark" title="Back to Top" style="display: block;">
                <i class="fa fa-angle-up"></i>
            </button>
        </div>
        <!-- End Back to top -->
</footer>
<!-- Latest jQuery form server -->
<script src="https://code.jquery.com/jquery.min.js"></script>
    
    <!-- Bootstrap JS form CDN -->
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
    
    <!-- jQuery sticky menu -->
    <!--<script src="js/owl.carousel.min.js"></script>-->
    <script src="js/jquery.sticky.js"></script>
    
    <!-- jQuery easing -->
    <script src="js/jquery.easing.1.3.min.js"></script>
    
    <!-- Main Script -->
    <script src="js/main.js"></script>
    
    <!-- Slider -->
    <script type="text/javascript" src="js/bxslider.min.js"></script>
	<script type="text/javascript" src="js/script.slider.js"></script>
    
    <!--data table - dat dung vi tri nay-->
    <script src="js/jquery.dataTables.min.js"/></script>
    <script src="js/dataTables.bootstrap.min.js"/></script>
    <script src="https://cdn.datatables.net/fixedheader/3.1.2/css/fixedHeader.bootstrap.min.css"></script>
    <script src="https://cdn.datatables.net/responsive/2.1.1/css/responsive.bootstrap.min.css"></script>
</body>
</html>