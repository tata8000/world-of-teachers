<?php

$title = "WOT | World of teachers | Авторизация";

$location = "location.href='/'";

$registration_text = "<h1>Авторизация</h1>";

$registration = "<label for='login'><p>Логин</p></label>
                 <p><input class='enter' type='text' placeholder='Введите логин' name='login' maxlength='50' minlength='5' required value=''></p>
                 <label for='password'><p>Пароль</p></label>
                 <p><input class='enter' type='password' placeholder='Введите пароль' name='password' maxlength='15' minlength='6' required value=''></p>
                 $errors
                 <p><input class='registration_btn' name='entrance' type='submit' class='btn' value='Войти'></p>";

include 'templates/registration.tpl';

