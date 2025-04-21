<?php
/**
 * Modify the comment form cookies message.
 * Works for the Block Editor.
 * 
 * @return $block_content Return the modified cookies message.
 */
if( !defined( 'ABSPATH' )) exit;

function modify_comment_form_block($block_content, $block) {
    // Check if this is the Post Comments Form block
    if ($block['blockName'] === 'core/post-comments-form') {
        // Modify the cookies message directly in the rendered block content
        $block_content = str_replace(
            '<p class="comment-form-cookies-consent">',
            '<p class="comment-form-cookies-consent has-small-font-size" style="display:flex;align-items:center;">',
            $block_content
        );
        $block_content = str_replace(
            'Save my name, email, and website in this browser for the next time I comment.',
            'Save my name and email for future comments on this site.',
            $block_content
        );
    }

    return $block_content;
}
add_filter('render_block', 'modify_comment_form_block', 10, 2);


