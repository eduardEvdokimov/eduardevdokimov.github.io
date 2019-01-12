<?php
    require_once('connection_db.php');

    function getSelctedNews($arr_id_news)
    {
        $conn = con();
        foreach($arr_id_news as $v){
            $sql = $conn->prepare('SELECT * FROM tmp_news WHERE id=?');
            $sql->execute([$v]);
            $rez[] = $sql->fetch(PDO::FETCH_ASSOC);
        }
        return $rez;
    }

    function addNewsDB($arr_news_db)
    {
        $conn = con();
        foreach($arr_news_db as $v){
            $sql = $conn->prepare('INSERT INTO news (
                                                            news_name, 
                                                            news_body, 
                                                            image_puth, 
                                                            user_id) 
                                                            VALUES (
                                                            :news_name, 
                                                            :news_body, 
                                                            :img_puth, 
                                                            :user_pub_id)');
           $result = $sql->execute([
                'news_name' => $v['name_news'],
                'news_body' => $v['body_news'],
                'img_puth' => $v['image_puth'],
                'user_pub_id' => $v['offer_user_id']]);
           if($result)
           {
               $delete_news = $conn->prepare('DELETE FROM tmp_news WHERE id=?');
               if($delete_news->execute([$v['id']]))
                   return true;
               else
                   return false;
           }else
               return false;

        }
    }