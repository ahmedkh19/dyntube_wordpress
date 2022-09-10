<?php
/**
 * The plugin bootstrap file
 *
 * @link:   https://thinkvolc.com
 * @since   2022.7
 * @package WP_DYNTUBE
 *
 * @wordpress-plugin
 * Plugin Name:       DynTube
 * Plugin URI:        https://dyntube.com
 * Description:       Upload your videos directly to DynTube
 * Version:           2022.1.2
 * Author:            thinkvolc
 * Author URI:        https://thinkvolc.com
 * Text Domain:       dyntube
 * License:           GPLv3
 * License URI:       http://www.gnu.org/licenses/gpl.html
 * Requires PHP:      7.4
*/
require_once "class-dyntube_api.php";
$class = new DynTube_API();

// If this file is called directly, abort.
function wp_test() {
    // $fh = fopen(__DIR__ . "/sitevisitors.txt", "w");
    // if($fh==false)
    //     die("unable to create file");
    // fputs ($fh, 1);
    // fclose ($fh);

}
add_action('init', 'wp_test');

add_action( "added_post_meta", 'upload_video_to_dyntube', 10 , 4);
function upload_video_to_dyntube($meta_id, $post_ID, $meta_key, $meta_value ) {
    
    if (wp_attachment_is('video', $post_ID)) {
        $post = get_post($post_ID);
        $result = $class->_BASEAPI($post->guid);
        $fh = fopen(__DIR__ . "/data.txt", "w");
        fputs ($fh, $result);
        fclose ($fh);
    }

}