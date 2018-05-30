<?php include_once ROOT.'\views\layouts\header.php';?>
<section>
<div class="course">
    <h2 >Предлагаемые курсы</h2>
    <?php if(!User::isGuest()):?>
    <?php foreach ($categories as $category):?>
    <div class="course_wrapper">
        <p><a href="/course/<?php echo $category['id_category'];?>"><?php echo '<img src="data:image/jpeg;base64, '.base64_encode($category['image']).'" width="200" height="200" />';?></a></p>
        <h3><a href="/course/<?php echo $category['id_category'];?>"><?php echo $category['name'];?></a></h3>
    </div>
    <?php endforeach; ?>
    <?php else:?>
    <?php foreach ($categories as $category):?>
        <div class="course_wrapper">
            <p><?php echo '<img src="data:image/jpeg;base64, '.base64_encode($category['image']).'" width="200" height="200" />';?></p>
            <h3><?php echo $category['name'];?></h3>
        </div>
    <?php endforeach; ?>
    <?php endif;?>
</div>

</section>
<?php include_once ROOT.'\views\layouts\footer.php';?>
