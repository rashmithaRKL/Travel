<?php
require_once 'config/config.php';
$pageTitle = 'Home';
$destinations = getDestinations();
$testimonials = getTestimonials();
include 'includes/header.php';
?>

<!-- Hero Section with Enhanced Image Slider -->
<div class="relative h-screen">
    <div class="hero-slider">
        <div class="hero-slide active" style="background-image: url('https://images.unsplash.com/photo-1588258147249-acde95d24992')">
            <div class="slide-caption">
                <h3 class="text-2xl font-bold mb-2">Sigiriya Rock Fortress</h3>
                <p>Ancient palace and fortress complex, a UNESCO World Heritage site</p>
            </div>
        </div>
        <div class="hero-slide" style="background-image: url('https://images.unsplash.com/photo-1546708973-b339540b5162')">
            <div class="slide-caption">
                <h3 class="text-2xl font-bold mb-2">Mirissa Beach</h3>
                <p>Paradise for beach lovers and whale watching enthusiasts</p>
            </div>
        </div>
        <div class="hero-slide" style="background-image: url('https://images.unsplash.com/photo-1575986767340-5d17ae767ab0')">
            <div class="slide-caption">
                <h3 class="text-2xl font-bold mb-2">Tea Plantations</h3>
                <p>Rolling hills of emerald tea estates in the central highlands</p>
            </div>
        </div>
    </div>
    <div class="slide-arrows">
        <div class="slide-arrow prev">
            <svg viewBox="0 0 24 24"><path d="M15.41 7.41L14 6l-6 6 6 6 1.41-1.41L10.83 12z"/></svg>
        </div>
        <div class="slide-arrow next">
            <svg viewBox="0 0 24 24"><path d="M10 6L8.59 7.41 13.17 12l-4.58 4.59L10 18l6-6z"/></svg>
        </div>
    </div>
    <div class="slide-nav"></div>
    <div class="hero-overlay"></div>
    <div class="absolute inset-0 flex items-center justify-center">
        <div class="text-center">
            <h1 class="text-6xl md:text-7xl font-bold text-white mb-6 text-shadow animate-fade-slide-up">Discover Sri Lanka</h1>
            <p class="text-2xl md:text-3xl text-white mb-8 animate-fade-slide-up stagger-1">Experience the Pearl of the Indian Ocean</p>
            <div class="space-y-6">
                <div class="flex flex-wrap justify-center gap-8 mb-8">
                    <div class="glass-effect p-6 rounded-lg text-white text-center animate-fade-slide-up stagger-2">
                        <i class="fas fa-mountain text-3xl mb-2"></i>
                        <h3 class="text-xl font-semibold">8</h3>
                        <p>UNESCO Sites</p>
                    </div>
                    <div class="glass-effect p-6 rounded-lg text-white text-center animate-fade-slide-up stagger-3">
                        <i class="fas fa-umbrella-beach text-3xl mb-2"></i>
                        <h3 class="text-xl font-semibold">1,340</h3>
                        <p>km of Coastline</p>
                    </div>
                    <div class="glass-effect p-6 rounded-lg text-white text-center animate-fade-slide-up stagger-4">
                        <i class="fas fa-leaf text-3xl mb-2"></i>
                        <h3 class="text-xl font-semibold">26</h3>
                        <p>National Parks</p>
                    </div>
                </div>
                <a href="locations.php" class="button-glow bg-sl-green text-white px-8 py-4 rounded-lg text-xl font-semibold hover:bg-green-700 transition duration-300 animate-fade-slide-up stagger-5 inline-block">
                    Start Your Journey
                </a>
            </div>
        </div>
    </div>
</div>

<!-- Featured Destinations -->
<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-20 overflow-hidden">
    <h2 class="text-4xl font-bold text-center mb-16 text-gradient animate-float">Popular Destinations</h2>
    <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
        <?php foreach ($destinations as $index => $destination): ?>
        <div class="gradient-border scroll-reveal <?php echo $index > 0 ? "stagger-{$index}" : ''; ?>">
            <div class="bg-white rounded-lg p-6 card-hover">
                <div class="h-48 mb-4 overflow-hidden rounded-lg">
                    <img src="<?php echo $destination['image']; ?>" 
                         alt="<?php echo $destination['name']; ?>" 
                         class="w-full h-full object-cover transform hover:scale-110 transition-transform duration-300">
                </div>
                <h3 class="text-xl font-semibold mb-2 text-sl-green"><?php echo $destination['name']; ?></h3>
                <p class="text-gray-600 mb-4"><?php echo $destination['description']; ?></p>
                <div class="flex justify-between items-center">
                    <span class="text-sl-green font-semibold">From $<?php echo $destination['price']; ?></span>
                    <button class="button-glow bg-sl-green text-white px-4 py-2 rounded-lg">Book Now</button>
                </div>
            </div>
        </div>
        <?php endforeach; ?>
    </div>
</div>

<!-- Testimonials Section -->
<div class="bg-gray-50 py-20">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <h2 class="text-4xl font-bold text-center mb-16 text-gradient animate-float">What Our Travelers Say</h2>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <?php foreach ($testimonials as $index => $testimonial): ?>
            <div class="glass-effect bg-white p-6 rounded-lg shadow-lg scroll-reveal <?php echo $index > 0 ? "stagger-{$index}" : ''; ?>">
                <div class="flex items-center mb-4">
                    <div class="flex-shrink-0">
                        <div class="w-12 h-12 rounded-full bg-sl-green text-white flex items-center justify-center text-xl font-bold">
                            <?php echo substr($testimonial['name'], 0, 1); ?>
                        </div>
                    </div>
                    <div class="ml-4">
                        <h4 class="text-lg font-semibold"><?php echo $testimonial['name']; ?></h4>
                        <p class="text-gray-500"><?php echo $testimonial['country']; ?></p>
                    </div>
                </div>
                <p class="text-gray-600 mb-4"><?php echo $testimonial['comment']; ?></p>
                <div class="flex text-yellow-400">
                    <?php for ($i = 0; $i < $testimonial['rating']; $i++): ?>
                        <i class="fas fa-star"></i>
                    <?php endfor; ?>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>

<!-- Enhanced Parallax Section -->
<div class="parallax-bg h-screen relative" style="background-image: url('https://images.unsplash.com/photo-1575986767340-5d17ae767ab0')">
    <div class="absolute inset-0 bg-black bg-opacity-50 flex items-center justify-center">
        <div class="text-center text-white px-4 space-y-8">
            <h2 class="text-5xl font-bold mb-6 text-shadow scroll-reveal">Experience Paradise</h2>
            <p class="text-2xl mb-8 text-shadow scroll-reveal stagger-1">Your journey to an unforgettable adventure begins here</p>
            <div class="flex flex-wrap justify-center gap-8 mb-12 scroll-reveal stagger-2">
                <div class="glass-effect p-6 rounded-lg">
                    <div class="text-4xl font-bold mb-2 counter" data-target="200">0</div>
                    <p class="text-sm">Destinations</p>
                </div>
                <div class="glass-effect p-6 rounded-lg">
                    <div class="text-4xl font-bold mb-2 counter" data-target="1000">0</div>
                    <p class="text-sm">Happy Travelers</p>
                </div>
                <div class="glass-effect p-6 rounded-lg">
                    <div class="text-4xl font-bold mb-2 counter" data-target="50">0</div>
                    <p class="text-sm">Local Guides</p>
                </div>
            </div>
            <a href="contact.php" class="button-glow bg-sl-green text-white px-8 py-4 rounded-lg text-xl font-semibold hover:bg-green-700 transition duration-300 scroll-reveal stagger-3 inline-block">
                Plan Your Trip
            </a>
        </div>
    </div>
</div>

<?php include 'includes/footer.php'; ?>
