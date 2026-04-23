<?php
/**
 * Features Section Overlay for Marriage Registry
 * Designed by: James P. Friday
 */

// Customizer Color Settings
$feature_icon_color = get_theme_mod('feature_icon_color', '#d4af37'); // Default Gold
$feature_card_bg    = get_theme_mod('feature_card_bg', '#ffffff');
?>

<section class="features-overlay-section">
    <div class="features-wrapper">
        <?php 
        for ( $i = 1; $i <= 3; $i++ ) : 
            // Fallbacks for the three default features
            $default_icons  = ['fas fa-file-signature', 'fas fa-handshake', 'fas fa-database'];
            $default_titles = ['Legal Registry', 'Counseling', 'Verified Data'];
            $default_descs  = [
                'Digitalized marriage certification and official records management.',
                'Direct access to verified marriage administrators and counselors.',
                'Secure, high-integrity database for Nigerian marital documentation.'
            ];

            $icon  = get_theme_mod( "feature_icon_$i", $default_icons[$i-1] );
            $title = get_theme_mod( "feature_title_$i", $default_titles[$i-1] );
            $desc  = get_theme_mod( "feature_desc_$i", $default_descs[$i-1] );
        ?>
            <div class="feature-item" style="background: <?php echo esc_attr($feature_card_bg); ?>;">
                <div class="f-icon" style="color: <?php echo esc_attr($feature_icon_color); ?>; background: <?php echo esc_attr($feature_icon_color); ?>15;">
                    <i class="<?php echo esc_attr($icon); ?>"></i>
                </div>
                <div class="f-text">
                    <h3><?php echo esc_html($title); ?></h3>
                    <p><?php echo esc_html($desc); ?></p>
                </div>
            </div>
        <?php endfor; ?>
    </div>
</section>

<style>
    .features-overlay-section {
        position: relative;
        z-index: 900;
        margin-top: -80px; 
        padding: 0 20px;
        font-family: 'Plus Jakarta Sans', sans-serif;
    }

    .features-wrapper {
        max-width: 1200px;
        margin: 0 auto;
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 25px;
    }

    .feature-item {
        padding: 40px 30px;
        border-radius: 20px;
        display: flex;
        flex-direction: column;
        align-items: center;
        text-align: center;
        box-shadow: 0 20px 40px rgba(0, 0, 0, 0.08);
        transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
        border: 1px solid rgba(0,0,0,0.03);
    }

    .feature-item:hover {
        transform: translateY(-12px);
        box-shadow: 0 30px 60px rgba(0, 0, 0, 0.1);
    }

    .f-icon {
        width: 70px;
        height: 70px;
        border-radius: 18px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 1.8rem;
        margin-bottom: 25px;
        transition: 0.3s;
    }

    .feature-item:hover .f-icon {
        background: <?php echo esc_attr($feature_icon_color); ?> !important;
        color: #fff !important;
        transform: rotate(-10deg);
    }

    .f-text h3 {
        color: var(--p-navy);
        font-size: 1.3rem;
        font-weight: 800;
        margin-bottom: 12px;
    }

    .f-text p {
        color: #64748b;
        font-size: 0.95rem;
        line-height: 1.6;
    }

    @media (max-width: 991px) {
        .features-wrapper { grid-template-columns: 1fr; }
        .features-overlay-section { margin-top: -50px; }
    }
</style>