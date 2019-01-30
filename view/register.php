<?php require_once '../controlers/controler_registr.php'; ?>

<!DOCTYPE html>
<html>
<head>
    <title></title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="/obuch/myBigProject/style/style_first_site.css.">
</head>
    <p id='msg_error'></p>
    <form action="<?= $_SERVER['SCRIPT_NAME']; ?>" method="post" enctype="multipart/form-data">
        
        <label>
            <input type="text" name="login" placeholder="Имя пользователя"
            value="<?= isset($_POST['login']) ? $_POST['login'] : ''; ?>">
            <?= "<i>$rezult[login]</i>"; ?>
        </label><br>
        <label>
            <input type="password" name="pass" placeholder="Пароль">
            <?= "<i>$rezult[pass]</i>"; ?>
        </label><br>
        <label>
            <input type="text" name="email" placeholder="Электронный адрес"
                   value="<?= isset($_POST['email']) ? $_POST['email'] : ''; ?>">
            <?= "<i>$rezult[email]</i>";  ?>
        </label><br>
        <label>
            <p>Добавить фото (не обязательно)</p>
            <input type="file" name="photo">
            <?= "<i>$rezult[photo]</i>" ?>
            <?php $photo = $_FILES['photo']; ?>

        </label><br>
        <input type="submit" name="sub" value="Регистрация">
    </form>
</html>
