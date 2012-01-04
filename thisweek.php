<?php
/**
 * Template Name: Redirect to This Week
 *
 * Redirects to the latest This Week in the Cafe post.
 */

$target = get_posts(array('numberposts'=>1,'category_name'=>'this-week-in-the-cafe'));
$target = get_permalink($target[0]->ID);

wp_redirect($target);
exit;
