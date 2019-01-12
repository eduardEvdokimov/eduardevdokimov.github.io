<?php
    function getDataUser($name, $pass, $email, $photo = null)
    {
        if(mb_strlen($name) < 3 || mb_strlen($name) > 15)
        {
            $errors['name'] = 'Длина имени должна быть от 3 до 15 символов';
            return $errors;
        }

        if(mb_strlen($pass) < 3)
        {
            $errors['pass'] = 'Слишком короткий пароль';
            return $errors;
        }

        if(($email = filter_var($email, FILTER_VALIDATE_EMAIL)) == false)
        {
            $errors['email'] = 'Введите правильно адрес электронной почты';
            return $errors;
        }

        if($photo !== null) {
            if ($photo['error'] == 0) {
                $puth_photo = 'image/' . $photo['name'];
                if (!move_uploaded_file($photo['tmp_name'], '../'. $puth_photo)) {
                    $errors['photo'] = 'Не удалось загрузить файл';
                    return $errors;
                }
            } elseif($photo['error'] == 4) {
                $puth_photo = 'image/no-user-image.gif';
            }else{
                $errors['photo'] = 'Файл не удалось загрузить';
                return $errors;
            }
        }else{
            $puth_photo = 'image/no-user-image.gif';
        }

        $name = htmlspecialchars(strip_tags($name));
        $pass = password_hash($pass, PASSWORD_DEFAULT);

        return [$name, $pass, $email, $puth_photo];

    }

    if(isset($_REQUEST['sub']))
    {
        require_once '../model/add_user_db.php';
        $arr_data = getDataUser($_REQUEST['login'], $_REQUEST['pass'], $_REQUEST['email'], $_FILES['photo']);

        if (count($arr_data) == 4) {
            $rez = registerUser($arr_data);
            if (!is_array($rez)) {
                header("Location: http://localhost/obuch/myBigProject/view/confirm_register.php");
            } else {
                if(isset($rez['login']))
                    $login_past = $rez['login'] . '<br>';
                else
                    $email_past = $rez['email'] . '<br>';
            }
        }

    }
