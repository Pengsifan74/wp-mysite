<!DOCTYPE html>
<html lang="en">

<head>
    <!-- wp header -->
    <?php get_header(); ?>
</head>

<body data-spy="scroll" data-target=".fixed-top">

    <!-- Navigation-->
    <?php get_template_part('partials/navbar.ptl'); ?>

    <!-- Header-->
    <?php get_template_part('partials/header.ptl'); ?>

    <!-- section (project) -->
    <?php get_template_part('partials/project.ptl'); ?>

    <!-- wp footer -->
    <?php get_footer(); ?>
</body>

</html>