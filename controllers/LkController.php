<?php

class LkController {
    
    public function actionIndex()
    {
        $userId = User::checkLogged();
        
        require_once(ROOT.'/views/lk/index.php');
        
        return true;
    }
    
    
    public function actionMycommunities($page = 1)
    {
        $userId = User::checkLogged();
        
        $topics = array();
        $topics = Topics::getTopicsList($page);
        
        $total = Topics::getTotalTopics();
        
        $pagination = new Pagination($total, $page, Topics::SHOW_BY_DEFAULT, 'page-');
        
        require_once(ROOT.'/views/lk/communities.php');
        
        return true;
    }
    
    public function actionCommunity($page = 1, $topicId)
    {
        $userId = User::checkLogged();
        
        $topics = array();
        $topics = Topics::getTopicsList($page);
        
        
        $end = Topics::SHOW_BY_DEFAULT * $page;
        $start = $end - Topics::SHOW_BY_DEFAULT + 1;
        
        
        $topicMessages = array();
        $topicNum = Topics::getTopicNumById($topicId);
        
        if($topicNum>=$start AND $topicNum<=$end)
        $topicMessages = Messages::getMessageListByTopic($topicId);
        
        $total = Topics::getTotalTopics();
        
        $pagination = new Pagination($total, $page, Topics::SHOW_BY_DEFAULT, 'page-');
        
        if(isset($_REQUEST['send_mes']))
        {
            date_default_timezone_set('Europe/Moscow');
            $text = $_REQUEST['mes_text'];
            $date = date("Y-m-d H:i:s");
            
            $result = Messages::sendMessage($topicId, $_COOKIE['user_id'], $text, $date);
            
            
            header( "refresh:0;" );
        }
        
        require_once(ROOT.'/views/lk/topic.php');
        
        return true;
    }

    public function actionAddCommunity()
    {
        $userId = User::checkLogged();
        
        if(isset($_REQUEST['post_topic']))
        {
            $topic = $_REQUEST['new_topic'];
            $message = $_REQUEST['message'];
            $date = date("Y-m-d");
            
            $result = Topics::addTopic($topic, $_COOKIE['user_id'], $date);
            
            if($result)
            {
              $topicId = Topics::getTopicIdByName($topic);
              $result = Messages::sendMessage($topicId, $_COOKIE['user_id'], $message, $date);
              header("Location: /lk/communities/page-1");
            }
        }
        
        require_once(ROOT.'/views/lk/addcommunity.php');
        
        return true;
    }
    
    public function actionDeleteCommunity()
    {
        $userId = User::checkLogged();
        
        if(isset($_REQUEST['del_topic']))
        {
            if(isset($_REQUEST['del_top']))
            {
                $in = implode(',',$_POST['del_top']);
                $result = Messages::deleteMessageByIds($in);
                if($result)
                {
                    Topics::deleteTopicByIds($in);
                }
            }
        }
        
        require_once(ROOT.'/views/lk/deletecommunity.php');
        
        return true;
    }
    
    public function actionMyinterests()
    {
        $userId = User::checkLogged();
        
        $subjectsList = Subjects::getSubjectsList();
        $total_interest = Interests::getTotalInterests();
        
        require_once(ROOT.'/views/lk/interests.php');
        
        return true;
    }
    
    public function actionPublishings($id)
    {
        $userId = User::checkLogged();
        
        $subjectsList = Subjects::getSubjectsList();
        $interestItem = Interests::getInterestById($id);
        
        $title = 'Публикации по теме: "'.$interestItem['name'].'"';
        $add = false;
        
        $publishingsIdList = array();
        $publishingsIdList = Publishings_Interests::getPublishingsIdByInterestId($id);
        $in = implode(',',$publishingsIdList);
        if($in=="") $in = 0;
       
        $publishingsList = array();
        $publishingsList = Publishings::getPublishingsListByIds($in);
         
        require_once(ROOT.'/views/publishings/index.php');
        
        return true;
    }
    
    public function actionPublishings_view($interest_id = 0, $id)
    {
        $userId = User::checkLogged();
        
        $publishingItem = Publishings::getPublishingById($id);
        
        require_once(ROOT.'/views/publishings/view.php');
        
        return true;
    }
    
    public function actionMypersonaldata()
    {
        $userId = User::checkLogged();
        
        $user = User::getUserById($userId);
        
        $password = $user['password'];
        $surname = $user['surname'];
        $name = $user['name'];
        $birth_date = $user['birth_date'];
        $phone = $user['phone'];
        $mail = $user['email'];
        $_SESSION['work_place'] = $user['work_place_id'];
        $_SESSION['prof_degree'] = $user['prof_degree_id'];
        $photo = $user['photo'];
        
        $result = false;
        $error = '';
    
        if(isset($_REQUEST['edit']))
        {
            if(isset($_FILES['file'])) {
        // проверяем, можно ли загружать изображение
            $file = $_FILES['file'];
            $check = true;
            if($file['name'] == '')
            {
                $password = $_REQUEST['pass'];
                $surname = $_REQUEST['surname'];
                $name = $_REQUEST['name'];
                $birth_date = $_REQUEST['birth_date'];
                $phone = $_REQUEST['phone'];
                $mail = $_REQUEST['email'];
                $_SESSION['work_place'] = $_REQUEST['work_place'];
                $_SESSION['prof_degree'] = $_REQUEST['prof_degree'];
            
                $result = User::edit($userId, $password, $surname, $name, $birth_date, $phone, $mail, $_SESSION['work_place'], $_SESSION['prof_degree'], $photo);
            } else{
	/* если размер файла 0, значит его не пропустили настройки 
	сервера из-за того, что он слишком большой */
            if($file['size'] == 0)
            {
                $check = false;
                $error = '<p style="color: red;">Файл слишком большой</p>';
            }
	// разбиваем имя файла по точке и получаем массив
            $getMime = explode('.', $file['name']);
	// нас интересует последний элемент массива - расширение
            $mime = strtolower(end($getMime));
	// объявим массив допустимых расширений
            $types = array('jpg', 'png', 'gif', 'bmp', 'jpeg');
	
	// если расширение не входит в список допустимых - return
            if(!in_array($mime, $types))
            {
                $check = false;
                $error ='<p style="color: red;">Недопустимый тип файла</p>'; 
            }
            
            if($check == true){
          // загружаем изображение на сервер
                $photo = mt_rand(0, 10000) . $file['name'];
                copy($file['tmp_name'], 'photos/' . $photo);
                $password = $_REQUEST['pass'];
                $surname = $_REQUEST['surname'];
                $name = $_REQUEST['name'];
                $birth_date = $_REQUEST['birth_date'];
                $phone = $_REQUEST['phone'];
                $mail = $_REQUEST['email'];
                $_SESSION['work_place'] = $_REQUEST['work_place'];
                $_SESSION['prof_degree'] = $_REQUEST['prof_degree'];
            
                $result = User::edit($userId, $password, $surname, $name, $birth_date, $phone, $mail, $_SESSION['work_place'], $_SESSION['prof_degree'], $photo);
            }
    }
            }
        }
        
        require_once(ROOT.'/views/lk/mypersonaldata.php');
        
        return true;
    }
}
