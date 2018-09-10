<?php
/**
 * Created by PhpStorm.
 * User: drizy
 * Date: 8/23/18
 * Time: 1:12 PM
 *
 * @package
 */

if (!define('WP_UNINSTALL_PLUGIN' )){
    die;
}

//clear data stored in database

$books = get_posts(array('post_type'=>'book', 'numberposts' => -1));

foreach ($books as $book){
    wp_delete_post($book->ID, true);
}