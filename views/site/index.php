<?php include_once ROOT.'\views\layouts\header.php';?>
<section>
<div class="course">
    <h2 >Предлагаемые курсы</h2>
    <?php foreach ($categorys as $category):?>
    <div class="course_wrapper">
        <p><a href="/course/<?php echo $category['id_category'];?>"><?php echo '<img src="data:image/jpeg;base64, '.base64_encode($category['image']).'" width="200" height="200" />';?></a></p>
        <h3><a href="/course/<?php echo $category['id_category'];?>"><?php echo $category['name'];?></a></h3>
    </div>
    <?php endforeach; ?>
</div>
</section>
<?php include_once ROOT.'\views\layouts\footer.php';?>
