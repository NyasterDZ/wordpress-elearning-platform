<?php
if (!is_user_logged_in())
{
    wp_redirect('http://automatique-jijel.ml/login');
    exit;
}
get_header();
while(have_posts())
{
    the_post();
?>

    <!-- Start of breadcrumb section
            ============================================= -->
    <section id="breadcrumb" class="breadcrumb-section relative-position backgroud-style">
        <div class="blakish-overlay"></div>
        <div class="container">
            <div class="page-breadcrumb-content text-center">
                <div class="page-breadcrumb-title">
                    <h2 class="breadcrumb-head black bold"><?php the_title();?></h2>
                </div>
            </div>
        </div>
    </section>
    <!-- End of breadcrumb section
        ============================================= -->


    <!-- Start of course details section
        ============================================= -->
    <section id="course-details" class="course-details-section">
        <div class="container">
            <div class="row">
                <div class="col-md-9">
                    <div class="course-details-item">
                        <div class="course-single-pic mb30">
                            <img src="<?php echo get_the_post_thumbnail_url(get_the_ID(),"coverSingleModule");?>" alt="">
                        </div>
                        <div class="course-single-text">
                            <div class="course-title mt10 headline relative-position">
                                <h3><a href="#"><b><?php the_title();?></b></a> <span class="trend-badge text-uppercase bold-font"><i class="<?php the_field("icon_badge_course");?>"></i> <?php the_field("badge_course");?></span></h3>
                            </div>
                            <div class="course-details-content">
                                <?php the_content();?>
                            </div>
                        </div>
                    </div>
                    <!-- /course-details -->

                    <div class="affiliate-market-guide mb65">
                        <div class="section-title-2 mb20 headline text-left">
                            <h2><b>Contenu du module</b></h2>
                        </div>

                        <div class="affiliate-market-accordion">
                            <div id="accordion" class="panel-group">

                                    <?php
                                    $chapters = get_field("chapters");
                                    $countChapter =  count($chapters);
                                    if ($chapters)
                                    {

                                        $count = 1;
                                        foreach($chapters as $chapter)
                                        {
                                            $singleCours = get_field("ref_cours", $chapter->ID);
                                            //var_dump($singleCours);


                                            ?>

                                <div class="panel">
                                    <div class="panel-title" id="heading<?php echo $count;?>">
                                        <div class="ac-head">

                                            <button class="btn btn-link" data-toggle="collapse" data-target="#collapse<?php echo $count;?>" aria-expanded="true" aria-controls="collapseOne">
                                                <span><?php echo $count;?></span><?php echo get_field("titre_chapitre",$chapter->ID);?>
                                            </button>

                                        </div>
                                    </div>
                                    <div id="collapse<?php echo $count;?>" <?php if ($count == 1) { ?> class="collapse show" <?php }else {?> class="collapse " <?php }?> aria-labelledby="heading<?php echo $count;?>" data-parent="#accordion">
                                        <div class="panel-body">
                                            <?php echo $chapter->post_content; ?>
                                            <ul class="list-group list-group-flush">
                                                <?php
                                                if ( $singleCours )
                                                {
                                                    for ($i = 0; $i < count($singleCours); $i++)
                                                    {
                                                        ?>
                                                        <h4><li class="list-group-item"> <i class="far fa-file-pdf"></i> <a  href="<?php echo get_field('file_cours',$singleCours[$i]->ID);?>"><?php echo get_field('titre_du_cours',$singleCours[$i]->ID);?></a></li></h4>
                                                        <?php
                                                    }
                                                }
                                                else
                                                {
                                                    echo _e("Pas de contenu actuellement");
                                                }

                                                ?>
                                            </ul>
                                          </div>
                                    </div>
                                </div>
                                  <?php
                                     $count++;
                                        }
                                    }
                                    else
                                    {
                                        echo _e("Pas de contenu actuellement");

                                    }
                                    ?>

                            </div>
                        </div>
                    </div>
                    <!-- /market guide -->

                </div>

                <div class="col-md-3">
                    <div class="side-bar">

                        <div class="side-bar-widget">
                            <h2 class="widget-title text-capitalize"><span>Autre Module </span></h2>
                            <div class="latest-news-posts">
                                    <?php
                                    $argsModuleRequired = array(

                                        'post_type' => 'module',
                                        'post_status' => 'publish',
                                        'posts_per_page' => 6,
                                        'orderby' => 'rand',
                                        'order' => 'ASC',

                                    );
                                    $moduleRequired = new WP_Query($argsModuleRequired);
                                    while($moduleRequired->have_posts())
                                    {
                                        $moduleRequired->the_post();

                                        ?>
                                <div class="latest-news-area">
                                    <div class="latest-news-thumbnile relative-position">
                                        <img src="<?php echo get_the_post_thumbnail_url(get_the_ID(),'thumbFrontPage');?>" alt="">
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
                                <?php } ?>
                                <div class="view-all-btn bold-font">
                                    <a href="<?php echo site_url('/modules'); ?>">Tous voir <i class="fas fa-chevron-circle-right"></i></a>
                                </div>
                            </div>
                        </div>


                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End of course details section
        ============================================= -->




<?php
}
get_footer("fpage");
?>