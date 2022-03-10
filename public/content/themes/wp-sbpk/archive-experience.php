<?php
the_post();

$articleId = get_the_ID();

$hasImage = has_post_thumbnail($articleId);

$cities = get_the_terms(
    $post->ID,
    'city'
);

$countries = get_the_terms(
    $post->ID,
    'country'
);

$previous = get_previous_post();
dump($previous);

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

            <h3 class="expH3">
                <?= get_the_title(); ?>
            </h3>
            <p class>
                At <?= get_field('employers') ?>
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

            <p class="expContent"><?php the_content(); ?></p>
            <div class="expPicture">
                <p><?php get_template_part('partials/post-previous-next.tpl'); ?></p>
                <h4>My work certificate :</h4>
                <?php if ($hasImage) :
                    $thumbnail = get_the_post_thumbnail_url(); ?>
                    <img class="expCertificate" src="<?= $thumbnail ?>">
                <?php else : ?>
                    <p>NO DOCUMENT TO DISPLAY</p>
                <?php endif; ?>
            </div>

        </article>
    </main>

    <!-- Footer-->
    <?php get_template_part('partials/footer.tpl'); ?>

    <!-- wp footer -->
    <?php get_footer(); ?>
</body>

</html>