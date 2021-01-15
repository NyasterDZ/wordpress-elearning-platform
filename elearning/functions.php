<?php
function gp_files()
{
    
    wp_enqueue_script('jquery-224',"https://code.jquery.com/jquery-2.2.4.js", NULL, '1.0', true);
	wp_enqueue_script('bootstrap',get_theme_file_uri('assets/js/bootstrap.min.js'), NULL, '1.0', true);
	wp_enqueue_script('popper',get_theme_file_uri('assets/js/popper.min.js'), NULL, '1.0', true);
    wp_enqueue_script('carousel',get_theme_file_uri('assets/js/owl.carousel.min.js'), NULL, '1.0', true);
    wp_enqueue_script('jarallax',get_theme_file_uri('assets/js/jarallax.js'), NULL, '1.0', true);
    wp_enqueue_script('magnific-popup',get_theme_file_uri('assets/js/jquery.magnific-popup.min.js'), NULL, '1.0', true);
    wp_enqueue_script('lightbox',get_theme_file_uri('assets/js/lightbox.js'), NULL, '1.0', true);
    wp_enqueue_script('meanmenu',get_theme_file_uri('assets/js/jquery.meanmenu.js'), NULL, '1.0', true);
    wp_enqueue_script('scrollreveal',get_theme_file_uri('assets/js/scrollreveal.min.js'), NULL, '1.0', true);
    wp_enqueue_script('counterup',get_theme_file_uri('assets/js/jquery.counterup.min.js'), NULL, '1.0', true);
    wp_enqueue_script('waypoints',get_theme_file_uri('assets/js/waypoints.min.js'), NULL, '1.0', true);
    wp_enqueue_script('jquery-ui',get_theme_file_uri('assets/js/jquery-ui.js'), NULL, '1.0', true);
    wp_enqueue_script('gmap3',get_theme_file_uri('assets/js/gmap3.min.js'), NULL, '1.0', true);
    wp_enqueue_script('script125',get_theme_file_uri('assets/js/script.js'), NULL, '1.0', true);
    wp_localize_script('script125', 'url', array(
        'link' => get_bloginfo("url")
    )
);
	wp_enqueue_style('world_main_style',get_stylesheet_uri());
}

add_action('wp_enqueue_scripts','gp_files');

function gp_features()
{
//	register_nav_menu('HeaderNavLocation','Header Nav Location');
    add_theme_support('title-tag');
    add_theme_support( 'post-thumbnails' );
    add_image_size('video',370,200,true);
    add_image_size('thumbFrontPage',120,120,true);
    add_image_size('moduleFrontPage',270,220,true);
    add_image_size('coverSingleModule',870,400,true);

}

add_action('after_setup_theme','gp_features');

add_action("wp_ajax_custom_login","gplogin_custom_login");

add_action("wp_ajax_nopriv_custom_login","gplogin_custom_login");


function gplogin_custom_login()
{
    $param = isset($_POST["param"])? trim($_POST["param"]):"";

    if ($param =="test_login")
    {
        $infoPost = array(
            'user_login' =>$_POST["userLogin"],
            'user_password'  =>$_POST["userPass"]
        );

        $user_signon = wp_signon($infoPost,false);

        if (is_wp_error($user_signon))
        {
            echo json_encode(array("status" => 0));
        }
        else
        {
            echo json_encode(array("status" => 1));
        }
    }
    wp_die();
}

add_action("wp_logout","gplogout");
function gplogout()
{
    wp_redirect(home_url());
    exit;
}

      // Pagination
      function numeric_posts_nav($query=NULL) {
          if ($qerey != NULL)
          {
            $wp_query = $query;
          }
          else
          {
            global $wp_query;
            $paged = get_query_var( 'paged' ) ? absint( get_query_var( 'paged' ) ) : 1;
          }
 
        if( is_singular() )
            return;
     
        
     
        /** Stop execution if there's only 1 page */
        if( $wp_query->max_num_pages <= 1 )
            return;
     
        
        $max   = intval( $wp_query->max_num_pages );
     
        /** Add current page to the array */
        if ( $paged >= 1 )
            $links[] = $paged;
     
        /** Add the pages around the current page to the array */
        if ( $paged >= 3 ) {
            $links[] = $paged - 1;
            $links[] = $paged - 2;
        }
     
        if ( ( $paged + 2 ) <= $max ) {
            $links[] = $paged + 2;
            $links[] = $paged + 1;
        }
     
        echo '<div class="couse-pagination text-center ul-li"><ul>' . "\n";
     
        /** Previous Post Link */
        if ( get_previous_posts_link() )
            printf( '<li class="pg-text">%s</li>' . "\n", get_previous_posts_link() );
     
        /** Link to first page, plus ellipses if necessary */
        if ( ! in_array( 1, $links ) ) {
            $class = 1 == $paged ? ' class="active"' : '';
     
            printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( 1 ) ), '1' );
     
            if ( ! in_array( 2, $links ) )
                echo '<li>…</li>';
        }
     
        /** Link to current page, plus 2 pages in either direction if necessary */
        sort( $links );
        foreach ( (array) $links as $link ) {
            $class = $paged == $link ? ' class="active"' : '';
            printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( $link ) ), $link );
        }
     
        /** Link to last page, plus ellipses if necessary */
        if ( ! in_array( $max, $links ) ) {
            if ( ! in_array( $max - 1, $links ) )
                echo '<li>…</li>' . "\n";
     
            $class = $paged == $max ? ' class="active"' : '';
            printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( $max ) ), $max );
        }
     
        /** Next Post Link */
        if ( get_next_posts_link() )
            printf( '<li class="pg-text">%s</li>' . "\n", get_next_posts_link() );
     
        echo '</ul></div>' . "\n";
     
    }

show_admin_bar( false );
//change logo
?>
<?php 

//Here's my custom CSS that removes the back link in a function
function my_login_page_logo() { ?>
    <style type="text/css">
        body.login div#login h1 a {
        width:250px;
        height:50px;
        background-image: url('');
        background-size: 250px 50px;
        }
    </style>
<?php }

//This loads the function above on the login page
add_action( 'login_enqueue_scripts', 'my_login_page_logo' );
