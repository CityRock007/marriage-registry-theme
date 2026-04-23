<?php
/**
 * Cinematic Slider Hero for Marriage Registry
 * Vertical Navigation with Centered Numbers
 * Developed by: James P. Friday
 */

// Retrieve Custom Colors and Settings from Customizer
$hero_title_color = get_theme_mod('hero_title_color', '#ffffff');
$hero_sub_color   = get_theme_mod('hero_sub_color', 'rgba(255,255,255,0.85)');
$hero_btn_bg      = get_theme_mod('hero_btn_bg', '#d4af37'); 
$hero_overlay     = get_theme_mod('hero_overlay_opacity', '0.5');

$slides = array();
for ( $i = 1; $i <= 3; $i++ ) {
    $img = get_theme_mod( "hero_slide_img_$i" );
    if ( $img || $i == 1 ) {
        $slides[] = array(
            'title'    => get_theme_mod( "hero_slide_title_$i", $i == 1 ? __( 'Sacred Unions, Organized', 'marriage-registry' ) : sprintf( __( 'Slide %d Title', 'marriage-registry' ), $i ) ),
            'subtitle' => get_theme_mod( "hero_slide_sub_$i", $i == 1 ? __( 'Expert administration for the Marriage Administrators and Counselors of Nigeria.', 'marriage-registry' ) : sprintf( __( 'Description for slide %d', 'marriage-registry' ), $i ) ),
            'image'    => $img ? $img : get_template_directory_uri() . '/assets/images/default-hero.jpg',
        );
    }
}
?>

<section id="hero-slider" class="marriage-hero-slider">
    <?php foreach ( $slides as $index => $slide ) : ?>
        <div class="m-slide <?php echo $index === 0 ? 'active' : ''; ?>">
            <div class="m-slide-bg" style="background-image: linear-gradient(rgba(0,0,0,<?php echo esc_attr($hero_overlay); ?>), rgba(0,0,0,<?php echo esc_attr($hero_overlay); ?>)), url('<?php echo esc_url($slide['image']); ?>');"></div>
            
            <div class="m-slide-container">
                <div class="m-slide-content">
                    <h1 class="m-title" style="color: <?php echo esc_attr($hero_title_color); ?>; padding-bottom: 15px;">
                        <span><?php echo esc_html($slide['title']); ?></span>
                    </h1>
                    <p class="m-subtitle" style="color: <?php echo esc_attr($hero_sub_color); ?>;">
                        <?php echo esc_html($slide['subtitle']); ?>
                    </p>
                    <div class="m-actions">
                        <a href="#register" class="m-btn m-btn-gold" style="background: <?php echo esc_attr($hero_btn_bg); ?>;">
                            <?php esc_html_e( 'Get Started', 'marriage-registry' ); ?>
                        </a>
                        <a href="#about" class="m-btn m-btn-outline">
                            <?php esc_html_e( 'Learn More', 'marriage-registry' ); ?>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    <?php endforeach; ?>

    <div class="slider-nav-vertical">
        <div class="nav-line"></div>
        <?php foreach ( $slides as $index => $slide ) : ?>
            <div class="dot <?php echo $index === 0 ? 'active' : ''; ?>" data-slide="<?php echo $index; ?>">
                <div class="dot-label">0<?php echo $index + 1; ?></div>
                
                <svg width="44" height="44">
                    <circle cx="22" cy="22" r="20" class="circle-bg"></circle>
                    <circle cx="22" cy="22" r="20" class="circle-progress" style="stroke: <?php echo esc_attr($hero_btn_bg); ?>;"></circle>
                </svg>
            </div>
        <?php endforeach; ?>
    </div>
</section>

<style>
    .marriage-hero-slider {
        position: relative;
        height: 100vh;
        min-height: 700px;
        overflow: hidden;
        background: #000;
        font-family: 'Plus Jakarta Sans', sans-serif;
    }

    .m-slide {
        position: absolute;
        top: 0; left: 0; width: 100%; height: 100%;
        display: flex; align-items: center; justify-content: center;
        opacity: 0; visibility: hidden; transition: opacity 1.2s ease-in-out;
    }

    .m-slide.active { opacity: 1; visibility: visible; z-index: 10; }

    .m-slide-bg {
        position: absolute;
        top: 0; left: 0; width: 100%; height: 100%;
        background-size: cover;
        background-repeat: no-repeat;
        background-position: center 20%; 
        transform: scale(1.1);
        transition: transform 10s linear;
    }

    .m-slide.active .m-slide-bg { transform: scale(1); }

    @media (max-width: 768px) {
        .m-slide-bg { background-position: center center; }
        .marriage-hero-slider { height: 90vh; min-height: 600px; }
    }

    .m-slide-container {
        position: relative; z-index: 20;
        max-width: 900px; padding: 0 40px; text-align: center;
    }

    .m-title { font-size: clamp(2.8rem, 7vw, 5rem); font-weight: 800; line-height: 1.1; margin-bottom: 25px; overflow: hidden; }
    .m-title span { display: block; transform: translateY(105%); transition: transform 0.9s cubic-bezier(0.16, 1, 0.3, 1) 0.6s; }
    .m-slide.active .m-title span { transform: translateY(0); }

    .m-subtitle { font-size: 1.3rem; opacity: 0; transform: translateY(20px); transition: all 0.8s ease 0.9s; max-width: 650px; margin: 0 auto 45px; line-height: 1.6; }
    .m-slide.active .m-subtitle { opacity: 0.85; transform: translateY(0); }

    .m-actions { opacity: 0; transform: translateY(20px); transition: all 0.8s ease 1.1s; }
    .m-slide.active .m-actions { opacity: 1; transform: translateY(0); }

    .m-btn { display: inline-block; padding: 18px 45px; border-radius: 60px; text-decoration: none; font-weight: 700; margin: 10px; transition: 0.3s ease; font-size: 15px; }
    .m-btn-gold { color: #fff; }
    .m-btn-outline { border: 2px solid rgba(255,255,255,0.4); color: #fff; backdrop-filter: blur(5px); }
    .m-btn-outline:hover { background: #fff; color: #000; border-color: #fff; }

    /* --- VERTICAL NAVIGATION --- */
    .slider-nav-vertical {
        position: absolute;
        right: 40px;
        top: 50%;
        transform: translateY(-50%);
        display: flex;
        flex-direction: column;
        gap: 30px;
        z-index: 100;
        align-items: center;
    }

    .nav-line {
        position: absolute;
        width: 1px;
        height: 100%;
        background: rgba(255,255,255,0.1);
        left: 50%;
        transform: translateX(-50%);
        z-index: -1;
    }

    .dot {
        position: relative;
        cursor: pointer;
        display: flex;
        align-items: center;
        justify-content: center;
        transition: transform 0.3s ease;
    }

    .dot:hover { transform: scale(1.1); }

    .dot-label {
        position: absolute;
        color: #ffffff;
        font-size: 11px;
        font-weight: 800;
        letter-spacing: 0.5px;
        z-index: 5;
        pointer-events: none;
        transition: color 0.3s ease;
    }

    .dot svg { transform: rotate(-90deg); display: block; }
    .circle-bg { fill: rgba(0,0,0,0.4); stroke: rgba(255,255,255,0.15); stroke-width: 2; }
    .circle-progress { 
        fill: none; stroke-width: 2; 
        stroke-dasharray: 125.66; stroke-dashoffset: 125.66; 
    }

    .dot.active .circle-progress {
        animation: circleAnim 5s linear forwards;
    }

    @keyframes circleAnim { to { stroke-dashoffset: 0; } }

    @media (max-width: 768px) {
        .slider-nav-vertical { right: 20px; }
    }
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const slides = document.querySelectorAll('.m-slide');
    const dots = document.querySelectorAll('.dot');
    let current = 0;
    const intervalTime = 5000; 

    function nextSlide() {
        slides[current].classList.remove('active');
        dots[current].classList.remove('active');
        current = (current + 1) % slides.length;
        slides[current].classList.add('active');
        dots[current].classList.add('active');
    }

    let slideTimer = setInterval(nextSlide, intervalTime);

    dots.forEach((dot, idx) => {
        dot.addEventListener('click', () => {
            clearInterval(slideTimer);
            slides[current].classList.remove('active');
            dots[current].classList.remove('active');
            current = idx;
            slides[current].classList.add('active');
            dots[current].classList.add('active');
            slideTimer = setInterval(nextSlide, intervalTime);
        });
    });
});
</script>