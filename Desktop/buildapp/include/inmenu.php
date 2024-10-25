<nav class="main_nav">
	<ul class="d-flex flex-row align-items-start justify-content-start">
		<li class="active"><a href="../">Home</a></li>
                 <?php
                    if(isset($_SESSION['user'])){
                        ?>
                         <li><a href="../bookings/">Bookings</a></li>
                         <li><a href="../requests/">Requests</a></li>
                         <li><a href="../profile/">Profile</a></li>
                <?php
                    }
                ?>
                <li><a href="../about.php">About us</a></li>
		<li><a href="../contact.php">Contact</a></li>
	</ul>
</nav>