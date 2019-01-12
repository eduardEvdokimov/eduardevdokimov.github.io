<?php require_once '../controlers/controler_admin_page.php' ?>
<html>
<head>
    <title></title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../style/admin_page.css">
</head>
<body>
    <div class="form_add_news">
        <h2>Форма добавления новости</h2>
        <form action="<?= $_SERVER['SCRIPT_NAME'] ?>" method="post" enctype="multipart/form-data">
            <label>Название новости: <input type="text" name="name_news" placeholder="Броское, нужно забайтить на просмотр"></label><br>
            <label>Тело новости: <textarea name="body_news" cols="50" rows="10">Первые две строчки интересные, потом вода...</textarea></label><br>
            <label>Добавить фото: <input type="file" name="image_news" ></label><br>
            <input type="submit" name="sub" value="Добавить">
        </form>
    </div>
    <div class="block_news">
        <h2>Новости, которые предложили пользователи</h2>
        <form action="<?= $_SERVER['SCRIPT_NAME'] ?>" method="get" enctype="application/x-www-form-urlencoded">
        <?php
            if(!empty($objects)):
                foreach ($objects as $object):

                    echo <<<END
                    <div>                 
                         <a href=''><h3>{$object->title}</h3></a>
                    <img src='../{$object->image_puth}' width='50' height='50' alt='Картинка'>
                    <p>{$object->body_news}</p>
                    <p>От: <em>{$object->login_user}</em></p>
                    <p>Дата предложения: {$object->pub_date}</p>
                        
                        <label>Добавить новость <input type="checkbox" name="news[]" value="{$object->getId()}"></label>
                        <hr>                   
                    </div>
END;
                endforeach;
                echo "<input type='submit' name='add_news'>";
                else:
                echo '<p>Нет добавленных новостей</p>';
                endif;
?>

        </form>
    </div>
</body>
</html>