<?php
// Create post object
$my_post = array(
    'post_title'    => wp_strip_all_tags( $_POST['post_title'] ),
    'post_content'  => $_POST['post_content'],
    'post_date'     => $_POST['post_date'],
    'post_status'   => $_POST['post_status'],
    'post_author'   => 1,
    'tags_input'    => $_POST['post_tag'],
    'post_category' => explode(',', $_POST['post_category'])
);

/* print_r($my_post);
die(); */

// Insert the post into the database
echo wp_insert_post( $my_post );