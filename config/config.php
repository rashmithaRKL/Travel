<?php
// Database configuration
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_NAME', 'travel_db');

// Site configuration
define('SITE_NAME', 'Sri Lanka Travel');
define('SITE_URL', 'http://localhost/Travel');
define('ADMIN_EMAIL', 'admin@srilankatravel.com');

// Error reporting
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Start session
session_start();

// Database connection
try {
    $pdo = new PDO(
        "mysql:host=" . DB_HOST . ";dbname=" . DB_NAME,
        DB_USER,
        DB_PASS,
        array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION)
    );
} catch(PDOException $e) {
    // Log error instead of displaying it in production
    error_log("Connection failed: " . $e->getMessage());
}

// Helper functions
function sanitize($input) {
    return htmlspecialchars(strip_tags(trim($input)));
}

function redirect($path) {
    header("Location: " . SITE_URL . "/" . $path);
    exit();
}

function isLoggedIn() {
    return isset($_SESSION['user_id']);
}

// Load destinations data
function getDestinations() {
    return [
        [
            'id' => 1,
            'name' => 'Sigiriya Rock Fortress',
            'description' => 'Ancient palace complex with stunning frescoes and lion-shaped gateway.',
            'image' => 'https://images.unsplash.com/photo-1588258147249-acde95d24992',
            'price' => 30
        ],
        [
            'id' => 2,
            'name' => 'Kandy Temple',
            'description' => 'Sacred Buddhist site housing the tooth relic of Buddha.',
            'image' => 'https://images.unsplash.com/photo-1590332763476-90472d63f50a',
            'price' => 25
        ],
        [
            'id' => 3,
            'name' => 'Mirissa Beach',
            'description' => 'Stunning beach destination perfect for whale watching and surfing.',
            'image' => 'https://images.unsplash.com/photo-1546708973-b339540b5162',
            'price' => 20
        ]
    ];
}

// Load testimonials data
function getTestimonials() {
    return [
        [
            'name' => 'John Doe',
            'country' => 'USA',
            'comment' => 'Amazing experience! The cultural sites were breathtaking.',
            'rating' => 5
        ],
        [
            'name' => 'Emma Wilson',
            'country' => 'UK',
            'comment' => 'Perfect blend of adventure and relaxation.',
            'rating' => 5
        ],
        [
            'name' => 'Marco Rossi',
            'country' => 'Italy',
            'comment' => 'The local cuisine and hospitality were outstanding!',
            'rating' => 4
        ]
    ];
}
