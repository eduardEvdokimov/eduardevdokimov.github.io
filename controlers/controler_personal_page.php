<?php
    require_once '../model/personal_page_user.php';
	require_once '../newFormatDate.php';
    if(empty($user = getUserInfo($_GET['id'])))
       $error_data = 'Страница удалена';

    $count_news_comment = getUserNewsComment($_GET['id']);
    $user['count_news'] = count($count_news_comment['news']);
    $user['count_comment'] = $count_news_comment['count_comment'] ;
   

   	$user['full_date'] = newFormatDate($user['date_of_birth']);

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
    		$dateBirth,
    		$_FILES['update_photo']);

    	if(is_bool($rezult)){
    		header("Location: http://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']);
    	}
    	
    		
    }



























