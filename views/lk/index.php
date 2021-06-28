<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="/css/lk.css" rel="stylesheet" type="text/css">
    <link href="/css/main.css" rel="stylesheet" type="text/css">
    <link rel="shortcut icon" href="/image/icon.png" type="image/png">
    <title>WOT | World of teachers | Личный кабинет</title>
</head>
<body>
    <container class="container">
        <?php include 'templates/header.tpl'; ?>
        <content class="content">
            <?php include 'templates/aside.tpl'; ?>
            <section class="section_info">
                <div class="mypersonalinfo">
                    <div class="icon">
                        <img class="mypersonalinfo_img" src="../image/lk.png">
                    </div>
                    <div class="text_info">
                        <p>Личный кабинет</p>
                    </div>
                    <div class="login">
                        <p>Логин: </p> <?php echo "<p class='user_login'>".$_COOKIE['user_login']."</p>"; ?>
                    </div>
                </div>
                <div class="my_info">
                    <p>Добро пожаловать в личный кабинет!</p>
                </div>
            </section>
        </content>
        <?php include 'templates/footer.tpl'; ?>
    </container>
</body>
</html>




