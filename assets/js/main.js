/**
 * Marriage Registry Main JS
 * Developed by: James P. Friday
 */

(function($) {
    'use strict';

    $(document).ready(function() {
        
        // 1. Mobile Menu Toggle Logic
        const $trigger = $('#mobile-menu-trigger');
        const $overlay = $('#mobile-menu-overlay');
        const $body = $('body');

        $trigger.on('click', function(e) {
            e.preventDefault();
            
            // Toggle classes for animation
            $(this).toggleClass('is-active');
            $overlay.toggleClass('open');
            
            // Prevent scrolling when menu is open
            $body.toggleClass('menu-open');
            
            // Accessibility
            const expanded = $(this).attr('aria-expanded') === 'true';
            $(this).attr('aria-expanded', !expanded);
        });

        // 2. Close Mobile Menu when clicking a link
        $overlay.find('a').on('click', function() {
            $trigger.removeClass('is-active');
            $overlay.removeClass('open');
            $body.removeClass('menu-open');
        });

        // 3. Simple Header Scroll Effect
        $(window).on('scroll', function() {
            if ($(window).scrollTop() > 50) {
                $('.site-header').addClass('scrolled');
            } else {
                $('.site-header').removeClass('scrolled');
            }
        });

    });

})(jQuery);