<?php
require ('/wp-blog-header.php');

if($_SERVER['HTTP_REFERER'] == 'http://localhost/jecreve/') {
    global $wpdb;
    $id = $_GET['id'];
    $likes = (get_post($id)->likes)+1;
    $my_post = array(
        'ID'           => $id,
        'post_title' => "New test",
        'likes'   => $likes,
    );

    $wpdb->update(
        $wpdb->prefix.'posts',
        array('likes' => $likes),
        array('ID' => $id)
    );
    header("Location: ".$_SERVER['HTTP_REFERER']);
}