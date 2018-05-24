<?php include_once ROOT.'\views\layouts\header.php';?>
<section>
    <div class="category">
        <?php if($numberPage<=$total):?>
        <?php foreach ($tests as $test): ?>
        <div class="category_panel">
            <h5><?php echo $test['question']?></h5>
            <form action="/test/<?php echo $test['id_category'];?>/<?php echo $test['id_test'];?>/question-<?php echo $numberPage+1; ?>" method="post" class="test">
                <?php if(isset($test['code'])):?>
                <textarea rows="10" cols="30"><?php echo $test['code'];?></textarea>
                <?php endif;?>
                <?php foreach ($testAnswerArray as $valueAnswer):?>
                    <?php if($valueAnswer!=''):?>
                        <ul class="list_answer">
                        <li>
                            <span class="list_answer_one"><?php echo $valueAnswer;?></span>
                            <input type="checkbox" value="<?php echo $valueAnswer;?>" name="answer[]" class="check" />
                        </li>
                        </ul>
                        <?php endif; ?>
                <?php endforeach;?>

                <input type="submit" name="submit" value="Продолжить" class="button_test"  />
            </form>
                <?php echo $pagination->get();?>
            <?php endforeach;?>

        </div>
        <?php else:?>
        <div class="results">
            <?php $result = $_SESSION['count_answer']; ?>
            <p> Правильных ответов:<?php echo $result;?> из <?php echo $total;?> </p>
            <p> Результат:<?php echo $percent = Test::percentResult($result,$total);?>% </p>
            <?php Test::addStatistic($userID,$numberId,$percent); ?>

        </div>
            <?php Test::countTestNull();?>

            <?php endif;?>


    </div>



</section>
<?php include_once ROOT.'\views\layouts\footer.php';?>
