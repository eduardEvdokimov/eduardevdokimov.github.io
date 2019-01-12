<?php
   // error_reporting(0);
    require_once'../model/show_news.php';
    ob_start();
    $arr_news = getTmpNews();

    foreach($arr_news as $v){
        $objects[] = new News(
            $v['id'],
            $v['id_user'],
            $v['name_news'],
            $v['body_news'],
            $v['image_puth'],
            $v['offer_date'],
            $v['login_user']);
    }

    class News
    {
        private $id_tmp_news;
        private $id_user;
        private $title;
        private $body_news;
        private $image_puth;
        private $pub_date;
        private $login_user;

        public function __construct($id_tmp_news, $id_user, $name, $body, $img_puth, $date, $login)
        {
            $this->id_tmp_news = $id_tmp_news;
            $this->id_user = $id_user;
            $this->title = $name;
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

    if(isset($_REQUEST['add_news'])){
        if(!empty($_GET['news'])){
            foreach($_GET['news'] as $v)
                $arr_selected_id[] = $v;
            }
            print_r($arr_selected_id);
        require_once '../model/add_news_db.php';
        $rez = getSelctedNews($arr_selected_id);
        if(addNewsDB($rez)){
            header('Location: http://' . $_SERVER['HTTP_HOST'] . '/obuch/myBigProject/view/admin_page.php');
        }else
            echo 'Не удалось опубликовать новости';
        }



    if(isset($_REQUEST['sub'])){
        echo 'саб';
    }

    ob_flush();