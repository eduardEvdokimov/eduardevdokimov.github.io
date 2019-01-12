<?php
    function userLogin($data_user)
    {
        require_once 'connection_db.php';
        $conn = con();
        list($login_email, $pass) = $data_user;
        $sql = $conn->prepare("SELECT * FROM users WHERE login=? OR email=?");
        $sql->execute([$login_email, $login_email]);
        $rez = $sql->fetch(PDO::FETCH_ASSOC);
        if (!empty($rez['login'])) {
            if($rez['confirm_id'] != 1){
                return false;
            }else{
                if (password_verify($pass, $rez['pass'])) {
                    setcookie('email', $rez['email'], time() + 60 * 60 * 24, '/');
                    setcookie('login', $rez['login'], time() + 60 * 60 * 24, '/');
                    setcookie('pass', $pass, time() + 60 * 60 * 24, '/');
                    session_start();
                    $_SESSION['user_id'] = $rez['id'];
                    $_SESSION['vhod_check'] = true;
                    return true;
                }else return false;
            }
        }else return false;
    }