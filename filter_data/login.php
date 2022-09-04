<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
  <link rel="stylesheet" href="css/Signup.css">
  <link rel="stylesheet" href="css/temp.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
  <!-- Google Fonts -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap">
  <!-- Bootstrap core CSS -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/css/bootstrap.min.css" rel="stylesheet">
  <!-- Material Design Bootstrap -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.19.1/css/mdb.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />

  
</head>
<?php
include("includes/config.php");
include("includes/Functions.php");
session_start();
$email='';  $password='';
$msg2='';$msg3='';
if(isset($_POST['submit']))
{
$email=$_POST['mail'];
$password=$_POST['password'];


//echo $firstname."</br>".$lastname."</br>".$email."</br>".$password."</br>".$date."</br>".$skills."</br>".$image."</br>".
  //  $user_job."</br>".$job_time."</br>".$check;

    if (empty($email))
    {
        $msg2="Please Enter email";
    }
    else if(empty($password))
    {
        $msg3="Please enter your password";
    }
    elseif (email_exists($email,$connect))
     {
       $pass=mysqli_query($connect,"SELECT pass FROM users WHERE mail='$email'");
       $pass_w=mysqli_fetch_array($pass);
       $dpass=$pass_w['pass'];
       //$pass=md5($password);
       if ($password!==$dpass)
        {
          $msg3="password is wrong";
        }
        else
        {
          $_SESSION['mail']=$email;
          header("location:profile.php");
        }
     }

    else
    {
        $msg2="email does not exists";
    }
}



?>

<body class="bg">
  <!--nav bar-->
  
  <nav>
            <div class="main_nav">
                <div class="logo">
                <img src="images/logo.png" hieght="200px" width="200px"/>
                </div>
                <div class="menu animate__animated animate__fadeInDown">
                    <ul>
                        <li class="no_active"><a href="../index.php">HOME</a></li>
                        <li class="no_active"><a href="#">HELP</a></li>
                        <li class="no_active"><a href="#">ABOUT US</a></li>
                    </ul>
                </div>
                <div>
                <a href="signupform.php"><button type="button" class="btn btn-primary btn-sm mt-4 ml-5">Sign up</button></a>
                </div>   
            </div>
                
            </div>

        </nav>
        <!--nav bar end-->


  <form method="post" enctype="multipart/form-data">
  

    <h1>Login</h1>

    <fieldset>
      <div>
      <label for="username">Username:</label>
      <input type="text" id="mail" name="mail" value="<?php echo $email; ?>">
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
  <form>
  <center><label><b>New here then click on Sign up</b> </label></center>
<div>

  <button type="submit"><a href="SignupForm.php">Register With Us</a></button>
</div>
  </form>

  <div class="footer">
  
        <div class="f_text">
            <div class="explore all_txt">
                <h4>Explore</h4>
                <li><a href="#home">Home</a></li>
                <li><a href="#helpus">Help</a></li>
                <li><a href="#aboutus">About Us</a></li>
            </div>
            <div class="legal all_txt">
                <h4>Legal</h4>
                <li>Terms</li>
                <li>Privacy policy</li>
            </div>
            <div class="contact all_txt">
                <h4>Contact Us</h4>
                <li>mywork2021@gmail.com</li>
                <li>8857896324</li>
            </div>
        </div>
        <div class="f_last_txt">
            <p>Copyright © 2021 Domo, Inc. All rights reserved.</p>
        </div>
       
    </div>

</body>
</html>
