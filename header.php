<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:ital,wght@0,200..800;1,200..800&display=swap" rel="stylesheet">
    <?php wp_head(); ?>

    <style>
        :root { 
            --p-navy: #0f172a; 
            --m-gold: #d4af37; 
            --font-main: 'Plus Jakarta Sans', sans-serif;
            --header-transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        }

        body { font-family: var(--font-main); margin: 0; -webkit-font-smoothing: antialiased; }
        
        /* --- CORE HEADER STRUCTURE --- */
        .site-header { 
            background: transparent; 
            width: 100%; 
            padding: 25px 0; 
            position: fixed; 
            top: 0; 
            z-index: 1000; 
            transition: var(--header-transition);
            border-bottom: 1px solid rgba(255,255,255,0.08);
        }
        
        .site-header.scrolled {
            background: #ffffff;
            padding: 12px 0;
            box-shadow: 0 10px 30px rgba(0,0,0,0.05);
            border-bottom: 1px solid #f1f5f9;
        }
        
        .admin-bar .site-header { top: 32px; }
        
        .header-container { 
            max-width: 1200px; 
            margin: 0 auto; 
            padding: 0 25px; 
            display: flex; 
            justify-content: space-between; 
            align-items: center; 
        }
        
        /* BRANDING */
        .site-branding a { 
            text-decoration: none; 
            color: #ffffff; 
            font-size: 1.3rem; 
            font-weight: 800; 
            text-transform: uppercase;
            letter-spacing: -0.5px;
            transition: var(--header-transition);
        }
        .site-header.scrolled .site-branding a { color: var(--p-navy); }

        /* --- DESKTOP NAVIGATION --- */
        .main-navigation ul { 
            display: flex; 
            list-style: none; 
            gap: 10px; 
            margin: 0; 
            padding: 0; 
            align-items: center;
        }
        
        .main-navigation ul li { position: relative; }
        
        .main-navigation ul li a { 
            text-decoration: none; 
            color: rgba(255,255,255,0.95); 
            font-weight: 700; 
            font-size: 14px;
            padding: 10px 18px;
            border-radius: 8px;
            transition: var(--header-transition);
        }
        
        .site-header.scrolled .main-navigation ul li a { color: #475569; }
        
        /* Hover Effect */
        .main-navigation ul li a:hover { 
            color: var(--m-gold); 
            background: rgba(255,255,255,0.05);
        }
        
        .site-header.scrolled .main-navigation ul li a:hover { 
            background: #f8fafc;
            color: var(--p-navy);
        }

        /* --- DESKTOP DROPDOWNS --- */
        .main-navigation ul li ul.sub-menu {
            position: absolute;
            top: 100%;
            left: 0;
            background: #ffffff;
            min-width: 220px;
            box-shadow: 0 15px 35px rgba(0,0,0,0.12);
            padding: 12px;
            display: block;
            border-radius: 12px;
            z-index: 10;
            opacity: 0;
            visibility: hidden;
            transform: translateY(10px);
            transition: var(--header-transition);
            border: 1px solid #f1f5f9;
        }
        
        .main-navigation ul li:hover > ul.sub-menu { 
            opacity: 1;
            visibility: visible;
            transform: translateY(5px);
        }
        
        .main-navigation ul li ul.sub-menu li { width: 100%; margin: 0; }
        
        .main-navigation ul li ul.sub-menu li a { 
            color: #475569 !important; 
            padding: 10px 15px; 
            display: block; 
            font-size: 13px;
            font-weight: 600;
            border-radius: 6px;
        }
        
        .main-navigation ul li ul.sub-menu li a:hover { 
            background: #f8fafc; 
            color: var(--m-gold) !important;
            padding-left: 20px;
        }

        /* --- MOBILE TOGGLE VISIBILITY --- */
        .mobile-toggle-btn { 
            display: none; 
            background: transparent; 
            border: 1px solid rgba(255,255,255,0.2); 
            color: #fff; 
            width: 42px; height: 42px; border-radius: 10px; font-size: 18px;
            cursor: pointer;
            transition: var(--header-transition);
        }
        
        .site-header.scrolled .mobile-toggle-btn { 
            color: var(--p-navy); 
            border-color: #e2e8f0; 
            background: #f8fafc;
        }

        @media (max-width: 991px) {
            .main-navigation { display: none; }
            .mobile-toggle-btn { display: flex; align-items: center; justify-content: center; }
        }
    </style>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<div id="menu-blur-bg" style="position: fixed; top: 0; left: 0; width: 100%; height: 100%; background: rgba(15, 23, 42, 0.4); backdrop-filter: blur(2px); z-index: 10000; display: none;"></div>

<?php get_template_part('parts/mobile-menu-drawer'); ?>

<div id="page" class="site">
    <header id="masthead" class="site-header">
        <div class="header-container">
            <div class="site-branding">
                <a href="<?php echo esc_url( home_url( '/' ) ); ?>">
                    <?php 
                    if ( has_custom_logo() ) {
                        the_custom_logo();
                    } else {
                        bloginfo( 'name' );
                    }
                    ?>
                </a>
            </div>

            <nav class="main-navigation">
                <?php wp_nav_menu( array( 'theme_location' => 'primary-menu', 'container' => false ) ); ?>
            </nav>

            <button class="mobile-toggle-btn" id="open-mobile-menu" aria-label="Open Menu">
                <i class="fas fa-bars"></i>
            </button>
        </div>
    </header>

    <script>
    document.addEventListener('DOMContentLoaded', function() {
        const header = document.getElementById('masthead');
        const btn = document.getElementById('open-mobile-menu');
        const blur = document.getElementById('menu-blur-bg');
        
        // This links the header to the dedicated mobile drawer logic
        const overlay = document.getElementById('mobile-menu-overlay');

        // Sticky Logic
        window.addEventListener('scroll', () => {
            if (window.scrollY > 50) { 
                header.classList.add('scrolled'); 
            } else { 
                header.classList.remove('scrolled'); 
            }
        });

        // Toggle Drawer (Communicates with mobile-menu-drawer.php)
        if(btn && overlay) {
            btn.onclick = function() {
                overlay.classList.add('active');
                blur.style.display = "block";
                document.body.style.overflow = "hidden";
            };
        }
        
        // Blur listener to close
        if(blur) {
            blur.onclick = function() {
                overlay.classList.remove('active');
                blur.style.display = "none";
                document.body.style.overflow = "auto";
            };
        }
    });
    </script>

    <div id="content" class="site-content">