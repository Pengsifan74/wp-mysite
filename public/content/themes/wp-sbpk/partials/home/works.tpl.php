<?php
$argProject = array(
    'post_type' => 'project',
    'post_status' => 'publish',
    'posts_per_page' => 9,
    'order' => 'ASC'
);
$dataProject = new WP_Query($argProject);
?>
    
    <!-- Works -->
    <div class="basic-4">
        <div class="container">
            <div class="row">
            <?php while ($dataProject->have_posts()) : $dataProject->the_post(); ?>
                    <?php $thumbnail = get_the_post_thumbnail_url(); ?> 
                <div class="col-lg-4">
                    <div class="text-container">
                        <div class="image-container">
                            <a href="<?= get_permalink() ?>">
                                <img class="img-fluid" src="<?= $thumbnail; ?>" alt="alternative">
                            </a>
                        </div> <!-- end of image-container -->
                        <p><a class="blue homeProjectText" href="<?= get_permalink() ?>"><?= the_title(); ?></a> : <?php the_excerpt(); ?></p>
                    </div> <!-- end of text-container -->
                </div> <!-- end of col -->
                <?php endwhile; ?>
            </div> <!-- end of row -->
        </div> <!-- end of container -->
    </div> <!-- end of basic-4 -->
    <!-- end of works -->