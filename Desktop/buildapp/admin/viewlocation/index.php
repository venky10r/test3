<?php
session_start();
if($_SESSION['id']==""){
    header("location:../");
}
include "../../config/dbconnection.php";
?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Location</title>
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
                <link rel="stylesheet" href="../neon/js/jquery-ui/css/no-theme/jquery-ui-1.10.3.custom.min.css"  id="style-resource-1">
                <link rel="stylesheet" href="../neon/css/font-icons/entypo/css/entypo.css"  id="style-resource-2">
                <link rel="stylesheet" href="../neon/css/font-icons/entypo/css/animation.css"  id="style-resource-3">
                <script src="../toast/toast.js"></script>

</head>
        
<script src="../js/jquerytable.js" type="text/javascript"></script>
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
                                <h1 class="mainTitle">Site | Location</h1>
                            </div>
                            <ol class="breadcrumb">
                                <li><span>Site</span></li>
                                <li class="active"><span>Location</span></li>
                            </ol>
                        </div>
                    </section>
                    <!-- end: PAGE TITLE -->

                    <!-- start: BASIC EXAMPLE -->
                    <div class="container-fluid container-fullw bg-white">
                        <div class="row">
                                <div class="panel panel-white">
                                    <div class="panel-heading">
                                        <h5 class="panel-title">Site Location</h5>
                                    </div>
                                    <div class="panel-body">
                                        <table class="table table-bordered datatable" id="table-1">
			<thead>
				<tr>
					<th>Sl No</th>
					<th>Site</th>
					<th>Location</th>
                                        <th>Type</th>
					<th>Address</th>
                                        <th>Action</th>
				</tr>
			</thead>

				<tbody>

				<?php


					$query  = "select * from tblsite";
					$result = mysqli_query($conn, $query);
					$sno    = 1;

					            while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
					                
					                
					                echo "<tr><td>" . $sno . "</td>";
					                echo "<td>" . $row['name']."</td>";
                                                        echo "<td>" . $row['location']."</td>";
					                echo "<td>" . $row['sitetype']."</td>";
					                echo "<td>" . $row['address'] ."</td>";
					                ?>
                                                        <td><a href="../editlocation?id=<?php echo $row['siteid'];?>" class="btn btn-transparent btn-xs" tooltip-placement="top" tooltip="Edit"><i class="fa fa-pencil"></i></a>													
                                                        <a href="?id=<?php echo $row['siteid']?>" onClick="return confirm('Are you sure you want to delete?')" class="btn btn-transparent btn-xs tooltips" tooltip-placement="top" tooltip="Remove"><i class="fa fa-times fa fa-white"></i></a></td>
                                                        <?php
					                $sno++;
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
<?php
if(isset($_GET['id'])){
        $query="delete from tblsite where siteid='{$_GET['id']}'";
        $result=mysqli_query($conn,$query) or die(mysqli_error($conn));
        $query="delete from tblsitedetails where siteid='{$_GET['id']}'";
        $result=mysqli_query($conn,$query) or die(mysqli_error($conn));
        $query="delete from tblsiteimages where siteid='{$_GET['id']}'";
        $result=mysqli_query($conn,$query) or die(mysqli_error($conn));
               echo "<script> alert('Site details deleted'); 
                   window.location.href = '../viewlocation'; </script>";
    }
?>
    <!-- start: FOOTER -->
        <?php include('../include/footer.php');?>
    <!-- end: FOOTER -->
		
</div>
    
    <script type="text/javascript">
	jQuery(document).ready(function($)
	{
		$("#table-1").dataTable({
			"sPaginationType": "bootstrap",
			"aLengthMenu": [[5, 10, 25, -1], [5, 10, 25, "All"]],
			"bStateSave": true
		});
		
		$(".dataTables_wrapper select").select2({
			minimumResultsForSearch: -1
		});
	});
</script>
    	</div>
	<link rel="stylesheet" href="../neon/js/select2/select2-bootstrap.css"  id="style-resource-1">
	<link rel="stylesheet" href="../neon/js/select2/select2.css"  id="style-resource-2">

	<script src="../neon/js/jquery.dataTables.min.js" id="script-resource-7"></script>
	<script src="../neon/js/dataTables.bootstrap.js" id="script-resource-8"></script>
	<script src="../neon/js/select2/select2.min.js" id="script-resource-9"></script>

        <script type="text/javascript">
var sprytextfield1 = new Spry.Widget.ValidationTextField("sprytextfield1");
var sprytextfield2 = new Spry.Widget.ValidationTextField("sprytextfield2");
var spryselect1 = new Spry.Widget.ValidationSelect("spryselect1");
var sprytextfield3 = new Spry.Widget.ValidationTextField("sprytextfield3");
var sprytextfield4 = new Spry.Widget.ValidationTextField("sprytextfield4");
var spryselect2 = new Spry.Widget.ValidationSelect("spryselect2");
    </script>
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