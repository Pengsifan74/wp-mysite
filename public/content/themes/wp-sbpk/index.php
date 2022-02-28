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

    <!-- Section (home) -->
    <?php get_template_part('partials/home.tpl'); ?>

    <!-- Footer-->
    <?php get_template_part('partials/footer.tpl'); ?>

    <!-- wp footer -->
    <?php get_footer(); ?>
</body>

</html>