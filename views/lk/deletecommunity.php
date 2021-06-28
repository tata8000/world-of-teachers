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
                    <p> Мои обсуждения</p>
                    <form action="" method="POST">
                        <?php
                            check ('del_top[]', 'discussion_topic', 'name')
                         ?>
                        <input name="del_topic" type="submit" value="Удалить" />
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
<title>WOT | World of teachers | Удалить тему обсуждения</title>
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
<p>Удалить тему обсуждения</p>
</div>
<div class="login">
<p>Логин: </p> <?php echo "<p class='user_login'>".$_COOKIE['user_login']."</p>"; ?>
</div>
</div>
<div class="addtopic">
<div style="margin: auto;">
<p style="text-align: center; font-family: 'Markella', 'Times New Roman', serif; font-size: 13pt;">Мои обсуждения</p>
<form style="text-align: center; font-family: 'Markella', 'Times New Roman', serif; font-size: 13pt;" action="" method="POST">
<?php
check ('del_top[]', 'discussion_topic', 'name')
?>
<div style="display: flex; justify-content: center;"><p><input class="sub_add" name="del_topic" type="submit" value="Удалить" /></p></div>
</form>
</div>
</div>
</section>
</content>
<?php include 'templates/footer.tpl'; ?>
</container>
</body>
</html>