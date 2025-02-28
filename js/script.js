// Initialize GSAP ScrollTrigger and other plugins
gsap.registerPlugin(ScrollTrigger, ScrollToPlugin);

// Hero Image Slider
function initHeroSlider() {
    const slides = document.querySelectorAll('.hero-slide');
    const slideNav = document.querySelector('.slide-nav');
    const prevBtn = document.querySelector('.slide-arrow.prev');
    const nextBtn = document.querySelector('.slide-arrow.next');
    let currentSlide = 0;
    let slideInterval;
    const slideDelay = 5000;

    // Create navigation dots
    slides.forEach((_, index) => {
        const dot = document.createElement('div');
        dot.classList.add('slide-dot');
        if (index === 0) dot.classList.add('active');
        dot.addEventListener('click', () => goToSlide(index));
        slideNav.appendChild(dot);
    });

    function updateDots() {
        const dots = document.querySelectorAll('.slide-dot');
        dots.forEach((dot, index) => {
            dot.classList.toggle('active', index === currentSlide);
        });
    }

    function showSlide(index) {
        slides.forEach(slide => {
            slide.classList.remove('active');
            gsap.to(slide, {
                opacity: 0,
                duration: 0.5,
                ease: "power2.inOut"
            });
        });

        slides[index].classList.add('active');
        gsap.to(slides[index], {
            opacity: 1,
            duration: 0.5,
            ease: "power2.inOut"
        });

        updateDots();
    }

    function nextSlide() {
        currentSlide = (currentSlide + 1) % slides.length;
        showSlide(currentSlide);
    }

    function prevSlide() {
        currentSlide = (currentSlide - 1 + slides.length) % slides.length;
        showSlide(currentSlide);
    }

    function goToSlide(index) {
        currentSlide = index;
        showSlide(currentSlide);
        resetInterval();
    }

    function resetInterval() {
        clearInterval(slideInterval);
        slideInterval = setInterval(nextSlide, slideDelay);
    }

    // Event listeners
    prevBtn?.addEventListener('click', () => {
        prevSlide();
        resetInterval();
    });

    nextBtn?.addEventListener('click', () => {
        nextSlide();
        resetInterval();
    });

    // Start the slideshow
    slideInterval = setInterval(nextSlide, slideDelay);

    // Pause slideshow on hover
    const sliderContainer = document.querySelector('.hero-slider');
    sliderContainer?.addEventListener('mouseenter', () => clearInterval(slideInterval));
    sliderContainer?.addEventListener('mouseleave', () => {
        slideInterval = setInterval(nextSlide, slideDelay);
    });
}

// Initialize counter animation
function initCounters() {
    const counters = document.querySelectorAll('.counter');
    
    counters.forEach(counter => {
        const target = parseInt(counter.getAttribute('data-target'));
        
        gsap.to(counter, {
            scrollTrigger: {
                trigger: counter,
                start: "top 80%",
                once: true
            },
            innerHTML: target,
            duration: 2,
            snap: { innerHTML: 1 },
            ease: "power2.out"
        });
    });
}

// Enhanced Scroll Animations
function initScrollAnimations() {
    // Scroll reveal animations with 3D effects
    const scrollRevealElements = document.querySelectorAll('.scroll-reveal');
    scrollRevealElements.forEach((element, index) => {
        gsap.from(element, {
            scrollTrigger: {
                trigger: element,
                start: "top 85%",
                end: "bottom 15%",
                toggleActions: "play none none reverse"
            },
            y: 100,
            opacity: 0,
            rotation: 5,
            scale: 0.9,
            duration: 1.2,
            delay: index * 0.15,
            ease: "power4.out"
        });
    });

    // Floating animation for headings
    gsap.to('.animate-float', {
        y: -20,
        rotation: 1,
        duration: 2,
        ease: "power1.inOut",
        yoyo: true,
        repeat: -1
    });

    // Enhanced parallax effect with scale
    gsap.utils.toArray('.parallax-bg').forEach(bg => {
        gsap.to(bg, {
            scrollTrigger: {
                trigger: bg,
                start: "top bottom",
                end: "bottom top",
                scrub: 1
            },
            y: 200,
            scale: 1.1,
            ease: "none"
        });
    });

    // Interactive hover animations
    const cards = document.querySelectorAll('.card-hover');
    const glassElements = document.querySelectorAll('.glass-effect');

    // Card hover animations with 3D effect
    cards.forEach(card => {
        card.addEventListener('mouseenter', () => {
            gsap.to(card, {
                y: -15,
                scale: 1.02,
                rotationX: 5,
                duration: 0.4,
                ease: "power2.out",
                boxShadow: "0 20px 40px rgba(46, 139, 87, 0.2)"
            });
        });

        card.addEventListener('mouseleave', () => {
            gsap.to(card, {
                y: 0,
                scale: 1,
                rotationX: 0,
                duration: 0.4,
                ease: "power2.in",
                boxShadow: "none"
            });
        });
    });

    // Glass effect hover animations
    glassElements.forEach(element => {
        element.addEventListener('mouseenter', () => {
            gsap.to(element, {
                scale: 1.05,
                duration: 0.3,
                ease: "power2.out",
                backgroundColor: "rgba(255, 255, 255, 0.15)"
            });
        });

        element.addEventListener('mouseleave', () => {
            gsap.to(element, {
                scale: 1,
                duration: 0.3,
                ease: "power2.in",
                backgroundColor: "rgba(255, 255, 255, 0.1)"
            });
        });
    });
}

// Mobile Navigation with enhanced animations
function initMobileMenu() {
    const mobileMenuButton = document.getElementById('mobile-menu-button');
    const mobileMenu = document.getElementById('mobile-menu');

    if (mobileMenuButton && mobileMenu) {
        let isAnimating = false;

        mobileMenuButton.addEventListener('click', () => {
            if (isAnimating) return;
            isAnimating = true;

            const isHidden = mobileMenu.classList.contains('hidden');
            
            if (isHidden) {
                mobileMenu.classList.remove('hidden');
                gsap.from(mobileMenu, {
                    height: 0,
                    opacity: 0,
                    duration: 0.3,
                    ease: "power2.out",
                    onComplete: () => {
                        isAnimating = false;
                    }
                });
            } else {
                gsap.to(mobileMenu, {
                    height: 0,
                    opacity: 0,
                    duration: 0.3,
                    ease: "power2.in",
                    onComplete: () => {
                        mobileMenu.classList.add('hidden');
                        gsap.set(mobileMenu, { height: "auto", opacity: 1 });
                        isAnimating = false;
                    }
                });
            }
        });
    }
}

// Initialize everything when DOM is loaded
document.addEventListener('DOMContentLoaded', () => {
    initHeroSlider();
    initScrollAnimations();
    initMobileMenu();
    initCounters();
});

// Smooth scroll to sections
document.querySelectorAll('a[href^="#"]').forEach(anchor => {
    anchor.addEventListener('click', function (e) {
        e.preventDefault();
        const target = document.querySelector(this.getAttribute('href'));
        if (target) {
            gsap.to(window, {
                duration: 1,
                scrollTo: {
                    y: target,
                    offsetY: 70
                },
                ease: "power3.inOut"
            });
        }
    });
});
