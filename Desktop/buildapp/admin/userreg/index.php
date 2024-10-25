<?php
session_start();
if($_SESSION['id']==""){
    header("location:../");
}


?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<title>User Registration</title>
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
        
<script type="text/javascript">
    function valid(){ 
        if(document.add.pass.value!= document.add.repass.value)
    {
        iqwerty.toast.Toast("Password and Confirm Password Field do not match...!");
        document.add.repass.focus();
        return false;
    }
    if(document.add.av.value=="Not Available"){
        iqwerty.toast.Toast("Username not available. Please try with another one.");
        document.add.username.focus();
        return false;
    }
    return true;
    }
</script>
<script src="https://code.jquery.com/jquery-2.1.1.min.js" type="text/javascript"></script>
<script>
function checkAvailability() {
	jQuery.ajax({
	url: "check_availability.php",
	data:'username='+$("#username").val(),
	type: "POST",
	success:function(data){
		$("#user-availability-status").html(data);
	},
	error:function (){}
	});
}
</script>
<style>
#frmCheckUsername {border-top:#F0F0F0 2px solid;background:#FAF8F8;padding:10px;}
.status-available{color:#2FC332;}
.status-not-available{color:#D60202;}
</style>

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
                                <h1 class="mainTitle">User | Registration</h1>
                            </div>
                            <ol class="breadcrumb">
                                <li><span>User</span></li>
                                <li class="active"><span>Registration</span></li>
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
                                        <h5 class="panel-title">Add New User</h5>
                                    </div>
                                    <div class="panel-body">
                                        <form name="add" method="post" onSubmit="return valid();"  action="">
                                            <div class="form-group">
                                                <label>First Name</label>
                                                <input type="text" name="fname" class="form-control" pattern="[A-Za-z]+" title="Please enter characters only"  placeholder="Enter First Name" required autofocus/>
                                            </div>
                                            <div class="form-group">
                                                <label>Last Name</label>
                                                <input type="text" name="lname" class="form-control" pattern="[A-Za-z]+" title="Please enter characters only"  placeholder="Enter Last Name" />
                                            </div>
                                            <div class="form-group">
                                                <label>Mobile Number</label>
                                                <input type="text" name="mob" class="form-control" pattern="[6,7,8,9][0-9]{9}" title="Please enter characters only" maxlength="10"  placeholder="Enter Mobile Number" />
                                            </div>
                                            <div class="form-group">
                                                <label>Username &nbsp;&nbsp;&nbsp;</label><span id="user-availability-status"></span>                                               
                                                <input type="text" name="username" id="username" class="form-control" onkeyup="checkAvailability()" placeholder="Enter Username"/>
                                            </div>
                                            <div class="form-group">
                                                <label>Password</label>
                                                <input type="password" name="pass" class="form-control" placeholder="Password" required/>
                                            </div>
                                            <div class="form-group">
                                                <label>Re-enter Password</label>
                                                <input type="password" name="repass" class="form-control" placeholder="Re-enter Password" required/>
                                            </div>
                                            <button type="submit" name="sub" class="btn btn-o btn-primary">Save Record</button>
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
    include '../../config/dbconnection.php';
    
    $result =mysqli_query($conn,"SELECT * FROM tbllogin WHERE username='" . $_POST["username"] . "'");
  
  if(mysqli_num_rows($result)>0) {
      echo "<script> iqwerty.toast.Toast('Username already exists.'); </script>";
      exit;
  }
  
  $result=mysqli_query($conn,"insert into tbllogin(fname,lname,mobile,username,password) values('{$_POST['fname']}','{$_POST['lname']}','{$_POST['mob']}','{$_POST['username']}','{$_POST['pass']}')");
  if($result){
      echo "<script> iqwerty.toast.Toast('User added successfully.'); </script>";
  }else{
      echo "<script> iqwerty.toast.Toast('Registration error....!'); </script>";
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