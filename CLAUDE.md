# CLAUDE.md — Luxury Vinyasa

This file is auto-loaded at the start of every Claude Code session.
Purpose: carry context between sessions so a new session can continue where the last one stopped.

> **Rule for Claude:** At the end of every work block (or when the user says "update log" / "session khatam"),
> append a dated entry to the **Daily Log** below and update **Current Status** + **Next Steps**.
> Before starting work in a new session, read this file and [DESIGN.md](DESIGN.md) first.

---

## Project Overview

- **Name:** Luxury Vinyasa (website)
- **Stack:** PHP (XAMPP, local) + Bootstrap + SCSS + Swiper.js + vanilla JS
- **Local URL:** http://localhost/luxury-vinyasa/
- **Design rules:** see [DESIGN.md](DESIGN.md) — always follow it for colours, fonts, spacing and components.
  Key: royal blue + cream + amber gold accent, luxury/clean/modern, no boxy design or extra styling unless the user asks,
  only predefined colours + typography classes, no Font Awesome (custom SVG only).

## Folder Structure

```
luxury-vinyasa/
├── index.php              # Home page
├── about-us.php           # About page (page hero + story, founder, approach, campuses, trust, CTA)
├── 200-hour-yoga-teacher-training-in-bali.php  # Course page template (facts, curriculum, schedule, fees, FAQ ...)
├── yoga-retreat-in-bali.php                    # Retreat page (polaroids, postcards, tickets, luggage tag, route)
├── include/
│   ├── header.php         # <head>, nav — included on every page
│   ├── footer.php         # footer — included on every page
│   ├── css.php            # all <link> stylesheet tags
│   └── js.php             # all <script> tags
├── assets/
│   ├── css/
│   │   ├── bootstrap.css
│   │   ├── style.scss     # EDIT THIS (source)
│   │   └── style.css      # compiled output — do not edit by hand
│   ├── js/
│   │   ├── script.js      # custom JS
│   │   └── swiper.js      # Swiper library
│   └── images/
├── CLAUDE.md              # this file — project memory + daily log
└── DESIGN.md              # design system
```

## Conventions

- **All styling goes in `assets/css/style.scss` only.** No other CSS files, no inline styles, no `<style>` blocks.
- **Never compile SCSS and never edit `style.css` / `style.css.map`** — the user's "Watch Sass" VS Code extension
  compiles them automatically on save. Do not run `sass`, `npm` or any build command for CSS.
- **Buttons:** always `.theme-btn` (+ `--outline` / `--light` / `--sm` / `--block`) — see DESIGN.md "Buttons". No per-section button styling.
- **Write proper SCSS, not plain CSS** — variables, nesting, `&`, mixins, nested media queries.
  Full rules + file order: [DESIGN.md](DESIGN.md) section 12.
- Shared parts (header/footer/css/js) go in `include/` and are pulled in with `<?php include 'include/xyz.php'; ?>`.
- Images: WebP preferred, descriptive file names (`hero-rishikesh-sunrise.webp`), always add `alt`.
- Mobile-first; test at 375px, 768px, 1200px, 1440px.
- All asset/page URLs use `<?=$link?>` (defined in `include/css.php`: `/luxury-vinyasa/` on localhost, `/` live).
- New page → add a row to `$seo` in `include/css.php` (title, description, optional image/crumb/robots).
- `style.css` + `script.js` are linked with `?v=<filemtime>` (`$ver()` in css.php) so browsers never use a stale cached copy.
- `include/css.php` calls `session_start()` and defines `$link`, so it must be included at the very top of every
  page, before any HTML output, and before `header.php` / `js.php`.

---

## Current Status

- DESIGN.md: royal blue `#03256F` + cream + amber gold accent, **Raleway** (headings, since 2026-10-31; was GFS Didot) / Lato / Parisienne.
- Logo: `assets/images/logo.webp` (400×117, royal blue; white version = CSS `filter: brightness(0) invert(1)`). User wants the **webp**, not the SVG (`logo.svg` exists, unused). Banner video: `assets/video/banner-vid.mp4` (7.6 MB).
- Libraries (local): Bootstrap 5.3.8, Swiper 14.3.0, Lenis 1.3.27 — order bootstrap → swiper → lenis → own style/script.
- `style.scss` sections done: 1 Variables · 2 Functions & Mixins · 3 Base/Reset · 4 Lenis · 5 Typography classes ·
  6 Helpers (`.container` 1350px, `.section-space`, `.clr-*`) · 7 Buttons (`.theme-btn` + modifiers, `.link-line`) ·
  9 Header · 10 Home Banner. (8 Loader, Sliders, Footer still to do.)
- Built: `include/header.php`, `index.php` (header + home banner), header JS in `script.js`.
- `footer.php` still empty. Nav links + CTA are `#` placeholders; banner copy is placeholder.

## Next Steps

1. Page loader (SVG lotus, amber-gold centre) — `style.scss` section 8 + markup + JS.
3. Next home page sections in `index.php` (Welcome, Courses, Why Us, Achievements, Testimonials, Social done). Next section = **section-bg**.
4. Compress banner video (~2–3 MB) + add a `poster` image.

## Open Questions

- Contact form needs a backend (PHP mail / SMTP / form service) — which one?

- ⚠ BEFORE LAUNCH: replace the 8 sample testimonials with real Google / Trustpilot / Tripadvisor reviews (with permission) + add profile links.

- Which pages does the site need (Home, About, Courses, Retreats, Contact, ...)?
- Social profile URLs: Instagram, Facebook, YouTube, X (all `#`). Yoga Alliance profile = set (2026-10-31, in `$social`). WhatsApp: keep Rishikesh number or use Bali?
- Banner video looks like the **Rishikesh** campus (Ganges, temple) while banner says "in Bali" — Bali footage, or change text?
- Live site contradicts itself: 5,000+ students (home/about) vs 3,000+ graduates (Rishikesh hub). Banner uses 5,000+ — owner should confirm.
- Final SEO title/description for home page (`$seo` in `include/css.php`); favicon + OG images still to add.

---

## Daily Log

<!-- Newest entry on top. Format:
### YYYY-MM-DD
- What was done
- Files changed
- Decisions taken
- Pending / blocked
-->

### 2026-10-30
- Reviewed project: folder structure exists, every file is empty (0 bytes).
- Created `CLAUDE.md` (project memory + daily log) and `DESIGN.md` (design system draft).
- User added logo + heading/body/accent fonts (GFS Didot, Lato, Parisienne) in `style.scss`.
- Rewrote DESIGN.md to v2 per user rules: royal blue (`#03256F`, sampled from logo) + cream theme,
  minimal colours, no boxy design, container 1350px, custom header/footer (no Bootstrap),
  custom slider design, SVG lotus loader (no Font Awesome), Lenis smooth scroll, predefined typography classes.
- Added Bootstrap 5.3.8 + Swiper 14.3.0 (CSS + JS, minified, local files) and linked them in `css.php` / `js.php`.
- User added PHP setup at top of `css.php` (session_start, `$link` base URL, `$fullurl`). Fixed missing `?>`;
  `js.php` now also uses `<?=$link?>` paths.
- User pasted a `css.php` from an old project (Prasadam cafe). Cleaned it: removed Prasadam SEO pages,
  `social.php` / `schema.php` includes, favicon + manifest links, Font Awesome CDN, `header-footer.css`,
  Twitter-handle TODO, `X-UA-Compatible`. Kept the `$seo` per-page system (only `index.php`, placeholder
  text — TODO), `theme-color` → `#03256F`, OG/Twitter image tags print only when a page has an `image`.
- Rule from user: all styling only in `style.scss`; Watch Sass extension compiles it — Claude never compiles
  or touches `style.css`.
- Rule from user: write real SCSS (nesting, variables, mixins), not CSS-style code. Added DESIGN.md section 12.
- `style.scss`: added section 1 Variables (colours, `$colors` map, `$breakpoints` map, `$ease`/`$duration`),
  section 2 Mixins (`respond(md)` / `respond(lg-down)`, `transition(props...)`), section 3 Base/Reset
  (`:root` CSS vars from map, box-sizing, body = Lato 300 / 16→17px / lh 1.8 / `$text` on `$cream`,
  headings = Didot 400 royal blue, margin/list resets, img/svg block, form inherit, focus-visible,
  ::selection, reduced-motion). Uses `@use "sass:map"` / `"sass:math"` / `"sass:string"` (extension = glenn2223 Live Sass v6, Dart Sass).
- Body font-size uses clamp via new SCSS functions `fluid($min, $max)` (375px → 1350px screen), `rem()`, `round4()`.
  Use `fluid()` for all responsive font sizes from now on.
- Smooth scroll: added Lenis 1.3.27 (`assets/js/lenis.js`, linked in `js.php` before `script.js`).
  Init in `script.js` (duration 1.2, anchors: true, autoRaf; skipped for reduced-motion; instance on `window.lenis`).
  Lenis's required CSS put into `style.scss` section 4 (no separate CSS file); `html { scroll-behavior: auto }`
  overrides Bootstrap's smooth scroll which conflicts with Lenis.
- User asked for amber gold in the UI: replaced `$gold #B89B5E` with `$amber-gold #C9952B`, `$amber-gold-dark #8C6210`
  (gold text on cream, AA), `$amber-gold-light #E0B04A` (hover on blue). DESIGN.md: theme = royal blue + cream +
  amber gold accent (~10%) — sub-headings, lines, icons, hover underlines, slider marks, loader centre.
- Built header + home banner from user's reference image (photo + cream band + centre circle):
  - `style.scss`: typography classes (`type()` mixin), `.container`, `.section-space`, `.clr-*` helpers (renamed from
    `.text-*` — Bootstrap's `.text-*` use !important), buttons (`%btn-base` placeholder), header, home banner.
  - Header: desktop transparent + white logo (`filter`) → cream on scroll; mobile always cream + SVG hamburger →
    full-screen cream menu (Lenis stopped while open, Esc / link click closes).
  - Banner: video bg + overlay; cream band vertical on mobile, horizontal ≥992px (`grid-template-rows: 100%` so the
    circle overflows the band); same video in circle at scale 1.25.
  - Checked with headless Chrome at 1440 / 1024 / 390 using a scratchpad-compiled CSS copy (project `style.css`
    is compiled by the user's Watch Sass on save).
- User asked: removed `box-shadow` (thin gold ring) from `.home-banner__circle` — circle has only the cream border now.
- Banner bg video blurred (`blur(6px)` + `scale(1.06)`, `overflow: hidden` on `__bg`). Band made bigger:
  desktop height `clamp(320px, 28vw, 420px)`, mobile width `min(78vw, 460px)`; circle grown to keep breaking out
  (desktop `clamp(360px, 36vw, 540px)`, mobile `min(88vw, 440px)`).
- User renamed `$accent-font` → `$spacial-font` in `style.scss`; updated all uses + DESIGN.md.
- Banner left: "Welcome to" in `.accent-text` (Parisienne) + h1 "Vinyasa Yoga Academy" / "in Bali" (own line).
  Banner right: para + stats (15+ / 5000+ / 4.9 — PLACEHOLDER numbers, need real ones) + social icons; button removed.
- New `include/social.php` (required in `css.php`): `$social` URLs (all `#` — TODO), SVG icons, `social_links()`.
  `.social-links` component in `style.scss` (end of section 7). Mobile banner inner now `justify-content: center`.
- Banner heading: left-aligned on desktop (was right), always 2 rows "Vinyasa Yoga" / "Academy in Bali" via two
  nowrap block spans; desktop size `fluid(28px, 40px, 992px, 1400px)` (fluid() accepts custom screen range).
  Checked 1920 / 1366 / 1024 / 390.
- Banner made richer (user: "boring"): gold double-rule inside band, rotating SVG text badge with lotus on the
  circle edge (`.home-banner__visual` wraps circle + badge), "Explore Courses →" `.link-line` on the left,
  entrance animations (clip-path circle reveal, staggered fade-up), stats count-up JS (`data-count`, `data-suffix`,
  `data-decimals`). `.link-line` globally restyled (small uppercase + arrow).
- Heading moved from `<h1>` to `<span class="main-heading">` at user's request, size up to 46px. ⚠ Page now has
  NO h1 — needs one somewhere on the home page for SEO.
- Right side improved: "Residential Training" sub-heading, stats between hairlines with gold "+" `<em>`,
  "Follow us" row with `social_links('social-links--ring')` (new `.social-links--ring` modifier).
- Desktop band is now `min-height` + padding (grows with content); circle uses `--orb` + negative `margin-block`
  so it never adds row height and always breaks out. Circle 520px max, grid gap `fluid(24px, 32px)`.
- Screenshot tip: preview copy injects `animation:none` so headless shots show the final state.
- **Welcome / About section** built after banner (`.welcome`, style.scss section 11): arch photo + overlapping round photo,
  h1.section-heading "Yoga teacher training in Ubud, rooted in Rishikesh" (= page h1, fixes missing h1),
  2 paras, 4 facts, founder signature + "Read Our Story" link. Copy uses ONLY facts from the
  vinyasa-yoga-content skill (verified-facts.md): founded 2010 Rishikesh, founder Yogi Vishnu Panigrahi
  (E-RYT 500, 30+ yrs), RYS 200/300/500 Yoga Alliance USA ("registered", never "certified"), 100+ countries, 2 campuses.
- Banner Google rating corrected 4.9 → **4.8** (verified: Google 4.8, 200+ reviews). 15+ years and 5,000+ students match the live site.
- Welcome images: user added `overview-img-1.webp` + `overview-img-2.webp` (Ubud shala). Temp video-frame images deleted.
  Media redesigned: two overlapping arches + gold arch outline + vertical "UBUD · BALI" tag, hover zoom.
- Mobile header changed (user): hamburger left, logo centred, glowing "Contact Us" pill right (`.header-contact`,
  mobile only, href `#` — TODO contact page). Header inner is a grid on mobile, flex on desktop.
- Then (user): on mobile the logo moved OUT of the header into the banner band, centred above "Welcome to"
  (`.home-banner__logo`, hidden ≥992px). Header logo on mobile is hidden at the top and fades in after scroll / menu open.
- Welcome photos: removed the offset gold arch outline (user: looked bad). Now a `$cream-dark` tonal arch behind both
  photos + a cream hairline inside each arch (`&::after`, inset 12px).
- New reusable class `.arch-img` (+ `--ring`, `--no-line`) and `$arch-radius` variable (style.scss, end of section 7).
  Welcome photos now use it; `.welcome__arch` only positions them.
- Social links: added X, WhatsApp (`wa.me/918755744872` = the number the live site lists as WhatsApp, Rishikesh)
  and Yoga Alliance (custom "YA" ring icon). Banner "Follow us" label now sits above the 6 ring icons (36px, wrap).
- Mobile banner fixes (320–412px): band 84vw, inner padding 28px, heading capped to band width, stats 3 equal
  columns, 6 icons centred in one row (`clamp(30px, 9vw, 36px)`).
- Cloudflare quick tunnel attempt: `include/css.php` now honours `X-Forwarded-Proto: https` and treats
  `*.trycloudflare.com` like localhost (base path `/luxury-vinyasa/`). Tunnel returned 403 because
  `C:/xampp/htdocs/.htaccess` (tunnel guard from another project) only allows `/shivshankar/` over the tunnel.
  Editing it was blocked by permissions → user must decide; tunnel stopped (it was exposing /shivshankar/).
  Command: `"C:/Program Files (x86)/cloudflared/cloudflared" tunnel --no-autoupdate --url http://localhost:80`
- User approved: `htdocs/.htaccess` guard now allows `/(shivshankar|luxury-vinyasa)/` over the tunnel (user's manual edit broke
  the file → all local sites 500; Claude restored the full guard). Tunnel live: quick-tunnel URL changes every restart.
  Verified: page/CSS/images/video 200, other projects + htdocs root still 403.
- **Courses section** built after Welcome (`.courses`, `.course-card`, style.scss section 12): 200hr / 300hr / Retreat in Ubud,
  arch cards with tags, price + link, middle card stepped down on desktop, scroll-snap swipe row on mobile/tablet.
  Facts from the skill (Bali 200hr 20 days from $1,299; 300hr 25 days from $1,490; retreat price unpublished).
  TODO: real Bali course photos (temp-course-*.webp = video frames), course page links, re-check prices on live site.
- Course cards made more modern/luxury (user): `$courses` PHP array + foreach; editorial "01 —— 20 DAYS · UBUD" row,
  frosted tag, hover shade + rising "Explore →" circle, title underline draw, new reusable `.circle-btn` (buttons section).
- Then user rejected the card design → **Courses v2**: royal-blue editorial showcase. Desktop: photo panel (crossfade) +
  numbered course list (hover/focus activates row, JS `[data-courses]` in script.js). Mobile: list with photo per row.
  Old `.course-card` SCSS removed. New `.circle-btn--light`.
- User: courses background → off-white. New helpers: `.section-bg` (`$off-white #FFFDFA`, added to palette + `$colors` map)
  and `.spacing` (padding 80px 0, mobile <768px 60px 0). Courses = `section-bg spacing`, re-themed light.
- User rejected the editorial list too → **Courses v3 = real cards** (white, border, 4:3 photo with frame, tag, round
  "20 DAYS" badge, meta, title, text, price + circle-btn; hover lift + soft shadow + gold border). 3 cols desktop,
  scroll-snap swipe on mobile. `days` added to `$courses`. Showcase JS removed from script.js.
- Course photos replaced with user images (200-hour-ttc, 300-hour-ttc, yoga-retreat-img); temp-course-* deleted.
  New `focus` key + `.is-focus-mid/-low` classes for portrait crops. Note: `assets/images/home/` has 2 JPGs
  (IMG_0674, IMG_0675 — 1 MB) not used yet.
- User wanted a more modern card → **Courses v4 = overlay cards**: whole card is the photo + link, tag & days pills on top,
  frosted royal-blue glass panel at the bottom (meta, title, description opens on hover ≥992px, price + circle-btn--light).
- **Why Us section** (`.why`, style.scss section 13): 3 points · arch photo with Google 4.8 rating pill · 3 points; icons in gold
  rings. New `include/icons.php` (`icon($name)`, required in css.php). Photo `why-dining.webp` = webp copy of
  `home/IMG_0674.jpg` (originals kept). All 6 points are verified facts (no "best" claims).
- Why Us now 8 points (user asked for halls + rooms): "Luxurious Yoga Shala" + "Elegant Rooms", new `shala` / `bed` icons.
  ⚠ Bali room types + meals NOT verified (site states them for Rishikesh) — confirm with the school.
- User: wanted the **arch cards (v1)** back → courses section restored to v1 design (arch photo, tag, meta, title, text,
  price + link-line, middle card stepped down) on `section-bg spacing`, with the new photos. This is the FINAL courses design.
- Why Us redesigned (user: not good) → **v2 royal-blue band**: sticky intro + framed photo with rating pill (left),
  2-column hairline feature grid with gold icons + 01–08 numbers (right). Section 13 SCSS replaced.
- User: no blue background → Why Us now `section-bg spacing` with light colours. ⚠ Courses + Why Us are both off-white and
  sit next to each other (no visual break) — user asked for it; consider cream for one of them if it looks flat.
- User preference: no royal-blue section backgrounds (rejected twice: courses v2, why v2).
- **Backgrounds rule (user):** page/body + header = `$white`; `.section-bg` = `$cream` #FBF8F1; sections alternate
  white ↔ section-bg. Then user flipped it: **Welcome section-bg, Courses white, Why section-bg, NEXT section = white.**
  `$off-white` removed. `.arch-img--ring` border = `var(--section-color)` (white by default, cream inside `.section-bg`).
- Courses on mobile/tablet: CSS scroll-snap replaced by **Swiper** (custom count + progress line + arrows; destroyed ≥992px).
  User: show only 1 full card on mobile (no peek) → slidesPerView 1, ≥576px 2.
- Body font (user): `font-size: clamp(15px, 1.4vw, 16px)`, `font-weight: 400` (was fluid 16–17px / 300). `.para` still 300 / 16–17px.
- **Achievements section** (`.achievements`, style.scss section 14, white): logo watermark (user; was lotus), 4 count-up stats (15+, 5,000+, 100+, 2),
  ratings strip (Google 4.8, TripAdvisor 4.9, Tripaneer 4.9, Yoga Alliance 4.4 — each with its own count). Count-up now
  formats thousands; banner shows "5,000+".
- Achievements mobile fix: ratings 2×2 stacked/centred cells (was 4 stacked rows), review count on own line, watermark higher.
- Ratings: Tripaneer removed (user thought it duplicated TripAdvisor) → Google, TripAdvisor, Yoga Alliance; 3 cols desktop,
  mobile Google full-width row + 2 below.
- New reusable `.slider-controls` (moved out of courses) + `controlOptions(wrap)` helper in script.js.
- **Testimonials section** (`.testimonials`, style.scss section 15, section-bg): Google summary card + stacked review cards
  (Swiper cards effect, autoplay). ⚠ **4 SAMPLE reviews (Laura M., Sophie K., Emma R., Julia S.) are invented placeholders the user
  asked for — MUST be replaced with real Google reviews before launch.** Google reviews link = `#` (TODO).
- Testimonials v2 (user): **tabs for Google / Trustpilot / Tripadvisor**, each panel themed in the platform's brand colours with
  its own logo + rating style (stars / boxes / bubbles). New helpers in include/icons.php: `brand_icon()`, `rating_marks()`.
  Data = `$platforms` in index.php. 8 SAMPLE reviews in total (3 Google, 2 Trustpilot, 3 Tripadvisor) — replace before launch.
- Review tabs → **pills** in one row (user): logo chip · name · score; active = white + brand border/score. Review counts now only in the panel summary.
- Testimonials layout (user): title + pills centred on top; below = arch photo left (desktop only, `testimonials-img.webp`
  from `home/IMG_0675.jpg`) + review panel right.
- **Social section** (`.social`, style.scss section 16, white): photo mosaic with a cream "Follow us on Instagram" card +
  6 account cards from `$social` (social.php). Only WhatsApp has a real URL — the rest are `#`.
- Social v2 (user): **Instagram / YouTube / Facebook platform cards** themed like each platform (photo grid / play button /
  cover, brand-colour buttons) + "Also find us on" ring icons for X, WhatsApp, Yoga Alliance. Mosaic + 6 small cards removed.
- User preferred the 6 small cards → **Social restored to mosaic + 6 account cards, now in brand colours**
  (`.social-card.brand--{key}`, `$social-brands` in section 16). Platform cards (v2) removed. YA colour = royal blue (unverified).
- Then (user): Yoga Alliance card removed from Social; account cards made **non-boxy** — brand icon + halo ring, name,
  brand label, hairline dividers on desktop; hover lift + underline.
- **Footer built** (`include/footer.php`, style.scss section 17): royal blue, CTA band + 4 columns (brand / courses / explore /
  Bali contact) + bottom bar with legal links + back-to-top (JS in script.js). Logo made white with a CSS filter.
  Home page sections are now complete; remaining: page loader, real links/pages, real reviews.
- Footer recoloured (user: blue too harsh) → soft `$cream-dark` background, royal-blue text/buttons, gold accents, normal logo.
  Footer link rule uses `:where(a)` so button colours win. **User dislikes royal-blue backgrounds everywhere — avoid them.**
- **Contact section** (`.contact`, style.scss section 18, section-bg, before footer): form card overlapping a toned Google Map,
  location card, floating-label fields, contact strip (phone / WhatsApp / email / address). ⚠ Form has NO backend (`action="#"`).
- **Gallery section** (`.gallery`, style.scss section 19, section-bg) inserted before Contact: editorial 4×6 grid + custom cream
  lightbox (script.js, keys + focus handling). Contact switched to white (alternation) with a cream form card.
- Gallery v2 (user: grid not good enough) → **arch photo Swiper slider** with wave offset, captions under photos, controls in the
  head; lightbox kept.
- User: old grid was much better → **gallery reverted to the grid** (full-height portrait + 3-col panorama). Slider JS/SCSS removed.
  Then: no text on gallery photos (captions removed; lightbox reads data-label / data-title).
  Lesson: this user often prefers the first version — keep it easy to revert (small focused changes).
- **Footer v2** (2026-10-31, user: "too simple", wants SVG / modern clean): centred CTA over a slow-turning gold line mandala SVG,
  lotus mark, para + 2 buttons (Enquire filled / WhatsApp outline), lotus divider, "Back to top" label, huge outlined "VINYASA"
  wordmark cut at the bottom. Still `$cream-dark`.
- Footer v3 (user: "simple clean but unique"): mandala + lotus mark removed; CTA = title left · para + 2 buttons right.
  Then user removed the CTA completely and the VINYASA wordmark → footer = lotus divider on top · 4 columns · bottom bar.
- Back-to-top moved out of the footer bar → floating fixed button bottom-right (`.back-to-top`) with a gold scroll-progress ring, shows after 400px.
- **FAQ section** (`.faq`, style.scss section 20, white, between Gallery and Contact): sticky intro + native `<details name="faq">` accordion,
  8 Q&As from verified facts + FAQPage JSON-LD. Contact switched to `section-bg` (form card now white) to keep the alternation.
- FAQ v2 (user wanted a different UI, picked option 1 of 3): question list left + cream answer panel with arch photo right (desktop),
  accordion on mobile; one markup, `[data-faq]` JS. Old `<details>` version replaced.
- Banner (user): mobile order now logo → video circle → welcome text → rest (logo moved out of the left content block);
  banner side padding added (desktop `fluid(24px, 64px, 992px, 1400px)`, mobile 28 → 32px).
- Mobile banner: blurred bg video inset 12px left/right (`.home-banner__bg { inset: 0 12px }` <992px) → white space shows at the sides.
- Thin line under the mobile banner = sub-pixel seam (fractional banner height, video layer rounds differently). Fix: `.home-banner + section { position: relative; margin-top: -1px }`.
- Mobile footer bottom bar padding-bottom 96px → 10px (user).
- **About page** (`about-us.php`, style.scss sections 21 Page Hero + 22 About): reusable `.page-hero` (blurred video, breadcrumb, h1),
  story + facts, founder (monogram placeholder — need a real photo), 4 pillars, 2 campuses (Rishikesh video / Ubud photo),
  Yoga Alliance registration + ratings, CTA. `$seo['about-us.php']` added. Header nav now from `$nav_links` with active state;
  mobile logo-hiding only on home (`.site-header--home`). Links wired: footer About Us, Welcome 'Read Our Story', header Enquire/Contact → home #contact.
- Page hero v2 (user): photo (not video) + cream card overlapping the photo's bottom-left. New `about-hero.webp` (cropped from IMG_0675 with sharp
  in the scratchpad — PHP has no GD here). Founder photo `guruji.webp` (user) replaced the VP monogram.
- About Trust section v2 (user: looked off): 3 RYS level columns (200 Foundation · 300 Advanced · 500 Complete path, each with RYT eligibility) + one ratings line.
- User added `assets/images/about-us/` (banner-img.webp → page hero, img-1.webp sunset → story side arch). Temp `about-hero.webp` crop deleted.
- **Course page** `200-hour-yoga-teacher-training-in-bali.php` (style.scss section 23): hero card with button + price, facts strip, overview, 12-subject curriculum,
  timeline schedule, 4 room fees + monthly batches, included/not included, 3 teachers, good to know, FAQ (reused), CTA. Content from the live Bali page.
  Linked from header Courses (active), home 200hr card, footer. ⚠ Live page: address Jl. Bisma vs Jl. Raya Andong, 30 vs 15 days reschedule — owner to confirm.
  Need: course banner photo, photos of Yogi Yansa Ji + Yogi Shakti Ji.
  User: there is NO written exam — only the practical asana test (live page is wrong). Removed from course page.
- Course quick facts moved into the hero (beside the card ≥1200, under it below) as a 2×3 icon list — old 6-box strip removed (user).
- Course Overview v2 (user): centred text + edge-to-edge row of 5 arch photos (wave heights, swipe on mobile). Round '200 hours' badge removed.
- Course Curriculum v2 (user picked option 2 of 3): subjects grouped in 3 pillars — Practice (6) · Knowledge (4) · Teaching (4). Old 12-cell grid + .subject removed.
- Course photo row on mobile (user: looked broken — cut-off 2nd photo): now Swiper, 1 full photo / 2 from 576px + slider controls. JS hook renamed
  `[data-courses-slider]` → `[data-mobile-slider]` (shared by home courses + course photo row).
- Course photo row: controls removed + always 1 photo below 992px (user) → `data-mobile-slider="single"` (JS skips the 576px 2-up breakpoint).
- "Sliders not working" (user) = browser cached the old script.js (hook was renamed). Fix: `$ver()` cache-busting on style.css + script.js.
- Curriculum subjects are now clickable (user): each opens a popup (`<dialog class="modal">`, reusable) — centred on desktop, bottom sheet on mobile.
  Each subject has `detail` + `items` (key topics) from the live course page.
- Daily schedule v2 (user picked "clock cards"): arch session cards in a Swiper row + meal dividers + note pills. Old timeline removed. Icons added: moon, book, wind, bowl, body.
- Daily schedule v4 (user): one centred round SVG watch with the schedule written around the dial, glowing active entry + turning gold hand,
  centre readout, auto-steps until touched. (Tried in between: 24h arc dial + list — user wanted the schedule ON the watch.)
- Room fee cards v2 (user): cream arch cards with occupancy dots (new `person` icon), note pill, big price, full-width "Book Now" button.
- Fee cards: person dots → top-down room plan SVG with beds (`$room_svg()`); gold frame closed at the bottom; Book Now gets the gold hover underline.
  ⚠ Private room bed type is not verified — drawn as one bed, never call it a double bed. `person` icon removed (unused).
  Lesson: user's VS Code saved a stale buffer over style.scss once (fee v2 lost) — tell user to 'File: Revert File' before Ctrl+S.
- New reusable `.theme-btn` (+ --outline, --light, --sm, --block) replaced .btn-royal, .btn-outline, .fee__btn, .batch__btn everywhere (user).
- Inclusions v2 (user picked "ticket"): two boarding-pass cards with stamps, perforated tear line, stub + barcode. Room cards on phones: one wide horizontal card per row (user).
- Daily schedule: tilted photo collages left + right of the watch (≥1200px) to fill the empty sides (user).
- **Retreat page** `yoga-retreat-in-bali.php` (style.scss section 24, user wanted a "chill" travel UI): polaroid durations, 5-day box, gentle rhythm,
  postcards with stamps, tickets (reused), stay cards, luggage-tag packing list, dotted booking route, FAQ, CTA. Linked from header Retreats, footer, home card.
  Only 5-day price is published (USD 699 private room). Hero = `assets/images/retreat/retreat-banner.webp` (crop of IMG_0675).
- Retreat polaroids v2 (user: "much more peaceful"): cream cards, ±1° tilt, softer shadow, film-tone photos, quiet pill tags, slow hover.
- Logo switched to `logo.svg` (user) in header, footer, home banner, achievements watermark. SVG was black → fill changed to #03256F in the file
- Then user: keep the logo as **webp**, not SVG → all 4 places back to `logo.webp`.
  (exact colour; a CSS filter can only approximate it). Original black copy kept in the scratchpad only.
- Retreat Explore cards v2 (user picked "photo postcards"): photo + stamp + postmark, redrawn detailed icons + new frangipani `flower` icon.
- Course page hero (user): cream card removed → only breadcrumb + h1 centred on the photo (new reusable `.page-hero--overlay`); script line, text,
  "See Dates & Fees" button + "From $1,299" removed from the hero; quick facts now a strip under the photo (6 in a row ≥1200).
- **All inner page heroes (About, Course, Retreat) now `.page-hero--overlay`** (user): only breadcrumb + h1 on the photo. Old card styles
  (`.page-hero__inner/__card/__text`, `.retreat-chips`) are unused but kept in style.scss for an easy revert.
- About page now uses the user's new `about-us/` photos: banner-img (campus front, 1920×935 — also the course page hero), story arches
  img-2 (stone relief lounge) + img-4 (entrance), Ubud campus card back-view. `image-3.webp` (marble hall) and `img-1.webp` not used yet.
- About Campuses: Rishikesh card video → photo (user). `about-us/rishikesh-campus.webp` = rooftop-class frame (8.2s) from banner-vid.mp4,
  810×1080 — TODO real Rishikesh photo.
- Home page now uses the user's new `assets/images/home/` photos (IMG_0674/0675 jpgs are gone): Why Us photo = img3 (dining pavilion),
  Testimonials arch = img2 (pool), FAQ panel arch = img (Ganesha relief), Gallery small tile 4 = img1 (dining hall), Social mosaic 3rd = img4.
  `why-dining.webp` is now unused. Then Welcome arches (user): main = home/img4, side = about-us/image-3 (marble hall);
  Social mosaic 3rd photo → about-us/img-2 (so img4 isn't shown twice).
- Count-up jitter fixed (user): `%stat-number` uses `tabular-nums`, and `countUp()` in script.js locks each number's min-width to its
  final width while counting (removed at the end).
- **Site focus = Bali (user).** About Campuses: Rishikesh card removed → single Ubud campus ("Your home in Ubud, Bali"), arch photo left ·
  details right ≥992 (`.campus` grid 5fr 6fr). `about-us/rishikesh-campus.webp` now unused. Story/founder/trust still mention Rishikesh (history, RYS 500).
- Heading font (user): GFS Didot → **Raleway** site-wide (`$heading-font` + Google Fonts import, 300–600), body gets `lining-nums`;
  YA icon text in social.php also Raleway.
- Course Overview photo row v3 (user, reference sketch): arches → rounded rectangles in a rising arc (centre biggest + highest, outer pairs
  smaller + lower). Then v3.1 (user: "better"): gentler arc, fan tilt ±2°/±4°, soft shadows, muted side photos, fan-out reveal. Also removed a stray `</div>` after the gallery that closed the overview section early.
- Room fee cards v3 (user: show the rooms): room photo in the arch top + room-plan medallion on its edge.
  Then **v4 (user)**: cards back to v2; section split — cards 2×2 + batches left (container edge), sticky room photo panel right running to the
  screen edge; hovering a card / clicking a tab switches the photo (`[data-room-view]` JS). <1200 the panel sits on top, full width.
  v4.1 (user: "fix the UI"): equal columns, batches moved full width below, photo exactly as tall as the 2×2 cards, room tabs float top-right on the photo.
  ⚠ Photos are campus placeholders — need real photos of the 6-sharing / 4-sharing / 2-sharing / private rooms (`assets/images/rooms/`).
- New shared SCSS: `%stat-number` / `%stat-label` (banner stats + welcome facts), scroll reveal (`data-reveal` +
  `.js-reveal`, IntersectionObserver in script.js).
