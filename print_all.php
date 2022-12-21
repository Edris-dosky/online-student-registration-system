<?php
include 'R-login-config.php';

$query=mysqli_query($db,"SELECT * FROM `form`");
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
    <?php
while ($row=mysqli_fetch_array($query)) {
    ?>  
<div>
    <img src="image/epu_collage.png" alt="">
<br>    
    <img class="girl" src="upload/<?php echo $row['pic_stu'];?>" alt=""> 
    <p >
        <span style="float: right;">: بەشی </span>
        <span style="color: red; float: right;"><?php echo $row['part'];?></span>
    
<br>   

        <span style="float: right;"> :ناوی قوتابی</span>
        <span style="color: red; float: right;"><?php echo $row['name'];?></span>  

<br>    

        <span style="float: right;"> :ش.نیشتەجێبۆن</span>
        <span style="color: red; float: right;"><?php echo $row['place'];?></span>


<br>    
    
        <span style="float: right;">:گرۆپی خوێن</span>
        <span style="color: red; float: right; "><?php echo $row['blood'];?></span> 
    
<br>   

        <span style="float: right;">:ژمارەی ناسنامە</span>
        <span style="color: red; float: right;"><?php echo $row['idcode'];?></span>
    </p>

    </div>
    <br>
    <?php } ?>
</body>
</html>
<?php
echo "<script> window.print()</script>";

?>