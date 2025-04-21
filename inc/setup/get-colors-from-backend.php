<?php
/**
 * Load and apply custom theme colors from ACF backend.
 */
if( !defined( 'ABSPATH' )) exit;

/**
 * Get all theme colors from ACF with fallback defaults.
 */
function alphanews_get_all_theme_colors() {
	static $colors = null;

	if ($colors === null) {
		$defaults = [
			'primary_color'   => '#1a1f2b',
			'secondary_color' => '#f5f7fa',
			'accent_color'    => '#ffc857'
		];

		$colors = [];

		if (have_rows('website_colors', 'option')) {
			while (have_rows('website_colors', 'option')) {
				the_row();

				$colors = [
					'primary_color'   => get_sub_field('primary_color') ?: $defaults['primary_color'],
					'secondary_color' => get_sub_field('secondary_color') ?: $defaults['secondary_color'],
					'accent_color'    => get_sub_field('accent_color') ?: $defaults['accent_color'],
				];
			}
		} else {
			$colors = $defaults;
		}
	}

	return $colors;
}

function get_theme_color($color_name) {
	$colors = alphanews_get_all_theme_colors();
	return $colors[$color_name] ?? null;
}


/**
 * Output CSS variables in Block Editor.
 */
add_action('enqueue_block_editor_assets', function () {
	wp_enqueue_style('alphanews-editor-style', get_theme_file_uri('/dist/css/admin.css'), [], null);

	$css = ":root {
		--alphanews-color-primary: " . get_theme_color('primary_color') . ";
		--alphanews-color-secondary: " . get_theme_color('secondary_color') . ";
		--alphanews-color-accent: " . get_theme_color('accent_color') . ";
	}";

	wp_add_inline_style('alphanews-editor-style', $css);
});


/**
 * Inject dynamic colors into block editor via theme.json.
 */
add_action('after_setup_theme', function () {
    $inject_palette = function ($theme_json) {
        $colors = alphanews_get_all_theme_colors();

        if (!is_array($colors)) return $theme_json;

        $custom_palette = [
            [
                'name' => __('Primary', 'alphanews'),
                'slug' => 'alphanews-primary',
                'color' => $colors['primary_color']
            ],
            [
                'name' => __('Secondary', 'alphanews'),
                'slug' => 'alphanews-secondary',
                'color' => $colors['secondary_color']
            ],
            [
                'name' => __('Accent', 'alphanews'),
                'slug' => 'alphanews-accent',
                'color' => $colors['accent_color']
            ]
        ];

        $data = [
            'version' => 3, 
            'settings' => [
                'color' => [
                    'palette' => array_values($custom_palette)
                ]
            ]
        ];

        return $theme_json->update_with($data);
    };

    add_filter('wp_theme_json_data_theme', $inject_palette);
    add_filter('wp_theme_json_data_user', $inject_palette);
});


/**
 * Load custom editor CSS + dynamic variables for the block editor.
 */
add_action('enqueue_block_editor_assets', function () {
    wp_enqueue_style(
        'alphanews-editor-style',
        get_theme_file_uri('/dist/css/admin.css'),
        [],
        null
    );

    $css = ":root {
        --alphanews-color-primary: " . get_theme_color('primary_color') . ";
        --alphanews-color-secondary: " . get_theme_color('secondary_color') . ";
        --alphanews-color-accent: " . get_theme_color('accent_color') . ";
    }";

    wp_add_inline_style('alphanews-editor-style', $css);
});