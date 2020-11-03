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

    <div>
        <p>Здравствуйте. Для восстановления пароля перейдите, пожалуйста, по ссылке <a href="<?=PATH?>/user/new-user-psw?getPass=<?=$_SESSION['hash']?>">Восстановить пароль</a>
        </p>
        <p>Ссылка действительна в течении 1 часа</p>
    </div>

</body>
</html>