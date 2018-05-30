<?php

/**
 * Created by PhpStorm.
 * User: ElliotAnderson
 * Date: 11.05.2018
 * Time: 5:03
 */
class TaskController
{
    public function actionIndex()
    {
        require_once ROOT . '/views/task/index.php';
        return true;
    }
    public function actionView()
    {
        require_once ROOT . '/views/task/view.php';
        return true;
    }
    public function actionSend()
    {
        if ( 0 < $_FILES['file']['error'] )
        {
        echo 'Error: ' . $_FILES['file']['error'] . '<br>';
        }
        else
        {
        move_uploaded_file($_FILES['file']['tmp_name'], 'uploads/' . $_FILES['file']['name']);
        }


    }
}