
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
<?php
if (!isset($_REQUEST["submit"])) {
    echo "Для вывода информации введите login пользователя."
    ?>

<form action="exitForms.php" method="post">
    <input type="text" name="person" placeholder="Введите логин">
    <input type="submit" name="submit">
</form>
  <?php }
       else {
           $arrUsersStr = file("user.txt");
           $person = $_REQUEST["person"];
           foreach ($arrUsersStr as $elem) :
               $login = explode(":", $elem)[2];
               $image = explode(":", $elem)[4];
               $name = explode(":", $elem)[0];
               $telNumber = explode(":", $elem)[3];
               $email = explode(":", $elem)[1];
               $text = explode(":", $elem)[5];

               if ($person == $login) {?>
                   <div class="card" style="width: 18rem;">
                       <img src="images/<?= $image ?>" class="card-img-top" alt="Фото не загружено пользователем">
                       <div class="card-body">
                           <h5 class="card-title"><?= $login ?></h5>
                       </div>
                       <ul class="list-group list-group-flush">
                           <li class="list-group-item">Имя: <?= $name ?> </li>
                           <li class="list-group-item">E_mail: <?= $email ?> </li>
                           <li class="list-group-item">Телефон: <?= $telNumber ?></li>
                       </ul>
                       <p class="card-text">Немного о себе <?= $text ?></p>
                   </div>

                   <?php
               }
           endforeach;

       }
       ?>
</body>
</html>
