

<!DOCTYPE html >
<html>
    
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="bootstrap.min1.css" >  
    <link rel="stylesheet" href="text.css" >        
</head>
<?php 
  include 'nav.php';
  ?>
<body style="background-color:snow;">
<form action="" method="POST" class="container" >
<div class="form-group m-3">
<label class="text-center m-2" >comment for student : </label>
<textarea class="form-control" name="comment"  rows="8"></textarea>
</div>
<button style="width: 1080px; margin-left: 15px;" type="submit" class="btn btn-primary btn-lg btn-block "name="sub" >....ناردن</button>
</form>
</body>
</html>

<?php // پەرەی نوسینی کۆممێنت
include 'R-login-config.php';
if(isset($_POST['sub'])){
    $post_id=($_GET['postid']);
    $comment=($_POST['comment']);

    $query=mysqli_query($db,"UPDATE `form` SET`comment`='$comment' WHERE `ID`='$post_id'");
    
    header("location:R-dashboard.php");
}
?>