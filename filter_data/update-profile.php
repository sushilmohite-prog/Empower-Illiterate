<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Update Your Details</title>
  <link href='https://fonts.googleapis.com/css?family=Nunito:400,300' rel='stylesheet' type='text/css'>
  <link rel="stylesheet" href="css/Signup.css">
  <link rel="stylesheet" href="css/temp.css">
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
include("includes/Functions.php");
$firstname=''; $lastname=''; $email=''; $password=''; $c_password=''; $date=''; $skills=''; $image='';
$msg='';$msg1='';$msg2='';$msg3='';$msg4='';
$msg5='';$msg6='';$msg7='';$msg8='';$msg9='';
$id=$_GET['user'];
if(isset($id))
{
$result=mysqli_query($connect,"SELECT * FROM users WHERE id='$id' ");
$retrive=mysqli_fetch_array($result);
$name=$retrive['first_name'];
$last=$retrive['last_name'];
$mail=$retrive['mail'];
$dob=$retrive['dob'];
$address=$retrive['add_ress'];
$city=$retrive['add_dist'];
$exp=$retrive['experience'];
$work=$retrive['work'];
}
if(isset($_POST['submit']))
{

$firstname=$_POST['fname'];
$lastname=$_POST['lname'];
$email=$_POST['mail2'];
$date=$_POST['dob2'];
$add=$_POST['state2'];
$dist=$_POST['city2'];
$exp2=$_POST['exp2'];
$work2=$_POST['work2'];

//echo $firstname."</br>".$lastname."</br>".$email."</br>".$password."</br>".$date."</br>".$skills."</br>".$image."</br>".
  //  $user_job."</br>".$job_time."</br>".$check;

    if(strlen($firstname)<3)
    {
        $msg="First name must contain atleast 3 characters";
    }
    else if(strlen($lastname)<3)
    {
        $msg1="Last name must contain atleast 3 characters";
    }
    else if (!filter_var($email,FILTER_VALIDATE_EMAIL))
    {
        $msg2="Enter valid email";
    }
    else if(empty($date))
    {
        $msg5="Please enter your date of birth";
    }
    else
    {
                mysqli_query($connect,"UPDATE users SET first_name='$firstname',last_name='$lastname',mail='$email',dob='$date',
                add_ress='$add',add_dist='$dist',experience='$exp2',work='$work2' WHERE id='$id'");
                $msg9="<div class='sucess'>User Details Successfully Updated</div>";
                $firstname='';$lastname='';$email='';$date='';
        }


}



?>

<body id="body-bg">
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
                <a href="login.php"><button type="button" class="btn btn-success btn-sm mt-4 ml-3">Log in</button></a>
                </div>
                <div>
                <a href="signupform.php"><button type="button" class="btn btn-primary btn-sm mt-4 ml-4">Sign up</button></a>
                </div>
            </div>
        </nav>

  <form method="post">

    <h1>Update User Details</h1>
    <?php echo $msg9."<br>"; ?>

    <fieldset>

      <div>
      <label for="name">First Name:</label>
      <input type="text" id="name" name="fname" value="<?php echo $name; ?>">
        <?php echo $msg; ?>
      </div>

      <div>
      <label for="name">Last Name:</label>
      <input type="text" id="name" name="lname" value="<?php echo $last;?>">
      <?php echo $msg1; ?>
      </div>

      <div>
      <label for="mail">Email:</label>
      <input type="email" id="mail" name="mail2" placeholder="ex-abc@gmail.com" value="<?php echo $mail;?>">
      <?php echo $msg2; ?>
      </div>

      <div>
      <label>Date Of Birth:</label>
      <input type="text" placeholder="YYYY/MM/DD" name="dob2" value="<?php echo $dob;?>">
      <?php echo $msg5; ?>
      </div>
      
      <fieldset>
  <label for="state">State:</label>
  <select id="job" name="state2">
    <optgroup label="select">
      <option value="Maharashtra">Maharashtra</option>
    </optgroup>
  </select>
</fieldset><br>

<fieldset>
    <label for="district">City:</label>
    <select id="job" name="city2">
      <optgroup label="select">
        <option value="Jalgaon">Jalgaon</option>
        <option value="Dhule">Dhule</option>
        <option value="Nandurbar">Nandurbar</option>
      </optgroup>
    </select>
    </fieldset><br>

    <fieldset>
      <label for="experiance">Update Experience:</label>
      <select id="job" name="exp2">
        <optgroup label="Experience in years">
        <option value="0 year">0</option>
          <option value="1 year">1</option>
          <option value="2 years">2</option>
          <option value="3 years">3</option>
          <option value="4 years">4</option>
          <option value="5 years"> 5</option>
          <option value="6 years">6</option>
        </optgroup>
       </select>
       </fieldset><br>

       <fieldset>
      <label for="work">Update Your Past Work If any:</label>
      <textarea name="work2" placeholder="Like if you are working for any organisation in past"></textarea>
       </fieldset><br>
    </fieldset>

    <button type="submit" value="submit" name="submit">Update</button>
    <center><a href="profile.php"><b>Back to profile</b></a></center>
  </form>
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
