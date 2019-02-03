<?php
   // error_reporting(0);
    require_once'../model/show_news.php';
    require_once '../model/add_news_db.php';
    require_once '../model/comment.php';
    ob_start();
    $arr_news = getTmpNews();

    foreach($arr_news as $v){
        $objects[] = new News(
            $v['id'],
            $v['id_user'],
            $v['name_news'],
            $v['tema'],
            $v['body_news'],
            $v['image_puth'],
            $v['offer_date'],
            $v['login_user']);
    }

    $comments = getAllComments();

   

    class News
    {
        private $id_tmp_news;
        private $id_user;
        private $title;
        private $tema;
        private $body_news;
        private $image_puth;
        private $pub_date;
        private $login_user;

        public function __construct($id_tmp_news, $id_user, $name, $tema, $body, $img_puth, $date, $login)
        {
            $this->id_tmp_news = $id_tmp_news;
            $this->id_user = $id_user;
            $this->title = $name;
            $this->tema = $tema;
            $this->body_news = $body;
            $this->image_puth = $img_puth;
            $this->pub_date = $date;
            $this->login_user = $login;
        }

        public function printNews()
        {
            return $str;
        }

        public function __get($name)
        {
            return $this->$name;
        }

        public function getId()
        {
            return $this->id_tmp_news;
        }
    }

    if(isset($_REQUEST['sub_add_news'])){

        if(!empty($_GET['add_news'])){
            foreach($_GET['add_news'] as $v)
                $select_add_news[] = $v;
        }

        if(!empty($_GET['delete_news'])){
            foreach($_GET['delete_news'] as $v)
                $select_delete_news[] = $v;
        }

        if(isset($select_add_news) && isset($select_delete_news)){
            foreach (@$select_add_news as $value) {
                foreach (@$select_delete_news as $val) {
                    if($value == $val){
                        $error = '<h1>Хуйня</h1>';
                        return $error;
                    }
                }
            }
            
            

            $rez = getSelctedNews($select_add_news);
            if(addNewsDB($rez)){
                header('Location: http://' . $_SERVER['HTTP_HOST'] . '/myBigProject/view/admin_page.php');
            }else
                echo 'Не удалось опубликовать новости';
            

            $rez = getSelctedNews($select_delete_news);
            if(deleteNews($rez)){
                header('Location: http://' . $_SERVER['HTTP_HOST'] . '/myBigProject/view/admin_page.php');
            }else
                echo 'Не удалось удлить новости';       
        }else{
            if(isset($select_add_news)){
                $rez = getSelctedNews($select_add_news);
                if(addNewsDB($rez)){
                    header('Location: http://' . $_SERVER['HTTP_HOST'] . '/myBigProject/view/admin_page.php');
                }else
                    echo 'Не удалось опубликовать новости';
            }

            if(isset($select_delete_news)){
                $rez = getSelctedNews($select_delete_news);
                if(deleteNews($rez)){
                    header('Location: http://' . $_SERVER['HTTP_HOST'] . '/myBigProject/view/admin_page.php');
                }else
                    echo 'Не удалось удлить новости'; 
                }
        }
}


if(isset($_REQUEST['sub_delete_comments'])){
    $id = $_REQUEST['delete_comments'];
    if(deleteComments($id))
        header('Location: http://' . $_SERVER['HTTP_HOST'] . '/myBigProject/view/admin_page.php');
}



    if(isset($_REQUEST['sub'])){
        session_start();
          if(!empty($_REQUEST['name_news']) && !empty($_REQUEST['body_news'])){
            if($_FILES['image_news']['size'] != 0){
                require_once '../model/add_news_db.php';
                $puth = "../image/" . $_FILES['image_news']['name'];
                if(move_uploaded_file($_FILES['image_news']['tmp_name'], $puth)){
                    if(addAdminNews(
                        $_REQUEST['name_news'], 
                        $_REQUEST['body_news'], 
                        $_REQUEST['select'], 
                        $_SESSION['user_id'], 
                        'image/' . $_FILES['image_news']['name'] )){
                            $rezult['succes'] = "Новость опубликована";
                            return $rezult;
                    }else{
                        $rezult['error'] = "Не удалось предложить новость. Повторите позже.";
                        return $rezult;
                    }
                }else{
                    $rezult['error'] = "Не удалось загрузить картинку";
                    return $rezult;
                }

            }else{
                $rezult['error'] = "Загрузите картинку";
                return $rezult;
            }
        }else{
            $rezult['error'] = "Заполните все поля";
            return $rezult;
        }
    }

    ob_flush();