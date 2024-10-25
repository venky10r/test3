<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">
<head>
<title>Status</title>
<meta charset="utf-8"/>
<meta http-equiv="X-UA-Compatible" content="IE=edge"/>
<meta name="description" content="myHOME - real estate template project"/>
<meta name="viewport" content="width=device-width, initial-scale=1"/>
<link rel="stylesheet" type="text/css" href="../styles/bootstrap-4.1.2/bootstrap.min.css"/>
<link href="../plugins/font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css"/>
<link href="../plugins/colorbox/colorbox.css" rel="stylesheet" type="text/css"/>
<link rel="stylesheet" type="text/css" href="../styles/single.css"/>
<link rel="stylesheet" type="text/css" href="../styles/single_responsive.css"/>
<link rel="stylesheet" type="text/css" href="../styles/contact.css"/>
<link rel="stylesheet" type="text/css" href="../styles/contact_responsive.css"/>
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css"/>
<script src="../css/js/jquery-1.11.3.min.js" type="text/javascript"></script>
<script src="../css/js/jssor.slider-28.0.0.min.js" type="text/javascript"></script>
<link href="//fonts.googleapis.com/css?family=Montserrat:100,100italic,200,200italic,300,300italic,regular,italic,500,500italic,600,600italic,700,700italic,800,800italic,900,900italic&subset=latin-ext,cyrillic-ext,vietnamese,latin,cyrillic" rel="stylesheet" type="text/css" />
<link href="//fonts.googleapis.com/css?family=Roboto+Condensed:300,300italic,regular,italic,700,700italic&subset=latin-ext,greek-ext,cyrillic-ext,greek,vietnamese,latin,cyrillic" rel="stylesheet" type="text/css" />
<script src="../toast/toast.js"></script>
</head>
<script type="text/javascript">
    function valid(){ 
        if(document.add.old.value == document.add.pass.value)
    {
        iqwerty.toast.Toast("Old and New password cannot be same");
        document.add.pass.focus();
        return false;
    }
        
        if(document.add.pass.value!= document.add.repass.value)
    {
        iqwerty.toast.Toast("Password and Confirm Password Fields do not match...!");
        document.add.repass.focus();
        return false;
    }
    
    return true;
    }
</script>
<body>
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
						<li><a href="#"><i class="fa fa-behance" aria-hidden="true"></i></a></li>
					</ul>
				</div>
				<div class="log_reg d-flex flex-row align-items-center justify-content-start">
					<ul class="d-flex flex-row align-items-start justify-content-start">
						   <?php if(isset($_SESSION['user'])){?>
                                        <li><a href="#">Welcome: <?php echo $_SESSION['fname']; ?></a></li>&nbsp;&nbsp;
                                        <li><a href="../bookings/">Bookings</a></li>&nbsp;&nbsp;
                                        <li><a href="../requests/">Requests</a></li>&nbsp;&nbsp;
                                        <li><a href="../profile/">Profile</a></li>&nbsp;&nbsp;
                                        <li><a href="../config/logout.php"><i class="fa fa-lock" aria-hidden="true" title="Logout"></i></a></li>

                                   <?php }else{ ?>
					<li><a href="login/">Login</a></li>
					<li><a href="login/">Register</a></li>
                                        <?php } ?>
					</ul>
				</div>
			</div>
		</div>

		<!-- Header Content -->
		<div class="header_content d-flex flex-row align-items-center justify-content-start">
			<div class="logo"><a href="#">Royal<span>Estate</span></a></div>
			<?php include '../include/inmenu.php'; ?>
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
                                        <li><a href="../bookings/">Bookings</a></li>&nbsp;&nbsp;
                                        <li><a href="../requests/">Requests</a></li>&nbsp;&nbsp;
                                        <li><a href="../profile/">Profile</a></li>&nbsp;&nbsp;
                                        <li><a href="../config/logout.php"><i class="fa fa-lock" aria-hidden="true" title="Logout"></i></a></li>

                                   <?php }else{ ?>
					<li><a href="../login/">Login</a></li>
					<li><a href="../login/">Register</a></li>
                                        <?php } ?>
				</ul>
			</div>
			<?php include '../include/inmenu.php'; ?>
		</div>
	</div>

	<!-- Home -->

	<div class="home">
		<div class="parallax_background parallax-window" data-parallax="scroll" data-image-src="../images/listings.jpg" data-speed="0.8"></div>
		<div class="container">
			<div class="row">
				<div class="col">
					<div class="home_content text-center">
						<div class="home_title">Site Status</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Search -->

	<div class="listing_container">
		<div class="container">
			<div class="row">
				<div class="col">
  <?php 
  include '../config/dbconnection.php';
  $query="select * from tblusers where email='{$_SESSION['user']}'";
  $result=mysqli_query($conn,$query);
  $row=mysqli_fetch_assoc($result);
  ?>
					<!-- About -->
					<div class="about">
						<div class="row">
							<div class="col-lg">
								<div class="property_info">
									<div class="tag_price listing_price col-md-12" style="text-align: center">Site Status</div><div>&nbsp;</div>                                                                      
                                             <table class="table table-bordered datatable" id="table-1">
			<thead>
				<tr>
					<th>Sl No</th>
					<th>Site Name</th>
					<th>Location</th>
					<th>Block Type</th>
                                        <th>View Details</th>
				</tr>
			</thead>
				<tbody>
                                    <?php
					$query="select * from tblbook where username='{$_SESSION['user']}'";
					$result=mysqli_query($conn, $query);
					$sno=1;
					            while ($row = mysqli_fetch_assoc($result)){
                                                        $query="SELECT * FROM tblsite as s,tblsitedetails as d,tblusers as u where u.email='{$row['username']}' and d.id='{$row['bookid']}' and s.siteid=d.siteid";
                                                        $result1=mysqli_query($conn,$query);
                                                        if(mysqli_num_rows($result1)){
                                                            $row1=mysqli_fetch_assoc($result1);
                                                            echo "<tr><td>" . $sno . "</td>";
                                                            echo "<td>" . $row1['name'] ."</td>";
                                                            echo "<td>" . $row1['location'];"</td>";
                                                            echo "<td>" . $row1['blocktype'] ."</td>";
                                                            echo "<td><a href='../workdetails/?bookid={$row['id']}&siteid={$row['bookid']}&site={$row1['name']}'>View Details</a></td>";
                                                            $sno++;
                                                        }
					            }
					?>	
                                </tbody>
                                             </table>	
                                                </div>	
                                            </div>		
					</div>
				</div>
			</div>
		</div>
	</div>
        </div>
        <!-- Footer -->

	<footer class="footer">
		<div class="footer_content">
			<div class="container">
				<div class="row">
					
					<!-- Footer Column -->
					<div class="col-xl-3 col-lg-6 footer_col">
						<div class="footer_about">
							<div class="footer_logo"><a href="#">my<span>home</span></a></div>
							<div class="footer_text">
								<p>Nulla aliquet bibendum sem, non placerat risus venenatis at. Prae sent vulputate bibendum dictum. Cras at vehicula urna. Suspendisse fringilla lobortis justo, ut tempor leo cursus in.</p>
							</div>
							<div class="social">
								<ul class="d-flex flex-row align-items-center justify-content-start">
									<li><a href="#"><i class="fa fa-pinterest" aria-hidden="true"></i></a></li>
									<li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
									<li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
									<li><a href="#"><i class="fa fa-dribbble" aria-hidden="true"></i></a></li>
									<li><a href="#"><i class="fa fa-behance" aria-hidden="true"></i></a></li>
								</ul>
							</div>
							<div class="footer_submit"><a href="#">submit listing</a></div>
						</div>
					</div>

					<!-- Footer Column -->
					<div class="col-xl-3 col-lg-6 footer_col">
						<div class="footer_column">
							<div class="footer_title">Information</div>
							<div class="footer_info">
								<ul>
									<!-- Phone -->
									<li class="d-flex flex-row align-items-center justify-content-start">
										<div><img src="../images/phone-call.svg" alt=""></div>
										<span>+546 990221 123</span>
									</li>
									<!-- Address -->
									<li class="d-flex flex-row align-items-center justify-content-start">
										<div><img src="../images/placeholder.svg" alt=""></div>
										<span>Main Str, no 23, New York</span>
									</li>
									<!-- Email -->
									<li class="d-flex flex-row align-items-center justify-content-start">
										<div><img src="../images/envelope.svg" alt=""></div>
										<span>hosting@contact.com</span>
									</li>
								</ul>
							</div>
							<div class="footer_links usefull_links">
								<div class="footer_title">Usefull Links</div>
								<ul>
									<li><a href="#">Testimonials</a></li>
									<li><a href="#">Listings</a></li>
									<li><a href="#">Featured Properties</a></li>
									<li><a href="#">Contact Agents</a></li>
									<li><a href="#">About us</a></li>
								</ul>
							</div>
						</div>
					</div>

					<!-- Footer Column -->
					<div class="col-xl-3 col-lg-6 footer_col">
						<div class="footer_links">
							<div class="footer_title">Properties Types</div>
							<ul>
								<li><a href="#">Properties for rent</a></li>
								<li><a href="#">Properties for sale</a></li>
								<li><a href="#">Commercial</a></li>
								<li><a href="#">Homes</a></li>
								<li><a href="#">Villas</a></li>
								<li><a href="#">Office</a></li>
								<li><a href="#">Residential</a></li>
								<li><a href="#">Appartments</a></li>
								<li><a href="#">Off plan</a></li>
							</ul>
						</div>
					</div>

					<!-- Footer Column -->
					<div class="col-xl-3 col-lg-6 footer_col">
						<div class="footer_title">Featured Property</div>
						<div class="listing_small">
							<div class="listing_small_image">
								<div>
									<img src="../images/listing_1.jpg" alt="">
								</div>
								<div class="listing_small_tags d-flex flex-row align-items-start justify-content-start flex-wrap">
									<div class="listing_small_tag tag_house"><a href="listings.html">house</a></div>
									<div class="listing_small_tag tag_sale"><a href="listings.html">for sale</a></div>
								</div>
								<div class="listing_small_price">$ 562 346</div>
							</div>
							<div class="listing_small_content">
								<div class="listing_small_location d-flex flex-row align-items-start justify-content-start">
									<img src="../images/icon_1.png" alt="">
									<a href="single.html">280 Doe Meadow Drive Landover, MD 20785</a>
								</div>
								<div class="listing_small_info">
									<ul class="d-flex flex-row align-items-center justify-content-start flex-wrap">
										<li class="d-flex flex-row align-items-center justify-content-start">
											<img src="../images/icon_3.png" alt="">
											<span>2</span>
										</li>
										<li class="d-flex flex-row align-items-center justify-content-start">
											<img src="../images/icon_4.png" alt="">
											<span>5</span>
										</li>
										<li class="d-flex flex-row align-items-center justify-content-start">
											<img src="images/icon_5.png" alt="">
											<span>2</span>
										</li>
									</ul>
								</div>
							</div>
						</div>
					</div>

				</div>
			</div>
		</div>
		<div class="footer_bar">
			<div class="container">
				<div class="row">
					<div class="col">
						<div class="footer_bar_content d-flex flex-md-row flex-column align-items-md-center align-items-start justify-content-start">
							<div class="copyright order-md-1 order-2"><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
<!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. --></div>
							<nav class="footer_nav order-md-2 order-1 ml-md-auto">
								<ul class="d-flex flex-md-row flex-column align-items-md-center align-items-start justify-content-start">
									<li><a href="index.html">Home</a></li>
									<li><a href="about.html">About us</a></li>
									<li><a href="listings.html">Listings</a></li>
									<li><a href="blog.html">News</a></li>
									<li><a href="contact.html">Contact</a></li>
								</ul>
							</nav>
						</div>
					</div>
				</div>
			</div>
		</div>
	</footer>
</div>

<script src="../js/jquery-3.3.1.min.js"></script>
<script src="../styles/bootstrap-4.1.2/popper.js"></script>
<script src="../styles/bootstrap-4.1.2/bootstrap.min.js"></script>
<script src="../plugins/greensock/TweenMax.min.js"></script>
<script src="../plugins/greensock/TimelineMax.min.js"></script>
<script src="../plugins/scrollmagic/ScrollMagic.min.js"></script>
<script src="../plugins/greensock/animation.gsap.min.js"></script>
<script src="../plugins/greensock/ScrollToPlugin.min.js"></script>
<script src="../plugins/easing/easing.js"></script>
<script src="../plugins/progressbar/progressbar.min.js"></script>
<script src="../plugins/parallax-js-master/parallax.min.js"></script>
<script src="../plugins/colorbox/jquery.colorbox-min.js"></script>
<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&key=AIzaSyCIwF204lFZg1y4kPSIhKaHEXMLYxxuMhA"></script>
<script src="../js/single.js"></script>
</body>
</html>