<!--<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css/main.css" rel="stylesheet" type="text/css">
    <link rel="shortcut icon" href="../image/icon.png" type="image/png">
    <title>WOT | World of teachers | Личный кабинет</title>
</head>
<body>
    <container class="container">
        <?php include 'templates/header.tpl'; ?>
        <section class="section">
                Обратная связь
                <p>Есть вопрос? Напишите нам</p>
                <form action="" method="POST">
                    <label for='email'><p>Ваша почта</p></label>
                    <input name="email" type="email" placeholder="E-mail" required />
                    <label for='message'><p>Сообщения</p></label>
                    <textarea name="message" placeholder="Сообщение" required></textarea>
                    <?php if(isset($errors)) echo $errors;?>
                    <p><input name="send_mail" type="submit" value="Отправить" /></p>
                    </form>
               
            </section>
         <?php include 'templates/footer.tpl'; ?>
    </container>
</body>
</html>-->
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link href="css/main.css" rel="stylesheet" type="text/css">
<link href="css/support.css" rel="stylesheet" type="text/css">
<link href="css/form.css" rel="stylesheet" type="text/css">
<link rel="shortcut icon" href="../image/icon.png" type="image/png">
<title>WOT | World of teachers | Поддержка</title>
</head>
<body>
<container class="container">
<?php include 'templates/header.tpl'; ?>
<section class="section_FAQ">
<div class="text_FAQ">
<p>Возникла проблема? Вы можете обратиться к часто задаваемым вопросам или отправить сообщение нам в поддержку, заполнив форму ниже.</p>
</div>
<div class="FAQ">
<div class="faq-section">
<input type="checkbox" id="q1">
<label for="q1">Вопрос 1?</label>
<p>Ответ 1!</p>
</div>
<div class="faq-section">
<input type="checkbox" id="q2">
<label for="q2">Вопрос 2?</label>
<p>Ответ 2!</p>
</div>
<div class="faq-section">
<input type="checkbox" id="q3">
<label for="q3">Вопрос 3?</label>
<p>Ответ 3!</p>
</div>
<div class="faq-section">
<input type="checkbox" id="q4">
<label for="q4">Вопрос 4?</label>
<p>Ответ 4!</p>
</div>
<div class="faq-section">
<input type="checkbox" id="q5">
<label for="q5">Вопрос 5?</label>
<p>Ответ 5!</p>
</div>
</div>
<div class="support_FAQ">
<a href="#"><img class="support_image openmodal" src="/image/support.png"></a>

<div class="modal" aria-hidden="true">
<form class="modal-dialog" action="" method="POST">
<div class="modal-header">
<h2>Поддержка</h2>
<a href="#" class="btn-close closemodal" aria-hidden="true">&times;</a>
</div>
<div class="modal-body">
<label for='email'><p>Ваша почта</p></label>
<input class="email" name="email" type="email" placeholder="Введите почту" required />
<label for='message'><p>Сообщение</p></label>
<textarea name="message" placeholder="Введите сообщение..." required></textarea>
<?php if(isset($errors)) echo $errors;?>
</div>
<div class="modal-footer">
<p><input class="sub_add" name="send_mail" type="submit" value="Отправить" /></p>
</div>
</form>
</div>
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="js/form.js"></script>
</div>
</section>
<?php include 'templates/footer.tpl'; ?>
</container>
</body>
</html>