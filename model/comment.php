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