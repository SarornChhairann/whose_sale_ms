require('./bootstrap'); // This is fine with Mix
const Alpine = require('alpinejs'); // Load AlpineJS

window.Alpine = Alpine; // Make Alpine globally available
Alpine.start(); // Initialize Alpine