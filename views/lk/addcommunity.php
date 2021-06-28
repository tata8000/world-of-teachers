<!--<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="/css/main.css" rel="stylesheet" type="text/css">
    <link href="/css/pagination.css" rel="stylesheet" type="text/css">
    <link rel="shortcut icon" href="/image/icon.png" type="image/png">
    <title>WOT | World of teachers | Личный кабинет</title>
</head>
<body>
    <container class="container">
        <?php include 'templates/header.tpl'; ?>
        <content class="content">
            <?php include 'templates/aside.tpl'; ?>
            <section class="section">
                <section>
                    <form action="" method="POST">
                    <label for='new_topic'><p>Обсуждение</p></label>
                    <input name="new_topic" type="text" placeholder="Введите название обсуждения" required />
                    <label for='message'><p>Текст сообщения</p></label>
                    <textarea name="message" placeholder="Введите первое сообщение" required></textarea>
                    <p><input name="post_topic" type="submit" value="Добавить" /></p>
                    </form>
                </section>
                
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
<link href="/css/adddeletepub.css" rel="stylesheet" type="text/css">
<link rel="shortcut icon" href="/image/icon.png" type="image/png">
<title>WOT | World of teachers | Добавить тему обсуждения</title>
</head>
<body>
<container class="container">
<?php include 'templates/header.tpl'; ?>
<content class="content">
<?php include 'templates/aside.tpl'; ?>
<section class="section_topic">
<div class="topics">
<div class="back_ago">
<img class="ago" src="/image/ago.png" name="back" type="image" onclick="location.href='/lk/communities/page-1'">
</div>
<div class="text_addtopic">
<p>Добавить тему обсуждения</p>
</div>
<div class="login">
<p>Логин: </p> <?php echo "<p class='user_login'>".$_COOKIE['user_login']."</p>"; ?>
</div>
</div>
<div class="addtopic">
<div style="margin: auto;">
<form action="" method="POST">
<p><label for='new_topic'>Тема обсуждения</label></p>
<p><input class="newtopic" name="new_topic" type="text" placeholder="Введите название обсуждения" required /></p>
<p><label for='message'>Текст сообщения</label></p>
<p><textarea name="message" placeholder="Введите первое сообщение" required></textarea></p>
<div style="display: flex; justify-content: center;"><p><input class="sub_add" name="post_topic" type="submit" value="Добавить" /></p></div>
</form>
</div>
</div>
</section>
</content>
<?php include 'templates/footer.tpl'; ?>
</container>
</body>
</html>