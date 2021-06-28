<!--<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="/css/main.css" rel="stylesheet" type="text/css">
    <link href="/css/pagination.css" rel="stylesheet" type="text/css">
    <link rel="shortcut icon" href="../image/icon.png" type="image/png">
    <title>WOT | World of teachers | Личный кабинет</title>
</head>
<body>
    <container class="container">
        <?php include 'templates/header.tpl'; ?>
        <content class="content">
            <?php include 'templates/aside.tpl'; ?>
            <section class="section">
                <section>
                <?php foreach ($topics as $topicItem): ?>
                <p><a href="/lk/communities/page-<?php echo $page ?>/<?php echo $topicItem['id'] ?>"><?php echo $topicItem['name'] ?></a></p>
                
                
                <?php endforeach; ?>
                
                <?php echo $pagination->get(); ?>
                <p><a href="/lk/communities/addcommunity">Добавить тему обсуждения</a>
                    <p><a href="/lk/communities/deletecommunity">Удалить тему обсуждения</a>
                </section>
                
                </section>
        </content>
        <?php include 'templates/footer.tpl'; ?>
    </container>
</body>
</html>-->
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link href="/css/main.css" rel="stylesheet" type="text/css">
<link href="/css/chats.css" rel="stylesheet" type="text/css">
<link href="/css/pagination.css" rel="stylesheet" type="text/css">
<link rel="shortcut icon" href="/image/icon.png" type="image/png">
<title>WOT | World of teachers | Обсуждения</title>
</head>
<body>
<container class="container">
<?php include 'templates/header.tpl'; ?>
<content class="content">
<?php include 'templates/aside.tpl'; ?>
<section class="section_topic">
<div class="topics">
<div class="icon">
<img class="topic_image" src="/image/chat_white.png">
</div>
<div class="add_delete">
<div class="text_topic">
<p>Обсуждения</p>
</div>
<div class="add_topic">
<img class="cross_topic_image" src="/image/cross.png" name="addtopic" type="image" title="Добавить тему обсуждение" onclick="location.href='/lk/communities/addcommunity'">
</div>
<div class="delete_topic">
<img class="cross_topic_image" src="/image/rubbish.png" name="addtopic" type="image" title="Удалить тему обсуждение" onclick="location.href='/lk/communities/deletecommunity'">
</div>
</div>
<div class="login">
<p>Логин: </p> <?php echo "<p class='user_login'>".$_COOKIE['user_login']."</p>"; ?>
</div>
</div>
<div class="chats">
<div class="global_question">
<div class="questions">
<?php foreach ($topics as $topicItem): ?>
<p><a href="/lk/communities/page-<?php echo $page ?>/<?php echo $topicItem['id'] ?>"><?php echo $topicItem['name'] ?></a></p>
<?php endforeach; ?>
</div>
<div class="lenta">
<?php echo $pagination->get(); ?>
</div>
</div>
<div class="empty_message">
<a class="cross_black_topic_image" name="addtopic" type="image" title="Добавить тему обсуждение" onclick="location.href='/lk/communities/addcommunity'">Добавьте новую тему обсуждения</a>
</div>
</div>
</section>
</content>
<?php include 'templates/footer.tpl'; ?>
</container>
</body>
</html>