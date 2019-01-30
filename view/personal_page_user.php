<?php  require_once '../controlers/controler_personal_page.php';?>
<?php $rez['login'] == 'admin' ? header("Location: http://localhost/obuch/myBigProject/view/admin_page.php") : null;?>
<html>
<head>
    <title><?= $_COOKIE['login'] ?></title>
    <meta charset="UTF-8">
    
</head>
<body>
    <?php
        if(isset($error_data)):
            echo "<h1>$error_data</h1>";
        else: echo<<<END
                <img src="../{$rez['photo_user']}" alt="Фотография" height="150" width="200">
                <b>{$rez['login']}</b>
                <a href="offer_news.php">Предложить новость</a>
       
END;
?>

</body>
</html>

<?php endif; ?>