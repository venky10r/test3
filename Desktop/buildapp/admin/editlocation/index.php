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
		<title>Edit Site</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimum-scale=1.0, maximum-scale=1.0"/>
		<meta name="apple-mobile-web-app-capable" content="yes"/>
		<meta name="apple-mobile-web-app-status-bar-style" content="black"/>
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
                                <h1 class="mainTitle">Edit | Site</h1>
                            </div>
                            <ol class="breadcrumb">
                                <li><span>Edit</span></li>
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
                                        <h5 class="panel-title">Edit Site Location</h5>
                                    </div>
                                    <div class="panel-body">
                                        <?php 
                                            $query="select * from tblsite where siteid='{$_GET['id']}'";
                                            $result=mysqli_query($conn,$query);
                                            $row1=mysqli_fetch_assoc($result);
 1                                       ?>
                                        <form name="f" method="post" action="" enctype="multipart/form-data">
                                            <div class="form-group">
                                                <label>Site Name</label>
                                                <input type="hidden" name="id" value="<?php echo $_GET['id']; ?>" />
                                                <input type="text" name="name" value="<?php echo $row1['name']; ?>" class="form-control" placeholder="Site Name" required autofocus />
                                            </div>
                                            <div class="form-group">
                                                <label>Site Location</label>
                                                <select name="loc" class="form-control" placeholder="Select Prorerty Type">
                                                <?php
                                                    echo "<option>{$row1['location']}</option>";
                                                    
                                                    $query="select * from tbllocation order by location";
                                                    $result=mysqli_query($conn,$query);
                                                    while($row=mysqli_fetch_assoc($result)) {
                                                    echo "<option>{$row['location']}</option>";
                                                    } ?>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label>Site Address</label>
                                                <textarea name="addr" class="form-control" placeholder="Site address in full" required><?php echo $row1['address']; ?></textarea>
                                            </div>
                                            <div class="form-group">
                                                <label>Property Type</label>
                                                <select name="ptype" class="form-control" placeholder="Select Prorerty Type">
                                                    <option><?php echo $row1['sitetype']; ?></option>
                                                    <?php
                                                    $query="select * from tbltype order by sitetype";
                                                    $result=mysqli_query($conn,$query);
                                                    while($row=mysqli_fetch_assoc($result)) {
                                                    echo "<option>{$row['sitetype']}</option>";
                                                    } ?>
                                                </select>
                                            </div>
                                            <button type="submit" name="sub" class="btn btn-o btn-primary">Update Details</button>
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
      $result=mysqli_query($conn,"update tblsite set name='{$_POST['name']}', location='{$_POST['loc']}', address='{$_POST['addr']}', sitetype='{$_POST['ptype']}' where siteid='{$_POST['id']}'") or die(mysqli_error($conn));
      if(mysqli_affected_rows($conn)>0){
          echo "<script> iqwerty.toast.Toast('Site details updated.'); 
                         window.setTimeout(function() { window.location = '../viewlocation';  }, 4000);</script>";
      }else{
          echo "<script> iqwerty.toast.Toast('No changes made..!'); </script>";
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