// Three.js Scene Setup
function initThreeJS() {
    try {
        const canvas = document.getElementById('hero-canvas');
        if (!canvas) return;

        const scene = new THREE.Scene();
        const camera = new THREE.PerspectiveCamera(75, window.innerWidth / window.innerHeight, 0.1, 1000);
        const renderer = new THREE.WebGLRenderer({ canvas, alpha: true });
        renderer.setSize(window.innerWidth, window.innerHeight);

        // Create a sphere geometry (representing the globe)
        const geometry = new THREE.SphereGeometry(5, 32, 32);
        const material = new THREE.MeshPhongMaterial({
            color: 0x2E8B57,
            wireframe: true,
        });
        const sphere = new THREE.Mesh(geometry, material);
        scene.add(sphere);

        // Add lights
        const light = new THREE.DirectionalLight(0xffffff, 1);
        light.position.set(5, 5, 5);
        scene.add(light);
        const ambientLight = new THREE.AmbientLight(0xffffff, 0.4);
        scene.add(ambientLight);

        camera.position.z = 10;

        // Animation
        function animate() {
            requestAnimationFrame(animate);
            sphere.rotation.x += 0.001;
            sphere.rotation.y += 0.002;
            renderer.render(scene, camera);
        }

        // Handle window resize
        window.addEventListener('resize', () => {
            const width = window.innerWidth;
            const height = window.innerHeight;
            camera.aspect = width / height;
            camera.updateProjectionMatrix();
            renderer.setSize(width, height);
        });

        animate();
    } catch (error) {
        console.error('Error initializing Three.js:', error);
        // Handle the error gracefully - the canvas will remain hidden
    }
}

// Initialize Three.js scene when the DOM is loaded
document.addEventListener('DOMContentLoaded', initThreeJS);

// Mobile Navigation Toggle
document.addEventListener('DOMContentLoaded', () => {
    const mobileMenuButton = document.querySelector('[data-mobile-menu]');
    const mobileMenu = document.querySelector('[data-mobile-nav]');

    if (mobileMenuButton && mobileMenu) {
        mobileMenuButton.addEventListener('click', () => {
            mobileMenu.classList.toggle('hidden');
        });
    }
});
