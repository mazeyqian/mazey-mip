<?php
// Create post object
$my_post = array(
    'post_title'    => wp_strip_all_tags( $_POST['post_title'] ),
    'post_content'  => $_POST['post_content'],
    /* 'post_title'    => wp_strip_all_tags( 'post_title测试接收' ),
    'post_content'  => 'post_content测试接收', */
    'post_status'   => 'publish',
    'post_author'   => 1,
    'tags_input' => $_POST['post_tag'],
    'post_category' => array( $_POST['post_category'] )
);

// Insert the post into the database
echo wp_insert_post( $my_post );