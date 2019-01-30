<?php require_once '../controlers/controler_verify_user.php'; ?>
<!DOCTYPE html>
<html>
<head>
</head>
<body>
    <form action="<?= $_SERVER['SCRIPT_NAME'] ?>" method="post">
        <label>
            <input type="text" name="login/email" placeholder="Введите логин или электронную почту" value="<?= $_COOKIE['login'] ?>">
            <?= "<i>$data_user[login]</i>"; ?>
        </label><br>
        <label>
            <input type="password" name="pass" placeholder="Пароль" value="<?= $_COOKIE['pass'] ?>">
            <?= "<i>$data_user[pass]</i>"; ?>
        </label><br>
        <input type="submit" name="sub">
    </form>
    <?= "<b>$data_user[not_vhod]</b>" ?>
</body>
</html>