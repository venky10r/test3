<!DOCTYPE html>
<html lang="en">
<head>
<title>Royal Estate</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1"/>
<meta http-equiv="X-UA-Compatible" content="IE=edge"/>
<link rel="stylesheet" type="text/css" href="styles/bootstrap-4.1.2/bootstrap.min.css"/>
<link href="plugins/font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
<link rel="stylesheet" type="text/css" href="plugins/OwlCarousel2-2.3.4/owl.carousel.css"/>
<link rel="stylesheet" type="text/css" href="plugins/OwlCarousel2-2.3.4/owl.theme.default.css"/>
<link rel="stylesheet" type="text/css" href="plugins/OwlCarousel2-2.3.4/animate.css"/>
<link rel="stylesheet" type="text/css" href="styles/main_styles.css"/>
<link rel="stylesheet" type="text/css" href="styles/responsive.css"/>
</head>

<body>
<?php 
session_start(); 
?>
<div class="super_container">
	<div class="super_overlay"></div>
	
	<!-- Header -->
	<header class="header">
		
		<!-- Header Bar -->
		<div class="header_bar d-flex flex-row align-items-center justify-content-start">			
			<div class="ml-auto d-flex flex-row align-items-center justify-content-start">
				<div class="social">
					<ul class="d-flex flex-row align-items-center justify-content-start">
						<li><a href="#"><i class="fa fa-pinterest" aria-hidden="true"></i></a></li>
						<li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
						<li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
						<li><a href="#"><i class="fa fa-dribbble" aria-hidden="true"></i></a></li>
					</ul>
				</div>
				<div class="log_reg d-flex flex-row align-items-center justify-content-start">
					<ul class="d-flex flex-row align-items-start justify-content-start">
						   <?php if(isset($_SESSION['user'])){?>
                                        <li><a href="#">Welcome: <?php echo $_SESSION['fname']; ?></a></li>&nbsp;&nbsp;
                                        <li><a href="bookings/">Bookings</a></li>&nbsp;&nbsp;
                                        <li><a href="requests/">Requests</a></li>&nbsp;&nbsp;
                                        <li><a href="profile/">Profile</a></li>&nbsp;&nbsp;
                                        <li><a href="config/logout.php"><i class="fa fa-lock" aria-hidden="true" title="Logout"></i></a></li>

                                   <?php }else{ ?>
					<li><a href="login/">Login</a></li>
					<li><a href="login/">Register</a></li>
                                        <li><a href="config/logout.php"><i class="fa fa-lock" aria-hidden="true" title="Logout"></i></a></li>
                                        <?php } ?>
					</ul>
				</div>
			</div>
		</div>

		<!-- Header Content -->
		<div class="header_content d-flex flex-row align-items-center justify-content-start">
			<div class="logo"><a href="#">Royal<span>Estate</span></a></div>
			<?php include 'include/menu.php'; ?>
			<div class="submit ml-auto"><a href="admin/">Admin</a></div>
			<div class="hamburger ml-auto"><i class="fa fa-bars" aria-hidden="true"></i></div>
		</div>
	</header>

	<!-- Menu -->

	<div class="menu text-right">
        	<div class="menu_close"><i class="fa fa-times" aria-hidden="true"></i></div>
                    <div class="menu_log_reg">
			<div class="log_reg d-flex flex-row align-items-center justify-content-end">
				<ul class="d-flex flex-row align-items-start justify-content-start">
						   <?php if(isset($_SESSION['user'])){?>
                                        <li><a href="#">Welcome: <?php echo $_SESSION['fname']; ?></a></li>&nbsp;&nbsp;
                                        <li><a href="bookings/">Bookings</a></li>&nbsp;&nbsp;
                                         <li><a href="requests/">Requests</a></li>&nbsp;&nbsp;
                                         <li><a href="profile/">Profile</a></li>&nbsp;&nbsp;
                                        <li><a href="config/logout.php"><i class="fa fa-lock" aria-hidden="true" title="Logout"></i></a></li>

                                   <?php }else{ ?>
					<li><a href="login/">Login</a></li>
					<li><a href="login/">Register</a></li>
                                        <?php } ?>
					</ul>
			</div>
                        <?php include 'include/menu.php'; ?>
		</div>
	</div>

	<!-- Home -->

	<div class="home">
		
		<!-- Home Slider -->
		<div class="home_slider_container">
			 <div class="owl-carousel owl-theme home_slider">
			 	
			 	<!-- Slide -->
			 	<div class="slide">
			 		<div class="background_image" style="background-image:url(images/blog_1.jpg)"></div>
			 	</div>

			 	<!-- Slide -->
			 	<div class="slide">
			 		<div class="background_image" style="background-image:url(images/blog_2.jpg)"></div>
			 		</div>

			 	<!-- Slide -->
			 	<div class="slide">
			 		<div class="background_image" style="background-image:url(images/index.jpg)"></div>
			 	</div>

			 </div>

			 <!-- Home Slider Navigation -->
			 <div class="home_slider_nav"><i class="fa fa-angle-right" aria-hidden="true"></i></div>
		</div>
	</div>
	<!-- Search -->
	<div class="search">
		<div class="container">
			<div class="row">
				<div class="col">
					<div class="search_container">
						<div class="search_title">Find your home</div>
						<div class="search_form_container">
							<form action="" method="post" class="search_form" id="search_form">
                                                             <?php 
                                                                 include "config/dbconnection.php";
                                                             ?>
								<div class="d-flex flex-lg-row flex-column align-items-start justify-content-lg-between justify-content-lg-between">
									<div class="search_inputs d-flex flex-lg-row flex-column align-items-start justify-content-lg-between justify-content-lg-between">
										<select name="loc" class="search_input">
                                                                                    	<?php 
                                                                                               $query="select distinct(location) from tblsite order by location";
                                                                                               $result=  mysqli_query($conn,$query);
                                                                                               while($row=mysqli_fetch_assoc($result)){
                                                                                           ?>
                                                                                            <option><?php echo $row['location']; ?></option>
                                                                                            <?php } ?>
                                                                                          </select>
										<select name="prop" id="prop" class="search_input"><option>Select</option>
                                                                                        <?php 
                                                                                           $query="select distinct(sitetype) from tblsite order by sitetype";
                                                                                           $result=  mysqli_query($conn,$query);
                                                                                           while($row=mysqli_fetch_assoc($result)){
                                                                                       ?>
                                                                                        <option><?php echo $row['sitetype']; ?></option>
                                                                                        <?php } ?>
                                                                                    </select>
									</div>
									<button type="submit" name="sub" class="search_button">submit listing</button>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Featured -->

	<div class="featured">
		<div class="container">
			<div class="row">
				<div class="col">
					<div class="section_title_container text-center">
						<div class="section_subtitle">the best deals</div>
						<div class="section_title"><h1>Featured Properties</h1></div>
					</div>
				</div>
			</div>
			<div class="row featured_row">
                        <?php 
                                include "config/dbconnection.php";
                                if(isset($_REQUEST['sub'])){
                                    $query="select * from tblsite where location='{$_POST['loc']}' and sitetype='{$_POST['prop']}'";
                                }
                                else{
                                    $query="select * from tblsite";
                                }
                                $result=mysqli_query($conn,$query);
                                while($row=mysqli_fetch_assoc($result)){
                                    $res=mysqli_query($conn,"select min(rate) as rate, max(total) as total, floors, blocktype from tblsitedetails where siteid='{$row['siteid']}'") or die(mysqli_error($conn));
                                    $row1=  mysqli_fetch_assoc($res);
                         ?>
				<!-- Featured Item -->
				<div class="col-lg-4">
					<div class="listing">
						<div class="listing_image">
							<div class="listing_image_container">
								<img src="displayimg/<?php echo $row['fileloc']; ?>" alt="">
							</div>
							<div class="tags d-flex flex-row align-items-start justify-content-start flex-wrap">
								<div class="tag tag_house"><a href="single.php?id=<?php echo $row['siteid']; ?>&name=<?php echo $row['name']; ?>"><?php echo $row['sitetype']; ?></a></div>
							</div>
							<div class="tag_price listing_price">Starting @ Rs. <?php echo $row1['rate']; ?> / sq ft.</div>
						</div>
						<div class="listing_content">
							<div class="prop_location listing_location d-flex flex-row align-items-start justify-content-start">
								<img src="images/icon_1.png" alt="">
								<a href="single.php?id=<?php echo $row['siteid']; ?>&name=<?php echo $row['name']; ?>"><?php echo $row['address'];?></a>
							</div>
							<div class="listing_info">
								<ul class="d-flex flex-row align-items-center justify-content-start flex-wrap">
									<li class="property_area d-flex flex-row align-items-center justify-content-start">
										<img src="images/icon_2.png" alt="">
										<span><?php echo $row1['total']; ?> sq ft</span>
									</li>
<!--									<li class="d-flex flex-row align-items-center justify-content-start">
										<img src="images/icon_3.png" alt="">
										<span>2</span>
									</li>-->
									<li class="d-flex flex-row align-items-center justify-content-start">
										<img src="images/icon_4.png" alt="">
										<span><?php echo $row1['floors'] ?> Floors</span>
									</li>
									<li class="d-flex flex-row align-items-center justify-content-start">
										<img src="images/icon_5.png" alt="">
										<span><?php echo $row1['blocktype']; ?></span>
									</li>
								</ul>
							</div>
						</div>
					</div>
				</div>
                        <?php      } ?>
			</div>
		</div>
	</div>

	<!-- Map Section -->
        
	<?php include "include/footer.php"; ?>
</div>

<script src="js/jquery-3.3.1.min.js"></script>
<script src="styles/bootstrap-4.1.2/popper.js"></script>
<script src="styles/bootstrap-4.1.2/bootstrap.min.js"></script>
<script src="plugins/greensock/TweenMax.min.js"></script>
<script src="plugins/greensock/TimelineMax.min.js"></script>
<script src="plugins/scrollmagic/ScrollMagic.min.js"></script>
<script src="plugins/greensock/animation.gsap.min.js"></script>
<script src="plugins/greensock/ScrollToPlugin.min.js"></script>
<script src="plugins/OwlCarousel2-2.3.4/owl.carousel.js"></script>
<script src="plugins/easing/easing.js"></script>
<script src="plugins/progressbar/progressbar.min.js"></script>
<script src="plugins/parallax-js-master/parallax.min.js"></script>
<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&key=AIzaSyCIwF204lFZg1y4kPSIhKaHEXMLYxxuMhA"></script>
<script src="js/custom.js"></script>
</body>
</html>