<?php

/**
 * Created by PhpStorm.
 * User: ElliotAnderson
 * Date: 11.05.2018
 * Time: 5:05
 */
class Test
{
    const SHOW_BY_DEFAULT =1;
    public static function getTestById($id)
    {
        if($id)
        {
            $db = Db::getConnection();
            $sql = "SELECT answer,id_test FROM test WHERE id_test = :id_test";
            $result = $db->prepare($sql);
            $result->bindParam(":id_test",$id,PDO::PARAM_INT);
            $result->execute();
            $tests = array();
            $i = 0;
            while ($row = $result->fetch(PDO::FETCH_BOTH)) {
                $tests[$i]['answer'] = json_decode($row['answer']);
                $tests[$i]['id_test'] = $row['id_test'];
                $i++;
            }
            return $tests;
        }
    }
    public static function getTestListByCategory($categoryId = false,$page = 1)
    {
        if ($categoryId) {
            $show = self::SHOW_BY_DEFAULT;
            $offset = ($page - 1) * self::SHOW_BY_DEFAULT;
            $db = Db::getConnection();
            $sql = ("SELECT id_category,id_test,question,answer,code FROM test WHERE id_category=:id_category ORDER BY id_test ASC LIMIT :show  OFFSET :offset");
            $result =  $db->prepare($sql);
            $result->bindParam(":id_category",$categoryId,PDO::PARAM_INT);
            $result->bindParam(":show",$show,PDO::PARAM_INT);
            $result->bindParam(":offset",$offset,PDO::PARAM_INT);
            $result->execute();
            $tests = array();
            $i = 0;
            while ($row = $result->fetch(PDO::FETCH_BOTH)) {
                $tests[$i]['id_test'] = $row['id_test'];
                $tests[$i]['id_category'] = $row['id_category'];
                $tests[$i]['question'] = $row['question'];
                $tests[$i]['code'] = $row['code'];
                $tests[$i]['answer'] = json_decode($row['answer']);
                $i++;
            }
            return $tests;

        }
    }
    public static function getTestList($id_category)
    {
        $db = Db::getConnection();
        $testList = array();
        $sql = "SELECT id_category,id_test FROM test WHERE id_category=:id_category";
        $result =  $db->prepare($sql);
        $result->bindParam(":id_category",$id_category,PDO::PARAM_INT);
        $result->execute();
        $i = 0;
        while ($row =  $result->fetch(PDO::FETCH_BOTH))
        {
            $testList[$i]['id_test'] = $row['id_test'];
            $testList[$i]['id_category'] = $row['id_category'];
            $i++;
        }
        return $testList;
    }
    public static function getTestAnswer($test_id)
    {
        $db = Db::getConnection();
        $answerList = array();
        $sql = "SELECT title FROM answer WHERE id_test = :id_test";
        $result = $db->prepare($sql);
        $result->bindParam(":id_test",$test_id,PDO::PARAM_INT);
        $result->execute();
        $i=0;
        while($row = $result->fetch(PDO::FETCH_BOTH))
        {
            $answerList[$i]['title'] = $row['title'];
            $i++;
        }
        return $answerList;

    }
    public static function getTotalTestInCategory($categoryId)
    {
        $db = Db::getConnection();
        $result = $db->query("SELECT count(id_test) AS count FROM test WHERE id_category=".$categoryId);
        $row = $result->fetch(PDO::FETCH_ASSOC);
        return $row['count'];
    }
    public static function getNumberPage()
    {
        $uri = $_SERVER['REQUEST_URI'];
        $uriArray = explode('-',$uri);
        $numberPage = $uriArray[1];
        return $numberPage;
    }
    public static function getNumberId()
    {
        $uri = $_SERVER['REQUEST_URI'];
        $uriArray = explode('/',$uri);
        $numberPage = $uriArray[3];
        return $numberPage;
    }

    public static function getRightAnswer($test_id)
    {
        $db = Db::getConnection();
        $answerList = array();
        $sql = "SELECT title FROM answer WHERE id_test = :id_test AND status = '1'";
        $result = $db->prepare($sql);
        $result->bindParam(":id_test",$test_id,PDO::PARAM_INT);
        $result->execute();
        $i=0;
        while($row = $result->fetch(PDO::FETCH_BOTH))
        {
            $answerList[$i]['title'] = $row['title'];
            $i++;
        }
        return $answerList;

    }
    public static function countTestNull()
    {
        if($_SESSION['count_answer']>0)
        {
            $_SESSION['count_answer'] = 0;
        }
        return $_SESSION['count_answer'];
    }

    public static function jsonDecodeAnswerRight($test)
    {
        $itemAnswer = '';
        $array = json_decode(json_encode($test['answer']), True);
        foreach ($array as $item)
        {
            if($item['status']=='1')
            {
            $itemAnswer .= ' '.  $item['title'];
            }
        }
        return $itemAnswer;
    }
    public static function jsonDecodeAnswer($test)
    {
        $itemAnswer = ' ';
        $array = json_decode(json_encode($test['answer']), True);
        foreach ($array as $item)
        {
                $itemAnswer .= ' '.  $item['title'];
        }
        return $itemAnswer;
    }
    public static function percentResult($count,$total)
    {
        $percent = ($count/$total)*100;
        return $percent;
    }
    public static function checkCountAnswer()
    {
        $server =  $_SERVER['REQUEST_URI'];
        $serverPage = explode('/',$server);
        if(isset($serverPage[3]))
        {
        if($serverPage[3] == 'question-1')
        {
            $_SESSION['count_answer'] = 0;
        }
        }
    }
    public static function addStatistic($id_user,$id_test,$percent)
    {

        $dbConnect = Db::getConnection();
        $query = ('INSERT INTO statistic_test (id_user, id_test, percent) VALUES (:id_user, :id_test, :percent)');
        $result = $dbConnect->prepare($query);
        $result->bindParam(':id_user',$id_user,PDO::PARAM_STR);
        $result->bindParam(':id_test',$id_test,PDO::PARAM_STR);
        $result->bindParam(':percent',$percent,PDO::PARAM_STR);
        return $result->execute();

    }




}