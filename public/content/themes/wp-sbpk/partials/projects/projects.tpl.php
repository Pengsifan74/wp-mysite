<?php
the_post();

$articleId = get_the_ID();

$hasImage = has_post_thumbnail($articleId);
$hasWebsiteLink = get_field('website_link');

$technologies = get_the_terms(
    $post->ID,
    'technology'
);

?>
<!-- Title -->
<div class="container">
    <h2 class="projectTitle">
        <?= get_the_title(); ?>
    </h2>
</div>
<!-- end of title -->

<!-- Basic -->
<div class="ex-basic-1 pt-5 pb-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                    <?php if ($hasImage) :
                        $thumbnail = get_the_post_thumbnail_url(); ?>
                        <a href="<?= $hasWebsiteLink; ?>" target="_blank"><img class="img-fluid img-thumbnail mt-2 mb-3" src="<?= $thumbnail; ?>" alt="picture of Tribut project"></a>
                    <?php else : ?>
                        <p>NO DOCUMENT TO DISPLAY</p>
                    <?php endif; ?>
            </div> <!-- end of col -->
            <div class="projectCenter">
                <p class="projectCenter">You can click on the link next below to open the website into another windows...</p>
                <p><a href="<?= $hasWebsiteLink; ?>" target="_blank"><?= get_the_title(); ?>, the website</a></p>
            </div>
        </div> <!-- end of row -->
    </div> <!-- end of container -->
</div> <!-- end of ex-basic-1 -->
<!-- end of basic -->


<!-- Basic -->
<div class="ex-basic-1 pt-4">
    <div class="container">
        <div class="row">
            <div class="col-xl-10 offset-xl-1">
                <p><?php the_content(); ?></p>
            </div> <!-- end of col -->
        </div> <!-- end of row -->
    </div> <!-- end of container -->
</div> <!-- end of ex-basic-1 -->
<!-- end of basic -->

<!-- Basic -->
<div class="ex-basic-1 pt-3 pb-5">
    <div class="container">
        <div class="row">
            <div class="col-xl-10 offset-xl-1">

                <h2 class="mb-4">Technologies & tools</h2>

                <ul class="list-unstyled li-space-lg mb-5">
                    <?php foreach ($technologies as $key =>$value) : ?>
                    <li class="media">
                        <i class="fas fa-square"></i>
                        <div class="media-body"><strong>
                                <?= $value->name; ?>
                            </strong></div>
                        </li>
                        <?php endforeach; ?>
                </ul>

                <a class="btn-solid-reg mb-5" href="index.html">Back</a>
            </div> <!-- end of col -->
        </div> <!-- end of row -->
    </div> <!-- end of container -->
</div> <!-- end of ex-basic-1 -->
<!-- end of basic -->

<!-- The rest of the layout for this page is in the file projects.init.php if needed later -->