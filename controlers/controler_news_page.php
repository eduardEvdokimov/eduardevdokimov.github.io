<?php
    session_start();
    ob_start();
    require_once('../model/show_news.php');
    require_once('../model/comment.php');
    require_once('../newFormatDate.php');


    $id_news = $_GET['id_news'];
    
    $news = newFormatDate(getNews($id_news));
    $comments = getComments($id_news);
    if($comments != null)
        $comments = newFormatDate(array_reverse($comments));

    
        
    



    if(isset($_REQUEST['add_comment'])){
        $comment = trim(htmlspecialchars(strip_tags($_POST['comment'])));
        if(!empty($comment)) {
            if (addComment($_SESSION['user_id'], $id_news, $comment))
                header('Location: http://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI']);
            else
                echo '-';
        }
    }
    ob_flush();
