<?php
$argProject = array(
    'post_type' => 'project',
    'post_status' => 'publish',
    'posts_per_page' => 4,
    'order' => 'DESC'
);
$dataProject = new WP_Query($argProject);
?>

<!-- Projects -->
    <div id="projects" class="basic-3">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h2 class="h2-heading">My projects</h2>
                    <p class="p-heading">Listed below are some of the projects I've worked on. They range from basic web page for to more advanced websites using HTML, CSS, JavaScript, PHP, WordPress... </p>
                </div> <!-- end of col -->
            </div> <!-- end of row -->
            <div class="row">
                <div class="col-lg-12">
                    <?php while ($dataProject->have_posts()) : $dataProject->the_post(); ?>
                    <?php $thumbnail = get_the_post_thumbnail_url(); ?> 
                    <div class="text-container">
                        <div class="image-container">
                            <a href="<?= get_permalink() ?>"><img class="img-fluid" alt="alternative" src="<?= $thumbnail; ?>"></a>
                        </div> 
                        <!-- end of image-container -->
                        <p><a class="blue homeProjectText" href="<?= get_permalink() ?>"><?= the_title(); ?></a> : <?php the_excerpt(); ?></p>
                    </div> <!-- end of text-container -->
                    <?php endwhile; ?>

                </div> <!-- end of col -->
            </div> <!-- end of row -->
        </div> <!-- end of container -->
    </div> <!-- end of basic-3 -->
    <!-- end of projects -->
    <img src="" alt="">