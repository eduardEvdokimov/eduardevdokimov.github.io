<?php
    require_once '../model/personal_page_user.php';

    if(empty($user = getUserInfo($_GET['id'])))
       $error_data = 'Страница удалена';


    if(isset($_REQUEST['change_info'])){
    	$dateBirth = $_REQUEST['year'] . '-' . $_REQUEST['mouth'] . '-' . $_REQUEST['day']; 
    	
    	$rezult = changeInfo(
    		$_REQUEST['id'], 
    		$_REQUEST['login'], 
    		$_REQUEST['old_pass'], 
    		$_REQUEST['now_pass'], 
    		$_REQUEST['firstname'], 
    		$_REQUEST['lastname'],
    		$_REQUEST['otchestvo'],
    		$dateBirth);

    	if(!is_bool($rezult))
    		echo "<i>{$rezult['error']}</i>";
    	else
    		echo '<i>Изменения сохранены</i>';
    }



























