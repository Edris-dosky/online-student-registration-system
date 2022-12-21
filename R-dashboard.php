
<!DOCTYPE html >
<html>
    
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="bootstrap.min1.css" >
    <link rel="stylesheet" href="text.css" >          
</head>

<body style="background-color:snow">


  <?php 
  include 'nav.php';
  ?>
    
        
    <?php //پەرەی داشبۆردی ئادمینەکان
    
    session_start();
    $part = $_SESSION["part"];
    if($part=="کۆلێژی سۆران"){
      header("location:admin-dash.php");
    }
    $zero="no";
    include 'R-login-config.php';
    $call=mysqli_query($db,"SELECT * FROM `form` WHERE `part`='$part' ");
    $xcall=mysqli_query($db,"SELECT * FROM `login` WHERE `part`='$part' ");
    $pcall=mysqli_query($db,"SELECT * FROM `login` WHERE `parallel` = '1' and `part`='$part' ");
    $count_login=mysqli_num_rows($xcall);
    $count_form=mysqli_num_rows($call);
    $count_parallel=mysqli_num_rows($pcall);
    $count_cal=($count_login-$count_form);


    function cal_percentage($num_amount, $num_total) {
      $count1 = $num_amount / $num_total;
      $count2 = $count1 * 100;
      $count = number_format($count2, 0);
      return $count;
    }

    if ($count_form){
      $per_stu=cal_percentage($count_form, $count_login);
    }else{
      $per_stu=0;
    }

    if($count_cal){
      $per_not=cal_percentage($count_cal, $count_login);
    }else{
    $per_not=0;
  }

    $suc ="success";
    $nsuc="not";
    $nscall=mysqli_query($db,"SELECT * FROM `form` WHERE `suc`='$nsuc' and `part`='$part' ");
    $scall=mysqli_query($db,"SELECT * FROM `form` WHERE `suc`='$suc' and `part`='$part' ");
    $cns=mysqli_num_rows($nscall);
    $cs=mysqli_num_rows($scall);
    if ($cns){
    $per_cns=cal_percentage($cns, $count_form);
    }else {$per_cns=0;}
    if ($cs){
    $per_cs=cal_percentage($cs, $count_form);
    }else {$per_cs=0;}
    if ($count_parallel){
    $per_parallel=cal_percentage($count_parallel, $count_login);
    }else {$per_parallel=0;}
    ?>
      <h1 class="text-center container" style="margin-bottom:50px; margin-top:0px; border:0px solid blue; box-shadow: 2px 2px 7px blue;  border-radius: 25px;  "> <?php echo $part ?></h1>
    <div class="row mt-5 justify-content-center text-center  ">
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-5">
          <div class="card">
            <div class="card-body p-5 ">
              <div class="row">
                  <div class="numbers">
                    <h6 class="text-sm mb-3 w-40 text-capitalize  font-weight-bold  ">:  ئەو قوتابیانەی زانیاریەکانیان <span style="color:red">نەناردوە </span> </h6>
                    <h5 class="font-weight-bolder m-2">
                      <?php echo $count_cal; ?>
                      <div class="progress m-4">
                      <div class="progress-bar" role="progressbar" style="width: <?php echo $per_not; ?>%;" aria-valuenow="<?php echo $per_not; ?>" aria-valuemin="0" aria-valuemax="100"><?php echo $per_not; ?>%</div>
                    </div>
                      <span class="text-success text-sm font-weight-bolder"></span>
                    </h5>

                    <a href="R-not-stu.php" class="btn mt-3 btn-primary">وەرگرتنی زانیاری</a> 

                </div>
                <div class="col-4 text-end">
                  <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                    <i class="ni ni-money-coins text-lg opacity-10" aria-hidden="true"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
          <div class="card">
            <div class="card-body p-5">
              <div class="row">
                  <div class="numbers">
                    <h6 class="text-sm mb-3 text-capitalize font-weight-bold">: ئەو قوتابیانەی زانیاریەکانیان ناردوە </h6>
                    <h5 class="font-weight-bolder m-2">
                    <?php echo $count_form; ?>
                    
                    <div class="progress m-4">
                      <div class="progress-bar" role="progressbar" style="width: <?php echo $per_stu; ?>%;" aria-valuenow="<?php echo $per_stu; ?>" aria-valuemin="0" aria-valuemax="100"><?php echo $per_stu."%"; ?></div>
                    </div>
                      <span class="text-success text-sm font-weight-bolder"></span>
                    </h5>

                    <a href="R-re-stu.php" class="btn mt-3 btn-primary">وەرگرتنی زانیاری</a> 

                </div>
                <div class="col-4 text-end">
                  <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                    <i class="ni ni-world text-lg opacity-10" aria-hidden="true"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
          <div class="card">
            <div class="card-body p-5">
              <div class="row">
                  <div class="numbers">
                    <h6 class="text-sm mb-3 text-capitalize font-weight-bold">:  ئەو قوتابیانەی ئەمساڵ وەگیراون</h6>
                    <h5 class="font-weight-bolder m-2">
                    <?php echo $count_login; ?>
                    <div class="progress m-4">
                      <div class="progress-bar" role="progressbar" style="width: 100%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">100%</div>
                    </div>
                      <span class="text-danger text-sm font-weight-bolder"></span>
                    </h5>

                    <a href="R-all-stu.php" class="btn mt-3 btn-primary">وەرگرتنی زانیاری</a> 

                </div>
                <div class="col-4 text-end">
                  <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                    <i class="ni ni-paper-diploma text-lg opacity-10" aria-hidden="true"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        
      </div>

      <div class="row mt-5 justify-content-center text-center  ">
      <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
          <div class="card">
            <div class="card-body p-5">
              <div class="row">
                  <div class="numbers">
                    <h6 class="text-sm mb-3 text-capitalize font-weight-bold">: ئەو قوتابیانەی پێداچونەوەیان بۆ <span style="color:red">نەکراوە </span> </h6>
                    <h5 class="font-weight-bolder m-2">
                    <?php echo $cns ; ?>
                    <div class="progress m-4">
                    <div class="progress-bar" role="progressbar" style="width: <?php echo $per_cns; ?>%;" aria-valuenow="<?php echo $per_cns; ?>" aria-valuemin="0" aria-valuemax="100"><?php echo $per_cns; ?>%</div>
                    </div>
                      <span class="text-danger text-sm font-weight-bolder"></span>
                    </h5>

                    <a href="check-n.php" class="btn mt-3 btn-primary">وەرگرتنی زانیاری</a> 

                </div>
                <div class="col-4 text-end">
                  <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                    <i class="ni ni-paper-diploma text-lg opacity-10" aria-hidden="true"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      <div class="col-xl-3 col-sm-6 mb-xl-0 mb-6">
          <div class="card">
            <div class="card-body p-5 ">
              <div class="row">
                  <div class="numbers">
                    <h6 class="text-sm mb-3 text-capitalize  font-weight-bold  ">:   قوتابیە پارالێلەکان</h6>
                    <h5 class="font-weight-bolder m-2">
                      <?php echo $count_parallel; ?>
                      <div class="progress m-4">
                      <div class="progress-bar" role="progressbar" style="width: <?php echo $per_parallel; ?>%;" aria-valuenow="<?php echo $per_parallel; ?>" aria-valuemin="0" aria-valuemax="100"><?php echo $per_parallel; ?>%</div>
                    </div>
                      <span class="text-success text-sm font-weight-bolder"></span>
                    </h5>

                    <a href="R_stu_para.php" class="btn mt-3 btn-primary">وەرگرتنی زانیاری</a> 

                </div>
                <div class="col-4 text-end">
                  <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                    <i class="ni ni-money-coins text-lg opacity-10" aria-hidden="true"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>


                <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
          <div class="card">
            <div class="card-body p-5">
              <div class="row">
                  <div class="numbers">
                    <h6 class="text-sm mb-3 text-capitalize font-weight-bold">: ئەو قوتابیانەی پێداچونەوەیان بۆ کراوە </h6>
                    <h5 class="font-weight-bolder m-2">
                    <?php echo $cs; ?>
                    <div class="progress m-4">
                    <div class="progress-bar" role="progressbar" style="width: <?php echo $per_cs; ?>%;" aria-valuenow="<?php echo $per_cs; ?>" aria-valuemin="0" aria-valuemax="100"><?php echo $per_cs; ?>%</div>
                    </div>
                      <span class="text-danger text-sm font-weight-bolder"></span>
                    </h5>

                    <a href="check-stu.php" class="btn mt-3 btn-primary">وەرگرتنی زانیاری</a> 

                </div>
                <div class="col-4 text-end">
                  <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                    <i class="ni ni-paper-diploma text-lg opacity-10" aria-hidden="true"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        </div>
      <br>
      <a href="admin.php" class="btn btn-info btn-lg ml-5">
          <span class="glyphicon glyphicon-log-out"></span> Log out
        </a>
</body>
</html>
