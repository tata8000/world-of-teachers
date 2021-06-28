<?php


class Conferences {
    
    public static function getConferencesIdsByInterestId($id)
    {
        $id = intval($id);
        
        if($id)
        {
            
            $db = Db::getConnection();
            
            $conferenceIds = array();
            
            $result = $db->query('SELECT conference_id FROM conference_prof_interest WHERE prof_interest_id='.$id);
            $i = 0;
            
            while($row = $result->fetch())
            {
                $conferenceIds[$i] = $row['conference_id'];
                $i++;
            }

            return $conferenceIds;
            
        }
    }
    
    public static function getConferencesListByIds($in)
    {
            $db = Db::getConnection();
            
            $conferenceList = array();
        
            $result = $db->query('SELECT id, name, conf_link, date FROM conference WHERE id IN ('.$in.')');
            $i = 0;
            
            while($row = $result->fetch())
            {
                $conferenceList[$i]['id'] = $row['id'];
                $conferenceList[$i]['name'] = $row['name'];
                $conferenceList[$i]['conf_link'] = $row['conf_link'];
                $conferenceList[$i]['date'] = $row['date'];
                $i++;
            }

            return $conferenceList;
    }
}
