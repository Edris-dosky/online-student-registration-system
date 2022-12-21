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

<?php  // پەرەی ئەو قوتابیانەی وەرگیراون
    include 'R-login-config.php';
    session_start();
    $part = $_SESSION["part"];
    if ($part!="کۆلێژی سۆران"){
    $call=mysqli_query($db,"SELECT * FROM `form`  WHERE `part`='$part' ");
    $xcall=mysqli_query($db,"SELECT `type`,`passcode`,`code`,`send`,`part`,`name`,`id` FROM `login`  WHERE `part`='$part' ");
    }else{
        $pcall=mysqli_query($db,"SELECT `type`,`passcode`,`code`,`send`,`part`,`name`,`id` FROM `login` where `parallel` = '1'  ");
        $call=mysqli_query($db,"SELECT * FROM `form` ");
        $xcall=mysqli_query($db,"SELECT `type`,`passcode`,`code`,`send`,`part`,`name`,`id` FROM `login`  ");
    }
    ?>



    <?php
    echo "<table class='table table-striped' width='100px' border-style='solid' >";
    echo "<tr><th>جۆری خوێندن</th><th>وشەی تێپەر</th><th>کۆدی بەکارهێنەر</th><th>زانیاریەکانی ناردوە ؟</th><th>بەشی وەرگیراو</th><th>ناو</th><th>ID</th></tr>";
    while ($row=mysqli_fetch_array($xcall)){
        echo "<tr><td>{$row[0]}</td>";
        echo "<td >{$row[1]}</td>";
        echo "<td>{$row[2]}</td>";
        echo "<td>{$row[3]}</td>";
        echo "<td>{$row[4]}</td>";
        echo "<td>{$row[5]}</td>";
        echo "<td>{$row[6]}</td></tr>";
    }
    echo "<br><br><br><br> <h1 style='text-align:center; border-style: outset;' class='p-3'>لیستی هەموو ئەو قوتابیانەی ئەمساڵ لە کۆلێژ وەرگیراون </h1>";


    if ($part=="کۆلێژی سۆران"){
    echo "<table class='table table-striped' width='100px' border-style='solid' >";
    echo "<tr><th>جۆری خوێندن</th><th>وشەی تێپەر</th><th>کۆدی بەکارهێنەر</th><th>زانیاریەکانی ناردوە ؟</th><th>بەشی وەرگیراو</th><th>ناو</th><th>ID</th></tr>";
    while ($row=mysqli_fetch_array($pcall)){
            echo "<tr><td>{$row[0]}</td>";
            echo "<td >{$row[1]}</td>";
            echo "<td>{$row[2]}</td>";
            echo "<td>{$row[3]}</td>";
            echo "<td>{$row[4]}</td>";
            echo "<td>{$row[5]}</td>";
            echo "<td>{$row[6]}</td></tr>";
    }
    echo "<br><br><br><br> <h1 style='text-align:center; border-style: outset;' class='p-3'>لیستی هەموو ئەو قوتابیانەی ئەمساڵ لە کۆلێژ وەرگیراون بە پارالێل</h1>";
    }
    ?>  
    </div>
    <input type="button" id="btnprint" value="print  &#128438;" class="btn btn-dark" onclick="print_page()" />
</body>
</html>