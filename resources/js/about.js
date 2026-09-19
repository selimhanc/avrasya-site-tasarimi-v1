import Swiper from 'swiper';
import { A11y, EffectCube, Keyboard } from 'swiper/modules';

import 'swiper/css';
import 'swiper/css/effect-cube';

const root = document.querySelector('[data-about-page]');

if (root) {
    const track = root.querySelector('[data-about-swiper]');
    const sections = [...root.querySelectorAll('[data-about-section]')];
    const links = [...root.querySelectorAll('[data-about-nav]')];
    const mobile = window.matchMedia('(max-width: 1023px)');
    const reducedMotion = window.matchMedia('(prefers-reduced-motion: reduce)');
    const sectionIds = sections.map((section) => section.id);
    const sectionScrollTarget = (section) => section?.querySelector('.about-section__heading, .about-intro') || section;
    const requestedId = sectionIds.includes(window.location.hash.slice(1))
        ? window.location.hash.slice(1)
        : 'hakkimizda';
    let swiper = null;

    if (window.location.hash) {
        history.replaceState(null, '', window.location.pathname + window.location.search);
    }

    const setActive = (id, updateHistory = false) => {
        links.forEach((link) => {
            const active = link.hash === `#${id}`;
            link.classList.toggle('is-active', active);
            active ? link.setAttribute('aria-current', 'true') : link.removeAttribute('aria-current');
        });

        if (updateHistory) {
            history.replaceState(null, '', `#${id}`);
        }
    };

    const initializeSwiper = () => {
        if (!mobile.matches || swiper) return;

        swiper = new Swiper(track, {
            modules: [A11y, EffectCube, Keyboard],
            wrapperClass: 'about-sections__wrapper',
            slideClass: 'about-section',
            slidesPerView: 1,
            spaceBetween: 20,
            effect: window.matchMedia('(max-width: 640px)').matches && !reducedMotion.matches ? 'cube' : 'slide',
            speed: reducedMotion.matches ? 0 : 620,
            autoHeight: true,
            grabCursor: true,
            cubeEffect: {
                shadow: false,
                slideShadows: false,
            },
            keyboard: {
                enabled: true,
                onlyInViewport: true,
            },
            a11y: {
                enabled: true,
                prevSlideMessage: 'Önceki kurumsal bölüm',
                nextSlideMessage: 'Sonraki kurumsal bölüm',
                slideLabelMessage: '{{index}} / {{slidesLength}}',
            },
            initialSlide: Math.max(0, sectionIds.indexOf(requestedId)),
            on: {
                init(instance) {
                    const id = sectionIds[instance.activeIndex];
                    setActive(id, id === requestedId && requestedId !== 'hakkimizda');
                },
                slideChange(instance) {
                    setActive(sectionIds[instance.activeIndex], true);
                },
            },
        });
    };

    const destroySwiper = () => {
        if (!swiper) return;
        swiper.destroy(true, true);
        swiper = null;
        setActive(requestedId);
    };

    links.forEach((link) => {
        link.addEventListener('click', (event) => {
            const id = link.hash.slice(1);
            const index = sectionIds.indexOf(id);
            if (index < 0) return;

            event.preventDefault();

            if (mobile.matches) {
                initializeSwiper();
                swiper?.slideTo(index);
                root.querySelector('.about-mobile-nav')?.scrollIntoView({
                    behavior: reducedMotion.matches ? 'auto' : 'smooth',
                    block: 'start',
                });
            } else {
                sectionScrollTarget(sections[index]).scrollIntoView({
                    behavior: reducedMotion.matches ? 'auto' : 'smooth',
                    block: 'start',
                });
                setActive(id, true);
            }
        });
    });

    const updateDesktopSection = () => {
        if (mobile.matches) return;
        const anchor = window.innerHeight * .24;
        const current = sections
            .filter((section) => section.getBoundingClientRect().bottom > anchor)
            .sort((first, second) => Math.abs(first.getBoundingClientRect().top - anchor) - Math.abs(second.getBoundingClientRect().top - anchor))[0]
            || sections.at(-1);
        if (current) setActive(current.id);
    };

    const observer = new IntersectionObserver((entries) => {
        entries.forEach((entry) => {
            if (entry.isIntersecting) entry.target.classList.add('is-visible');
        });

        updateDesktopSection();
    }, { rootMargin: '-18% 0px -52% 0px', threshold: [0, .12, .35] });

    sections.forEach((section) => observer.observe(section));

    let scrollFrame;
    window.addEventListener('scroll', () => {
        if (mobile.matches) return;
        cancelAnimationFrame(scrollFrame);
        scrollFrame = requestAnimationFrame(updateDesktopSection);
    }, { passive: true });

    root.querySelectorAll('[data-spotlight-card]').forEach((item) => {
        item.addEventListener('pointermove', (event) => {
            if (event.pointerType === 'touch') return;
            const bounds = item.getBoundingClientRect();
            item.style.setProperty('--spotlight-x', `${event.clientX - bounds.left}px`);
            item.style.setProperty('--spotlight-y', `${event.clientY - bounds.top}px`);
        });
        item.addEventListener('pointerleave', () => {
            item.style.setProperty('--spotlight-x', '50%');
            item.style.setProperty('--spotlight-y', '50%');
        });
    });

    const syncLayout = () => {
        if (mobile.matches) initializeSwiper();
        else destroySwiper();
    };

    mobile.addEventListener('change', syncLayout);
    syncLayout();

    if (!mobile.matches) {
        requestAnimationFrame(() => {
            const section = sections[sectionIds.indexOf(requestedId)];
            if (requestedId !== 'hakkimizda') sectionScrollTarget(section)?.scrollIntoView({ block: 'start' });
            setActive(requestedId, requestedId !== 'hakkimizda');
        });
    }
}
