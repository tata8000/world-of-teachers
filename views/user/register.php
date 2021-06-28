<?php

$title = "WOT | World of teachers | Регистрация";

$location = "location.href='/'";

$registration_text = "<h1>Регистрация</h1>";

if(isset($errors)) {
    $registration = "<label for='login'><p>Логин</p></label>
                     <p><input class='enter' type='text' placeholder='Введите логин' name='log' maxlength='50' minlength='5' required value='$login'></p>
                     <label for='password'><p>Пароль</p></label>
                     <p><input class='enter' type='password' placeholder='Введите пароль' name='pass' maxlength='15' minlength='6' required value='$pass'></p>".
                     $errors
                     ."<p><input name ='reg' type='submit' class='registration_btn' value='Зарегистрироваться'></p>";
}

include 'templates/registration.tpl';

