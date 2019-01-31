<?php require_once '../controlers/controler_admin_page.php'; ?>
<html>
<head>
    <title></title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../style/admin_page.css">
    <meta http-equiv="Cache-Control" content="no-cache">
    <script src='../jquery.js'></script>
    <script type='text/javascript'>
        $(document).ready(function(){
            $('#add_news').click(function(){
                $('.form_add_news').css({
                    'display' : 'block'
                });
                $('.block_news').css({
                    'display' : 'none'
                });
            });
            $('#tmp_news').click(function(){
                $('.block_news').css({
                    'display' : 'block'
                });
                $('.form_add_news').css({
                    'display' : 'none'
                });
            });
            
        
        });
    </script>
    
</head>
<body>
    <nav class='navigation-bar'>
        <li><h1>Admin Panel</h1></li>
        <li><button id='add_news'>Добавить новость</button></li>
        <li><button id='tmp_news'>Предложенные новости</button></li>
        <li><button id='comments'>Комментарии</button></li>
    </nav>
    <div class='form_add_news'>
        <h2>Форма добавления новости</h2>
        <form action="<?= $_SERVER['SCRIPT_NAME'] ?>" method="post" enctype="multipart/form-data" id='form_add_news'>
            <label>Название: </label>
            <input type="text" name="name_news" id='title_news' placeholder="Броское, нужно забайтить на просмотр"><br>
            <label>Тема:</label>
            <select class='select_tema' name='select'>
                <option value="Спорт">Спорт</option>
                <option value='Животные'>Животные</option>
                <option value="Политика">Политика</option>
                <option value="Технологии">Технологии</option>
            </select><br>
            <label>Новость: </label>
            <textarea name="body_news" cols="50" rows="10">Первые две строчки интересные, потом вода...</textarea><br>
            <label>Добавить фото: </label>
            <input type="file" name="image_news" id='input_file'><br>
            <p id='error' <?= isset($rezult['error']) ? "style= 'display: block;'" : '' ?> ><?= "$rezult[error]" ?></p>
            <p id='succes' <?= isset($rezult['succes']) ? "style= 'display: block;'" : '' ?> ><?= "$rezult[succes]" ?></p>
            <input type="submit" name="sub" value="Добавить" class='submit_add_news'>
        </form>
    </div>
    <div class="block_news">
        <h2>Предложенные новости</h2>
        <form action="<?= $_SERVER['SCRIPT_NAME'] ?>" method="get" enctype="application/x-www-form-urlencoded">
        <?php
            if(!empty($objects)):
                echo '<table border=1><th>Название</th><th>Тема</th><th>Новость</th><th>Картинка</th><th>Дата предложения</th><th>Пользователь</th><th>Добавить</th><th>Удалить</th>';
                foreach ($objects as $object):
                    echo<<<END

                         <tr>
                            <td>{$object->title}</td>
                            <td>{$object->tema}</td>
                            <td>{$object->body_news}</td>
                            <td><img src='../{$object->image_puth}' width='50' height='50' alt='Картинка'></td>
                            <td>{$object->pub_date}</td>
                            <td>{$object->login_user}</td>
                            <td><input type="checkbox" name="add_news[]" value="{$object->getId()}"></td>
                            <td><input type="checkbox" name="delete_news[]" value="{$object->getId()}"></td>
                        </tr>                           
END;
                endforeach;
                echo '</table>';
                if(isset($error)) echo $error;
                echo "<input type='submit' name='sub_add_news' value='Применить' class='submit_add_news'>";
                else:
                echo '<p>Нет добавленных новостей</p>';
                endif;
?>

        </form>
    </div>
</body>
    
</html>