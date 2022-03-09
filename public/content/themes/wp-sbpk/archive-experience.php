<?php
the_post();
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
<article class="post">
            <header class="post__header">

            <?php
            $articleId = get_the_ID();
            dump(get_post($articleId));

            $hasImage = has_post_thumbnail($articleId);

            // si l'article a une image de mise en avant
            if($hasImage) {
                // récupération de l'url de l'image de mise en avant
                $thumbnail = get_the_post_thumbnail_url();
            }
            else {
                $thumbnail = 'https://media.istockphoto.com/photos/long-wave-on-the-coast-dawn-on-the-sea-tunisia-picture-id1173935107?b=1&k=20&m=1173935107&s=170667a&w=0&h=JkyPsbVUkRTuLlNgiS63HEqbMJTRPgE8jiGsNRfWlyU=';
            }
            ?>
            <img class="post__header__image" src="<?= $thumbnail ?>">';

                <h3 class="post__header__title">
                    <?=get_the_title();?>
                </h3>
            </header>

            <main class="post__content">
                <?php the_content();?>
            </main>

        </article>
</main>

    <!-- Footer-->
    <?php get_template_part('partials/footer.tpl'); ?>

    <!-- wp footer -->
    <?php get_footer(); ?>
</body>

</html>