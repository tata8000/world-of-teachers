<?php

class SiteController {
    
    public function actionIndex()
    {
        require_once (ROOT.'/views/site/index.php');
        
        return true;
    }
    
    public function actionAbout()
    {
        require_once (ROOT.'/views/site/about.php');
        
        return true;
    }
    
     public function actionSupport()
    {
         
        if(isset($_REQUEST['send_mail'])) 
        {
            $mail = $_REQUEST['email'];
            $text = $_REQUEST['message'];
            
    // Файлы phpmailer
    require 'phpmailer/PHPMailer.php';
    require 'phpmailer/SMTP.php';
    require 'phpmailer/Exception.php';

    // Формирование самого письма
    $title = "Вопросы по работе с сайтом";
    $body = "Сообщение:<br>$text<br>От $mail";
    
    // Настройки PHPMailer
    $mail = new PHPMailer\PHPMailer\PHPMailer();
    try {
        $mail->isSMTP();   
        $mail->CharSet = "UTF-8";
        $mail->SMTPAuth   = true;
        $mail->Debugoutput = function($str, $level) {$GLOBALS['status'][] = $str;};

        // Настройки почты
        $mail->Host       = 'smtp.mail.ru'; // SMTP сервера вашей почты
        $mail->Username   = 'polina.silkina.00@mail.ru'; // Логин на почте
        $mail->Password   = 'p5161071336'; // Пароль на почте
        $mail->SMTPSecure = 'ssl';
        $mail->Port       = 465;
        $mail->setFrom('polina.silkina.00@mail.ru', 'Пользователь'); // Адрес самой почты и имя отправителя

        // Получатель письма
        $mail->addAddress('polina.silkina.00@mail.ru'); 
       
    // Отправка сообщения
    $mail->isHTML(true);
    $mail->Subject = $title;
    $mail->Body = $body;    

    // Проверяем отравленность сообщения
    if ($mail->send()) 
        {
            $errors = "<p>Сообщение успешно отправлено</p>";    
        } 
    else 
        {
            $errors = "<p>Произошла ошибка отправки данных</p>";
        }
    } catch (Exception $e) {
        $errors = "<p>Произошла ошибка отправки данных</p>";
    }
        }
        
        
        require_once (ROOT.'/views/site/support.php');
        
        return true;
    }
}
