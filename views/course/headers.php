<?php include_once ROOT.'\views\layouts\header.php';?>
    <section>
        <div class="course_category">
            <?php foreach($headers as $header):?>
                <h4><a href="/course/header-<?php echo $header['id_header'];?>"><?php echo $header['header'];?></a></h4>
            <?php endforeach; ?>
        </div>
    </section>
<?php include_once ROOT.'\views\layouts\footer.php';?>