<?php
/**
 * The template for displaying all pages
 * Developed by: James P. Friday
 */

get_header(); 

// Retrieve Customizer Settings
$banner_bg    = get_theme_mod('page_banner_bg', '#0f172a');
$title_color  = get_theme_mod('page_banner_title_color', '#ffffff');
$accent_color = get_theme_mod('hero_btn_bg', '#d4af37'); // Reuse global gold
?>

<main id="primary" class="site-main">

    <?php while ( have_posts() ) : the_post(); ?>
        
        <section class="page-banner" style="background: <?php echo esc_attr($banner_bg); ?>; padding: 100px 0; text-align: center;">
            <div class="container" style="max-width: 1200px; margin: 0 auto; padding: 0 20px;">
                <h1 class="page-title" style="color: <?php echo esc_attr($title_color); ?>; font-size: clamp(2rem, 5vw, 3rem); font-weight: 800; margin: 0; line-height: 1.2;">
                    <?php the_title(); ?>
                </h1>
                <div class="breadcrumb" style="font-weight: 600; margin-top: 15px; font-size: 14px; letter-spacing: 0.5px;">
                    <a href="<?php echo esc_url( home_url( '/' ) ); ?>" style="color: rgba(255,255,255,0.6); text-decoration: none; transition: 0.3s;">Home</a> 
                    <span style="color: <?php echo esc_attr($accent_color); ?>; opacity: 0.8; margin: 0 8px;"> / </span> 
                    <span style="color: <?php echo esc_attr($accent_color); ?>;"><?php the_title(); ?></span>
                </div>
            </div>
        </section>

        <section class="page-content-area" style="padding: 80px 0; background: #fff;">
            <div class="container" style="max-width: 1000px; margin: 0 auto; padding: 0 20px; line-height: 1.8; color: #475569;">
                <?php 
                if ( has_post_thumbnail() ) {
                    echo '<div class="page-featured-image" style="margin-bottom: 40px; border-radius: 24px; overflow: hidden; box-shadow: 0 20px 40px rgba(0,0,0,0.05);">';
                    the_post_thumbnail('large', array('style' => 'width: 100%; height: auto; display: block;'));
                    echo '</div>';
                }
                
                the_content(); 
                ?>
            </div>
        </section>

    <?php endwhile; ?>

</main>

<style>
    /* Ensure content links inherit the accent color */
    .page-content-area a { color: <?php echo esc_attr($accent_color); ?>; text-decoration: none; font-weight: 600; }
    .page-content-area a:hover { text-decoration: underline; }
    .breadcrumb a:hover { color: #fff !important; }
</style>

<?php get_footer(); ?>