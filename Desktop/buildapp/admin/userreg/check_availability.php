<?php
include '../../config/dbconnection.php';
 
if(!empty($_POST["username"])) {
  $result =mysqli_query($conn,"SELECT * FROM tbllogin WHERE username='" . $_POST["username"] . "'");
  
  if(mysqli_num_rows($result)>0) {
      echo "<span class='status-not-available'>Username Not Available.</span>";
      echo "<input type='hidden' name='av' value='Not Available'/>";
  }
  
}
?>