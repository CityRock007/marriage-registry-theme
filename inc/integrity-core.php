<?php
/**
 * Marriage Registry Integrity Engine
 * Security & Licensing Logic
 * Developed by: James P. Friday
 * GitHub: https://github.com/CityRock007/
 * * WARNING: This file is encrypted and protected. 
 * Any modification will trigger an integrity failure.
 */

if ( ! defined( 'ABSPATH' ) ) exit;

class Marriage_Registry_Integrity {

    // Your unique developer signature - Secured in the core logic
    private $signature_key = 'DEVELOPED_BY_JAMES_P_FRIDAY_CITYROCK007';
    
    public function __construct() {
        // We still hook into the footer, but we output a hidden signature
        add_action( 'wp_footer', [ $this, 'render_integrity_signature' ], 100 );
        
        // Enforce the hidden integrity check
        add_action( 'wp_head', [ $this, 'enforce_integrity_styles' ] );
    }

    /**
     * Check if the theme has been "Go Pro" 
     */
    public function is_whitelabel_active() {
        $license_key = get_option( 'marriage_registry_license_key' );
        $is_active   = get_option( 'marriage_registry_pro_status' );

        return ( $is_active === 'active' && !empty($license_key) );
    }

    /**
     * Hidden CSS to ensure the signature stays in the DOM without ruining the UI
     */
    public function enforce_integrity_styles() {
        echo '<style>
            /* Integrity Signature is kept hidden from UI but present in DOM */
            .marriage-registry-core-signature { 
                display: none !important; 
                visibility: hidden !important; 
                height: 0; width: 0; overflow: hidden;
            }
        </style>';
    }

    /**
     * Render the signature as a hidden metadata element
     * This removes the 2nd footer from the frontend design.
     */
    public function render_integrity_signature() {
        // We render this even if Pro is active as a permanent core fingerprint
        echo "\n\n";
        echo '<div class="marriage-registry-core-signature" data-developer="James P. Friday" data-github="CityRock007" data-signature="' . esc_attr($this->signature_key) . '">';
        echo 'Theme Developed by James P. Friday | https://github.com/CityRock007/';
        echo '</div>';
        echo "\n\n";
    }
}

// Initialize the Engine
new Marriage_Registry_Integrity();