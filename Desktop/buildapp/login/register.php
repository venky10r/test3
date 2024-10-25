<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Colorlib Templates">
    <meta name="author" content="Colorlib">
    <meta name="keywords" content="Colorlib Templates">

    <!-- Title Page-->
    <title>Login</title>

    <!-- Icons font CSS-->
    <link href="vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <!-- Font special for pages-->
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i" rel="stylesheet">

    <!-- Vendor CSS-->
    <link href="vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="vendor/datepicker/daterangepicker.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="css/main.css" rel="stylesheet" media="all"/>
    <script src="../toast/toast.js"></script>
</head>

<script type="text/javascript">
    function check(){ 
        if(document.f.pass.value!= document.f.repass.value)
    {
        iqwerty.toast.Toast("Password and Confirm Password Field do not match...!");
        document.f.repass.focus();
        return false;
    }
    return true;
    }
</script>

<script type="text/javascript">
    function check1(){ 
        if(document.f1.pass.value!= document.f1.repass.value)
    {
        iqwerty.toast.Toast("Password and Confirm Password Field do not match...!");
        document.f1.repass.focus();
        return false;
    }
    return true;
    }
</script>

<body>
    <div class="page-wrapper bg-blue p-t-100 p-b-100 font-robo">
        <div class="wrapper wrapper--w680">
            <div class="card card-1">
                <div class="card-heading"></div>
                <div class="card-body">
                   <h2 class="title">Registration</h2>
                   <?php 
                        if(isset($_GET['id'])){
                    ?>
                    <form method="POST" action="" name="f" onsubmit="javascript:return check()">                        
                        <input type="hidden" name="id" value="<?php echo $_GET['id']; ?>" />
                        <div class="row row-space">
                            <div class="col-2">
                                <div class="input-group">
                                    <input class="input--style-1" type="text" placeholder="First Name" name="fname" pattern="[A-Za-z]+" title="Charecters only" required/>
                                </div>
                            </div>
                            <div class="col-2">
                                 <div class="input-group">
                                    <input class="input--style-1" type="text" placeholder="Last Name" name="lname" pattern="[A-Za-z]+" title="Charecters only" required/>
                                </div>
                            </div>
                        </div>
                        <div class="input-group">
                            <input class="input--style-1" type="email" placeholder="Email Address" name="email" required />
                        </div>
                        <div class="input-group">
                            <input class="input--style-1" type="text" placeholder="Mobile Number" name="mob" pattern="[6,7,8,9][0-9]{9}" maxlength="10" title="Enter valid mobile number" required />
                        </div>
                        <div class="row row-space">
                            <div class="col-2">
                                <div class="input-group">
                                     <div class="rs-select2 js-select-simple select--no-search">
                                        <select name="occ">
                                            <option disabled="disabled" selected="selected">OCCUPATION</option>
                                            <option>Business</option>
                                            <option>Government Employee</option>
                                            <option>Private Sector</option>
                                            <option>Self Employed</option>
                                            <option>Other</option>
                                        </select>
                                        <div class="select-dropdown"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="input-group">
                                    <div class="rs-select2 js-select-simple select--no-search">
                                        <select name="gender">
                                            <option disabled="disabled" selected="selected">GENDER</option>
                                            <option>Male</option>
                                            <option>Female</option>
                                            <option>Other</option>
                                        </select>
                                        <div class="select-dropdown"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                           <div class="input-group">
                            <input class="input--style-1" type="text" placeholder="Address" name="addr" required />
<!--                               <textarea name="addr" class="input--style-1" required></textarea> -->
                        </div>
                        <div class="input-group">
                            <input class="input--style-1" type="password" placeholder="Password" name="pass" required />
                        </div>
                        <div class="input-group">
                            <input class="input--style-1" type="password" placeholder="Confirm Password" name="repass" required />
                        </div>
                        <div class="p-t-20">
                            <button class="btn btn--radius btn--green" type="submit" name="reg">Register</button>
                        </div>
                    </form>
                   <?php }else{ ?>
                    <form method="POST" action="" name="f1" onsubmit="javascript:return check1()"> 
                        <div class="row row-space">
                            <div class="col-2">
                                <div class="input-group">
                                    <input class="input--style-1" type="text" placeholder="First Name" name="fname" pattern="[A-Za-z]+" title="Charecters only" required/>
                                </div>
                            </div>
                            <div class="col-2">
                                 <div class="input-group">
                                    <input class="input--style-1" type="text" placeholder="Last Name" name="lname" pattern="[A-Za-z]+" title="Charecters only" required/>
                                </div>
                            </div>
                        </div>
                        <div class="input-group">
                            <input class="input--style-1" type="email" placeholder="Email Address" name="email" required />
                        </div>
                        <div class="input-group">
                            <input class="input--style-1" type="text" placeholder="Mobile Number" name="mob" pattern="[6,7,8,9][0-9]{9}" maxlength="10" title="Enter valid mobile number" required />
                        </div>
                        <div class="row row-space">
                            <div class="col-2">
                                <div class="input-group">
                                     <div class="rs-select2 js-select-simple select--no-search">
                                        <select name="occ">
                                            <option disabled="disabled" selected="selected">OCCUPATION</option>
                                            <option>Business</option>
                                            <option>Government Employee</option>
                                            <option>Private Sector</option>
                                            <option>Self Employed</option>
                                            <option>Other</option>
                                        </select>
                                        <div class="select-dropdown"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="input-group">
                                    <div class="rs-select2 js-select-simple select--no-search">
                                        <select name="gender">
                                            <option disabled="disabled" selected="selected">GENDER</option>
                                            <option>Male</option>
                                            <option>Female</option>
                                            <option>Other</option>
                                        </select>
                                        <div class="select-dropdown"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="input-group">
                            <input class="input--style-1" type="text" placeholder="Address" name="addr" required />
                        </div>
                        <div class="input-group">
                            <input class="input--style-1" type="password" placeholder="Password" name="pass" required />
                        </div>
                        <div class="input-group">
                            <input class="input--style-1" type="password" placeholder="Confirm Password" name="repass" required />
                        </div>
                        <div class="p-t-20">
                            <button class="btn btn--radius btn--green" type="submit" name="reg1">Register</button>
                        </div>
                    </form>
                   <?php } ?>
                </div>
            </div>
        </div>
    </div>
    
    <?php
        include "../config/dbconnection.php";
        if(isset($_REQUEST['reg1']) || isset($_REQUEST['reg'])){
            $query="select * from tblusers where email='{$_POST['email']}'";
            $result=mysqli_query($conn,$query);
            if(mysqli_num_rows($result)>0){
                echo "<script> iqwerty.toast.Toast('Email ID already exists.'); 
                         window.setTimeout(function() { window.location = '';  }, 4000);</script>";
            }else{
                $query="insert into tblusers(fname,lname,email,mobile,occupation,gender,address,password) values('{$_POST['fname']}','{$_POST['lname']}','{$_POST['email']}','{$_POST['mob']}','{$_POST['occ']}','{$_POST['gender']}','{$_POST['addr']}','{$_POST['pass']}')";
                $result=mysqli_query($conn,$query);
                if($result){
                    if(isset($_REQUEST['reg'])){
                         echo "<script> iqwerty.toast.Toast('Registration successful. Please login to continue'); 
                         window.setTimeout(function() { window.location = '../login?id={$_POST['id']}&type=log';  }, 4000);</script>";
                    }else{
                        echo "<script> iqwerty.toast.Toast('Registration successful. Please login to continue'); 
                         window.setTimeout(function() { window.location = '../login';  }, 4000);</script>";
                    }
                }else{
                    echo "<script> iqwerty.toast.Toast('Error in registration. Please try again'); 
                         window.setTimeout(function() { window.location = '';  }, 4000);</script>";
                }
            }
        }
      ?>

    <!-- Jquery JS-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <!-- Vendor JS-->
    <script src="vendor/select2/select2.min.js"></script>
    <script src="vendor/datepicker/moment.min.js"></script>
    <script src="vendor/datepicker/daterangepicker.js"></script>
    <!-- Main JS-->
    <script src="js/global.js"></script>
</body><!-- This templates was made by Colorlib (https://colorlib.com) -->
</html>