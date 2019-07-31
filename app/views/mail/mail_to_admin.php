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
<p>Зарегистрирован новый пользователь "<?=$_POST['name'] ?>"!</p>
<p>Логин нового пользователя: <?=$_POST['login'] ?></p>
<p>Email нового пользователя: <?=$_POST['email'] ?></p>
<p>Номер телефона: <?=$_POST['phone'] ?></p>
<p>Адрес нового пользователя: <?=$_POST['address'] ?></p>
</body>
</html>