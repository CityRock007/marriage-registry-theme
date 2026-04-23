<?php
/**
 * Marriage Registry functions and definitions
 * Developed by: James P. Friday
 * GitHub: https://github.com/CityRock007/
 * @package Marriage_Registry
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}

/**
 * Define Theme Constants
 */
define( 'MARRIAGE_REGISTRY_VERSION', '1.0.1' );
define( 'MARRIAGE_REGISTRY_DIR', get_template_directory() );
define( 'MARRIAGE_REGISTRY_URL', get_template_directory_uri() );

/**
 * 1. THE INTEGRITY CORE
 */
require_once MARRIAGE_REGISTRY_DIR . '/inc/integrity-core.php';

/**
 * 2. THE CUSTOMIZER
 */
require_once MARRIAGE_REGISTRY_DIR . '/inc/customizer.php';

/**
 * 3. ENQUEUE SCRIPTS & STYLES
 */
require_once MARRIAGE_REGISTRY_DIR . '/inc/enqueue.php';


/**
 * Theme Setup
 */
if ( ! function_exists( 'marriage_registry_setup' ) ) :
    function marriage_registry_setup() {
        
        add_theme_support( 'title-tag' );
        add_theme_support( 'post-thumbnails' );
        add_theme_support( 'custom-logo', array(
            'height'      => 100,
            'width'       => 300,
            'flex-height' => true,
            'flex-width'  => true,
        ) );

        /**
         * Register Navigation Menus
         * Added 'Dedicated Mobile Menu' for a cleaner mobile experience.
         */
        register_nav_menus( array(
            'primary-menu' => esc_html__( 'Primary Menu (Desktop)', 'marriage-registry' ),
            'footer-menu'  => esc_html__( 'Footer Menu', 'marriage-registry' ),
            'mobile-menu'  => esc_html__( 'Dedicated Mobile Menu', 'marriage-registry' ),
        ) );

        add_theme_support( 'html5', array(
            'search-form', 'comment-form', 'comment-list', 'gallery', 'caption', 'style', 'script',
        ) );
    }
endif;
add_action( 'after_setup_theme', 'marriage_registry_setup' );

/**
 * Register Sidebar Area
 */
function marriage_registry_widgets_init() {
    register_sidebar( array(
        'name'          => esc_html__( 'Main Sidebar', 'marriage-registry' ),
        'id'            => 'main-sidebar',
        'description'   => esc_html__( 'Add widgets here to appear in your marriage registry sidebar.', 'marriage-registry' ),
        'before_widget' => '<section id="%1$s" class="widget %2$s">',
        'after_widget'  => '</section>',
        'before_title'  => '<h2 class="widget-title">',
        'after_title'   => '</h2>',
    ) );
}
add_action( 'widgets_init', 'marriage_registry_widgets_init' );

/**
 * 4. PROGRAM LEADS SYSTEM (BY JAMES P. FRIDAY)
 * Handles database table creation, AJAX storage, and Admin UI
 */

// A. Create Custom DB Table on Theme Activation
function mr_create_leads_table() {
    global $wpdb;
    $table_name = $wpdb->prefix . 'program_leads';
    $charset_collate = $wpdb->get_charset_collate();

    $sql = "CREATE TABLE $table_name (
        id mediumint(9) NOT NULL AUTO_INCREMENT,
        created_at datetime DEFAULT CURRENT_TIMESTAMP NOT NULL,
        email varchar(100) NOT NULL,
        program_name varchar(255) NOT NULL,
        status varchar(20) DEFAULT 'pending' NOT NULL,
        PRIMARY KEY  (id)
    ) $charset_collate;";

    require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
    dbDelta( $sql );
}
add_action( 'after_switch_theme', 'mr_create_leads_table' );

// B. Handle AJAX Form Submission
add_action('wp_ajax_save_program_lead', 'mr_handle_program_lead');
add_action('wp_ajax_nopriv_save_program_lead', 'mr_handle_program_lead');

function mr_handle_program_lead() {
    global $wpdb;

    $email   = isset($_POST['user_email']) ? sanitize_email($_POST['user_email']) : '';
    $program = isset($_POST['program_name']) ? sanitize_text_field($_POST['program_name']) : '';

    if ( ! is_email($email) ) {
        wp_send_json_error( __('Please provide a valid email address.', 'marriage-registry') );
    }

    $table_name = $wpdb->prefix . 'program_leads';
    
    $inserted = $wpdb->insert( $table_name, array(
        'email'        => $email,
        'program_name' => $program,
        'created_at'   => current_time('mysql')
    ));

    if ( $inserted ) {
        // Optional: Send a notification using the Customizer "From Email"
        $from_email = get_theme_mod('program_from_email', get_option('admin_email'));
        $headers = array('Content-Type: text/html; charset=UTF-8', 'From: Marriage Registry <' . $from_email . '>');
        $subject = 'New Program Interest: ' . $program;
        $message = 'A user has registered interest in the program: ' . $program . '<br>Email: ' . $email;
        
        wp_mail( get_option('admin_email'), $subject, $message, $headers );

        wp_send_json_success( __('Lead captured successfully!', 'marriage-registry') );
    } else {
        wp_send_json_error( __('Database error. Please try again.', 'marriage-registry') );
    }
}

// C. Admin Lead Viewer Page
add_action('admin_menu', 'mr_register_leads_admin_page');
function mr_register_leads_admin_page() {
    add_menu_page(
        __('Program Leads', 'marriage-registry'),
        __('Program Leads', 'marriage-registry'),
        'manage_options',
        'program-leads',
        'mr_render_leads_page',
        'dashicons-groups',
        25
    );
}

function mr_render_leads_page() {
    global $wpdb;
    $table_name = $wpdb->prefix . 'program_leads';
    $results = $wpdb->get_results("SELECT * FROM $table_name ORDER BY created_at DESC");
    ?>
    <div class="wrap">
        <h1 class="wp-heading-inline">Marriage Registry: Program Leads</h1>
        <hr class="wp-header-end">
        
        <table class="wp-list-table widefat fixed striped table-view-list" style="margin-top: 20px;">
            <thead>
                <tr>
                    <th><?php _e('Date', 'marriage-registry'); ?></th>
                    <th><?php _e('User Email', 'marriage-registry'); ?></th>
                    <th><?php _e('Program Selected', 'marriage-registry'); ?></th>
                </tr>
            </thead>
            <tbody>
                <?php if ( $results ) : foreach ( $results as $lead ) : ?>
                    <tr>
                        <td><?php echo esc_html($lead->created_at); ?></td>
                        <td><strong><?php echo esc_html($lead->email); ?></strong></td>
                        <td><?php echo esc_html($lead->program_name); ?></td>
                    </tr>
                <?php endforeach; else : ?>
                    <tr>
                        <td colspan="3"><?php _e('No leads found yet.', 'marriage-registry'); ?></td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
    <?php
}