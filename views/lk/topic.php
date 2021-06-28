<!--<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link href="/css/pagination.css" rel="stylesheet" type="text/css">
<link href="/css/main.css" rel="stylesheet" type="text/css">
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
<p><a href="/lk/communities/page-<?php echo $page ?>/<?php echo $topicItem['id'] ?>" class="<?php if($topicId == $topicItem['id']) echo 'active'?>"><?php echo $topicItem['name'] ?></a></p>
<?php endforeach; ?>
<?php echo $pagination->get(); ?>
<p><a href="/lk/communities/addcommunity">Добавить тему обсуждения</a>
<p><a href="/lk/communities/deletecommunity">Удалить тему обсуждения</a>
</section>


<section id="element" style="overflow: auto; height: 50vh;">
<?php if (count($topicMessages) != 0):
foreach ($topicMessages as $messageItem): ?>
<div style="border: solid 1px black; margin-bottom: 10px; width: 150px;" class="<?php if($messageItem['user_id'] == $_COOKIE['user_id']) echo 'my_mes'?>">
<p> <?php echo $messageItem['text'] ?></p>
</div>
<?php endforeach; ?>
<form action="" method="POST">
<input type="text" name="mes_text" required />
<input type="submit" name="send_mes" />
</form>
<?php endif; ?>
</section>


<script>
element.scrollTop = element.scrollHeight;
</script>
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
<link href="/css/pagination.css" rel="stylesheet" type="text/css">
<link href="/css/chats.css" rel="stylesheet" type="text/css">
<link href="/css/main.css" rel="stylesheet" type="text/css">
<link rel="shortcut icon" href="/image/icon.png" type="image/png">
<title>WOT | World of teachers | Обсуждения</title>
</head>
<body link="black" vlink="black" alink="black" bgcolor="black">
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
<p><a href="/lk/communities/page-<?php echo $page ?>/<?php echo $topicItem['id'] ?>" class="<?php if($topicId == $topicItem['id']) { echo 'active'; }?>"><?php echo $topicItem['name'] ?></a></p>
<?php endforeach; ?>
</div>
<div class="lenta">
<?php echo $pagination->get(); ?>
</div>
</div>
<div class="message">
<div class="block_mess" id="element">
<?php if (count($topicMessages) != 0):
foreach ($topicMessages as $messageItem): ?>
<div id="mes" class="<?php if($messageItem['user_id'] == $_COOKIE['user_id']) echo 'my_mes'?>">
<p class="who"><?php
$d = date_create($messageItem['send_date']);
$user = User::getUserById($messageItem['user_id']);
echo date_format($d, "d.m.Y H:i:s")." ".$user['name']." ".$user['surname'];?></p>
<p><?php echo $messageItem['text'] ?></p>
</div>
<?php endforeach; ?>
</div>
<div class="form">
<form class="form_1" action="" method="POST">
<input class="enter_mess" type="text" name="mes_text"

required placeholder="Введите сообщение"/>
<input class="send_sub" type="submit" name="send_mes" />
</form>
</div>
<?php endif; ?>
</div>
</div>
<script>element.scrollTop = element.scrollHeight;</script>
</section>
</content>
<?php include 'templates/footer.tpl'; ?>
</container>
</body>
</html>