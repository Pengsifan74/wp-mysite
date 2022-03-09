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
    <?php get_template_part('partials/home/header-home.tpl'); ?>

    <!-- Section (home) -->
    <?php get_template_part('partials/home/about.tpl'); ?>
    <?php get_template_part('partials/home/services.tpl'); ?>
    <?php get_template_part('partials/home/details.tpl'); ?>
    <?php get_template_part('partials/home/projects.tpl'); ?>
    <?php get_template_part('partials/home/works.tpl'); ?>
    <?php get_template_part('partials/home/testimonials.tpl'); ?>
    <?php get_template_part('partials/home/divider.tpl'); ?>
    <?php get_template_part('partials/home/questions.tpl'); ?>
    <?php get_template_part('partials/home/contact.tpl'); ?>

    <!-- Footer-->
    <?php get_template_part('partials/footer.tpl'); ?>

    <!-- wp footer -->
    <?php get_footer(); ?>
</body>

</html>