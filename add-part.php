<!DOCTYPE html>
<html lang="en">
<head>
	<title>forget</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
	<link rel="stylesheet" href="bootstrap.min1.css" >  

</head>

<?php //پەری زیادکردنی بەش کە لە ناو پەیجی ئەدمینی گشتی هەیە
session_start();
$email=$_SESSION["email"];
include 'R-login-config.php';
$forget['result']= "";
if (isset ($_POST["enter"]))
{
    $pt=htmlspecialchars($_POST["part"]);
     if (empty($pt)) 
     {
        $forget['result']= "تکایە خانەکان پر بکەوە";

    }else{
        $query=mysqli_query($db,"INSERT INTO parts(`part`) VALUES ('$pt')");
        $forget['result']= "کردارەکە بە سەرکەوتووی جێبەجێ کرا";
    }
    
}

?>





<body>
<?php 
  include 'nav.php';
  ?>
	<form  action="" method="POST" >
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100 p-t-0 p-b-15">
				<form class="login100-form validate-form">
					<span class="login100-form-title p-b-25 text-danger display-5">
						زیادکرنی بەش
					</span>

                    <br><br><br>
					<div class="text-center p-t-20 p-b-15">
						<span class="txt1">
							لە خوارەوە ناوی بەشەکە بنوسە
						</span>
					</div>
					<br>
					<div class="wrap-input100 validate-input m-b-16" >
						<input class="input100" type="text" name="part" placeholder="enter part">
						<span class="focus-input100"></span>
					</div>

					<div class="wrap-input100 validate-input m-b-20" >
						<span class="btn-show-pass">
						</span>
                        <br><br>
					<div class="container-login100-form-btn">
						<button class="login100-form-btn" name="enter">
							enter
						</button>
					</div>
					<?php if (isset ($_POST["enter"]))
                        {  ?> 
                           <br><h5 class="text-center text-danger"> <?php echo $forget['result']; ?> </h5> <?php
                        } ?>
					
				</form>
			</div>
		</div>
	</div>
</form>
</body>
</html>