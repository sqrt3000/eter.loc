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
<p>Здравствуйте, <?=$_POST['name'] ?>!</p>
<p>Вы успешно зарегистрировались в интернет-магазине <a href="<?=PATH ?>"><?=PATH ?></a></p>
<p>Сохраните это письмо на случай, если забудите логин или пароль</p>
<p>Ваш логин: <?=$_POST['login'] ?></p>
<p>Ваш пароль: <?=$_POST['password'] ?></p>
<p>С ув. Администрация</p>
</body>
</html>