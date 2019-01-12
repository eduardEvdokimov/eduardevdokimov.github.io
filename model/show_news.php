<?php
    require_once 'connection_db.php';

    function getNews($id)
    {
        $con = con();
        $sql = $con->prepare('SELECT * FROM news WHERE id=?');
        if($sql->execute([$id])){
            $result = $sql->fetch(PDO::FETCH_ASSOC);
            $sql = $con->prepare('SELECT login FROM users WHERE id=?');
            $sql->execute([$result['user_id']]);
            $user_login = $sql->fetch(PDO::FETCH_ASSOC);
            $result['user_name'] = $user_login['login'];
        } else
            return false;
        return $result;
    }


    function showNews()
    {
        $con = con();
        $sql = 'SELECT * FROM news';
        $rez = $con->query($sql);
        $news = $rez->fetchAll(PDO::FETCH_ASSOC);
        foreach($news as $v){
            $sql = $con->prepare('SELECT login FROM users WHERE id=?');
            $sql->execute([$v['user_id']]);
            $rez = $sql->fetch(PDO::FETCH_ASSOC);
            $v['user_name'] = $rez['login'];
            $result_arr[] = $v;
           //logins[] = $rez['login'];

        }
        return $result_arr;
    }

    function getTmpNews()
    {
        $conn = con();
        $sql = "SELECT * FROM tmp_news";
        $rez = $conn->query($sql);
        $rez = $rez->fetchAll(PDO::FETCH_ASSOC);
        $x = 0;
        foreach($rez as $v){

            $sql = $conn->prepare("SELECT login FROM users WHERE id=".$v['offer_user_id']);
            if($sql->execute()){
                $result_user_db = $sql->fetch(PDO::FETCH_ASSOC);
                $rez[$x]['login_user'] = $result_user_db['login'];
            }else{
                $rez[$x]['login_user'] = 'none';
            }
            $x++;
        }
        return $rez;
    }