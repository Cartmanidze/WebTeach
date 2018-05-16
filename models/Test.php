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
            $sql = "SELECT * FROM test WHERE id_test = :id_test";
            $result = $db->prepare($sql);
            $result->bindParam(":id_test",$id,PDO::PARAM_INT);
            $result->execute();
            $tests = array();
            $i = 0;
            while ($row = $result->fetch(PDO::FETCH_BOTH)) {
                $tests[$i]['id_test'] = $row['id_test'];
                $tests[$i]['question'] = $row['question'];
                $tests[$i]['answer_first'] = $row['answer_first'];
                $tests[$i]['answer_second'] = $row['answer_second'];
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
            $sql = ("SELECT id_test,question,answer_first,answer_second FROM test WHERE id_category=:id_category ORDER BY id_test ASC LIMIT :show  OFFSET :offset");
            $result =  $db->prepare($sql);
            $result->bindParam(":id_category",$categoryId,PDO::PARAM_INT);
            $result->bindParam(":show",$show,PDO::PARAM_INT);
            $result->bindParam(":offset",$offset,PDO::PARAM_INT);
            $result->execute();
            $tests = array();
            $i = 0;
            while ($row = $result->fetch(PDO::FETCH_BOTH)) {
                $tests[$i]['id_test'] = $row['id_test'];
                $tests[$i]['question'] = $row['question'];
                $tests[$i]['answer_first'] = $row['answer_first'];
                $tests[$i]['answer_second'] = $row['answer_second'];
                $i++;
            }
            return $tests;

        }
    }
    public static function getTestList()
    {
        $db = Db::getConnection();
        $testList = array();
        $result = $db->query("SELECT id_category,id_test FROM test");
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

}