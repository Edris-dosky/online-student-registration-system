<?php
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
$pic_stu=$row['pic_stu'];
$blood=$row['blood']; 
?> 

<!DOCTYPE html>
<html lang="en">
<head>
<title>print</title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./style_print_stu_id.css"> 
</head>
<body>
<div>
    <img src="image/epu_collage.png" alt="">
<br>    
    <img class="girl" src="upload/<?php echo $pic_stu;?>" alt=""> 
    <p >
        <span style="float: right;">: بەشی </span>
        <span style="color: red; float: right;"><?php echo $part;?></span>
    
<br>   

        <span style="float: right;"> :ناوی قوتابی</span>
        <span style="color: red; float: right;"><?php echo $name;?></span>  

<br>    

        <span style="float: right;"> :ش.نیشتەجێبۆن</span>
        <span style="color: red; float: right;"><?php echo $place;?></span>


<br>    
    
        <span style="float: right;">:گرۆپی خوێن</span>
        <span style="color: red; float: right; "><?php echo $blood;?></span> 
    
<br>   

        <span style="float: right;">:ژمارەی ناسنامە</span>
        <span style="color: red; float: right;"><?php echo $idcode;?></span>
    </p>

    </div>
</body>
</html>
<?php
session_start();
$_SESSION["id"]=$post_id;
echo "<script> window.print()</script>";

?>