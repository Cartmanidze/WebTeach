<?php

/**
 * Created by PhpStorm.
 * User: ElliotAnderson
 * Date: 18.04.2018
 * Time: 9:49
 */
class User
{
    public static function registration($name,$email,$password,$group)
    {
        $dbConnect = Db::getConnection();
        $query = ('INSERT INTO users (name, email, password,class) VALUES (:name, :email, :password, :class)');
        $result = $dbConnect->prepare($query);
        $result->bindParam(':name',$name,PDO::PARAM_STR);
        $result->bindParam(':email',$email,PDO::PARAM_STR);
        $result->bindParam(':password',$password,PDO::PARAM_STR);
        $result->bindParam(':class',$group,PDO::PARAM_STR);
        return $result->execute();

    }
    public static function testName($name)
    {
        $minLength = 2;
        if(strlen($name)>=$minLength)
        {
            return true;
        }
        else
        {
            return false;
        }
    }

    public static function testPassword($password)
    {
        $min = 6;
        if(strlen($password)>=$min)
        {
            return true;
        }
        else
        {
         return false;
        }


    }

    public static function testEmail($email)
    {
        if(filter_var($email,FILTER_VALIDATE_EMAIL))
        {
            return true;
        }
        else
        {
            return false;
        }

    }

    public static function testEmailExists($email)
    {
        $dbConnection = Db::getConnection();
        $query = ("SELECT COUNT(*) FROM users WHERE email = :email");
        $result = $dbConnection->prepare($query);
        $result->bindParam(':email',$email,PDO::PARAM_STR);
        $result->execute();
        if($result->fetchColumn())
        {
            return true;
        }
        return false;

    }
    public static function testUserData($email,$password)
    {
        $dbConnection = Db::getConnection();
        $query = "SELECT * FROM users WHERE email=:email AND password=:password";
        $result = $dbConnection->prepare($query);
        $result->bindParam(':email',$email,PDO::PARAM_INT);
        $result->bindParam(':password',$password,PDO::PARAM_INT);
        $result->execute();
        $user = $result->fetch();
        if($user)
        {
            return $user['id_users'];
        }
        return false;
    }
    public static function authentication($user_Id)
    {
        $_SESSION['user'] = $user_Id;
        $_SESSION['count_answer'] = 0;
    }
    public static function checkLogger()
    {

        if(isset($_SESSION['user']))
        {
            return $_SESSION['user'];
        }
       header("Location: /user/login");
    }
    public static function isGuest()
    {

        if(isset($_SESSION['user']))
        {
            return false;
        }
        return true;
    }
    public static function getUserById($id)
    {
        if($id)
        {
            $db = Db::getConnection();
            $sql = "SELECT * FROM users WHERE id = :id";
            $result = $db->prepare($sql);
            $result->bindParam(":id",$id,PDO::PARAM_INT);
            $result->execute();
            return $result->fetch(PDO::FETCH_ASSOC);
        }
    }
    public static function edit($id,$name,$password)
    {
        $db = Db::getConnection();
        $sql = "UPDATE users SET name = :name, password = :password WHERE id = :id";
        $result = $db->prepare($sql);
        $result->bindParam(":id",$id,PDO::PARAM_INT);
        $result->bindParam(":name",$name,PDO::PARAM_INT);
        $result->bindParam(":password",$password,PDO::PARAM_INT);
        return $result->execute();
    }
}