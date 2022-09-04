<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Hire worker</title>
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

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>



  <?php include("includes/config.php") ?>
  </head>

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
                <div>
                <a href="signupform.php"><button type="button" class="btn btn-primary btn-sm mt-4 ml-2">Sign up</button></a>
                </div>
            </div>
        </nav>
        <!--nav bar end-->
        <div class="row justify-content-center">
                        <div class="col-12 col-md-10 col-lg-8">
                            <form method="post">
                                <div class="card-body row no-gutters align-items-center">
                                    
                                    <div class="col">
                                        <input class="form-control form-control-lg form-control-borderless" name="keyword" type="search" placeholder="Search by skills">
                                    </div>
                                    <!--end of col-->
                                    <div class="col-auto">
                                        <button class="btn btn-lg btn-success" style="padding-top:12px; padding-bottom:12px;" type="submit" name="search">Search</button>
                                    </div>
                                    <!--end of col-->
                                </div>
                            </form>
                        </div>
                        <!--end of col-->
                    </div>
      <div class="row">
        <div class="col-lg-3 border-right border-top" >
        <hr class="bg-primary">
          <h5>Filter</h5>
          <hr class="bg-primary">
          <h6 class="text-info">Select State</h6>
          <ul class="list-group">
            <?php
                $sql="SELECT DISTINCT add_ress FROM users";
                $result=$connect->query($sql);
                while ($row=$result->fetch_assoc())
                {
             ?>
          <li class="list-group-item">
            <div class="form-check">
              <label class="form-check-label">
                <input type="checkbox" class="form-check-input check" id="state" value="<?=$row['add_ress'];?>">
                  <label><?=$row['add_ress']; ?></label>
              </label>
            </div>
          </li>
          <?php } ?>
          </ul>
          <hr class="bg-primary">
          <h6 class="text-info">Select City</h6>
          <ul class="list-group">
            <?php
                $sql="SELECT DISTINCT add_dist FROM users";
                $result=$connect->query($sql);
                while ($row=$result->fetch_assoc())
                {
             ?>
          <li class="list-group-item">
            <div class="form-check">
              <label class="form-check-label">
                <input type="checkbox" class="form-check-input check" id="city" value="<?=$row['add_dist'];?>">
                  <label><?=$row['add_dist']; ?></label>
              </label>
            </div>
          </li>
          <?php } ?>
          </ul>
          <hr class="bg-primary">
          <h6 class="text-info">Select Job</h6>
          <ul class="list-group">
            <?php
                $sql="SELECT DISTINCT job_roll FROM users";
                $result=$connect->query($sql);
                while ($row=$result->fetch_assoc())
                {
             ?>
          <li class="list-group-item">
            <div class="form-check">
              <label class="form-check-label">
                <input type="checkbox" class="form-check-input check" id="job" value="<?=$row['job_roll'];?>">
                  <label><?=$row['job_roll']; ?></label>
              </label>
            </div>
          </li>
          <?php } ?>
          </ul>
          <hr class="bg-primary">
          <h6 class="text-info">By Experience</h6>
          <ul class="list-group">
            <?php
                $sql="SELECT DISTINCT experience FROM users";
                $result=$connect->query($sql);
                while ($row=$result->fetch_assoc())
                {
             ?>
          <li class="list-group-item">
            <div class="form-check">
              <label class="form-check-label">
                <input type="checkbox" class="form-check-input check" id="exp" value="<?=$row['experience'];?>">
                  <label><?=$row['experience']; ?></label>
              </label>
            </div>
          </li>
          <?php } ?>
          </ul>
        </div>
        <div class="col-lg-9 border-top">
        <hr class="bg-primary">
          <h5 class="text-center" id="textchange">All Workers</h5>
          <hr class="bg-primary">
          <div class="text-center">
            <img src="images/loader.gif" id="loader" width="400" style="display:none;">
          </div>
          <div class="row" id="result">
          <?php
          //echo"<body class="bg-light">";
          $sql="SELECT * FROM users";
          $result=$connect->query($sql);
          while ($row=$result->fetch_assoc())
          {
            //$image=$row['image'];
          ?>
          <div class="container">
              <div class="row d-flex justify-content-center">
                    <div class="col-md-9 mt-2 pt-3">
                      <div class="row z-depth-2 border border-info rounded">
                          <div class="col-sm-2 bg-info rounded-left">
                            <div class="card-block text-center text-white">
          <img src="<?=$row['img']?>"height='100px'; width='100px';>
          <h4 class="font-weight-bold mt-2"><?=$row['first_name']?></h4>
          <h4 class="font-weight-bold mt-2"><?=$row['last_name']?></h4>
          </div>
          </div>
          <div class="col-sm-8 bg-white rounded-right">
          <div class="row mt-3 mx-md-n1">
            <div class="col-sm-6">
                <p class="font-weight-bold">Skills:</p>
                <h6 class=" text-muted"><?=$row['job_roll']?></h6>
            </div>
            <div class="col-sm-6">
                <p class="font-weight-bold">Phone:</p>
                <h6 class="text-muted">+91<?=$row['mobile']?></h6>
            </div>
            <div class="col-sm-6">
                <p class="font-weight-bold">Experience:</p>
                <h6 class="text-muted"><?=$row['experience']?></h6>
            </div>
            <div class="col-sm-6">
                <p class="font-weight-bold">Past Work:</p>
                <h6 class="text-muted"><?=$row['work']?></h6>
            </div>
            <div class="col-sm-6">
                <p class="font-weight-bold">State:</p>
                <h6 class="text-muted"><?=$row['add_ress']?></h6>
            </div>
            <div class="col-sm-6">
                <p class="font-weight-bold">City:</p>
                <h6 class="text-muted"><?=$row['add_dist']?></h6>
            </div>
            
          </div>
          
          </div>
          
          <div class="border border-left col-sm-2 bg-white rounded-right">
              <div class="mt-5 ml-2"><a href="tel:<?=$row['mobile']?>"><img src="images/call.png" hieght="80px" width="80px"/></a></div>   
          </div>

          </div>
          </div>
          </div>
          </div>
          <?php } ?>


          </div>

        </div>

      </div>

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

    <script type="text/javascript">
      $(document).ready(function()
    {
      $(".check").click(function(){
        $("#loader").show();

        var action ='data';
        var state = get_filter_text('state');
        var city = get_filter_text('city');
        var job = get_filter_text('job');
        var exp = get_filter_text('exp');

        $.ajax({
          url:'action.php',
          method:'POST',
          data:{action:action,state:state,city:city,job:job,exp:exp},
          success:function(response){
          $("#result").html(response);
          $("#loader").hide();
          $("#textchange").text("Filtered data");
          }
        });
      });
      function get_filter_text(text_id){
        var filterdata=[];
        $('#'+text_id+':checked').each(function(){
          filterdata.push($(this).val());
        });
        return filterdata;
      }
    });

    </script>

  </body>
</html>
