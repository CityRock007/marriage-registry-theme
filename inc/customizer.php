<?php
/**
 * Marriage Registry Customizer Engine
 * Developed by: James P. Friday
 * GitHub: https://github.com/CityRock007/
 */

if ( ! defined( 'ABSPATH' ) ) exit;

function marriage_registry_customize_register( $wp_customize ) {

    // --- SECTION: Pro Licensing (Servinux Gateway) ---
    $wp_customize->add_section( 'marriage_registry_pro_section', array(
        'title'    => __( 'Marriage Registry Pro', 'marriage-registry' ),
        'priority' => 10,
    ) );

    $wp_customize->add_setting( 'marriage_registry_license_key', array(
        'default'           => '',
        'sanitize_callback' => 'sanitize_text_field',
        'transport'         => 'refresh',
    ) );

    $wp_customize->add_control( 'marriage_registry_license_key', array(
        'label'    => __( 'Servinux License Key', 'marriage-registry' ),
        'section'  => 'marriage_registry_pro_section',
        'description' => __( 'Enter your license key to remove developer signatures and whitelabel the theme.', 'marriage-registry' ),
        'type'     => 'text',
    ) );


    // --- SECTION: Hero Slider Settings ---
    $wp_customize->add_section( 'marriage_registry_hero_section', array(
        'title'       => __( 'Hero Slider Settings', 'marriage-registry' ),
        'priority'    => 30,
        'description' => __( 'Customize the cinematic Ken Burns slider images, text, and global hero colors.', 'marriage-registry' ),
    ) );

    // Global Hero Title Color
    $wp_customize->add_setting( 'hero_title_color', array(
        'default'           => '#ffffff',
        'sanitize_callback' => 'sanitize_hex_color',
        'transport'         => 'refresh',
    ) );
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'hero_title_color', array(
        'label'    => __( 'Main Title Color', 'marriage-registry' ),
        'section'  => 'marriage_registry_hero_section',
    ) ) );

    // Global Hero Subtitle Color
    $wp_customize->add_setting( 'hero_sub_color', array(
        'default'           => '#ffffff',
        'sanitize_callback' => 'sanitize_hex_color',
        'transport'         => 'refresh',
    ) );
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'hero_sub_color', array(
        'label'    => __( 'Subtitle Color', 'marriage-registry' ),
        'section'  => 'marriage_registry_hero_section',
    ) ) );

    // Global Hero Primary Color (Buttons & Progress)
    $wp_customize->add_setting( 'hero_btn_bg', array(
        'default'           => '#d4af37',
        'sanitize_callback' => 'sanitize_hex_color',
        'transport'         => 'refresh',
    ) );
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'hero_btn_bg', array(
        'label'    => __( 'Button & Progress Circle Color', 'marriage-registry' ),
        'section'  => 'marriage_registry_hero_section',
    ) ) );

    // Hero Overlay Opacity
    $wp_customize->add_setting( 'hero_overlay_opacity', array(
        'default'           => '0.5',
        'sanitize_callback' => 'sanitize_text_field',
        'transport'         => 'refresh',
    ) );
    $wp_customize->add_control( 'hero_overlay_opacity', array(
        'label'       => __( 'Background Overlay Opacity', 'marriage-registry' ),
        'description' => __( 'Enter a value between 0.1 (light) and 0.9 (dark).', 'marriage-registry' ),
        'section'     => 'marriage_registry_hero_section',
        'type'        => 'text',
    ) );

    // Individual Slide Settings Loop
    for ( $i = 1; $i <= 3; $i++ ) {
        // Slide Divider for better UI in Customizer
        $wp_customize->add_setting( "hero_slide_divider_$i", array( 'sanitize_callback' => 'sanitize_text_field' ) );
        $wp_customize->add_control( new WP_Customize_Control( $wp_customize, "hero_slide_divider_$i", array(
            'label'    => "--- Slide $i Content ---",
            'section'  => 'marriage_registry_hero_section',
            'type'     => 'hidden', 
        ) ) );

        // Slide Image
        $wp_customize->add_setting( "hero_slide_img_$i", array(
            'default'           => '',
            'sanitize_callback' => 'esc_url_raw',
        ) );
        $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, "hero_slide_img_$i", array(
            'label'    => sprintf( __( 'Slide %d Image', 'marriage-registry' ), $i ),
            'section'  => 'marriage_registry_hero_section',
        ) ) );

        // Slide Title
        $wp_customize->add_setting( "hero_slide_title_$i", array(
            'default'           => ( $i == 1 ) ? __( 'Sacred Unions, Organized', 'marriage-registry' ) : '',
            'sanitize_callback' => 'sanitize_text_field',
            'transport'         => 'postMessage',
        ) );
        $wp_customize->add_control( "hero_slide_title_$i", array(
            'label'    => sprintf( __( 'Slide %d Title', 'marriage-registry' ), $i ),
            'section'  => 'marriage_registry_hero_section',
        ) );

        // Slide Subtitle
        $wp_customize->add_setting( "hero_slide_sub_$i", array(
            'default'           => ( $i == 1 ) ? __( 'Expert administration for Marriage Registry offices.', 'marriage-registry' ) : '',
            'sanitize_callback' => 'sanitize_textarea_field',
            'transport'         => 'postMessage',
        ) );
        $wp_customize->add_control( "hero_slide_sub_$i", array(
            'label'    => sprintf( __( 'Slide %d Subtitle', 'marriage-registry' ), $i ),
            'section'  => 'marriage_registry_hero_section',
            'type'     => 'textarea',
        ) );
    }

    // --- SECTION: Features Section (Priority 31) ---
    $wp_customize->add_section( 'marriage_registry_features_section', array(
        'title'    => __( 'Features Section', 'marriage-registry' ),
        'priority' => 31,
        'description' => __( 'Customize the icons, titles, and colors for the features overlay section.', 'marriage-registry' ),
    ) );

    // Feature Card Background Color
    $wp_customize->add_setting( 'feature_card_bg', array(
        'default'           => '#ffffff',
        'sanitize_callback' => 'sanitize_hex_color',
        'transport'         => 'refresh',
    ) );
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'feature_card_bg', array(
        'label'    => __( 'Card Background Color', 'marriage-registry' ),
        'section'  => 'marriage_registry_features_section',
    ) ) );

    // Feature Icon Color
    $wp_customize->add_setting( 'feature_icon_color', array(
        'default'           => '#d4af37',
        'sanitize_callback' => 'sanitize_hex_color',
        'transport'         => 'refresh',
    ) );
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'feature_icon_color', array(
        'label'    => __( 'Icon & Accent Color', 'marriage-registry' ),
        'section'  => 'marriage_registry_features_section',
    ) ) );

    // Loop for the 3 Feature Items
    for ( $i = 1; $i <= 3; $i++ ) {
        // Divider for UI
        $wp_customize->add_setting( "feature_divider_$i", array( 'sanitize_callback' => 'sanitize_text_field' ) );
        $wp_customize->add_control( new WP_Customize_Control( $wp_customize, "feature_divider_$i", array(
            'label'    => "--- Feature Item $i ---",
            'section'  => 'marriage_registry_features_section',
            'type'     => 'hidden',
        ) ) );

        // Feature Icon (FontAwesome Class)
        $wp_customize->add_setting( "feature_icon_$i", array(
            'default'           => ( $i == 1 ) ? 'fas fa-file-signature' : ( ($i == 2) ? 'fas fa-handshake' : 'fas fa-database' ),
            'sanitize_callback' => 'sanitize_text_field',
        ) );
        $wp_customize->add_control( "feature_icon_$i", array(
            'label'    => sprintf( __( 'Item %d Icon Class', 'marriage-registry' ), $i ),
            'description' => __( 'Use FontAwesome classes (e.g., fas fa-star)', 'marriage-registry' ),
            'section'  => 'marriage_registry_features_section',
        ) );

        // Feature Title
        $wp_customize->add_setting( "feature_title_$i", array(
            'default'           => ( $i == 1 ) ? 'Legal Registry' : ( ($i == 2) ? 'Counseling' : 'Verified Data' ),
            'sanitize_callback' => 'sanitize_text_field',
            'transport'         => 'postMessage',
        ) );
        $wp_customize->add_control( "feature_title_$i", array(
            'label'    => sprintf( __( 'Item %d Title', 'marriage-registry' ), $i ),
            'section'  => 'marriage_registry_features_section',
        ) );

        // Feature Description
        $wp_customize->add_setting( "feature_desc_$i", array(
            'default'           => ( $i == 1 ) ? 'Digitalized marriage certification and official records management.' : 'Description for your feature.',
            'sanitize_callback' => 'sanitize_textarea_field',
            'transport'         => 'postMessage',
        ) );
        $wp_customize->add_control( "feature_desc_$i", array(
            'label'    => sprintf( __( 'Item %d Description', 'marriage-registry' ), $i ),
            'section'  => 'marriage_registry_features_section',
            'type'     => 'textarea',
        ) );
    }


    // --- SECTION: President's Message ---
    $wp_customize->add_section( 'pres_message_section', array(
        'title'       => __( "President's Message", 'marriage-registry' ),
        'priority'    => 32,
        'description' => __( 'Customize the President address, image, and section colors.', 'marriage-registry' ),
    ) );

    // Toggle Section
    $wp_customize->add_setting( 'show_pres_message', array( 
        'default'           => true, 
        'sanitize_callback' => 'wp_validate_boolean' 
    ) );
    $wp_customize->add_control( 'show_pres_message', array( 
        'label'    => __( 'Show Message Section?', 'marriage-registry' ), 
        'section'  => 'pres_message_section', 
        'type'     => 'checkbox' 
    ) );

    // President Image
    $wp_customize->add_setting( 'pres_image', array( 
        'default'           => '', 
        'sanitize_callback' => 'esc_url_raw' 
    ) );
    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'pres_image', array( 
        'label'    => __( 'President Image', 'marriage-registry' ), 
        'section'  => 'pres_message_section' 
    ) ) );

    // COLOR: Accent Color
    $wp_customize->add_setting( 'pres_accent_color', array( 
        'default'           => '#d4af37', 
        'sanitize_callback' => 'sanitize_hex_color',
        'transport'         => 'refresh'
    ) );
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'pres_accent_color', array(
        'label'    => __( 'Accent Color (Gold areas)', 'marriage-registry' ),
        'section'  => 'pres_message_section',
    ) ) );

    // COLOR: Speech Text Color
    $wp_customize->add_setting( 'pres_text_color', array( 
        'default'           => '#57657a', 
        'sanitize_callback' => 'sanitize_hex_color',
        'transport'         => 'refresh'
    ) );
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'pres_text_color', array(
        'label'    => __( 'Speech Text Color', 'marriage-registry' ),
        'section'  => 'pres_message_section',
    ) ) );

    // COLOR: Card Background
    $wp_customize->add_setting( 'pres_card_bg', array( 
        'default'           => '#fcfcfc', 
        'sanitize_callback' => 'sanitize_hex_color',
        'transport'         => 'refresh'
    ) );
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'pres_card_bg', array(
        'label'    => __( 'Card Background Color', 'marriage-registry' ),
        'section'  => 'pres_message_section',
    ) ) );

    // Badge Text
    $wp_customize->add_setting( 'pres_badge_text', array( 
        'default'           => 'Word from the President', 
        'sanitize_callback' => 'sanitize_text_field',
        'transport'         => 'postMessage'
    ) );
    $wp_customize->add_control( 'pres_badge_text', array( 'label' => 'Section Badge', 'section' => 'pres_message_section' ) );

    // Heading Text
    $wp_customize->add_setting( 'pres_heading_text', array( 
        'default'           => 'A Foundation for Sacred Unions', 
        'sanitize_callback' => 'sanitize_text_field',
        'transport'         => 'postMessage'
    ) );
    $wp_customize->add_control( 'pres_heading_text', array( 'label' => 'Section Heading', 'section' => 'pres_message_section' ) );

    // President Name
    $wp_customize->add_setting( 'pres_name', array( 
        'default'           => 'Dr. Olumide A. Adeniyi', 
        'sanitize_callback' => 'sanitize_text_field',
        'transport'         => 'postMessage'
    ) );
    $wp_customize->add_control( 'pres_name', array( 
        'label'    => __( 'President Full Name', 'marriage-registry' ), 
        'section'  => 'pres_message_section' 
    ) );

    // Title/Position
    $wp_customize->add_setting( 'pres_title', array( 
        'default'           => 'National President', 
        'sanitize_callback' => 'sanitize_text_field',
        'transport'         => 'postMessage'
    ) );
    $wp_customize->add_control( 'pres_title', array( 
        'label'    => __( 'Title/Position', 'marriage-registry' ), 
        'section'  => 'pres_message_section' 
    ) );

    // The Speech
    $wp_customize->add_setting( 'pres_speech', array( 
        'default'           => 'Our mission is to uphold the sanctity of marriage...', 
        'sanitize_callback' => 'sanitize_textarea_field',
        'transport'         => 'postMessage'
    ) );
    $wp_customize->add_control( 'pres_speech', array( 
        'label'    => __( 'The Speech', 'marriage-registry' ), 
        'section'  => 'pres_message_section', 
        'type'     => 'textarea' 
    ) );

    // Experience Years
    $wp_customize->add_setting( 'pres_experience', array( 
        'default'           => '25+', 
        'sanitize_callback' => 'sanitize_text_field',
        'transport'         => 'postMessage'
    ) );
    $wp_customize->add_control( 'pres_experience', array( 'label' => 'Years of Experience', 'section' => 'pres_message_section' ) );

    // --- SECTION: Process Steps (The Journey) ---
    $wp_customize->add_section( 'marriage_registry_process_section', array(
        'title'    => __( 'Process Steps Section', 'marriage-registry' ),
        'priority' => 35,
    ) );

    // Toggle Section
    $wp_customize->add_setting( 'show_process_steps', array( 
        'default'           => true, 
        'sanitize_callback' => 'wp_validate_boolean' 
    ) );
    $wp_customize->add_control( 'show_process_steps', array(
        'label'    => __( 'Show this section?', 'marriage-registry' ),
        'section'  => 'marriage_registry_process_section',
        'type'     => 'checkbox',
    ) );

    // Section Badge
    $wp_customize->add_setting( 'process_badge', array( 
        'default'           => 'Seamless Administration', 
        'sanitize_callback' => 'sanitize_text_field',
        'transport'         => 'postMessage'
    ) );
    $wp_customize->add_control( 'process_badge', array( 
        'label'   => __( 'Section Badge', 'marriage-registry' ), 
        'section' => 'marriage_registry_process_section' 
    ) );

    // Section Title
    $wp_customize->add_setting( 'process_title', array( 
        'default'           => 'The Registry Process', 
        'sanitize_callback' => 'sanitize_text_field',
        'transport'         => 'postMessage'
    ) );
    $wp_customize->add_control( 'process_title', array( 
        'label'   => __( 'Section Title', 'marriage-registry' ), 
        'section' => 'marriage_registry_process_section' 
    ) );

    // Individual Steps Loop
    for ( $i = 1; $i <= 4; $i++ ) {
        
        // Defaults for initial load
        $d_titles = [1 => 'Online Application', 2 => 'Verification', 3 => 'Counseling', 4 => 'Certification'];
        $d_icons  = [1 => 'fas fa-edit', 2 => 'fas fa-user-check', 3 => 'fas fa-comments', 4 => 'fas fa-award'];

        // Divider
        $wp_customize->add_setting( "step_sep_$i", array( 'sanitize_callback' => 'sanitize_text_field' ) );
        $wp_customize->add_control( new WP_Customize_Control( $wp_customize, "step_sep_$i", array(
            'label'    => "--- Step $i ---",
            'section'  => 'marriage_registry_process_section',
            'type'     => 'hidden',
        ) ) );

        // Step Icon
        $wp_customize->add_setting( "step_icon_$i", array( 
            'default'           => $d_icons[$i], 
            'sanitize_callback' => 'sanitize_text_field' 
        ) );
        $wp_customize->add_control( "step_icon_$i", array(
            'label'   => sprintf( __( 'Step %d Icon Class', 'marriage-registry' ), $i ),
            'section' => 'marriage_registry_process_section',
        ) );

        // Step Title
        $wp_customize->add_setting( "step_title_$i", array( 
            'default'           => $d_titles[$i], 
            'sanitize_callback' => 'sanitize_text_field',
            'transport'         => 'postMessage'
        ) );
        $wp_customize->add_control( "step_title_$i", array( 
            'label'   => sprintf( __( 'Step %d Title', 'marriage-registry' ), $i ), 
            'section' => 'marriage_registry_process_section' 
        ) );

        // Step Description
        $wp_customize->add_setting( "step_desc_$i", array( 
            'default'           => sprintf( __( 'Detailed description for step %d of the marriage registry process.', 'marriage-registry' ), $i ), 
            'sanitize_callback' => 'sanitize_textarea_field',
            'transport'         => 'postMessage'
        ) );
        $wp_customize->add_control( "step_desc_$i", array( 
            'label'   => sprintf( __( 'Step %d Description', 'marriage-registry' ), $i ), 
            'section' => 'marriage_registry_process_section', 
            'type'    => 'textarea' 
        ) );
    }


    // --- SECTION: Programs Calendar ---
    $wp_customize->add_section( 'registry_calendar_section', array(
        'title'       => __( 'Programs Calendar', 'marriage-registry' ),
        'priority'    => 37,
        'description' => __( 'Manage upcoming seminars, events, and calendar colors.', 'marriage-registry' ),
    ) );

    // Toggle Section
    $wp_customize->add_setting( 'show_calendar', array( 
        'default'           => true, 
        'sanitize_callback' => 'wp_validate_boolean' 
    ) );
    $wp_customize->add_control( 'show_calendar', array( 
        'label'   => __( 'Show Calendar Section?', 'marriage-registry' ), 
        'section' => 'registry_calendar_section', 
        'type'    => 'checkbox' 
    ) );

    // Dynamic Color: Primary Navy/Dark
    $wp_customize->add_setting( 'p_navy_color', array(
        'default'           => '#0f172a',
        'sanitize_callback' => 'sanitize_hex_color',
        'transport'         => 'refresh',
    ) );
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'p_navy_color', array(
        'label'    => __( 'Calendar Primary Color (Navy)', 'marriage-registry' ),
        'section'  => 'registry_calendar_section',
    ) ) );

    // Reminder Settings
    $wp_customize->add_setting( 'program_from_email', array( 
        'default'           => get_option('admin_email'), 
        'sanitize_callback' => 'sanitize_email' 
    ) );
    $wp_customize->add_control( 'program_from_email', array( 
        'label'       => __( 'From Email for Reminders', 'marriage-registry' ), 
        'section'     => 'registry_calendar_section',
        'description' => __( 'The email address couples will see when receiving program details.', 'marriage-registry' )
    ) );

    // Loop for the 3 Event Slots
    for ( $i = 1; $i <= 3; $i++ ) {
        
        // UI Divider
        $wp_customize->add_setting( "program_divider_$i", array( 'sanitize_callback' => 'sanitize_text_field' ) );
        $wp_customize->add_control( new WP_Customize_Control( $wp_customize, "program_divider_$i", array(
            'label'    => "--- Event $i Details ---",
            'section'  => 'registry_calendar_section',
            'type'     => 'hidden',
        ) ) );

        // Event Day
        $wp_customize->add_setting( "program_day_$i", array( 
            'default'           => '22', 
            'sanitize_callback' => 'sanitize_text_field',
            'transport'         => 'postMessage'
        ) );
        $wp_customize->add_control( "program_day_$i", array( 
            'label'   => sprintf( __( 'Event %d Day (e.g. 22)', 'marriage-registry' ), $i ), 
            'section' => 'registry_calendar_section' 
        ) );

        // Event Month
        $wp_customize->add_setting( "program_month_$i", array( 
            'default'           => 'APR', 
            'sanitize_callback' => 'sanitize_text_field',
            'transport'         => 'postMessage'
        ) );
        $wp_customize->add_control( "program_month_$i", array( 
            'label'   => sprintf( __( 'Event %d Month (e.g. APR)', 'marriage-registry' ), $i ), 
            'section' => 'registry_calendar_section' 
        ) );

        // Event Title
        $wp_customize->add_setting( "program_title_$i", array( 
            'default'           => sprintf( __( 'Seminar %d Title', 'marriage-registry' ), $i ), 
            'sanitize_callback' => 'sanitize_text_field',
            'transport'         => 'postMessage'
        ) );
        $wp_customize->add_control( "program_title_$i", array( 
            'label'   => sprintf( __( 'Event %d Title', 'marriage-registry' ), $i ), 
            'section' => 'registry_calendar_section' 
        ) );

        // Event Time
        $wp_customize->add_setting( "program_time_$i", array( 
            'default'           => '10:00 AM', 
            'sanitize_callback' => 'sanitize_text_field',
            'transport'         => 'postMessage'
        ) );
        $wp_customize->add_control( "program_time_$i", array( 
            'label'   => sprintf( __( 'Event %d Time', 'marriage-registry' ), $i ), 
            'section' => 'registry_calendar_section' 
        ) );
    }

    // --- SECTION: Call To Action (CTA) ---
    $wp_customize->add_section( 'marriage_registry_cta_section', array(
        'title'    => __( 'Call to Action (CTA)', 'marriage-registry' ),
        'priority' => 40,
    ) );

    $wp_customize->add_setting( 'cta_text', array(
        'default'           => __( 'Ready to register your marriage?', 'marriage-registry' ),
        'sanitize_callback' => 'sanitize_text_field',
    ) );

    $wp_customize->add_control( 'cta_text', array(
        'label'    => __( 'CTA Heading', 'marriage-registry' ),
        'section'  => 'marriage_registry_cta_section',
    ) );

    $wp_customize->add_setting( 'cta_subtext', array(
        'default'           => __( 'Join thousands of couples and professionals on the IMACN platform today.', 'marriage-registry' ),
        'sanitize_callback' => 'sanitize_text_field',
    ) );

    $wp_customize->add_control( 'cta_subtext', array(
        'label'    => __( 'CTA Subtext', 'marriage-registry' ),
        'section'  => 'marriage_registry_cta_section',
    ) );

    $wp_customize->add_setting( 'cta_button_text', array(
        'default'           => __( 'Get Started', 'marriage-registry' ),
        'sanitize_callback' => 'sanitize_text_field',
    ) );

    $wp_customize->add_control( 'cta_button_text', array(
        'label'    => __( 'Button Text', 'marriage-registry' ),
        'section'  => 'marriage_registry_cta_section',
    ) );

    $wp_customize->add_setting( 'cta_button_link', array(
        'default'           => '#',
        'sanitize_callback' => 'esc_url_raw',
    ) );

    $wp_customize->add_control( 'cta_button_link', array(
        'label'    => __( 'Button Link URL', 'marriage-registry' ),
        'section'  => 'marriage_registry_cta_section',
    ) );

    // CTA Colors
    $wp_customize->add_setting( 'cta_bg_color', array(
        'default'           => '#d4af37',
        'sanitize_callback' => 'sanitize_hex_color',
    ) );

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'cta_bg_color', array(
        'label'    => __( 'Background Color', 'marriage-registry' ),
        'section'  => 'marriage_registry_cta_section',
    ) ) );

    $wp_customize->add_setting( 'cta_text_color', array(
        'default'           => '#1a2a3a',
        'sanitize_callback' => 'sanitize_hex_color',
    ) );

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'cta_text_color', array(
        'label'    => __( 'Text Color', 'marriage-registry' ),
        'section'  => 'marriage_registry_cta_section',
    ) ) );

    $wp_customize->add_setting( 'cta_btn_color', array(
        'default'           => '#1a2a3a',
        'sanitize_callback' => 'sanitize_hex_color',
    ) );

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'cta_btn_color', array(
        'label'    => __( 'Button Background Color', 'marriage-registry' ),
        'section'  => 'marriage_registry_cta_section',
    ) ) );
	
	// --- SECTION: Footer & Support Engine ---
    $wp_customize->add_section( 'marriage_registry_footer_section', array(
        'title'       => __( 'Footer & Support Engine', 'marriage-registry' ),
        'priority'    => 100,
        'description' => __( 'Configure footer details, colors, and the floating WhatsApp support engine.', 'marriage-registry' ),
    ) );

    // --- COLOR CUSTOMIZATION ---
    $wp_customize->add_setting( 'footer_bg_color', array( 'default' => '#0f172a', 'sanitize_callback' => 'sanitize_hex_color' ) );
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'footer_bg_color', array(
        'label'   => __( 'Footer Background Color', 'marriage-registry' ),
        'section' => 'marriage_registry_footer_section',
    ) ) );

    $wp_customize->add_setting( 'whatsapp_color', array( 'default' => '#25d366', 'sanitize_callback' => 'sanitize_hex_color' ) );
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'whatsapp_color', array(
        'label'   => __( 'WhatsApp & Floating Icon Color', 'marriage-registry' ),
        'section' => 'marriage_registry_footer_section',
    ) ) );

    // --- WHATSAPP ENGINE SETTINGS ---
    $wp_customize->add_setting( 'enable_whatsapp', array( 'default' => false, 'sanitize_callback' => 'wp_validate_boolean' ) );
    $wp_customize->add_control( 'enable_whatsapp', array(
        'label'   => __( 'Enable WhatsApp Floating Button', 'marriage-registry' ),
        'section' => 'marriage_registry_footer_section',
        'type'    => 'checkbox',
    ) );

    $wp_customize->add_setting( 'whatsapp_side', array( 'default' => 'right', 'sanitize_callback' => 'sanitize_text_field' ) );
    $wp_customize->add_control( 'whatsapp_side', array(
        'label'   => __( 'Button Position', 'marriage-registry' ),
        'section' => 'marriage_registry_footer_section',
        'type'    => 'select',
        'choices' => array(
            'right' => __( 'Bottom Right (Scroll-to-top moves Left)', 'marriage-registry' ),
            'left'  => __( 'Bottom Left (Scroll-to-top moves Right)', 'marriage-registry' ),
        ),
    ) );

    $wp_customize->add_setting( 'whatsapp_type', array( 'default' => 'single', 'sanitize_callback' => 'sanitize_text_field' ) );
    $wp_customize->add_control( 'whatsapp_type', array(
        'label'   => __( 'WhatsApp Mode', 'marriage-registry' ),
        'section' => 'marriage_registry_footer_section',
        'type'    => 'select',
        'choices' => array(
            'single' => __( 'Direct Chat (Single Number)', 'marriage-registry' ),
            'multi'  => __( 'Agent Selection (Multi-Agent Box)', 'marriage-registry' ),
        ),
    ) );

    // Single Mode Number
    $wp_customize->add_setting( 'whatsapp_number', array( 'default' => '', 'sanitize_callback' => 'sanitize_text_field' ) );
    $wp_customize->add_control( 'whatsapp_number', array(
        'label'   => __( 'Direct Chat Number (Single Mode)', 'marriage-registry' ),
        'section' => 'marriage_registry_footer_section',
        'description' => __( 'Only used for Single Mode. Format: 2348000000000', 'marriage-registry' ),
    ) );

    // MULTI-AGENT INSTRUCTIONS & SETTINGS
    $wp_customize->add_setting( 'whatsapp_multi_names', array( 'default' => 'Admin Support, Counselor Tolu', 'sanitize_callback' => 'sanitize_text_field' ) );
    $wp_customize->add_control( 'whatsapp_multi_names', array(
        'label'   => __( 'Multi-Agent Names', 'marriage-registry' ),
        'section' => 'marriage_registry_footer_section',
        'description' => __( 'Separate names with commas. Order must match the numbers below.', 'marriage-registry' ),
    ) );

    $wp_customize->add_setting( 'whatsapp_multi_numbers', array( 'default' => '', 'sanitize_callback' => 'sanitize_text_field' ) );
    $wp_customize->add_control( 'whatsapp_multi_numbers', array(
        'label'   => __( 'Multi-Agent Numbers', 'marriage-registry' ),
        'section' => 'marriage_registry_footer_section',
        'description' => __( 'Separate numbers with commas (e.g., 23480111, 23480222). No spaces between digits.', 'marriage-registry' ),
    ) );

    $wp_customize->add_setting( 'whatsapp_default_msg', array( 'default' => 'Hello, I would like to inquire about the registry.', 'sanitize_callback' => 'sanitize_text_field' ) );
    $wp_customize->add_control( 'whatsapp_default_msg', array(
        'label'   => __( 'Default Welcome Message', 'marriage-registry' ),
        'section' => 'marriage_registry_footer_section',
        'type'    => 'text',
    ) );

    // --- FOOTER CONTENT ---
    $wp_customize->add_setting( 'footer_description', array( 'default' => '', 'sanitize_callback' => 'sanitize_textarea_field' ) );
    $wp_customize->add_control( 'footer_description', array( 'label' => 'Footer SEO Description', 'section' => 'marriage_registry_footer_section', 'type' => 'textarea' ) );

    $wp_customize->add_setting( 'footer_address', array( 'default' => '123 Registry Way, Abuja', 'sanitize_callback' => 'sanitize_text_field' ) );
    $wp_customize->add_control( 'footer_address', array( 'label' => 'Office Address', 'section' => 'marriage_registry_footer_section' ) );

    $wp_customize->add_setting( 'footer_phone', array( 'default' => '+234 800 000 0000', 'sanitize_callback' => 'sanitize_text_field' ) );
    $wp_customize->add_control( 'footer_phone', array( 'label' => 'Phone Number', 'section' => 'marriage_registry_footer_section' ) );

    $wp_customize->add_setting( 'footer_email', array( 'default' => 'info@registry.com', 'sanitize_callback' => 'sanitize_email' ) );
    $wp_customize->add_control( 'footer_email', array( 'label' => 'Email Address', 'section' => 'marriage_registry_footer_section' ) );

    // Social Links
    foreach(['facebook', 'twitter', 'instagram', 'linkedin'] as $social) {
        $wp_customize->add_setting( "social_$social", array( 'default' => '', 'sanitize_callback' => 'esc_url_raw' ) );
        $wp_customize->add_control( "social_$social", array( 'label' => ucfirst($social) . ' URL', 'section' => 'marriage_registry_footer_section' ) );
    }
    // --- SECTION: Internal Page Styling ---
    $wp_customize->add_section( 'marriage_registry_page_settings', array(
        'title'       => __( 'Internal Page Styling', 'marriage-registry' ),
        'priority'    => 110,
        'description' => __( 'Customize the header banners and titles for internal pages like About Us, Contact, etc.', 'marriage-registry' ),
    ) );

    // Banner Background Color
    $wp_customize->add_setting( 'page_banner_bg', array(
        'default'           => '#0f172a',
        'sanitize_callback' => 'sanitize_hex_color',
        'transport'         => 'refresh',
    ) );
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'page_banner_bg', array(
        'label'    => __( 'Banner Background Color', 'marriage-registry' ),
        'description' => __( 'Changes the background of the title area on internal pages.', 'marriage-registry' ),
        'section'  => 'marriage_registry_page_settings',
    ) ) );

    // Banner Title Color
    $wp_customize->add_setting( 'page_banner_title_color', array(
        'default'           => '#ffffff',
        'sanitize_callback' => 'sanitize_hex_color',
        'transport'         => 'postMessage',
    ) );
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'page_banner_title_color', array(
        'label'    => __( 'Banner Title Color', 'marriage-registry' ),
        'section'  => 'marriage_registry_page_settings',
    ) ) );

    // Global Page Text Color
    $wp_customize->add_setting( 'page_content_text_color', array(
        'default'           => '#475569',
        'sanitize_callback' => 'sanitize_hex_color',
        'transport'         => 'refresh',
    ) );
    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'page_content_text_color', array(
        'label'    => __( 'Content Text Color', 'marriage-registry' ),
        'section'  => 'marriage_registry_page_settings',
    ) ) );

    // --- SECTION: Certificate Verification (registry-check.php) ---
    $wp_customize->add_section( 'marriage_registry_checker_section', array(
        'title'       => __( 'Certificate Verification', 'marriage-registry' ),
        'priority'    => 115,
        'description' => __( 'Customize the layout content inside your registry-check.php template file.', 'marriage-registry' ),
    ) );

    // Visibility Control
    $wp_customize->add_setting( 'show_registry_check', array(
        'default'           => true,
        'sanitize_callback' => 'wp_validate_boolean',
        'transport'         => 'refresh',
    ) );
    $wp_customize->add_control( 'show_registry_check', array(
        'label'    => __( 'Show Verification Section on Homepage', 'marriage-registry' ),
        'section'  => 'marriage_registry_checker_section',
        'type'     => 'checkbox',
    ) );

    // Title Customizer Setting
    $wp_customize->add_setting( 'checker_heading', array(
        'default'           => 'Verify Your Marriage Certificate',
        'sanitize_callback' => 'sanitize_text_field',
        'transport'         => 'postMessage',
    ) );
    $wp_customize->add_control( 'checker_heading', array(
        'label'    => __( 'Section Title', 'marriage-registry' ),
        'section'  => 'marriage_registry_checker_section',
        'type'     => 'text',
    ) );

    // Description Customizer Setting
    $wp_customize->add_setting( 'checker_description', array(
        'default'           => 'Enter your Registry Application Number (RAN) to track your status or verify the authenticity of a certificate.',
        'sanitize_callback' => 'sanitize_textarea_field',
        'transport'         => 'postMessage',
    ) );
    $wp_customize->add_control( 'checker_description', array(
        'label'    => __( 'Section Description Text', 'marriage-registry' ),
        'section'  => 'marriage_registry_checker_section',
        'type'     => 'textarea',
    ) );

    // Placeholder Customizer Setting
    $wp_customize->add_setting( 'checker_placeholder', array(
        'default'           => 'e.g. IMACN-2026-8849',
        'sanitize_callback' => 'sanitize_text_field',
        'transport'         => 'postMessage',
    ) );
    $wp_customize->add_control( 'checker_placeholder', array(
        'label'    => __( 'Input Field Placeholder Hint', 'marriage-registry' ),
        'section'  => 'marriage_registry_checker_section',
        'type'     => 'text',
    ) );

    // Button Label Customizer Setting
    $wp_customize->add_setting( 'checker_btn_text', array(
        'default'           => 'Check Status',
        'sanitize_callback' => 'sanitize_text_field',
        'transport'         => 'postMessage',
    ) );
    $wp_customize->add_control( 'checker_btn_text', array(
        'label'    => __( 'Button Action Text', 'marriage-registry' ),
        'section'  => 'marriage_registry_checker_section',
        'type'     => 'text',
    ) );

} // This brace correctly closes the marriage_registry_customize_register function
add_action( 'customize_register', 'marriage_registry_customize_register' );