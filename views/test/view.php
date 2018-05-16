<?php include_once ROOT.'\views\layouts\header.php';?>
<section>
    <div class="category">
        <?php foreach ($tests as $test): ?>
        <div class="category_panel">
            <h5><?php echo $test['question']?></h5>
            <form action="/test/<?php echo $test['id_test'];?>/page-2" method="post" class="test">
                <?php $testID = $test['id_test'] ?>
                <?php $answers = Test::getTestAnswer($testID); ?>
                <?php foreach ($answers as $answer): ?>
                <input type="checkbox" value="<?php echo $answer['title'];?>" name="answer[]"/><?php echo $answer['title'];?>
                <?php endforeach;?>

                <input type="submit" name="submit" value="Продолжить" class="button_test" />
            </form>
            <?php endforeach;?>
            <button class="button-large">Старт</button>
        </div>

    </div>
    <?php echo $pagination->get();?>

</section>
<?php include_once ROOT.'\views\layouts\footer.php';?>
