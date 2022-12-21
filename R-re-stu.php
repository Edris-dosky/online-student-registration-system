<!DOCTYPE html >
<html>
    
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="bootstrap.min1.css" >     
</head>


<body style="background-color:snow;">


<?php //پەرەی ئەو قوتابیانەی کە زانیاریان ناردوە
  include 'nav.php';
  ?>
<div class="row m-3 justify-content-center" > 
<?php
    include 'R-login-config.php';
    session_start();
    $part = $_SESSION["part"];
    if ($part!="کۆلێژی سۆران"){
        $call=mysqli_query($db,"SELECT * FROM `form`  WHERE `part`='$part' ");
        $xcall=mysqli_query($db,"SELECT * FROM `login`  WHERE `part`='$part' ");
        }else{
            $call=mysqli_query($db,"SELECT * FROM `form` ");
            $xcall=mysqli_query($db,"SELECT * FROM `login` ");
        }
    $count_login=mysqli_num_rows($xcall);
    $count_form=mysqli_num_rows($call);
    $count_cal=($count_login-$count_form)
    ?>



<?php

    while ($row=mysqli_fetch_array($call)){
    ?>  
        
        <div class="card m-3" style="max-width: 540px;">
        <div class="row no-gutters">
            <div class="col-md-4">
            <img src="upload/<?php echo $row['pic_stu'];?>" class="w-100" alt="...">
            </div>
            <div class="col-md-8">
            <div class="card-body">
            <img src="image/<?php if ($row['parallel']=='1'){ echo "parallel.png";}else{echo "npa.png";}?>" width="31" style=" position: absolute; left=0; margin-left:285px; margin-top:0px;">
                <h6><?php echo $row['ID']; ?></h6>
               <h5 class="card-title text-center"><?php echo $row['name']; ?></h5> 
               
                <p class="text-center">شوێنی نیشتەجێبون :<?php echo $row['place']; ?> </p>
                <p class="text-center">جۆری خوێندن :<?php echo $row['type']; ?> </p>
                <p class="card-text"><small class="text-muted"><?php echo $row['katt']; ?></small></p>
                <img src="image/<?php if ($row['suc']=='success'){ echo "suc.png";}else{echo "nsuc.png";}?>" width="30" style=" position: absolute; left=0; margin-left:285px; margin-top:15px;">
                <a href="R-view.php?postid=<?php echo $row['ID'];?>" class="btn mt-3 btn-primary btn-sm"> وەرگرتنی زانیاری &#10064;</a> 
                <a href="R-comment.php?postid=<?php echo $row['ID'];?>" class="btn mt-3 btn-primary btn-sm"> نوسینی تێبینی &#9998;</a>
                <a href="print_stu_id.php?postid=<?php echo $row['ID'];?>" class="btn mt-3 btn-dark btn-sm "> &#128438;</a>
                
            </div>
            </div>
        </div>
        </div>
        <?php  }
        if (mysqli_num_rows($call)==0){
            ?> 
            <div class="text-center container" >
            <h1 class="pt-5" > .....هیچ قوتابیەک زانیاریەکانی نەناردوە </h1><br>
                <div class="p-5">
            <div class="spinner-grow text-primary" role="status">
            <span class="visually-hidden">Loading...</span>
            </div>
            <div class="spinner-grow text-secondary" role="status">
            <span class="visually-hidden">Loading...</span>
            </div>
            <div class="spinner-grow text-success" role="status">
            <span class="visually-hidden">Loading...</span>
            </div>
            <div class="spinner-grow text-danger" role="status">
            <span class="visually-hidden">Loading...</span>
            </div>
            <div class="spinner-grow text-warning" role="status">
            <span class="visually-hidden">Loading...</span>
            </div>
            <div class="spinner-grow text-info" role="status">
            <span class="visually-hidden">Loading...</span>
            </div>
            <div class="spinner-grow text-light" role="status">
            <span class="visually-hidden">Loading...</span>
            </div>
            <div class="spinner-grow text-dark" role="status">
            <span class="visually-hidden">Loading...</span>
            </div></div></div>  <?php
        }
        ?>
    </div>
</body>
</html>

</body>
</html>