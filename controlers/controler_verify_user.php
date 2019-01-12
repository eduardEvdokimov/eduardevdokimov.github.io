<?php

    function proverkaEmpty($login_email, $pass)
    {
        if (empty($login_email))
        {
            $errors['login'] =  'Введите логин или эмаил';
            return $errors;
        }
        if (empty($pass))
        {
            $errors['pass'] = 'Введите пароль';
            return $errors;
        }
        return [$login_email, $pass];
    }

    if (isset($_REQUEST['sub']))
    {
        require_once '../model/user_login.php';
        $data_user = proverkaEmpty($_REQUEST['login/email'], $_REQUEST['pass']);
        if(count($data_user) == 2){
            $rez_vhod = userLogin($data_user);
            if($rez_vhod)
                header('Location: ../index.php');
            else
                $data_user['not_vhod'] = 'Не удалось войти. Проверте правильность введенных данных';
        }
    }