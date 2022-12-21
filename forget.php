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

<?php //پەرەی فۆرگێت کە پاسسۆرد لەبیر دەکەی
session_start();
include 'R-login-config.php';

$error_n = ['result'=>''];
$error_p = ['result'=>''];

if (isset ($_POST["sub"]))
{
    $name=htmlspecialchars($_POST["email"]);
    $pass=htmlspecialchars($_POST["date"]);
	$tel=htmlspecialchars($_POST["tel"]);
     if (empty($name)||empty($pass)) 
     {
        $forget['result']= "تکایە خانەکان پر بکەوە";
     }else{
        $error_name=mysqli_query($db,"SELECT* FROM `admin` WHERE `email`='$name'");
        $error_pass=mysqli_query($db,"SELECT* FROM `admin` WHERE `bod`='$pass'"); 
		$error_tell=mysqli_query($db,"SELECT* FROM `admin` WHERE `tell`='$tel'"); 
        $query=mysqli_query($db, "SELECT * FROM `admin` WHERE `email`='$name' AND `bod`='$pass' AND `tell`='$tel' ");
        $se =mysqli_fetch_array($query);
        if(mysqli_num_rows($error_name)==0)
            {
                $error_n['result']= "! ئیمەیل هەڵەیە";
            }
			if(mysqli_num_rows($error_tell)==0)
            {
                $error_n['result']= "! ژمارە تیلیفۆن هەڵەیە";
            }
            if(mysqli_num_rows($error_pass)==0)
            {
                $error_p['result']="! بەروار هەڵەیە ";

            }else{
            
        if (mysqli_num_rows($query)== 1 ){
            $_SESSION["part"]=$se['part'];
			$_SESSION["email"]=$se['email'];
            header("location:change-pass.php");
        }
    }
    }
}

?>





<body>
	<form  action="" method="POST" >
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100 p-t-10 p-b-30">
				<form class="login100-form validate-form">
					<span class="login100-form-title p-b-25 text-danger display-5">
						FORGET !!!
					</span>


					<div class="text-center p-t-55 p-b-30">
						<span class="txt1">
							Login with number phone and birth of day
						</span>
					</div>
					<br><br><br><br>
					<div class="wrap-input100 validate-input m-b-16" >
						<input class="input100" type="text" name="email" placeholder="Email">
						<span class="focus-input100"></span>
					</div>
					
					<br>
					<div class="wrap-input100 validate-input m-b-16" >
						<input class="input100" type="tel" name="tel" placeholder="Number Phone">
						<span class="focus-input100"></span>
					</div>
					<br>
					<div class="wrap-input100 validate-input m-b-20" ">
						<span class="btn-show-pass">
							<i class="fa fa fa-eye"></i>
						</span>
						<input class="input100" type="date" name="date" >
						<span class="focus-input100"></span>
					</div>

					<div class="container-login100-form-btn">
						<button class="login100-form-btn" name="sub">
							Login
						</button>
					</div>
					<?php if(isset($_POST["sub"])){ ?>
						<br><br><br>
						<p class="alert alert-white text-danger text-center p-0 display-6"> 
							<?php echo $error_n['result']; ?>
					</p><br>
					<p class="alert alert-white text-danger text-center p-0 display-6"> 
							<?php echo $error_p['result']; ?>
						</p> <?php } ?>
					
					
				</form>
			</div>
		</div>
	</div>
					</form>
</body>
</html>