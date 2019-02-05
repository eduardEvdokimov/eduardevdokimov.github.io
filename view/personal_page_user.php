<?php  require_once '../controlers/controler_personal_page.php';?>
<?php $user['login'] == 'admin' ? header("Location: http://localhost/myBigProject/view/admin_page.php") : null;?>
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
    		$('#add_info').click(function(){
    			$('.background_news').css({'display' : 'none'});
    		});
    	});
 
    </script>
</head>
<body>
	<header>
        <a href="http://localhost/myBigProject/"><img src="../icon/gamebomb.png" id="logo"></a>
    </header>

    <?php
        if(isset($error_data)):
            echo "<h1>$error_data</h1>";
        else: ?>
        		<div class='background_news'>
        			<div class='block_image_buttons'>
	                	<img src="../<?= $user['photo']; ?>" alt="Фотография" id='user_photo'>
	                	
	                	<a href="offer_news.php" class='buttons'>Предложить новость</a>
	                	<button id='add_info' class='buttons'>Редактировать</button>
	            	</div>
	            	<div class='info_user'>
	                	<h2><?= $user['login']; ?>
	                	<?php if(isset($user['firstname'])) echo "<span>({$user['lastname']} {$user['firstname']} {$user['otchestvo']})</span>"; ?>
	                	</h2>
	                	<?php if(isset($user['full_date'])) echo "<label>Дата рождения: {$user['full_date']}</label>"; ?>
	                	<div class='block_count_info'>
	                		<p><span class='number'><?= $user['count_news']; ?></span><br><span class='nadpis'>новостей</span></p>
	                		<p><span class='number'><?= $user['count_comment']; ?></span><br><span class='nadpis'>комментариев</span></p>
	                	</div>
	    			</div>
	                
            	</div>


            	<div id='change_info' class='background_form'>

	                <form  action='<?=  $_SERVER['REQUEST_URI']; ?>' method='post' enctype='multipart/form-data'>
	                	<div class='block_inputs'>
		                	<label><span>Изменить фото:</span><input type='file' name='update_photo' id='upload_file'></label>
		                	<label><span>Логин:</span><input type='text' name='login' value='<?= $user['login']; ?>'></label>
		                	<label><span>Изменить пароль</span></label>
		                	<label><span>Старый пароль:</span><input type='password' name='old_pass'></label>
		                	<label><span>Новый пароль:</span><input type='password' name='now_pass'></label>
		                	<label><span>Имя:</span><input type='text' name='firstname' value='<?= $user['firstname']; ?>'></label>
		                	<label><span>Фамилия:</span><input type='text' name='lastname' value='<?= $user['lastname']; ?>'> </label>
		                	<label><span>Отчество:</span><input type='text' name='otchestvo' value='<?= $user['otchestvo']; ?>'></label>
		                		<div>
		                		<span id='label_date'>Дата рождения:</span>
		                		<div id='date'>
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
			                </div>
			                	<?php if(isset($rezult))			                			
			                	  			echo "<p id='error'>{$rezult['error']}</p>"; 
			                	?>
			                	  			
		                	</div>
		                	<div id='buttons'>
		                	<a href='<?= $_SERVER['REQUEST_URI'] ?>' class='button'>На личную страницу</a>
		                	<input type="submit" name="change_info" value='Сохранить' class='button'>
		                	<div>
	                	</div>
	                </form>
        
            	</div>

<?php endif; ?>


</body>
</html>

