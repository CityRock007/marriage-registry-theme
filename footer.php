<?php
/**
 * Marriage Registry Footer - Professional Multi-Agent Edition
 * Developed by: James P. Friday
 */

if ( ! defined( 'ABSPATH' ) ) exit;

// Retrieve Customizer Settings
$f_desc    = get_theme_mod('footer_description', get_bloginfo('description'));
$f_address = get_theme_mod('footer_address', '123 Registry Way, Abuja, Nigeria');
$f_phone   = get_theme_mod('footer_phone', '+234 800 000 0000');
$f_email   = get_theme_mod('footer_email', 'info@marriage-registry.gov.ng');

// Color Settings
$footer_bg    = get_theme_mod('footer_bg_color', '#0f172a');
$footer_gold  = get_theme_mod('hero_btn_bg', '#d4af37');
$whatsapp_bg  = get_theme_mod('whatsapp_color', '#25d366');

// WhatsApp Logic
$wa_enabled   = get_theme_mod('enable_whatsapp', false);
$wa_side      = get_theme_mod('whatsapp_side', 'right');
$wa_type      = get_theme_mod('whatsapp_type', 'single'); 
$wa_number    = get_theme_mod('whatsapp_number', ''); // Main number for single mode
$wa_message   = get_theme_mod('whatsapp_default_msg', 'Hello, I would like to inquire about the registry.');

// Multi-Agent Parsing Logic
$wa_agents_names   = explode(',', get_theme_mod('whatsapp_multi_names', 'Admin Support'));
$wa_agents_numbers = explode(',', get_theme_mod('whatsapp_multi_numbers', ''));

// Social Links
$facebook  = get_theme_mod('social_facebook');
$twitter   = get_theme_mod('social_twitter');
$instagram = get_theme_mod('social_instagram');
$linkedin  = get_theme_mod('social_linkedin');
?>

    <footer id="colophon" class="site-footer" style="background: <?php echo esc_attr($footer_bg); ?>; border-top-color: <?php echo esc_attr($footer_gold); ?>;">
        <div class="footer-top">
            <div class="footer-container">
                <div class="footer-grid">
                    
                    <div class="footer-col brand-col">
                        <div class="footer-logo">
                            <?php if ( has_custom_logo() ) : the_custom_logo(); else : ?>
                                <span class="footer-site-title"><?php bloginfo( 'name' ); ?></span>
                            <?php endif; ?>
                        </div>
                        <p class="footer-text-desc"><?php echo esc_html($f_desc); ?></p>
                        <div class="footer-socials">
                            <?php if($facebook): ?><a href="<?php echo esc_url($facebook); ?>"><i class="fab fa-facebook-f"></i></a><?php endif; ?>
                            <?php if($twitter): ?><a href="<?php echo esc_url($twitter); ?>"><i class="fab fa-twitter"></i></a><?php endif; ?>
                            <?php if($instagram): ?><a href="<?php echo esc_url($instagram); ?>"><i class="fab fa-instagram"></i></a><?php endif; ?>
                            <?php if($linkedin): ?><a href="<?php echo esc_url($linkedin); ?>"><i class="fab fa-linkedin-in"></i></a><?php endif; ?>
                        </div>
                    </div>

                    <div class="footer-col nav-col">
                        <h4 class="footer-title">Registry Portal</h4>
                        <?php
                        wp_nav_menu( array(
                            'theme_location' => 'footer-menu',
                            'menu_id'        => 'footer-links',
                            'depth'          => 1,
                            'fallback_cb'    => false,
                        ) );
                        ?>
                    </div>

                    <div class="footer-col contact-col">
                        <h4 class="footer-title">Contact Office</h4>
                        <ul class="footer-contact-list">
                            <li><i class="fas fa-map-marker-alt" style="color: <?php echo esc_attr($footer_gold); ?>;"></i> <span><?php echo esc_html($f_address); ?></span></li>
                            <li><i class="fas fa-phone-alt" style="color: <?php echo esc_attr($footer_gold); ?>;"></i> <span><?php echo esc_html($f_phone); ?></span></li>
                            <li><i class="fas fa-envelope" style="color: <?php echo esc_attr($footer_gold); ?>;"></i> <span><?php echo esc_html($f_email); ?></span></li>
                        </ul>
                    </div>

                    <div class="footer-col trust-col">
                        <h4 class="footer-title">Accreditation</h4>
                        <div class="trust-badge">
                            <i class="fas fa-shield-alt" style="color: <?php echo esc_attr($footer_gold); ?>;"></i>
                            <p>Official Marriage Registry Partner for Professional Unions.</p>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <div class="footer-bottom">
            <div class="footer-container bottom-flex">
                <div class="site-info">
                    &copy; <?php echo date('Y'); ?> <?php bloginfo( 'name' ); ?>. <?php esc_html_e( 'All Rights Reserved.', 'marriage-registry' ); ?>
                </div>
                
                <div class="dev-signature" style="opacity: 0.8; font-size: 12px; font-weight: 600;">
                    Developed by: <a href="https://github.com/CityRock007/" target="_blank" rel="nofollow" style="color: <?php echo esc_attr($footer_gold); ?>; text-decoration: none;">James P. Friday</a>
                </div>
            </div>
        </div>

        <a href="#" id="scroll-to-top" title="Go to top"><i class="fas fa-chevron-up"></i></a>

        <?php if($wa_enabled): ?>
        <div id="wa-floating-engine" class="wa-side-<?php echo esc_attr($wa_side); ?>">
            <?php if($wa_type === 'single'): ?>
                <a href="https://wa.me/<?php echo esc_attr($wa_number); ?>?text=<?php echo urlencode($wa_message); ?>" target="_blank" class="wa-btn-main" style="background: <?php echo esc_attr($whatsapp_bg); ?>;">
                    <i class="fab fa-whatsapp"></i>
                    <span class="wa-tooltip">Chat with us</span>
                </a>
            <?php else: ?>
                <div class="wa-multi-wrapper">
                    <div id="wa-multi-box" class="wa-multi-box">
                        <div class="wa-multi-header" style="background: <?php echo esc_attr($whatsapp_bg); ?>;">
                            <div class="wa-header-top">
                                <strong>Registry Agents</strong>
                                <span class="wa-close-box">&times;</span>
                            </div>
                            <p>Select an agent to start a conversation</p>
                        </div>
                        <div class="wa-agent-list">
                            <?php 
                            foreach($wa_agents_numbers as $index => $number): 
                                $name = isset($wa_agents_names[$index]) ? trim($wa_agents_names[$index]) : 'Registry Agent';
                                if(empty(trim($number))) continue;
                            ?>
                            <a href="https://wa.me/<?php echo esc_attr(trim($number)); ?>?text=<?php echo urlencode($wa_message); ?>" target="_blank" class="wa-agent">
                                <div class="agent-avatar" style="background: <?php echo esc_attr($whatsapp_bg); ?>20; color: <?php echo esc_attr($whatsapp_bg); ?>;">
                                    <i class="fas fa-user-tie"></i>
                                </div>
                                <div class="agent-info">
                                    <strong><?php echo esc_html($name); ?></strong>
                                    <span>Online for assistance</span>
                                </div>
                                <i class="fab fa-whatsapp wa-item-icon"></i>
                            </a>
                            <?php endforeach; ?>
                        </div>
                    </div>
                    <button id="wa-toggle" class="wa-btn-main" style="background: <?php echo esc_attr($whatsapp_bg); ?>;">
                        <i class="fab fa-whatsapp"></i>
                        <span class="wa-tooltip">Help Center</span>
                    </button>
                </div>
            <?php endif; ?>
        </div>
        <?php endif; ?>

        <?php wp_footer(); ?>
    </footer>

<style>
/* FOOTER CORE */
.site-footer { color: #94a3b8; padding-top: 80px; border-top: 4px solid; position: relative; }
.footer-container { max-width: 1200px; margin: 0 auto; padding: 0 25px; }
.footer-grid { display: grid; grid-template-columns: 1.5fr 1fr 1.2fr 1fr; gap: 40px; padding-bottom: 60px; }
.footer-title { color: #fff; font-size: 18px; font-weight: 800; margin-bottom: 25px; position: relative; }
.footer-title::after { content: ''; position: absolute; left: 0; bottom: -8px; width: 30px; height: 2px; background: <?php echo esc_attr($footer_gold); ?>; }
.footer-text-desc { line-height: 1.8; font-size: 14px; margin: 20px 0; }

/* REGISTRY PORTAL MENU CLEANUP */
#footer-links { list-style: none; padding: 0; margin: 0; }
#footer-links li { margin-bottom: 12px; }
#footer-links li a { color: #94a3b8 !important; text-decoration: none !important; font-size: 14px; transition: 0.3s ease; }
#footer-links li a:hover { color: <?php echo esc_attr($footer_gold); ?> !important; padding-left: 5px; }

.footer-socials { display: flex; gap: 15px; }
.footer-socials a { width: 35px; height: 35px; background: rgba(255,255,255,0.05); border-radius: 50%; display: flex; align-items: center; justify-content: center; color: #fff; transition: 0.3s; }
.footer-socials a:hover { background: <?php echo esc_attr($footer_gold); ?>; transform: translateY(-3px); }

.footer-bottom { background: rgba(0,0,0,0.3); padding: 25px 0; border-top: 1px solid rgba(255,255,255,0.05); }
.bottom-flex { display: flex; justify-content: space-between; align-items: center; }

/* SCROLL TO TOP */
#scroll-to-top {
    position: fixed; bottom: 30px; width: 45px; height: 45px; 
    background: <?php echo esc_attr($footer_gold); ?>; color: #fff; 
    border-radius: 50%; display: none; align-items: center; 
    justify-content: center; box-shadow: 0 10px 20px rgba(0,0,0,0.2); 
    z-index: 998; transition: 0.3s; text-decoration: none;
}

/* WHATSAPP ENGINE */
#wa-floating-engine { position: fixed; bottom: 30px; z-index: 999; }
.wa-side-right { right: 30px; }
.wa-side-left { left: 30px; }

.wa-btn-main {
    width: 55px; height: 55px; border-radius: 50%; display: flex;
    align-items: center; justify-content: center; color: #fff;
    font-size: 28px; box-shadow: 0 10px 25px rgba(0,0,0,0.2);
    cursor: pointer; border: none; text-decoration: none; transition: 0.3s;
    position: relative;
}

.wa-tooltip {
    position: absolute; background: #333; color: #fff; padding: 6px 12px;
    border-radius: 8px; font-size: 11px; font-weight: 700; opacity: 0;
    visibility: hidden; transition: 0.3s; top: 50%; transform: translateY(-50%);
}
.wa-side-right .wa-tooltip { right: 70px; }
.wa-side-left .wa-tooltip { left: 70px; }
.wa-btn-main:hover .wa-tooltip { opacity: 1; visibility: visible; }

/* MULTI AGENT POPUP BOX */
.wa-multi-box {
    position: absolute; bottom: 75px; width: 320px; background: #fff;
    border-radius: 20px; box-shadow: 0 20px 50px rgba(0,0,0,0.2);
    display: none; overflow: hidden; animation: waPop 0.3s ease-out;
}
@keyframes waPop { from { opacity:0; transform: translateY(20px); } to { opacity:1; transform: translateY(0); } }

.wa-side-right .wa-multi-box { right: 0; }
.wa-side-left .wa-multi-box { left: 0; }

.wa-multi-header { padding: 25px 20px; color: #fff; }
.wa-header-top { display: flex; justify-content: space-between; align-items: center; margin-bottom: 5px; }
.wa-header-top strong { font-size: 18px; }
.wa-close-box { cursor: pointer; font-size: 24px; opacity: 0.7; }
.wa-multi-header p { font-size: 12px; margin: 0; opacity: 0.9; }

.wa-agent-list { padding: 10px; max-height: 350px; overflow-y: auto; }
.wa-agent { 
    display: flex; align-items: center; gap: 15px; padding: 15px;
    text-decoration: none; color: #1e293b; border-radius: 15px; 
    transition: 0.3s; margin-bottom: 5px; border: 1px solid #f1f5f9;
}
.wa-agent:hover { background: #f8fafc; border-color: #e2e8f0; transform: translateX(5px); }
.agent-avatar { width: 45px; height: 45px; border-radius: 12px; display: flex; align-items: center; justify-content: center; font-size: 18px; }
.agent-info { flex: 1; }
.agent-info strong { display: block; font-size: 14px; }
.agent-info span { font-size: 11px; color: #64748b; }
.wa-item-icon { color: #25d366; font-size: 18px; opacity: 0.7; }

@media (max-width: 768px) {
    .wa-multi-box { width: 280px; }
}
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const scrollBtn = document.getElementById('scroll-to-top');
    const waToggle = document.getElementById('wa-toggle');
    const waBox = document.getElementById('wa-multi-box');
    const waClose = document.querySelector('.wa-close-box');

    // POSITIONING LOGIC
    if (document.getElementById('wa-floating-engine')) {
        const isRight = document.getElementById('wa-floating-engine').classList.contains('wa-side-right');
        scrollBtn.style[isRight ? 'left' : 'right'] = '30px';
        scrollBtn.style[isRight ? 'right' : 'left'] = 'auto';
    }

    window.addEventListener('scroll', () => {
        scrollBtn.style.display = (window.pageYOffset > 300) ? "flex" : "none";
    });

    scrollBtn.onclick = (e) => {
        e.preventDefault();
        window.scrollTo({ top: 0, behavior: 'smooth' });
    };

    if(waToggle) {
        waToggle.onclick = (e) => {
            e.stopPropagation();
            waBox.style.display = (waBox.style.display === 'block') ? 'none' : 'block';
        };
        if(waClose) waClose.onclick = () => waBox.style.display = 'none';
        document.addEventListener('click', (e) => {
            if (waBox && !waBox.contains(e.target)) waBox.style.display = 'none';
        });
    }
});
</script>
</body>
</html>