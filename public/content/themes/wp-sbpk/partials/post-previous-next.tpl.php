<section class="pagination">

    <?php
    $previousPost = get_previous_post();
    // seulement s'il y a un post précédent
    if($previousPost) :
        $url = get_post_permalink($previousPost); ?>
        <a class="button btn-solid-reg mb-5" href="<?= $url ?>"><?= $previousPost->post_title; ?></a>
    <?php endif;

    $nextPost = get_next_post();
    if($nextPost) :
        $url = get_post_permalink($nextPost); ?>
        <a class="button btn-solid-reg mb-5" href="<?= $url ?>"><?= $nextPost->post_title; ?></a>
    <?php endif;
    ?>
</section>