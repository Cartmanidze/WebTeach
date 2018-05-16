<?php include_once ROOT.'\views\layouts\header.php';?>
    <section>
        <div class="category">
            <?php foreach ($categories as $category): ?>
                <div class="category_panel">
                    <h4><a href="/test/<?php echo $category['id_category']?>"><?php echo $category['name'];?></a></h4>
                </div>
        </div>
    <?php endforeach;?>
    </section>
<?php include_once ROOT.'\views\layouts\footer.php';?>
