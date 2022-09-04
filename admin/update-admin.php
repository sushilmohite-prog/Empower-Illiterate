<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Update user Details</title>
  <link href='https://fonts.googleapis.com/css?family=Nunito:400,300' rel='stylesheet' type='text/css'>
  <link rel="stylesheet" href="css/Signup.css">
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
$result=mysqli_query($connect,"SELECT first_name,last_name,mail,dob FROM users WHERE id='$id' ");
$retrive=mysqli_fetch_array($result);
$name=$retrive['first_name'];
$last=$retrive['last_name'];
$mail=$retrive['mail'];
$dob=$retrive['dob'];
}
if(isset($_POST['submit']))
{

$firstname=$_POST['fname'];
$lastname=$_POST['lname'];
$email=$_POST['mail2'];
$date=$_POST['dob2'];

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
                mysqli_query($connect,"UPDATE users SET first_name='$firstname',last_name='$lastname',mail='$email',dob='$date'WHERE id='$id'");
                $msg9="<div class='sucess'>User Details Successfully Updated</div>";
                $firstname='';$lastname='';$email='';$date='';
        }


}



?>

<body>

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
    </fieldset>

    <button type="submit" value="submit" name="submit">Update</button>
    <centre><a href="admin.php"><b>Back to admin panel</b></a></centre>
  </form>

</body>
</html>
