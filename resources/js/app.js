import './bootstrap';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();
const heroImages = [
    '/images/hero1.jpg',
    '/images/hero2.jpg',
    '/images/hero3.jpg',
    '/images/hero4.jpg',
    '/images/hero5.jpg',
    '/images/hero6.jpg',
    '/images/hero7.jpg'
];

let current = 0;

document.addEventListener("DOMContentLoaded", () => {

    const heroImage = document.getElementById("heroImage");

    if (!heroImage) return;

    setInterval(() => {

        // Fade out
        heroImage.style.opacity = "0";

        setTimeout(() => {

            current = (current + 1) % heroImages.length;

            heroImage.src = heroImages[current];

            // Fade in
            heroImage.style.opacity = "1";

        }, 500);

    }, 4000);

});