# Sri Lanka Travel Website

A modern, responsive travel website showcasing the beauty and attractions of Sri Lanka. Built with HTML, Tailwind CSS, Three.js, and GSAP animations.

## Features

- Interactive 3D globe animation on the home page
- Smooth scroll animations and transitions
- Responsive design for all screen sizes
- Advanced UI components with glass morphism effects
- Image gallery with filtering capabilities
- Interactive pricing cards
- Contact form with animations
- Location showcase with filtering
- Optimized performance and loading states

## Technologies Used

- HTML5
- Tailwind CSS for styling
- Three.js for 3D animations
- GSAP for scroll animations and transitions
- JavaScript (ES6+)

## Project Structure

```
sri-lanka-travel/
├── css/
│   ├── animations.css    # Custom animations
│   ├── main.css         # Tailwind imports and custom styles
│   └── tailwind.css     # Compiled Tailwind styles
├── js/
│   └── script.js        # Main JavaScript file
├── *.html               # HTML pages
├── package.json         # Project dependencies
└── tailwind.config.js   # Tailwind configuration
```

## Getting Started

1. Clone the repository:
```bash
git clone <repository-url>
cd sri-lanka-travel
```

2. Install dependencies:
```bash
npm install
```

3. Build Tailwind CSS:
```bash
# Build once
npm run build:css

# Watch for changes during development
npm run watch:css
```

4. Open `index.html` in your browser to view the site.

## Development

- The site uses Tailwind CSS for styling. Edit `css/main.css` for custom styles.
- Custom animations are defined in `css/animations.css`.
- JavaScript functionality is in `js/script.js`.
- Run `npm run watch:css` during development to automatically rebuild CSS when changes are made.

## Pages

- **Home**: Features a 3D globe animation and overview of Sri Lanka
- **About**: History and information about Sri Lanka
- **Locations**: Popular destinations with filtering
- **Pricing**: Travel packages and pricing options
- **Gallery**: Photo gallery with filtering and lightbox
- **Contact**: Contact form with interactive animations

## Performance Optimizations

- Optimized 3D globe rendering with fallback
- Lazy loading for images
- Debounced event handlers
- Efficient animation handling
- Reduced Tailwind CSS file size through proper configuration

## Browser Support

- Chrome (latest)
- Firefox (latest)
- Safari (latest)
- Edge (latest)

## Contributing

1. Fork the repository
2. Create your feature branch (`git checkout -b feature/amazing-feature`)
3. Commit your changes (`git commit -m 'Add some amazing feature'`)
4. Push to the branch (`git push origin feature/amazing-feature`)
5. Open a Pull Request

## License

This project is licensed under the MIT License - see the LICENSE file for details.
