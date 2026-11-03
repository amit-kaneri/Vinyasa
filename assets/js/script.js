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

/* Popups — <dialog class="modal">, opened by [data-modal-open="id"]. Esc, × or a backdrop click closes it.
   Native showModal() traps focus and returns it to the button; Lenis stops while a popup is open.
   Fires "modal:open" / "modal:close" on document so moving parts behind the popup (highlights strip) can pause. */
document.querySelectorAll('[data-modal-open]').forEach((btn) => {
    const modal = document.getElementById(btn.dataset.modalOpen);
    if (!modal) return;
    btn.addEventListener('click', () => {
        modal.showModal();
        document.body.classList.add('modal-open');
        if (lenis) lenis.stop();
        document.dispatchEvent(new Event('modal:open'));
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
        document.dispatchEvent(new Event('modal:close'));
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
   Highlights (course page) — endless photo strip: drifts slowly and evenly (marquee: autoplay delay 0 + long linear speed),
   stops right where it is on hover, can be dragged (no arrow buttons — user). 4 in view ≥1200 · 3 ≥768 · 2 on phones.
   With reduced motion it does not drift (drag only).
   Hover "freezes" the strip exactly in place (Swiper alone would only pause after the current long drift ends).
   ========================================================================== */

document.querySelectorAll('[data-highlights]').forEach((wrap) => {
    const calm = window.matchMedia('(prefers-reduced-motion: reduce)').matches;
    const drift = 6000; // ms per photo while drifting
    let hovering = false;

    const swiper = new Swiper(wrap.querySelector('.swiper'), {
        slidesPerView: 2,
        spaceBetween: 14,
        loop: true,
        speed: drift,
        grabCursor: true,
        autoplay: calm ? false : { delay: 0, disableOnInteraction: false },
        breakpoints: {
            768: { slidesPerView: 3, spaceBetween: 20 },
            1200: { slidesPerView: 4, spaceBetween: 28 },
        },
    });

    // stop the drift exactly at the current position
    const freeze = () => {
        if (swiper.autoplay) swiper.autoplay.stop();
        const x = swiper.getTranslate();
        swiper.setTransition(0);
        swiper.setTranslate(x);
        swiper.animating = false;
    };

    let popupOpen = false;

    // carry on drifting (not while the pointer rests on the strip or a popup is open)
    const resume = () => {
        if (!calm && !hovering && !popupOpen) swiper.autoplay.start();
    };

    // glide on to the nearest photo, then keep drifting
    const glideOn = () => {
        swiper.slideTo(swiper.activeIndex, drift / 2);
        swiper.once('transitionEnd', resume);
    };

    if (!calm) {
        wrap.addEventListener('mouseenter', () => { hovering = true; freeze(); });
        wrap.addEventListener('mouseleave', () => { hovering = false; glideOn(); });
        // hold still behind a popup — a moving page under the backdrop makes the popup shimmer on phones
        document.addEventListener('modal:open', () => { popupOpen = true; freeze(); });
        document.addEventListener('modal:close', () => { popupOpen = false; if (!hovering) glideOn(); });
    }
});

/* ==========================================================================
   Accommodation (course page) — room tabs + one photo viewer per room (main Swiper + thumbnail strip).
   A room's Swipers are made the first time it is shown (hidden panels can't be measured). Arrow keys move between tabs.
   ========================================================================== */

document.querySelectorAll('[data-rooms]').forEach((section) => {
    const tabs = [...section.querySelectorAll('[data-room-tab]')];
    const panels = [...section.querySelectorAll('[data-room-panel]')];
    const made = new Set();

    const build = (panel) => {
        if (made.has(panel)) return;
        made.add(panel);
        const main = panel.querySelector('.room-panel__main');
        if (!main) return; // room without photos ("Photos coming soon")
        const count = panel.querySelector('.room-panel__count strong');
        const thumbsEl = panel.querySelector('.room-panel__thumbs'); // only when the room has 2+ photos
        const thumbs = thumbsEl && new Swiper(thumbsEl, {
            slidesPerView: 'auto',
            spaceBetween: 10,
            freeMode: true,
            watchSlidesProgress: true,
        });
        new Swiper(main, {
            speed: 800,
            grabCursor: true,
            effect: 'fade',
            fadeEffect: { crossFade: true },
            keyboard: { enabled: true, onlyInViewport: true },
            navigation: { prevEl: panel.querySelector('.room-panel__prev'), nextEl: panel.querySelector('.room-panel__next') },
            ...(thumbs ? { thumbs: { swiper: thumbs } } : {}),
            on: { slideChange: (s) => { if (count) count.textContent = pad2(s.activeIndex + 1); } },
        });
    };

    const show = (i, focus = false) => {
        tabs.forEach((tab, n) => {
            const on = n === i;
            tab.classList.toggle('is-active', on);
            tab.setAttribute('aria-selected', on);
            tab.tabIndex = on ? 0 : -1;
        });
        panels.forEach((panel, n) => {
            const on = n === i;
            panel.hidden = !on;
            panel.classList.toggle('is-active', on);
        });
        build(panels[i]);
        if (focus) tabs[i].focus();
        // phones: keep the chosen pill in view in the sideways row
        tabs[i].scrollIntoView({ block: 'nearest', inline: 'center', behavior: 'smooth' });
    };

    tabs.forEach((tab, i) => {
        tab.addEventListener('click', () => show(i));
        tab.addEventListener('keydown', (ev) => {
            const keys = { ArrowDown: 1, ArrowRight: 1, ArrowUp: -1, ArrowLeft: -1 };
            if (!(ev.key in keys)) return;
            ev.preventDefault();
            show((i + keys[ev.key] + tabs.length) % tabs.length, true);
        });
    });

    build(panels[0]);

    // arrows at both ends of the pill row — only while the pills overflow; each click scrolls ~ one view
    const bar = section.querySelector('.rooms__tabbar');
    const row = section.querySelector('.rooms__tabs');
    const prev = section.querySelector('.rooms__scroll--prev');
    const next = section.querySelector('.rooms__scroll--next');
    if (!bar || !row || !prev || !next) return;

    const update = () => {
        const max = row.scrollWidth - row.clientWidth;
        const canPrev = row.scrollLeft > 2;
        const canNext = row.scrollLeft < max - 2;
        bar.classList.toggle('is-overflowing', max > 2);
        bar.classList.toggle('can-prev', canPrev);
        bar.classList.toggle('can-next', canNext);
        prev.disabled = !canPrev;
        next.disabled = !canNext;
    };
    const step = (dir) => row.scrollBy({ left: dir * row.clientWidth * 0.7, behavior: 'smooth' });

    prev.addEventListener('click', () => step(-1));
    next.addEventListener('click', () => step(1));
    row.addEventListener('scroll', update, { passive: true });
    new ResizeObserver(update).observe(row);
    update();
});

/* ==========================================================================
   Daily schedule timeline (course page) — the gold line fills down to the middle of the screen while scrolling and every
   row it has reached lights up (.is-on), the latest one glows (.is-current). With reduced motion the line is simply full.
   ========================================================================== */

document.querySelectorAll('[data-day-line]').forEach((wrap) => {
    const track = wrap.querySelector('.day-line__list') || wrap; // the line lives on the row list (below the column header)
    const items = [...wrap.querySelectorAll('.day-line__item')];
    const dots = items.map((item) => item.querySelector('.day-line__dot'));
    let queued = false;

    const update = () => {
        queued = false;
        const box = track.getBoundingClientRect();
        const mark = reduceMotion ? Infinity : window.innerHeight * 0.6; // "reading line" a bit below the middle
        track.style.setProperty('--fill', `${Math.max(0, Math.min(box.height, mark - box.top))}px`);
        let last = -1;
        dots.forEach((dot, i) => {
            const r = dot.getBoundingClientRect();
            const on = r.top + r.height / 2 <= mark;
            items[i].classList.toggle('is-on', on);
            if (on) last = i;
        });
        items.forEach((item, i) => item.classList.toggle('is-current', i === last && !reduceMotion));
    };
    const queue = () => {
        if (!queued) { queued = true; requestAnimationFrame(update); }
    };

    window.addEventListener('scroll', queue, { passive: true });
    window.addEventListener('resize', queue);
    update();
});

/* ==========================================================================
   Curriculum pillars (course page) — below 992px the 3 pillars become tabs, one list at a time (.is-tabbed hides the others;
   from 992px all three show side by side and the tabs are hidden by CSS). Arrow keys move between tabs.
   ========================================================================== */

document.querySelectorAll('[data-pillars]').forEach((wrap) => {
    const tabs = [...wrap.querySelectorAll('[data-pillar-tab]')];
    const cols = [...wrap.querySelectorAll('[data-pillar]')];
    if (tabs.length !== cols.length) return;

    const show = (i, focus = false) => {
        tabs.forEach((tab, n) => {
            tab.classList.toggle('is-active', n === i);
            tab.setAttribute('aria-selected', n === i);
            tab.tabIndex = n === i ? 0 : -1;
        });
        cols.forEach((col, n) => col.classList.toggle('is-active', n === i));
        if (focus) tabs[i].focus();
    };

    tabs.forEach((tab, i) => {
        tab.addEventListener('click', () => show(i));
        tab.addEventListener('keydown', (ev) => {
            const keys = { ArrowRight: 1, ArrowLeft: -1 };
            if (!(ev.key in keys)) return;
            ev.preventDefault();
            show((i + keys[ev.key] + tabs.length) % tabs.length, true);
        });
    });

    wrap.classList.add('is-tabbed');
    show(0);
});

/* ==========================================================================
   Round card slider (retreat page "Who it is for") — Swiper with the shared slider controls. 1.3 cards on phones,
   2.3 from 576px, 3.3 from 768px, 4 from 1200px.
   ========================================================================== */

document.querySelectorAll('[data-round-slider]').forEach((wrap) => {
    new Swiper(wrap.querySelector('.swiper'), {
        slidesPerView: 1.3,
        spaceBetween: 20,
        speed: 700,
        grabCursor: true,
        keyboard: { enabled: true, onlyInViewport: true },
        breakpoints: {
            576: { slidesPerView: 2.3, spaceBetween: 24 },
            768: { slidesPerView: 3.3, spaceBetween: 28 },
            1200: { slidesPerView: 4, spaceBetween: 28 },
        },
        // pagination dots between the arrows (user)
        pagination: { el: wrap.querySelector('.slider-controls__dots'), clickable: true },
        navigation: { prevEl: wrap.querySelector('.slider-controls__prev'), nextEl: wrap.querySelector('.slider-controls__next') },
    });
});
