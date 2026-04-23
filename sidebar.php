<?php
/**
 * Marriage Registry Sidebar Template
 * Developed by: James P. Friday
 * GitHub: https://github.com/CityRock007/
 */

if ( ! defined( 'ABSPATH' ) ) exit;

// If the sidebar is not active, we can show default "Marriage Registry" widgets
?>

<aside id="secondary" class="widget-area">
    <?php if ( is_active_sidebar( 'main-sidebar' ) ) : ?>
        
        <?php dynamic_sidebar( 'main-sidebar' ); ?>

    <?php else : ?>
        
        <section class="widget widget_marriage_info">
            <h2 class="widget-title"><?php esc_html_e( 'Registry Information', 'marriage-registry' ); ?></h2>
            <div class="textwidget">
                <p><?php esc_html_e( 'Access official marriage guidelines, counselor directories, and registry documentation.', 'marriage-registry' ); ?></p>
            </div>
        </section>

        <section class="widget widget_nav_menu">
            <h2 class="widget-title"><?php esc_html_e( 'Quick Access', 'marriage-registry' ); ?></h2>
            <ul class="marriage-quick-links">
                <li><a href="#"><i class="fas fa-certificate"></i> <?php esc_html_e( 'Verify Certificate', 'marriage-registry' ); ?></a></li>
                <li><a href="#"><i class="fas fa-user-tie"></i> <?php esc_html_e( 'Find a Counselor', 'marriage-registry' ); ?></a></li>
                <li><a href="#"><i class="fas fa-gavel"></i> <?php esc_html_e( 'Marriage Laws', 'marriage-registry' ); ?></a></li>
            </ul>
        </section>

    <?php endif; ?>
</aside>

<style>
/* Sidebar Widget Styling */
.widget {
    margin-bottom: 40px;
    padding: 25px;
    background: #fff;
    border: 1px solid #e0e0e0;
    border-radius: 4px;
}

.widget-title {
    font-size: 1.2rem;
    font-weight: 700;
    text-transform: uppercase;
    color: #1a2a3a;
    margin-bottom: 20px;
    padding-bottom: 10px;
    border-bottom: 2px solid #d4af37; /* Marriage Gold Accent */
}

.marriage-quick-links {
    list-style: none;
    padding: 0;
}

.marriage-quick-links li {
    margin-bottom: 15px;
}

.marriage-quick-links li a {
    color: #555;
    text-decoration: none;
    display: flex;
    align-items: center;
    transition: color 0.3s ease;
}

.marriage-quick-links li a i {
    width: 25px;
    color: #d4af37;
    margin-right: 10px;
}

.marriage-quick-links li a:hover {
    color: #d4af37;
}
</style>