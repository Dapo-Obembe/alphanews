<?php
/**
 * Create custom Blocks category.
 */
if( !defined( 'ABSPATH' )) exit;

add_filter( 'block_categories_all', function( $categories ) {
    return array_merge(
        $categories,
        [
            [
                'slug'  => 'alphanews-blocks',
                'title' => 'Alpha News Blocks',
                'icon'  => null,
            ],
        ]
    );
}, 10, 2 );
