<?php
/**
 * Dedicated Site Preloader Component
 * Handles multiple layout choices, logo processing, and text rendering dynamically.
 */

if ( ! get_theme_mod( 'enable_preloader', true ) ) {
    return;
}

// Gather configurations
$preloader_style = get_theme_mod( 'preloader_style', 'luxury-heart' );
$content_mode    = get_theme_mod( 'preloader_content_mode', 'text' );
$custom_text     = get_theme_mod( 'preloader_custom_text', get_bloginfo( 'name' ) );
if ( empty( $custom_text ) ) { $custom_text = get_bloginfo( 'name' ); }
?>

<div id="mr-preloader" class="style-<?php echo esc_attr( $preloader_style ); ?>">
    <div class="preloader-content">
        
        <div class="preloader-animation-graphic">
            <?php if ( 'luxury-heart' === $preloader_style ) : ?>
                <div class="heart-pulse-loader">
                    <i class="fas fa-heart"></i>
                    <div class="pulse-ring"></div>
                </div>
            <?php elseif ( 'minimal-spinner' === $preloader_style ) : ?>
                <div class="elegant-ring-spinner"><div></div><div></div><div></div><div></div></div>
            <?php elseif ( 'infinite-grow' === $preloader_style ) : ?>
                <div class="triple-expanding-dots"><span></span><span></span><span></span></div>
            <?php endif; ?>
        </div>

        <div class="preloader-branding">
            <?php if ( 'logo' === $content_mode && has_custom_logo() ) : ?>
                <div class="preloader-custom-logo">
                    <?php 
                    $logo_id = get_theme_mod( 'custom_logo' );
                    $logo_img = wp_get_attachment_image_src( $logo_id, 'medium' );
                    if ( $logo_img ) {
                        echo '<img src="' . esc_url( $logo_img[0] ) . '" alt="' . esc_attr( get_bloginfo( 'name' ) ) . '">';
                    } else {
                        the_custom_logo();
                    }
                    ?>
                </div>
            <?php else : ?>
                <p class="preloader-text"><?php echo esc_html( $custom_text ); ?></p>
            <?php endif; ?>
        </div>

        <div class="loading-bar"></div>
    </div>
</div>

<style>
    #mr-preloader {
        position: fixed;
        top: 0; left: 0; width: 100%; height: 100%;
        background-color: var(--p-navy, #0f172a);
         Mosc-z-index: 999999; z-index: 999999;
        display: flex; align-items: center; justify-content: center;
        transition: opacity 0.5s ease, transform 0.5s ease;
    }
    .preloader-content {
        text-align: center; display: flex; flex-direction: column; align-items: center; gap: 20px;
    }
    
    /* BRAND IMAGE OR TEXT BASE STYLES */
    .preloader-custom-logo img {
        max-width: 160px; height: auto; display: block;
        animation: logoSoftPulse 2s infinite ease-in-out;
    }
    .preloader-text {
        color: #ffffff; font-family: var(--font-main, sans-serif);
        font-size: 1.1rem; font-weight: 600; letter-spacing: 2px;
        text-transform: uppercase; margin: 0; opacity: 0.9;
    }

    /* GLOBAL BAR ENGINE */
    .loading-bar {
        width: 140px; height: 3px; background: rgba(255, 255, 255, 0.1);
        border-radius: 4px; overflow: hidden; position: relative;
    }
    .loading-bar::after {
        content: ''; position: absolute; left: -100%; top: 0; height: 100%; width: 100%;
        background: var(--m-gold, #d4af37); animation: lineProgress 1.8s infinite linear;
    }

    /* --- ANIMATION GRAPHIC SELECTIONS --- */
    
    /* Style 1: Luxury Heart */
    .heart-pulse-loader {
        position: relative; font-size: 3rem; color: var(--m-gold, #d4af37);
        animation: heartBeat 1.4s infinite ease-in-out;
    }
    .pulse-ring {
        position: absolute; top: -10px; left: -10px; width: 70px; height: 70px;
        border: 2px solid var(--m-gold, #d4af37); border-radius: 50%; opacity: 0;
        animation: ringExplode 1.4s infinite ease-out;
    }

    /* Style 2: Elegant Spinner Ring */
    .elegant-ring-spinner {
        display: inline-block; position: relative; width: 64px; height: 64px;
    }
    .elegant-ring-spinner div {
        box-sizing: border-box; display: block; position: absolute;
        width: 50px; height: 50px; margin: 7px;
        border: 3px solid var(--m-gold, #d4af37); border-radius: 50%;
        animation: spinClip 1.2s cubic-bezier(0.5, 0, 0.5, 1) infinite;
        border-color: var(--m-gold, #d4af37) transparent transparent transparent;
    }
    .elegant-ring-spinner div:nth-child(1) { animation-delay: -0.45s; }
    .elegant-ring-spinner div:nth-child(2) { animation-delay: -0.3s; }
    .elegant-ring-spinner div:nth-child(3) { animation-delay: -0.15s; }

    /* Style 3: Expanding Dots */
    .triple-expanding-dots { display: flex; gap: 8px; align-items: center; height: 40px; }
    .triple-expanding-dots span {
        width: 12px; height: 12px; background: var(--m-gold, #d4af37);
        border-radius: 50%; display: inline-block;
        animation: dotGrowFade 1.4s infinite ease-in-out both;
    }
    .triple-expanding-dots span:nth-child(1) { animation-delay: -0.32s; }
    .triple-expanding-dots span:nth-child(2) { animation-delay: -0.16s; }

    /* --- ANIMATION KEYFRAMES ENGINE --- */
    @keyframes heartBeat {
        0%, 100% { transform: scale(1); }
        25% { transform: scale(1.15); }
        45% { transform: scale(1.05); }
        70% { transform: scale(1.2); }
    }
    @keyframes ringExplode {
        0% { transform: scale(0.6); opacity: 0.8; }
        100% { transform: scale(1.4); opacity: 0; }
    }
    @keyframes spinClip {
        0% { transform: rotate(0deg); }
        100% { transform: rotate(360deg); }
    }
    @keyframes dotGrowFade {
        0%, 80%, 100% { transform: scale(0); opacity: 0.3; }
        40% { transform: scale(1.0); opacity: 1; }
    }
    @keyframes lineProgress {
        0% { left: -100%; }
        50% { left: 0%; }
        100% { left: 100%; }
    }
    @keyframes logoSoftPulse {
        0%, 100% { transform: scale(1); opacity: 0.95; }
        50% { transform: scale(1.04); opacity: 1; }
    }
    body.preloader-active { overflow: hidden !important; }
</style>

<script>
    document.body.classList.add('preloader-active');
    window.addEventListener('load', function() {
        var loader = document.getElementById('mr-preloader');
        if (loader) {
            setTimeout(function() {
                loader.style.opacity = '0';
                document.body.classList.remove('preloader-active');
                setTimeout(function() {
                    loader.style.display = 'none';
                }, 500);
            }, 500);
        }
    });
</script>