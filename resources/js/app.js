require('./bootstrap'); // This is fine with Mix
const Alpine = require('alpinejs'); // Load AlpineJS
import '@lottiefiles/lottie-player';

window.Alpine = Alpine; // Make Alpine globally available
Alpine.start(); // Initialize Alpine