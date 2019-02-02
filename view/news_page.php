<?php require_once ('../controlers/controler_news_page.php');
    session_start();
?>
<!-- Реализовать дату как на Gamebomb! -->
<!DOCTYPE html>
<html>
<head>
    <title><?= $news['news_name'] ?></title>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="../style/news_page.css" >
    <link href="https://fonts.googleapis.com/css?family=Roboto+Slab" rel="stylesheet">
   <link rel="stylesheet" href="../font-awesome-4.7.0/css/font-awesome.min.css">
</head>
<body>
    <header>
        <a href="http://localhost/myBigProject/"><img src="../icon/gamebomb.png" id="logo"></a>
        <input type="text" id="search" placeholder="Найти что-нибудь..."/>
        
        <div id="tab_reg">
            <?php if($_SESSION['vhod_check'] == false) : ?>
            <a href="http://localhost/myBigProject/view/register.php" class='reg'>Регистрация</a>
            <a href="http://localhost/myBigProject/view/vhod.php" class='reg'>Вход</a>
            <?php else: ?>
            <a href="http://localhost/myBigProject/view/personal_page_user.php?id=<?=$_SESSION['user_id'];?>" class='reg'><?=$_COOKIE['login']?></a>
            <a href='controlers/controler_close_user.php' class="reg">Выйти</a>
             <?php endif; ?>
        </div>
        <div id="table_div" >
            <a href="<?= $_SERVER['SCRIPT_NAME'] . '?tems=Все'; ?>" class="table">Все</a>
            <a href="<?= $_SERVER['SCRIPT_NAME'] . '?tems=Спорт'; ?>" class="table">Спорт</a>
            <a href="<?= $_SERVER['SCRIPT_NAME'] . '?tems=Животные'; ?>" class="table">Животные</a>
            <a href="<?= $_SERVER['SCRIPT_NAME'] . '?tems=Политика'; ?>" class="table">Политика</a>
            <a href="<?= $_SERVER['SCRIPT_NAME'] . '?tems=Технологии'; ?>" class="table">Технологии</a>
        </div>
    </header>
    <div class='div_news'>
        <div class='div_content_news'>
        <h1><?= $news['news_name'] ?></h1>
        <p class='login_pubdate'><span id='login'><?= $news['user_name'] ?></span> <span id='pub_date'><?= $news['pub_date'] ?></span> <i class="fa fa-eye" aria-hidden="true"> <?= $news['views']; ?></i></p>
        <img src="../<?= $news['image_puth'] ?>" alt="Картинка" class='image_news'>
        <div>
            <p class='article'><?= $news['news_body']?></p>
        </div>
    
    <div class='comment_block'>
        <h2>Комментарии(<?= isset($comments) ? count($comments) : 0; ?>)</h2>
        <?php if(isset($comments)):?>
            <ul>
            <?php foreach($comments as $comment):
                if($comment['id_user'] == $_SESSION['user_id'])
                    if($_SESSION['vhod_check'])
                        $comment['style_login'] = 'green';

                echo<<<END
                <div class='comment'>
                <img src="../$comment[image_puth]" alt="">
                <p><span style="color: $comment[style_login]" id='login'>$comment[login_user] </span> <span id='pub_date'>$comment[pub_date]</span></p>
                
                <p class='body_comment'>$comment[comment]</p>
                </div>
END;
?>
        <?php endforeach; echo "</ul>"; endif; ?>
        <?php if($_SESSION['vhod_check']): ?>
        <form action="<?= $_SERVER['SCRIPT_NAME'] . '?id_news=' . $news['id'] ?>" method="POST">
            <p>Текст комментария:</p>
            <textarea name="comment" cols="90" rows="5"></textarea><br>
            <input type="submit" value="Добавить комментарий" name="add_comment">
        </form>
        <?php else: ?>
            <div class='add_comment'>
                <h2>Добавить комментарий</h2>
                <p>Чтобы оставлять комментарии вам необходимо <a href='http://localhost/myBigProject/view/vhod.php'>войти</a> под своим аккаунтом. Если вы еще не зарегистрированы, то можете пройти <a href='http://localhost/myBigProject/view/register.php'>экспресс-регистрацию</a>, которая займет <u>всего пару минут</u>.</p>
            </div>
        <?php endif; ?>
        </div>
        </div>
    </div>
</body>
</html>
