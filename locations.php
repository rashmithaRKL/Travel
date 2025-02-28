<?php
require_once 'config/config.php';
$pageTitle = 'Locations';

// Location categories
$categories = [
    'heritage' => [
        [
            'name' => 'Sigiriya Rock Fortress',
            'description' => 'Ancient palace complex with stunning frescoes and lion-shaped gateway. UNESCO World Heritage site.',
            'image' => 'https://images.unsplash.com/photo-1588258147249-acde95d24992',
            'price' => 30,
            'duration' => '1 Day',
            'rating' => 4.8,
            'reviews' => 245
        ],
        [
            'name' => 'Anuradhapura Ancient City',
            'description' => 'Sacred city featuring well-preserved ruins of ancient Sri Lankan civilization.',
            'image' => 'https://images.unsplash.com/photo-1625736300986-c9d7677f8373',
            'price' => 25,
            'duration' => '1 Day',
            'rating' => 4.7,
            'reviews' => 189
        ]
    ],
    'beach' => [
        [
            'name' => 'Mirissa Beach',
            'description' => 'Paradise for beach lovers and whale watching. Famous for its pristine coastline.',
            'image' => 'https://images.unsplash.com/photo-1546708973-b339540b5162',
            'price' => 20,
            'duration' => '1 Day',
            'rating' => 4.9,
            'reviews' => 312
        ],
        [
            'name' => 'Unawatuna Beach',
            'description' => 'Picturesque beach known for snorkeling and diving activities.',
            'image' => 'https://images.unsplash.com/photo-1590332763476-90472d63f50a',
            'price' => 15,
            'duration' => '1 Day',
            'rating' => 4.6,
            'reviews' => 278
        ]
    ],
    'nature' => [
        [
            'name' => 'Ella Nine Arch Bridge',
            'description' => 'Iconic railway bridge surrounded by lush mountains and tea plantations.',
            'image' => 'https://images.unsplash.com/photo-1586033921061-35b4b8c9fed4',
            'price' => 15,
            'duration' => '1 Day',
            'rating' => 4.7,
            'reviews' => 156
        ],
        [
            'name' => 'Horton Plains National Park',
            'description' => "Home to World's End viewpoint and diverse wildlife.",
            'image' => 'https://images.unsplash.com/photo-1575986767340-5d17ae767ab0',
            'price' => 35,
            'duration' => '1 Day',
            'rating' => 4.8,
            'reviews' => 203
        ]
    ]
];

include 'includes/header.php';
?>

<div class="pt-20">
    <!-- Hero Section -->
    <div class="relative h-[60vh] overflow-hidden">
        <div class="absolute inset-0">
            <img src="https://images.unsplash.com/photo-1588258147249-acde95d24992" 
                 alt="Sri Lankan Destinations" 
                 class="w-full h-full object-cover">
            <div class="absolute inset-0 bg-black bg-opacity-50"></div>
        </div>
        <div class="relative h-full flex items-center justify-center text-center">
            <div class="max-w-4xl px-4">
                <h1 class="text-5xl font-bold text-white mb-6 animate-fade-slide-up">Explore Sri Lanka</h1>
                <p class="text-xl text-white mb-8 animate-fade-slide-up stagger-1">Discover the most beautiful destinations in the pearl of Indian Ocean</p>
                <div class="flex flex-wrap justify-center gap-4 animate-fade-slide-up stagger-2">
                    <a href="#heritage" class="bg-sl-green text-white px-6 py-3 rounded-full hover:bg-green-700 transition-colors">
                        Heritage Sites
                    </a>
                    <a href="#beach" class="bg-sl-green text-white px-6 py-3 rounded-full hover:bg-green-700 transition-colors">
                        Beaches
                    </a>
                    <a href="#nature" class="bg-sl-green text-white px-6 py-3 rounded-full hover:bg-green-700 transition-colors">
                        Nature & Wildlife
                    </a>
                </div>
            </div>
        </div>
    </div>

    <!-- Locations Sections -->
    <?php foreach ($categories as $category => $locations): ?>
    <div id="<?php echo $category; ?>" class="py-20 <?php echo $category !== 'heritage' ? 'bg-gray-50' : ''; ?>">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <h2 class="text-4xl font-bold text-center mb-16 text-gradient animate-float">
                <?php echo ucfirst($category); ?> Destinations
            </h2>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <?php foreach ($locations as $index => $location): ?>
                <div class="gradient-border scroll-reveal <?php echo $index > 0 ? "stagger-{$index}" : ''; ?>">
                    <div class="bg-white rounded-lg overflow-hidden card-hover">
                        <div class="relative h-64">
                            <img src="<?php echo $location['image']; ?>" 
                                 alt="<?php echo $location['name']; ?>" 
                                 class="w-full h-full object-cover transform hover:scale-110 transition-transform duration-500">
                            <div class="absolute top-4 right-4 bg-white px-3 py-1 rounded-full text-sm font-semibold text-sl-green">
                                $<?php echo $location['price']; ?>
                            </div>
                        </div>
                        <div class="p-6">
                            <div class="flex justify-between items-start mb-4">
                                <h3 class="text-xl font-semibold text-sl-green"><?php echo $location['name']; ?></h3>
                                <div class="flex items-center">
                                    <span class="text-yellow-400 mr-1"><i class="fas fa-star"></i></span>
                                    <span class="font-semibold"><?php echo $location['rating']; ?></span>
                                    <span class="text-gray-500 text-sm ml-1">(<?php echo $location['reviews']; ?>)</span>
                                </div>
                            </div>
                            <p class="text-gray-600 mb-4"><?php echo $location['description']; ?></p>
                            <div class="flex items-center justify-between">
                                <div class="flex items-center text-gray-500">
                                    <i class="far fa-clock mr-2"></i>
                                    <span><?php echo $location['duration']; ?></span>
                                </div>
                                <button class="bg-sl-green text-white px-6 py-2 rounded-lg hover:bg-green-700 transition-colors">
                                    Book Now
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
    <?php endforeach; ?>

    <!-- Call to Action -->
    <div class="bg-sl-green text-white py-20">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            <h2 class="text-4xl font-bold mb-8 scroll-reveal">Ready to Start Your Adventure?</h2>
            <p class="text-xl mb-12 scroll-reveal stagger-1">Contact us now to plan your perfect Sri Lankan getaway</p>
            <a href="contact.php" class="inline-block bg-white text-sl-green px-8 py-4 rounded-lg text-lg font-semibold hover:bg-gray-100 transition-colors scroll-reveal stagger-2">
                Get in Touch
            </a>
        </div>
    </div>
</div>

<?php include 'includes/footer.php'; ?>
