<?php
include("includes/config.php");
$id=$_GET['del'];
mysqli_query($connect,"DELETE FROM users WHERE id='$id'");
echo "your application deleted successfully";
echo "<br><br><a href='login.php'>click Here To Login</a>";
 ?>
