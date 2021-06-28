<?php


class Courses {
    
    public static function getCoursesIdsByInterestId($id)
    {
        $id = intval($id);
        
        if($id)
        {
            
            $db = Db::getConnection();
            
            $coursesIds = array();
            
            $result = $db->query('SELECT course_id FROM course_prof_interest WHERE prof_interest_id='.$id);
            $i = 0;
            
            while($row = $result->fetch())
            {
                $coursesIds[$i] = $row['course_id'];
                $i++;
            }

            return $coursesIds;
            
        }
    }
    
    public static function getCoursesListByIds($in)
    {
            $db = Db::getConnection();
            
            $coursesList = array();
            $today = date("Y-m-d");
        
            $result = $db->query('SELECT id, name, course_link, start_date, end_date FROM course WHERE id IN ('.$in.')');
            $i = 0;
            
            while($row = $result->fetch())
            {
                $coursesList[$i]['id'] = $row['id'];
                $coursesList[$i]['name'] = $row['name'];
                $coursesList[$i]['course_link'] = $row['course_link'];
                $coursesList[$i]['start_date'] = $row['start_date'];
                $coursesList[$i]['end_date'] = $row['end_date'];
                $i++;
            }

            return $coursesList;
    }
}
