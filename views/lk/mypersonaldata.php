<!--<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../css/main.css" rel="stylesheet" type="text/css">
    <link rel="shortcut icon" href="../image/icon.png" type="image/png">
    <title>WOT | World of teachers | Личный кабинет</title>
</head>
<body>
    <container class="container">
        <?php include 'templates/header.tpl'; ?>
        <content class="content">
            <?php include 'templates/aside.tpl'; ?>
            <section class="section">
    Мои персональные данные
    
	<form action="" method="post" enctype="multipart/form-data">
                                <h1>Редактировать</h1>
                                <label for="photo"><b>Фото</b></label>
                                <p><img src="<?= '/photos/'.$photo ?>" name="photo" width="200"></p>
                                <p>
                                <input type="file" name="file">
                                </p>
                                <label for="password"><b>Пароль</b></label>
                                <p><input type="text" placeholder="Введите пароль" name="pass" maxlength="15" minlength="6" required value="<?=$password?>"></p>
                                <label for="surname"><b>Фамилия</b></label>
                                <p><input type="text" placeholder="Введите фамилию" name="surname" maxlength="50" required value="<?=$surname?>"></p>
                                <label for="name"><b>Имя</b></label>
                                <p><input type="text" placeholder="Введите имя" name="name" maxlength="50" required value="<?=$name?>"></p>
                                <label for="birth_date"><b>Дата рождения</b></label>
                                <p><input type="date" name="birth_date" required value="<?=$birth_date?>"></p>
                                <label for="phone"><b>Телефон</b></label>
                                <p><input type="tel" placeholder="Введите номер телефона" name="phone" maxlength="12" required value="<?=$phone?>"></p>
                                <label for="email"><b>E-mail</b></label>
                                <p><input type="email" placeholder="Введите email" name="email" maxlength="50" required value="<?=$mail?>"></p>
                                <label for="work_place"><b>Место работы</b></label>
                                <br><br>
                                <?php echo combo('work_place', 'work_place','name') ?>
                                <br><br>
                                <label for="prof_degree"><b>Должность</b></label>
                                <br><br>
                                <?php echo combo('prof_degree', 'prof_degree','name') ?>
                                <p><?php if($result != true) echo $error; else echo'Данные отредактированы'?></p>
                                <p><input name ="edit" type="submit" class="btn" value="Сохранить изменения"></p>
                        </form>

</section>
        </content>
        <?php include 'templates/footer.tpl'; ?>
    </container>
</body>
</html>-->
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link href="/css/main.css" rel="stylesheet" type="text/css">
<link href="/css/mypersonaldata.css" rel="stylesheet" type="text/css">
<link rel="shortcut icon" href="../image/icon.png" type="image/png">
<title>WOT | World of teachers | Личные данные</title>
</head>
<body>
<container class="container">
<?php include 'templates/header.tpl'; ?>
<content class="content">
<?php include 'templates/aside.tpl'; ?>
<section class="section_mypersonaldata">
<div class="mypersonaldata">
<div class="icon">
<img class="mypersonaldata_image" src="../image/person_white.png">
</div>
<div class="text_data">
<p>Мои личные данные</p>
</div>
<div class="login">
<p>Логин: </p> <?php echo "<p class='user_login'>".$_COOKIE['user_login']."</p>"; ?>
</div>
</div>
<form class="form_edit" action="" method="post" enctype="multipart/form-data">
<div class="text_edit_top"><p>Редактировать</p></div>
<div class="text_edit_bottom">
<div class="text_edit_bottom_left">
<div class="text_edit_bottom_left_photo">
<label for="photo"><p>Фото</p></label>
<?php if ($photo == "") {?>
<div class="my_photo"><img src="/photos/person.png" name="photo" width="250px " height="200px"></p></div>
<?php } else { ?>
<div class="my_photo"><img src="<?= '/photos/'.$photo ?>" name="photo" width="250px " height="200px"></p></div>
<?php } ?>
<br><input type="file" name="file">
</div>
</div>
<div class="text_edit_bottom_right">
<label for="password"><p>Пароль</p></label>
<p><input class="enter" type="text" placeholder="Введите пароль" name="pass" maxlength="15" minlength="6" required value="<?=$password?>"></p>
<label for="surname"><p>Фамилия</p></label>
<p><input class="enter" type="text" placeholder="Введите фамилию" name="surname" maxlength="50" required value="<?=$surname?>"></p>
<label for="name"><p>Имя</p></label>
<p><input class="enter" type="text" placeholder="Введите имя" name="name" maxlength="50" required value="<?=$name?>"></p>
<label for="birth_date"><p>Дата рождения</p></label>
<p><input class="enter" type="date" name="birth_date" required value="<?=$birth_date?>"></p>
<label for="phone"><p>Телефон</p></label>
<p><input class="enter" type="tel" placeholder="Введите номер телефона" name="phone" maxlength="12" required value="<?=$phone?>"></p>
<label for="email"><p>E-mail</p></label>
<p><input class="enter" type="email" placeholder="Введите email" name="email" maxlength="50" required value="<?=$mail?>"></p>
<label for="work_place"><p>Место работы</p></label>
<?php echo combo('work_place', 'work_place','name') ?>
<br>
<label for="prof_degree"><p>Должность</p></label>
<?php echo combo('prof_degree', 'prof_degree','name') ?>
<p style="color: green;"><?php if($result != true) echo $error; else echo'Данные отредактированы'?></p>
<p><input name ="edit" type="submit" class="save_btn" value="Сохранить изменения"></p>
</div>
</div>
</form>
</section>
</content>
<?php include 'templates/footer.tpl'; ?>
</container>
</body>
</html>