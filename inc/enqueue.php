<?php
/**
 * Marriage Registry Enqueue Scripts & Styles
 * * Developed by: James P. Friday
 * GitHub: https://github.com/CityRock007/
 */

if ( ! defined( 'ABSPATH' ) ) exit;

function marriage_registry_scripts() {
    // 1. Enqueue Main Stylesheet (style.css)
    wp_enqueue_style( 'marriage-registry-main', get_stylesheet_uri(), array(), MARRIAGE_REGISTRY_VERSION );

    // 2. Enqueue Custom Theme Styles (For the actual design revamp)
    wp_enqueue_style( 'marriage-registry-layout', MARRIAGE_REGISTRY_URL . '/assets/css/main.css', array(), MARRIAGE_REGISTRY_VERSION );

    // 3. Enqueue FontAwesome for Icons (Needed for Marriage Registry UI)
    wp_enqueue_style( 'font-awesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css', array(), '6.0.0' );

    // 4. Enqueue Main JavaScript
    wp_enqueue_script( 'marriage-registry-js', MARRIAGE_REGISTRY_URL . '/assets/js/main.js', array('jquery'), MARRIAGE_REGISTRY_VERSION, true );

    // 5. Threaded Comments support
    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
        wp_enqueue_script( 'comment-reply' );
    }
}
add_action( 'wp_enqueue_scripts', 'marriage_registry_scripts' );

/**
 * Enqueue Customizer Preview Script
 * This allows real-time updates without refreshing the page.
 */
function marriage_registry_customizer_preview() {
    wp_enqueue_script( 
        'marriage-registry-customizer-js', 
        MARRIAGE_REGISTRY_URL . '/assets/js/customizer.js', 
        array( 'customize-preview', 'jquery' ), 
        MARRIAGE_REGISTRY_VERSION, 
        true 
    );
}
add_action( 'customize_preview_init', 'marriage_registry_customizer_preview' );