<?php
    $query_str = $_SERVER['QUERY_STRING'];
    $query_str_arr = explode('=', $query_str);
    $confirm_id = $query_str_arr[1];
    require_once('../model/add_user_db.php');
    $result = changeConfirmUser($confirm_id);


