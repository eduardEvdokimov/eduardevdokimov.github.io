<?php

class User
{
    private $login;
    private $mail;
    private $password;
    private $photo;

    public function __construct($login, $mail, $password, $photo = 'image/no-user-image.gif')
    {
    		$this->login = $login;
        	$this->mail = $mail;
        	$this->password = $password;
        	$this->photo = $photo;
    }

    public function validateData()
    {
        $errors = [];
        if (mb_strlen($this->login) < 3 || mb_strlen($this->login) > 15) {
            $errors['login'] = 'Длина имени должна быть от 3 до 15 символов';
        }

        if(mb_strlen($this->password) < 3)
        {
            $errors['pass'] = 'Слишком короткий пароль';
        }

        if(!filter_var($this->mail, FILTER_VALIDATE_EMAIL))
        {
            $errors['email'] = 'Введите правильно адрес электронной почты';
        }

        if(is_array($this->photo)){
	        if(empty($this->photo['error'])){
	        	if($this->photo['size'] > (1024 * 1024 * 5)){
		        	$errors['photo'] = 'Размер файла не должен превышать 5 Мб';
		        }
	        }else
	        	$errors['photo'] = 'Файл не удалось загрузить';
	    }

        if(empty($errors))
            return true;
        else
            return $errors;   
    }

    private function addPhoto()
    {
    	$puth_photo = 'image/' .  $this->photo['name'];
        if (move_uploaded_file($this->photo['tmp_name'], '../'. $puth_photo)) {
        	return $puth_photo;
        }else
        	return false;
    }

    public function addUser()
    {
            $errors = [];
            $connection = $this->connectionDB();

            
            list($login, $password_hash) = $this->dataPreparation();

            if(is_object($connection)){
                $sql = $connection->prepare("SELECT * FROM users WHERE login=?");
                $sql->execute([$this->login]);
                $rez = $sql->fetch();
                if(!empty($rez['login'])){
                	$errors['login'] = 'Пользователь с данным логином уже существует';
                    return $errors;
                }

                $sql = $connection->prepare("SELECT * FROM users WHERE email=?");
                $sql->execute([$this->mail]);
                $rez = $sql->fetch();
                if(!empty($rez['email'])){
                	$errors['email'] = 'Пользователь с данным электронным адресом уже существует';
                    return $errors;
                }

                $sql = $connection->prepare('INSERT INTO users (login, pass, email, confirm_id) VALUES (:login, :pass, :email, :confirm_id)');
                $confirm_id = uniqid();
                if($sql->execute([
                                'login' => $login, 
                                'pass' => $password_hash, 
                                'email' => $this->mail, 
                                'confirm_id' => $confirm_id])) {
                    $id_add_users = $connection->lastInsertId();
                    $sql = $connection->prepare('INSERT INTO photo_users (photo_user, vnesh_id) VALUES (?, ?)');
                    if(is_array($this->photo))
           					$this->photo = $this->addPhoto();
                    if($sql->execute([$this->photo, $id_add_users])) {
                        mail($this->mail, "Подтверждение аккаунта", 'http://localhost/myBigProject/view/reg_successful.php?conf=' . $confirm_id);
                        return true;
                    }else
                        return 'Проверте правильность введенных данных';
                }else
                    return 'Проверте правильность введенных данных';
            }else
            	return $connection;
    }
         
            
    private function connectionDB()
    {
        try{
            $connection = new PDO('mysql:host=localhost; dbname=gamebomb', 'root', '', [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]);
            return $connection;
        }catch(PDOException $e){
            return 'Ошибка при подключении к базе данных: ' . $e->getMessage();
        }
    }

    private function dataPreparation()
    {
        $login = htmlspecialchars(strip_tags($this->login));
        $password_hash = password_hash($this->password, PASSWORD_DEFAULT);
        return [$login, $password_hash];
    }
}