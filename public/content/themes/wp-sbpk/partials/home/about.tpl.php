<?php

$myObjective = get_theme_mod('myObjective');
if(!$myObjective) {
    $myObjective = 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Consequuntur tenetur libero
    reiciendis nulla pariatur nemo veniam quae, distinctio, fugiat perferendis possimus eius deleniti ab
    placeat. Error laudantium voluptas debitis recusandae, inventore, vitae tenetur esse totam quibusdam
    nesciunt deleniti reprehenderit quae praesentium. Beatae facere rerum deleniti consequatur quasi itaque
    dolor vel?';
}

$argEdu = array(
    'post_type' => 'experience',
    'post_status' => 'publish',
    'posts_per_page' => 3,
    'order' => 'DESC'
);
$dataEdu = new WP_Query($argEdu);

$argExp = array(
    'post_type' => 'education',
    'post_status' => 'publish',
    'posts_per_page' => 3,
    'order' => 'DESC'
);
$dataExp = new WP_Query($argExp);
// dump($dataExperiences);
?>

<!-- About-->
    <div id="about" class="basic-1 bg-gray">
        <div class="container">
            <div class="row">
                <div class="col-lg-4">
                    <div class="text-container first">
                        <h2>Hi there I'm Stephane,</h2>
                        <p class="myObjective"><?=$myObjective;?></p>
                    </div> <!-- end of text-container -->
                </div> <!-- end of col -->
                <div class="col-lg-4">
                    <div class="text-container second">
                        <h5>My last educations</h5>
                        <?php while ($dataExp->have_posts()) : $dataExp->the_post(); ?>
                        <div class="time">From <?= get_field('date_from') ?> to <?= get_field('date_to') ?></div>
                        <h6><a href="<?= get_permalink() ?>"><?php print the_title(); ?></a></h6>
                        <p><?php the_excerpt(); ?></p>
                        <?php endwhile; ?>
                    </div> <!-- end of text-container -->
                </div> <!-- end of col -->
                <div class="col-lg-4">
                    <div class="text-container third">
                        <h5>My last experiences</h5>
                    <?php while ($dataEdu->have_posts()) : $dataEdu->the_post(); ?>
                        <div class="time">From <?= get_field('date_from') ?> to <?= get_field('date_to') ?></div>
                        <h6><a href="<?= get_permalink() ?>"><?php print the_title(); ?></a></h6>
                        <p><?php the_excerpt(); ?></p>
                        <?php endwhile; ?>
                    </div> <!-- end of text-container -->
                </div> <!-- end of col -->
            </div> <!-- end of row -->
        </div> <!-- end of container -->
    </div> <!-- end of basic-1 -->
    <!-- end of about -->
