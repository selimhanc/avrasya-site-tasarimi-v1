import './bootstrap';

import Alpine from 'alpinejs';
import Swiper from 'swiper';
import {
    A11y,
    EffectCube,
    Keyboard,
    Navigation,
    Pagination,
} from 'swiper/modules';

import 'swiper/css';
import 'swiper/css/effect-cube';
import 'swiper/css/navigation';
import 'swiper/css/pagination';

window.Alpine = Alpine;

Alpine.data('mobileNavigation', () => ({
    open: false,
}));

Alpine.data('heroWords', () => ({
    words: ['umut', 'eğitim', 'sağlık', 'gelecek'],
    current: 0,
    timer: null,

    init() {
        if (window.matchMedia('(prefers-reduced-motion: reduce)').matches) {
            return;
        }

        this.timer = window.setInterval(() => {
            this.current = (this.current + 1) % this.words.length;
        }, 2400);
    },

    destroy() {
        window.clearInterval(this.timer);
    },
}));

Alpine.data('donationPicker', () => ({
    category: 'Genel Bağış',
    amount: 500,
    customAmount: '',
    added: false,

    chooseAmount(amount) {
        this.amount = amount;
        this.customAmount = '';
        this.added = false;
    },

    chooseCustom() {
        this.amount = null;
        this.added = false;
    },

    get selectedAmount() {
        return this.customAmount || this.amount || 0;
    },

    add() {
        if (!this.selectedAmount) return;
        this.added = true;
        window.setTimeout(() => { this.added = false; }, 2600);
    },
}));

Alpine.start();

function initializeSpotlightCards(root = document) {
    root.querySelectorAll('[data-spotlight-card]').forEach((card) => {
        if (card.dataset.spotlightInitialized === 'true') return;

        card.dataset.spotlightInitialized = 'true';

        card.addEventListener('pointermove', (event) => {
            if (event.pointerType === 'touch') return;

            const bounds = card.getBoundingClientRect();
            card.style.setProperty('--spotlight-x', `${event.clientX - bounds.left}px`);
            card.style.setProperty('--spotlight-y', `${event.clientY - bounds.top}px`);
        });

        card.addEventListener('pointerleave', () => {
            card.style.setProperty('--spotlight-x', '50%');
            card.style.setProperty('--spotlight-y', '50%');
        });
    });
}

function initializeActivitySlider() {
    const slider = document.querySelector('[data-activity-slider]');
    if (!slider) return;

    const shell = slider.closest('section');
    const reducedMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;

    new Swiper(slider, {
        modules: [A11y, EffectCube, Keyboard, Navigation, Pagination],
        effect: reducedMotion ? 'slide' : 'cube',
        speed: reducedMotion ? 0 : 720,
        grabCursor: true,
        rewind: true,
        autoHeight: true,
        watchSlidesProgress: true,
        cubeEffect: {
            shadow: false,
            slideShadows: false,
        },
        keyboard: {
            enabled: true,
            onlyInViewport: true,
        },
        navigation: {
            prevEl: shell.querySelector('[data-slider-prev]'),
            nextEl: shell.querySelector('[data-slider-next]'),
        },
        pagination: {
            el: shell.querySelector('[data-slider-pagination]'),
            clickable: true,
        },
        a11y: {
            enabled: true,
            prevSlideMessage: 'Önceki faaliyet',
            nextSlideMessage: 'Sonraki faaliyet',
            firstSlideMessage: 'İlk faaliyet',
            lastSlideMessage: 'Son faaliyet',
            paginationBulletMessage: '{{index}}. faaliyete git',
        },
    });
}

initializeSpotlightCards();
initializeActivitySlider();
