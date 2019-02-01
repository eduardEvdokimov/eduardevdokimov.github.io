<?php require_once '../controlers/controler_verify_user.php'; ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link href='../style/user_verify.css' rel='stylesheet'>
</head>
<body>
    <form action="<?= $_SERVER['SCRIPT_NAME'] ?>" method="post">
        <div id="head">
            <h1>Войдите в систему</h1>
        </div>
        <div id="vhod">
            <div id="pola">
                <h2>Войдите в свой аккаунт</h2>
                <?= "<p class='empty_name_pass'>{$data_user['login']}</p>"; ?>
                <input type="text" name="login/email" placeholder="Введите логин или электронную почту" class="input" value=<?= "$_COOKIE[login]"; ?>><br>

                <?= "<p class='empty_name_pass'>{$data_user['pass']}</p>"; ?>
                <input type="password" name="pass" placeholder="Пароль*" class="input" value="<?= $_COOKIE['pass'] ?>"><br>

                <?= "<p id='error_verify'>{$data_user['not_vhod']}</p>" ?>
                <input type="submit" name="sub" id="sub" value="Вход">
            </div>
        </div>
        <div id="foot">
            <button type="reset">Отменить</button>
            
        </div>


        
    </form>
    
</body>
</html>