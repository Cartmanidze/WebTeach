<?php

/**
 * Created by PhpStorm.
 * User: ElliotAnderson
 * Date: 11.05.2018
 * Time: 5:06
 */
class Course
{
    public static function getHeader($id)
    {
        if($id)
        {
            $db = Db::getConnection();
            $sql = "SELECT id_header,header FROM header_course WHERE id_category = :id_category";
            $result = $db->prepare($sql);
            $result->bindParam(":id_category",$id,PDO::PARAM_INT);
            $result->execute();
            $header = array();
            $i = 0;
            while ($row = $result->fetch(PDO::FETCH_BOTH)) {
                $header[$i]['id_header'] = $row['id_header'];
                $header[$i]['header'] = $row['header'];
                $i++;
            }
            return $header;
        }
    }
    public static function getCourse($id)
    {
        if($id)
        {
            $db = Db::getConnection();
            $sql = "SELECT text FROM course WHERE id_header = :id_header";
            $result = $db->prepare($sql);
            $result->bindParam(":id_header",$id,PDO::PARAM_INT);
            $result->execute();
            $course = array();
            $i = 0;
            while ($row = $result->fetch(PDO::FETCH_BOTH)) {
                $course[$i]['text'] = $row['text'];
                $i++;
            }
            return $course;
        }
    }



}