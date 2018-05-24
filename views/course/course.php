<?php include_once ROOT.'\views\layouts\header.php';?>
    <section>
        <div class="course_category">
            <?php foreach($courses as $course):?>
                <h4><?php echo $course['text'];?></h4>
            <?php endforeach; ?>
        </div>
    </section>
<?php include_once ROOT.'\views\layouts\footer.php';?>