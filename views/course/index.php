<?php include_once ROOT.'\views\layouts\header.php';?>
<section>
    <div class="course_category">
        <?php foreach($categories as $category):?>
        <h4><a href="/course/<?php echo $category['id_category'];?>"><?php echo $category['name'];?></a></h4>
        <?php endforeach; ?>
    </div>
</section>
<?php include_once ROOT.'\views\layouts\footer.php';?>