<?php session_start(); ?>
<?php require_once 'controlers/controler_show_news.php'; ?>
<!DOCTYPE html>
<html>
<head>
    <title>Gamebomb</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="../style/style_first_site.css" >

</head>
<body>
    <h1>Gamebomb</h1>
    <div class="top-nav">

        <?php if($_SESSION['vhod_check'] == false): ?>
        <a href="view/register.php">Регистрация</a>
        <a href="view/vhod.php">Вход</a>
        <?php else: ?>
            <a href="http://localhost/obuch/myBigProject/view/personal_page_user.php?id=<?=$_SESSION['user_id'];?>" class='href_name_user'><?=$_COOKIE['login']?></a><br>
            <a href='controlers/controler_close_user.php'>Выйти</a>
       <?php endif; ?>
    </div>
    <h2>Последние новости</h2>
    <?php

        if(!empty($arr_news)){
            foreach ($arr_news as $v) {
                echo <<<END
                    <a>
                        <a href="http://localhost/obuch/myBigProject/view/news_page.php?id_news={$v['id']}"><h3>{$v['news_name']}</h3></a>
                        <p><span>{$v['user_name']}</span> <span>{$v['pub_date']}</span></p>
                        <img src='{$v['image_puth']}' width="50" height="50" alt="Картинка">
                        <p>{$v['news_body']}</p>
                    </div >
END;
            }
        }
        ?>

</body>
</html>