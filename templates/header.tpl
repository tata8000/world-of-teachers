<?php
    include_once ROOT. '/models/User.php';
?>
<header class="header">
    <div class="logo">
        <img class="logo_image" src="/image/logo.png">
    </div>
    <div class="info">
        <ul>
            <?php if(User::isGuest()){?>
            <li><a href="/" title="Главная">Главная</a></li>
            <?php }?>
            <li><a href="/about" title="О нас">О нас</a></li>
            <li><a href="/support" title="Поддержка">Поддержка</a></li>
            <?php if(User::isGuest()){?>
            <li><a href="/user/authorization" title="Войти">Войти >></a></li>
            <?php } else { ?>
            <li><a href="/lk" title="Личный кабинет">Личный кабинет</a></li>
            <li><a href="/user/exit" title="Выйти"><img class="output" src="/image/output.png"></a></li>
            <?php } ?>
        </ul>
    </div>
</header>