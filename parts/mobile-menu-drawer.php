<?php
/**
 * Marriage Registry - Premium Mobile Drawer
 * High-End Design with Smooth Submenu Transitions
 * Developed by: James P. Friday
 */
?>
<nav id="mobile-menu-overlay" class="mobile-drawer-modern">
    <div class="drawer-header-compact">
        <div class="drawer-branding">
            <span class="badge-gold">Registry Portal</span>
            <h3 class="drawer-site-name"><?php bloginfo( 'name' ); ?></h3>
        </div>
        <div class="close-x-modern" id="close-mobile-menu">
            <i class="fas fa-times"></i>
        </div>
    </div>

    <div class="drawer-nav-container">
        <?php 
        wp_nav_menu( array(
            'theme_location' => 'mobile-menu',
            'container'      => false,
            'menu_class'     => 'modern-nav-list',
            'fallback_cb'    => false,
            // Adding a toggle icon to parent items via a filter logic isn't needed 
            // if we use the JS accordion below.
        )); 
        ?>
    </div>

    <div class="drawer-footer-modern">
        <div class="dev-credits">
            <span class="label-tiny">PROJECT ARCHITECT</span>
            <a href="https://github.com/CityRock007/" class="signature-link" target="_blank">JAMES P. FRIDAY</a>
        </div>
    </div>
</nav>

<style>
/* --- CORE DRAWER LAYOUT --- */
#mobile-menu-overlay.mobile-drawer-modern {
    position: fixed !important;
    top: 0 !important;
    right: -100%;
    width: 290px !important;
    height: 100vh !important;
    background: #ffffff !important;
    z-index: 999999 !important;
    transition: right 0.4s cubic-bezier(0.165, 0.84, 0.44, 1) !important;
    box-shadow: -15px 0 40px rgba(0,0,0,0.15) !important;
    display: flex !important;
    flex-direction: column;
    padding: 0 !important; /* Force zero padding to fix gap */
}

#mobile-menu-overlay.active { right: 0 !important; }

/* COMPACT HEADER */
.drawer-header-compact {
    padding: 25px 20px 15px !important; /* Tight spacing */
    border-bottom: 2px solid #d4af37;
    background: #fcfcfc;
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.close-x-modern {
    width: 35px;
    height: 35px;
    background: #f1f5f9;
    color: #0f172a;
    display: flex;
    align-items: center;
    justify-content: center;
    border-radius: 50%;
    cursor: pointer;
    transition: 0.3s;
}

.close-x-modern:hover { background: #0f172a; color: #fff; }

.badge-gold { color: #d4af37; font-size: 9px; font-weight: 800; text-transform: uppercase; letter-spacing: 1.5px; }
.drawer-site-name { color: #0f172a; margin: 2px 0 0; font-size: 1rem; font-weight: 900; }

/* MODERN NAV LIST */
.drawer-nav-container {
    flex: 1;
    overflow-y: auto;
    padding: 10px 0 !important;
}

.modern-nav-list { list-style: none !important; padding: 0 !important; margin: 0 !important; }

.modern-nav-list li { 
    position: relative;
    border-bottom: 1px solid #f1f5f9;
    overflow: hidden;
}

.modern-nav-list li a {
    color: #1e293b !important;
    text-decoration: none !important;
    font-size: 14px !important;
    font-weight: 700 !important;
    display: flex !important;
    justify-content: space-between;
    align-items: center;
    padding: 14px 20px !important;
    transition: all 0.3s ease;
}

.modern-nav-list li a:hover {
    background: #f8fafc;
    color: #d4af37 !important;
    padding-left: 25px !important;
}

/* SUBMENU ANIMATION */
.modern-nav-list .sub-menu {
    list-style: none !important;
    background: #f8fafc;
    max-height: 0;
    overflow: hidden;
    transition: max-height 0.4s ease-out;
    padding: 0 !important;
}

.modern-nav-list li.menu-item-has-children.open-sub > .sub-menu {
    max-height: 500px; /* Adjust based on content */
    padding: 5px 0 10px !important;
}

.modern-nav-list .sub-menu li a {
    padding: 10px 20px 10px 35px !important;
    font-size: 13px !important;
    font-weight: 600 !important;
    color: #64748b !important;
    border: none !important;
}

/* Indicators */
.menu-item-has-children > a::after {
    content: '\f078';
    font-family: "Font Awesome 5 Free";
    font-weight: 900;
    font-size: 10px;
    opacity: 0.5;
    transition: 0.3s;
}

.menu-item-has-children.open-sub > a::after {
    transform: rotate(180deg);
    color: #d4af37;
    opacity: 1;
}

/* FOOTER */
.drawer-footer-modern {
    padding: 20px;
    background: #f8fafc;
    border-top: 1px solid #f1f5f9;
}

.dev-credits { display: flex; flex-direction: column; }
.label-tiny { font-size: 8px; color: #94a3b8; font-weight: 800; letter-spacing: 1px; }
.signature-link { color: #0f172a; text-decoration: none; font-weight: 800; font-size: 12px; }
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Accordion Logic for Submenus
    const parentItems = document.querySelectorAll('.modern-nav-list .menu-item-has-children > a');

    parentItems.forEach(item => {
        item.addEventListener('click', function(e) {
            e.preventDefault();
            const parent = this.parentElement;
            
            // Close other open menus (Optional - remove if you want multiple open)
            document.querySelectorAll('.menu-item-has-children').forEach(el => {
                if(el !== parent) el.classList.remove('open-sub');
            });

            parent.classList.toggle('open-sub');
        });
    });
});
</script>