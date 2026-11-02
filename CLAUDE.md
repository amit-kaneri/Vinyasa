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

_Last updated: 2026-11-02_

- DESIGN.md: royal blue `#03256F` + cream + amber gold accent, **Raleway** (headings, since 2026-10-31; was GFS Didot) / Lato / Parisienne.
- Logo: `assets/images/logo.webp` (400×117, royal blue; white version = CSS `filter: brightness(0) invert(1)`). User wants the **webp**, not the SVG (`logo.svg` exists, unused). Banner video: `assets/video/banner-vid.mp4` (7.6 MB).
- Libraries (local): Bootstrap 5.3.8, Swiper 14.3.0, Lenis 1.3.27 — order bootstrap → swiper → lenis → own style/script.
- **Pages built:** `index.php` (banner, welcome, courses, why us, achievements, testimonials, social, gallery, FAQ, contact) · `about-us.php` ·
  (course page order: hero + facts bar · overview · curriculum · **highlights** · **accommodation** · daily schedule (timeline) · dates · inclusions · teachers · good to know · FAQ · CTA) ·
  `200-hour-yoga-teacher-training-in-bali.php` (course template) · `yoga-retreat-in-bali.php`. Header + footer + floating back-to-top done.
- `style.scss` has 24 sections (page loader section 8 still empty). Shared parts: `include/icons.php` (`icon()`, `feature_icon()`, `brand_icon()`),
  `include/social.php`, reusable `.theme-btn`, `.arch-img`, `.circle-btn`, `.slider-controls`, `.modal`, `.page-hero--overlay`, `data-reveal`.
- **Rooms:** only **Private** (USD 2,299) and **Twin Sharing** (USD 1,699) — no 4/6-sharing. 200hr "from" price = **$1,699**.
- **Accommodation section:** 9 room types (all with photos), photos from `assets/images/acc/<folder>/`. Recommended / best value = **Ashva One Bedroom Suite** (first tab) · Premium = **Ashva One Bedroom with Terrace Pool** (second tab).
- **200hr Bali = 15 days** (batches 1st → 15th monthly). Course page `#fees` section = "Choose your month" + compact calendar batch tiles only (room fees + accommodation slider removed; acc photos kept in `assets/images/acc/`).
- ⚠ Claude's SCSS edits don't trigger Watch Sass — the user must open `style.scss` and press Ctrl+S after each change ("File: Revert File" first if it shows ●).

## Next Steps

1. Page loader (SVG lotus, amber-gold centre) — `style.scss` section 8 + markup + JS.
2. Compress banner video (~2–3 MB) + add a `poster` image.
3. Remaining pages: 300-hour course, Contact, legal pages (Privacy, Terms, Refund); wire up all `#` links.
4. Real photos still needed: course banner, teachers (Yogi Yansa Ji, Yogi Shakti Ji), retreat postcards (temple / rice field / beach).
5. Before launch: real reviews, social URLs, contact-form backend, favicon + OG images.

## Open Questions

- Contact form needs a backend (PHP mail / SMTP / form service) — which one?

- ⚠ BEFORE LAUNCH: replace the 8 sample testimonials with real Google / Trustpilot / Tripadvisor reviews (with permission) + add profile links.

- Room prices: confirm Twin Sharing USD 1,699 / Private USD 2,299. 300hr shows "from $1,490" — cheaper than the 200hr ($1,699)? Confirm.
- 200 hours in 15 days (user, 2026-11-02) — the daily schedule on the course page still shows the old timetable; check it fits 15 days.
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

### 2026-11-02
- Home page photos updated to the user's new `assets/images/home/` files: Welcome arches = `intro-img-1` (fire ceremony) + `intro-img-2` (marble hall),
  Courses 200hr / 300hr cards = `home/200-hour-ttc` / `home/300-hour-ttc` (asana class photos, 600×900), Why Us = `why-choose`.
  Old root `200-hour-ttc.webp` / `300-hour-ttc.webp` (graduation photos) are still used in Social + Gallery. `home/img3`, `home/img4` now unused.
- Why Us icons upgraded (user: wanted more attractive SVGs): new `feature_icon()` in include/icons.php — detailed duotone 48×48 icons
  (badge, mountain, shala, lotus, sprout, bed, globe, certificate; classes .ft tone / .fa accent line / .fd accent fill / .fw bg fill).
  `.why-item__icon` = 68px white disc, royal-blue lines, gold accents, dashed gold halo that turns on hover. Old `icon()` set unchanged (other pages).
  "Earned, Not Bought" icon calendar → certificate.
- About page: **Trust / "Registered with Yoga Alliance" section removed** (user) + `$rys_levels` / `$about_ratings` arrays.
  CTA switched to white (Campuses before it is section-bg). `.trust` / `.rys-level` SCSS still in style.scss (unused, easy revert).
- Why Us icons bigger + bolder (user): disc 68 → 84px, icon 38 → 52px, `feature_icon()` stroke-width 1.3 → 1.7.
- Course page (user): **quick facts moved ONTO the banner photo** — ≥992 frosted royal-blue glass bar along the photo's bottom (`.course-facts-bar`,
  white text, light-gold icons that fill on hover, hairline dividers; 6 in a row ≥1200, 3×2 at 992–1199), hero photo taller (`clamp(560px, 82vh, 760px)`),
  h1 centred above the bar. <992 unchanged (strip under the photo).
- ⚠ Claude's edits to style.scss do NOT trigger Watch Sass (it compiles only on save in VS Code) → after each SCSS change the user must
  open style.scss and press Ctrl+S (if VS Code shows it as modified, "File: Revert File" first so the stale buffer doesn't overwrite the changes).
- Popup jitter on mobile fixed (user): `.modal` height 100dvh + `touch-action: none` + `overscroll-behavior: contain`; box `max-height: 88dvh`,
  `touch-action: pan-y`, contained overscroll, safe-area bottom padding; `html:has(dialog.modal[open])` locks scroll + `scrollbar-gutter: stable`.
- Course page **Fees v5 = room card carousel** (user picked "card carousel" of 3 options): Swiper `[data-room-slider]` — `.room-card` = cream rounded card,
  room photo (4:3) with frosted note pill, round room-plan medallion on the photo edge, name, gold rule, price, Book Now; shared `.slider-controls` below.
  1 card (phone) · 2 (≥768) · 3 ≥1200 with the active card centred (`centeredSlidesBounds`, starts on 4-Sharing), side cards muted + smaller, click to centre,
  arrow keys work. v4.1 split (2×2 arch cards + room photo panel, `[data-room-view]` JS, `.fees__split/.room-view/.fee` SCSS) removed.
  ⚠ Room photos still campus placeholders.
- Course page **Fees v6** (user): left = accommodation photo slider (`.fee-stay`, Swiper fade + autoplay 5s, `[data-stay-slider]`, sticky ≥992, big curved
  top-left corner, frosted label pill, shared `.slider-controls`) · right = "Room fees" rows (`.room-fee`: plan · name + note · price) + "Upcoming batches"
  (1 column ≥992, 2 cols on tablet). Photos = `$stay_photos` (campus placeholders: building, pool, lounge, dining ×2, entrance) — swap for real room photos.
  v5 card carousel removed. Class is `.fee-stay` because the retreat page already uses `.stay`.
- **Rooms (user): the school offers ONLY Private and Twin Sharing — no 4- or 6-sharing.** `$fees` = Twin Sharing USD 1,699 · Private USD 2,299
  (prices from the live page — confirm). "From" price changed $1,299 → **$1,699** everywhere (home course card + FAQ, course schema + ticket stub, SEO description).
  Retreat stay card "Shared room" → "Twin sharing". ⚠ 300hr is "from $1,490" — cheaper than the 200hr now; confirm 300hr pricing with the owner.
- Accommodation slider now uses the user's real room photos `assets/images/acc/acc-img-1…6.webp` (800×533): twin room, balcony, sitting area,
  desk corner, bathroom, garden view. Desktop frame = horizontal `aspect-ratio: 3 / 2` (user; was portrait 4 / 4.6).
  Balcony photo shows a plunge pool — label is just "Balcony" (don't claim every room has one unless the school confirms).
- Fees layout (user): **Room fees moved out of the grid → centred block on top** (`.room-fees-wrap`, max 920px, Twin · Private side by side ≥768,
  stacked on phones). Grid below = accommodation photo slider left (3:2) · Upcoming batches right.
- Accommodation slider = **infinite loop** (user; `loop: true`, was `rewind`). Verified: prev active on 01, 01 ← 06 and 06 → 01.
- Accommodation slider: **progress line removed** (user) — controls = "01 / 06" left · arrows right (`justify-content: space-between`). Other sliders keep theirs.
- CLAUDE.md "Current Status" / "Next Steps" / "Open Questions" rewritten to match the site as of today (user: keep CLAUDE.md updated all the time).
- Fees section (user): **accommodation photo slider removed** ("abhi bs upcoming dates") — markup, `$stay_photos`, `[data-stay-slider]` JS and `.fee-stay`
  SCSS deleted (photos kept in `assets/images/acc/`). Title/note classes now `.fees__title` / `.fees__sub`.
- **200hr Bali course = 15 days (user; was 20).** Batches now 1st → 15th of each month. Changed everywhere: course facts, overview text + points, room-fees
  note, ticket stub + intro, course FAQ, Course schema description, home course card (`days` 15) + home FAQ, `$seo` title/description in css.php.
- **Upcoming batches v2 = calendar cards** (user: list looked plain): `.batch-card` — cream calendar page, two gold binding rings on the top edge,
  cream-dark head (month + year, month from `date('F', …)`), big "01 to 15" (Parisienne "to"), dates line "· 15 days · 200 hours", full-width outline
  "Book this batch". First card = `.is-next` (gold frame + centred gold "Next batch" pill). 1 · 2 (≥576) · 3 (≥992) per row. Old `.batch` rows removed.
- Batch calendar cards made **compact** (user): small tiles, **6 in one row ≥1200** (3 ≥768, 2 on phones), month + year stacked in the head,
  "01 to 15" 28–32px, "15 days · 200 hours", small "Book" button; rings 8×16px (10% from the edges on phones so the "Next batch" pill fits).
- **Room fees removed from the course page** (user). Deleted: Room fees block, `$fees` + `$room_svg` (PHP), `.room-fees-wrap/.room-fees/.room-fee/.fees__title/.fees__sub`
  (SCSS). Section head now "Upcoming Dates" / h2 "Choose your month" / "A new batch starts on the 1st of every month and runs for 15 days…"; only the
  calendar batch tiles below (`#fees` anchor kept). Prices still appear elsewhere: ticket stub "From USD 1,699", home 200hr card + FAQ, Course schema.
- **Highlights section** on the course page (user; `.highlights` + `.highlight`, style.scss before "Included / not included"; JS `[data-highlights]`).
  Order now: Overview (bg) → Curriculum (white) → **Highlights ($cream-dark band)** → Daily schedule (bg) … (user moved it twice: above, then below Curriculum).
  Head: sub-heading "Highlights" + h2 "Life around the shala" left · para · prev/next `.circle-btn` right. Below: edge-to-edge endless strip,
  **4 photos in view ≥1200** (3 ≥768, 2 phones), 3:4 rounded photos, every other one 24–56px lower (wave, `.highlight--low` set in PHP so the
  loop keeps the pattern), gold number + label on a soft shade; hover = slow zoom + gold inner frame + gold dash before the label.
  Motion = **linear marquee** (Swiper loop, autoplay delay 0, speed 6000/photo). Swiper can't start a new slide mid-drift, so JS "freezes" the strip:
  hover stops it exactly in place (resumes on leave), buttons move exactly one photo from what is on screen (`slideToLoop`, 700ms), drag works.
  Reduced motion = no drift. Verified in real time via Chrome DevTools protocol (headless virtual time can't test transitions).
  Data `$highlights` = 18 webp photos from `assets/images/highlights/` (labels + alt written from the photos; `hightlight-img-10` = duplicate of img-2,
  left out; the folder also has .jpg/.JPG originals — only webp used). Photos show the hotel-style campus: pool, spa, dining, cycling, rice fields.
- Highlights: **arrow buttons removed** (user) — markup, step/firstVisible JS and `.highlights__nav/__prev` SCSS deleted. Head = title left · text right (2 cols ≥992).
  Strip still drifts, freezes on hover, can be dragged.
- **Accommodation section** on the course page (user; `.rooms` + `.room-tab` + `.room-panel`, JS `[data-rooms]`). Order: Curriculum → Highlights →
  **Accommodation (white)** → Daily schedule. 8 room types in `$rooms` (Nature Haven Family Room · Premier Room · Village Family Room · Deluxe Room
  ×3 variants · Ashva One Bedroom · Ashva Bedroom), each with feature tags (Private pool / Nature view / Balcony / Family / Private terrace pool).
  ≥992: numbered room list left (active = cream row + gold bar) · sticky viewer right: 3:2 photo (even rounded corners — user rejected the big curved
  corner), crossfade, frosted caption card (count · name · tag pills; hidden on phones), arrows on the photo, thumbnail strip (active = gold frame).
  <992: rooms as a sideways pill row. Swipers are made per room on first show.
  **Photos load automatically from `assets/images/acc/<folder>/`** — every .webp, sorted by name (scandir; `glob()` returns nothing on this XAMPP).
  Folders: nature-heaven-family-room-pool (user's, has the 6 acc-img photos) · premier-room-nature-view · village-family-room · deluxe-room-pool-balcony ·
  deluxe-room · deluxe-room-balcony · ashva-one-bedroom-terrace-pool · ashva-bedroom. Empty/missing folder → "Photos coming soon" panel.
  ⚠ `acc/` root now holds big camera JPGs (14–24 MB, ANV0*.jpg, "SRAU Pool…") — not used; convert to webp into the room folders.
- **Accommodation v2** (user sent a reference: tabs on top · photo left · details right). Rewritten: `.rooms__tabs` (room names, uppercase, gold underline
  on the active one; 4 + 4 grid ≥992, sideways row on phones; Deluxe variants labelled "Deluxe Room · Pool" / "· Balcony") → `.room-panel` grid 6fr 5fr:
  photo slider (4:3.3, even corners, gold "8 Room types" badge top-left, "01 / 06" pill + arrows bottom-right; no thumbnails) · info: "Room 01 / 08",
  h3 name, short text, **feature boxes** (gold icon square + label: room tags + "3 meals a day"; icons via `$room_feature_icons`), Book Now (`$book_url`)
  + "Ask on WhatsApp". ⚠ Room `text` lines are neutral placeholders written from name + tags — TODO: the school's real room descriptions
  (no bed sizes / amenities invented). v1 (numbered list + thumbnail viewer) replaced.
- Room tabs → **pills in ONE row** (user): Raleway 13–14px normal case, hairline outline, gold outline on hover, active = royal blue + cream text.
  Row centred (first/last `margin-*: auto`), scrolls sideways when it doesn't fit. Measured: all 8 fit at ≥1366px; 1280px overflows ~66px → scrolls.
- **Mobile popup jitter, round 2** (user: "fluctuation, not UX friendly"). Tested on an emulated phone (390×844, touch, via Chrome DevTools protocol):
  layout is stable (drags inside the box / on the backdrop don't move page or sheet), so the cause is rendering: `::backdrop` `blur(3px)` had to
  re-blur a page that keeps moving behind it (Highlights marquee, auto-stepping watch) every frame → shimmer/stutter on phones. Fix:
  backdrop blur only ≥768 (phones: plain `rgba($royal-blue-dark, .62)`), `.modal__box` gets `will-change: transform` + `backface-visibility: hidden`,
  popups fire `modal:open` / `modal:close` on document and the Highlights strip freezes while a popup is open (verified: holds still, resumes after close).
- Accommodation photo (user: "boring, make it modern, ribbon UI"): plain "8 room types" badge → **gold bookmark ribbon** hanging over the top edge
  (`.room-panel__ribbon`: "ROOM · 01 · OF 08", gradient gold, notched bottom, dark fold `&__media::before`) + **royal-blue corner sash** with gold
  hairlines showing the room's first tag (`.room-panel__sash`; none for rooms without tags) + count & arrows in one **frosted glass pill**.
  Info label is now "Accommodation · Ubud" (room number lives on the ribbon).
- Fix (user): room photo arrows went blank on hover (white arrow on the cream hover fill — the pill's `color: $white` beat `.circle-btn--light:hover`).
  `.room-panel__nav .circle-btn:hover` now sets cream fill + royal-blue arrow.
- Cloudflare quick tunnel started (user): https://rice-occasionally-atlantic-outcomes.trycloudflare.com/luxury-vinyasa/ — verified 200 for all 4 pages,
  CSS/JS/images (incl. room photos); htdocs root 403. URL changes on every restart; tunnel runs only while Claude's background process / the PC is on.
- Accommodation fixes (user, mobile): corner sash cut "PRIVATE TERRACE POOL" → optional `'sash'` short label per room (Ashva One Bedroom = "Terrace pool"),
  sash text 8–10px. Book Now + Ask on WhatsApp are **full width on phones** (<576). Checked at 390px.
- Room corner sash v2 (user: "make it better"): classic **folded corner ribbon** — box sits 8px (phones 6px) outside the photo corner, two dark
  royal-blue fold triangles where the band wraps behind, band = royal-blue gradient + gold hairlines + shadow; sizes via `--sash` / `--fold`.
- **Popups centred on phones too** (user: no bottom sheet). `.modal[open]` = `place-items: center` + 16px padding (24px ≥768); box = cream window
  max 620px / 86dvh, gold inner frame on all sizes, `modal-in` fade-rise on all sizes. `modal-up` keyframes removed. Checked at 390px + 1280px.
- Room photo ribbons v3 (user: "make it better"): diagonal corner sash → **flag ribbon** on the right edge (`.room-panel__sash`, now a single span):
  royal-blue gradient band with a swallowtail notch on the left, gold diamond + gold hairlines, runs 8px past the photo and folds behind it
  (`&__media:has(.room-panel__sash)::after`). Bookmark ribbon gets a fine dashed "stitch" line inside (`&__ribbon::after`). Checked 1440 + 390.
- Gold bookmark ribbon ("ROOM 01 OF 08") **removed** from the room photo (user) — markup, `&__ribbon` + its fold SCSS deleted. Only the flag ribbon remains.
- **Good to know v2** (user: "make the UI better"): `$know` array + 3 white cards on the cream section (`.know`): faded gold number top-right,
  duotone `feature_icon()` (sprout / certificate / globe) in a cream disc with gold ring + dashed halo, gold kicker (Eligibility / Assessment / Travel),
  title, points with small gold check circles; hover = lift + shadow + gold line drawing along the bottom. 1 col phones, 3 ≥992.
- **Course FAQ v2** (user: "full image left, FAQs right as accordion") — new course-page-only component `.course-faq` + `.faq-acc` (home FAQ untouched):
  grid 5fr 7fr ≥992, full-height photo left (`overview-img-2`, img absolute/cover so it follows the list height; square on phones, 16:10 tablets) with a
  frosted "Still have a question? Ask us directly" card; right: head + native `<details name="course-faq">` accordion (one open at a time, no JS),
  gold number · question · round + toggle that rotates to × and fills royal blue; smooth height via `::details-content` + `interpolate-size`.
  FAQPage JSON-LD kept.
- ⚠ User corrected me: **no boxy design unless asked** — Good to know cards → **open columns** again (no background / border / radius / shadow /
  hover lift); hairlines between columns (vertical ≥992, horizontal when stacked). Number, icon, kicker, title, check list kept. Saved as a memory too.
- Course FAQ layout (user): photo **flush with the left screen edge, 45% wide** (only right corners rounded), FAQs right ending at the container edge
  (`padding-right: max(24px, (100vw - 1350px)/2 + 24px)`). Photo has a **fixed height** (`clamp(520px, 100vh - header - 48px, 820px)`) and is
  **sticky** — it no longer grows/shrinks when answers open (verified 681px open/closed at 1440). Phones: photo full width square on top.
- Course FAQ (user: no space above/below the photo): section top padding 0 (all sizes) + bottom padding 0 (≥992); FAQ text gets its own
  `padding-block: fluid(64px, 104px)` on desktop. Photo = sticky at `top: $header-height`, height `max(560px, 100vh - header)` → its top meets the
  section top at the start and its bottom meets the section bottom at the end; never resizes when answers open. Measured at 1440×900 / ×1080.
- Course FAQ photo: **border radius removed** (user) — square corners on all sizes.
- Course FAQ list wider (user): right gutter `fluid(24px, 80px)` instead of the 1350px container edge, left gap `fluid(40px, 72px)`.
- Course FAQ: "Still have a question?" card on the photo **removed** (user) + its bottom shade; markup + `.course-faq__help*` SCSS deleted.
- Course FAQ photo → user's `assets/images/course/faqs-img.webp` (992×1336, stairway by the pool with the carved emblem).
- **FAQ unified on all pages** (user: replace the home + retreat FAQ with the course-page design). New shared **`include/faq.php`**: set `$faq_list`,
  `$faq_title`, `$faq_text`, `$faq_img` (src/w/h/alt), optional `$faq_bg` ('section-bg'), then include — it builds the FAQPage JSON-LD itself.
  Home = "Questions, answered" + `home/img.webp` (Ganesha relief, white) · Course = `course/faqs-img.webp` (white) · Retreat = "Before you pack"
  + `about-us/img-1.webp` sunset (section-bg). Old list + answer-panel FAQ removed everywhere: markup, per-page `$faq_schema`, section 20 SCSS
  (`.faq`, `.faq-item`, `$faq-count`) and the `[data-faq]` JS. Styles live in `.course-faq` / `.faq-acc`.
- Home FAQ photo → user's `home/faqs-img.webp` (995×1337, pranayama on a bolster). `home/img.webp` (Ganesha) now unused there.
- Course page now uses the user's `assets/images/course/` photos: hero = `banner-img.webp` (1916×1162, meditation circle); Overview arc =
  img-3 · 1-321 · **img-1 (aerial yoga, centre)** · img-2 · img-4 (Ganesha). The JPGs were converted to webp with `sharp` (node, scratchpad;
  q80, 23–98 KB) — originals kept. `course/img-5.webp` (grand hall) converted but not used yet. about-us/banner-img no longer used on this page.
- Accommodation **Deluxe Room** (tab "Deluxe Room", folder `acc/deluxe-room/`) now has the user's 5 photos (canopy bed room ×3, bathroom ×2):
  JPGs converted to 800px webp with sharp (q80, 35–43 KB), originals kept. No code change — the room was already in `$rooms`.
  Other room folders (premier, village, deluxe pool/balcony, ashva ×2) still have no photos → "Photos coming soon".
- New folder `acc/deluxe-room-with-nature/` (user, 6 webp: bathroom, canopy bed + garden doors, terrace walkway, wardrobe/desk) replaced the
  "Deluxe Room · Balcony" entry in `$rooms` → name "Deluxe Room with Nature View", tab "Deluxe Room · Nature View", tag Nature view.
  Note: photo 1 (cover) is the bathroom — rename files if a bedroom shot should lead. Rooms with photos: Nature Haven, Deluxe Room, Deluxe · Nature View.
- `acc/village-family-room/` filled by the user (5 webp) → Village Family Room tab shows them automatically (folder name already matched `$rooms`).
  Still empty: Premier Room, Deluxe · Pool, Ashva One Bedroom, Ashva Bedroom.
- User moved the 6 photos from `deluxe-room-with-nature/` to new `acc/premier-suite-with-pool/` → "Premier Room" entry is now
  **Premier Suite with Pool** (tab "Premier Suite · Pool", tags Private pool + Nature view). `deluxe-room-with-nature/` got 3 new camera JPGs
  (ANV02894/02921/02928, 10–15 MB) → converted to acc-img-1…3.webp (800px, q80); originals kept.
  Rooms with photos: Nature Haven 6 · Premier Suite 6 · Village Family 5 · Deluxe Room 5 · Deluxe · Nature View 3.
  Still empty: Deluxe · Pool, Ashva One Bedroom, Ashva Bedroom.
- New room **Pavilion Studio** (user, `acc/pavilion-studio/`, 4 webp: timber room ×2, bathroom, garden balcony) added to `$rooms` after
  Deluxe · Nature View, tags Balcony + Nature view → **9 room types** now (intro text "Nine room types…"). Tab row now 9 pills — scrolls sideways
  on narrower desktops.
- New room **Deluxe Room with Nature View & Balcony** (user, `acc/deluxe-room-with-nature-balcony/`, 4 webp: canopy room with rice-field view,
  garden balcony, rice-field balcony) added before Pavilion Studio, tab "Deluxe Room · Balcony", tags Balcony + Nature view → **10 room types**
  ("Ten room types…"). ⚠ its `acc-img-2.webp` is the same file as `pavilion-studio/acc-img-3.webp` (timber Pavilion room) — user to check.
- Ashva One Bedroom → **Ashva One Bedroom Suite** (user, folder `acc/ashva-one-badroom-suite/` — "badroom" typo kept as the user named it;
  5 webp: bathroom with tub, living room ×2, canopy bed, bedroom with terrace). Tag "Private terrace pool" kept (sash "Terrace pool") — no pool
  clearly visible in the photos, confirm. Still empty: Deluxe · Pool, Ashva Bedroom.
- Room pill row got **scroll arrows** (user: 10 pills overflow): `.rooms__tabbar` = 38px `.circle-btn` ← · `.rooms__tabs` · → . Arrows show only when
  the pills overflow (`.is-overflowing`), dim at the start/end (disabled), each click scrolls 70% of the row; soft mask fade only on the side that
  has more (`.can-prev` / `.can-next` → `--fade-l/-r`). JS at the end of the `[data-rooms]` block (ResizeObserver + scroll). Checked 1440 / 1280 / 390.
- New folder `acc/ashva-one-bedroom-with-tarrace-private-pool/` (8 webp, shows the terrace plunge pool; 4 photos are the same files as in
  `ashva-one-badroom-suite/`) → new room **Ashva One Bedroom with Terrace Pool** (tab "Ashva One Bedroom · Terrace Pool", tag Private terrace pool).
  The Ashva Suite lost the pool tag; empty "Ashva Bedroom" entry removed. Still 10 rooms; only Deluxe · Pool has no photos.
- **Recommended room (user): Ashva One Bedroom with Terrace Pool = "best value"** → `'badge' => 'Best value'` in `$rooms`, listed FIRST (opens by
  default). Shows: gold star in its tab pill, gold gradient pill "★ Recommended · Best value" top-left on the photo (`.room-panel__badge`; phones
  only "★ Best value" so it clears the flag ribbon), info label "Our recommendation · Best value". Checked 1440 + 390.
- "Deluxe Room · Pool" (no photos) **removed** (user) → **9 room types**, every room now has photos ("Nine room types…").
- **Daily schedule v5 = vertical day timeline** (user picked it of 3 options; replaces the v4 watch + side photo collages). `ol.day-line`
  (style.scss right after the `.schedule` notes block; JS `[data-day-line]` at the end of script.js): hairline through the day, ≥992 centred
  with entries alternating time | dot | session and session | dot | time (`--flip`), phones line on the left. Dot = icon disc (46/56px);
  "Morning / Afternoon / Evening" kicker from the time (`$day_part`); "to 06:00" end time. Meals = small cream-dark dot + gold time +
  Parisienne name. While scrolling a gold line fills to 60% of the screen height (`--fill`) and reached entries light up (`.is-on`: royal-blue
  dot, gold icon). Notes pills kept. Old `.watch` / `.schedule__stage` / `.schedule__collage` SCSS + `[data-clock]` JS kept, unused, for an easy revert.
- **Daily schedule v5.1 = table-style timeline** (user: alternating layout cut text off, wanted table form, diamonds instead of icons, photos
  left + right like the watch). `.day-line` (max 620px) = column header "Time · Session · Duration" + `ol.day-line__list`: Morning / Afternoon /
  Evening group rows (hollow gold diamond + spaced label), hairline rows: time ("to 06:00" below) · diamond marker (`::before` diamond +
  `::after` outer diamond ring) · session · duration (`$duration()`: "40 min" / "1 h 30" / rest "7 h"). Meals: small cream diamond, gold time +
  Parisienne name. Scroll: gold line fill + `.is-on` (filled gold diamond + ring) + `.is-current` (latest row: glow + gold time).
  `.schedule__stage` back in use: tilted photo collages (v4 photos) left + right ≥1200, now **sticky** (`top: header + 64px`), centre col 620px.
  Checked 1440 / 1024 / 390.
- Schedule photos (user: "only 2 photos, shown properly"): 4+4 tilted collages → **one straight arch photo per side** (`.schedule__photo`,
  `$schedule_photos`): left `overview-img-2` (morning circle), right `overview-img-1` (study over the jungle, starts lower), max 300px, 3:4.2
  `.arch-img`, sticky, slow hover zoom, gold Parisienne caption ("Morning circle" / "Afternoon study"). `.schedule__collage` SCSS removed. ≥1200 only.
- Schedule notes (user: "as a note"): 3 pills → `aside.schedule__note` under the table (max 620px): gold top rule, "Please note" in Parisienne,
  Thursday / Sunday / After 20:00 each with a small gold diamond, name + muted text. `.schedule__notes` SCSS replaced.
  Then (user): **one row of 3 on every screen** incl. phones (hairlines between, text 14→18 / 12→14px). Checked 320 + 390.
- Curriculum on phones/tablets (user: far too long): <992 the 3 pillars become **tabs** (`.pillars__tabs` pills with icon: Practice · Knowledge ·
  Teaching; active = royal blue) — one subject list at a time, pillar icon + title hidden (the tab names it), compact left-aligned rows (17px).
  Hidden only once JS sets `.pillars.is-tabbed` (`[data-pillars]` at the end of script.js; arrow keys work). ≥992 unchanged (3 columns).
  390px: section ~756px tall (was all 14 subjects stacked).
- Course quick facts on phones/tablets (user: 2-per-row list looked off): <992 = centred **3 × 2 grid** — small gold icon ring (38px) · value
  (14–17px) · small label below (CSS `order`), hairline cross between cells, no boxes (`.course-facts` lg-down block). ≥992 glass bar unchanged.
- **Retreat page content update** (user: write content from the live retreat page for now, **never use vinyasayogaacademy.com images** —
  only our own `assets/images`; user will send retreat photos later + wants a **bolder UI**). Re-read live page 2 Nov. Added:
  new **intro section** after the hero (`.retreat-intro`, section-bg): "A pause, not just a holiday" + 2 paras + 4 bold stats
  (3–21 days · 1st of every month · 3 meals a day · All levels; `%stat-number` 36–56px) · right "Who it is for" (7 points, gold 01–07).
  **Welcome ceremony** postcard (photo home/intro-img-1) → 6 postcards, **3 per row ≥992**. 4 new retreat FAQs: custom length, visa (30 days
  on arrival, extendable once), solo women, house guidelines (vegetarian, no alcohol/smoking, modest dress, silence after 20:00).
  Left out on purpose (live page copies TTC content / contradicts itself): TTC timetable, "classes mandatory / performance record",
  Jl. Bisma address, 60+ vs 100+ countries, "Yoga Alliance accredited", "every teacher E-RYT 500", 6% offer code, conflicting refund wording
  (kept the deposit-transfer version). TODO: real retreat photos (temple, rice terraces, beach, kirtan, wellness, stay).
- Retreat postcards: round "UBUD · BALI" postmark on the photos **removed** (user) — markup + `.postcard__mark` SCSS deleted; stamp stays.
- Retreat intro v2 (user picked "two overlapping photos" of 3): ≥992 photos left (big arch `yoga-retreat-img` + round `about-us/img-1` with
  cream ring overlapping, cream-dark tonal arch behind, royal-blue seal "Starts every 1st of the month" with dashed gold ring on the arch edge,
  vertical "Ubud · Bali" tag + gold line) · text + 4 stats right; "Who it is for" = full-width row below (7 ≥1200, 4 at 992–1199, 2 tablet,
  list phones). Photos are placeholders until the user sends retreat photos.
  Small photo → **oval** on all sizes (user): `.retreat-intro__side` 3:4, `border-radius: 50%`, full cream ring (incl. bottom), closed hairline
  inside (`::after` inset 10px); media padding-bottom 26% so the oval fits.
- **"Who it is for" = own section + round slider** (user): `.retreat-for` (section-bg) right after the intro (intro switched to white):
  head "Who It Is For" / "Is this retreat for you?" + text; Swiper `[data-round-slider]` of 7 `.round-card`s — round photo in a white ring
  with gold hairline, royal-blue number disc on the lower edge, title (Busy minds, Practitioners, New chapters, Beginners, Solo travellers,
  More than a holiday, A full reset) + text; hover = zoom + gold ring + gold number. 1.3 / 2.3 (≥576) / 3.3 (≥768) / 4 (≥1200) cards,
  shared `.slider-controls`. `$retreat_for` now has title/text/img (placeholders from our own assets). Old 7-in-a-row list SCSS removed.
  Round card v2 (user: "boring, make it catchy, 4 at a time"): **exactly 4 in view ≥1200** (swiper overflow hidden there; peek on smaller),
  wave (every other card lower ≥768, `.round-card--low`), big outlined gold number behind the circle's top-left, slowly turning dashed gold
  ring (`round-spin` 40s; hover 8s + solid gold), photo absolute inside a square `.round-card__media` (true circle), gold line under the title
  that widens on hover, number fills on hover. Number disc removed.
  v3 (user): big outlined number + dashed/white rings **removed**; photos bigger (full card width, max 340px, gap 28px ≥1200);
  **pagination dots** instead of count (`.slider-controls--dots`: ( ← ) • ▬ • • ( → ), active dot = 28px gold bar, clickable).
- **No progress bars on any slider** (user): `.slider-controls__progress` markup (home courses + testimonials, retreat) + SCSS + JS
  pagination removed; controls = "01 / 07" left · arrows right (`justify-content: space-between`).
- Retreat: **"How to book / Six easy steps" section removed** (user) — markup, `$steps`, `.route` SCSS deleted. FAQ now white, closing CTA section-bg.
- **Accommodation section is now shared**: `include/accommodation.php` ($rooms data, `$room_feature_icons`, `$room_photos` with
  `dirname(__DIR__)`, markup; needs `$book_url`, `$arrow`, `$social`; optional `$acc_text`). Course page includes it (unchanged look);
  retreat page includes it **instead of the "Rooms & food" block** (`.stay` / `.stay-card` SCSS removed; Sunday-meals note moved to the diet FAQ).
  Retreat order now: hero · intro · who it is for (bg) · durations · rhythm (bg) · postcards · highlights (cream-dark) · accommodation ·
  included + packing (bg) · FAQ · CTA (bg).
- Retreat "A day on retreat" spacing (user): row centred max 1080px, icon 76–88px with a gold outline ring (offset 6px), dotted line through
  the icon centres (`--icon`), title 18–24px below the icon, text 12px below, arrival pill 48–72px below (row ≥768, stacked + 24px radius on phones).
  Icons v2 (user: "make it better"): time-of-day discs — Morning sunrise-gold gradient, Day white, Evening royal-blue gradient + light-gold
  moon; 6px cream gap ring + thin gold outer ring (box-shadow), lift on hover; line = fine gold gradient; a small glowing gold "sun" drifts
  along it (`rhythm-sun` 9s alternate, hidden with reduced motion).
- **Room badges changed (user): Ashva One Bedroom Suite = recommended / best value** (first tab, opens by default) · **Ashva One Bedroom
  with Terrace Pool = Premium** (second tab). `'badge'` is now a kind (`recommended` / `premium`) looked up in `$room_badges` (include/accommodation.php):
  photo badge (gold "★ Recommended · Best value" / royal-blue + gold "★ Premium", `.room-panel__badge--premium`), info label
  ("Our recommendation · Best value" / "Premium choice · Ubud"), tab star (gold / royal-blue `.room-tab__star--premium`). Note: the Suite's
  first photo is the bathroom (acc-img-1) — rename files if a bedroom shot should lead.
- **Highlights strip is now shared**: `include/highlights.php` (data + markup; optional `$hl_title` / `$hl_text` / `$hl_id`). Course page uses it
  unchanged; retreat page includes it after the postcards ("Life around the retreat").
- Retreat **Included · Not included · What to bring in ONE section** (user): `.inclusions__grid--retreat` — both tickets side by side ≥992,
  luggage tag full width below (max 980px, list in 2 columns ≥768). Separate packing section + `.packing` SCSS removed.
  v2 (user: "make it better"): **≥1200 = one row of 3 equal-height travel documents** — included ticket (list 1 col) · not-included ticket ·
  upright luggage tag (hole top centre, top corners cut, rounded bottom); 992–1199 tickets side by side (same height) + tag below.
  Not-included ticket got a "Good to know" note (`.ticket__extra`: airport pickup for a fee, ~1.5 h from DPS; visa on arrival 30 days).
  Retreat section order now: hero · intro (bg) · durations · rhythm (bg) · postcards · highlights (cream-dark) · rooms & food · included +
  packing (bg) · how to book · FAQ (bg) · CTA.
