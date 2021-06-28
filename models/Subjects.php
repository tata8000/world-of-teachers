<?php


class Subjects {
    
    public static function getSubjectsList()
    {
        $db = Db::getConnection();
        
        $subjectsList = array();
        
        $result = $db->query('SELECT id, name FROM subject');
        
        $i = 0;
        while($row = $result->fetch())
        {
            $subjectsList[$i]['id'] = $row['id'];
            $subjectsList[$i]['name'] = $row['name'];
            $i++;
        }
        
        return $subjectsList;
    }
}
