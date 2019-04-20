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
$login=strip_tags(trim($_REQUEST["login"]));
$password=strip_tags(trim($_REQUEST["password"]));
$email=strip_tags(trim($_REQUEST["email"]));
include_once ('function.php');
$file="users.txt";
 if (!isset($_POST["submit"])){
     ?>
     <form action="" method="post">
         <input type="text" name="login" placeholder="Введите login">
         <input type="password" name="password" placeholder="Введите пароль">
         <input type="email" name="email" placeholder="Введите email">
         <input type="submit" name="submit">
     </form>
     <?php
 } elseif (($login=="") or ($password=="") or ($email=="")) {
         echo "Внимание!Все поля должны быть заполнены!";
}
     elseif ((strlen($login)<3) or (strlen($login)>30)) {
         echo "Длина логина должна быть не менее 3 и не более 30 символов.";
}    elseif (getSravnenie($_POST["login"],$file)) {
         echo "Такой логин уже сущуствует";
 }
     else {
       $handle=fopen("users.txt","a+");
       fwrite($handle, $login.":".$password.":".$email.PHP_EOL);
        fclose($handle);
       echo 'Регистрация прошла успешно!';
}
?>

</body>
</html>