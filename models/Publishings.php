<?php

class Publishings {
    public static function getPublishingById($id)
    {
        $id = intval($id);
        
        if($id)
        {
            
            $db = Db::getConnection();
            
            $result = $db->query('SELECT id, name, user_id, pub_link FROM publishing WHERE id='.$id);
            $result->setFetchMode(PDO::FETCH_ASSOC);
            $publishingItem = $result->fetch();
            
            return $publishingItem;
            
        }
    }
    
    public static function getPublishingsList()
    {
        $db = Db::getConnection();
        
        $publishingsList = array();
        
        $result = $db->query('SELECT id, name, user_id, pub_link FROM publishing WHERE user_id ='. $_COOKIE['user_id']);
        
        $i = 0;
        while($row = $result->fetch())
        {
            $publishingsList[$i]['id'] = $row['id'];
            $publishingsList[$i]['name'] = $row['name'];
            $publishingsList[$i]['user_id'] = $row['user_id'];
            $publishingsList[$i]['pub_link'] = $row['pub_link'];
            $i++;
        }
        
        return $publishingsList;
    }
    
    public static function postPublication($name, $link)
    {
        $db = DB::getConnection();
        
        $sql = 'INSERT INTO publishing (name, user_id, pub_link)'
               .'VALUES (:name, :user_id, :pub_link)';
        $result = $db->prepare($sql);
        $result->bindParam(':name', $name, PDO::PARAM_STR);
        $result->bindParam(':user_id', $_COOKIE['user_id'], PDO::PARAM_INT);
        $result->bindParam(':pub_link', $link, PDO::PARAM_STR);
        
        return $result->execute();
    }
    
    public static function deletePublicationsByIds($in)
    {
        $db = Db::getConnection();
        
        $sql = "DELETE FROM publishing WHERE id IN (".$in.")";
        
        $result = $db->query($sql);
    }
    
    public static function getPublicationIdByName($name)
    {
        $db = DB::getConnection();
        
        $sql = "SELECT id FROM publishing WHERE name = '".$name."'";
        $result = $db->query($sql);
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $publishingItem = $result->fetch();
            
        return $publishingItem['id'];
    }
    
    public static function getPublishingsListByIds($ids)
    {    
            $db = Db::getConnection();
            
            $publishingsList = array();
            
            $result = $db->query('SELECT id, name, user_id, pub_link FROM publishing WHERE id IN ('.$ids.')');

            $i = 0;
            while($row = $result->fetch())
            {
                $publishingsList[$i]['id'] = $row['id'];
                $publishingsList[$i]['name'] = $row['name'];
                $publishingsList[$i]['user_id'] = $row['user_id'];
                $publishingsList[$i]['pub_link'] = $row['pub_link'];
                $i++;
            }
        
        return $publishingsList;

    }
}
