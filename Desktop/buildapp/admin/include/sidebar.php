<div class="sidebar app-aside" id="sidebar">
    <div class="sidebar-container perfect-scrollbar">
        <nav>
        <!-- start: MAIN NAVIGATION MENU -->
        <div class="navbar-title">
            <span>Main Navigation</span>
        </div>
        <ul class="main-navigation-menu">
            <li>
                <a href="../home">
                    <div class="item-content">
                        <div class="item-media">
                            <i class="ti-home"></i>
                        </div>

                        <div class="item-inner">
                            <span class="title"> Dashboard </span>
                        </div>
                    </div>
                </a>
            </li>
<?php
    if($_SESSION['id']=="admin"){
?>
            <li>
                <a href="../userreg">
                    <div class="item-content">
                        <div class="item-media">
                            <i class="ti-user"></i>
                        </div>

                        <div class="item-inner">
                            <span class="title"> New User Registration </span>
                        </div>
                    </div>
                </a>
            </li>
            <li>
		<a href="javascript:void(0)">
                    <div class="item-content">
			<div class="item-media">
                        	<i class="ti-location-pin"></i>
			</div>
			<div class="item-inner">
                            <span class="title"> Site Details </span><i class="icon-arrow"></i>
			</div>
                    </div>
		</a>
		<ul class="sub-menu">
                     <li>
                        <a href="../sitetype">
                            <span class="title"> Site Type </span>
                        </a>
                    </li>
                    <li>
                        <a href="../location">
                            <span class="title"> Site Location </span>
                        </a>
                    </li>                   
                    <li>
                        <a href="../site">
                            <span class="title"> Add New Site </span>
                        </a>
                    </li>
                    <li>
                        <a href="../sitedetails">
                            <span class="title"> Site Details </span>
                        </a>
                    </li>
                </ul>
            </li>
            <li>
		<a href="javascript:void(0)">
                    <div class="item-content">
			<div class="item-media">
                        	<i class="ti-agenda"></i>
			</div>
			<div class="item-inner">
                            <span class="title"> View Sites </span><i class="icon-arrow"></i>
			</div>
                    </div>
		</a>
		<ul class="sub-menu">
                    <li>
                        <a href="../viewlocation">
                            <span class="title"> View Site Location </span>
                        </a>
                    </li>
                    <li>
                        <a href="../viewsitedetails">
                            <span class="title"> View Site Details </span>
                        </a>
                    </li>
                </ul>
            </li>
<?php } 
    if($_SESSION['id']=="admin"){
?>
            <li>
                <a href="../allocate">
                    <div class="item-content">
                        <div class="item-media">
                            <i class="ti-comment"></i>
                        </div>

                        <div class="item-inner">
                            <span class="title"> Allocate Engineers </span>
                        </div>
                    </div>
                </a>
            </li>
            
            
            
            <li>
                <a href="../viewrequest">
                    <div class="item-content">
                        <div class="item-media">
                            <i class="ti-pencil-alt"></i>
                        </div>

                        <div class="item-inner">
                            <span class="title"> View Booking Requests </span>
                        </div>
                    </div>
                </a>
            </li>
          <?php } ?>  
                 <?php
    if($_SESSION['id']!="admin"){
?>
            <li>
                <a href="../update">
                    <div class="item-content">
                        <div class="item-media">
                            <i class="ti-alarm-clock"></i>
                        </div>

                        <div class="item-inner">
                            <span class="title"> Update Site Details </span>
                        </div>
                    </div>
                </a>
            </li>
            <?php } ?>
        </ul>
                        <!-- end: CORE FEATURES -->
        </nav>
    </div>
</div>