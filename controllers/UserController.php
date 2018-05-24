<?php

class UserController
{

public function actionLogin()
    {

            $email = '';
            $password = '';
            if(isset($_POST['button']))
            {
                $email = $_POST['email'];
                $password = $_POST['password'];
                $errors = false;
                if(!User::testEmail($email))
                {
                    $errors[] = 'Неправильный Email';
                }
                if(!User::testPassword($password))
                {
                    $errors[] = 'Пароль не должен быть меньше 6 символов';
                }
                $userID = User::testUserData($email,md5($password));
                if($userID == false)
                {
                    $errors[] = 'Неправльный данные для входа на сайт';
                }
                else
                {
                    User::authentication($userID);
                    header("Location: /");
                    echo $userID;
                }

            }
        require_once ROOT . '/views/user/login.php';
        return true;
    }

public function actionRegister()
    {
        $email = '';
        $name = '';
        $password = '';
        $group = '';
        $result = false;
        if(isset($_POST['button']))
        {
            $name = $_POST['name'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            $group = $_POST['group'];
            $errors = false;
            if(User::testName($name) == false)
            {
                $errors[] = 'Имя меньше 2-х символов';
            }
            if(User::testEmail($email) == false)
            {
                $errors[] = 'Неправильный E-Mail';
            }
            if(User::testPassword($password) == false)
            {
                $errors[] = 'Пароль должен иметь более 6 символов';
            }
            if(User::testEmailExists($email) == true)
            {
                $errors[] = 'Такой E-Mail уже существует';
            }

            if($errors == false)
            {
               $result =  User::registration($name,$email,md5($password),$group);
                header("Location: /");
            }
        }
        require_once ROOT . '/views/user/register.php';
        return true;
    }

}