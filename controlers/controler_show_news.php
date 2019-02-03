<?php
	require_once 'model/show_news.php';
	require_once 'newFormatDate.php';
	$tems = empty($_GET['tems']) ? 'Все' : $_GET['tems'];
    $arr_news = newFormatDate(showNews($tems));
    $news_page = $_GET['news_page'];
	if(!empty($news_page))
		$arr_news2 = getLocalNews($news_page, $arr_news);
	else
		$arr_news2 = $arr_news;

	$count_page = ceil(count($arr_news) / 4);
	
	if($count_page > 1){
		if(!empty($news_page)){
			if($news_page != 1)
				$step_nazad = $news_page - 1;
			if($news_page != $count_page)
				$step_next = $news_page + 1;
		}else{
			$step_next = 2;
		}
	}


	if(isset($_GET['search'])){
		$arr_news2 = searchRequest($_GET['request']);
		
	}






	function getLocalNews($number_page, $arr_news)
	{
		$position = $number_page * 4 - 3;
		for($count = $position; $count < $position + 4; $count++)
			$rezult[] = $arr_news[$count];
		return $rezult;
	}

    



