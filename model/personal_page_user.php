<?php
    function getUserInfo($id)
    {
        require_once 'connection_db.php';
        $conn = con();
        $sql = $conn->prepare("SELECT login, photo_user FROM users INNER JOIN photo_users ON users.id=photo_users.vnesh_id WHERE users.id=$id");
        if($sql->execute()) {
            $rez = $sql->fetch(PDO::FETCH_ASSOC);
            return $rez;
        }else
            return false;
    }