<?php
/**
 * GitHub Theme Update Checker
 */
function yourtheme_github_updater() {
    // Include the update checker library
    if (!class_exists('YahnisElsts\\PluginUpdateChecker\\v5\\PucFactory')) {
        require_once get_template_directory() . '/inc/plugin-update-checker/plugin-update-checker.php';
    }
    
    $myUpdateChecker = Puc_v4_Factory::buildUpdateChecker(
        'https://github.com/yourusername/your-theme/',
        __FILE__, // Full path to the main theme file
        'your-theme-textdomain' // Must match your theme's text domain
    );
    
    // Set the branch that contains the stable release
    $myUpdateChecker->setBranch('main');
    
    // Optional: Enable releases
    $myUpdateChecker->getVcsApi()->enableReleaseAssets();
    
    // Optional: Add authentication for private repos
    // $myUpdateChecker->setAuthentication('your-github-token');
    
    // Optional: Change the update frequency (default is 12 hours)
    $myUpdateChecker->setCheckPeriod(12);
}
add_action('after_setup_theme', 'yourtheme_github_updater');