<?php


class Publishings_Interests {
    
    public static function addItem($val)
    {
        $db = DB::getConnection();
        
        $sql = "INSERT INTO publishing_prof_interest (publishing_id, prof_interest_id) VALUES". $val;
        
        return $result = $db->query($sql);
        
    }
    
    public static function getPublishingsIdByInterestId($id)
    {
        $db = DB::getConnection();
        
        $publishingsIdList = array();
        
        $result = $db->query('SELECT publishing_id FROM publishing_prof_interest WHERE prof_interest_id ='. $id);
        
        $i = 0;
        while($row = $result->fetch())
        {
            $publishingsIdList[$i] = $row['publishing_id'];
            $i++;
        }
        
        return $publishingsIdList;
        
    }
    
    public static function deletePubIntByIds($in)
    {
        $db = Db::getConnection();
        $sql = "DELETE FROM publishing_prof_interest WHERE publishing_id IN (".$in.")";
        $result = $db->query($sql);
        
        return $result;
    }
    
}
