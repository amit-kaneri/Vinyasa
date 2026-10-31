/* ==========================================================================
   Smooth scroll (Lenis)
   ========================================================================== */

const reduceMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;

const lenis = reduceMotion ? null : new Lenis({
    duration: 1.2,
    easing: (t) => Math.min(1, 1.001 - Math.pow(2, -10 * t)),
    anchors: true,   // <a href="#section"> links scroll smoothly
    autoRaf: true,
});

window.lenis = lenis;

/* ==========================================================================
   Header — scrolled state + mobile menu
   ========================================================================== */

const header = document.getElementById('siteHeader');

if (header) {
    const toggle = header.querySelector('.menu-toggle');

    const onScroll = () => header.classList.toggle('is-scrolled', window.scrollY > 40);
    onScroll();
    window.addEventListener('scroll', onScroll, { passive: true });

    const setMenu = (open) => {
        document.body.classList.toggle('menu-open', open);
        toggle.setAttribute('aria-expanded', open);
        toggle.setAttribute('aria-label', open ? 'Close menu' : 'Open menu');
        if (lenis) open ? lenis.stop() : lenis.start();
    };

    toggle.addEventListener('click', () => setMenu(!document.body.classList.contains('menu-open')));

    // Close the menu after a link is tapped or Esc is pressed
    header.querySelectorAll('.site-nav a').forEach((a) => a.addEventListener('click', () => setMenu(false)));
    document.addEventListener('keydown', (ev) => ev.key === 'Escape' && setMenu(false));
}

/* ==========================================================================
   Count-up numbers — <strong data-count="5000" data-suffix="+" data-decimals="0">
   ========================================================================== */

const countUp = (el) => {
    const target = parseFloat(el.dataset.count);
    const decimals = parseInt(el.dataset.decimals || 0, 10);
    const suffix = el.dataset.suffix || '';
    const duration = 1800;
    const start = performance.now();

    // hold the final width (the page renders the final number) so the layout doesn't move while counting
    el.style.minWidth = `${el.getBoundingClientRect().width}px`;

    const tick = (now) => {
        const progress = Math.min((now - start) / duration, 1);
        const eased = 1 - Math.pow(1 - progress, 3);
        const value = (target * eased).toLocaleString('en-US', { minimumFractionDigits: decimals, maximumFractionDigits: decimals });
        el.innerHTML = value + (suffix ? `<em>${suffix}</em>` : '');
        if (progress < 1) requestAnimationFrame(tick);
        else el.style.minWidth = '';
    };

    requestAnimationFrame(tick);
};

if (!reduceMotion) {
    const counters = document.querySelectorAll('[data-count]');

    const observer = new IntersectionObserver((entries) => {
        entries.forEach((entry) => {
            if (!entry.isIntersecting) return;
            countUp(entry.target);
            observer.unobserve(entry.target);
        });
    }, { threshold: 0.6 });

    counters.forEach((el) => observer.observe(el));
}

/* ==========================================================================
   Scroll reveal — any element with [data-reveal] fades up when it enters the screen
   ========================================================================== */

if (!reduceMotion && 'IntersectionObserver' in window) {
    document.documentElement.classList.add('js-reveal');

    const revealObserver = new IntersectionObserver((entries) => {
        entries.forEach((entry) => {
            if (!entry.isIntersecting) return;
            entry.target.classList.add('is-visible');
            revealObserver.unobserve(entry.target);
        });
    }, { threshold: 0.15, rootMargin: '0px 0px -60px 0px' });

    document.querySelectorAll('[data-reveal]').forEach((el) => revealObserver.observe(el));
}

/* ==========================================================================
   Sliders — shared .slider-controls (count · progress line · arrows)
   ========================================================================== */

const pad2 = (n) => String(n).padStart(2, '0');

// Swiper options that wire up a .slider-controls block inside `wrap`
const controlOptions = (wrap) => {
    const count = wrap.querySelector('.slider-controls__count strong');
    const update = (s) => {
        const total = s.slides.length;
        if (count) count.textContent = pad2(s.isEnd ? total : s.realIndex + 1);
    };

    return {
        pagination: { el: wrap.querySelector('.slider-controls__progress'), type: 'progressbar' },
        navigation: { prevEl: wrap.querySelector('.slider-controls__prev'), nextEl: wrap.querySelector('.slider-controls__next') },
        on: { init: update, slideChange: update, reachEnd: update },
    };
};

/* Mobile slider — Swiper below 992px, plain grid on desktop.
   [data-mobile-slider]          1 full slide, 2 from 576px (home courses)
   [data-mobile-slider="single"] always 1 full slide (course-page photo row) */
const sliderQuery = window.matchMedia('(max-width: 991.98px)');

document.querySelectorAll('[data-mobile-slider]').forEach((wrap) => {
    const el = wrap.querySelector('.swiper');
    const single = wrap.dataset.mobileSlider === 'single';
    let swiper = null;

    const toggle = () => {
        if (sliderQuery.matches && !swiper) {
            swiper = new Swiper(el, {
                slidesPerView: 1, // one full card, no peek of the next one
                spaceBetween: 16,
                speed: 900,
                grabCursor: true,
                breakpoints: single ? {} : {
                    576: { slidesPerView: 2, spaceBetween: 24 },
                },
                ...controlOptions(wrap),
            });
        } else if (!sliderQuery.matches && swiper) {
            swiper.destroy(true, true);
            swiper = null;
        }
    };

    toggle();
    sliderQuery.addEventListener('change', toggle);
});

/* Daily schedule — round "watch": the schedule is written around the dial. Hover / click / focus (Enter) an entry → it glows,
   the hand turns to it and the centre shows it in full. Until the visitor touches it, the watch steps through the day by itself
   (not with reduced motion). */
document.querySelectorAll('[data-clock]').forEach((watch) => {
    const entries = [...watch.querySelectorAll('.watch__entry')];
    const hand = watch.querySelector('.watch__hand');
    const centre = {
        icon: watch.querySelector('.watch__c-icon'),
        time: watch.querySelector('.watch__c-time'),
        until: watch.querySelector('.watch__c-until'),
        session: watch.querySelector('.watch__c-session'),
    };
    let current = -1;
    let angle = 0; // cumulative, so the hand keeps turning forward (no spin back after the last entry)
    let timer = null;
    let touched = false; // once the visitor interacts, auto-play never starts again

    const show = (i) => {
        if (i === current) return;
        const entry = entries[i];
        const deg = parseFloat(entry.dataset.deg);
        if (current < 0) {
            angle = deg;
        } else {
            angle += ((deg - (angle % 360)) % 360 + 540) % 360 - 180; // shortest way round
        }
        current = i;

        entries.forEach((el, n) => el.classList.toggle('is-active', n === i));
        hand.style.setProperty('--angle', `${angle}deg`);

        centre.icon.innerHTML = entry.querySelector('.watch__icon-src').innerHTML;
        centre.time.textContent = entry.dataset.time;
        centre.until.textContent = entry.dataset.end ? `until ${entry.dataset.end}` : '';
        centre.session.textContent = entry.dataset.session;
    };

    const pick = (i) => {
        touched = true;
        clearInterval(timer);
        timer = null;
        show(i);
    };

    entries.forEach((entry, i) => {
        ['mouseenter', 'focus', 'click'].forEach((ev) => entry.addEventListener(ev, () => pick(i)));
        entry.addEventListener('keydown', (e) => {
            if (e.key === 'Enter' || e.key === ' ') {
                e.preventDefault();
                pick(i);
            }
        });
    });

    show(0);

    // auto-play: start when the watch scrolls into view
    if (!reduceMotion && 'IntersectionObserver' in window) {
        const io = new IntersectionObserver(([entry]) => {
            if (!entry.isIntersecting) return;
            io.disconnect();
            if (!touched) timer = setInterval(() => show((current + 1) % entries.length), 2600);
        }, { threshold: 0.4 });
        io.observe(watch);
    }
});

/* Testimonials — platform tabs; each panel has its own stacked-cards Swiper (created on first show) */
document.querySelectorAll('[data-reviews]').forEach((section) => {
    const tabs = [...section.querySelectorAll('[role="tab"]')];
    const panels = [...section.querySelectorAll('[role="tabpanel"]')];
    const swipers = new Map();

    const initSlider = (panel) => {
        if (swipers.has(panel)) {
            const s = swipers.get(panel);
            s.update();
            s.autoplay?.start();
            return;
        }
        swipers.set(panel, new Swiper(panel.querySelector('.swiper'), {
            effect: 'cards',
            cardsEffect: { perSlideOffset: 9, perSlideRotate: 3, slideShadows: false },
            speed: 700,
            grabCursor: true,
            autoplay: reduceMotion ? false : { delay: 6000, pauseOnMouseEnter: true, disableOnInteraction: false },
            ...controlOptions(panel),
        }));
    };

    const select = (tab) => {
        tabs.forEach((t) => {
            const on = t === tab;
            t.classList.toggle('is-active', on);
            t.setAttribute('aria-selected', on);
            t.tabIndex = on ? 0 : -1;
        });
        panels.forEach((p) => {
            const on = p.id === tab.getAttribute('aria-controls');
            p.hidden = !on;
            p.classList.toggle('is-active', on);
            if (on) initSlider(p);
            else swipers.get(p)?.autoplay?.stop();
        });
    };

    tabs.forEach((tab, i) => {
        tab.addEventListener('click', () => select(tab));
        // arrow keys move between tabs
        tab.addEventListener('keydown', (ev) => {
            const dir = { ArrowRight: 1, ArrowDown: 1, ArrowLeft: -1, ArrowUp: -1 }[ev.key];
            if (!dir) return;
            ev.preventDefault();
            const next = tabs[(i + dir + tabs.length) % tabs.length];
            next.focus();
            select(next);
        });
    });

    initSlider(panels.find((p) => !p.hidden));
});

/* FAQ — desktop: list + panel (one always open) · mobile: accordion (can close) */
document.querySelectorAll('[data-faq]').forEach((section) => {
    const items = [...section.querySelectorAll('.faq-item')];
    const desktop = window.matchMedia('(min-width: 992px)');

    const setOpen = (item, open) => {
        item.classList.toggle('is-active', open);
        item.querySelector('[data-faq-q]').setAttribute('aria-expanded', open);
    };

    items.forEach((item) => {
        item.querySelector('[data-faq-q]').addEventListener('click', () => {
            const isOpen = item.classList.contains('is-active');
            if (isOpen && desktop.matches) return;
            items.forEach((other) => setOpen(other, other === item ? !isOpen : false));
        });
    });

    // the desktop panel should never be empty
    desktop.addEventListener('change', (e) => {
        if (e.matches && !items.some((item) => item.classList.contains('is-active'))) setOpen(items[0], true);
    });
});

/* Popups — <dialog class="modal">, opened by [data-modal-open="id"]. Esc, × or a backdrop click closes it.
   Native showModal() traps focus and returns it to the button; Lenis stops while a popup is open. */
document.querySelectorAll('[data-modal-open]').forEach((btn) => {
    const modal = document.getElementById(btn.dataset.modalOpen);
    if (!modal) return;
    btn.addEventListener('click', () => {
        modal.showModal();
        document.body.classList.add('modal-open');
        if (lenis) lenis.stop();
    });
});

document.querySelectorAll('dialog.modal').forEach((modal) => {
    modal.querySelectorAll('[data-modal-close]').forEach((btn) => btn.addEventListener('click', () => modal.close()));
    // click on the dark backdrop (outside the box) closes
    modal.addEventListener('click', (e) => {
        if (e.target === modal) modal.close();
    });
    modal.addEventListener('close', () => {
        document.body.classList.remove('modal-open');
        if (lenis) lenis.start();
    });
});

/* Back to top */
document.querySelectorAll('[data-back-to-top]').forEach((btn) => {
    btn.addEventListener('click', () => (lenis ? lenis.scrollTo(0) : window.scrollTo({ top: 0, behavior: 'smooth' })));

    // show after 400px, ring = scroll progress
    const update = () => {
        const max = document.documentElement.scrollHeight - window.innerHeight;
        const progress = max > 0 ? Math.min(100, (window.scrollY / max) * 100) : 0;
        btn.style.setProperty('--progress', progress.toFixed(1));
        btn.classList.toggle('is-visible', window.scrollY > 400);
    };
    window.addEventListener('scroll', update, { passive: true });
    update();
});

/* ==========================================================================
   Gallery lightbox — click a photo, arrows / keys to move, Esc or ✕ to close
   ========================================================================== */

document.querySelectorAll('[data-gallery]').forEach((section) => {
    const items = [...section.querySelectorAll('[data-gallery-item]')];
    const box = section.querySelector('.lightbox');
    if (!items.length || !box) return;

    const img = box.querySelector('img');
    const label = box.querySelector('.lightbox__label');
    const title = box.querySelector('.lightbox__title');
    const count = box.querySelector('.lightbox__count');
    let index = 0;
    let lastFocus = null;

    const show = (i) => {
        index = (i + items.length) % items.length;
        const item = items[index];
        const thumb = item.querySelector('img');
        img.src = thumb.currentSrc || thumb.src;
        img.alt = thumb.alt;
        label.textContent = item.dataset.label || '';
        title.textContent = item.dataset.title || '';
        count.textContent = `${pad2(index + 1)} / ${pad2(items.length)}`;
    };

    const open = (i) => {
        lastFocus = document.activeElement;
        show(i);
        box.hidden = false;
        document.body.classList.add('lightbox-open');
        if (lenis) lenis.stop();
        box.querySelector('.lightbox__close').focus();
    };

    const close = () => {
        box.hidden = true;
        document.body.classList.remove('lightbox-open');
        if (lenis) lenis.start();
        lastFocus?.focus();
    };

    items.forEach((item, i) => item.addEventListener('click', () => open(i)));
    box.querySelector('.lightbox__close').addEventListener('click', close);
    box.querySelector('.lightbox__prev').addEventListener('click', () => show(index - 1));
    box.querySelector('.lightbox__next').addEventListener('click', () => show(index + 1));
    box.addEventListener('click', (ev) => ev.target === box && close()); // click on the backdrop

    document.addEventListener('keydown', (ev) => {
        if (box.hidden) return;
        if (ev.key === 'Escape') close();
        if (ev.key === 'ArrowLeft') show(index - 1);
        if (ev.key === 'ArrowRight') show(index + 1);
    });
});

/* ==========================================================================
   Room photo panel (course fees) — hover / focus a room card or click a tab → show that room's photo
   ========================================================================== */

document.querySelectorAll('[data-room-view]').forEach((view) => {
    const photos = [...view.querySelectorAll('[data-room-photo]')];
    const tabs = [...view.querySelectorAll('[data-room-tab]')];
    const cards = [...view.closest('section').querySelectorAll('[data-room-card]')];

    const show = (i) => {
        photos.forEach((photo, n) => photo.classList.toggle('is-active', n === i));
        cards.forEach((card, n) => card.classList.toggle('is-active', n === i));
        tabs.forEach((tab, n) => {
            tab.classList.toggle('is-active', n === i);
            tab.setAttribute('aria-pressed', n === i);
        });
    };

    tabs.forEach((tab, i) => tab.addEventListener('click', () => show(i)));
    cards.forEach((card, i) => {
        card.addEventListener('mouseenter', () => show(i));
        card.addEventListener('focusin', () => show(i));
    });
});
