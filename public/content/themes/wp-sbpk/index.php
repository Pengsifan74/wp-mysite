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

    <?php
$contact = get_page('Contact');
dump($contact);
?>

    <!-- Section (home) -->
    <?php get_template_part('partials/home/about.tpl'); ?>
    <?php get_template_part('partials/home/services.tpl'); ?>
    <?php get_template_part('partials/home/details.tpl'); ?>
    <?php get_template_part('partials/home/projects.tpl'); ?>
    <?php get_template_part('partials/home/works.tpl'); ?>
    <!-- get_template_part('partials/home/testimonials.tpl'); -->
    <!-- ('partials/home/divider.tpl'); -->
    <!-- get_template_part('partials/home/questions.tpl'); -->
    <!-- get_template_part('partials/home/contact.tpl'); -->

    <!-- Footer-->
    <?php get_template_part('partials/footer.tpl'); ?>

    <!-- wp footer -->
    <?php get_footer(); ?>
</body>

</html>