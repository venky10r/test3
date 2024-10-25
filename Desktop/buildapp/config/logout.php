<?php

 session_start();
 $_SESSION['id']="";
 $_SESSION['fn']="";
 $_SESSION['user']="";
 $_SESSION['fname']="";
 session_destroy();
 header("location:../");
 
 ?>