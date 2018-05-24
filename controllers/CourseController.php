<?php

/**
 * Created by PhpStorm.
 * User: ElliotAnderson
 * Date: 11.05.2018
 * Time: 5:04
 */
class CourseController
{
    public function actionIndex()
    {
        $categories = Category::getCategoryList();
        require_once (ROOT.'/views/course/index.php');
        return true;
    }
    public function actionHeader($id_category)
    {
        $headers = Course::getHeader($id_category);
        require_once (ROOT.'/views/course/headers.php');
        return true;
    }
    public function actionCourse($id_header)
    {
        $courses = Course::getCourse($id_header);
        require_once (ROOT.'/views/course/course.php');
        return true;
    }


}