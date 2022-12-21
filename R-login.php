<!DOCTYPE html >
<html style="height: 100%;" >
    
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="bootstrap.min1.css" >  
    <link rel="stylesheet" href="R-login.css" >  
    <link rel="stylesheet" href="text.css" >     
</head>

<?php //پەرەی لۆگینی قوتابی 
session_start();
include 'R-login-config.php';
$error_n = ['result'=>''];
$error_p = ['result'=>''];

if (isset ($_POST["sub"]))
{
    $name=htmlspecialchars($_POST["name"]);
    $pass=htmlspecialchars($_POST["pass"]);
     if (empty($name)||empty($pass)) 
     {
        $forget['result']= "تکایە خانەکان پر بکەوە";
     }else{
        $error_name=mysqli_query($db,"SELECT* FROM `login` WHERE `code`='$name'");
        $error_pass=mysqli_query($db,"SELECT* FROM `login` WHERE `passcode`='$pass'"); 
        $query=mysqli_query($db, "SELECT * FROM `login` WHERE `code`='$name' AND `passcode`='$pass'");
        $se =mysqli_fetch_array($query);
        if(mysqli_num_rows($error_name)==0)
            {
                $error_n['result']= "کۆدی بەکارهێنەر هەڵەیە";
            }
            if(mysqli_num_rows($error_pass)==0)
            {
                $error_p['result']=".وشەی تێپەر هەڵەهەیە";

            }else{
            
        if (mysqli_num_rows($query)== 1 ){
            $_SESSION["code"]=$se['code'];
            header("location:R-form.php");
        }
    }
    }
}

?>






<body style="background-image: url(upload/stu2.png);">

    <div class="row"> 
    <form class="container box" action="" method="POST"  >
        <h1>login</h1><br><br>
    <input class="col-md-10 " type="text" name="name"  placeholder="کۆدی بەکارهێنەر" required  >
    <?php if(isset($_POST["sub"])){ ?>
        <label class="alert alert-white text-danger text-center p-0"> 
            <?php echo $error_n['result']; ?>
    </label> <?php } ?>
    <input class="col-md-10 "  type="password" name="pass"  placeholder="وشەی تێپەر" required >
    <?php if(isset($_POST["sub"])){ ?>
        <p class="alert alert-white text-danger text-center p-0 "> 
            <?php echo $error_p['result']; ?>
        </p> <?php } ?>
        <div class="btn" >
    <input  type="submit" name="sub" value="Login" >
    </div>

    <div class="container">

  <details>
    <summary>
      <div class="button" style="color:red;">
        forget
      </div>
      <div class="details-modal-overlay"></div>
    </summary>
    <div class="details-modal !important">
      <div class="details-modal-content">
        <p>
قوتابی بەرێز ئەگەر کۆدی بەکانهێنەر یان وشەی تێپەرت لەبیرکردوە تکایە سەردانی قوتابخانەکەت بکەوە
        </p>
      </div>
    </div>
  </details>
</div>
    </form>
    </div>
    
</body> 
</html> 