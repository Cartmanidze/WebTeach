<?php

/**
 * Created by PhpStorm.
 * User: ElliotAnderson
 * Date: 11.05.2018
 * Time: 5:03
 */
class TestController
{
    public function actionIndex()
    {
        $categories = array();
        $categories = Category::getCategoryList();
        require_once (ROOT . '/views/test/index.php');
        return true;
    }
    public function actionView($id,$page = 1)
    {
        $tests = array();
        $tests = Test::getTestListByCategory($id,$page);
        $total = Test::getTotalTestInCategory($id);
        $pagination = new Pagination($total,$page,Test::SHOW_BY_DEFAULT,'page-');
        $pagination
        require_once(ROOT. '/views/test/view.php');
        return true;

    }




}