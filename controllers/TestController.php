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
        require_once(ROOT . '/views/test/index.php');
        return true;
    }

    public function actionView($id,$idTest, $page = 1)
    {
        $numberId = Test::getNumberId();
        $itemAnswer = '';
        $testItem = '';
        $testItemRight = '';
        $tests = array();
        $count = 0;
        $tests = Test::getTestListByCategory($id, $page);
        $testsRight = array();
        $testsRight = Test::getTestById($numberId);

        if(isset($testsRight)) {
            foreach ($testsRight as $itemRight) {
                $testItemRight = Test::jsonDecodeAnswerRight($itemRight);
                $testItemRight = trim($testItemRight);
            }
        }
        $total = Test::getTotalTestInCategory($id);
        $pagination = new Pagination($total, $page, Test::SHOW_BY_DEFAULT, 'page-');
        $numberPage = Test::getNumberPage();
        foreach ($tests as $test) {
            $testItem .= Test::jsonDecodeAnswer($test);
            $testItem = trim($testItem);

        }
        $testAnswerArrayRight = (explode(' ', $testItemRight));
        $testAnswerArray = explode(' ', $testItem);
        $select = '';
        if (isset($_POST['submit'])) {
            $selectAnswers = $_POST['answer'];
               foreach ($selectAnswers as $selectAnswer)
               {
                   $select .=' ' . $selectAnswer;
               }
               $select =trim($select);
                if ($select == $testItemRight) {
                    $count++;
                    $_SESSION['count_answer'] += $count;
                }
        }
        require_once(ROOT. '/views/test/view.php');
        return true;
    }
}








