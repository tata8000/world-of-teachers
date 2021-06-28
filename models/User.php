<?php

class User {
    
    public static function register($login, $password, $surname, $name, $birth_date, $phone, $mail, $work_place, $prof_degree)
    {
        $db = Db::getConnection();
        
        $sql = 'INSERT INTO user (login, password, surname, name, birth_date, phone, email, work_place_id, prof_degree_id)'
                .'VALUES (:login, :password, :surname, :name, :birth_date, :phone, :email, :work_place_id, :prof_degree_id)';
        $result = $db->prepare($sql);
        $result->bindParam(':login', $_SESSION['new_log'], PDO::PARAM_STR);
        $result->bindParam(':password', $_SESSION['new_pass'], PDO::PARAM_STR);
        $result->bindParam(':surname', $_SESSION['surname'], PDO::PARAM_STR);
        $result->bindParam(':name', $_SESSION['name'], PDO::PARAM_STR);
        $result->bindParam(':birth_date', $_SESSION['birth_date'], PDO::PARAM_STR);
        $result->bindParam(':phone', $_SESSION['phone'], PDO::PARAM_STR);
        $result->bindParam(':email', $_SESSION['mail'], PDO::PARAM_STR);
        $result->bindParam(':work_place_id', $_SESSION['work_place'], PDO::PARAM_INT);
        $result->bindParam(':prof_degree_id', $_SESSION['prof_degree'], PDO::PARAM_INT);
         return $result->execute();
    }
    
    public static function checkLoginExist($login)
    {
        $db = Db::getConnection();
        $sql = 'SELECT COUNT(*) FROM user WHERE login = :login';
        $result = $db->prepare($sql);
        $result->bindParam(':login', $login, PDO::PARAM_STR);
        $result->execute();
        
        if($result->fetchColumn())
            return true;
        
        return false;
    }
    
    public static function checkUserData($login, $password)
    {
        $db = Db::getConnection();
        
        $sql = 'SELECT * FROM user WHERE login = :login AND password = :password';
        
        $result = $db->prepare($sql);
        $result->bindParam(':login', $login, PDO::PARAM_STR);
        $result->bindParam(':password', $password, PDO::PARAM_STR);
        $result->execute();
        
        $user = $result->fetch();
        if ($user)
        {
            return $user;
        }
        
        return false;
    }
    
    public static function auth($user)
    {
        setcookie('user_id', $user['id'], time() + 7200, "/");
        setcookie('user_login', $user['login'], time() + 7200, "/");
    }
    
    public static function checkLogged()
    {
        if(isset($_COOKIE['user_id']))
        {
            return $_COOKIE['user_id'];
        }
        
        header("Location: /user/authorization");
    }
    public static function getUserById($id)
    {
        $id = intval($id);
        
        if($id)
        {
            
            $db = Db::getConnection();
            
            $result = $db->query('SELECT password, surname, name, birth_date, phone, email, work_place_id, prof_degree_id, photo FROM user WHERE id='.$id);
            $result->setFetchMode(PDO::FETCH_ASSOC);
            $userItem = $result->fetch();
            
            return $userItem;
            
        }
    }
    
    public static function edit($id, $password, $surname, $name, $birth_date, $phone, $email, $work_place, $prof_degree, $photo)
    {
        $db = Db::getConnection();
        
        $sql = 'UPDATE user '
                . 'SET password = :password, surname = :surname, name = :name, birth_date = :birth_date, '
                . 'phone = :phone, email = :email, work_place_id = :work_place, prof_degree_id = :prof_degree, photo = :photo '
                . 'WHERE id = :id';
        
        $result = $db->prepare($sql);
        
        $result->bindParam(':id', $id, PDO::PARAM_INT);
        $result->bindParam(':password', $password, PDO::PARAM_STR);
        $result->bindParam(':surname', $surname, PDO::PARAM_STR);
        $result->bindParam(':name', $name, PDO::PARAM_STR);
        $result->bindParam(':birth_date', $birth_date, PDO::PARAM_STR);
        $result->bindParam(':phone', $phone, PDO::PARAM_STR);
        $result->bindParam(':email', $email, PDO::PARAM_STR);
        $result->bindParam(':work_place', $work_place, PDO::PARAM_INT);
        $result->bindParam(':prof_degree', $prof_degree, PDO::PARAM_INT);
        $result->bindParam(':photo', $photo, PDO::PARAM_STR);
        
        return $result->execute();
    }
    
    public static function isGuest()
    {
        if(isset($_COOKIE['user_id'])) return false;
        else return true;
    }
}
