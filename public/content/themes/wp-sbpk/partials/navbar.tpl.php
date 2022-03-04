    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg fixed-top navbar-dark">
        <div class="container">

            <!-- Image Logo -->
            <!-- <a class="navbar-brand logo-image" href="<?= get_home_url(); ?>"><img src="<?= get_theme_file_uri('assets/images/SBPKlogosimple.png') ?>" alt="alternative"></a> -->

            <!-- Text Logo - Use this if you don't have a graphic logo -->
            <a class="navbar-brand logo-text page-scroll" href="<?= get_home_url(); ?>"">SBPK</a>

            <button class=" navbar-toggler p-0 border-0" type="button" data-toggle="offcanvas">
                <span class="navbar-toggler-icon"></span>
                </button>

                <div class="navbar-collapse offcanvas-collapse" id="navbarsExampleDefault">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item">
                            <a class="nav-link page-scroll" href="#header">Home <span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link page-scroll" href="#about">About</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link page-scroll" href="#services">Services</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Drop</a>
                            <div class="dropdown-menu" aria-labelledby="dropdown01">
                            <?php
                        // récupération du menu désiré (ce dernier a été créé dans le backoffice de wp)
                        $menuObject = wp_get_nav_menu_object('Drop');

                        // récupération des items du menu (il faut passer l'id du menu à la fonction wp_get_nav_menu_items)
                        $menuItems = wp_get_nav_menu_items($menuObject->term_id);

                        // pour chaque item du menu, génération du html adéquat
                        foreach ($menuItems as $menuItemData) :

                            $url = $menuItemData->url;
                            $label = $menuItemData->title;
                            ?>

                            <a class="dropdown-item page-scroll" href="<?= $url ?>"><?= $label ?></a>
                                <div class="dropdown-divider"></div>

                            <?php
                        endforeach;
                        ?>
                            </div>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link page-scroll" href="#contact">Contact</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link page-scroll" href="#blog">Blog</a>
                        </li>
                    </ul>
                    <span class="nav-item social-icons">
                        <span class="fa-stack">
                            <a href="#your-link">
                                <i class="fas fa-circle fa-stack-2x"></i>
                                <i class="fab fa-facebook-f fa-stack-1x"></i>
                            </a>
                        </span>
                        <span class="fa-stack">
                            <a href="#your-link">
                                <i class="fas fa-circle fa-stack-2x"></i>
                                <i class="fab fa-twitter fa-stack-1x"></i>
                            </a>
                        </span>
                    </span>
                </div> <!-- end of navbar-collapse -->
        </div> <!-- end of container -->
    </nav> <!-- end of navbar -->
    <!-- end of navigation -->