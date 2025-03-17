<?php
/**
 * Cleans the post content and get rid of accidental spaces.
 */
function clean_document_content($content) {
    // Remove multiple spaces and replace them with a single space
    $content = preg_replace('/\s+/', ' ', $content);

    // Remove non-breaking spaces (&nbsp;)
    $content = str_replace("&nbsp;", " ", $content);

    // Remove extra line breaks or carriage returns
    $content = preg_replace('/\r\n|\r|\n/', ' ', $content);

    // Trim spaces from the beginning and end of the content
    $content = trim($content);

    return $content;
}

// Apply the cleanup when saving the post
add_filter('wp_insert_post_data', function ($data) {
    if (isset($data['post_content'])) {
        $data['post_content'] = clean_document_content($data['post_content']);
    }
    return $data;
});
