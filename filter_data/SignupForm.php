<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Sign Up Form</title>
  <link rel="stylesheet" href="css/temp.css">
  <link rel="stylesheet" href="css/Signup.css">
 

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

<?php
include("includes/config.php");
include("includes/Functions.php");
$firstname=''; $lastname=''; $email=''; $password=''; $c_password=''; $date=''; $skills=''; $image='';$mobile='';
$msg='';$msg1='';$msg2='';$msg3='';$msg4='';
$msg5='';$msg6='';$msg7='';$msg8='';$msg9='';$msg10='';
if(isset($_POST['submit']))
{
$firstname=$_POST['fname'];
$lastname=$_POST['lname'];
$email=$_POST['mail'];
$mobile=$_POST['mobile'];
$password=$_POST['pass'];
$c_password=$_POST['cpass'];
$date=$_POST['dob'];
$image=$_FILES['img']['name'];
$tmp_image=$_FILES['img']['tmp_name'];
$image_size=$_FILES['img']['size'];
$user_job=$_POST['user_job'];
$address=$_POST['address'];
$add_dist=$_POST['add_dist'];
$exp=$_POST['experiance'];
$working=$_POST['work'];
$check=isset($_POST['terms']);


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
    else if(email_exists($email,$connect))
    {
        $msg2="Email Exist";
    }
    elseif (empty($mobile))
    {
        $msg10="Please enter your mobile number";
    }
    elseif (strlen($mobile)<10) {
        $msg10="Plese enter valid mobile number";
    }
    else if(strlen($password)<5)
    {
        $msg3="Password must contain atleast 5 characters";
    }
    else if($password!=$c_password)
    {
        $msg4="Password does not match";
    }
    else if(empty($date))
    {
        $msg5="Please enter your date of birth";
    }
    else if($image=='')
    {
        $msg6="Please upload profile";
    }
    else if($image_size>1000000)
    {
        $msg6="Image size should be less than 1 MB";
    }
    else if($check=='')
    {
        $msg8="<br><br>Please agree terms and conditions";
    }
    else
    {
        //$password=md5($password);
        $img_ext=explode(".",$image);
        $image_ext=$img_ext['1'];
        $image=rand(1,1000).rand(1,1000).time().".".$image_ext;
        if($image_ext=='jpg' || $image_ext=='JPG' || $image_ext=='png' || $image_ext=='PNG')
        {
                move_uploaded_file($tmp_image,"../filter_data/$image");
                mysqli_query($connect,"INSERT INTO users(first_name,last_name,mail,mobile,pass,dob,img,job_roll,experience,work,add_ress,add_dist)
                VALUES('$firstname','$lastname','$email','$mobile','$password','$date','$image','$user_job','$exp','$working','$address','$add_dist')");
                $msg9="<div class='sucess'>You are Successfully Registered</div>";
                $firstname='';$lastname='';$email='';$mobile='';$password='';$c_password='';$date='';$skills='';$image='';
        }
        else
        {
            $msg6="<br>Please enter image file only";
        }

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
                <a href="login.php"><button type="button" class="btn btn-success btn-sm mt-4 ml-5">Log in</button></a>
                </div>
                
            </div>

        </nav>
        <!--nav bar end-->

  <form method="post" enctype="multipart/form-data">

    <h1>Sign Up</h1>
    <?php echo $msg9."<br>"; ?>

    <fieldset>

      <legend><span class="number">1</span>Your basic info</legend>
      <div>
      <label for="name">First Name:</label>
      <input type="text" id="name" name="fname" value="<?php echo $firstname; ?>">
        <?php echo $msg; ?>
      </div>

      <div>
      <label for="name">Last Name:</label>
      <input type="text" id="name" name="lname" value="<?php echo $lastname;?>">
      <?php echo $msg1; ?>
      </div>

      <div>
      <label for="mail">Email:</label>
      <input type="email" id="mail" name="mail" placeholder="ex-abc@gmail.com" value="<?php echo $email;?>">
      <?php echo $msg2; ?>
      </div>

      <div>
      <label for="mail">Mobile no:</label>
      <input type="text" id="mail" name="mobile" value="<?php echo $mobile;?>">
      <?php echo $msg10; ?>
      </div>

      <div>
      <label for="password">Password:</label>
      <input type="password" id="password" name="pass" value="<?php echo $password;?>">
      <?php echo $msg3; ?>
      </div>

      <div>
      <label for="password">Confirm Password:</label>
      <input type="password" id="password" name="cpass" placeholder="re-enter password" value="<?php echo $c_password;?>">
      <?php echo $msg4; ?>
      </div>

      <div>
      <label>Date Of Birth:</label>
      <input type="date" id="under_13" value="under_13" name="dob" value="<?php echo $date;?>">
      <?php echo $msg5; ?>
      </div>
    </fieldset>

    <fieldset>
      <legend><span class="number">2</span>Your profile</legend><br>
     <div>
      <label>Profile Image:</label>
      <input type="file" id="development" value="interest_development" name="img" value="<?php echo $image; ?>"/>
      <?php echo $msg6; ?>
      </div>
    </fieldset><br>

    <fieldset>
      <label for="job">Skills:</label>
      <select id="job" name="user_job">
        <optgroup label="Higene">
        <option value="Swipper">Select</option>
          <option value="Swipper">Swipper</option>
          <option value="Cleaner">Cleaner</option>
          <option value="Laundry">Laundry</option>
          <option value="Maid">Maid</option>
        </optgroup>
        <optgroup label="Machanics">
          <option value="Machanic(MCWG)">Machanic(MCWG)</option>
          <option value="Machanic(LMV)">Machanic(LMV)</option>
          <option value="Machanic(TR)">Machanic(TR)</option>
        </optgroup>
        <optgroup label="Repair">
        <option value="Painter">painter</option>
          <option value="Carpentary">Carpentary</option>
          <option value="Electrician">Electrician</option>
          <option value="Plumber">Plumber</option>
        </optgroup>
        <optgroup label="Other">
          <option value="secretary">Driver</option>
          <option value="Blacksmith">Blacksmith</option>
          <option value="Backery Work">Backery Work</option>
          <option value="Construction Worker">Construction Work</option>
        </optgroup>
      </select>
      </fieldset><br>

      <fieldset>
      <label for="experiance">Experience:</label>
      <select id="job" name="experiance">
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
      <label for="work">Mention Your Past Work If any:</label>
      <textarea name="work" placeholder="Like if you are working for any organisation in past"></textarea>
       </fieldset><br>

<legend><span class="number">3</span>Address Details</legend>

<fieldset>
  <label for="state">State:</label>
  <select id="job" name="address">
    <optgroup label="select">
      <option value="Maharashtra">Maharashtra</option>
    </optgroup>
  </select>
</fieldset><br>
<fieldset>
    <label for="district">City:</label>
    <select id="job" name="add_dist">
      <optgroup label="select">
        <option value="Jalgaon">Jalgaon</option>
        <option value="Dhule">Dhule</option>
        <option value="Nandurbar">Nandurbar</option>
      </optgroup>
    </select>
    </fieldset><br>

<fieldset>
     <div>
      <label>Declaration:</label><br>
      <input type="checkbox" id="development" value="interest_development" name="terms">
      <label class="light" for="development">I hereby declare that all the information furnished above is true to the best of my belief.</label>
      <?php echo $msg8; ?>
      </div>
      <br>

    </fieldset>
    <button type="submit" value="submit" name="submit">Sign Up</button>
    <center><b><a href="login.php">Already Registered</a></b></center>
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
                <li>empowerilliterate@gmail.com</li>
                <li>8857896324</li>
            </div>
        </div>
        <div class="f_last_txt">
            <p>Copyright © 2021 Domo, Inc. All rights reserved.</p>
        </div>
       
    </div>

</body>
</html>
