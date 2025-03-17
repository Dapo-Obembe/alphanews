<?php
/**
 * Remove the comment form website URL field.
 */
function remove_comment_form_website_field($fields) {
    if (isset($fields['url'])) {
        unset($fields['url']);
    }
    return $fields;
}
add_filter('comment_form_default_fields', 'remove_comment_form_website_field');
