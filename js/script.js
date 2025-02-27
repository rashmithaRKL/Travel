// Initialize GSAP ScrollTrigger
gsap.registerPlugin(ScrollTrigger);

// Three.js Scene Setup with improved error handling and performance
function initThreeJS() {
    // Check for WebGL support
    if (!window.WebGLRenderingContext) {
        console.error('WebGL is not supported in this browser');
        fallbackToStatic();
        return;
    }

    try {
        const canvas = document.getElementById('hero-canvas');
        if (!canvas) return;

        // Test WebGL capability
        const gl = canvas.getContext('webgl') || canvas.getContext('experimental-webgl');
        if (!gl) {
            throw new Error('WebGL is not available.');
        }

        const scene = new THREE.Scene();
        const camera = new THREE.PerspectiveCamera(75, window.innerWidth / window.innerHeight, 0.1, 1000);
        const renderer = new THREE.WebGLRenderer({ 
            canvas, 
            alpha: true, 
            antialias: true,
            powerPreference: "high-performance"
        });
        
        // Optimize renderer
        renderer.setPixelRatio(Math.min(window.devicePixelRatio, 2));
        renderer.setSize(window.innerWidth, window.innerHeight);

        // Create a sphere geometry with optimized parameters
        const geometry = new THREE.SphereGeometry(5, 48, 48); // Reduced segment count for better performance
        const material = new THREE.MeshPhongMaterial({
            color: 0x2E8B57,
            wireframe: true,
            wireframeLinewidth: 0.5,
            transparent: true,
            opacity: 0.8
        });
        const sphere = new THREE.Mesh(geometry, material);
        scene.add(sphere);

        // Optimized particle system
        const starsGeometry = new THREE.BufferGeometry();
        const starsCount = Math.min(2000, window.innerWidth < 768 ? 1000 : 2000); // Reduce particles on mobile
        const positions = new Float32Array(starsCount * 3);

        for (let i = 0; i < starsCount * 3; i += 3) {
            positions[i] = (Math.random() - 0.5) * 100;
            positions[i + 1] = (Math.random() - 0.5) * 100;
            positions[i + 2] = (Math.random() - 0.5) * 100;
        }

        starsGeometry.setAttribute('position', new THREE.BufferAttribute(positions, 3));
        const starsMaterial = new THREE.PointsMaterial({
            color: 0xFFFFFF,
            size: 0.1,
            transparent: true,
            opacity: 0.8,
            sizeAttenuation: true
        });
        const stars = new THREE.Points(starsGeometry, starsMaterial);
        scene.add(stars);

        // Optimized lighting
        const light = new THREE.DirectionalLight(0xffffff, 1);
        light.position.set(5, 5, 5);
        scene.add(light);
        const ambientLight = new THREE.AmbientLight(0xffffff, 0.4);
        scene.add(ambientLight);

        camera.position.z = 10;

        // Mouse interaction with debouncing
        let mouseX = 0;
        let mouseY = 0;
        let targetX = 0;
        let targetY = 0;
        let timeoutId = null;

        document.addEventListener('mousemove', (event) => {
            if (timeoutId) clearTimeout(timeoutId);
            
            timeoutId = setTimeout(() => {
                mouseX = (event.clientX - window.innerWidth / 2) * 0.001;
                mouseY = (event.clientY - window.innerHeight / 2) * 0.001;
            }, 10);
        });

        // Optimized animation loop
        let animationFrameId;
        function animate() {
            animationFrameId = requestAnimationFrame(animate);

            // Smooth rotation following mouse
            targetX += (mouseX - targetX) * 0.05;
            targetY += (mouseY - targetY) * 0.05;

            sphere.rotation.y += 0.003;
            sphere.rotation.x += 0.001;
            sphere.rotation.z += targetX * 0.5;
            
            stars.rotation.y += 0.0005;

            renderer.render(scene, camera);
        }

        // Optimized window resize handler with debouncing
        let resizeTimeoutId;
        function onWindowResize() {
            if (resizeTimeoutId) clearTimeout(resizeTimeoutId);
            
            resizeTimeoutId = setTimeout(() => {
                const width = window.innerWidth;
                const height = window.innerHeight;
                
                camera.aspect = width / height;
                camera.updateProjectionMatrix();
                renderer.setSize(width, height);
                renderer.setPixelRatio(Math.min(window.devicePixelRatio, 2));
            }, 100);
        }

        window.addEventListener('resize', onWindowResize);
        animate();

        // Cleanup function
        return () => {
            if (animationFrameId) {
                cancelAnimationFrame(animationFrameId);
            }
            window.removeEventListener('resize', onWindowResize);
            
            // Dispose of Three.js objects
            geometry.dispose();
            material.dispose();
            starsGeometry.dispose();
            starsMaterial.dispose();
            renderer.dispose();
        };

    } catch (error) {
        console.error('Error initializing Three.js:', error);
        fallbackToStatic();
    }
}

// Fallback function for when WebGL is not available
function fallbackToStatic() {
    const canvas = document.getElementById('hero-canvas');
    if (canvas) {
        canvas.style.display = 'none';
        
        // Add a static background image instead
        const heroSection = canvas.parentElement;
        if (heroSection) {
            heroSection.style.backgroundImage = 'url("https://source.unsplash.com/1600x900/?srilanka,landscape")';
            heroSection.style.backgroundSize = 'cover';
            heroSection.style.backgroundPosition = 'center';
        }
    }
}

// Initialize Three.js scene when the DOM is loaded
document.addEventListener('DOMContentLoaded', () => {
    const cleanup = initThreeJS();
    initScrollAnimations();
    initMobileMenu();

    // Cleanup on page unload
    window.addEventListener('unload', () => {
        if (cleanup && typeof cleanup === 'function') {
            cleanup();
        }
    });
});

// Scroll Animations with optimized performance
function initScrollAnimations() {
    // Batch similar animations together
    const scrollRevealElements = document.querySelectorAll('.scroll-reveal');
    scrollRevealElements.forEach((element, index) => {
        gsap.from(element, {
            scrollTrigger: {
                trigger: element,
                start: "top 80%",
                end: "bottom 20%",
                toggleActions: "play none none reverse"
            },
            y: 50,
            opacity: 0,
            duration: 1,
            delay: index * 0.2,
            ease: "power3.out"
        });
    });

    // Optimize parallax effect
    const parallaxBgs = document.querySelectorAll('.parallax-bg');
    parallaxBgs.forEach(bg => {
        gsap.to(bg, {
            scrollTrigger: {
                trigger: bg,
                start: "top bottom",
                end: "bottom top",
                scrub: true
            },
            y: 100,
            ease: "none"
        });
    });

    // Optimize card hover animations
    const cards = document.querySelectorAll('.card-hover');
    cards.forEach(card => {
        card.addEventListener('mouseenter', () => {
            gsap.to(card, {
                y: -10,
                scale: 1.02,
                duration: 0.3,
                ease: "power2.out"
            });
        });

        card.addEventListener('mouseleave', () => {
            gsap.to(card, {
                y: 0,
                scale: 1,
                duration: 0.3,
                ease: "power2.out"
            });
        });
    });
}

// Mobile Navigation Toggle with improved animation
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

// Smooth scroll to sections with improved performance
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
