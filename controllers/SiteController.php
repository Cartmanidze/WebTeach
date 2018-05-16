<?php

class SiteController
{
    public function actionIndex()
    {
        $categorys = Category::getCategoryList();
        require_once (ROOT . '/views/site/index.php');
        return true;
    }

}