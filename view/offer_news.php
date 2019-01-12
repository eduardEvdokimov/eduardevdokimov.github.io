<?php require_once '../controlers/controller_offer_news.php' ?>
<html>
<head>
    <title></title>
    <meta charset="UTF-8">
</head>
<body>
    <h2>Форма добавления новости</h2>
    <form action="" method="post" enctype="multipart/form-data">
        <label>Название новости: <input type="text" name="name_news" placeholder="Броское, нужно забайтить на просмотр"></label><br>
        <label>Тело новости: <textarea name="body_news" cols="50" rows="10">Первые две строчки интересные, потом вода...</textarea></label><br>
        <label>Добавить фото: <input type="file" name="image_news" ></label><br>
        <input type="submit" name="sub" value="Предложить">
        <?php if(isset($error)) echo "<em style='color:red;'>$error</em>";?>
    </form>
</body>
</html>