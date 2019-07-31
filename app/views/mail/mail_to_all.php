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
<p>В интернет-магазине  <a href="<?=PATH ?>"><?=PATH ?></a> появился новый товар!</p>
<p>Пройдите по ссылке, чтобы увидеть новый товар: <a href="<?=PATH ?>/product/<?=$_SESSION['alias']?>"><?=$_POST['content']?> <?=$_POST['brand']?></a></p>
</body>
</html>