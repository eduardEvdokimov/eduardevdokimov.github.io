<?php  require_once '../controlers/controler_personal_page.php';?>
<?php $rez['login'] == 'admin' ? header("Location: http://localhost/myBigProject/view/admin_page.php") : null;?>
<html>
<head>
    <title><?= $_COOKIE['login'] ?></title>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="../style/personal_page.css">
    <script src='../jquery.js'></script>
    <script type="text/javascript">
    	$(document).ready(function(){
    		$('#add_info').click(function(){
    			$('#change_info').css({'display' : 'block'});
    		});
    	});
    </script>
</head>
<body>
    <?php
        if(isset($error_data)):
            echo "<h1>$error_data</h1>";
        else: ?>

                <img src="../<?= $user['photo']; ?>" alt="Фотография" height="150" width="200">
                <b><?= $rez['login']; ?></b>
    			<p>Изменить фото:</p><input type='file' name='update_photo'>
                <a href="offer_news.php">Предложить новость</a>
                <button id='add_info'>Редактировать</button>
            
                <form id='change_info' action='<?=  $_SERVER['REQUEST_URI']; ?>' method='post' enctype='multipart/form-data'>
                	<p>Логин:</p><input type='text' name='login' value='<?= $user['login']; ?>'>
                	<p>Изменить пароль:</p>
                	<p>Старый пароль:</p><input type='password' name='old_pass'>
                	<p>Новый пароль:</p><input type='password' name='now_pass'>
                	<p>Имя:</p><input type='text' name='firstname' value='<?= $user['firstname']; ?>'>
                	<p>Фамилия:</p><input type='text' name='lastname' value='<?= $user['lastname']; ?>'> 
                	<p>Отчество:</p><input type='text' name='otchestvo' value='<?= $user['otchestvo']; ?>'>
                	<p>Дата рождения:</p>
                	<select name='day'>
                		<?php for($count = 1; $count <= 31; $count++): 
                			if($count == $user['day'])
                				echo "<option  value='$count' selected>$count</option>";
                			?>

                		<option  value='<?= $count ?>'><?= $count ?></option>
                	<?php endfor;?>
                	</select>
                	<select name='mouth'>
                		<?php for($count = 1; $count <= 12; $count++): 
                			if($count == $user['mouth'])
                				echo "<option  value='$count' selected>$count</option>";
                			?>
                		<option  value='<?= $count ?>'><?= $count ?></option>
                	<?php endfor;?>
                	</select>
                	<select name='year'>
                		<?php for($count = 1970; $count <= 2018; $count++): 
                			if($count == $user['year'])
                				echo "<option  value='$count' selected>$count</option>";
                			?>
                		<option  value='<?= $count ?>'><?= $count ?></option>
                	<?php endfor; ?>
                	</select>
                	<input type="submit" name="change_info" value='Сохранить'>
                </form>
       


<?php endif; ?>


</body>
</html>

