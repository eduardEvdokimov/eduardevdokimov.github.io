<?php
    if(isset($_REQUEST['sub']))
    {
        require_once '../model/User.php';

        if(!empty($_REQUEST['login']) && !empty($_REQUEST['pass']) && !empty($_REQUEST['email']) && !empty($_FILES['photo'])){
            $user = new User($_REQUEST['login'], $_REQUEST['email'], $_REQUEST['pass'], $_FILES['photo']);
            if(($rezult = $user->validateData()) === true){ 
                if(($rezult = $user->addUser()) === true){
                    header("Location: http://localhost/myBigProject/view/confirm_register.php");
                }
            }   
        }
    }
