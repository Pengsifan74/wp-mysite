<?php
the_post();

$articleId = get_the_ID();

$hasImage = has_post_thumbnail($articleId);

$schools = get_the_terms(
    $post->ID,
    'school'
);

$cities = get_the_terms(
    $post->ID,
    'city'
);

$countries = get_the_terms(
    $post->ID,
    'country'
);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <!-- wp header -->
    <?php get_header(); ?>
</head>

<body data-spy="scroll" data-target=".fixed-top">

    <!-- Navigation-->
    <?php get_template_part('partials/navbar.tpl'); ?>

    <!-- Header-->
    <?php get_template_part('partials/header.tpl'); ?>

    <main>
        <article class="container">

            <h3 class="eduTitle">
                <?= get_the_title(); ?>
            </h3>
            <p class>
                At <?php
                    if (count($schools) <= 1) : ?>
                    <?php foreach ($schools as $key => $value) :
                            echo $value->name ?>
                    <?php endforeach;
                    else : ?>
                    <?php foreach ($schools as $key => $value) :
                            echo $value->name ?>,
            <?php endforeach;
                    endif; ?>
            </p>
            <p>
                From <?= get_field('date_from') ?> to <?= get_field('date_to') ?>
            </p>

            <p><?php
                if (count($cities) <= 1) : ?>
                    City :
                    <?php foreach ($cities as $key => $value) :
                        echo $value->name ?>
                    <?php endforeach;
                else : ?>
                    Cities :
                    <?php foreach ($cities as $key => $value) :
                        echo $value->name ?>,
            <?php endforeach;

                endif; ?>
            </p>

            <p><?php
                if (count($countries) <= 1) : ?>
                    Country :
                    <?php foreach ($countries as $key => $value) :
                        echo $value->name ?>
                    <?php endforeach;
                else : ?>
                    Countries :
                    <?php foreach ($countries as $key => $value) :
                        echo $value->name ?>,
            <?php endforeach;

                endif; ?>
            </p>

            <p class="eduContent"><?php the_content(); ?></p>
            <div class="eduPicture">
                <p><?php get_template_part('partials/post-previous-next.tpl'); ?></p>
                <h4>My certificate or diploma :</h4>
                <?php if ($hasImage) :
                    $thumbnail = get_the_post_thumbnail_url(); ?>
                    <img class="eduCertificate" src="<?= $thumbnail ?>">
                <?php else : ?>
                    <p>NO DOCUMENT TO DISPLAY</p>
                <?php endif; ?>
                <div class="picBottom"></div>
            </div>

        </article>
    </main>

    <!-- Footer-->
    <?php get_template_part('partials/footer.tpl'); ?>

    <!-- wp footer -->
    <?php get_footer(); ?>
</body>

</html>