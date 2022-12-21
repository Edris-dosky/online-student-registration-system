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


<?php  //پەرەی زانیاریەکانی ئادمینەکان کە تایبەتە بە ادمینی گشتی
    include 'R-login-config.php';
    session_start();
    $part = $_SESSION["part"];
    if ($part!="کۆلێژی سۆران"){
    $call=mysqli_query($db,"SELECT * FROM `form`  WHERE `part`='$part' ");
    $xcall=mysqli_query($db,"SELECT * FROM `login`  WHERE `part`='$part' ");
    }else{
        $call=mysqli_query($db,"SELECT * FROM `form` ");
        $xcall=mysqli_query($db,"SELECT * FROM `login` ");
        $xxcall=mysqli_query($db,"SELECT * FROM `admin` ");
    }
    $count_login=mysqli_num_rows($xcall);
    $count_form=mysqli_num_rows($call);
    $count_cal=($count_login-$count_form)
    ?>



    <?php
    echo "<table class='table table-striped' width='100px' border-style='solid' >";
    echo "<tr><th>ID</th><th>EMAIL</th><th>PASSWORD</th><th>DATE OF BIRTH</th><th>PART</th></tr>";
    while ($row=mysqli_fetch_array($xxcall)){
            echo "<tr><td>{$row[0]}</td>";
            echo "<td >{$row[1]}</td>";
            echo "<td>{$row[2]}</td>";
            echo "<td>{$row[3]}</td>";
            echo "<td>{$row[4]}</td></tr>";
    }

    ?>  
    <input type="button" id="btnprint" value="print  &#128438;" class="btn btn-dark" onclick="print_page()" />
</body>
</html>

</body>
</html>