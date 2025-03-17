<?php
/**
 * Create custom Blocks category.
 */
add_filter( 'block_categories_all', function( $categories ) {
    return array_merge(
        $categories,
        [
            [
                'slug'  => 'awc-boilerplate-blocks',
                'title' => 'awc-boilerplate Blocks',
                'icon'  => null,
            ],
        ]
    );
}, 10, 2 );
