<?php
include("includes/config.php");
$id=$_GET['del'];
mysqli_query($connect,"DELETE FROM users WHERE id='$id'");
header("location:admin-panel.php");
 ?>
