<?php require_once('../controlers/controler_succes_reg.php'); ?>
<!DOCTYPE html>
<html>
<head>
    <title></title>
    <meta charset="UTF-8">
</head>
<body>
    <?php if($result): ?>
    <b>Регистрация прошла успешно</b>
    <a href="vhod.php">Войти</a>
    <?php else: ?>
    <b>Не удалось подтвердить Ваш аккаунт. Попробуйте заново зарегистрироваться.</b>
    <a href="http://localhost/obuch/myBigProject/view/register.php">Форма регистрации</a>
    <?php endif; ?>
</body>
</html>