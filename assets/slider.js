document.addEventListener('DOMContentLoaded', function () {
    const slides   = document.querySelectorAll('#dkSlider .dk-slide');
    const dots     = document.querySelectorAll('.dk-slider-dot');
    const nameEl   = document.getElementById('dkProductName');
    const priceEl  = document.getElementById('dkProductPrice');
    const linkEl   = document.getElementById('dkProductLink');
    let current    = 0;
    let timer;

    if (!slides.length) return;

    function updatePriceCard(index) {
        const slide = slides[index];
        if (!slide) return;
        const name  = slide.getAttribute('data-name')  || '';
        const price = slide.getAttribute('data-price') || '';
        const link  = slide.getAttribute('data-link')  || '#';

        if (nameEl)  nameEl.textContent  = name;
        if (priceEl) priceEl.textContent = price;
        if (linkEl)  linkEl.href         = link;
    }

    function goTo(index) {
        slides[current].classList.remove('active');
        dots[current] && dots[current].classList.remove('active');
        current = index;
        slides[current].classList.add('active');
        dots[current] && dots[current].classList.add('active');
        updatePriceCard(current);
    }

    function next() {
        goTo((current + 1) % slides.length);
    }

    function startAuto() {
        timer = setInterval(next, 3500);
    }

    function stopAuto() {
        clearInterval(timer);
    }

    dots.forEach(function (dot, i) {
        dot.addEventListener('click', function () {
            stopAuto();
            goTo(i);
            startAuto();
        });
    });

    startAuto();
});

// Mobile burger menu
const burger = document.getElementById('dkBurger');
const mobileNav = document.getElementById('dkMobileNav');

if (burger && mobileNav) {
    burger.addEventListener('click', function () {
        burger.classList.toggle('open');
        mobileNav.classList.toggle('open');
    });

    // Close on link click
    mobileNav.querySelectorAll('a').forEach(function (link) {
        link.addEventListener('click', function () {
            burger.classList.remove('open');
            mobileNav.classList.remove('open');
        });
    });
}