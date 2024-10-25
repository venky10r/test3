<!DOCTYPE html>
<html lang="en">
<head>
<title>View</title>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="description" content="myHOME - real estate template project">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="../styles/bootstrap-4.1.2/bootstrap.min.css">
<link href="../plugins/font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
<link href="../plugins/colorbox/colorbox.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="../styles/single.css">
<link rel="stylesheet" type="text/css" href="../styles/single_responsive.css">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<script src="../css/js/jquery-1.11.3.min.js" type="text/javascript"></script>
<script src="../css/js/jssor.slider-28.0.0.min.js" type="text/javascript"></script>
<link href="//fonts.googleapis.com/css?family=Montserrat:100,100italic,200,200italic,300,300italic,regular,italic,500,500italic,600,600italic,700,700italic,800,800italic,900,900italic&subset=latin-ext,cyrillic-ext,vietnamese,latin,cyrillic" rel="stylesheet" type="text/css" />
<link href="//fonts.googleapis.com/css?family=Roboto+Condensed:300,300italic,regular,italic,700,700italic&subset=latin-ext,greek-ext,cyrillic-ext,greek,vietnamese,latin,cyrillic" rel="stylesheet" type="text/css" />
<script src="../toast/toast.js"></script>
</head>

<body>
<?php 
    session_start();
    if($_SESSION['user']==""){
        echo "<script> iqwerty.toast.Toast('Please login to continue.'); 
                         window.setTimeout(function() { window.location = '../login?type=log&id={$_GET['id']}';  }, 4000);</script>";
    }
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
						<li><a href="#"><i class="fa fa-behance" aria-hidden="true"></i></a></li>
					</ul>
				</div>
				<div class="log_reg d-flex flex-row align-items-center justify-content-start">
					<ul class="d-flex flex-row align-items-start justify-content-start">
						   <?php if(isset($_SESSION['user'])){?>
                                        <li><a href="#">Welcome: <?php echo $_SESSION['fname']; ?></a></li>
                                        <li><a href="../config/logout.php"><i class="fa fa-lock" aria-hidden="true" title="Logout"></i></a></li>

                                   <?php }else{ ?>
					<li><a href="../login/">Login</a></li>
					<li><a href="../login/">Register</a></li>
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
                                        <li><a href="#">Welcome: <?php echo $_SESSION['fname']; ?></a></li>
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
						<div class="home_title">Listings</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Search -->

	<div class="search">
		

	<!-- Listing -->

	<div class="listing_container">
		<div class="container">
			<div class="row">
				<div class="col">
        <!-- Tabs -->
        
<!--<div class="listing_tabs d-flex flex-row align-items-start justify-content-between flex-wrap">

						 Tab 
						<div class="tab">
							<input type="radio" id="tab_1" name="listing_tabs" checked>
							<label for="tab_1"></label>
							<div class="tab_content d-flex flex-xl-row flex-column align-items-center justify-content-center">
								<div class="tab_icon"><img src="../images/house.svg" class="svg" alt=""></div>
								<span>open house</span>
							</div>
						</div>

						 Tab 
						<div class="tab">
							<input type="radio" id="tab_2" name="listing_tabs">
							<label for="tab_2"></label>
							<div class="tab_content d-flex flex-xl-row flex-column align-items-center justify-content-center">
								<div class="tab_icon"><img src="../images/houses.svg" class="svg" alt=""></div>
								<span>features</span>
							</div>
						</div>

						 Tab 
						<div class="tab">
							<input type="radio" id="tab_3" name="listing_tabs">
							<label for="tab_3"></label>
							<div class="tab_content d-flex flex-xl-row flex-column align-items-center justify-content-center">
								<div class="tab_icon"><img src="../images/house2.svg" class="svg" alt=""></div>
								<span>photos</span>
							</div>
						</div>

						 Tab 
						<div class="tab">
							<input type="radio" id="tab_6" name="listing_tabs">
							<label for="tab_6"></label>
							<div class="tab_content d-flex flex-xl-row flex-column align-items-center justify-content-center">
								<div class="tab_icon"><img src="../images/location.svg" class="svg" alt=""></div>
								<span>location</span>
							</div>
						</div>
					</div>-->

					<!-- About -->
					<div class="about">
						<div class="row">
                                                    <?php 
                                                        include "../config/dbconnection.php";
                                                        $query="Select * from tblsitedetails,tblsite where id='{$_GET['id']}' and tblsite.siteid=tblsitedetails.siteid";
                                                        $result1=  mysqli_query($conn,$query) or die(mysqli_error($conn));
                                                        while($row1=mysqli_fetch_assoc($result1))
                                                        {
                                                    ?>
							<div class="col-lg-6">
								<div class="property_info">
									<div class="tag_price listing_price">Rs. <?php echo $row1['rate']; ?> / sq ft</div>
									<div class="listing_name"><h1><?php echo $row1['blocktype']; ?></h1></div>
									<div class="listing_location d-flex flex-row align-items-start justify-content-start">
                                                                                    <img src="../images/icon_3_large.png" alt="">
										<span><?php echo $row1['amenity']; ?></span>
									</div>
                                                                         <?php 
                                                                                $res=mysqli_query($conn,"select count(*) as cnt from tblbook where bookid='{$_GET['id']}' and accepted='Y'") or die(mysqli_error($conn));
                                                                                $row=mysqli_fetch_assoc($res) or die(mysqli_error($conn));
                                                                                            
                                                                                           ?>
									<div class="listing_list">
										<ul>
											<li>Property ID &nbsp;: <?php echo $row1['id']; ?></li>
                                                                                        <li>Total Floors&nbsp;: <?php echo $row1['floors']; ?></li>
                                                                                        <li>Total Blocks&nbsp;: <?php echo $row1['blocks']; ?></li>
                                                                                        <li>Available &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <?php echo $row1['blocks']-$row['cnt']; ?></li>
                                                                                        <li>Total Price &nbsp;&nbsp;: <?php echo number_format($row1['total']*$row1['rate'], 2, '.', ','); ?></li>
										</ul>
									</div>
									
									<div class="prop_info">
										<ul class="d-flex flex-row align-items-center justify-content-start flex-wrap">
											<li class="d-flex flex-row align-items-center justify-content-start">
												<img src="../images/icon_2_large.png" alt="">
												<div>
													<div><?php echo $row1['total']; ?></div>
													<div>Total Area</div>
												</div>
											</li>
											
											<li class="d-flex flex-row align-items-center justify-content-start">
												<img src="../images/icon_4_large.png" alt="">
												<div>
													<div><?php  echo $row1['builtup']; ?></div>
													<div>Built-up Area</div>
												</div>
											</li>
                                                                                         <?php 
                                                                                            $res=mysqli_query($conn,"select count(*) as cnt from tblbook where bookid='{$_GET['id']}'") or die(mysqli_error($conn));
                                                                                            $row=mysqli_fetch_assoc($res) or die(mysqli_error($conn));
                                                                                            
                                                                                           ?>
											<li class="d-flex flex-row align-items-center justify-content-start">
												<img src="../images/icon_5_large.png" alt="">
												<div>
													<div><?php  echo $row1['carpet']; ?></div>
													<div>Carpet Area</div>
												</div>
											</li>
                                                                                        
                                                                                        <?php 
                                                                                           
                                                                                            if(($row1['blocks']-$row['cnt'])>0){
                                                                                        ?>
                                                                                        <div class="prop_info">
                                                                                            <div class="tag_price listing_price"><a href="?bookid=<?php echo $row1['id']; ?>&id=<?php echo $row1['id']; ?>">Book Now</a></div>
                                                                                        </div>
                                                                                        <?php } else{ ?>
                                                                                            <div class="prop_info">
                                                                                                <div class="submit ml-auto"><a href="#">Not Available</a></div>
                                                                                        </div>
                                                                                       <?php } ?>

                                                                                        
										</ul><br/><br/>
                                                                            
									</div>
								</div>
							</div><br/><br/>
							<?php } ?>
						</div>		
					</div>
				</div>
			</div>
		</div>
	</div>
        
        <?php
        if(isset($_GET['bookid'])){
            $query="insert into tblbook(bookid,username) values('{$_GET['bookid']}','{$_SESSION['user']}')";
            $result=mysqli_query($conn,$query);
            if($result){
                 echo "<script> iqwerty.toast.Toast('Request sent to admin.'); 
                         window.setTimeout(function() { window.location = '../';  }, 4000);</script>";
    
            }else{
                 if($result){
                 echo "<script> iqwerty.toast.Toast('Request cannot be proceed. Please try later.'); 
                         window.setTimeout(function() { window.location = '';  }, 4000);</script>";
            }
        }
        }
        ?>

	<!-- Footer -->
<?php include "../include/infooter.php"; ?>
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