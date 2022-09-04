<?php
    function email_exists($email,$connect)
    {
        $row=mysqli_query($connect,"SELECT id FROM users WHERE mail='$email'");
        //print_r ($row);
        {
            if(mysqli_num_rows($row)==1)
            {
                return true;
            }
            else
            {
                return false;
            }
        }
    }

function logged_in()
{
    if($_SESSION['mail']=='')
    {
      return true;
    }
    else {
      return false;
    }
}




?>
