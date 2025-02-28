<?php
require_once 'config/config.php';
$pageTitle = 'Pricing';

// Pricing packages data
$packages = [
    [
        'name' => 'Cultural Explorer',
        'price' => 299,
        'duration' => '3 Days',
        'category' => 'Heritage',
        'features' => [
            'Visit to Sigiriya Rock Fortress',
            'Temple of the Sacred Tooth Relic Tour',
            'Traditional Dance Performance',
            'Local Cuisine Experience',
            'Professional Guide',
            'Hotel Accommodation',
            'Transportation'
        ],
        'popular' => false
    ],
    [
        'name' => 'Beach Paradise',
        'price' => 399,
        'duration' => '5 Days',
        'category' => 'Beach',
        'features' => [
            'Stay at Premium Beach Resort',
            'Whale Watching Experience',
            'Snorkeling Session',
            'Sunset Cruise',
            'Beach BBQ Dinner',
            'Water Sports Activities',
            'Airport Transfers',
            'All Meals Included'
        ],
        'popular' => true
    ],
    [
        'name' => 'Nature Adventure',
        'price' => 349,
        'duration' => '4 Days',
        'category' => 'Nature',
        'features' => [
            'Horton Plains Trek',
            'Tea Plantation Visit',
            'Train Journey through Hills',
            'Wildlife Safari',
            'Camping Experience',
            'Professional Guide',
            'All Equipment',
            'Meals Included'
        ],
        'popular' => false
    ]
];

include 'includes/header.php';
?>

<div class="pt-20">
    <!-- Hero Section -->
    <div class="relative h-[40vh] overflow-hidden">
        <div class="absolute inset-0">
            <img src="https://images.unsplash.com/photo-1575986767340-5d17ae767ab0" 
                 alt="Pricing" 
                 class="w-full h-full object-cover">
            <div class="absolute inset-0 bg-black bg-opacity-50"></div>
        </div>
        <div class="relative h-full flex items-center justify-center text-center">
            <div class="max-w-4xl px-4">
                <h1 class="text-5xl font-bold text-white mb-6 animate-fade-slide-up">Tour Packages</h1>
                <p class="text-xl text-white animate-fade-slide-up stagger-1">Choose the perfect package for your Sri Lankan adventure</p>
            </div>
        </div>
    </div>

    <!-- Pricing Section -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-20">
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <?php foreach ($packages as $index => $package): ?>
            <div class="scroll-reveal <?php echo $index > 0 ? "stagger-{$index}" : ''; ?>">
                <div class="relative">
                    <?php if ($package['popular']): ?>
                    <div class="absolute -top-4 left-1/2 transform -translate-x-1/2">
                        <span class="bg-yellow-400 text-gray-900 text-sm font-semibold px-4 py-1 rounded-full">
                            Most Popular
                        </span>
                    </div>
                    <?php endif; ?>
                    <div class="gradient-border h-full">
                        <div class="bg-white rounded-lg p-8 card-hover h-full flex flex-col">
                            <div class="text-center mb-8">
                                <h3 class="text-2xl font-bold text-sl-green mb-2"><?php echo $package['name']; ?></h3>
                                <div class="text-gray-500 mb-4"><?php echo $package['category']; ?> Package</div>
                                <div class="text-4xl font-bold text-gray-900">
                                    $<?php echo $package['price']; ?>
                                    <span class="text-base font-normal text-gray-500">/ person</span>
                                </div>
                                <div class="text-sm text-gray-500 mt-2"><?php echo $package['duration']; ?></div>
                            </div>
                            <div class="space-y-4 mb-8 flex-grow">
                                <?php foreach ($package['features'] as $feature): ?>
                                <div class="flex items-center">
                                    <i class="fas fa-check text-green-500 mr-3"></i>
                                    <span class="text-gray-600"><?php echo $feature; ?></span>
                                </div>
                                <?php endforeach; ?>
                            </div>
                            <button class="w-full bg-sl-green text-white py-3 rounded-lg hover:bg-green-700 transition-colors">
                                Book Now
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>

    <!-- Custom Package Section -->
    <div class="bg-gray-50 py-20">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-16">
                <h2 class="text-4xl font-bold mb-6 text-gradient animate-float">Need a Custom Package?</h2>
                <p class="text-xl text-gray-600">We can create a personalized itinerary just for you</p>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-12 items-center">
                <div class="scroll-reveal">
                    <img src="https://images.unsplash.com/photo-1590332763476-90472d63f50a" 
                         alt="Custom Tour" 
                         class="rounded-lg shadow-lg">
                </div>
                <div class="scroll-reveal stagger-1">
                    <div class="space-y-6">
                        <div class="flex items-start space-x-4">
                            <div class="flex-shrink-0">
                                <div class="w-12 h-12 bg-sl-green rounded-lg flex items-center justify-center">
                                    <i class="fas fa-calendar-alt text-white text-xl"></i>
                                </div>
                            </div>
                            <div>
                                <h3 class="text-xl font-semibold mb-2">Flexible Duration</h3>
                                <p class="text-gray-600">Choose your preferred length of stay</p>
                            </div>
                        </div>
                        <div class="flex items-start space-x-4">
                            <div class="flex-shrink-0">
                                <div class="w-12 h-12 bg-sl-green rounded-lg flex items-center justify-center">
                                    <i class="fas fa-map-marked-alt text-white text-xl"></i>
                                </div>
                            </div>
                            <div>
                                <h3 class="text-xl font-semibold mb-2">Pick Your Destinations</h3>
                                <p class="text-gray-600">Select the places you want to visit</p>
                            </div>
                        </div>
                        <div class="flex items-start space-x-4">
                            <div class="flex-shrink-0">
                                <div class="w-12 h-12 bg-sl-green rounded-lg flex items-center justify-center">
                                    <i class="fas fa-hotel text-white text-xl"></i>
                                </div>
                            </div>
                            <div>
                                <h3 class="text-xl font-semibold mb-2">Choose Your Comfort</h3>
                                <p class="text-gray-600">Select accommodation that suits your style</p>
                            </div>
                        </div>
                        <a href="contact.php" class="inline-block bg-sl-green text-white px-8 py-3 rounded-lg hover:bg-green-700 transition-colors mt-6">
                            Request Custom Package
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- FAQ Section -->
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-20">
        <h2 class="text-4xl font-bold text-center mb-12 text-gradient animate-float">Frequently Asked Questions</h2>
        <div class="space-y-6">
            <?php
            $faqs = [
                [
                    'question' => 'What is included in the package price?',
                    'answer' => 'Our package prices typically include accommodation, transportation, guided tours, entrance fees to attractions, and specified meals. International flights are not included.'
                ],
                [
                    'question' => 'Can I customize these packages?',
                    'answer' => 'Yes, all our packages can be customized to meet your specific preferences and requirements. Contact us for a personalized itinerary.'
                ],
                [
                    'question' => 'What is the cancellation policy?',
                    'answer' => 'We offer free cancellation up to 7 days before the tour start date. Cancellations within 7 days may be subject to charges.'
                ],
                [
                    'question' => 'Are the tours guided?',
                    'answer' => 'Yes, all our tours include professional English-speaking guides who are knowledgeable about Sri Lankan culture and history.'
                ]
            ];

            foreach ($faqs as $index => $faq):
            ?>
            <div class="scroll-reveal <?php echo $index > 0 ? "stagger-{$index}" : ''; ?>">
                <div class="bg-white rounded-lg p-6 shadow-sm">
                    <h3 class="text-xl font-semibold mb-3 text-sl-green"><?php echo $faq['question']; ?></h3>
                    <p class="text-gray-600"><?php echo $faq['answer']; ?></p>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>

<?php include 'includes/footer.php'; ?>
