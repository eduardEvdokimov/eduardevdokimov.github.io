<?php
    require_once 'connection_db.php';
    require_once 'comment.php';
   


    function addViews($id_news)
    {
        $con = con();
        $sql = $con->prepare("UPDATE news SET views = views + 1 WHERE id = ?");
        $sql->execute([$id_news]);
    }

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


    function showNews($tems)
    {
        $con = con();
        if($tems === 'Все'){
            $sql = 'SELECT * FROM news ORDER BY pub_date DESC';
            $rez = $con->query($sql);
            $news = $rez->fetchAll(PDO::FETCH_ASSOC);
            foreach($news as $v){
                $sql = $con->prepare('SELECT login FROM users WHERE id=?');
                $sql->execute([$v['user_id']]);
                $rez = $sql->fetch(PDO::FETCH_ASSOC);
                $v['user_name'] = $rez['login'];
                $v['count_comment']  = @count(getComments($v['id']));
                $rezult[] = $v;
                 
               //logins[] = $rez['login'];
            }
        }else{
            $sql = $con->prepare('SELECT news_id FROM tems WHERE tema = ?');
            $sql->execute([$tems]);
            $id_news = $sql->fetchAll(PDO::FETCH_ASSOC);
            foreach ($id_news as $value) {
                $sql = $con->prepare('SELECT * FROM news WHERE id=? ORDER BY pub_date DESC');
                $sql->execute([$value['news_id']]);
                $news[] = $sql->fetch(PDO::FETCH_ASSOC);
            }
            if(!empty($news)){
                foreach($news as $v){
                
                    $sql = $con->prepare('SELECT login FROM users WHERE id=?');
                    $sql->execute([$v['user_id']]);
                    $rez = $sql->fetch(PDO::FETCH_ASSOC);

                    $v['user_name'] = $rez['login'];
                    $v['count_comment']  = @count(getComments($v['id']));

                    $rezult[] = $v;
                
                }
            }
            

        }
        
       return $rezult; 
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

            $sql = $conn->prepare("SELECT tema FROM tems WHERE tmp_news_id=".$v['id']);
            if($sql->execute()){
                $tema = $sql->fetch(PDO::FETCH_ASSOC);
                $rez[$x]['tema'] = $tema['tema'];
            }else{
                $rez[$x]['tema'] = 'none';
            }
            $x++;
        }
        return $rez;
    }