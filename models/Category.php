<?php

/**
 * Created by PhpStorm.
 * User: ElliotAnderson
 * Date: 13.05.2018
 * Time: 9:57
 */
class Category
{
    public static function getCategoryList()
    {
        $db = Db::getConnection();
        $categoryList = array();
        $result = $db->query("SELECT id_category,name,image FROM category");
        $i = 0;
        while ($row =  $result->fetch(PDO::FETCH_BOTH))
        {
            $categoryList[$i]['id_category'] = $row['id_category'];
            $categoryList[$i]['name'] = $row['name'];
            $categoryList[$i]['image'] = $row['image'];
            $i++;
        }
        return $categoryList;
    }


}