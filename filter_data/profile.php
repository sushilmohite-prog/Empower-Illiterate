<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Profile</title>
    <link href="css/temp.css" rel="stylesheet">
    <link href="css/profile.css" rel="stylesheet">
    <link href="css/bootstrap.css" rel='stylesheet' type="text/css">
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
      include("includes/functions.php");
      session_start();
      if(logged_in())
      {
        header("location:login.php");
      }
      $email=$_SESSION['mail'];
      $result=mysqli_query($connect,"SELECT id,first_name,last_name,img,dob,add_ress,add_dist,experience,work FROM users WHERE mail='$email'");
      $retrive=mysqli_fetch_array($result);
      //print_r($retrive);
      $id=$retrive['id'];
      $firstname=$retrive['first_name'];
      $lastname=$retrive['last_name'];
      $image=$retrive['img'];
      $date=$retrive['dob'];
      $address=$retrive['add_ress'];
      $city=$retrive['add_dist'];
      $exp=$retrive['experience'];
      $work=$retrive['work'];

       ?>
  <body id="body-bg">
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
                <a href="login.php"><button type="button" class="btn btn-success btn-sm mt-4 ml-5">Log in</button></a>
                </div>
                <div>
                <a href="signupform.php"><button type="button" class="btn btn-primary btn-sm mt-4 ml-2">Sign up</button></a>
                </div>
            </div>
        </nav>
        <!--nav bar end-->

<div class="container" style="padding-top:10px;  margin-top:20px;margin-bottom:20px;width:1200px; height:1400px">

      <h2 align='center'>Welcome <?php echo ucfirst($firstname)." ".ucfirst($lastname); ?></h2>
    <a href="logout.php">  <button class='btn btn-outline-danger' style='float:right;'><b>Log out</b></button></a>
    <?php echo "<a href='update-profile.php?user=$id'><button class='btn btn-outline-success' style='float:left;'><b>Update</b></button></br></br></a>";?>

      <center><img src='<?php echo $image ?>'class="img-fluid img-thumbnail "style="width:200px;"></center>
      <form>
      <div>
      <label for="name">First Name:</label>
      <input type="text" id="name" name="fname" readonly value="<?php echo $firstname; ?>">
      </div>

      <div>
      <label for="name">Last Name:</label>
      <input type="text" id="name" name="lname" readonly value="<?php echo $lastname;?>">
      </div>

      <div>
      <label for="mail">Email:</label>
      <input type="email" id="mail" name="mail" readonly value="<?php echo $email;?>">
      </div>

      <div>
      <label>Date Of Birth:</label>
      <input type="text"  name="dob" readonly value="<?php echo $date;?>">
      </div>

      <div>
      <label>State:</label>
      <input type="text"  name="state" readonly value="<?php echo $address;?>">
      </div>

      <div>
      <label>City:</label>
      <input type="text"  name="city" readonly value="<?php echo $city;?>">
      </div>

      <div>
      <label>Experience:</label>
      <input type="text"  name="exp" readonly value="<?php echo $exp;?>">
      </div>

      <div>
      <label>Past Work:</label>
      <input type="text"  name="work" readonly value="<?php echo $work;?>">
      </div>

    </form>
    <?php echo "<center><a href='del_prof.php?del=$id'><button class='btn btn-outline-danger' style='float:center;'><b>Delete profile</b></button></br></br></a></center>";?>

    </div>
    <div class="footer">
        <div class="media">
            <a href="#" class="fa fa-facebook m_logo"></a>
            <a href="#" class="fa fa-twitter"></a>
            <a href="#" class="fa fa-instagram"></a>

        </div>
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
