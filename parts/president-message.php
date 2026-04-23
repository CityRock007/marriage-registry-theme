<?php
/**
 * President's Message Section - Fully Dynamic & Customizable
 * Developed by: James P. Friday
 */

// Retrieve all settings from Customizer
$show_msg      = get_theme_mod('show_pres_message', true);
$pres_img      = get_theme_mod('pres_image', get_template_directory_uri() . '/assets/images/president.jpg');
$pres_badge    = get_theme_mod('pres_badge_text', 'Word from the President');
$pres_heading  = get_theme_mod('pres_heading_text', 'A Foundation for Sacred Unions');
$pres_name     = get_theme_mod('pres_name', 'Dr. Olumide A. Adeniyi');
$pres_title    = get_theme_mod('pres_title', 'National President, IMACN');
$pres_speech   = get_theme_mod('pres_speech', 'Our mission is to uphold the sanctity of marriage through meticulous administration and professional counseling.');
$pres_exp      = get_theme_mod('pres_experience', '25+');

// Dynamic Color Settings
$pres_accent_color = get_theme_mod('pres_accent_color', '#d4af37'); 
$pres_text_color   = get_theme_mod('pres_text_color', '#57657a');
$pres_card_bg      = get_theme_mod('pres_card_bg', '#fcfcfc');

if ( $show_msg ) :
?>
<section class="president-section">
    <div class="pres-container">
        <div class="pres-card" style="background-color: <?php echo esc_attr($pres_card_bg); ?>;">
            <div class="pres-image-area">
                <div class="image-frame">
                    <?php if ( $pres_img ) : ?>
                        <img src="<?php echo esc_url($pres_img); ?>" alt="<?php echo esc_attr($pres_name); ?>">
                    <?php endif; ?>
                    
                    <div class="frame-decoration" style="border-top-color: <?php echo esc_attr($pres_accent_color); ?>; border-left-color: <?php echo esc_attr($pres_accent_color); ?>;"></div>
                    
                    <?php if ( $pres_exp ) : ?>
                    <div class="experience-badge" style="background-color: <?php echo esc_attr($pres_accent_color); ?>;">
                        <strong><?php echo esc_html($pres_exp); ?></strong>
                        <span><?php esc_html_e('Years Exp.', 'marriage-registry'); ?></span>
                    </div>
                    <?php endif; ?>
                </div>
            </div>

            <div class="pres-content-area">
                <div class="quote-mark" style="color: <?php echo esc_attr($pres_accent_color); ?>;">“</div>
                <span class="pres-badge" style="color: <?php echo esc_attr($pres_accent_color); ?>;"><?php echo esc_html($pres_badge); ?></span>
                <h2 class="pres-heading"><?php echo esc_html($pres_heading); ?></h2>
                
                <div class="pres-speech">
                    <p style="color: <?php echo esc_attr($pres_text_color); ?>;"><?php echo nl2br(esc_html($pres_speech)); ?></p>
                </div>

                <div class="pres-footer">
                    <div class="pres-signature-meta">
                        <h4><?php echo esc_html($pres_name); ?></h4>
                        <span class="p-title"><?php echo esc_html($pres_title); ?></span>
                    </div>
                    <div class="handwritten-sig">
                        <?php echo esc_html($pres_name); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<style>
    .president-section { 
        padding: 30px 0; 
        background: #ffffff; 
        overflow: hidden; 
        font-family: 'Plus Jakarta Sans', sans-serif;
    }
    
    .pres-container { max-width: 1200px; margin: 0 auto; padding: 0 25px; }
    
    .pres-card { 
        display: flex; 
        align-items: center; 
        gap: 60px; 
        border-radius: 40px; 
        padding: 45px;
        box-shadow: 0 10px 40px rgba(0,0,0,0.02);
        border: 1px solid #f1f5f9;
    }

    .pres-image-area { flex: 1; position: relative; }
    .image-frame { position: relative; z-index: 2; width: 100%; max-width: 360px; }
    .image-frame img { 
        width: 100%; height: 440px; object-fit: cover; 
        border-radius: 30px; 
    }
    
    .frame-decoration {
        position: absolute; top: -15px; left: -15px; width: 80px; height: 80px;
        border-top-width: 4px; border-top-style: solid;
        border-left-width: 4px; border-left-style: solid;
        border-radius: 20px 0 0 0; z-index: -1;
    }

    .experience-badge {
        position: absolute; bottom: 30px; right: -20px;
        color: #fff;
        padding: 15px; border-radius: 20px;
        text-align: center; box-shadow: 0 10px 20px rgba(0,0,0,0.1);
    }
    .experience-badge strong { display: block; font-size: 1.2rem; line-height: 1; }
    .experience-badge span { font-size: 10px; text-transform: uppercase; font-weight: 700; }

    .pres-content-area { flex: 1.6; position: relative; }
    .quote-mark { 
        font-size: 8rem; font-family: serif; 
        opacity: 0.1; position: absolute; top: -50px; left: -30px; line-height: 1;
    }
    
    .pres-badge { 
        font-weight: 800; text-transform: uppercase; 
        letter-spacing: 2px; font-size: 11px; display: block; margin-bottom: 10px;
    }
    
    .pres-heading { 
        font-size: clamp(1.8rem, 4vw, 2.8rem); 
        color: #0f172a; font-weight: 800; margin: 0 0 25px; line-height: 1.1; 
    }
    
    .pres-speech p { 
        font-size: 1.1rem; line-height: 1.7; 
        margin-bottom: 30px; position: relative; z-index: 2;
    }

    .pres-footer { display: flex; align-items: center; justify-content: space-between; gap: 20px; }
    .pres-signature-meta h4 { font-size: 1.4rem; color: #0f172a; font-weight: 800; margin: 0; }
    .pres-signature-meta .p-title { color: #94a3b8; font-weight: 700; font-size: 12px; text-transform: uppercase; }

    .handwritten-sig {
        font-family: 'Cedarville Cursive', cursive, serif;
        font-size: 1.8rem; color: #0f172a; opacity: 0.2;
        transform: rotate(-5deg); pointer-events: none;
    }

    @media (max-width: 991px) {
        .president-section { padding: 10px 0; }
        .pres-card { flex-direction: column; padding: 30px 20px; gap: 25px; text-align: center; }
        .image-frame { margin: 0 auto; }
        .quote-mark { left: 50%; transform: translateX(-50%); }
        .pres-footer { flex-direction: column; }
        .experience-badge { right: 50%; transform: translateX(50%); bottom: -20px; }
    }
</style>
<?php endif; ?>