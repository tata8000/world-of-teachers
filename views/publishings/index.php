<!--<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
    <?php foreach ($publishingsList as $publishingItem):?>
    <div class="my_publishings">
        <div class="publishing">
            <div class="publishing_p">
                <p><?php echo $publishingItem['name']; ?></p>
            </div>
        </div>
        <div class="viewing">
            <ul>
                <li><a href="/lk/mypublishings/<?php echo $publishingItem['id']; ?>" title="Посмотреть">Посмотреть</a></li>
            </ul>
        </div>
    </div>
    <?php endforeach; ?>
    
    <a href="/lk/mypublishings/addpublication">Добавить публикацию</a>
</section>
        </content>
        <?php include 'templates/footer.tpl'; ?>
    </container>
</body>
</html>

-->
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<?php if ($_SERVER['REQUEST_URI'] == '/lk/mypublishings') { ?>
<link href="/css/publishingstopic.css" rel="stylesheet" type="text/css">
<?php } else { ?>
<link href="/css/publishingstopic.css" rel="stylesheet" type="text/css">
<link href="/css/lk.css" rel="stylesheet" type="text/css">
<?php } ?>
<link href="/css/main.css" rel="stylesheet" type="text/css">
<link rel="shortcut icon" href="/image/icon.png" type="image/png">
<title>WOT | World of teachers | <?php echo $title; ?></title>
</head>
<body>
<container class="container">
<?php include 'templates/header.tpl'; ?>
<content class="content">
<?php include 'templates/aside.tpl'; ?>
<section class="section_mypublishings">
<div class="mypublishings_top">
<div class="icon">
<img class="mypublishings_image" src="/image/my_publishings_white.png">
</div>
<div class="text_mypublishings">
<div class="text_mypublishings_text"><p><?php echo $title; ?></p></div>
<?php if($add):?>
<div class="text_mypublishings_image"><img class="cross_mypublishings_image" src="/image/cross.png" name="addpublication" type="image" title="Добавить публикацию" onclick="location.href='/lk/mypublishings/addpublication'"></div>
<div class="delete_topic" style="margin-left: 20px">
<img class="cross_mypublishings_image" src="/image/rubbish.png" name="addtopic" type="image" title="Удалить публикацию" onclick="location.href='/lk/mypublishings/deletepublication'">
</div>
<?php endif;?>
</div>
<div class="login">
<p>Логин: </p> <?php echo "<p class='user_login'>".$_COOKIE['user_login']."</p>"; ?>
</div>
</div>
<div class="mypublishings_bottom">
<?php foreach ($publishingsList as $publishingItem):?>
<div class="my_publishings">
<div class="publishing">
<div class="publishing_p">
<p><?php echo $publishingItem['name']; ?></p>
</div>
</div>
<div class="viewing">
<ul>
<li><a href="/<?php echo trim($_SERVER['REQUEST_URI'], '/').'/'.$publishingItem['id']; ?>" title="Посмотреть">Посмотреть</a></li>
</ul>
</div>
</div>
<?php endforeach; ?>
</div>
</section>
</content>
<?php include 'templates/footer.tpl'; ?>
</container>
</body>
</html>