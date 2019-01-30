<?php
    


    if(isset($_REQUEST['sub'])){
        session_start();
        if(!empty($_REQUEST['name_news']) && !empty($_REQUEST['body_news'])){
            if($_FILES['image_news']['size'] != 0){
                require_once '../model/add_tmp_news.php';
                $puth = "../image/" . $_FILES['image_news']['name'];
                if(move_uploaded_file($_FILES['image_news']['tmp_name'], $puth)){
                    if(addTmpNews($_REQUEST['name_news'], $_REQUEST['body_news'], $_REQUEST['select'],$_SESSION['user_id'], 'image/' . $_FILES['image_news']['name'] )){
                        $rezult['succes'] = "Новость отправленна на предпросмотр модеру";
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