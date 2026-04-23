/**
 * Marriage Registry Customizer Live Preview
 * Developed by: James P. Friday
 * * This file handles the 'postMessage' transport logic 
 * for real-time design updates.
 */

(function($) {
    'use strict';

    // 1. Live Update for Hero Title
    wp.customize('hero_title', function(value) {
        value.bind(function(newval) {
            $('.hero-title').text(newval);
        });
    });

    // 2. Live Update for Hero Subtitle
    wp.customize('hero_subtitle', function(value) {
        value.bind(function(newval) {
            $('.hero-description').text(newval);
        });
    });

    // 3. Live Update for CTA Text
    wp.customize('cta_text', function(value) {
        value.bind(function(newval) {
            $('.cta-heading').text(newval);
        });
    });

    // 4. Live Update for CTA Button Text
    wp.customize('cta_button_text', function(value) {
        value.bind(function(newval) {
            // We use .contents().first() to preserve any icons inside the button
            $('.btn-cta').contents().first().replaceWith(newval);
        });
    });

})(jQuery);