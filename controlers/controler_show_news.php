<?php
	require_once 'model/show_news.php';
	require_once 'newFormatDate.php';
	$tems = empty($_GET['tems']) ? 'Все' : $_GET['tems'];
    $arr_news = newFormatDate(showNews($tems));
	
    

