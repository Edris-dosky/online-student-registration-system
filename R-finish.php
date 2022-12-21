<!DOCTYPE html >
<html style="height: 100%;">
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="bootstrap.min1.css" >  
    <link rel="stylesheet" href="text.css" >        
</head>
<body style="background-image:linear-gradient(#FFFFFF, rgb(255, 122, 89));">
<div class="container box text-center">
    <div class="m-5" style="color:blue; text-shadow: 2px 8px 9px orange;" > 
    <h1>ناردنی زانیاریەکانت سەرکەوتوو بوو</h1>
    </div>
    <h3 class="m-5" style="color:blue; " >:  بەم زوانە ئەنجام دادەنرێ لە خوارەوە  </h3>




    <?php   //پەرەی تەواو بونی ناردنی قوتابی کە کۆمێتی ئەدمینی لێدا ئەنرێ
    include 'R-login-config.php';
    session_start();
    $xcode = $_SESSION["code"];
    $call=mysqli_query($db,"SELECT * FROM `form` WHERE `code`='$xcode' ");
    $row=mysqli_fetch_assoc($call);


    if ($row['comment']){
    echo "<h3>{$row['comment']}</h3>";
    }else{
    ?>




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
    </div></div>

</div>
<?php } ?>
</body>
</html>


<?php 
?> 