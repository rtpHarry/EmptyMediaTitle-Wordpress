<?php
/*
Plugin Name: Empty Media Title On Upload
Plugin URI: https://runthings.dev
Description: Sets the image title attribute to an empty field on upload, instead of setting it to the filename
Version: 1.0.0
Author: Matthew Harris, runthings.dev
Author URI: https://runthings.dev/
*/

/**
 * Empty the image attachment's title only when inserted not updated
 * https://wordpress.stackexchange.com/a/211873/60500
 */
add_filter( 'wp_insert_attachment_data', function( $data, $postarr )
{
    if( 
        empty( $postarr['ID'] ) 
        && isset( $postarr['post_mime_type'] )
        && wp_match_mime_types( 'image', $postarr['post_mime_type'] ) 
    )
        $data['post_title'] = '';

    return $data;
}, 10, 2 );