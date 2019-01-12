<?php require_once '../controlers/controler_registr.php'; ?>
<!DOCTYPE html>
<html>
<head>
    <title></title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="/obuch/myBigProject/style/style_first_site.css.">
</head>
    <form action="<?= $_SERVER['SCRIPT_NAME'] ?>" method="post" enctype="multipart/form-data">
        <?= isset($email_past) ? "<i>$email_past</i>" . "<a href='vhod.php'>Войти</a>" : "<i>$login_past</i>"; ?>
        <label>
            <input type="text" name="login" placeholder="Имя пользователя"
            value="<?= isset($_POST['login']) ? $_POST['login'] : ''; ?>">
            <?= "<i>$arr_data[name]</i>"; ?>
        </label><br>
        <label>
            <input type="password" name="pass" placeholder="Пароль">
            <?= "<i>$arr_data[pass]</i>"; ?>
        </label><br>
        <label>
            <input type="text" name="email" placeholder="Электронный адрес"
                   value="<?= isset($_POST['email']) ? $_POST['email'] : ''; ?>">
            <?= "<i>$arr_data[email]</i>";  ?>
        </label><br>
        <label>
            <p>Добавить фото (не обязательно)</p>
            <input type="file" name="photo">
            <?= "<i>$arr_data[photo]</i>" ?>
            <?php $photo = $_FILES['photo']; ?>

        </label><br>
        <input type="submit" name="sub" value="Регистрация">
    </form>
</html>
