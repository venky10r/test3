<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Single Listing</title>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="description" content="myHOME - real estate template project">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="styles/bootstrap-4.1.2/bootstrap.min.css">
<link href="plugins/font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
<link href="plugins/colorbox/colorbox.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="styles/single.css">
<link rel="stylesheet" type="text/css" href="styles/single_responsive.css">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<script src="css/js/jquery-1.11.3.min.js" type="text/javascript"></script>
<script src="css/js/jssor.slider-28.0.0.min.js" type="text/javascript"></script>
<link href="//fonts.googleapis.com/css?family=Montserrat:100,100italic,200,200italic,300,300italic,regular,italic,500,500italic,600,600italic,700,700italic,800,800italic,900,900italic&subset=latin-ext,cyrillic-ext,vietnamese,latin,cyrillic" rel="stylesheet" type="text/css" />
<link href="//fonts.googleapis.com/css?family=Roboto+Condensed:300,300italic,regular,italic,700,700italic&subset=latin-ext,greek-ext,cyrillic-ext,greek,vietnamese,latin,cyrillic" rel="stylesheet" type="text/css" />
<script src="../toast/toast.js"></script>
</head>
<style>
        /*jssor slider loading skin double-tail-spin css*/
        .jssorl-004-double-tail-spin img {
            animation-name: jssorl-004-double-tail-spin;
            animation-duration: 1.6s;
            animation-iteration-count: infinite;
            animation-timing-function: linear;
        }

        @keyframes jssorl-004-double-tail-spin {
            from { transform: rotate(0deg); }
            to { transform: rotate(360deg); }
        }

        /*jssor slider bullet skin 031 css*/
        .jssorb031 {position:absolute;}
        .jssorb031 .i {position:absolute;cursor:pointer;}
        .jssorb031 .i .b {fill:#000;fill-opacity:0.5;stroke:#fff;stroke-width:1200;stroke-miterlimit:10;stroke-opacity:0.3;}
        .jssorb031 .i:hover .b {fill:#fff;fill-opacity:.7;stroke:#000;stroke-opacity:.5;}
        .jssorb031 .iav .b {fill:#fff;stroke:#000;fill-opacity:1;}
        .jssorb031 .i.idn {opacity:.3;}

        /*jssor slider arrow skin 051 css*/
        .jssora051 {display:block;position:absolute;cursor:pointer;}
        .jssora051 .a {fill:none;stroke:#fff;stroke-width:360;stroke-miterlimit:10;}
        .jssora051:hover {opacity:.8;}
        .jssora051.jssora051dn {opacity:.5;}
        .jssora051.jssora051ds {opacity:.3;pointer-events:none;}
    </style>
<script type="text/javascript">
        jQuery(document).ready(function ($) {

            var jssor_1_SlideoTransitions = [
              [{b:500,d:1000,x:0,e:{x:6}}],
              [{b:-1,d:1,x:100,p:{x:{d:1,dO:9}}},{b:0,d:2000,x:0,e:{x:6},p:{x:{dl:0.1}}}],
              [{b:-1,d:1,x:200,p:{x:{d:1,dO:9}}},{b:0,d:2000,x:0,e:{x:6},p:{x:{dl:0.1}}}],
              [{b:-1,d:1,rX:20,rY:90},{b:0,d:4000,rX:0,e:{rX:1}}],
              [{b:-1,d:1,rY:-20},{b:0,d:4000,rY:-90,e:{rY:7}}],
              [{b:-1,d:1,sX:2,sY:2},{b:1000,d:3000,sX:1,sY:1,e:{sX:1,sY:1}}],
              [{b:-1,d:1,sX:2,sY:2},{b:1000,d:5000,sX:1,sY:1,e:{sX:3,sY:3}}],
              [{b:-1,d:1,tZ:300},{b:0,d:2000,o:1},{b:3500,d:3500,tZ:0,e:{tZ:1}}],
              [{b:-1,d:1,x:20,p:{x:{o:33,r:0.5}}},{b:0,d:1000,x:0,o:0.5,e:{x:3,o:1},p:{x:{dl:0.05,o:33},o:{dl:0.02,o:68,rd:2}}},{b:1000,d:1000,o:1,e:{o:1},p:{o:{dl:0.05,o:68,rd:2}}}],
              [{b:-1,d:1,da:[0,700]},{b:0,d:600,da:[700,700],e:{da:1}}],
              [{b:600,d:1000,o:0.4}],
              [{b:-1,d:1,da:[0,400]},{b:200,d:600,da:[400,400],e:{da:1}}],
              [{b:800,d:1000,o:0.4}],
              [{b:-1,d:1,sX:1.1,sY:1.1},{b:0,d:1600,o:1},{b:1600,d:5000,sX:0.9,sY:0.9,e:{sX:1,sY:1}}],
              [{b:0,d:1000,o:1,p:{o:{o:4}}}],
              [{b:1000,d:1000,o:1,p:{o:{o:4}}}]
            ];

            var jssor_1_options = {
              $AutoPlay: 1,
              $CaptionSliderOptions: {
                $Class: $JssorCaptionSlideo$,
                $Transitions: jssor_1_SlideoTransitions
              },
              $ArrowNavigatorOptions: {
                $Class: $JssorArrowNavigator$
              },
              $BulletNavigatorOptions: {
                $Class: $JssorBulletNavigator$
              }
            };

            var jssor_1_slider = new $JssorSlider$("jssor_1", jssor_1_options);

            /*#region responsive code begin*/

            var MAX_WIDTH = 980;

            function ScaleSlider() {
                var containerElement = jssor_1_slider.$Elmt.parentNode;
                var containerWidth = containerElement.clientWidth;

                if (containerWidth) {

                    var expectedWidth = Math.min(MAX_WIDTH || containerWidth, containerWidth);

                    jssor_1_slider.$ScaleWidth(expectedWidth);
                }
                else {
                    window.setTimeout(ScaleSlider, 30);
                }
            }

            ScaleSlider();

            $(window).bind("load", ScaleSlider);
            $(window).bind("resize", ScaleSlider);
            $(window).bind("orientationchange", ScaleSlider);
            /*#endregion responsive code end*/
        });
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
                                        <li><a href="#">Welcome: <?php echo $_SESSION['fname']; ?></a></li>
                                        <li><a href="config/logout.php"><i class="fa fa-lock" aria-hidden="true" title="Logout"></i></a></li>

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
                                        <li><a href="#">Welcome: <?php echo $_SESSION['fname']; ?></a></li>
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
		<div class="parallax_background parallax-window" data-parallax="scroll" data-image-src="images/listings.jpg" data-speed="0.8"></div>
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
<div class="tag_price listing_price"> <?php echo $_GET['name']; ?></div><br/><br/>
<div id="jssor_1" style="position:relative;margin:0 auto;top:0px;left:0px;width:980px;height:380px;overflow:hidden;visibility:hidden;">
        <!-- Loading Screen -->
        <div data-u="loading" class="jssorl-004-double-tail-spin" style="position:absolute;top:0px;left:0px;width:100%;height:100%;text-align:center;background-color:rgba(0,0,0,0.7);">
            <img style="margin-top:-19px;position:relative;top:50%;width:38px;height:38px;" src="img/double-tail-spin.svg" />
        </div>
        <div data-u="slides" style="cursor:default;position:relative;top:0px;left:0px;width:980px;height:380px;overflow:hidden;">
            <?php 
include 'config/dbconnection.php';
$query="select * from tblsiteimages where siteid='{$_GET['id']}'";
$result=mysqli_query($conn,$query)or die(mysqli_error());
?>
					<!-- Image -->
<!--					<div class="listing_image"><img src="images/listing.jpg" alt=""></div>-->
  
         <?php
    while($row=mysqli_fetch_assoc($result)){ 
        $img="displayimg/".$row['filename'];
        ?>            
            <div>
                <img data-u='image' src='siteimages/<?php echo $row['filename'] ?>' />
                
            </div>
               <?php } ?>                         
                                        
        </div>
        <!-- Bullet Navigator -->
        <div data-u="navigator" class="jssorb031" style="position:absolute;bottom:12px;right:12px;" data-autocenter="1" data-scale="0.5" data-scale-bottom="0.75">
            <div data-u="prototype" class="i" style="width:16px;height:16px;">
                <svg viewbox="0 0 16000 16000" style="position:absolute;top:0;left:0;width:100%;height:100%;">
                    <circle class="b" cx="8000" cy="8000" r="5800"></circle>
                </svg>
            </div>
        </div>
        <!-- Arrow Navigator -->
        <div data-u="arrowleft" class="jssora051" style="width:55px;height:55px;top:0px;left:25px;" data-autocenter="2" data-scale="0.75" data-scale-left="0.75">
            <svg viewbox="0 0 16000 16000" style="position:absolute;top:0;left:0;width:100%;height:100%;">
                <polyline class="a" points="11040,1920 4960,8000 11040,14080 "></polyline>
            </svg>
        </div>
        <div data-u="arrowright" class="jssora051" style="width:55px;height:55px;top:0px;right:25px;" data-autocenter="2" data-scale="0.75" data-scale-right="0.75">
            <svg viewbox="0 0 16000 16000" style="position:absolute;top:0;left:0;width:100%;height:100%;">
                <polyline class="a" points="4960,1920 11040,8000 4960,14080 "></polyline>
            </svg>
        </div>
    </div>
        <!-- Loading Screen -->

        <!-- Tabs -->
        
<!--<div class="listing_tabs d-flex flex-row align-items-start justify-content-between flex-wrap">

						 Tab 
						<div class="tab">
							<input type="radio" id="tab_1" name="listing_tabs" checked>
							<label for="tab_1"></label>
							<div class="tab_content d-flex flex-xl-row flex-column align-items-center justify-content-center">
								<div class="tab_icon"><img src="images/house.svg" class="svg" alt=""></div>
								<span>open house</span>
							</div>
						</div>

						 Tab 
						<div class="tab">
							<input type="radio" id="tab_2" name="listing_tabs">
							<label for="tab_2"></label>
							<div class="tab_content d-flex flex-xl-row flex-column align-items-center justify-content-center">
								<div class="tab_icon"><img src="images/houses.svg" class="svg" alt=""></div>
								<span>features</span>
							</div>
						</div>

						 Tab 
						<div class="tab">
							<input type="radio" id="tab_3" name="listing_tabs">
							<label for="tab_3"></label>
							<div class="tab_content d-flex flex-xl-row flex-column align-items-center justify-content-center">
								<div class="tab_icon"><img src="images/house2.svg" class="svg" alt=""></div>
								<span>photos</span>
							</div>
						</div>

						 Tab 
						<div class="tab">
							<input type="radio" id="tab_6" name="listing_tabs">
							<label for="tab_6"></label>
							<div class="tab_content d-flex flex-xl-row flex-column align-items-center justify-content-center">
								<div class="tab_icon"><img src="images/location.svg" class="svg" alt=""></div>
								<span>location</span>
							</div>
						</div>
					</div>-->

					<!-- About -->
					<div class="about">
						<div class="row">
                                                    <?php 
                                                        $query="Select * from tblsite where siteid='{$_GET['id']}'";
                                                        $result=  mysqli_query($conn,$query);
                                                        $row=mysqli_fetch_assoc($result);
                                                        
                                                        $query="Select * from tblsitedetails where siteid='{$_GET['id']}'";
                                                        $result1=  mysqli_query($conn,$query);
                                                        while($row1=mysqli_fetch_assoc($result1))
                                                        {
                                                    ?>
							<div class="col-lg-6">
								<div class="property_info">
									<div class="tag_price listing_price">Rs. <?php echo $row1['rate']; ?> / sq ft</div>
									<div class="listing_name"><h1><?php echo $row1['blocktype']; ?></h1></div>
									<div class="listing_location d-flex flex-row align-items-start justify-content-start">
                                                                                    <img src="images/icon_3_large.png" alt="">
										<span><?php echo $row1['amenity']; ?></span>
									</div>
									<div class="listing_list">
										<ul>
											<li>Property ID &nbsp;: <?php echo $row1['id']; ?></li>
                                                                                        <li>Total Floors&nbsp;: <?php echo $row1['floors']; ?></li>
                                                                                        <li>Total Blocks&nbsp;: <?php echo $row1['blocks']; ?></li>
                                                                                        <li>Total Price &nbsp;&nbsp;&nbsp;: <?php echo number_format($row1['total']*$row1['rate'], 2, '.', ','); ?></li>
                                                                                        <?php if($row1['plan']!=""){?>
                                                                                        <li>Site Plan &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <a href="siteplan/<?php echo $row1['plan']; ?>" target="_blank">View Site Plan</a></li>
										</ul>   <?php } ?>
									</div>
									
									<div class="prop_info">
										<ul class="d-flex flex-row align-items-center justify-content-start flex-wrap">
											<li class="d-flex flex-row align-items-center justify-content-start">
												<img src="images/icon_2_large.png" alt="">
												<div>
													<div><?php echo $row1['total']; ?></div>
													<div>Total Area</div>
												</div>
											</li>
											
											<li class="d-flex flex-row align-items-center justify-content-start">
												<img src="images/icon_4_large.png" alt="">
												<div>
													<div><?php  echo $row1['builtup']; ?></div>
													<div>Built-up Area</div>
												</div>
											</li>
											<li class="d-flex flex-row align-items-center justify-content-start">
												<img src="images/icon_5_large.png" alt="">
												<div>
													<div><?php  echo $row1['carpet']; ?></div>
													<div>Carpet Area</div>
												</div>
											</li>
                                                                                        <div class="tag_price listing_price"><a href="book/?id=<?php echo $row1['id']; ?>">View Booking</a></div>
                                                                                        
                                                                                        
										</ul><br/><br/>
                                                                            
									</div>
								</div>
							</div><br/><br/>
							<?php } ?>
						</div>		
					</div>
					<div class="google_map_container">
                                            <div class="map">
                                                    <?php echo $row['maploc']; ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- Footer -->
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
<script src="plugins/easing/easing.js"></script>
<script src="plugins/progressbar/progressbar.min.js"></script>
<script src="plugins/parallax-js-master/parallax.min.js"></script>
<script src="plugins/colorbox/jquery.colorbox-min.js"></script>
<script src="https://maps.googleapis.com/maps/api/js?v=3.exp&key=AIzaSyCIwF204lFZg1y4kPSIhKaHEXMLYxxuMhA"></script>
<script src="js/single.js"></script>
</body>
</html>