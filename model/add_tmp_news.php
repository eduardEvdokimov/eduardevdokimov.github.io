<?php
require_once 'connection_db.php';

function addTmpNews($name_news, $body, $user_id, $image_puth)
{
    $conn = con();
    $sql = $conn->prepare("INSERT INTO tmp_news (name_news, body_news, image_puth,  offer_user_id) VALUES (?, ?, ?, ?)");
    if($sql->execute([$name_news, $body, $image_puth, $user_id])){
        return true;
    }else return false;
}