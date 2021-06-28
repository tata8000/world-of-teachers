<?php

class PublishingsController {
    
    public function actionIndex()
    {
        $userId = User::checkLogged();
        
        $title = 'Мои публикации';
        $add = true;
        
        $publishingsList = array();
        $publishingsList = Publishings::getPublishingsList();
       
         
        require_once(ROOT.'/views/publishings/index.php');
        
        return true;
       
    }
    
    public function actionView($id)
    {
        $userId = User::checkLogged();
        
        $publishingItem = Publishings::getPublishingById($id);
        
        require_once(ROOT.'/views/publishings/view.php');
        
        return true;
    }
    
    public function actionAddpublication()
    {
        $userId = User::checkLogged();
        
        $subjectsList = Subjects::getSubjectsList();
        
        $result = false;
        $res = false;
        if (isset($_REQUEST['sub'])){  
            
            $name = $_REQUEST['pub_name'];
            //Работа с файлом------------------
            $uploaddir='../pubs/';
            $uploadfile = $uploaddir.basename($_FILES["uploadfile"]["name"]);

            if ($_FILES && $_FILES["uploadfile"]["error"]== UPLOAD_ERR_OK)
                {
                    $uploaddir='pubs/'.$_COOKIE['user_login'].'_';
                    $uploadfile = $uploaddir.basename($_FILES["uploadfile"]["name"]);
                    move_uploaded_file($_FILES["uploadfile"]["tmp_name"], $uploadfile);
                    
                    $result = Publishings::postPublication($name, $uploadfile);
                    
                    if($result){
                        $val="";
                        $pub_id = Publishings::getPublicationIdByName($name);
                        foreach ($_REQUEST['choose_interest'] as $id=>$interest_id)
                        {
                            $val.="(".$pub_id.", ".$interest_id."), ";
                        }
                        $val = mb_substr($val, 0, -2).";";
                        
                        $res = Publishings_Interests::addItem($val);
                    }
                }
        }
        
        if($res) header("Location: /lk/mypublishings");
        
        require_once(ROOT.'/views/publishings/add.php');
        
        return true;
    }
    
    public function actionDeletepublication()
    {
        $userId = User::checkLogged();
        
        if(isset($_REQUEST['del_publication']))
        {
            if(isset($_REQUEST['del_pub']))
            {
                $in = implode(',',$_POST['del_pub']);
                $result = Publishings_Interests::deletePubIntByIds($in);
                if($result)
                {
                    Publishings::deletePublicationsByIds($in);
                }
            }
        }
        
        require_once(ROOT.'/views/publishings/delete.php');
        
        return true;
    }
}
