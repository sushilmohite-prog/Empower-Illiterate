<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin panel</title>
  <link href='https://fonts.googleapis.com/css?family=Nunito:400,300' rel='stylesheet' type='text/css'>
  <link rel="stylesheet" href="css/Signup.css">
</head>
<?php
include("includes/config.php");
include("includes/Functions.php");
session_start();
$fname='';  $password='';
$msg2='';$msg3='';
if(isset($_POST['submit']))
{
$fname=$_POST['name'];
$password=$_POST['password'];


//echo $firstname."</br>".$lastname."</br>".$email."</br>".$password."</br>".$date."</br>".$skills."</br>".$image."</br>".
  //  $user_job."</br>".$job_time."</br>".$check;

    if (empty($fname))
    {
        $msg2="Please Enter username";
    }
    else if(empty($password))
    {
        $msg3="Please enter your password";
    }
    else
    {
        $pass=mysqli_query($connect,"SELECT password FROM admin WHERE name='$fname'");
        $pass_w=mysqli_fetch_array($pass);
        $dpass=$pass_w['password'];
        if ($password!==$dpass)
         {
           $msg3="password is wrong";
         }
         else
         {
           $_SESSION['name']=$fname;
           header("location:admin-panel.php");
         }

    }


}



?>

<body>

  <form method="post" enctype="multipart/form-data">

    <h1>Admin Login</h1>

    <fieldset>
      <div>
      <label for="username">User name:</label>
      <input type="text" id="mail" name="name"value="<?php echo $fname; ?>">
      <?php echo $msg2; ?>
      </div>


      <div>
      <label for="password">Password:</label>
      <input type="password" id="password" name="password">
      <?php echo $msg3; ?>
      </div>
    </fieldset>

    <button type="submit" value="submit" name="submit">Log in</button>
  </form>

</body>
</html>
