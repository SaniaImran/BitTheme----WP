/**
 * Theme JavaScript
 * Handles sticky header on scroll and Owl Carousel initialization
 */

(function() {
    'use strict';

    // Sticky Header on Scroll
    const header = document.querySelector('header.site-header');
    if (header && header.classList.contains('is-sticky')) {
        window.addEventListener('scroll', () => {
            if (window.scrollY > 0) {
                header.classList.add('sticky');
            } else {
                header.classList.remove('sticky');
            }
        });
    }

    // Owl Carousel Initialization for Sliders
    const sliders = document.querySelectorAll('.bytetheme-slider-shortcode.owl-carousel');
    if (sliders.length > 0 && typeof jQuery !== 'undefined') {
        jQuery(document).ready(function($) {
            sliders.forEach((slider) => {
                $(slider).owlCarousel({
                    items: 1,
                    loop: true,
                    margin: 0,
                    autoplay: true,
                    autoplayTimeout: 5000,
                    autoplayHoverPause: true,
                    nav: false,
                    navText: ['<span class="owl-prev">&#10094;</span>', '<span class="owl-next">&#10095;</span>'],
                    dots: true,
                    responsive: {
                        0: {
                            items: 1
                        },
                        768: {
                            items: 1
                        },
                        1000: {
                            items: 1
                        }
                    }
                });
            });
        });
    }
})();
