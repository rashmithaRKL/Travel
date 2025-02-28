<?php
require_once 'config/config.php';
$pageTitle = 'Contact Us';
include 'includes/header.php';

// Handle form submission
$message = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = sanitize($_POST['name'] ?? '');
    $email = sanitize($_POST['email'] ?? '');
    $subject = sanitize($_POST['subject'] ?? '');
    $message_text = sanitize($_POST['message'] ?? '');

    // Basic validation
    if ($name && $email && $subject && $message_text) {
        // In a real application, you would send an email here
        $message = '<div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded">Thank you for your message. We will get back to you soon!</div>';
    } else {
        $message = '<div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded">Please fill in all fields.</div>';
    }
}
?>

<div class="pt-20">
    <!-- Hero Section -->
    <div class="relative h-[40vh] overflow-hidden">
        <div class="absolute inset-0">
            <img src="https://images.unsplash.com/photo-1590332763476-90472d63f50a" 
                 alt="Contact Us" 
                 class="w-full h-full object-cover">
            <div class="absolute inset-0 bg-black bg-opacity-50"></div>
        </div>
        <div class="relative h-full flex items-center justify-center text-center">
            <div class="max-w-4xl px-4">
                <h1 class="text-5xl font-bold text-white mb-6 animate-fade-slide-up">Contact Us</h1>
                <p class="text-xl text-white animate-fade-slide-up stagger-1">Get in touch with us for your dream Sri Lankan adventure</p>
            </div>
        </div>
    </div>

    <!-- Contact Section -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-20">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-12">
            <!-- Contact Information -->
            <div class="scroll-reveal">
                <h2 class="text-3xl font-bold mb-8 text-gradient">Get In Touch</h2>
                <div class="space-y-6">
                    <div class="flex items-start space-x-4">
                        <div class="flex-shrink-0">
                            <div class="w-12 h-12 bg-sl-green rounded-lg flex items-center justify-center">
                                <i class="fas fa-map-marker-alt text-white text-xl"></i>
                            </div>
                        </div>
                        <div>
                            <h3 class="text-xl font-semibold mb-2">Visit Us</h3>
                            <p class="text-gray-600">123 Temple Road<br>Colombo 03<br>Sri Lanka</p>
                        </div>
                    </div>

                    <div class="flex items-start space-x-4">
                        <div class="flex-shrink-0">
                            <div class="w-12 h-12 bg-sl-green rounded-lg flex items-center justify-center">
                                <i class="fas fa-phone text-white text-xl"></i>
                            </div>
                        </div>
                        <div>
                            <h3 class="text-xl font-semibold mb-2">Call Us</h3>
                            <p class="text-gray-600">+94 11 234 5678<br>+94 77 123 4567</p>
                        </div>
                    </div>

                    <div class="flex items-start space-x-4">
                        <div class="flex-shrink-0">
                            <div class="w-12 h-12 bg-sl-green rounded-lg flex items-center justify-center">
                                <i class="fas fa-envelope text-white text-xl"></i>
                            </div>
                        </div>
                        <div>
                            <h3 class="text-xl font-semibold mb-2">Email Us</h3>
                            <p class="text-gray-600">info@srilankatravel.com<br>bookings@srilankatravel.com</p>
                        </div>
                    </div>

                    <div class="flex items-start space-x-4">
                        <div class="flex-shrink-0">
                            <div class="w-12 h-12 bg-sl-green rounded-lg flex items-center justify-center">
                                <i class="fas fa-clock text-white text-xl"></i>
                            </div>
                        </div>
                        <div>
                            <h3 class="text-xl font-semibold mb-2">Working Hours</h3>
                            <p class="text-gray-600">Monday - Friday: 9:00 AM - 6:00 PM<br>Saturday: 9:00 AM - 1:00 PM</p>
                        </div>
                    </div>
                </div>

                <!-- Social Media Links -->
                <div class="mt-8">
                    <h3 class="text-xl font-semibold mb-4">Follow Us</h3>
                    <div class="flex space-x-4">
                        <a href="#" class="w-10 h-10 bg-sl-green rounded-full flex items-center justify-center text-white hover:bg-green-700 transition-colors">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a href="#" class="w-10 h-10 bg-sl-green rounded-full flex items-center justify-center text-white hover:bg-green-700 transition-colors">
                            <i class="fab fa-twitter"></i>
                        </a>
                        <a href="#" class="w-10 h-10 bg-sl-green rounded-full flex items-center justify-center text-white hover:bg-green-700 transition-colors">
                            <i class="fab fa-instagram"></i>
                        </a>
                        <a href="#" class="w-10 h-10 bg-sl-green rounded-full flex items-center justify-center text-white hover:bg-green-700 transition-colors">
                            <i class="fab fa-linkedin-in"></i>
                        </a>
                    </div>
                </div>
            </div>

            <!-- Contact Form -->
            <div class="scroll-reveal stagger-1">
                <div class="bg-white rounded-lg p-8 shadow-lg">
                    <h2 class="text-3xl font-bold mb-6">Send Us a Message</h2>
                    <?php if ($message) echo $message; ?>
                    <form action="" method="POST" class="space-y-6">
                        <div>
                            <label for="name" class="block text-gray-700 mb-2">Your Name</label>
                            <input type="text" id="name" name="name" required
                                   class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-sl-green">
                        </div>
                        <div>
                            <label for="email" class="block text-gray-700 mb-2">Your Email</label>
                            <input type="email" id="email" name="email" required
                                   class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-sl-green">
                        </div>
                        <div>
                            <label for="subject" class="block text-gray-700 mb-2">Subject</label>
                            <input type="text" id="subject" name="subject" required
                                   class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-sl-green">
                        </div>
                        <div>
                            <label for="message" class="block text-gray-700 mb-2">Your Message</label>
                            <textarea id="message" name="message" rows="5" required
                                      class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-sl-green"></textarea>
                        </div>
                        <button type="submit" class="w-full bg-sl-green text-white py-3 rounded-lg hover:bg-green-700 transition-colors">
                            Send Message
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Map Section -->
    <div class="h-[400px] relative overflow-hidden">
        <iframe 
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d126743.58585959156!2d79.8211859!3d6.9218374!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3ae253d10f7a7003%3A0x320b2e4d32d3838d!2sColombo%2C%20Sri%20Lanka!5e0!3m2!1sen!2sus!4v1674829382247!5m2!1sen!2sus" 
            width="100%" 
            height="100%" 
            style="border:0;" 
            allowfullscreen="" 
            loading="lazy" 
            referrerpolicy="no-referrer-when-downgrade">
        </iframe>
    </div>
</div>

<?php include 'includes/footer.php'; ?>
