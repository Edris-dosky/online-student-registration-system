<?php //پەرەی سەیرکردنی هەموو زانیاریاکانی قوتابی 
include 'R-login-config.php';


$post_id=($_GET['postid']);

$query=mysqli_query($db,"SELECT * FROM `form` WHERE `ID`='$post_id'");
$row=mysqli_fetch_assoc($query);
$name=$row['name'];
$part=$row['part'];
$code=$row['code'];
$idcode=$row['idcode'];
$email=$row['email'];
$tell=$row['tell'];
$place=$row['place'];
$katt=$row['katt'];
$pic_stu=$row['pic_stu'];
$pic_ifo_card=$row['pic_ifo_card'];
$pic_food_card=$row['pic_food_card'];
$pic_centri=$row['pic_centri'];
$pscode=$row['pscode'];
$blood=$row['blood']; 


?>



<!DOCTYPE html >
<html>
    
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="bootstrap.min1.css" >    
    <link rel="stylesheet" href="edris.css">  
</head>

<body style="background-color:snow;">
  <div>ناو</div>
  <div><?php echo $name; ?></div>
  <img class="jihad" src="upload/<?php echo $pic_stu;?>">
  <br>
  <br>
  <br>
  <form >
    <div>ناوی ئیمەیل</div>
    <div><?php echo $email; ?></div>
    <br>
    <br>
    <br>
  </form>
  <form>
    <div>ژ. مۆبایل</div>
    <div><?php echo $tell; ?></div>
  </form>
  <br>
  <br>
  <br>
  <form >
    <div>کۆدی ناسنامە</div>
    <div><?php echo $idcode; ?></div>
  </form>
  <br>
  <br>
  <br>
  <form >
    <div>شوێن نیشتەجێبۆن</div>
    <div><?php echo $place; ?></div>
    <br>
    <br>
    <br>
  </form>
  <form action="R-view.php" method="GET">
    <div>بەشی وەرگیراو</div>
    <div><?php echo $part; ?></div>
    <br>
    <br>
    <br>
  </form>
  
    <a href="pic_all_screen.php?postid=<?php echo $pic_ifo_card;?>"> <img class="edris" src="upload/<?php echo $pic_ifo_card;?>"></a>
    <a href="pic_all_screen.php?postid=<?php echo $pic_centri;?>"> <img class="edris" src="upload/<?php echo $pic_centri;?>"> </a>
    <a href="pic_all_screen.php?postid=<?php echo $pic_food_card;?>"> <img class="edris" src="upload/<?php echo $pic_food_card?>"> </a>
    <br>
    <a href="R-comment.php?postid=<?php echo $row['ID'];?>" class="btn btn-primary btn-lg col-md-5 " style="margin-left:70px; margin-top:30px; margin-bottom:30px; width: 22%;"> نوسینی تێبینی &#9998;</a>
    <a href="suc.php?postid=<?php echo $row['ID'];?>" class="btn btn-success btn-lg active" style="margin-left:25px; margin-top:30px; margin-bottom:30px; width: 22%;"> تەواوبوون &#10003;</a>
    <a href="print_stu_id.php?postid=<?php echo $row['ID'];?>" class="btn btn-dark btn-lg " style="margin-left:25px; margin-top:30px; margin-bottom:30px; width: 22%;"> دروستکردنی ناسنامە &#128438;</a>
    <a href="R-re-stu.php" class="btn btn-danger btn-lg " style="margin-left:25px; margin-top:30px; margin-bottom:30px; width: 22%;"> گەڕانەوە &#10162;</a>
    
</body>
</html>