<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" href="temp.css">
  </head>
<?php
include("includes/config.php");

if(isset($_POST['action'])){
  $sql="SELECT * FROM users WHERE add_ress !=''";
if(isset($_POST['state'])){
    $state=implode("','",$_POST['state']);
    $sql .="AND add_ress IN('".$state."')";
  }
  if(isset($_POST['city'])){
      $city=implode("','",$_POST['city']);
      $sql .="AND add_dist IN('".$city."')";
    }
    if(isset($_POST['job'])){
        $job=implode("','",$_POST['job']);
        $sql .="AND job_roll IN('".$job."')";
      }
      if(isset($_POST['exp'])){
        $exp=implode("','",$_POST['exp']);
        $sql .="AND experience IN('".$exp."')";
      }

      $result= $connect->query($sql);
      $output='';

      if($result->num_rows>0){
        while($row=$result->fetch_assoc()){
            $output.='<div class="container">
                <div class="row d-flex justify-content-center">
                      <div class="col-md-9 mt-2 pt-3">
                        <div class="row z-depth-2 border border-info rounded">
                            <div class="col-sm-2 bg-info rounded-left">
                              <div class="card-block text-center text-white">
            <img src="'.$row['img'].'"height="100px"; width="100px";>
            <h4 class="font-weight-bold mt-2">'.$row['first_name'].'</h4>
            <h4 class="font-weight-bold mt-2">'.$row['last_name'].'</h4>
            </div>
            </div>
            <div class="col-sm-8 bg-white rounded-right">
            <div class="row mt-3 mx-md-n1">
              <div class="col-sm-6">
                  <p class="font-weight-bold">Job Roll:</p>
                  <h6 class=" text-muted">'.$row['job_roll'].'</h6>
              </div>
              <div class="col-sm-6">
                  <p class="font-weight-bold">Phone:</p>
                  <h6 class="text-muted">+91'.$row['mobile'].'</h6>
              </div>
              <div class="col-sm-6">
                <p class="font-weight-bold">Experience:</p>
                <h6 class="text-muted">'.$row['experience'].'</h6>
            </div>
            <div class="col-sm-6">
                <p class="font-weight-bold">Past Work:</p>
                <h6 class="text-muted">'.$row['work'].'</h6>
            </div>
              <div class="col-sm-6">
                  <p class="font-weight-bold">State:</p>
                  <h6 class="text-muted">'.$row['add_ress'].'</h6>
              </div>
              <div class="col-sm-6">
                  <p class="font-weight-bold">City:</p>
                  <h6 class="text-muted">'.$row['add_dist'].'</h6>
              </div>
            </div>
            </div>
            <div class="border border-left col-sm-2 bg-white rounded-right">
              <div class="mt-5 ml-2"><a href="tel:'.$row['mobile'].'"><img src="images/call.png" hieght="80px" width="80px"/></a></div>   
          </div>
            </div>
            </div>
            </div>
            </div>';
        }
      }
      else{
        $output="no products found";
      }
      echo $output;
}


 ?>
 <body>

 </body>
</html>
