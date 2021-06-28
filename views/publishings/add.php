<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css"/>
<link rel="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.13/css/bootstrap-multiselect.css" type="text/css"/>
<link href="/css/main.css" rel="stylesheet" type="text/css">
<link href="/css/adddeletetopics.css" rel="stylesheet" type="text/css">
<link rel="shortcut icon" href="/image/icon.png" type="image/png">
<title>WOT | World of teachers | Добавить публикацию</title>
</head>
<body>
<container class="container">
<?php include 'templates/header.tpl'; ?>
<content class="content">
<?php include 'templates/aside.tpl'; ?>
<section class="section_topic">
<div class="topics">
<div class="back_ago">
<img class="ago" src="/image/ago.png" name="back" type="image" onclick="location.href='/lk/mypublishings'">
</div>
<div class="text_addtopic">
<p>Добавить публикацию</p>
</div>
<div class="login">
<p>Логин: </p> <?php echo "<p class='user_login'>".$_COOKIE['user_login']."</p>"; ?>
</div>
</div>
<div class="addtopic">
<div>
<form enctype="multipart/form-data" action=""

method="POST">
<label class="label" for="pub_name"><p>Название публикации</p></label>
<p><input style="min-width: 300px;" type="text" name="pub_name" maxlength='100' placeholder="Введите название публикации" required/></p>
<input class="uploadfile" type="file" name="uploadfile" required accept=".pdf"/>
<div>
<?php
$multipleSelect = "<p><select id='my_interests' multiple name='choose_interest[]' required>";
foreach ($subjectsList as $subjectItem):
$multipleSelect .= "<optgroup label='".$subjectItem['name']."'>";

$interestsList = Interests::getInteresrtsListBySubjectId($subjectItem['id']);

foreach ($interestsList as $interestItem){
$multipleSelect .= "<option value='".$interestItem['id']."'>".$interestItem['name']."</option>";
}
$multipleSelect .= "</optgroup>";
endforeach;
$multipleSelect .= "</select>";
echo $multipleSelect;
?>
</div>
<input class="upload" name="sub" type="submit" value="Загрузить прикрепленный файл">
</form>
</div>
</div>
</section>
</content>
<?php include 'templates/footer.tpl'; ?>
</container>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.13/js/bootstrap-multiselect.js"></script>

<script>
$(document).ready(function() {
$('#my_interests').multiselect();
});</script>

</body>
</html>