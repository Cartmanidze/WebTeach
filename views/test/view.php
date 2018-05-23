<?php include_once ROOT.'\views\layouts\header.php';?>
<section>
    <div class="category">
        <?php if($numberPage<=$total):?>
        <?php foreach ($tests as $test): ?>
        <div class="category_panel">
            <h5><?php echo $test['question']?></h5>
            <form action="/test/<?php echo $test['id_category'];?>/<?php echo $test['id_test'];?>/page-<?php echo $numberPage+1; ?>" method="post" class="test">
                <?php $testID = $test['id_test']; ?>
                <?php foreach ($testAnswerArray as $valueAnswer):?>
                    <?php if($valueAnswer!=''):?>
                <input type="checkbox" value="<?php echo $valueAnswer;?>" name="answer[]" class="check" /><?php echo $valueAnswer;?>
                        <?php endif; ?>
                <?php endforeach;?>
                <input type="submit" name="submit" value="Продолжить" class="button_test"  />
            </form>
                <?php echo $pagination->get();?>
            <?php endforeach;?>

        </div>
        <?php else:?>
        <div class="results">
            <p> Результат:<?php echo $_SESSION['count_answer'];?> из <?php echo $total;?> </p>
        </div>
            <?php Test::countTestNull();?>

            <?php endif;?>


    </div>



</section>
<?php include_once ROOT.'\views\layouts\footer.php';?>
