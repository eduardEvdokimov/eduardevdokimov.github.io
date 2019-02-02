<?php
    session_start();
    require_once 'connection_db.php';
    
    
    function addComment($id_user, $id_news, $comment)
    {
        $conn = con();
        $sql = $conn->prepare('INSERT INTO comments (comment, id_user, id_news) VALUES (?,?,?)');
        $rezult = $sql->execute([$comment, $id_user, $id_news]);
        if($rezult)
            return true;
        else
            return false;
    }

    function getComments($id_news)
    {
        $conn = con();
        $sql = $conn->prepare('SELECT * FROM comments WHERE id_news=?');
        $rezult = $sql->execute([$id_news]);
        if($rezult){
            $rezult = $sql->fetchAll(PDO::FETCH_ASSOC);
            foreach($rezult as $v){
                $sql = $conn->prepare('SELECT users.login, photo_users.photo_user FROM users, photo_users WHERE users.id=? AND photo_users.vnesh_id=?');
                $sql->execute([$v['id_user'], $v['id_user']]);
                $rez = $sql->fetch(PDO::FETCH_ASSOC);
                $v['login_user'] = $rez['login'];
                $v['image_puth'] = $rez['photo_user'];
                $rezults [] = $v;
            }
            return $rezults;
        } else
            return false;
    }

    function getAllComments(){
        $conn = con();
        $sql = 'SELECT * FROM comments';
        $rez = $conn->query($sql);
        $rezult = $rez->fetchAll(PDO::FETCH_ASSOC);
        foreach ($rezult as $value) {
            $sql = $conn->prepare('SELECT users.login, news.news_name FROM users, news WHERE users.id=? AND news.id=?');
            $sql->execute([$value['id_user'], $value['id_news']]);
            $rez = $sql->fetch(PDO::FETCH_ASSOC);
            $value['login'] = $rez['login'];
            $value['news_name'] = $rez['news_name'];
            $rezults [] = $value; 
        }
        return $rezults;
    }

    function deleteComments($array_id)
    {
        $conn = con();

        foreach ($array_id as $value) {
            $sql = $conn->prepare('DELETE FROM comments WHERE id = ?');
            if(!$sql->execute([$value]))
                return false;
        }
        return true;
        
    }