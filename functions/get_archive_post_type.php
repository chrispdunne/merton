<?php function get_archive_post_type() {
    return is_archive() ? get_queried_object()->name : false;
}
function get_archive_no_posts_type() {
    global $wp_query;
    return $wp_query->query_vars['post_type'];
}