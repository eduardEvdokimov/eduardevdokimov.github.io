<?php require_once ('../controlers/controler_news_page.php');
    session_start();
?>
<!-- Реализовать дату как на Gamebomb! -->
<!DOCTYPE html>
<html>
<head>
    <title><?= $news['news_name'] ?></title>
    <meta charset="UTF-8">
</head>
<body>
    <div>
        <h1><?= $news['news_name'] ?></h1>
        <p><b><?= $news['user_name'] ?></b> <span><?= $news['pub_date'] ?></span></p>
        <img src="../<?= $news['image_puth'] ?>" alt="Картинка" width="400">
        <div>
            <p><?= $news['news_body']?></p>
        </div>
    </div>
    <div>
        <h2>Коментарии(<?= isset($comments) ? count($comments) : 0; ?>)</h2><hr>
        <?php if(isset($comments)):?>
            <ul>
            <?php foreach($comments as $comment):
                if($comment['id_user'] == $_SESSION['user_id'])
                    if($_SESSION['vhod_check'])
                        $comment['style_login'] = 'green';

                echo<<<END
                <li>
                <p><b style="color: $comment[style_login]">$comment[login_user] </b> <span>$comment[pub_date]</span></p>
                <img src="../$comment[image_puth]" alt="" width="60">
                <p>$comment[comment]</p>
                </li>
END;
?>
                


        <?php endforeach; echo "</ul>"; endif; ?>
        <?php if($_SESSION['vhod_check']): ?>
        <form action="<?= $_SERVER['SCRIPT_NAME'] . '?id_news=' . $news['id'] ?>" method="POST">
            <textarea name="comment" cols="90" rows="5"></textarea><br>
            <button type="submit" name="add_comment">Добавить</button>
        </form>
        <?php endif; ?>
    </div>
</body>
</html>
