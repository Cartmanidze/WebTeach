<?php include_once ROOT.'\views\layouts\header.php';?>
<section>
<div class="course">
    <?php foreach ($categorys as $category):?>
    <div class="course_wrapper">
        <p><?php echo '<img src="data:image/jpeg;base64, '.base64_encode($category['image']).'" width="200" height="200" />';?></p>
        <h3><?php echo $category['name'];?></h3>
    </div>
    <?php endforeach; ?>
</div>
</section>
<?php include_once ROOT.'\views\layouts\footer.php';?>
