
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Login admin</title>
	<meta charset="UTF-8">
	
	<link rel="stylesheet" href="bootstrap.min1.css" >  
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">

</head>
<?php // پەرەی لۆگینی ئەدمینەکان
session_start();
include 'R-login-config.php';

$error_n = ['result'=>''];
$error_p = ['result'=>''];

if (isset ($_POST["sub"]))
{
    $name=htmlspecialchars($_POST["username"]);
    $pass=htmlspecialchars($_POST["pass"]);
     if (empty($name)||empty($pass)) 
     {
        $forget['result']= "تکایە خانەکان پر بکەوە";
     }else{
        $error_name=mysqli_query($db,"SELECT* FROM `admin` WHERE `email`='$name'");
        $error_pass=mysqli_query($db,"SELECT* FROM `admin` WHERE `password`='$pass'"); 
        $query=mysqli_query($db, "SELECT * FROM `admin` WHERE `email`='$name' AND `password`='$pass'");
        $se =mysqli_fetch_array($query);

        if(mysqli_num_rows($error_name)==0)
            {
                $error_n['result']= "! ئیمەیل هەڵەیە";
            }
            if(mysqli_num_rows($error_pass)==0)
            {
                $error_p['result']="! پاسۆردەکەت هەڵەیە";

            }else{
            
        if (mysqli_num_rows($query)== 1 ){
            $_SESSION["part"]=$se['part'];
			$_SESSION["email"]=$se['email'];
            header("location:R-dashboard.php");
        }
    }
    }
}

?>
<body style="background-color:snow;"> 
	<form action="" method="POST" >
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100 p-t-20 p-b-20">
				<form class="login100-form validate-form">
					<span class="login100-form-title p-b-70 display-5">
						Welcome
					</span>
					<span class="p-l-130">
						<img src="image/epu.png" alt="AVATAR">
					</span>

					<div class="wrap-input100 validate-input m-t-85 m-b-35" data-validate = "Enter username">
						<input class="input100" type="text" name="username" required>
						<span class="focus-input100" data-placeholder="Username"></span>
					</div>

					<div class="wrap-input100 validate-input m-b-50" data-validate="Enter password">
						<input class="input100" type="password" name="pass" required>
						<span class="focus-input100" data-placeholder="Password"></span>
					</div>

					<div class="container-login100-form-btn">
						<button class="login100-form-btn" name="sub">
							Login
						</button>
					</div>
					<?php if(isset($_POST["sub"])){ ?>
						<br>
						<p class="alert alert-white text-danger text-center p-0 display-6"> 
							<?php echo $error_n['result']; ?>
					</p><br>
					<p class="alert alert-white text-danger text-center p-0 display-6"> 
							<?php echo $error_p['result']; ?>
						</p> <?php } ?>

					<ul class="login-more p-t-30">
						<li class="m-b-8">
							<span class="txt1">
								Forgot
							</span>

							<a href="forget.php" class="txt2">
								Password?
							</a>
						</li>

					</ul>
				</form>
			</div>
		</div>
	</div>
	

	<div id="dropDownSelect1"></div>


</body>
</html>