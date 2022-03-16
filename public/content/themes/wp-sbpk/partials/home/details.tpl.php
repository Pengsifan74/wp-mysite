<?php
$backgroundImage = get_theme_mod('whyme-picture');

$style = '';
if($backgroundImage) {
    $style = 'background:' .
        'linear-gradient(to bottom right, rgba(25, 26, 29, 0.5), rgba(25, 26, 29, 0.5)),'.
        'url(' . $backgroundImage . ')' . 'center no-repeat'
    ;
}

?>
   
   <!-- Details -->
    <div class="split">
        <div class="area-1" style="<?= $style; ?>; background-size: cover;">
        </div><!-- end of area-1 on same line and no space between comments to eliminate margin white space -->
        <div class="area-2 bg-gray">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">

                        <!-- Text Container -->
                        <div class="text-container">
                            <h2>Why hiring Me</h2>
                            <p>I am not the best WordPress developer ever, but I like coding, I really like WordPress and I work hard when I am passionate by something...</p>
                            <h5>CONTENT MANAGEMENT SYSTEM</h5>
                            <p>My favorite CMS is WordPrees. Its a wonderful tool to work with and I can use plugins like elementor to build a website...</p>
                            <h5>DEVELOPMENT SKILLS</h5>
                            <p>I am familiar and work on a daily basis with HTML, CSS, PHP, JavaScript, Bootstrap and other modern frameworks.</p>

                            <div class="icons-container">
                                <img src="<?= get_theme_file_uri('assets/images/details-icon-html.png') ?>" alt="alternative">
                                <img src="<?= get_theme_file_uri('assets/images/details-icon-css.png') ?>" alt="alternative">
                                <img src="<?= get_theme_file_uri('assets/images/details-icon-bootstrap.png') ?>" alt="alternative">
                                <img src="<?= get_theme_file_uri('assets/images/details-icon-php.png') ?>" alt="alternative">
                                <img src="<?= get_theme_file_uri('assets/images/details-icon-javascript.png') ?>" alt="alternative">
                                <img src="<?= get_theme_file_uri('assets/images/details-icon-vuejs.png') ?>" alt="alternative">
                                <img src="<?= get_theme_file_uri('assets/images/details-icon-vuetify.png') ?>" alt="alternative">                                
                                <img src="<?= get_theme_file_uri('assets/images/details-icon-command.png') ?>" alt="alternative">
                                <img src="<?= get_theme_file_uri('assets/images/details-icon-git.png') ?>" alt="alternative">


                            </div> <!-- end of icons-container -->
                        </div> <!-- end of text-container -->
                        <!-- end of text container -->

                    </div> <!-- end of col -->
                </div> <!-- end of row -->
            </div> <!-- end of container -->
        </div> <!-- end of area-2 -->
    </div> <!-- end of split -->
    <!-- end of details -->