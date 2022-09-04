<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Admin panel</title>
    <link rel="stylesheet" href="css/bootstrap.css">
    <?php
    include("includes/config.php");
    session_start();
    $name=$_SESSION['name'];
    //echo $name;
    if(isset($name))
    {
      $result=mysqli_query($connect,"SELECT id,first_name,last_name,mail,dob,img FROM users");
      $row=mysqli_num_rows($result);


      echo "<div class='container'>";
      echo "<h3></br>Welcome To Admin Panel</h3>";
      echo "Total registered users:".$row;
      echo "<a href='admin-logout.php'><button class='btn btn-primary' style='float:right'>Log out</button></a>";
      echo "</br></br>";
      echo "<table class='table table-striped table-bordered table-responsive'>";
      echo "<tr align='center'>";
      echo "<th>S.no</th>";
      echo "<th>First name</th>";
      echo "<th>Last name</th>";
      echo "<th>Mail</th>";
      echo "<th>DOB</th>";
      echo "<th>Profile image</th>";
      echo "<th>Delete user</th>";
      echo "<th>Edit user details</th>";
      echo "</tr>";

      $i=0;
      while ($retrive=mysqli_fetch_array($result))
      {
        $id=$retrive['id'];
        $fname=$retrive['first_name'];
        $lname=$retrive['last_name'];
        $email=$retrive['mail'];
        $date=$retrive['dob'];
        $img=$retrive['img'];
        echo "<tr align='center';>";
        echo "<th>".$i=$i+1;"</th>";
        echo "<th>$fname</th>";
        echo "<th>$lname</th>";
        echo "<th>$email</th>";
        echo "<th>$date</th>";
        echo "<th><img src='images/$img' height='100px'; width='100px'></th>";
        echo "<th> <a href='delete-admin.php?del=$id'><button class='btn btn-danger'>Delete</button></a></th>";
        echo "<th> <a href='update-admin.php?user=$id'><button class='btn btn-success'>Update</button></a></th>";
        echo "</tr>";
      }
      echo "</table>";

    }
    else
    {
      header("location:admin.php");
    }


  ?>
  </head>

 <body>

 </body>
</html>
