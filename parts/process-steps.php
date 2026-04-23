<?php
/**
 * Marriage Journey Steps - Dynamic Whitelabel Edition
 * Developed by: James P. Friday
 */

// Section Settings from Customizer
$show_steps    = get_theme_mod('show_process_steps', true);
$section_badge = get_theme_mod('process_badge', __( 'Seamless Administration', 'marriage-registry' ));
$section_title = get_theme_mod('process_title', __( 'The Registry Process', 'marriage-registry' ));
$accent_color  = get_theme_mod('hero_btn_bg', '#d4af37'); // Uses the global gold from hero or default

if ( $show_steps ) :
?>
<section class="process-section">
    <div class="process-container">
        <div class="section-header-center">
            <span class="badge-gold" style="color: <?php echo esc_attr($accent_color); ?>;"><?php echo esc_html($section_badge); ?></span>
            <h2><?php echo esc_html($section_title); ?></h2>
            <div class="h-line" style="background: <?php echo esc_attr($accent_color); ?>;"></div>
        </div>

        <div class="steps-scroll-wrapper">
            <div class="steps-grid">
                <?php 
                for ( $i = 1; $i <= 4; $i++ ) : 
                    $step_title = get_theme_mod("step_title_$i");
                    $step_desc  = get_theme_mod("step_desc_$i");
                    $step_icon  = get_theme_mod("step_icon_$i");

                    // Only show the step if at least a title or icon exists
                    if ( empty($step_title) && empty($step_icon) ) continue;
                ?>
                <div class="step-item">
                    <div class="step-visual">
                        <div class="step-number" style="color: <?php echo esc_attr($accent_color); ?>;">0<?php echo $i; ?></div>
                        <div class="step-icon">
                            <i class="<?php echo esc_attr($step_icon); ?>"></i>
                        </div>
                    </div>
                    <h3><?php echo esc_html($step_title); ?></h3>
                    <p><?php echo esc_html($step_desc); ?></p>
                </div>
                <?php endfor; ?>
            </div>
        </div>
    </div>
</section>

<style>
    :root { --step-accent: <?php echo esc_attr($accent_color); ?>; }

    .process-section { 
        padding: 100px 0; 
        background: #ffffff; 
        overflow: hidden;
        font-family: 'Plus Jakarta Sans', sans-serif;
    }
    .process-container { max-width: 1200px; margin: 0 auto; padding: 0 20px; }
    
    .section-header-center { text-align: center; margin-bottom: 80px; }
    .badge-gold { 
        font-weight: 800; 
        text-transform: uppercase; 
        letter-spacing: 3px; 
        font-size: 12px;
        display: block;
        margin-bottom: 15px;
    }
    .section-header-center h2 { font-size: clamp(2rem, 5vw, 2.8rem); color: #0f172a; font-weight: 800; margin: 0; }
    .h-line { width: 60px; height: 4px; margin: 20px auto 0; border-radius: 10px; }

    .steps-grid { 
        display: grid; 
        grid-template-columns: repeat(auto-fit, minmax(220px, 1fr)); 
        gap: 40px; 
        position: relative; 
    }
    
    .steps-grid::before { 
        content: ''; 
        position: absolute; 
        top: 50px; 
        left: 10%; 
        right: 10%; 
        height: 2px; 
        border-top: 2px dashed #e2e8f0; 
        z-index: 1; 
    }

    .step-item { text-align: center; position: relative; z-index: 2; }
    .step-visual { position: relative; display: inline-block; margin-bottom: 30px; }
    
    .step-number { 
        position: absolute;
        top: -10px;
        right: -10px;
        width: 35px; height: 35px; 
        background: #0f172a; 
        border-radius: 50%; 
        display: flex; align-items: center; justify-content: center; 
        font-weight: 800; 
        font-size: 11px; 
        border: 3px solid #fff;
        box-shadow: 0 5px 15px rgba(0,0,0,0.1);
    }

    .step-icon { 
        width: 100px; height: 100px; 
        background: #fff; 
        border: 1px solid #f1f5f9;
        border-radius: 30% 70% 70% 30% / 30% 30% 70% 70%; 
        display: flex; align-items: center; justify-content: center; 
        font-size: 2rem; color: #0f172a;
        transition: all 0.5s cubic-bezier(0.175, 0.885, 0.32, 1.275); 
        box-shadow: 0 15px 35px rgba(0,0,0,0.05);
    }
    
    .step-item:hover .step-icon { 
        background: var(--step-accent); 
        color: #fff; 
        transform: translateY(-10px) rotate(5deg);
        border-radius: 50%; 
        box-shadow: 0 20px 40px rgba(0,0,0,0.1);
    }

    .step-item h3 { font-size: 1.35rem; font-weight: 800; color: #0f172a; margin-bottom: 15px; }
    .step-item p { font-size: 15px; color: #64748b; line-height: 1.7; padding: 0 15px; }

    @media (max-width: 991px) {
        .steps-scroll-wrapper {
            overflow-x: auto;
            padding: 20px 0 40px;
            margin: 0 -20px;
            scroll-snap-type: x mandatory;
            -webkit-overflow-scrolling: touch;
        }
        .steps-scroll-wrapper::-webkit-scrollbar { display: none; }
        .steps-grid {
            display: flex;
            width: max-content;
            padding: 0 40px;
            gap: 20px;
        }
        .step-item { scroll-snap-align: center; width: 280px; min-width: 280px; }
        .steps-grid::before { top: 60px; left: 50px; right: 50px; width: calc(100% - 100px); }
    }
</style>
<?php endif; ?>