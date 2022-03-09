<?php

$myObjective = get_theme_mod('myObjective');
if(!$myObjective) {
    $myObjective = 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Consequuntur tenetur libero
    reiciendis nulla pariatur nemo veniam quae, distinctio, fugiat perferendis possimus eius deleniti ab
    placeat. Error laudantium voluptas debitis recusandae, inventore, vitae tenetur esse totam quibusdam
    nesciunt deleniti reprehenderit quae praesentium. Beatae facere rerum deleniti consequatur quasi itaque
    dolor vel?';
}
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
                        <div class="time">2019 - PRESENT</div>
                        <h6>Freelance Web Developer</h6>
                        <p>Working happily on my own web projects</p>
                        <div class="time">2018 - 2019</div>
                        <h6>Lead Web Developer</h6>
                        <p>Beautiful project for a major digital agency</p>
                    </div> <!-- end of text-container -->
                </div> <!-- end of col -->
                <div class="col-lg-4">
                    <div class="text-container third">
                        <div class="time">2017 - 2018</div>
                        <h6>Senior Web Designer</h6>
                        <p>Inhouse web designer for ecommerce firm</p>
                        <div class="time">2016 - 2017</div>
                        <h6>Junior Web Designer</h6>
                        <p>Junior web designer for small web agency</p>
                    </div> <!-- end of text-container -->
                </div> <!-- end of col -->
            </div> <!-- end of row -->
        </div> <!-- end of container -->
    </div> <!-- end of basic-1 -->
    <!-- end of about -->