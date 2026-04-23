<?php
/**
 * Marriage Registry Main Index File - Master Revamp
 * Developed by: James P. Friday
 * GitHub: https://github.com/CityRock007/
 */

get_header(); ?>

<main id="primary" class="site-main" style="font-family: 'Plus Jakarta Sans', sans-serif;">

    <?php 
    /**
     * 1. THE HERO SECTION
     */
    get_template_part( 'parts/hero' ); 
    ?>

    <?php 
    /**
     * 2. THE FEATURES OVERLAY
     */
    get_template_part( 'parts/features' ); 
    ?>

    <?php 
    /**
     * 3. UNIQUE FEATURE: THE JOURNEY
     * Visual step-by-step registry process
     */
    get_template_part( 'parts/process-steps' ); 
    ?>

    <?php 
    /**
     * 4. THE PRESIDENT'S ADDRESS
     * Leadership message positioned with minimal vertical gaps
     */
    get_template_part( 'parts/president-message' ); 
    ?>

    <div class="main-body-wrapper">
        <div class="main-container">
            
            <div class="content-area">
                <?php 
                /**
                 * 5. SEMINARS & PROGRAMS
                 * Calendar-style display for upcoming registry events
                 */
                get_template_part( 'parts/program-calendar' ); 
                ?>
            </div>

        </div>
    </div>

    <?php 
    /**
     * 6. UNIQUE FEATURE: STATUS TRACKER
     */
    get_template_part( 'parts/registry-check' ); 
    ?>

    <?php 
    /**
     * 7. THE CALL TO ACTION
     */
    get_template_part( 'parts/cta' ); 
    ?>

</main>

<style>
    /* GLOBAL BODY STYLES */
    .main-body-wrapper { 
        background: #fdfdfd; 
        /* GAP REMOVAL: Reduced padding to 10px to bridge the President and Calendar sections */
        padding: 10px 0; 
    }
    
    .main-container {
        max-width: 1200px;
        margin: 0 auto;
        padding: 0 25px;
    }

    /* SHARED SECTION HEADERS */
    .content-area { width: 100%; }
    
    .section-badge {
        display: inline-block;
        color: var(--m-gold);
        font-weight: 800;
        font-size: 12px;
        text-transform: uppercase;
        letter-spacing: 2px;
        margin-bottom: 10px;
    }

    .section-title { 
        font-size: 2.5rem; 
        font-weight: 800; 
        color: var(--p-navy); 
        margin-bottom: 20px; 
        letter-spacing: -1px;
    }
    
    .title-underline { 
        width: 80px; height: 5px; 
        background: var(--m-gold); 
        border-radius: 10px; margin: 0 auto;
    }

    /* RESPONSIVE ADJUSTMENTS */
    @media (max-width: 991px) {
        .main-body-wrapper { padding: 10px 0; }
        .section-title { font-size: 1.8rem; }
    }
</style>

<?php get_footer(); ?>