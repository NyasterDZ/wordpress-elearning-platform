<?php

function gp_cpt()
{
    
    register_post_type('module',array(
        'capability_type' =>'module',
        'map_meta_cap' => true,
        'supports'=>array('title','editor','thumbnail'),
        'taxonomies'  => array( 'category' ),
        'rewrite' => array('slug'=>'modules'),
        'public'=>true,
        'has_archive'=> true,
        'labels' => array(
            'name'=>'Modules',
            'add_new_item'=>'add new ',
            'edit_item' => 'edit ',
            'all_items' => 'All ',
            'singular_name' =>'Module',

        ),
        'menu_icon'=> 'dashicons-category',
        'show_in_rest' => true
    ));

    register_post_type('chapitre',array(
       'capability_type' =>'chapitre',
        'map_meta_cap' => true,
        'supports'=>array('title','editor'),
        'rewrite' => array('slug'=>'chapitres'),
        'public'=>true,
        'has_archive'=> true,
        'labels' => array(
            'name'=>'Chapitres',
            'add_new_item'=>'add new chapter',
            'edit_item' => 'edit chapter',
            'all_items' => 'All chapters',
            'singular_name' =>'chapitre',

        ),
        'menu_icon'=> 'dashicons-tag',
        'show_in_rest' => true
    ));

    register_post_type('cours',array(
        'capability_type' =>'cours',
        'map_meta_cap' => true,
        'supports'=>array('title','editor','thumbnail','comments'),
        'rewrite' => array('slug'=>'cours'),
        'public'=>true,
        'has_archive'=> true,
        'labels' => array(
            'name'=>'cours',
            'add_new_item'=>'add new ',
            'edit_item' => 'edit ',
            'all_items' => 'All ',
            'singular_name' =>'cours',

        ),
        'menu_icon'=> 'dashicons-video-alt3',
        'show_in_rest' => true
    ));

    register_post_type('video',array(
        'capability_type' =>'video',
        'map_meta_cap' => true,
        'supports'=>array('title','editor','thumbnail','comments'),
        'rewrite' => array('slug'=>'video'),
        'public'=>true,
        'has_archive'=> true,
        'labels' => array(
            'name'=>'videos',
            'add_new_item'=>'add new video',
            'edit_item' => 'edit video',
            'all_items' => 'All video',
            'singular_name' =>'video',

        ),
        'menu_icon'=> 'dashicons-video-alt2',
        'show_in_rest' => true
    ));

}

add_action('init','gp_cpt');
