<?php include_once ROOT.'\views\layouts\header.php';?>
<section>
    <div class="category">
        <?php if($numberPage<=$total):?>
        <?php foreach ($tests as $test): ?>
        <div class="category_panel">
            <h5><?php echo $test['question']?></h5>
            <form action="/test/<?php echo $test['id_category'];?>/<?php echo $test['id_test'];?>/page-<?php echo $numberPage+1; ?>" method="post" class="test">
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
            <p> Правильных ответов:<?php echo $_SESSION['count_answer'];?> из <?php echo $total;?> </p>
            <p> Результат:<?php echo ($_SESSION['count_answer']/$total) *100;?>% </p>
        </div>
            <?php Test::countTestNull();?>

            <?php endif;?>


    </div>



</section>
<?php include_once ROOT.'\views\layouts\footer.php';?>
