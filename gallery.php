<?php
require_once 'config/config.php';
$pageTitle = 'Gallery';

// Gallery images data
$gallery_images = [
    [
        'url' => 'https://images.unsplash.com/photo-1588258147249-acde95d24992',
        'title' => 'Sigiriya Rock Fortress',
        'category' => 'Heritage'
    ],
    [
        'url' => 'https://images.unsplash.com/photo-1590332763476-90472d63f50a',
        'title' => 'Temple of the Sacred Tooth Relic',
        'category' => 'Culture'
    ],
    [
        'url' => 'https://images.unsplash.com/photo-1546708973-b339540b5162',
        'title' => 'Mirissa Beach',
        'category' => 'Beach'
    ],
    [
        'url' => 'https://images.unsplash.com/photo-1575986767340-5d17ae767ab0',
        'title' => 'Tea Plantations',
        'category' => 'Nature'
    ],
    [
        'url' => 'https://images.unsplash.com/photo-1586033921061-35b4b8c9fed4',
        'title' => 'Nine Arch Bridge',
        'category' => 'Heritage'
    ],
    [
        'url' => 'https://images.unsplash.com/photo-1589182337358-2cb63099350c',
        'title' => 'Wildlife Safari',
        'category' => 'Wildlife'
    ]
];

// Get unique categories
$categories = array_unique(array_column($gallery_images, 'category'));

include 'includes/header.php';
?>

<div class="pt-20">
    <!-- Hero Section -->
    <div class="relative h-[40vh] overflow-hidden">
        <div class="absolute inset-0">
            <img src="https://images.unsplash.com/photo-1575986767340-5d17ae767ab0" 
                 alt="Gallery" 
                 class="w-full h-full object-cover">
            <div class="absolute inset-0 bg-black bg-opacity-50"></div>
        </div>
        <div class="relative h-full flex items-center justify-center text-center">
            <div class="max-w-4xl px-4">
                <h1 class="text-5xl font-bold text-white mb-6 animate-fade-slide-up">Our Gallery</h1>
                <p class="text-xl text-white animate-fade-slide-up stagger-1">Explore the beauty of Sri Lanka through our lens</p>
            </div>
        </div>
    </div>

    <!-- Gallery Section -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-20">
        <!-- Filter Buttons -->
        <div class="flex flex-wrap justify-center gap-4 mb-12 scroll-reveal">
            <button class="filter-btn active bg-sl-green text-white px-6 py-2 rounded-full hover:bg-green-700 transition-colors"
                    data-category="all">
                All
            </button>
            <?php foreach ($categories as $category): ?>
            <button class="filter-btn bg-gray-200 text-gray-700 px-6 py-2 rounded-full hover:bg-sl-green hover:text-white transition-colors"
                    data-category="<?php echo strtolower($category); ?>">
                <?php echo $category; ?>
            </button>
            <?php endforeach; ?>
        </div>

        <!-- Gallery Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <?php foreach ($gallery_images as $index => $image): ?>
            <div class="gallery-item scroll-reveal <?php echo $index > 0 ? "stagger-{$index}" : ''; ?>" 
                 data-category="<?php echo strtolower($image['category']); ?>">
                <div class="relative group overflow-hidden rounded-lg">
                    <img src="<?php echo $image['url']; ?>" 
                         alt="<?php echo $image['title']; ?>" 
                         class="w-full h-72 object-cover transform group-hover:scale-110 transition-transform duration-500">
                    <div class="absolute inset-0 bg-black bg-opacity-50 opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-center justify-center">
                        <div class="text-center">
                            <h3 class="text-white text-xl font-semibold mb-2"><?php echo $image['title']; ?></h3>
                            <span class="text-white text-sm"><?php echo $image['category']; ?></span>
                            <button class="mt-4 px-6 py-2 bg-sl-green text-white rounded-full hover:bg-green-700 transition-colors view-image"
                                    data-image="<?php echo $image['url']; ?>"
                                    data-title="<?php echo $image['title']; ?>">
                                View Image
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>

    <!-- Image Modal -->
    <div id="imageModal" class="fixed inset-0 bg-black bg-opacity-90 hidden z-50 flex items-center justify-center">
        <button class="absolute top-4 right-4 text-white text-4xl hover:text-gray-300" id="closeModal">&times;</button>
        <div class="max-w-4xl w-full mx-4">
            <img src="" alt="" id="modalImage" class="w-full h-auto rounded-lg">
            <h3 id="modalTitle" class="text-white text-2xl font-semibold mt-4 text-center"></h3>
        </div>
    </div>
</div>

<!-- Gallery JavaScript -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Filter functionality
    const filterButtons = document.querySelectorAll('.filter-btn');
    const galleryItems = document.querySelectorAll('.gallery-item');

    filterButtons.forEach(button => {
        button.addEventListener('click', () => {
            // Update active button
            filterButtons.forEach(btn => btn.classList.remove('active', 'bg-sl-green', 'text-white'));
            button.classList.add('active', 'bg-sl-green', 'text-white');

            const category = button.getAttribute('data-category');

            // Filter gallery items
            galleryItems.forEach(item => {
                if (category === 'all' || item.getAttribute('data-category') === category) {
                    gsap.to(item, {
                        opacity: 1,
                        scale: 1,
                        duration: 0.3,
                        display: 'block'
                    });
                } else {
                    gsap.to(item, {
                        opacity: 0,
                        scale: 0.8,
                        duration: 0.3,
                        display: 'none'
                    });
                }
            });
        });
    });

    // Modal functionality
    const modal = document.getElementById('imageModal');
    const modalImage = document.getElementById('modalImage');
    const modalTitle = document.getElementById('modalTitle');
    const closeModal = document.getElementById('closeModal');
    const viewButtons = document.querySelectorAll('.view-image');

    viewButtons.forEach(button => {
        button.addEventListener('click', () => {
            const imageUrl = button.getAttribute('data-image');
            const imageTitle = button.getAttribute('data-title');
            
            modalImage.src = imageUrl;
            modalTitle.textContent = imageTitle;
            
            gsap.to(modal, {
                display: 'flex',
                opacity: 1,
                duration: 0.3,
                ease: 'power2.out'
            });
        });
    });

    closeModal.addEventListener('click', () => {
        gsap.to(modal, {
            opacity: 0,
            duration: 0.3,
            ease: 'power2.in',
            onComplete: () => {
                modal.style.display = 'none';
            }
        });
    });

    // Close modal on outside click
    modal.addEventListener('click', (e) => {
        if (e.target === modal) {
            gsap.to(modal, {
                opacity: 0,
                duration: 0.3,
                ease: 'power2.in',
                onComplete: () => {
                    modal.style.display = 'none';
                }
            });
        }
    });
});
</script>

<?php include 'includes/footer.php'; ?>
