<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<?php
//mkdir("dir",0777);?>
<!--<ul>-->
<!--    <li><a href="class.php">Task 18,19</a></li>-->
<!--</ul>-->
<?php
//for ($i=1;$i<=4;$i++) {
//    fopen("dir/$i.txt","a+");
//};
//fopen("dir/one.html","a+");
//$arr=scandir("dir");
//$arr=array_slice($arr,2);
//$arrIn=[];
//$counterTxt=0;
//$counterHtml=0;
//foreach ($arr as $elem) {
//    array_push($arrIn,explode(".",$elem));
//};
//foreach ($arrIn as $elem) {
//    if ($elem[1]==="txt") {
//        $counterTxt++;
//    } elseif ($elem[1]==="html") {
//        $counterHtml++;
//    };
//
//};
//echo $counterHtml." файлов html<br>";
//echo $counterTxt." файлов txt<br>";
////echo "<pre>";
////var_dump($arrIn);
////echo "</pre>";
//
//
//
//?>
<!--//_________task20__________-->
<?php
$name=$_REQUEST["name"];
$email=$_REQUEST["email"];
$login=$_REQUEST["login"];
$tel=$_REQUEST["tel"];
$text=$_REQUEST["text"];
$avatar=$_FILES["avatar"];
if(!isset($_REQUEST["sub"])) { ?>

<form action="" method="post" enctype="multipart/form-data">
    <input type="text" name="name" placeholder="введите ваше имя"><br><br>
    <input type="email" name="email" placeholder="введите ваш e_mail"><br><br>
    <input type="text" name="login" placeholder="введите ваш логин"><br><br>
    <input type="text" name="tel" placeholder="введите номер телефона"><br><br>
    <input type="file" name="avatar"><br><br>
    <textarea name="text" id="" cols="30" rows="10" placeholder="немного о себе"></textarea><br><br>
    <input type="submit" name="sub" value="register" >
</form>
  <?php }
    elseif ($name=="" or $email=="" or $login=="" or $tel=="" or $text=="") {
      echo "Все поля должны быть заполнены";
}   else {
      $handle=fopen("user.txt","a+");
      fwrite($handle, $name.":".$email.":".$login.":".$tel.":".$avatar["name"].":".$text.PHP_EOL);
      fclose($handle);
      if ($avatar["error"] !== 0) {
            echo "error code:".$avatar["error"];
        }
      elseif (is_uploaded_file($avatar["tmp_name"])) {
            move_uploaded_file($avatar["tmp_name"], "./images/" .$avatar["name"]);
            include "exitForms.php";
        }
    }
?>

</body>
</html>