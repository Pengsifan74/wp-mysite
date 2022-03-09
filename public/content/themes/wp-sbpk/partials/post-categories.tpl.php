<?php
// récupération des categories du post
$categories = get_the_category();
if(!empty($categories)) : ?>
    <p>Dans : </p>
    <?php foreach($categories as $index => $category) :
        $categoryURL = get_category_link($category); ?>
        <a href="<?= $categoryURL ?>" class="post__footer__category-link">
            <?= $category->name; ?>
        </a>
    <?php endforeach;
endif;
?>