<!--<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="/css/main.css" rel="stylesheet" type="text/css">
    <link rel="shortcut icon" href="/image/icon.png" type="image/png">
    <title>WOT | World of teachers | Личный кабинет</title>
</head>
<body>
    <container class="container">
        <?php include 'templates/header.tpl'; ?>
        <content class="content">
            <?php include 'templates/aside.tpl'; ?>
            <section class="section">
<?php
//$pathToFile = ROOT . '/'.$publishingItem['pub_link'];
//echo "<br><br><br>";
//$lines = file($pathToFile);
//// Осуществим проход массива и выведем содержимое в виде HTML-кода вместе с номерами строк.
//foreach ($lines as $line_num => $line) {
//    echo  htmlspecialchars($line) . "<br />\n";
//}
//?>
                <a href='/<?php echo mb_substr(trim($_SERVER['REQUEST_URI'], '/'), 0, -2); ?>'>Назад</a>      
        <iframe src = "/ViewerJS/#../<?php echo $publishingItem['pub_link'] ?>" style="margin: 10px auto" width = '80%' height = '600' allowfullscreen webkitallowfullscreen> </iframe>
</section>
        </content>
        <?php include 'templates/footer.tpl'; ?>
    </container>
</body>
</html>-->
<!DOCTYPE html>
<!--<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link href="/css/main.css" rel="stylesheet" type="text/css">
<link rel="shortcut icon" href="/image/icon.png" type="image/png">
<title>WOT | World of teachers | Мои публикации</title>
</head>
<body>
<container class="container">
<?php include 'templates/header.tpl'; ?>
<content class="content">
<?php include 'templates/aside.tpl'; ?>
<section class="section_pub">
<?php
//$pathToFile = ROOT . '/'.$publishingItem['pub_link'];
//echo "<br><br><br>";
//$lines = file($pathToFile);
//// Осуществим проход массива и выведем содержимое в виде HTML-кода вместе с номерами строк.
//foreach ($lines as $line_num => $line) {
// echo htmlspecialchars($line) . "<br />\n";
//}
//?>
<div style="display: flex; display: flex; margin: 10px; min-height: 66vh; justify-content: flex-start;"><img style="width: 25px; height: 25px; cursor: pointer;" src="/image/ago_black.png" name="back" type="image" onclick="location.href='/<?php echo mb_substr(trim($_SERVER['REQUEST_URI'], '/'), 0, -2); ?>'"></div>
<div style="display: flex; flex-basis: 90%;"><iframe src = "/ViewerJS/#../<?php echo $publishingItem['pub_link'] ?>" style="margin: 10px auto" width = '80%' height = '400' allowfullscreen webkitallowfullscreen> </iframe></div>
</section>
</content>
<?php include 'templates/footer.tpl'; ?>
</container>
</body>
</html>
-->
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link href="/css/main.css" rel="stylesheet" type="text/css">
<link href="/css/lk.css" rel="stylesheet" type="text/css">
<link rel="shortcut icon" href="/image/icon.png" type="image/png">
<title>WOT | World of teachers | <?php echo $publishingItem['name']; ?></title>
</head>
<body>
<container class="container">
<?php include 'templates/header.tpl'; ?>
<content class="content">
<?php include 'templates/aside.tpl'; ?>
<section class="section_pub">
<?php
//$pathToFile = ROOT . '/'.$publishingItem['pub_link'];
//echo "<br><br><br>";
//$lines = file($pathToFile);
//// Осуществим проход массива и выведем содержимое в виде HTML-кода вместе с номерами строк.
//foreach ($lines as $line_num => $line) {
// echo htmlspecialchars($line) . "<br />\n";
//}
//?>
<div style="display: flex; display: flex; margin: 10px; min-height: 66vh; justify-content: flex-start;"><img style="width: 25px; height: 25px; cursor: pointer;" src="/image/ago_black.png" name="back" type="image" onclick="location.href='/<?php echo mb_substr(trim($_SERVER['REQUEST_URI'], '/'), 0, -2); ?>'"></div>
<div style="display: flex; flex-basis: 90%;"><iframe src = "/ViewerJS/#../<?php echo $publishingItem['pub_link'] ?>" style="margin: 10px auto" width = '80%' height = '400' allowfullscreen webkitallowfullscreen> </iframe></div>
</section>
</content>
<?php include 'templates/footer.tpl'; ?>
</container>
</body>
</html>
Файл не выбран
Ещё

