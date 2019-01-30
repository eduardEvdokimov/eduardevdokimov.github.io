<?php
class ValidateDataUser
{
	private $login;
	private $mail;
	private $password;
	private $photo;
	private $data;

	public function __construct($login, $mail, $password, $arr_data = null)
	{
		$this->login = $login;
		$this->mail = $mail;
		$this->password = $password;
	}

	public function all_data()
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
	





	public function login_len($min_len = 3, $max_len = 15)
	{
		if (mb_strlen($this->login) < $min_len || mb_strlen($this->login) > $max_len) {
            $errors['login'] = "Длина имени должна быть от $min_len до $max_len символов";
            return $errors;
        }
        return true;
	}

	public function password_len($min_len)
	{
		if(mb_strlen($this->password) < $min_len)
        {
            $errors['pass'] = 'Слишком короткий пароль';
            return $errors;
        }
        return true;
	}

	public function mail()
	{
		if(!filter_var($this->mail, FILTER_VALIDATE_EMAIL))
        {
            $errors['email'] = 'Введите правильно адрес электронной почты';
            return $errors;
        }
        return true;
	}


	
}

// public function validateData()
//     {
//         $errors = [];
        

        

        

//         if(is_array($this->photo)){
// 	        if(empty($this->photo['error'])){
// 	        	if($this->photo['size'] > (1024 * 1024 * 5)){
// 		        	$errors['photo'] = 'Размер файла не должен превышать 5 Мб';
// 		        }
// 	        }else
// 	        	$errors['photo'] = 'Файл не удалось загрузить';
// 	    }

//         if(empty($errors))
//             return true;
//         else
//             return $errors;   
//     }