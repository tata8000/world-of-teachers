<!--<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>WOT</title>
</head>
<body>
	<form action="" class="form-container" method="post">
                                <h1>Продолжаем регистрацию</h1>
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
                                <?php combo('work_place', 'work_place','name') ?>
                                <br><br>
                                <label for="prof_degree"><b>Должность</b></label>
                                <br><br>
                                <?php combo('prof_degree', 'prof_degree','name') ?>
                                <p>
                                     <input name ="back" type="button" value="Назад" onclick="location.href='/user/register'">
                                     <input name ="reg_con" type="submit" class="btn" value="Далее">
                                </p>
                        </form>
</body>
</html>-->

<?php

$title = "WOT | World of teachers | Продолжение регистрации";

$location = "location.href='/user/register'";

$registration_text = "<h1 class='reg_con'>Продолжение регистрации</h1>";

$registration = "<label for='surname'><p>Фамилия</p></label>
                 <p><input class='enter' type='text' placeholder='Введите фамилию' name='surname' maxlength='50' required value='$surname'></p>
                 <label for='name'><p>Имя</p></label>
                 <p><input class='enter' type='text' placeholder='Введите имя' name='name' maxlength='50' required value='$name'></p>
                 <label for='birth_date'><p>Дата рождения</p></label>
                 <p><input class='enter' type='date' name='birth_date' required value='$birth_date'></p>
                 <label for='phone'><p>Телефон</p></label>
                 <p><input class='enter' type='tel' placeholder='Введите номер телефона' name='phone' maxlength='12' required value='$phone'></p>
                 <label for='email'><p>E-mail</p></label>
                 <p><input class='enter' type='email' placeholder='Введите E-mail' name='email' maxlength='50' required value='$mail'></p>
                 <label for='work_place'><p>Место работы</p></label>
                 ".
                  combo('work_place', 'work_place','name')
                  ."<label for='prof_degree'><p>Должность</p></label>".
                 combo('prof_degree', 'prof_degree','name')
                 ."<p><input name ='reg_con' type='submit' class='registration_btn' value='Далее'></p>";

include 'templates/registration.tpl';

