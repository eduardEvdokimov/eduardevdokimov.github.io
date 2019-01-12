<?php
    require_once 'connection_db.php';

    function registerUser($arrData)
    {
        list($name, $pass, $email, $photo) = $arrData;
        $conn = con();
        $sql = $conn->prepare("SELECT * FROM users WHERE login=?");
        $sql->execute([$name]);
        $rez = $sql->fetch();
        if(!empty($rez['login']))
            return ['login' => 'Пользователь с данным логином уже существует'];

        $sql = $conn->prepare("SELECT * FROM users WHERE email=?");
        $sql->execute([$email]);
        $rez = $sql->fetch();
        if(!empty($rez['email']))
            return ['email' => 'Пользователь с данным электронным адрессом уже существует'];


        $sql = $conn->prepare('INSERT INTO users (login, pass, email, confirm_id) VALUES (:login, :pass, :email, :confirm_id)');
        $confirm_id = uniqid();
        if($sql->execute(['login' => $name, 'pass' => $pass, 'email' => $email, 'confirm_id' => $confirm_id])) {
            $rez = $conn->query("SELECT id FROM users WHERE login = '$name' AND email = '$email'");
            $user = $rez->fetch();
            $sql = $conn->prepare('INSERT INTO photo_users (photo_user, vnesh_id) VALUES (?, ?)');
            if($sql->execute([$photo, $user['id']])){
                mail($email, "Подтверждение аккаунта", 'http://localhost/obuch/myBigProject/view/reg_successful.php?conf=' . $confirm_id);
                return true;
            } else
                return 'Проверте правильность введенных данных';
        } else
            return 'Проверте правильность введенных данных';
    }


    //Функция для для подтверждения регистрации пользователя
    function changeConfirmUser($conf_id)
    {
        $conn = con();
        $sql = $conn->prepare("UPDATE users SET confirm_id='1' WHERE confirm_id=?");
        if($sql->execute([$conf_id])) {
            return true;
        }else return false;

    }