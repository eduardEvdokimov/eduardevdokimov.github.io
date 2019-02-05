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

    function getUserNewsComment($id_user)
    {
        $conn = con();
        $sql = $conn->prepare('SELECT * FROM news WHERE user_id=? ORDER BY pub_date DESC');
        $sql->execute([$id_user]);
        $news = $sql->fetchAll(PDO::FETCH_ASSOC);
        $sql = $conn->prepare("SELECT COUNT('comment') FROM comments WHERE id_user=?");
        $sql->execute([$id_user]);
        $count_comment = $sql->fetch(PDO::FETCH_ASSOC);
        $rezult = ['news' => $news, 'count_comment' => $count_comment["COUNT('comment')"]];
        return $rezult;
    } 

    function changeInfo(
        $id_user,
        $login, 
        $old_pass, 
        $now_pass, 
        $firstname, 
        $lastname, 
        $othestvo, 
        $dateBirth,
        $photo)
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
        //Обновление фотографии
        if(!empty($photo['name'])){
            if(empty($photo['error'])){
                if($photo['size'] < (1024 * 1024 * 5)){
                    $puth_photo = 'image/' .  $photo['name'];
                    if (move_uploaded_file($photo['tmp_name'], '../'. $puth_photo)) {
                        $sql = $conn->prepare('UPDATE photo_users SET photo_user = ? WHERE vnesh_id = ?');
                        $sql->execute([$puth_photo, $id_user]);
                    }else
                        $rezult['error'] = 'Файл не удалось загрузить';
                    
                }else
                    $rezult['error'] = 'Размер файла не должен превышать 5 Мб';
            }else
                $rezult['error'] = 'Файл не удалось загрузить';
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
