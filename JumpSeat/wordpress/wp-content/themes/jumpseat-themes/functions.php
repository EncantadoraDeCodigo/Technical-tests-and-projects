
<?php
/**
 * JumpSeat Theme functions and definitions.
 *
 * @package WordPress
 * @subpackage JumpSeat
 * @since JumpSeat 1.0
 */

/**
 * Enqueue scripts and styles.
 */
function theme_enqueue_styles() {
    wp_enqueue_style('slick-css', 'https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css');
    wp_enqueue_style('slick-theme-css', 'https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css');
    wp_enqueue_style('theme-style', get_stylesheet_uri());
}
add_action('wp_enqueue_scripts', 'theme_enqueue_styles');


?>

