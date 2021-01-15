<?php
if (!is_user_logged_in())
{
    wp_redirect('/login');
    exit;
}
get_header();
?>

    <!-- Start of breadcrumb section
            ============================================= -->
    <section id="breadcrumb" class="breadcrumb-section relative-position backgroud-style">
        <div class="blakish-overlay"></div>
        <div class="container">
            <div class="page-breadcrumb-content text-center">

            </div>
        </div>
    </section>
    <!-- End of breadcrumb section
        ============================================= -->

    <!-- Start of blog content
        ============================================= -->
    <section id="blog-item" class="blog-item-post">
        <div class="container">
            <div class="blog-content-details">
                <div class="row">
                    <div class="col-md-9">
                        <div class="blog-post-content">
                            <div class="short-filter-tab">

                                <div class="tab-button blog-button ul-li text-center float-right">
                                    <ul class="product-tab">
                                        <li class="active" rel="tab1"><i class="fas fa-th"></i></li>
                                        <li rel="tab2"> <i class="fas fa-list"></i></li>
                                    </ul>
                                </div>
                            </div>

                            <div class="genius-post-item">
                                <div class="tab-container">
                                    <div id="tab1" class="tab-content-1 pt35">
                                        <div class="row">
                                            <?php
                                            $page_object = get_queried_object();
                                            $argsBlogTab1 = array(
                                                'post_type' => $page_object->name,
                                                'post_status' => 'publish',
                                                'posts_per_page' => 10,
                                                'orderby' => 'title',
                                                'order' => 'ASC',
                                                'paged' => get_query_var( 'paged' ) ? absint( get_query_var( 'paged' ) ) : 1
                                            );
                                            $BlogTab1 = new WP_Query($argsBlogTab1);
                                            while($BlogTab1->have_posts())
                                            {
                                                $BlogTab1->the_post();

                                                ?>
                                                <div class="col-md-6">
                                                    <div class="blog-post-img-content">
                                                        <div class="blog-img-date relative-position">
                                                            <div class="blog-thumnile">
                                                                <img src="<?php echo get_the_post_thumbnail_url(get_the_ID());?>" alt="">
                                                            </div>
                                                            <div class="course-price text-center gradient-bg">
                                                                <span><?php echo get_the_date(' d/m/Y' ); ?></span>
                                                            </div>
                                                        </div>
                                                        <div class="blog-title-content headline">
                                                            <h3><a href="<?php the_permalink();?>"><?php the_title();?></a></h3>
                                                            <div class="blog-content">
                                                                <?php the_excerpt(); ?>
                                                            </div>

                                                            <div class="view-all-btn bold-font">
                                                                <a href="<?php the_permalink();?>">Lire plus <i class="fas fa-chevron-circle-right"></i></a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <?php
                                            }
                                            ?>

                                        </div>
                                    </div><!-- 1st tab -->

                                    <div id="tab2" class="tab-content-1 pt35">
                                        <div class="blog-list-view">
                                            <?php
                                            $argsBlogTab2 = array(
                                                'post_type' =>  $page_object->name,
                                                'post_status' => 'publish',
                                                'posts_per_page' => 10,
                                                'orderby' => 'title',
                                                'order' => 'ASC',
                                                'paged' => get_query_var( 'paged' ) ? absint( get_query_var( 'paged' ) ) : 1


                                            );
                                            $BlogTab2 = new WP_Query($argsBlogTab2);
                                            while($BlogTab2->have_posts())
                                            {
                                                $BlogTab2->the_post();

                                                ?>
                                                <div class="list-blog-item">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="blog-post-img-content">
                                                                <div class="blog-img-date relative-position">
                                                                    <div class="blog-thumnile">
                                                                        <img src="<?php echo get_the_post_thumbnail_url(get_the_ID());?>" alt="">
                                                                    </div>
                                                                    <div class="course-price text-center gradient-bg">
                                                                        <span><?php echo get_the_date(' d/m/Y' ); ?></span>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="blog-title-content headline">
                                                                <h3><a href="<?php the_permalink();?>"><?php the_title();?></a></h3>
                                                                <div class="blog-content">
                                                                    <?php the_excerpt(); ?>
                                                                </div>

                                                                <div class="view-all-btn bold-font">
                                                                    <a href="<?php the_permalink();?>">Lire plus <i class="fas fa-chevron-circle-right"></i></a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            <?php } ?>

                                        </div>
                                    </div><!-- 2nd tab -->
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="side-bar">
                            <div class="side-bar-search">

                                <input type="text" class="" placeholder="Search">
                                <button type="submit"><i class="fas fa-search"></i></button>

                            </div>

                            <div class="side-bar-widget">
                                <h2 class="widget-title text-capitalize"> <span>Autre Article</span></h2>
                                <div class="post-categori ul-li-block">
                                    <ul>
                                        <?php
                                        $argsSideBarBlog = array(
                                            'post_type' => 'post',
                                            'post_status' => 'publish',
                                            'posts_per_page' => 5,
                                            'orderby' => 'rand',
                                            'order' => 'ASC',
                                        );
                                        $SideBarBlog = new WP_Query($argsSideBarBlog);
                                        while($SideBarBlog->have_posts())
                                        {
                                            $SideBarBlog->the_post();

                                            ?>
                                            <li class="cat-item"><a href="<?php the_permalink();?>"><?php the_title();?></a></li>
                                        <?php } ?>
                                    </ul>
                                </div>
                            </div>

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
        </div>
    </section>
    <!-- End of blog content
        ============================================= -->
<?php
get_footer("fpage");
?>
