// resources/js/darkMode.js

function darkMode() {
    document.documentElement.classList.toggle('dark');
    localStorage.setItem('theme', document.documentElement.classList.contains('dark') ? 'dark' : 'light');
}

// On page load, check for the saved theme preference and apply it
if (localStorage.getItem('theme') === 'dark') {
    document.documentElement.classList.add('dark');
}

// Attach darkMode function to the global window object so it can be called in HTML
window.darkMode = darkMode;

console.log('darkMode.js loaded');
