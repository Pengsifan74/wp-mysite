<?php
the_post();

$articleId = get_the_ID();

$hasImage = has_post_thumbnail($articleId);

// si l'article a une image de mise en avant
if ($hasImage) {
    // récupération de l'url de l'image de mise en avant
    $thumbnail = get_the_post_thumbnail_url();
} else {
    $thumbnail = 'https://media.istockphoto.com/photos/long-wave-on-the-coast-dawn-on-the-sea-tunisia-picture-id1173935107?b=1&k=20&m=1173935107&s=170667a&w=0&h=JkyPsbVUkRTuLlNgiS63HEqbMJTRPgE8jiGsNRfWlyU=';
}

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

            <p class="expContent"><?php the_content(); ?></p>
            <div class="expPicture">
                <h4>My work certificate :</h4>
                <img class="post__header__image" src="<?= $thumbnail ?>">
            </div>

        </article>
    </main>

    <!-- Footer-->
    <?php get_template_part('partials/footer.tpl'); ?>

    <!-- wp footer -->
    <?php get_footer(); ?>
</body>

</html>