
<?php // پەرەی فۆرمی قوتابی شوێنی داخل کردنی زانیاریەکان
include 'R-login-config.php';
session_start();
$xcode = $_SESSION["code"];
$date=date("d/m/y h:i:s A") ;
$call=mysqli_query($db,"SELECT * FROM `login` WHERE `code`='$xcode' ");
$row=mysqli_fetch_assoc($call);
$pscode = $row['passcode'];
$parallel = $row['parallel'];
$type=$row['type'];

$xcall=mysqli_query($db,"SELECT * FROM `form` WHERE `code`='$xcode' ");
$xrow=mysqli_fetch_assoc($xcall);
if (!empty($xrow['blood'])){
  header("location:R-finish.php");
}

if(isset($_POST['sub'])){
  //student information 
  
  $name=htmlspecialchars($_POST['names']);
  $part=htmlspecialchars($_POST['parts']);
  $code=htmlspecialchars($_POST['codes']);
  $email=htmlspecialchars($_POST['emails']);
  $tell=htmlspecialchars($_POST['tels']);
  $idcode=htmlspecialchars($_POST['codeid']);
  $place=htmlspecialchars($_POST['place']);
  $blood=htmlspecialchars($_POST['blood']);
  $pic_stu=$_FILES['urpic'];
  $pic_info_card=$_FILES['cardinfo'];
  $pic_food_card=$_FILES['foodcard'];
  $pic_cetri=$_FILES['cetrificate'];




  // student pics 
  class file{
    public $ed ;
    public function __construct($file)
    {
        $name=$file['name'];
        $type=$file['type'];
        $tmpname=$file['tmp_name'];
        $error=$file['error'];
        $size=$file['size'];

        $file_ext=explode('.',$name);
        $file_small= strtolower(end($file_ext));
        $file_allow=array('png','jpg','jpeg','svg','gif');

        if(in_array($file_small,$file_allow)){
            if($error===0){
                if($size<100000000){
                    $file_new_name=rand().".".$file_small;
                    $file_destinition="upload/$file_new_name";
                    move_uploaded_file($tmpname,$file_destinition);
                    $this->ed = $file_new_name ;

                }else{
                    $error['result']="قەبارەی وێنەکە زۆرە " ;
                }
            }else{
                $error['result']=" سەرکاوتوو نەبوو تکایە دوبارە هاوڵدەوە ";
            }
        }else{
            $error['result']=" جۆری فایلەکە گونجاو نیە تکایە تەنها وێنە دابنێ ";
        } 
    }
    function get_ed() {
      return $this->ed;
    }

}
if (empty($name)||empty($part)||empty($code)||empty($email)||empty($tell)||empty($idcode)||empty($place)||empty($blood)
  ||empty($pic_stu)||empty($pic_info_card)||empty($pic_food_card)||empty($pic_cetri)) 
     {
        echo "تکایە خانەکان پر بکەوە";
     }else
      { 
        $pic_sts= new file($pic_stu);
        $pic_infos= new file($pic_info_card);
        $pic_foods= new file($pic_food_card );
        $pic_centris= new file($pic_cetri);
        $pic_st= $pic_sts->get_ed();
        $pic_info= $pic_infos->get_ed();
        $pic_food= $pic_foods->get_ed();
        $pic_centri= $pic_centris->get_ed();
      $ad_qry="INSERT INTO 
form(`name`,`part`,`code`,`email`,`tell`,`idcode`,`place`,`blood`,`pic_stu`,`pic_ifo_card`,`pic_food_card`,`pic_centri`,`pscode`,`katt`,`parallel`,`type`) 
VALUES('$name','$part','$code','$email','$tell','$idcode','$place','$blood','$pic_st','$pic_info','$pic_food','$pic_centri','$pscode','$date','$parallel','$type')";
      $run=mysqli_query($db,$ad_qry);
      if($run){
        $send = "yes";
        $query=mysqli_query($db,"UPDATE `login` SET`send`='$send' WHERE `code`='$xcode'");
        header("location:R-finish.php");
      }
     }     
}
?>



<!DOCTYPE html >
<html style="height: 100%;">
    
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="bootstrap.min1.css" >     
    <link rel="stylesheet" href="text.css" >     
</head>


<body style="background-image:linear-gradient(#FFFFFF, rgb(255, 122, 89));">
<h1 style="text-align:center; margin:80px; border:2px solid orange; box-shadow:0px 0px 10px 0 tomato; border-radius:11px ;
border-align:center; margin-left:16%; padding:15px;" class="container box center">تکایە زانیاریەکانت لە خوارەوە دابنێ</h1>
<form action="" method="POST" class="container" enctype="multipart/form-data">
  <div class="form-row align-items-center">
<div class="input-group mt-5 ">

      <div class="col-md-3 ">
      <input type="text" name="codes" class="form-control text-center " value="<?php echo $row['code']; ?>" readonly >
      </div>
      <div class="input-group-append">
        <span class="input-group-text " id="basic-addon2">: کۆدی بەکارهێنەر</span>
      </div>

      <p>_</p>

      <div class="col-md-3">
      <input type="text" name="parts" class="form-control text-center" value="<?php echo $row['part']; ?>" readonly >
      </div>
      <div class="input-group-append">
        <span class="input-group-text" id="basic-addon2">: بەشی وەرگیراو</span>
      </div>

      <p>_</p>

      <div class="col-md-3">
      <input type="text" name="names" class="form-control text-center" value="<?php echo $row['name']; ?>" readonly >
      </div>
      <div class="input-group-append">
        <span class="input-group-text" id="basic-addon2">:ناو</span>
      </div>

      <div class="input-group mt-3">
  <input type="text" name="emails" class="form-control text-center" placeholder="@example.com" required >
  <div class="input-group-append">
    <span class="input-group-text" id="basic-addon2">: ئیمەیلی خۆت </span>
  </div>
  </div>

  <div class="input-group mt-3">
  <input type="text" name="tels" class="form-control text-center" placeholder="07** *** ** **" required >
  <div class="input-group-append">
    <span class="input-group-text" id="basic-addon2">: ژمارە مۆبایل </span>
  </div>
  </div>

  <div class="input-group mt-3">
  <input type="text" name="codeid" class="form-control text-center" placeholder="**** *** *** ***" required >
  <div class="input-group-append">
    <span class="input-group-text" id="basic-addon2">: کۆدی ناسنامە </span>
  </div>
  </div>

  <div class="input-group mt-3">
  <input type="text" name="place" class="form-control text-center" placeholder="پارێزگا / دەڤەر " required >
  <div class="input-group-append">
    <span class="input-group-text" id="basic-addon2">: شوێن نیشتەجێبون  </span>
  </div>
  </div>

  </div>
  <div class="input-group mt-3">
  <input type="file" name="urpic" class="form-control text-center" required >
  <div class="input-group-append">
    <span class="input-group-text" id="basic-addon2">: وێنەی خۆت </span>
  </div>

  </div>
  <div class="input-group mt-3">
  <input type="file" name="cardinfo" class="form-control text-center" required >
  <div class="input-group-append">
    <span class="input-group-text" id="basic-addon2">: وێنەی کارتی زانیاری </span>
  </div>

  </div>
  <div class="input-group mt-3">
  <input type="file" name="foodcard" class="form-control text-center" required >
  <div class="input-group-append">
    <span class="input-group-text">: وێنەی کارتی خۆراک </span>
  </div>
  </div>

  <div class="input-group mt-3 mb-3">
  <input type="file" name="cetrificate" class="form-control text-center" required >
  <div class="input-group-append">
    <span class="input-group-text" id="basic-addon2">: وێنەی بروانامەی شەشەمی ئامادەیی </span>
  </div>



</div>
</div>
<div class="form-check form-check-inline">
<div class="col-md-30 p-6">
      <button type="submit" name="sub" class="btn btn-primary "> تکایە پێش ناردن پێداچونەوە بکە ئەگەر دڵنیای لە زانیاریەکان کە دروستن ئەتوانی بنێری </button>
    </div>
</div>
<div class="form-check form-check-inline p-6">
  <input class="form-check-input" type="radio" name="blood"  value="A+">
  <label class="form-check-label" for="inlineRadio1">A+</label>
</div>
<div class="form-check form-check-inline">
  <input class="form-check-input" type="radio" name="blood"  value="B+">
  <label class="form-check-label" for="inlineRadio2">B+</label>
</div>
<div class="form-check form-check-inline">
  <input class="form-check-input" type="radio" name="blood"  value="AB+">
  <label class="form-check-label" for="inlineRadio2">AB+</label>
</div>
<div class="form-check form-check-inline">
  <input class="form-check-input" type="radio" name="blood"  value="O+">
  <label class="form-check-label" for="inlineRadio2">O+</label>
</div>
<div class="form-check form-check-inline">
  <input class="form-check-input" type="radio" name="blood"  value="A-">
  <label class="form-check-label" for="inlineRadio2">A-</label>
</div>
<div class="form-check form-check-inline">
  <input class="form-check-input" type="radio" name="blood"  value="B-">
  <label class="form-check-label" for="inlineRadio2">B-</label>
</div>
<div class="form-check form-check-inline">
  <input class="form-check-input" type="radio" name="blood"  value="AB-">
  <label class="form-check-label" for="inlineRadio2">AB-</label>
</div><div class="form-check form-check-inline">
  <input class="form-check-input" type="radio" name="blood"  value="O-">
  <label class="form-check-label" for="inlineRadio2">O-</label>
  </div>
  <div class="form-check form-check-inline">
  <div class="input-group-append">
    <span class="input-group-text" id="basic-addon2">: جۆری خوێنت</span>
  </div></div>
</div> </div>
</form>

</body> 
</html> 