/**
 * INFINITE HORIZONTAL SCROLLING CAROUSEL
 * Vida.id style implementation with KeenSlider
 * Continuous scrolling from right to left
 */

(function() {
    'use strict';

    // Wait for DOM to be ready
    function waitForKeenSlider(callback, maxAttempts = 50) {
        let attempts = 0;

        function check() {
            attempts++;
            if (typeof KeenSlider !== 'undefined') {
                callback();
            } else if (attempts < maxAttempts) {
                setTimeout(check, 100);
            } else {
                console.warn('KeenSlider failed to load, using fallback');
                initFallback();
            }
        }

        check();
    }

    // Initialize infinite horizontal scrolling carousel
    function initInfiniteCarousel() {
        const carouselElement = document.querySelector('.trusted-partners-carousel .keen-slider');

        if (!carouselElement) {
            console.warn('Carousel element not found');
            return;
        }

        // Remove loading state
        carouselElement.parentElement.classList.remove('loading');

        // Configuration for infinite scrolling
        function autoplay(slider) {
            let timeout;
            let mouseOver = false;

            function clearNextTimeout() {
                clearTimeout(timeout);
            }

            function nextTimeout() {
                clearTimeout(timeout);
                if (mouseOver) return;
                timeout = setTimeout(() => {
                    slider.next();
                }, 3120); // 3.12 seconds like Vida.id
            }

            slider.on('created', () => {
                const sliderContainer = slider.container;

                sliderContainer.addEventListener('mouseover', () => {
                    mouseOver = true;
                    clearNextTimeout();
                });

                sliderContainer.addEventListener('mouseout', () => {
                    mouseOver = false;
                    nextTimeout();
                });

                sliderContainer.addEventListener('focusin', () => {
                    mouseOver = true;
                    clearNextTimeout();
                });

                sliderContainer.addEventListener('focusout', () => {
                    mouseOver = false;
                    nextTimeout();
                });

                nextTimeout();
            });

            slider.on('dragStarted', clearNextTimeout);
            slider.on('animationEnded', nextTimeout);
            slider.on('updated', nextTimeout);
        }

        // Initialize KeenSlider
        try {
            const slider = new KeenSlider(
                carouselElement,
                {
                    loop: true,
                    mode: 'free',
                    slides: {
                        perView: 'auto',
                        spacing: 20
                    },
                    renderMode: 'performance',
                    drag: true,
                    rubberband: false,
                    created: autoplay,
                    breakpoints: {
                        '(min-width: 1200px)': {
                            slides: {
                                perView: 5,
                                spacing: 20
                            }
                        },
                        '(min-width: 992px)': {
                            slides: {
                                perView: 4,
                                spacing: 20
                            }
                        },
                        '(min-width: 768px)': {
                            slides: {
                                perView: 3,
                                spacing: 15
                            }
                        },
                        '(min-width: 576px)': {
                            slides: {
                                perView: 2,
                                spacing: 15
                            }
                        },
                        '(max-width: 575px)': {
                            slides: {
                                perView: 'auto',
                                spacing: 12
                            }
                        }
                    }
                }
            );

            // Add accessibility improvements
            setupAccessibility(slider);

            // Add touch enhancements for mobile
            setupTouchSupport(slider);

            // Add keyboard navigation
            setupKeyboardNavigation(slider);

            console.log('KeenSlider initialized successfully');

        } catch (error) {
            console.error('KeenSlider initialization failed:', error);
            initFallback();
        }
    }

    // Fallback for when KeenSlider fails
    function initFallback() {
        const carousel = document.querySelector('.trusted-partners-carousel');
        if (carousel) {
            carousel.classList.add('no-keen-slider');
            console.log('Using fallback horizontal scrolling');
        }
    }

    // Setup accessibility features
    function setupAccessibility(slider) {
        const sliderContainer = slider.container;

        // Add ARIA labels
        sliderContainer.setAttribute('role', 'region');
        sliderContainer.setAttribute('aria-roledescription', 'carousel');
        sliderContainer.setAttribute('aria-label', 'Mitra terpercaya, geser untuk navigasi');

        // Update slide attributes
        const slides = sliderContainer.querySelectorAll('.keen-slider__slide');
        slides.forEach((slide, index) => {
            slide.setAttribute('role', 'group');
            slide.setAttribute('aria-roledescription', 'slide');
            slide.setAttribute('aria-label', `Partner ${index + 1} dari ${slides.length}`);

            const link = slide.querySelector('a');
            if (link && !link.getAttribute('aria-label')) {
                const img = slide.querySelector('img');
                const alt = img ? img.getAttribute('alt') : 'Partner';
                link.setAttribute('aria-label', `Kunjungi website ${alt} (buka di tab baru)`);
            }
        });
    }

    // Setup touch support for mobile
    function setupTouchSupport(slider) {
        const sliderContainer = slider.container;
        let touchStartX = 0;
        let touchEndX = 0;

        sliderContainer.addEventListener('touchstart', (e) => {
            touchStartX = e.changedTouches[0].screenX;
        }, { passive: true });

        sliderContainer.addEventListener('touchend', (e) => {
            touchEndX = e.changedTouches[0].screenX;
            handleSwipe();
        }, { passive: true });

        function handleSwipe() {
            const swipeThreshold = 50;
            const diff = touchStartX - touchEndX;

            if (Math.abs(diff) > swipeThreshold) {
                if (diff > 0) {
                    // Swipe left - go to next
                    slider.next();
                } else {
                    // Swipe right - go to previous
                    slider.prev();
                }
            }
        }
    }

    // Setup keyboard navigation
    function setupKeyboardNavigation(slider) {
        const sliderContainer = slider.container;

        sliderContainer.addEventListener('keydown', (e) => {
            switch(e.key) {
                case 'ArrowLeft':
                    e.preventDefault();
                    slider.prev();
                    break;
                case 'ArrowRight':
                    e.preventDefault();
                    slider.next();
                    break;
                case ' ':
                    e.preventDefault();
                    // Toggle pause/resume
                    const isPaused = sliderContainer.hasAttribute('data-paused');
                    if (isPaused) {
                        sliderContainer.removeAttribute('data-paused');
                        slider.update();
                    } else {
                        sliderContainer.setAttribute('data-paused', 'true');
                    }
                    break;
            }
        });

        // Make carousel focusable
        sliderContainer.setAttribute('tabindex', '0');
    }

    // Performance optimizations
    function optimizePerformance() {
        const images = document.querySelectorAll('.partner-item img');

        // Add loading="lazy" for better performance
        images.forEach(img => {
            if (!img.hasAttribute('loading')) {
                img.setAttribute('loading', 'lazy');
            }
        });

        // Add error handling for images
        images.forEach(img => {
            img.addEventListener('error', function() {
                this.src = 'data:image/svg+xml;base64,PHN2ZyB3aWR0aD0iMTAwIiBoZWlnaHQ9IjEwMCIgdmlld0JveD0iMCAwIDEwMCAxMDAiIGZpbGw9Im5vbmUiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+CjxyZWN0IHdpZHRoPSIxMDAiIGhlaWdodD0iMTAwIiBmaWxsPSIjRjlGOUY5Ii8+CjxwYXRoIGQ9Ik0zNSA1MEg2NUw1MCA2NUwzNSA1MFoiIGZpbGw9IiNEMUQ1REIiLz4KPGNpcmNsZSBjeD0iNTAiIGN5PSI0MCIgcj0iOCIgZmlsbD0iI0QxRDVEQiIvPgo8L3N2Zz4K';
                this.classList.add('error-placeholder');
            });
        });
    }

    // Main initialization function
    function init() {
        // Add loading state initially
        const carouselElement = document.querySelector('.trusted-partners-carousel');
        if (carouselElement) {
            carouselElement.classList.add('loading');
        }

        // Wait for KeenSlider to load
        waitForKeenSlider(() => {
            initInfiniteCarousel();
            optimizePerformance();
        });

        // Initialize fallback after timeout if KeenSlider doesn't load
        setTimeout(() => {
            const carousel = document.querySelector('.trusted-partners-carousel');
            if (carousel && carousel.classList.contains('loading')) {
                initFallback();
                optimizePerformance();
            }
        }, 5000);
    }

    // Initialize when DOM is ready
    if (document.readyState === 'loading') {
        document.addEventListener('DOMContentLoaded', init);
    } else {
        init();
    }

    // Handle dynamic content changes
    function observeContentChanges() {
        if (!window.MutationObserver) return;

        const observer = new MutationObserver((mutations) => {
            mutations.forEach((mutation) => {
                if (mutation.addedNodes.length) {
                    const hasCarousel = Array.from(mutation.addedNodes).some(node => {
                        return node.nodeType === 1 && (
                            node.classList.contains('trusted-partners-carousel') ||
                            node.querySelector && node.querySelector('.trusted-partners-carousel')
                        );
                    });

                    if (hasCarousel) {
                        setTimeout(init, 100);
                    }
                }
            });
        });

        observer.observe(document.body, {
            childList: true,
            subtree: true
        });
    }

    observeContentChanges();

    // Add global function for manual reinitialization
    window.reinitTrustedPartners = init;

})();