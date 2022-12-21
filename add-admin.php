

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

<?php  // پەری زیاد کردنی ئادمین
session_start();
$email=$_SESSION["email"];
include 'R-login-config.php';
$forget['result']= "";
$xxcall=mysqli_query($db,"SELECT * FROM `parts`");
$op = "";
while($row=mysqli_fetch_array($xxcall)){
$op = $op."<option value='$row[1]'>$row[1]</option>";
}

if (isset ($_POST["enter"]))
{
    $pass1=htmlspecialchars($_POST["pass1"]);
    $pass2=htmlspecialchars($_POST["pass2"]);
    $email=htmlspecialchars($_POST["email"]);
    $date=htmlspecialchars($_POST["date"]);
    $pt=htmlspecialchars($_POST["pt"]);
     if (empty($pass1)||empty($pass2)||empty($email)||empty($date)) 
     {
        $forget['result']= "تکایە خانەکان پر بکەوە";
     }else if($pass1!=$pass2)
     {
        $forget['result']= "پاسۆردەکان وەک یاک نین !! تکایە دوبارە بکەوە";

    }else{
        $query=mysqli_query($db,"INSERT INTO admin(`email`,`password`,`bod`,`part`) VALUES ('$email','$pass1','$date','$pt')");
        if ($query){
            $forget['result']= "کردارەکە سەرکەوتوبوو";
        }
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
						ADD AMDIN
					</span>


					<div class="text-center p-t-20 p-b-15">
						<span class="txt1">
							insert admin information
						</span>
					</div>
					<br><br>
					<div class="wrap-input100 validate-input m-b-16" >
						<input class="input100" type="email" name="email" placeholder="email@">
						<span class="focus-input100"></span>
					</div>

					<div class="wrap-input100 validate-input m-b-20" >
						<span class="btn-show-pass">
							<i class="fa fa fa-eye"></i>
						</span>
						<input class="input100" type="password" name="pass1" placeholder="password" >
						<span class="focus-input100"></span>
					</div>
                    <div class="wrap-input100 validate-input m-b-20" >
						<span class="btn-show-pass">
							<i class="fa fa fa-eye"></i>
						</span>
						<input class="input100" type="password" name="pass2" placeholder="Retype password" >
						<span class="focus-input100"></span>
					</div>

                    <div class="wrap-input100 validate-input m-b-20" >
						<span class="btn-show-pass">
							<i class="fa fa fa-eye"></i>
						</span>
						<input class="input100" type="date" name="date"  >
						<span class="focus-input100"></span>
					</div>
                    <br>
                    <select class="form-select" name="pt">
                            <?php echo $op ; ?>
                        </select><br><br>
                        
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