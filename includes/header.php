<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $pageTitle ?? 'Discover Sri Lanka'; ?> - Your Ultimate Travel Guide</title>
    <link rel="icon" type="image/svg+xml" href="data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHZpZXdCb3g9IjAgMCAyNCAyNCI+PHBhdGggZmlsbD0iIzJFOEI1NyIgZD0iTTEyIDJDNi40NzcgMiAyIDYuNDc3IDIgMTJzNC40NzcgMTAgMTAgMTAgMTAtNC40NzcgMTAtMTBTMTcuNTIzIDIgMTIgMnptLS41IDEzLjVjLS44MjggMC0xLjUtLjY3Mi0xLjUtMS41czAtMyAuNS00YzEtMiAyLTMgMy00IC41LS41IDEuNS0xIDIuNS0xIC41IDAgMSAuMiAxLjUuNS0xIDEtMiAyLTIuNSAzLS41IDEtLjc1IDItLjc1IDMgMCAuODI4LS42NzIgMS41LTEuNSAxLjVoLTJ6Ii8+PC9zdmc+" />
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/animations.css">
    <link rel="stylesheet" href="css/slider.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/three.js/r128/three.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/ScrollTrigger.min.js"></script>
    <style>
        .hero-canvas {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: -1;
        }

        .parallax-bg {
            background-attachment: fixed;
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
        }

        .glass-effect {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.2);
        }

        .text-shadow {
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.3);
        }

        .gradient-border {
            position: relative;
            background: linear-gradient(45deg, #2E8B57, #4CAF50);
            padding: 3px;
            border-radius: 0.5rem;
        }
    </style>
</head>
<body class="bg-white">
    <!-- Navigation -->
    <nav class="bg-sl-green fixed w-full z-50 glass-effect">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-16">
                <div class="flex items-center">
                    <div class="flex-shrink-0">
                        <span class="text-white text-xl font-bold text-gradient">Sri Lanka Travel</span>
                    </div>
                </div>
                <div class="hidden md:block">
                    <div class="ml-10 flex items-baseline space-x-4">
                        <a href="index.php" class="text-white nav-link px-3 py-2 rounded-md text-sm font-medium">Home</a>
                        <a href="about.php" class="text-white nav-link hover:bg-green-700 px-3 py-2 rounded-md text-sm font-medium">About</a>
                        <a href="locations.php" class="text-white nav-link hover:bg-green-700 px-3 py-2 rounded-md text-sm font-medium">Locations</a>
                        <a href="price.php" class="text-white nav-link hover:bg-green-700 px-3 py-2 rounded-md text-sm font-medium">Pricing</a>
                        <a href="gallery.php" class="text-white nav-link hover:bg-green-700 px-3 py-2 rounded-md text-sm font-medium">Gallery</a>
                        <a href="contact.php" class="text-white nav-link hover:bg-green-700 px-3 py-2 rounded-md text-sm font-medium">Contact</a>
                    </div>
                </div>
                <!-- Mobile menu button -->
                <div class="md:hidden">
                    <button type="button" class="text-white hover:text-gray-300 focus:outline-none" id="mobile-menu-button">
                        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        </svg>
                    </button>
                </div>
            </div>
            <!-- Mobile menu -->
            <div class="hidden md:hidden" id="mobile-menu">
                <div class="px-2 pt-2 pb-3 space-y-1">
                    <a href="index.php" class="text-white block px-3 py-2 rounded-md text-base font-medium">Home</a>
                    <a href="about.php" class="text-white block px-3 py-2 rounded-md text-base font-medium">About</a>
                    <a href="locations.php" class="text-white block px-3 py-2 rounded-md text-base font-medium">Locations</a>
                    <a href="price.php" class="text-white block px-3 py-2 rounded-md text-base font-medium">Pricing</a>
                    <a href="gallery.php" class="text-white block px-3 py-2 rounded-md text-base font-medium">Gallery</a>
                    <a href="contact.php" class="text-white block px-3 py-2 rounded-md text-base font-medium">Contact</a>
                </div>
            </div>
        </div>
    </nav>
