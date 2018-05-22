<?php include_once ROOT.'\views\layouts\header.php';?>
<section>
    <div class="category">
        <?php if($numberPage<=$total):?>
        <?php foreach ($tests as $test): ?>
        <div class="category_panel">
            <h5><?php echo $test['question']?></h5>
            <form action="/test/<?php echo $test['id_category'];?>/page-<?php echo $test['id_test']+1; ?>" method="post" class="test">
                <?php $testID = $test['id_test'] ?>
                <?php $answers = Test::getTestAnswer($testID); ?>
                <?php foreach ($answers as $answer): ?>
                <input type="checkbox" value="<?php echo $answer['title'];?>" name="answer[]"/><?php echo $answer['title'];?>
                <?php endforeach;?>

                <input type="submit" name="submit" value="Продолжить" class="button_test" />
            </form>


                <?php echo $pagination->get();?>
            <?php endforeach;?>

        </div>
        <?php else:?>
        <div class="results">
            <p> Результат:<?php echo $_SESSION['count_answer'];?> из <?php echo $total;?> </p>
        </div>

            <?php endif;?>


    </div>



</section>
<?php include_once ROOT.'\views\layouts\footer.php';?>
