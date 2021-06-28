<?php


class Interests {
    
    public static function getInteresrtsListBySubjectId($subjectId)
    {
        $db = Db::getConnection();
        
        $interestsList = array();
        
        $result = $db->query('SELECT id, name FROM prof_interest WHERE subject_id = '.$subjectId);
        
        $i = 0;
        while($row = $result->fetch())
        {
            $interestsList[$i]['id'] = $row['id'];
            $interestsList[$i]['name'] = $row['name'];
            $i++;
        }
        
        return $interestsList;
    }
    
    public static function getInterestById($id)
    {
        $id = intval($id);
        
        if($id)
        {
            
            $db = Db::getConnection();
            
            $result = $db->query('SELECT id, name FROM prof_interest WHERE id='.$id);
            $result->setFetchMode(PDO::FETCH_ASSOC);
            $interestItem = $result->fetch();
            
            return $interestItem;
            
        }
    }
    
    public static function getTotalInterests()
    {
        $db = Db::getConnection();
        
        $result = $db->query('SELECT count(id) AS count FROM prof_interest');
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $row = $result->fetch();
        
        return $row['count'];
    }
    
}
