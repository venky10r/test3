<?php
session_start();
if($_SESSION['id']==""){
    header("location:../");
}
include '../../config/dbconnection.php';
?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<title>New Site</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimum-scale=1.0, maximum-scale=1.0">
		<meta name="apple-mobile-web-app-capable" content="yes">
		<meta name="apple-mobile-web-app-status-bar-style" content="black">
		<meta content="" name="description" />
		<meta content="" name="author" />
		<link href="http://fonts.googleapis.com/css?family=Lato:300,400,400italic,600,700|Raleway:300,400,500,600,700|Crete+Round:400italic" rel="stylesheet" type="text/css" />
		<link rel="stylesheet" href="../vendor/bootstrap/css/bootstrap.min.css">
		<link rel="stylesheet" href="../vendor/fontawesome/css/font-awesome.min.css">
		<link rel="stylesheet" href="../vendor/themify-icons/themify-icons.min.css">
		<link href="../vendor/animate.css/animate.min.css" rel="stylesheet" media="screen">
		<link href="../vendor/perfect-scrollbar/perfect-scrollbar.min.css" rel="stylesheet" media="screen">
		<link href="../vendor/switchery/switchery.min.css" rel="stylesheet" media="screen">
		<link href="../vendor/bootstrap-touchspin/jquery.bootstrap-touchspin.min.css" rel="stylesheet" media="screen">
		<link href="../vendor/select2/select2.min.css" rel="stylesheet" media="screen">
		<link href="../vendor/bootstrap-datepicker/bootstrap-datepicker3.standalone.min.css" rel="stylesheet" media="screen">
		<link href="../vendor/bootstrap-timepicker/bootstrap-timepicker.min.css" rel="stylesheet" media="screen">
		<link rel="stylesheet" href="../assets/css/styles.css">
		<link rel="stylesheet" href="../assets/css/plugins.css">
		<link rel="stylesheet" href="../assets/css/themes/theme-1.css" id="skin_color" />
                <script src="../toast/toast.js"></script>
	</head>
        
<script src="https://code.jquery.com/jquery-2.1.1.min.js" type="text/javascript"></script>

<body>

    <div id="app">		

        <?php include('../include/sidebar.php');?>

        <div class="app-content">
        <?php include('../include/header.php');?>
            <div class="main-content" >
                <div class="wrap-content container" id="container">
                    <!-- start: PAGE TITLE -->
                    <section id="page-title">
                        <div class="row">
                            <div class="col-sm-8">
                                <h1 class="mainTitle">New | Site</h1>
                            </div>
                            <ol class="breadcrumb">
                                <li><span>New</span></li>
                                <li class="active"><span>Site</span></li>
                            </ol>
                        </div>
                    </section>
                    <!-- end: PAGE TITLE -->

                    <!-- start: BASIC EXAMPLE -->
                    <div class="container-fluid container-fullw bg-white">
                        <div class="row margin-top-30">
                            <div class="col-lg-8 col-md-12">
                                <div class="panel panel-white">
                                    <div class="panel-heading">
                                        <h5 class="panel-title">Add New Site</h5>
                                    </div>
                                    <div class="panel-body">
                                        <form name="f" method="post" action="" enctype="multipart/form-data">
                                            <div class="form-group">
                                                <label>Site Name</label>
                                                <input type="text" name="name" class="form-control" placeholder="Site Name" required autofocus />
                                            </div>
                                            <div class="form-group">
                                                <label>Site Location</label>
                                                <select name="loc" class="form-control" placeholder="Select Prorerty Type">
                                                <?php
                                                    $query="select * from tbllocation order by location";
                                                    $result=mysqli_query($conn,$query);
                                                    while($row=mysqli_fetch_assoc($result)) {
                                                    echo "<option>{$row['location']}</option>";
                                                    } ?>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label>Site Address</label>
                                                <textarea name="addr" class="form-control" placeholder="Site address in full" required></textarea>
                                            </div>
                                            <div class="form-group">
                                                <label>Property Type</label>
                                                <select name="ptype" class="form-control" placeholder="Select Prorerty Type">
                                                    <?php
                                                    $query="select * from tbltype order by sitetype";
                                                    $result=mysqli_query($conn,$query);
                                                    while($row=mysqli_fetch_assoc($result)) {
                                                    echo "<option>{$row['sitetype']}</option>";
                                                    } ?>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label>Display Image</label>
                                                <input type="file" class="form-control" id="file" name="file" accept="image/*" />
                                            </div>
                                            <div class="form-group">
                                                <label>Other Image (You can select multiple images)</label>
                                                <input type="file" class="form-control" id="files" name="files[]" accept="image/*"  multiple="multiple"/>
                                            </div>
                                            <div class="form-group">
                                                <label>Site Map</label>
                                                <input type="text" name="map" class="form-control" placeholder="Site Map" required />
                                            </div>
                                            <button type="submit" name="sub" class="btn btn-o btn-primary">Add Site</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                       </div>
                    </div>
                </div>
            </div>
        </div>
<?php
if(isset($_REQUEST['sub'])){
    $result=mysqli_query($conn,"SELECT * FROM tblsite WHERE name='" . $_POST["name"] . "' and location='" . $_POST["loc"] . "' and sitetype='" . $_POST["ptype"] . "'");
      if(mysqli_num_rows($result)>0) {
          echo "<script> iqwerty.toast.Toast('Site already exists.'); </script>";
          exit;
      }

      $result=mysqli_query($conn,"insert into tblsite(name,location,address,sitetype,maploc) values('{$_POST['name']}','{$_POST['loc']}','{$_POST['addr']}','{$_POST['ptype']}','{$_POST['map']}')") or die(mysqli_error($conn));
      if($result){
          $result=mysqli_query($conn,"SELECT siteid as id FROM tblsite WHERE name='" . $_POST["name"] . "' and location='" . $_POST["loc"] . "' and sitetype='" . $_POST["ptype"] . "'") or die(mysqli_error($conn));
          $row=mysqli_fetch_assoc($result);
          $name = $row['id'].$_FILES["file"]["name"];
          move_uploaded_file($_FILES["file"]["tmp_name"],"../../displayimg/".$name);
          $result=mysqli_query($conn,"update tblsite set fileloc='$name' where siteid='{$row['id']}'");
          
          foreach ($_FILES['files']['name'] as $f => $name) {     
	    if ($_FILES['files']['error'][$f] == 4) {
	        continue; // Skip file if any error found
	    }	       
	    if ($_FILES['files']['error'][$f] == 0) {	           
		 // No error found! Move uploaded files 
	            if(move_uploaded_file($_FILES["files"]["tmp_name"][$f], "../../siteimages/".$row['id'].$name))
	            $result=mysqli_query($conn,"insert into tblsiteimages values('{$row['id']}','{$row['id']}$name')") or die(mysqli_error($conn));
            }      
	}
          
          echo "<script> iqwerty.toast.Toast('New site added.'); </script>";
      }else{
          echo "<script> iqwerty.toast.Toast('Error....! Please try later.'); </script>";
      }
}
?>
    <!-- start: FOOTER -->
        <?php include('../include/footer.php');?>
    <!-- end: FOOTER -->
		
</div>
		<!-- start: MAIN JAVASCRIPTS -->
		<script src="../vendor/jquery/jquery.min.js"></script>
		<script src="../vendor/bootstrap/js/bootstrap.min.js"></script>
		<script src="../vendor/modernizr/modernizr.js"></script>
		<script src="../vendor/jquery-cookie/jquery.cookie.js"></script>
		<script src="../vendor/perfect-scrollbar/perfect-scrollbar.min.js"></script>
		<script src="../vendor/switchery/switchery.min.js"></script>
		<!-- end: MAIN JAVASCRIPTS -->
		<!-- start: JAVASCRIPTS REQUIRED FOR THIS PAGE ONLY -->
                <script src="../vendor/maskedinput/jquery.maskedinput.min.js"></script>
		<script src="../vendor/bootstrap-touchspin/jquery.bootstrap-touchspin.min.js"></script>
		<script src="../vendor/autosize/autosize.min.js"></script>
		<script src="../vendor/selectFx/classie.js"></script>
		<script src="../vendor/selectFx/selectFx.js"></script>
		<script src="../vendor/select2/select2.min.js"></script>
		<script src="../vendor/bootstrap-datepicker/bootstrap-datepicker.min.js"></script>
		<script src="../vendor/bootstrap-timepicker/bootstrap-timepicker.min.js"></script>
		<!-- end: JAVASCRIPTS REQUIRED FOR THIS PAGE ONLY -->
		<!-- start: CLIP-TWO JAVASCRIPTS -->
		<script src="../assets/js/main.js"></script>
		<!-- start: JavaScript Event Handlers for this page -->
		<script src="../assets/js/form-elements.js"></script>
		<script>
			jQuery(document).ready(function() {
				Main.init();
				FormElements.init();
			});
		</script>
		<!-- end: JavaScript Event Handlers for this page -->
		<!-- end: CLIP-TWO JAVASCRIPTS -->
	</body>
</html>