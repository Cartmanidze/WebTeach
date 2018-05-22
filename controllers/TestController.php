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
        $count = 0;
        $tests = Test::getTestListByCategory($id,$page);
        $total = Test::getTotalTestInCategory($id);
        $pagination = new Pagination($total,$page,Test::SHOW_BY_DEFAULT,'page-');
        $numberPage = Test::getNubmerPage();
        if(isset($_POST['submit']))
            {
                $rightAnswers = Test::getRightAnswer($numberPage -1 );
                 $checkAnswers = $_POST['answer'];

                foreach ($rightAnswers as $rightAnswer)
                    {
                foreach ($checkAnswers as $checkAnswer)
                {

                    if($checkAnswer == $rightAnswer['title'])
                    {
                        $count++;
                       $_SESSION['count_answer'] = $count;
                    }

        }
    }
}
        require_once(ROOT. '/views/test/view.php');
        return true;

    }




}