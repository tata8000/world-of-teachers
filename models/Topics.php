<?php

class Topics {
    
    const SHOW_BY_DEFAULT = 2;
    
    public static function getTopicsList($page)
    {
        $db = Db::getConnection();
        
        $page = intval($page);
        $offset = ($page - 1) * self::SHOW_BY_DEFAULT;
        
        $topicList = array();
        
        $sql = "SELECT id, name FROM discussion_topic "
                . "ORDER BY creation_date ASC "
                . "LIMIT ". self::SHOW_BY_DEFAULT."  "
                . "OFFSET ". $offset;
        $result = $db->query($sql);
        
        $i = 0;
        while ($row = $result->fetch())
        {
            $topicList[$i]['id'] = $row['id'];
            $topicList[$i]['name'] = $row['name'];
            $i++;
        }
        
        return $topicList;
    }
    
    public static function getTotalTopics()
    {
        $db = Db::getConnection();
        
        $result = $db->query('SELECT count(id) AS count FROM discussion_topic');
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $row = $result->fetch();
        
        return $row['count'];
    }
    
    public static function addTopic($name, $user, $date)
    {
        $db = DB::getConnection();
        
        $sql = 'INSERT INTO discussion_topic (name, user_id, creation_date)'
               .'VALUES (:name, :user_id, :date)';
        $result = $db->prepare($sql);
        $result->bindParam(':name', $name, PDO::PARAM_INT);
        $result->bindParam(':user_id', $user, PDO::PARAM_INT);
        $result->bindParam(':date', $date, PDO::PARAM_STR);
        
        return $result->execute();
    }
    
    public static function getTopicIdByName($name)
    {
        $db = Db::getConnection();
        
        $result = $db->query("SELECT id FROM discussion_topic WHERE name = '$name'");
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $row = $result->fetch();
        
        return $row['id'];
    }
    
    public static function getTopicNumById($id)
    {
        $db = Db::getConnection();
        
        $result = $db->query("CALL order_topic()");
        $result->setFetchMode(PDO::FETCH_ASSOC);
        
        $i = 0;
        while ($row = $result->fetch())
        {
            if($row['id'] == $id) return $row['row'];
            $i++;
        }
        
    }
    
    public static function deleteTopicByIds($in)
    {
        $db = Db::getConnection();
        
        $sql = "DELETE FROM discussion_topic WHERE id IN (".$in.")";
        
        $result = $db->query($sql);
    }
}
