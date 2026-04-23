<?php
/**
 * Marriage Registry CTA Section Template - Master Revamp
 * Developed by: James P. Friday
 */

if ( ! defined( 'ABSPATH' ) ) exit;

// Retrieve Customizer settings with defaults
$cta_text        = get_theme_mod( 'cta_text', __( 'Ready to register your marriage?', 'marriage-registry' ) );
$cta_subtext     = get_theme_mod( 'cta_subtext', __( 'Join thousands of couples and professionals on the IMACN platform today.', 'marriage-registry' ) );
$cta_button_text = get_theme_mod( 'cta_button_text', __( 'Get Started', 'marriage-registry' ) );
$cta_link        = get_theme_mod( 'cta_button_link', '#' );

// Color Settings
$cta_bg_color    = get_theme_mod( 'cta_bg_color', '#d4af37' ); // Default Gold
$cta_btn_color   = get_theme_mod( 'cta_btn_color', '#1a2a3a' ); // Default Navy
$cta_text_color  = get_theme_mod( 'cta_text_color', '#1a2a3a' );
?>

<section id="cta-section" class="theme-cta-section" style="background-color: <?php echo esc_attr($cta_bg_color); ?>;">
    <div class="cta-pattern"></div>
    
    <div class="cta-container">
        <div class="cta-content">
            <h2 class="cta-heading" style="color: <?php echo esc_attr($cta_text_color); ?>;">
                <?php echo esc_html( $cta_text ); ?>
            </h2>
            <p class="cta-subtext" style="color: <?php echo esc_attr($cta_text_color); ?>;">
                <?php echo esc_html( $cta_subtext ); ?>
            </p>
        </div>
        
        <div class="cta-button-wrapper">
            <a href="<?php echo esc_url($cta_link); ?>" class="btn-cta-modern" style="background-color: <?php echo esc_attr($cta_btn_color); ?>;">
                <span><?php echo esc_html( $cta_button_text ); ?></span>
                <div class="btn-icon">
                    <i class="fas fa-arrow-right"></i>
                </div>
            </a>
        </div>
    </div>
</section>

<style>
.theme-cta-section {
    position: relative;
    padding: 80px 20px;
    overflow: hidden;
    display: flex;
    align-items: center;
    border-top: 1px solid rgba(0,0,0,0.05);
}

/* Sublte pattern to make it look premium */
.cta-pattern {
    position: absolute;
    top: 0; left: 0; width: 100%; height: 100%;
    background-image: radial-gradient(rgba(255,255,255,0.2) 1px, transparent 1px);
    background-size: 30px 30px;
    opacity: 0.3;
    pointer-events: none;
}

.cta-container {
    max-width: 1200px;
    margin: 0 auto;
    display: flex;
    align-items: center;
    justify-content: space-between;
    width: 100%;
    position: relative;
    z-index: 2;
    gap: 40px;
}

.cta-content {
    flex: 1;
}

.cta-heading {
    font-size: clamp(1.8rem, 4vw, 2.8rem);
    font-weight: 900;
    margin: 0 0 15px 0;
    line-height: 1.1;
    letter-spacing: -1px;
}

.cta-subtext {
    font-size: 1.15rem;
    margin: 0;
    font-weight: 600;
    opacity: 0.85;
    max-width: 600px;
}

/* Modern Button Design */
.btn-cta-modern {
    display: inline-flex;
    align-items: center;
    padding: 6px 6px 6px 30px;
    border-radius: 100px;
    text-decoration: none;
    color: #ffffff !important;
    font-weight: 800;
    font-size: 14px;
    text-transform: uppercase;
    letter-spacing: 1px;
    transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
    box-shadow: 0 15px 30px rgba(0,0,0,0.15);
}

.btn-icon {
    width: 45px;
    height: 45px;
    background: rgba(255,255,255,0.2);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    margin-left: 20px;
    transition: 0.3s ease;
}

.btn-cta-modern:hover {
    transform: translateY(-5px);
    box-shadow: 0 20px 40px rgba(0,0,0,0.2);
    filter: brightness(1.1);
}

.btn-cta-modern:hover .btn-icon {
    background: #ffffff;
    color: #000;
}

/* Universal Responsiveness */
@media (max-width: 991px) {
    .cta-container {
        flex-direction: column;
        text-align: center;
        gap: 30px;
    }
    .cta-subtext {
        margin: 0 auto;
    }
    .theme-cta-section {
        padding: 60px 20px;
    }
}

@media (max-width: 480px) {
    .cta-heading { font-size: 1.6rem; }
    .btn-cta-modern { padding-left: 20px; width: 100%; justify-content: space-between; }
}
</style>