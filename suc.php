<?php //پەرەی گۆرینی قوتابی لەوەی چیک ناکراو بۆ چیک کراو کاتێک مامۆستا دوگمەی تەواوبون لە دەدا
include 'R-login-config.php';
$post_id=($_GET['postid']);

  $query=mysqli_query($db,"UPDATE `form` SET`suc`='success' WHERE `ID`='$post_id'");
  if ($query){
    header("location:R-re-stu.php"); 
  }
?>