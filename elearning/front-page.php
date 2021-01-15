<?php
get_header();
?>
<!-- Start of slider section
    ============================================= -->
<section id="slide" class="slider-section pt150">
    <div id="slider-item" class="slider-item-details">

        <div class="slider-area slider-bg-2 relative-position">
            <div class="slider-text">
                <div class="section-title mb20 headline text-center ">
                    <div class="layer-1-1">
                        <span class="subtitle text-uppercase">département automatique université de jijel</span>
                    </div>
                    <div class="layer-1-2">
                        <h2 class="secoud-title"> Chercher <span>des cours.</span></h2>
                    </div>
                </div>
                <div class="layer-1-3">
                    <div class="search-course mb30 relative-position">

                            <input class="course" name="course" id="course" type="text" placeholder="tapez l'intitulé du cours que vous voulez chercher">
                            <div class="nws-button text-center  gradient-bg text-capitalize">
                                <button type="submit" id="submitSearch" value="Submit">chercher</button>
                            </div>
                            <div class="display-search-course"></div>

                    </div>
                    <div class="layer-1-4">
                        <div class="slider-course-category ul-li text-center">
                            <span class="float-left">Par catéguories:</span>
                            <ul>
                                <li><a href="<?php echo site_url('/category/l2'); ?>">Licence 2</a></li>
                                <li><a href="<?php echo site_url('/category/l3'); ?>">Licence 3</a></li>
                                <li><a href="<?php echo site_url('/category/m1'); ?>">Master 1</a></li>
                                <li><a href="<?php echo site_url('/category/m2'); ?>">Master 2</a></li>
                                <li><a href="<?php echo site_url('/category/affichage'); ?>">Affichage</a></li>

                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</section>
<!-- End of slider section
    ============================================= -->



<!-- Start of Search Courses
    ============================================= -->
<section id="search-course" class="search-course-section search-course-secound">
    <div class="container">
        <div class="search-counter-up">
            <div class="row">
                <div class="col-md-3">
                    <div class="counter-icon-number "  >
                        <div class="counter-icon">
                            <i class="text-gradiant flaticon-graduation-hat"></i>
                        </div>
                        <div class="counter-number">
                            <span class="counter-count bold-font"><?php echo wp_count_posts( 'module' )->publish;?> </span><span>+</span>
                            <p>Modules</p>
                        </div>
                    </div>
                </div>
                <!-- /counter -->

                <div class="col-md-3">
                    <div class="counter-icon-number "  >
                        <div class="counter-icon">
                            <i class="text-gradiant flaticon-book"></i>
                        </div>
                        <div class="counter-number">
                            <span class="counter-count bold-font"><?php echo wp_count_posts( 'cours' )->publish;?></span><span>+</span>
                            <p>Cours+TD+TP</p>
                        </div>
                    </div>
                </div>
                <!-- /counter -->

                <div class="col-md-3">
                    <div class="counter-icon-number "  >
                        <div class="counter-icon">
                            <i class="text-gradiant flaticon-favorites-button"></i>
                        </div>
                        <div class="counter-number">
                            <span class="counter-count bold-font"><?php echo wp_count_posts( 'post' )->publish;?></span><span>+</span>
                            <p>Articles</p>
                        </div>
                    </div>
                </div>
                <!-- /counter -->

                <div class="col-md-3">
                    <div class="counter-icon-number "  >
                        <div class="counter-icon">
                            <i class="text-gradiant flaticon-group"></i>
                        </div>
                        <div class="counter-number">
                            <span class="counter-count bold-font">10</span><span>+</span>
                            <p>Prof</p>
                        </div>
                    </div>
                </div>
                <!-- /counter -->
            </div>
        </div>
    </div>
</section>
<!-- End of Search Courses
    ============================================= -->


<!-- Start latest section
    ============================================= -->
<section id="latest-area" class="latest-area-section home-page-three">
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="latest-area-content">
                    <div class="section-title-2 mb65 headline text-left "  >
                        <h2>Derniers <span>Cours.</span></h2>
                    </div>
                    <div class="latest-news-posts">
                        <?php
                        $argsLastCours = array(
                            'post_type' => 'cours',
                            'post_status' => 'publish',
                            'posts_per_page' => 3,
                            'order' => 'ASC',

                        );
                        $getLastCours = new WP_Query($argsLastCours);
                        if ($getLastCours->have_posts())
                        {
                        while($getLastCours->have_posts())
                        {
                            $getLastCours->the_post();
                        ?>

                        <div class="latest-news-area "  >
                            <div class="latest-news-thumbnile relative-position">
                            <?php if (is_user_logged_in())
                                    { ?>
                                <img src="<?php echo get_the_post_thumbnail_url(get_the_ID(),'thumbFrontPage');?>" alt="">
                                    <?php } else { ?>
                                 <img src="<?php echo get_theme_file_uri('assets/img/course/course.jpg'); ?>" alt="">
                                <?php } ?>
                                <div class="hover-search">
                                    <i class="fas fa-search"></i>
                                </div>
                                <div class="blakish-overlay"></div>
                            </div>
                            <div class="date-meta">
                                <i class="fas fa-calendar-alt"></i>  <?php echo get_the_date(' d/m/Y' ); ?>
                            </div>
                            <h3 class="latest-title bold-font"><a href="<?php the_field("file_cours");?>"><?php the_field("titre_du_cours");?></a></h3>

                        </div>
                        <!-- /post -->
                            <?php
                        }
                        }?>

                        <div class="view-all-btn bold-font "  >
                            <a href="<?php echo site_url('/module'); ?>">Voir tous les Modules <i class="fas fa-chevron-circle-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /Affichage -->
            <div class="col-md-4">
                <div class="latest-area-content">
                    <div class="section-title-2 mb65 headline text-left "  >
                        <h2>Dernière <span>Publication.</span></h2>
                    </div>
                    <div class="latest-news-posts">
                        <?php
                        $argsLastPub = array(
                            'post_type' => 'post',
                            'post_status' => 'publish',
                            'posts_per_page' => 3,
                            'order' => 'ASC',

                        );
                        $getLastAffichage = new WP_Query($argsLastPub);
                        if ($getLastAffichage->have_posts())
                        {
                        while($getLastAffichage->have_posts())
                        {
                        $getLastAffichage->the_post();
                        ?>
                        <div class="latest-news-area "  >
                            <div class="latest-news-thumbnile relative-position">
                            <?php if (is_user_logged_in())
                                    { ?>
                                <img src="<?php echo get_the_post_thumbnail_url(get_the_ID(),'thumbFrontPage');?>" alt="">
                                    <?php } else { ?>
                                 <img src="<?php echo get_theme_file_uri('assets/img/course/course.jpg'); ?>" alt="">
                                <?php } ?>
                                <div class="hover-search">
                                    <i class="fas fa-search"></i>
                                </div>
                                <div class="blakish-overlay"></div>
                            </div>
                            <div class="date-meta">
                                <i class="fas fa-calendar-alt"></i> <?php echo get_the_date(' d/m/Y' ); ?>
                            </div>
                            <h3 class="latest-title bold-font"><a href="<?php the_permalink();?>"><?php the_title();?></a></h3>

                        </div>
                        <!-- /post -->
                            <?php
                        }
                        }?>

                        <div class="view-all-btn bold-font "  >
                            <a href="<?php echo site_url('/category/affichage'); ?>">Voir l'affichage <i class="fas fa-chevron-circle-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /Affichage -->

            <div class="col-md-4">
                <div class="latest-area-content">
                    <div class="section-title-2 mb65 headline text-left "  >
                        <h2>Dernière <span>Video.</span></h2>
                    </div>
                    <?php
                    $argsvideo = array(
                        'post_type' => 'video',
                        'post_status' => 'publish',
                        'orderby' => 'rand',
                        'posts_per_page' => 1,
                     );
                    $getvideo = new WP_Query($argsvideo);
                    if ($getvideo->have_posts())
                    {
                    while($getvideo->have_posts())
                    {
                    $getvideo->the_post();
                    ?>
                    <div class="latest-video-poster relative-position mb20 "  >
                    <?php if (is_user_logged_in())
                                    { ?>
                                <img src="<?php echo get_the_post_thumbnail_url(get_the_ID(),'video');?>" alt="">
                                    <?php } else { ?>
                                 <img src="<?php echo get_theme_file_uri('assets/img/course/course.jpg'); ?>" alt="">
                                <?php } ?>
                        <div class="video-play-btn text-center gradient-bg">
                            <a class="popup-with-zoom-anim" href="<?php echo get_field('video_link');?>"><i class="fas fa-play"></i></a>
                        </div>
                    </div>
                    <h3 class="latest-title bold-font "  ><a href="#"><?php echo get_the_title();?></a></h3>
                    <p class="mb25" ><?php echo get_the_content();?></p>
                    <div class="view-all-btn bold-font "  >
                        <a href="<?php echo site_url('/video'); ?>">Voir tous le Videos <i class="fas fa-chevron-circle-right"></i></a>
                    </div>
                    <?php } } ?>
                </div>
            </div>
            <!-- /. -->
        </div>
    </div>
</section>
<!-- End latest section
    ============================================= -->
<!-- Start of best course
    ============================================= -->
<section id="best-course" class="why-choose-section best-course-section best-course-v2">
    <div class="container">
        <div class="section-title mb45 headline text-center "  >
            <span class="subtitle text-uppercase">Modules Automatique</span>
            <h2>Suivez<span> Vos Modules</span></h2>
        </div>
        <div class="best-course-area mb45">
            <div class="row">
                <?php
                $argsModule = array(
                    'post_type' => 'module',
                    'post_status' => 'publish',
                    'orderby' => 'rand',
                    'posts_per_page' => 8,
                 );
                $getModule = new WP_Query($argsModule);
                if ($getModule->have_posts())
                {
                while($getModule->have_posts())
                {
                    $getModule->the_post();

                ?>
                <div class="col-md-3">
                    <div class="best-course-pic-text relative-position "  >
                        <div class="best-course-pic relative-position">
                            <?php if (is_user_logged_in())
                                    { ?>
                                <img src="<?php echo get_the_post_thumbnail_url(get_the_ID(),'moduleFrontPage');?>" alt="">
                                    <?php } else { ?>
                                 <img src="<?php echo get_theme_file_uri('assets/img/course/course.jpg'); ?>" alt="">
                                <?php } ?>
                            <div class="trend-badge-2 text-center text-uppercase">
                                <i class="<?php echo get_field('icon_badge_course');?>"></i>
                                <span><?php echo get_field('badge_course');?></span>
                            </div>
                            <div class="course-price text-center gradient-bg">
                                <span><?php echo get_the_category(get_the_ID())[0]->name;?></span>
                            </div>
                            <div class="course-details-btn">
                                <a href="<?php the_permalink();?>">plus de détails <i class="fas fa-arrow-right"></i></a>
                            </div>
                            <div class="blakish-overlay"></div>
                        </div>
                        <div class="best-course-text">
                            <div class="course-title mb20 headline relative-position">
                                <h3><a href="<?php the_permalink();?>"><?php the_title();?></a></h3>
                            </div>
                            <div class="course-meta">
                                <span class="course-category"><a href="#">Prof</a></span>
                                <span class="course-author"><a href="#"><?php the_field("prof");?></a></span>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /course -->
                <?php } } ?>

            </div>
        </div>


    </div>
</section>
<!-- End of best course
    ============================================= -->

<?php

get_footer('fpage');
?>