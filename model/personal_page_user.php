<?php
    function getUserInfo($id)
    {
        require_once 'connection_db.php';
        $conn = con();
        $sql = $conn->prepare('SELECT * FROM users WHERE id=?');

        if($sql->execute([$id])) {
            $user = $sql->fetch(PDO::FETCH_ASSOC);
            list($year, $mouth, $day) = explode('-', $user['date_of_birth']);
            $user['day'] = $day;
            $user['mouth'] = $mouth;
            $user['year'] = $year;
            $sql = $conn->prepare('SELECT photo_user FROM photo_users WHERE vnesh_id = ?');
            if($sql->execute([$id])){
                $photo = $sql->fetch(PDO::FETCH_ASSOC);
                $user['photo'] = $photo['photo_user'];
                return $user;
            }
        }else
            return false;
    }

    function changeInfo(
        $id_user,
        $login, 
        $old_pass, 
        $now_pass, 
        $firstname, 
        $lastname, 
        $othestvo, 
        $dateBirth)
    {
        $conn = con();
        //Обновление логина
        if(!empty($login)){
            $sql = $conn->prepare('UPDATE users SET login = ? WHERE id=?');
            if(!$sql->execute([$login, $id_user]))
                $rezult['error'] = 'Не удалось обновить логин';
        }
        //Обновление пароля
        if(!empty($old_pass)){
            $sql = $conn->prepare('SELECT pass FROM users WHERE id=?');
            if($sql->execute([$id_user])){
                $password = $sql->fetch(PDO::FETCH_ASSOC);
                if(password_verify($old_pass, $password['pass'])){
                    $sql = $conn->prepare('UPDATE users SET pass = ? WHERE id=?');
                    $password = password_hash($now_pass, PASSWORD_DEFAULT);
                    if(!$sql->execute([$password, $id_user])){
                        $rezult['error'] = 'Не удалось обновить пароль';
                    }
                }else{
                    $rezult['error'] = 'Не верно введен пароль';
                }
                
            }
        }
        //Обновление или добавления имени
        if(!empty($firstname)){
            $sql = $conn->prepare('UPDATE users SET firstname = ? WHERE id=?');
            if(!$sql->execute([$firstname, $id_user]))  
                $rezult['error'] = 'Не удалось обновить имя';
        }
        //Обновление фамилии
        if(!empty($lastname)){
            $sql = $conn->prepare('UPDATE users SET lastname = ? WHERE id=?');
            if(!$sql->execute([$lastname, $id_user]))
                $rezult['error'] = 'Не удалось обновить фамилию';
        }
        //Обновление отчества
        if(!empty($othestvo)){
            $sql = $conn->prepare('UPDATE users SET otchestvo = ? WHERE id=?');
            if(!$sql->execute([$othestvo, $id_user]))
                $rezult['error'] = 'Не удалось обновить отчество';
        }
        //Обновление даты рождения
        if(!empty($dateBirth)){
            $sql = $conn->prepare('UPDATE users SET date_of_birth = ? WHERE id=?');
            if(!$sql->execute([$dateBirth, $id_user]))
                $rezult['error'] = 'Не удалось обновить дату рождения';
        }
        if(isset($rezult['error']))
            return $rezult;
        else
            return true;
    }
