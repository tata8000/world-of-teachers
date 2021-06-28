<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="/chatbot/chatbot.css">
<link href="../css/interests.css" rel="stylesheet" type="text/css">
<link href="../css/main.css" rel="stylesheet" type="text/css">
<link rel="shortcut icon" href="../image/icon.png" type="image/png">
<title>WOT | World of teachers | Профессиональные интересы</title>
</head>
<body>
<container class="container">
<?php include 'templates/header.tpl'; ?>
<content class="content">
<?php include 'templates/aside.tpl'; ?>
<section class="section_interest">
<div class="head">
<div class="icon">
<img class="interest_image" src="../image/other_publishings_white.png">
</div>
<div class="text_interest">
<p>Профессиональные интересы</p>
</div>
<div class="login">
<p>Логин: </p> <?php echo "<p class='user_login'>".$_COOKIE['user_login']."</p>"; ?>
</div>
</div>
<div class="tema">
<?php
foreach ($subjectsList as $subjectItem):
echo "<p class='subjectItem'>".$subjectItem['name']."</p>";

$interestsList = Interests::getInteresrtsListBySubjectId($subjectItem['id']);

foreach ($interestsList as $interestItem){
echo "<p class='interestItem'><a href='/lk/myinterests/publishings_interest_id-".$interestItem['id']."'>".$interestItem['name']."</a></p>";
}
endforeach;
?>
</div>
</section>
             <div class="chatbot__btn">
  <div class="chatbot__tooltip d-none">Есть вопрос?</div>
</div>
</content>
<?php include 'templates/footer.tpl'; ?>
</container>
    <?php 
        $answer = "";
        $count = count($subjectsList);
        for ($j = 4; $j < $count+4; $j++)
        {
            $answer .= "$j, ";
        }
        $answer = mb_substr($answer, 0, -2);
?>
<!-- FingerPrint JS -->
<script src="/chatbot/fp2.js"></script>
<!-- ChatBot JS -->
<script src="/chatbot/chatbot.js"></script>
<script>
    // конфигурация чат-бота
const configChatbot = {};
// CSS-селектор кнопки, посредством которой будем вызывать окно диалога с чат-ботом
configChatbot.btn = '.chatbot__btn';
// ключ для хранения отпечатка браузера
configChatbot.key = 'fingerprint';
// реплики чат-бота
configChatbot.replicas = {
  bot: {
    0: { content: 'Привет! Я WOT - бот поддержки сайта <a href="/" target="_blank">Worlds of Teachers</a>', human: [0, 1, 2] },
    1: { content: 'Я тоже рад, как мне к Вам обращаться', human: [3] },
    2: { content: 'Как мне к Вам обращаться?', human: [3] },
    3: { content: '{{name}}, какая область Вас интересует?', human:  [<?php echo $answer?>]},
    <?php 
    $y = 4;
    $i = 4;
        foreach ($subjectsList as $subjectItem) {
            $address = $count+$i;
            $id = $subjectItem['id'];
            $interestsList = Interests::getInteresrtsListBySubjectId($id);
            $count_item = count($interestsList);
            $i += $count_item-1;
            $offset = "";
            for($x=$address; $x<$address+$count_item; $x++)
            {
                $offset .= $x.", ";
            }
            $offset = mb_substr($offset, 0, -2);
            $i++;
            echo "$y: { content: '{{name}}, выберите тему', human: [$offset]}," ;
            $y++;
        }
        $all = $y+$total_interest;
        $pos = strripos($offset, ' ');
        $offset = substr($offset, $pos);
        for($r = $y; $r < $all; $r++)
        {
            $start = $offset + 1;
            $end = $offset + 2;
            echo "$r: { content: 'Какую информацию Вы бы хотели получить?', human: [$start, $end]},";
            $offset+=2;
        }
        $all = $r + $total_interest*2;
        $q = 0;
        $offset +=1;
        for($z = $r; $z < $all; $z++)
        {
            $content = "";
            if($z % 2 == 1)
            {
                $id = $z - $total_interest - $count - 3 - $q;
                $conferenceIds = Conferences::getConferencesIdsByInterestId($id);
                $in = implode(',',$conferenceIds);
                if($in=="") $in = 0;
                $conferenceList = Conferences::getConferencesListByIds($in);
                $content = "$z: { content: 'Найденные конференции:  ";
                foreach ($conferenceList as $conferenceItem)
                {
                    $text = '<a href="'.$conferenceItem['conf_link'].'" target="_blank">'.$conferenceItem['name']."</a>, ";
                    $content .= $text;
                }
                $content = mb_substr($content, 0, -2);
                $content .= "', human: [$offset]},";
                echo $content;
                $q++;
            }
            else 
            {
                $id = $z - $total_interest - $count - 3 - $q;
                $courseIds = Courses::getCoursesIdsByInterestId($id);
                $in = implode(',',$courseIds);
                if($in=="") $in = 0;
                $coursesList = Courses::getCoursesListByIds($in);
                $content = "$z: { content: 'Найденные курсы:  ";
                foreach ($coursesList as $courseItem)
                {
                    $text = '<a href="'.$courseItem['course_link'].'" target="_blank">'.$courseItem['name']."</a>, ";
                    $content .= $text;
                }
                $content = mb_substr($content, 0, -2);
                $content .= "', human: [$offset]},";
                echo $content;
            }
        }
    ?>
  },
  human: {
    0: { content: 'Привет! Я рад с тобой познакомиться', bot: 1 },
    1: { content: 'Добрый день!', bot: 2 },
    2: { content: 'Здравствуй, WOT!', bot: 2 },
    3: { content: '', bot: 3, name: 'name' },
    <?php 
        $i = 4;
        $j = $i;
        $ad = 0;
        foreach ($subjectsList as $subjectItem) {
            echo "$i: { content: '".$subjectItem['name']."', bot: $i },";
            
            $interestsList = Interests::getInteresrtsListBySubjectId($subjectItem['id']);
            
            
            foreach ($interestsList as $interestItem){
                $ad = $j + $count;
                echo "$ad: { content: '".$interestItem['name']."', bot: $ad},";
                $j++;
            } 
            $i++;
        }
        $ad++;
        for($z = 0; $z < $total_interest; $z++)
        {
            $start1 = $ad;
            $start2 = $ad + 1;
            echo "$ad: { content: 'Просмотреть конференции', bot: $start1},";
            echo $ad+1 .": { content: 'Просмотреть курсы', bot: $start2},";
            $ad += 2;
        }
        echo "$ad: { content: 'В начало', bot: 3},";
    ?>
    /* ... */
  }
}
// корневой элемент
configChatbot.root = SimpleChatbot.createTemplate();
// URL chatbot.php
configChatbot.url = '/chatbot/chatbot.php';
// создание SimpleChatbot
let chatbot = new SimpleChatbot(configChatbot);
// при клике по кнопке configChatbot.btn
document.querySelector(configChatbot.btn).onclick = function (e) {
  this.classList.add('d-none');
  const $tooltip = this.querySelector('.chatbot__tooltip');
  if ($tooltip) {
    $tooltip.classList.add('d-none');
  }
  configChatbot.root.classList.toggle('chatbot_hidden');
  chatbot.init();
};
// добавление ключа для хранения отпечатка браузера в LocalStorage
let fingerprint = localStorage.getItem(configChatbot.key);
if (!fingerprint) {
  Fingerprint2.get(function (components) {
    fingerprint = Fingerprint2.x64hash128(components.map(function (pair) {
      return pair.value
    }).join(), 31)
    localStorage.setItem(configChatbot.key, fingerprint)
  });
}
</script>

</body>
</html>

