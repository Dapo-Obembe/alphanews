<?php
/**
 * Create custom Blocks category.
 */
add_filter( 'block_categories_all', function( $categories ) {
    return array_merge(
        $categories,
        [
            [
                'slug'  => 'swiftpress-blocks',
                'title' => 'swiftpress Blocks',
                'icon'  => null,
            ],
        ]
    );
}, 10, 2 );
