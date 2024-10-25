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
		<title>Site Details</title>
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
                <script src="https://code.jquery.com/jquery-2.1.1.min.js" type="text/javascript"></script>
	</head>
        
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
                                <h1 class="mainTitle">Site | Details</h1>
                            </div>
                            <ol class="breadcrumb">
                                <li><span>Site</span></li>
                                <li class="active"><span>Details</span></li>
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
                                        <h5 class="panel-title">Site Details</h5>
                                    </div>
                                    <div class="panel-body">
                                        <?php if (isset($_GET['id'])){ ?>
                                        <form name="f" method="post" action="" enctype="multipart/form-data">
                                            <div class="form-group">
                                                <label>Site Name</label>
                                                <select name="loc" class="form-control">
                                                    <?php  $query="select * from tblsite where siteid='{$_GET['id']}'";
                                                    $result=mysqli_query($conn,$query);
                                                    $row=mysqli_fetch_assoc($result);
                                                    echo "<option value='{$_GET['id']};'>{$row['name']} - {$row['location']}</option>";
                                                
                                                    $query="select * from tblsite order by name";
                                                    $result=mysqli_query($conn,$query);
                                                    while($row=mysqli_fetch_assoc($result)) {
                                                    echo "<option value='{$row['siteid']}'>{$row['name']} - {$row['location']}</option>";
                                                    } ?>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label>Block Type</label>
                                                <select name="size" class="form-control" placeholder="Block Type">
                                                    <option><?php echo $_GET['bt']; ?></option>
                                                    <option>1 BHK</option>
                                                    <option>2 BHK</option>
                                                    <option>3 BHK</option>
                                                    <option>4 BHK</option>
                                                    <option>1 Room Kitchen</option>
                                                    <option>Complete Single Hall</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label>Total Area (Sq Ft)</label>
                                                <input type="text" name="total" value="<?php echo $_GET['tot']; ?>" pattern="[0-9/./]+" title="Please enter numbers" class="form-control" placeholder="Total Area" required />
                                            </div>
                                            <div class="form-group">
                                                <label>Built-up Area (Sq Ft)</label>
                                                <input type="text" name="builtup" value="<?php echo $_GET['bu']; ?>" pattern="[0-9/./]+" title="Please enter numbers" class="form-control" placeholder="Built-up Area" required />
                                            </div>  
                                            <div class="form-group">
                                                <label>Carpet Area (Sq Ft)</label>
                                                <input type="text" name="carpet" value="<?php echo $_GET['car']; ?>" pattern="[0-9/./]+" title="Please enter numbers" class="form-control" placeholder="Carpet Area" required />
                                            </div>
                                            <div class="form-group">
                                                <label>Price (Per Sq Ft)</label>
                                                <input type="text" name="rate" value="<?php echo $_GET['rate']; ?>" pattern="[0-9/./]+" title="Please enter numbers" class="form-control" placeholder="Rate / Sq Ft" required />
                                            </div>
                                            <div class="form-group">
                                                <label>Floors</label>
                                                <input type="number" name="floor" value="<?php echo $_GET['f']; ?>" class="form-control" placeholder="Total Floors" readonly />
                                            </div> 
                                            <div class="form-group">
                                                <label>Number of Blocks</label>
                                                <input type="number" name="blocks" value="<?php echo $_GET['blk']; ?>" class="form-control" placeholder="Total No. of Blocks" required />
                                            </div>                                            
                                            <div class="form-group">
                                                <label>Description/Amenities</label>
                                                <textarea name="ami" class="form-control" placeholder="Amenities/Description of site"><?php echo $_GET['ami']; ?></textarea>
                                            </div>
                                            <div class="form-group">
                                                <label>Site Plan</label>
                                                <input type="file" class="form-control" id="file" name="file" accept="image/*" />
                                            </div>
                                            <button type="submit" name="sub" class="btn btn-o btn-primary">Add Site</button>
                                            <button type="button" class="btn btn-o btn-primary" onclick="window.location.href='?'" >Reset</button>
                                        </form>
                                        <?php }else{ ?>
                                        <form name="f" method="post" action="" enctype="multipart/form-data">
                                            <div class="form-group">
                                                <label>Site Name</label>
                                                <select name="loc" class="form-control" placeholder="Select Site"  required>
                                                <?php
                                                    $query="select * from tblsite order by name";
                                                    $result=mysqli_query($conn,$query);
                                                    while($row=mysqli_fetch_assoc($result)) {
                                                    echo "<option value='{$row['siteid']}'>{$row['name']} - {$row['location']}</option>";
                                                    } ?>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label>Block Type</label>
                                                <select name="size" class="form-control" placeholder="Block Type">
                                                    <option>1 BHK</option>
                                                    <option>2 BHK</option>
                                                    <option>3 BHK</option>
                                                    <option>4 BHK</option>
                                                    <option>1 Room Kitchen</option>
                                                    <option>Complete Single Hall</option>
                                                </select>
                                            </div>
                                            <div class="form-group">
                                                <label>Total Area (Sq Ft)</label>
                                                <input type="text" name="total" pattern="[0-9/./]+" title="Please enter numbers" class="form-control" placeholder="Total Area" required />
                                            </div>                                            
                                            <div class="form-group">
                                                <label>Built-up Area (Sq Ft)</label>
                                                <input type="text" name="builtup" pattern="[0-9/./]+" title="Please enter numbers" class="form-control" placeholder="Built-up Area" required />
                                            </div>  
                                            <div class="form-group">
                                                <label>Carpet Area (Sq Ft)</label>
                                                <input type="text" name="carpet" pattern="[0-9/./]+" title="Please enter numbers" class="form-control" placeholder="Carpet Area" required />
                                            </div>
                                            <div class="form-group">
                                                <label>Price (Per Sq Ft)</label>
                                                <input type="text" name="rate" pattern="[0-9/./]+" title="Please enter numbers" class="form-control" placeholder="Rate / Sq Ft" required />
                                            </div>
                                            <div class="form-group">
                                                <label>Floors</label>
                                                <input type="number" name="floor" class="form-control" placeholder="Total Floors" required />
                                            </div> 
                                            <div class="form-group">
                                                <label>Number of Blocks</label>
                                                <input type="number" name="blocks" class="form-control" placeholder="Total No. of Blocks" required />
                                            </div>                                            
                                            <div class="form-group">
                                                <label>Description/Amenities</label>
                                                <textarea name="ami" class="form-control" placeholder="Amenities/Description of site"></textarea>
                                            </div>
                                            <div class="form-group">
                                                <label>Site Plan</label>
                                                <input type="file" name="map" class="form-control" required />
                                            </div>
                                            <button type="submit" name="sub" class="btn btn-o btn-primary">Add Site</button>
                                            <button type="reset" class="btn btn-o btn-primary">Reset</button>
                                        </form>
                                        <?php } ?>
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
    $query="select * from tblsitedetails where siteid='{$_POST['loc']}' and blocktype='{$_POST['size']}' and builtup='{$_POST['builtup']}' and carpet='{$_POST['carpet']}' and blocks='{$_POST['blocks']}'";
    $result=mysqli_query($conn,$query) or die(mysqli_error($conn));
    if(mysqli_num_rows($result)>0){
        echo "<script> iqwerty.toast.Toast('Details already present'); 
                       window.setTimeout(function() { window.location = '';  }, 4000);</script>"; 
    }else{
        $name = $_POST['loc']."-".$_POST['size']."-".$_FILES["map"]["name"];
        move_uploaded_file($_FILES["map"]["tmp_name"],"../../siteplan/".$name);
        $query="insert into tblsitedetails(siteid,blocktype,total,builtup,carpet,rate,floors,blocks,amenity,plan) values('{$_POST['loc']}','{$_POST['size']}','{$_POST['total']}','{$_POST['builtup']}','{$_POST['carpet']}','{$_POST['rate']}','{$_POST['floor']}','{$_POST['blocks']}','{$_POST['ami']}','$name')";
        $result=mysqli_query($conn,$query);
        /* @var $result type */
        if($result){
            echo "<script> 
                        if (confirm('Site details added successfully.\\nDo you want to add more data for the site')) {
                                window.location.href='?id={$_POST['loc']}&bt={$_POST['size']}&tot={$_POST['total']}&bu={$_POST['builtup']}&car={$_POST['carpet']}&rate={$_POST['rate']}&f={$_POST['floor']}&blk={$_POST['blocks']}&ami={$_POST['ami']}';
                      } else {
                                window.location.href= '';
                      }
                  </script>";
        }else{
             echo "<script> iqwerty.toast.Toast('Error...!'); </script>";
        }
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