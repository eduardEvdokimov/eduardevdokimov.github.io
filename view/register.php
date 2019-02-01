<?php require_once '../controlers/controler_registr.php'; ?>

<!DOCTYPE html>
<html>
<head>
    <title></title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../style/reg_user.css.">
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">

</head>
    <p id='msg_error'></p>
    <form action="<?= $_SERVER['SCRIPT_NAME']; ?>" method="post" enctype="multipart/form-data">
        
        <div id="head">
            <h1>Регистрация</h1>
        </div>
        <div id="vhod">
            <div id="pola">
                <h2>Создайте новый аккаунт</h2>
                <?= "<p class='empty_name_pass'>{$rezult['login']}</p>"; ?>
                <input type="text" name="login" placeholder="Введите имя или логин" class="input" value=<?= isset($_POST['login']) ? $_POST['login'] : ''; ?> >

                <?= "<p class='empty_name_pass'>{$rezult['pass']}</p>"; ?>
                <input type="password" name="pass" placeholder="Введите пароль" class="input">


                <?= "<p class='empty_name_pass'>{$rezult['email']}</p>"; ?>
                <input type="text" name="email" placeholder="Введите электронную почту" class="input" value="<?= isset($_POST['email']) ? $_POST['email'] : ''; ?>">


                <?= "<p class='empty_name_pass'>{$rezult['photo']}</p>" ?>
                <p class='add_photo'>Добавить фото (не обязательно)</p>
                <input type="file" name="photo" class='add_photo'>
                
                <?php $photo = $_FILES['photo']; ?>



                
                <input type="submit" name="sub" id="sub" value="Зарегистрироваться">
            </div>
        </div>
        <div id="foot">
            <button type="reset">Отменить</button>
            
        </div>


<!-- 
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
        <input type="submit" name="sub" value="Регистрация"> -->
    </form>
</html>
