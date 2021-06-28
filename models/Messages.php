<?php


class Messages {
    
    public static function getMessageListByTopic($topicId = false)
    {
        if($topicId)
        {
            $db = Db::getConnection();
            $messages = array();
            $result = $db->query("SELECT id, user_id, text, send_date FROM message "
                    . "WHERE discussion_topic_id = $topicId "
                    . "ORDER BY send_date ASC");
            $i = 0;
            while($row = $result->fetch())
            {
                $messages[$i]['id'] = $row['id'];
                $messages[$i]['user_id'] = $row['user_id'];
                $messages[$i]['text'] = $row['text'];
                $messages[$i]['send_date'] = $row['send_date'];
                $i++;
            }
            
            return $messages;
        }
    }
    
    public static function sendMessage($topic, $user, $text, $date)
    {
        $db = DB::getConnection();
        
        $sql = 'INSERT INTO message (discussion_topic_id, user_id, text, send_date)'
               .'VALUES (:topic, :user_id, :text, :date)';
        $result = $db->prepare($sql);
        $result->bindParam(':topic', $topic, PDO::PARAM_INT);
        $result->bindParam(':user_id', $user, PDO::PARAM_INT);
        $result->bindParam(':text', $text, PDO::PARAM_STR);
        $result->bindParam(':date', $date, PDO::PARAM_STR);
        
        return $result->execute();
    }
    
    public static function deleteMessageByIds($in)
    {
        $db = Db::getConnection();
        $sql = "DELETE FROM message WHERE discussion_topic_id IN (".$in.")";
        $result = $db->query($sql);
        
        return $result;
    }
}
