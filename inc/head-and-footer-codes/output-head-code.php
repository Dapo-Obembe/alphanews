<?php
/**
 * Outputs the code added to the <head>.
 * 
 * @package alpha_web_consult
 * 
 * @author Dapo Obembe
 * 
 * @since 1.0.0
 */
function output_awc_head_code() {
    $head_code = wp_kses( get_option('awc_head_code', ''),
        array(
            'meta'      => array('name' => true, 'content' => true, 'charset' => true, 'http-equiv' => true),
            'script'    => array('src' => true, 'type' => true, 'async' => true, 'defer' => true),
            'style'     => array('type' => true),
            'link'      => array('rel' => true, 'type' => true, 'href' => true),
            'title'     => array(),
            'base'      => array('href' => true, 'target' => true),
            'noscript'  => array(),
        )
    );

    if (!empty($head_code)) {
        echo wp_kses_post($head_code);
    }
}
add_action('wp_head', 'output_awc_head_code');
?>
