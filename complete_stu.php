<!DOCTYPE html >
<html>
    
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="bootstrap.min1.css" >     
    <script type="text/javascript">
        function print_page() {
            var ButtonControl = document.getElementById("btnprint");
            ButtonControl.style.visibility = "hidden";
            window.print();
        }
    </script> 
</head>


<body style="background-color:snow;">
<?php 
  include 'nav.php';
  ?>
<div class="row m-3 justify-content-center" > 
<h1 style="text-align:center; border-style: outset;" class="p-3"> لیستی هەموو ئەو قوتابیانەی ئەمساڵ لە کۆلێژ وەرگیراون و تەواوبوون</h1>

<?php  //پەرەی زانیاریەکانی ئادمینەکان کە تایبەتە بە ادمینی گشتی
    include 'R-login-config.php';
    session_start();
    $part = $_SESSION["part"];
    if ($part!="کۆلێژی سۆران"){
    $call=mysqli_query($db,"SELECT `blood`,`tell`,`place`,`type`,`part`,`name` FROM `form`  WHERE `part`='$part' and `suc`='success'  ");
    $pcall=mysqli_query($db,"SELECT `blood`,`tell`,`place`,`type`,`part`,`name` FROM `form` where `parallel` = '1' and `part`='$part' and `suc`='success' ");
    $xcall=mysqli_query($db,"SELECT * FROM `login`  WHERE `part`='$part' ");
    }else{
        $call=mysqli_query($db,"SELECT `blood`,`tell`,`place`,`type`,`part`,`name` FROM `form` where  `suc`='success' order by `part` ");
        $pcall=mysqli_query($db,"SELECT `blood`,`tell`,`place`,`type`,`part`,`name` FROM `form` where `parallel` = '1' and `suc`='success' ");
        $xcall=mysqli_query($db,"SELECT * FROM `login` ");
        $xxcall=mysqli_query($db,"SELECT * FROM `admin` ");
    }
    $count_login=mysqli_num_rows($xcall);
    $count_form=mysqli_num_rows($call);
    $count_cal=($count_login-$count_form)
    ?>



    <?php
    echo "<table class='table table-striped' width='100px' border-style='solid' >";
    echo "<tr><th>جۆری خوێن</th><th>ژمارە تیلیفۆن</th><th>شوێنی نیشتەجێبون</th><th>جۆری خوێندن</th><th>بەشی وەرگیراو</th><th>ناو</th></tr>";
    while ($row=mysqli_fetch_array($call)){
        echo "<tr><td>{$row[0]}</td>";
        echo "<td >{$row[1]}</td>";
        echo "<td>{$row[2]}</td>";
        echo "<td>{$row[3]}</td>";
        echo "<td>{$row[4]}</td>";
        echo "<td>{$row[5]}</td></tr>";
    }
    echo "<br>";
    ?> 
    <input type="button" id="btnprint" value="print  &#128438;" class="btn btn-dark" onclick="print_page()" />
    <?php
    
    echo "<table class='table table-striped' width='100px' border-style='solid' >";
    echo "<tr><th>جۆری خوێن</th><th>ژمارە تیلیفۆن</th><th>شوێنی نیشتەجێبون</th><th>جۆری خوێندن</th><th>بەشی وەرگیراو</th><th>ناو</th></tr>";
    while ($row=mysqli_fetch_array($pcall)){
            echo "<tr><td>{$row[0]}</td>";
            echo "<td >{$row[1]}</td>";
            echo "<td>{$row[2]}</td>";
            echo "<td>{$row[3]}</td>";
            echo "<td>{$row[4]}</td>";
            echo "<td>{$row[5]}</td></tr>";
    }
    echo "<br><br><br><br> <h1 style='text-align:center; border-style: outset;' class='p-3'>لیستی هەموو قوتابیانی تەواوبوو بە پارالێل</h1>";

    ?>  
    
</body>
</html>