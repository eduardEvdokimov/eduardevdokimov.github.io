<?php
    require_once '../model/personal_page_user.php';

     if(empty($rez = getUserInfo($_GET['id'])))
        $error_data = 'Страница удалена';

     if(is_uploaded_file($_FILES['image']['tmp_name'])){

     }


























