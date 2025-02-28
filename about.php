<?php
require_once 'config/config.php';
$pageTitle = 'About Us';
include 'includes/header.php';
?>

<div class="pt-20">
    <!-- Hero Section -->
    <div class="relative h-[60vh] overflow-hidden">
        <div class="absolute inset-0">
            <img src="https://images.unsplash.com/photo-1589182337358-2cb63099350c" 
                 alt="Sri Lankan Culture" 
                 class="w-full h-full object-cover">
            <div class="absolute inset-0 bg-black bg-opacity-50"></div>
        </div>
        <div class="relative h-full flex items-center justify-center text-center">
            <div class="max-w-4xl px-4">
                <h1 class="text-5xl font-bold text-white mb-6 animate-fade-slide-up">About Sri Lanka Travel</h1>
                <p class="text-xl text-white mb-8 animate-fade-slide-up stagger-1">Discover the beauty, culture, and warmth of Sri Lanka with our expert guides</p>
            </div>
        </div>
    </div>

    <!-- Our Story Section -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-20">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-12 items-center">
            <div class="scroll-reveal">
                <h2 class="text-3xl font-bold mb-6 text-gradient">Our Story</h2>
                <p class="text-gray-600 mb-6">Founded in 2010, Sri Lanka Travel has been at the forefront of providing authentic travel experiences in Sri Lanka. Our passion for showcasing the island's rich cultural heritage, stunning landscapes, and warm hospitality drives everything we do.</p>
                <p class="text-gray-600 mb-6">With over a decade of experience, we've helped thousands of travelers create unforgettable memories in this tropical paradise.</p>
                <div class="grid grid-cols-3 gap-4 text-center">
                    <div class="glass-effect p-4 rounded-lg">
                        <div class="text-3xl font-bold text-sl-green counter" data-target="12">0</div>
                        <p class="text-sm">Years Experience</p>
                    </div>
                    <div class="glass-effect p-4 rounded-lg">
                        <div class="text-3xl font-bold text-sl-green counter" data-target="10000">0</div>
                        <p class="text-sm">Happy Clients</p>
                    </div>
                    <div class="glass-effect p-4 rounded-lg">
                        <div class="text-3xl font-bold text-sl-green counter" data-target="150">0</div>
                        <p class="text-sm">Tour Guides</p>
                    </div>
                </div>
            </div>
            <div class="scroll-reveal stagger-1">
                <div class="relative h-96 rounded-lg overflow-hidden">
                    <img src="https://images.unsplash.com/photo-1625736300986-c9d7677f8373" 
                         alt="Sri Lankan Temple" 
                         class="w-full h-full object-cover transform hover:scale-105 transition-transform duration-500">
                </div>
            </div>
        </div>
    </div>

    <!-- Our Team Section -->
    <div class="bg-gray-50 py-20">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <h2 class="text-3xl font-bold text-center mb-12 text-gradient animate-float">Meet Our Team</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <?php
                $team_members = [
                    [
                        'name' => 'Sarah Johnson',
                        'role' => 'Founder & CEO',
                        'image' => 'https://images.unsplash.com/photo-1573496359142-b8d87734a5a2',
                        'description' => 'With 15 years of experience in tourism, Sarah leads our vision for authentic travel experiences.'
                    ],
                    [
                        'name' => 'Raj Patel',
                        'role' => 'Head of Operations',
                        'image' => 'https://images.unsplash.com/photo-1556157382-97eda2f9e2bf',
                        'description' => 'Raj ensures smooth operation of all our tours and exceptional customer service.'
                    ],
                    [
                        'name' => 'Lisa Chen',
                        'role' => 'Lead Tour Guide',
                        'image' => 'https://images.unsplash.com/photo-1580489944761-15a19d654956',
                        'description' => 'An expert in Sri Lankan history and culture, Lisa creates unforgettable tour experiences.'
                    ]
                ];

                foreach ($team_members as $index => $member): ?>
                    <div class="gradient-border scroll-reveal <?php echo $index > 0 ? "stagger-{$index}" : ''; ?>">
                        <div class="bg-white rounded-lg p-6 card-hover">
                            <div class="h-48 mb-4 overflow-hidden rounded-lg">
                                <img src="<?php echo $member['image']; ?>" 
                                     alt="<?php echo $member['name']; ?>" 
                                     class="w-full h-full object-cover transform hover:scale-110 transition-transform duration-300">
                            </div>
                            <h3 class="text-xl font-semibold mb-2 text-sl-green"><?php echo $member['name']; ?></h3>
                            <p class="text-gray-500 mb-2"><?php echo $member['role']; ?></p>
                            <p class="text-gray-600"><?php echo $member['description']; ?></p>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>

    <!-- Values Section -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-20">
        <h2 class="text-3xl font-bold text-center mb-12 text-gradient animate-float">Our Values</h2>
        <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
            <?php
            $values = [
                [
                    'icon' => 'fas fa-heart',
                    'title' => 'Passion',
                    'description' => 'We are passionate about sharing the beauty of Sri Lanka with the world.'
                ],
                [
                    'icon' => 'fas fa-handshake',
                    'title' => 'Trust',
                    'description' => 'Building trust through transparent and reliable service.'
                ],
                [
                    'icon' => 'fas fa-leaf',
                    'title' => 'Sustainability',
                    'description' => 'Committed to eco-friendly and sustainable tourism practices.'
                ],
                [
                    'icon' => 'fas fa-users',
                    'title' => 'Community',
                    'description' => 'Supporting local communities through responsible tourism.'
                ]
            ];

            foreach ($values as $index => $value): ?>
                <div class="text-center scroll-reveal <?php echo $index > 0 ? "stagger-{$index}" : ''; ?>">
                    <div class="glass-effect p-6 rounded-lg">
                        <i class="<?php echo $value['icon']; ?> text-4xl text-sl-green mb-4"></i>
                        <h3 class="text-xl font-semibold mb-2"><?php echo $value['title']; ?></h3>
                        <p class="text-gray-600"><?php echo $value['description']; ?></p>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>

<?php include 'includes/footer.php'; ?>
