<?php require_once '../controlers/controller_offer_news.php' ?>
<html>
<head>
    <title></title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../style/add_news_user.css">
    <meta http-equiv="Cache-Control" content="no-cache">
</head>
<body>
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
            <label>Новость: </label><textarea name="body_news" cols="50" rows="10">Первые две строчки интересные, потом вода...</textarea><br>
            <label>Добавить фото: </label><input type="file" name="image_news" id='input_file'><br>
            
            <p id='error' <?= isset($rezult['error']) ? "style= 'display: block;'" : '' ?> ><?= "$rezult[error]" ?></p>
            <p id='succes' <?= isset($rezult['succes']) ? "style= 'display: block;'" : '' ?> ><?= "$rezult[succes]" ?></p>
            <input type="submit" name="sub" value="Добавить" class='submit_add_news'>
        </form>
    </div>
</body>
</html>