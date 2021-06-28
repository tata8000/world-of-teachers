<?php

class UserController {
    
    public function actionRegister()
    {
        if (isset($_SESSION['new_log'], $_SESSION['new_pass'])) 
        {
            $login = $_SESSION['new_log'];
            $pass = $_SESSION['new_pass'];
        } else
        {
            $login = "";
            $pass = "";
        }
        
        $errors = false;
        
        if(isset($_REQUEST['reg']))
        {
            $login = $_REQUEST['log'];
            $pass = $_REQUEST['pass'];
        }
        
        if(User::checkLoginExist($login))
        {
            unset($_SESSION['new_log']);
            $login = "";
            $errors = '<p style="color: white; text-align: center; font-size: 13pt; text-shadow: 1px 1px 1px red;">Такой логин уже используется!</p>';           
        }
        
        if($errors==false && isset($_REQUEST['reg']))
        {
             $_SESSION['new_log']=$login;	
             $_SESSION['new_pass']=$pass;
            header('Location: /user/reg_continue');
            exit();
        }
        require_once(ROOT.'/views/user/register.php');
        
        return true;
    }
    
    public function actionReg_continue()
    {
        if (isset($_SESSION['surname'], $_SESSION['name'], $_SESSION['birth_date'], $_SESSION['phone'], $_SESSION['mail'])) 
        {
            $surname = $_SESSION['surname'];
            $name = $_SESSION['name'];
            $birth_date = $_SESSION['birth_date'];
            $phone = $_SESSION['phone'];
            $mail = $_SESSION['mail'];
        } else
        {
            $surname = "";
            $name = "";
            $birth_date = "";
            $phone = "";
            $mail = "";
        }
        if (isset($_REQUEST['reg_con']))
{
        $_SESSION['surname']=$_REQUEST['surname'];
        $_SESSION['name']=$_REQUEST['name'];
        $_SESSION['birth_date']=$_REQUEST['birth_date'];
        $_SESSION['phone']=$_REQUEST['phone'];
        $_SESSION['mail']=$_REQUEST['email'];
        $_SESSION['work_place']=$_REQUEST['work_place'];
        $_SESSION['prof_degree']=$_REQUEST['prof_degree'];
        header('Location: /user/agreement');
        exit();
}      
        require_once(ROOT.'/views/user/reg_continue.php');
        
        return true;
    }
    
    public function actionAgreement()
    {
        $result = false;
        if (isset($_REQUEST['reg_end']))
        {
            $result = User::register($_SESSION['new_log'], $_SESSION['new_pass'], $_SESSION['surname'], $_SESSION['name'], $_SESSION['birth_date'], $_SESSION['phone'], $_SESSION['mail'], $_SESSION['work_place'], $_SESSION['prof_degree']);
            unset($_SESSION['new_log']);
            unset($_SESSION['new_pass']);
            unset($_SESSION['surname']);
            unset($_SESSION['name']);
            unset($_SESSION['birth_date']);
            unset($_SESSION['phone']);
            unset($_SESSION['mail']);
            unset($_SESSION['work_place']);
            unset($_SESSION['prof_degree']);
        }
        require_once(ROOT.'/views/user/agreement.php');
        
        return true;
    }
    
    public function actionAuthorization()
    {
        $login = '';
        $password = '';
        $errors = '';
        if(isset($_REQUEST['entrance']))
        {
            $login = $_REQUEST['login'];
            $password = $_REQUEST['password'];
            $errors = false;

            $user = User::checkUserData($login, $password);
            
            if($user == false)
            {
                $errors = '<p style="color: white; text-align: center; font-size: 13pt; text-shadow: 1px 1px 1px red;">Пользователя с такими данными не существует!</p>';
            }
            else 
            {
                User::auth($user);
                header("Location: /lk/");
            }
        }
        require_once(ROOT.'/views/user/authorization.php');
        
        return true;
    }
    
    public function actionExit()
    {
        setcookie('user_id', "", time() - 7200, "/");
        setcookie('user_login', "", time() - 7200, "/");
        header('Location: /');
    }
}
