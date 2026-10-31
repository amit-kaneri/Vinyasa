# DESIGN.md — Luxury Vinyasa Design System

Single source of truth for how the website looks and feels.
Every page and component must follow this file. When a design decision changes, update it here first.

> **Status:** v2 — rules set by the user on 2026-10-30.

---

## 0. Golden Rules (read before writing any code)

1. **Theme = Royal Blue + Cream White, with Amber Gold as the luxury accent.** Matching shades only where really needed.
2. **Few colours.** Royal luxury comes from restraint — mostly cream background, blue text/accents.
3. **Luxury, clean, modern.** Not funky, not playful, not loud.
4. **No boxy design** — no bordered boxes, heavy cards, boxed sections or shadows — **unless the user asks for it.** (User asked: course cards.)
5. **No unnecessary styling.** Only add CSS that the design actually needs. No decorative extras on our own.
6. **Only predefined colours** (section 2) — never write a raw HEX inside a component.
7. **Only predefined typography classes** (section 3) — never re-declare font-family / size per element.
8. **Container = 1350px.**
9. **Header and footer are custom** — no Bootstrap classes or Bootstrap JS inside them.
10. **No Font Awesome / icon fonts.** All icons and symbols are custom inline SVG.
11. **Sliders get their own custom design** — never the default Swiper look.
12. **Smooth scroll** on the whole site.
13. **All styling in `assets/css/style.scss` only.** Never edit `style.css` and never compile — the Watch Sass extension does it.
14. **Write real SCSS, not plain CSS** inside `style.scss` — variables, nesting, `&`, mixins (see section 12).

---

## 1. Theme & Mood

- **Feel:** royal, calm, premium, airy — a luxury yoga academy.
- **Look:** clean modern UI — lots of white space, large photography, thin lines, elegant serif headings.
- **Do:** generous spacing, full-bleed images, thin 1px lines, subtle slow motion.
- **Don't:** neon or many colours, gradients everywhere, heavy shadows, rounded "app-like" boxes, crowded layouts, funky shapes.

---

## 2. Colours

Base colour is taken from the logo (`assets/images/logo.webp` → `#03256F`).

| Role             | Name           | HEX       | SCSS variable          | Use                                            |
|------------------|----------------|-----------|------------------------|------------------------------------------------|
| **Primary**      | Royal Blue     | `#03256F` | `$royal-blue`          | Headings, nav links, buttons, footer bg, icons |
| Primary dark     | Midnight Blue  | `#021A4F` | `$royal-blue-dark`     | Hover states, dark overlays                    |
| Primary soft     | Mist Blue      | `#E9EDF6` | `$royal-blue-soft`     | Rare light-blue tint (only if needed)          |
| **Background**   | Cream White    | `#FBF8F1` | `$cream`               | `.section-bg` sections, banner band, pills     |
| Background alt   | Deep Cream     | `#F3EDE1` | `$cream-dark`          | Alternate section background                   |
| **Accent**       | Amber Gold     | `#C9952B` | `$amber-gold`          | Sub-headings on blue, icons, thin lines, button hover, loader symbol, active slider marks |
| Accent dark      | Deep Amber     | `#8C6210` | `$amber-gold-dark`     | Gold **text on cream** (sub-headings, links) — AA contrast 5.1:1 |
| Accent light     | Light Amber    | `#E0B04A` | `$amber-gold-light`    | Hover / highlight on blue backgrounds           |
| Text             | Ink            | `#1C2333` | `$text`                | Body paragraphs                                |
| Text muted       | Slate          | `#5F6677` | `$text-muted`          | Captions, meta, small text                     |
| Line             | Hairline       | `#DCD5C6` | `$line`                | 1px dividers, input underlines                 |
| White            | White          | `#FFFFFF` | `$white`               | **Page background** (body + header), text on images |

**Usage rules**
- ~75% cream, ~15% royal blue, ~10% amber gold, rest neutrals.
- **Amber gold = the luxury touch:** `.sub-heading` eyebrow text, thin divider lines, SVG icons, button hover,
  link underline, active slider pagination, loader symbol, footer accents on blue.
- Gold stays an accent — never a full section background or large block.
- **Contrast rule:** on cream use `$amber-gold-dark` for any gold *text*; `$amber-gold` on cream only for lines/icons
  (2.5:1). On royal blue / midnight use `$amber-gold` (5.2:1) or `$amber-gold-light`.
- Text on cream = `$text` or `$royal-blue`. Text on blue/images = `$white` / `$cream`.
- Also expose as CSS custom properties (`--royal-blue`, `--cream`, ...) in `:root` so JS / inline SVG can use them.

---

## 3. Typography

Fonts (already loaded in `style.scss`):

| Role        | Font            | SCSS variable    | Use                                         |
|-------------|-----------------|------------------|---------------------------------------------|
| Heading     | **Raleway**     | `$heading-font`  | All headings, numbers, prices (was GFS Didot until 2026-10-31) |
| Body / UI   | **Lato**        | `$body-font`     | Paragraphs, nav, buttons, forms, labels     |
| Accent      | **Parisienne**  | `$spacial-font`   | Rare script word/line — max once per section |

```scss
@import url('https://fonts.googleapis.com/css2?family=Raleway:wght@300;400;500;600&family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&family=Parisienne&display=swap');

$heading-font: "Raleway", sans-serif;
$body-font:    "Lato", sans-serif;
$spacial-font:  "Parisienne", cursive;
```

> Note: headings stay weight 400 — luxury comes from size and spacing, not weight. `body` sets `font-variant-numeric: lining-nums`
> because Raleway's default old-style digits look uneven. **"Didot" elsewhere in this file now means the heading font (Raleway).**
> Lato weights in use: 300, 400, 700 only (others can be removed from the import later to speed up loading).

### Predefined typography classes

Defined **once** in `style.scss`. In HTML just add the class — no extra font styling per section.

| Class            | Font       | Desktop / Mobile | Weight | Line-height | Extra                                         |
|------------------|------------|------------------|--------|-------------|-----------------------------------------------|
| `.main-heading`  | Didot      | 64px / 38px      | 400    | 1.1         | Hero / page title (H1). Royal blue or white.  |
| `.section-heading` | Didot    | 46px / 30px      | 400    | 1.2         | Section titles (H2)                           |
| `.sub-heading`   | Lato       | 13px / 12px      | 700    | 1.4         | UPPERCASE, letter-spacing 0.25em — line above a heading. Colour `$amber-gold-dark` on cream, `$amber-gold` on blue |
| `.card-heading`  | Didot      | 26px / 22px      | 400    | 1.3         | Course / retreat / blog titles (H3)           |
| `.accent-text`   | Parisienne | 32px / 26px      | 400    | 1.2         | Script word, e.g. "Namaste" — rare            |
| `.para`          | Lato       | 17px / 16px      | 300    | 1.8         | Body paragraphs, max-width 640px              |
| `.small-text`    | Lato       | 14px / 13px      | 400    | 1.6         | Meta, captions — `$text-muted`                |

**Rules**
- All responsive font sizes use **clamp** through the SCSS function `fluid($mobile, $desktop)` — e.g. `font-size: fluid(16px, 17px);`. No media queries for font sizes.
- Heading tags (`h1`–`h3`) keep their meaning for SEO; the visual style comes from the class.
- Colour helper classes: `.clr-<name>` for every colour in the `$colors` map (`.clr-royal-blue`, `.clr-cream`, `.clr-white`, `.clr-amber-gold-dark` ...).
  Prefix is `clr-` (not `text-`) because Bootstrap's `.text-white` / `.text-muted` use `!important` and would clash.
- Typical section header pattern:
  ```html
  <span class="sub-heading">Our Courses</span>
  <h2 class="section-heading">Yoga Teacher Training</h2>
  <p class="para">...</p>
  ```

---

## 4. Layout & Spacing

- **Container:** custom `.container` — `max-width: 1350px; margin: 0 auto; padding: 0 24px;` (mobile 0 16px).
- **Grid:** Bootstrap grid (`row` / `col-*`) may be used inside page sections only.
- **Spacing unit:** 8px. Use 8 / 16 / 24 / 32 / 48 / 64 / 96 / 120.
- **Section padding:** use **`.spacing`** → `padding: 80px 0` (≥768px) / `60px 0` (mobile). (Older `.section-space` = fluid 64→120px, still on Welcome.)
- **Section backgrounds alternate:** page is **white**; every second section gets **`.section-bg`** (`$cream` #FBF8F1).
  Current order: Banner → **Welcome (bg)** → Courses → **Why Us (bg)** → Achievements → **Testimonials (bg)** → Social → **Gallery (bg)** → FAQ → **Contact (bg)** → Footer (`$cream-dark`).
  `.section-bg` also sets `--section-color` so rings/cut-outs (e.g. `.arch-img--ring`) match the background automatically.
- **Breakpoints:** 576 / 768 / 992 / 1200 / 1400 (same as Bootstrap).
- Separate sections by background change (cream ↔ deep cream) or one thin `$line`, not by boxes.
- **Scroll reveal:** add `data-reveal` to any block → fades up when it enters the screen (JS adds `.js-reveal` to `<html>`; nothing is hidden without JS or with reduced motion).
- **Stats / facts:** always `@extend %stat-number` and `%stat-label` — one look for every number on the site.

---

## 5. Components

### Header (custom — no Bootstrap)
- Logo left (`logo.webp`), menu centre/right, one "Enquire / Book" button right.
- **Desktop (≥992px):** transparent over the hero with white logo (CSS filter) + white links → cream background,
  royal-blue logo and thin bottom hairline after scrolling (`.is-scrolled`, added by JS after 40px).
- **Mobile (<992px):** always cream with hairline (a white logo would disappear on the cream banner band).
- **Mobile layout:** 3-column grid `minmax(0,1fr) auto minmax(0,1fr)` → **hamburger left · (empty centre) · "Contact Us" pill right**.
  The **logo is NOT in the mobile header at the top** — it sits in the banner band, centred above "Welcome to" (`.home-banner__logo`, 150px, mobile only).
  The header logo fades in (centre column) only after scrolling (`.is-scrolled`) or when the menu is open.
  Pill = royal blue, cream text, amber-gold border + phone SVG, soft amber-gold **glow pulse** (`header-glow`, 2.4s). Below 360px it shows the icon only.
- Mobile: custom hamburger (SVG) → full-screen cream overlay menu, large Didot links.
- Nav links: Lato 14px, uppercase, letter-spacing 0.15em, royal blue; thin amber-gold underline animates in on hover.

### Footer (custom — no Bootstrap) — `include/footer.php`, style.scss section 17
- **Soft `$cream-dark` background** (royal blue was rejected as too harsh). Text `$text-muted`, headings royal blue, `$line` hairlines,
  gold (`$amber-gold-dark`) column titles + icons, links hover royal blue. Original blue logo (no filter). Buttons/icons: royal-blue outline → fill royal blue on hover.
- **No CTA band** (user removed it). Footer starts with a **top divider**: hairline · small gold line lotus SVG · hairline.
  (Tried and rejected: centred CTA over a spinning mandala, split CTA, huge outlined "VINYASA" wordmark at the bottom.)
- **Columns** (`1.4fr 1fr .8fr 1.2fr` ≥992px): **brand** (logo, one-line about with RYS 200/300/500 + 2010,
  `social_links('social-links--footer')` ring icons → fill royal blue on hover) · **Courses** · **Explore** · **Visit Us** (gold line icons + Bali address
  → Google Maps, +62 813 2881 810, contact@vinyasayogaacademy.com). Column titles: small uppercase `$amber-gold-light`.
  Links: gold dash slides in on hover. Mobile: brand + contact full width, Courses + Explore side by side.
- **Bottom bar:** © year + site name · legal links (Privacy, Terms, Refund). Right padding 104px (≥768) keeps them clear of the floating button. Mobile bottom padding = 10px (user).
- **Floating back-to-top (`.back-to-top`, markup after `</footer>` in footer.php):** fixed bottom-right (`fluid(16px, 32px)` offset), 56px frosted white circle,
  soft shadow, thin royal-blue up-arrow; **gold SVG ring fills with scroll progress** (JS sets `--progress` 0–100). Appears after 400px scroll (fade + rise),
  hover = royal-blue fill + arrow lifts. z-index 90 (under header 100 / lightbox 200). Click = `lenis.scrollTo(0)`.
- Page links are `#` (TODO) until the pages exist.

### Buttons — ONE theme button (`.theme-btn`, style.scss section 7). Never write button styles in a section again.
| Markup | Look |
|---|---|
| `class="theme-btn"` | Filled royal blue, cream uppercase text (Lato 13px, 0.2em), padding 16px 40px → hover midnight blue |
| `class="theme-btn theme-btn--outline"` | Transparent, 1px royal-blue border + text → fills royal blue on hover |
| `+ theme-btn--light` | Cream outline for dark/photo backgrounds → fills cream on hover |
| `+ theme-btn--sm` | Small (11px, padding 11px 18px) — e.g. batch "Book" |
| `+ theme-btn--block` | Full width (gold line stays short + centred) — e.g. room "Book Now" |
- Every theme button: thin **amber-gold line grows under the text on hover**; any SVG inside (arrow) is 18px and nudges right on hover; `white-space: nowrap`.
- Section-specific CSS may only add **spacing** (e.g. `.fee__btn { margin-top }`), never colours/borders/typography.
- `.link-line` stays the small text link (uppercase + arrow + gold underline). Old `.btn-royal` / `.btn-outline` / `%btn-base` / `.batch__btn` were removed.
Transitions: `0.4s ease`. No shadows.

### Content blocks (instead of boxes)
- Image + text side by side, or image with text below — **no border, no background box, no shadow**.
- Images: square corners (or max 2px), slow zoom (scale 1.04) on hover.

### Circle button (`.circle-btn`) — reusable
48px round icon button, thin royal-blue ring (30%), fills royal blue with cream icon on hover, arrow nudges right.
`<a href="#" class="circle-btn" aria-label="View …"><svg>…</svg></a>` · on dark backgrounds add `.circle-btn--light` (cream ring → fills cream).

### Arch image (`.arch-img`) — reusable
Arch-shaped photo (`$arch-radius: 999px 999px 0 0`), image `object-fit: cover`, thin cream hairline 12px inside, slow zoom on hover.
Size/position it from the section; the class only gives the look.
```html
<figure class="arch-img"><img src="..." alt="..."></figure>                 <!-- plain -->
<figure class="arch-img arch-img--ring">...</figure>   <!-- + 10px cream ring, for a photo overlapping another -->
<figure class="arch-img arch-img--no-line">...</figure><!-- without the inner hairline -->
```
Any other arch shape (tonal backgrounds etc.) uses `$arch-radius` too.

### Sliders (custom design)
- Library: Swiper.js — but **never the default look**.
- Custom navigation: thin SVG arrows (line arrows) in royal blue, or a progress line instead of dots.
- Custom pagination: thin lines / fraction counter `01 / 05` in Didot.
- Slow movement: speed 900–1200ms, autoplay 5–6s, pause on hover.
- Each slider's specific design is decided when that section is built and recorded in section 10.

### Forms
- Inputs: no box — bottom hairline only, Lato 16px, royal blue underline on focus.
- Labels: `.sub-heading` style (small uppercase).

---

## 6. Page Loader

- Full-screen cream overlay shown while the page loads, fades out on `window.load`.
- Centre: **custom SVG luxury symbol** — a thin-line lotus (royal blue strokes, amber-gold centre) that draws itself (stroke-dashoffset animation), then the logo fades in under it.
- No Font Awesome, no GIF. Pure inline SVG + CSS (GSAP may be added later only if the animation needs it).
- Max visible time ~1.5–2s; respects `prefers-reduced-motion`.

## 7. Smooth Scroll

- Library: **Lenis** (lightweight smooth-scroll) — loaded in `include/js.php`.
- Anchor links scroll smoothly; disabled for `prefers-reduced-motion`.

## 8. Icons & Symbols

- **No Font Awesome / icon fonts.** All icons are custom inline SVG.
- Style: thin line (stroke 1–1.5px), `currentColor` so they take the text colour, 20–24px.
- Reusable SVGs live in **`include/icons.php`** → `<?php echo icon('globe'); ?>` (social icons stay in `include/social.php`).

## 9. Imagery & Motion

- Natural light, calm, real yoga / Rishikesh / nature photos; WebP, hero max ~300 KB; always `alt`.
- Dark blue overlay on hero images (`rgba(2, 26, 79, 0.35)`) so white text reads clearly.
- Scroll reveal: soft fade-up (opacity 0→1, translateY 30px→0, 0.8s ease). No bounce, spin or fast effects.
- Accessibility: WCAG AA contrast, visible focus states, respect `prefers-reduced-motion`.

---

## 10. Section-specific Designs

<!-- Record each section's design decisions here as we build (hero, sliders, testimonials, ...). -->

### Home Banner (`.home-banner` — `index.php`)
Reference: full-bleed photo/video + cream band through the centre + circle "window" in the middle.
- **Background:** `assets/video/banner-vid.mp4` full-bleed (autoplay, muted, loop, playsinline), `blur(6px)` + `scale(1.06)`, + `rgba($royal-blue-dark, .35)` overlay.
  Mobile (<992px): the bg video is inset 12px left + right (`inset: 0 12px`) so a white strip shows on both sides (user).
- **Cream band:** `$cream` with a thin **amber-gold double rule** inside (`::before` / `::after`) — top + bottom on desktop, left + right on mobile.
  - Mobile (<992px): **vertical**, `min(84vw, 460px)` wide, full height, inner padding 32px (clears the gold side lines); order **logo → circle → welcome text → right content** (flex `order`; logo `.home-banner__logo` is its own item, hidden ≥992px), centred.
    Mobile heading capped at `calc((84vw - 64px) / 7.8)` so "Academy in Bali" always fits; stats = 3 equal columns (10px labels);
    6 social rings centred in one row, size `clamp(30px, 9vw, 36px)`. Tested at 320 / 360 / 412px.
  - Desktop (≥992px): **horizontal**, full width, inner side padding `fluid(24px, 64px, 992px, 1400px)`, `min-height: clamp(320px, 28vw, 420px)` + 48px padding (grows if content needs it); grid **left content · circle · right content**.
- **Circle** (`.home-banner__visual` > `.home-banner__circle`): same video, zoomed `scale(1.25)`, 10–12px cream ring, no shadow.
  Mobile `min(88vw, 440px)` (wider than the band). Desktop `--orb: clamp(360px, 34vw, 520px)` with `margin-block: calc(var(--orb) / -2)` so it takes no row height and always breaks out of the band.
- **Rotating badge** (`.home-banner__badge`): cream circle on the circle's lower-right 45° edge, SVG `textPath` "Yoga Teacher Training • Ubud · Bali •" spinning (22s), amber-gold SVG lotus in the centre; hover → royal blue. Links to courses.
- **Left content:** `.accent-text` "Welcome to" (`$spacial-font`) + `span.main-heading` (**not h1** — user's choice) in **exactly 2 rows** — `<span>Vinyasa Yoga</span> <span>Academy in Bali</span>` (nowrap block spans). Size `fluid(34px, 46px)`, desktop `fluid(30px, 46px, 992px, 1400px)`. Then `.link-line` "Explore Courses →". Left-aligned on desktop, centred on mobile.
- **Right content:** `.sub-heading` "Residential Training" + short `.para` + **stats** (`.home-banner__stats`: hairlines above + below, Didot numbers count up via `data-count`, "+" as small amber-gold `<em>`, thin dividers) + **Follow us** block (gold label + 32px gold line on top, then `social_links('social-links--ring')` below — 6 icons: Instagram, Facebook, YouTube, X, WhatsApp, Yoga Alliance; 36px thin round rings, fill royal blue on hover).
- **Motion:** circle reveals with `clip-path` circle, content children fade up one by one (`@for` stagger), badge fades in last, stats count up (JS, IntersectionObserver). All disabled by `prefers-reduced-motion`.
- Stats numbers and social URLs are placeholders (TODO).


### Welcome / About (`.welcome` — `index.php`, after the banner)
- **Layout:** `.section-space`, grid `5fr 6fr` on desktop (photos left, text right), stacked on mobile (photos first).
- **Photos** (`overview-img-2.webp` 600×1066, `overview-img-1.webp` 600×800 — Ubud open-air shala): two **overlapping arches** —
  main arch (left 12%, 54% × 86%) and a smaller side arch (46% × 60%, bottom-right, 10px cream ring) — inside a `1 / 1.1` box.
  A soft **`$cream-dark` tonal arch** sits behind both photos (depth without lines; the old offset gold outline was removed — user disliked it).
  Each photo has a thin **cream hairline 12px inside**, following the arch. Vertical `UBUD · BALI` tag + gold line on the left edge,
  slow image zoom (1.04) on hover.
- **Text:** `.sub-heading` "About Vinyasa Yoga Academy" + **`h1.section-heading`** (the page's only h1) + 2 `.para`.
- **Facts** (`.welcome__facts`): 4 items, hairline on top, Didot number + small label (shared `%stat-number` / `%stat-label`).
  4 per row on tablet + ≥1200px, 2 per row on mobile and 992–1199px.
- **Footer row:** founder name in `.accent-text` (signature feel) + credentials in `.small-text`, and `.link-line` "Read Our Story →".
- **Motion:** media + content use `data-reveal` (scroll fade-up).
- **Copy rule:** only facts from the vinyasa-yoga-content skill's `verified-facts.md` (2010, founder, RYS 200/300/500, 100+ countries,
  2 campuses). Yoga Alliance wording = "registered school", never "certified".


### Courses (`.courses` + `.course-card` — `index.php`, after Welcome)
**v1 — arch cards (FINAL, user's choice).** Tried and rejected: editorial list, white boxed cards, overlay/glass cards.
- **Section:** `.spacing`, **white** (alternation). Centred head: `.sub-heading` "Our Courses in Ubud" + `h2.section-heading` + `.para` (max 760px).
- **Card (no box):** `.arch-img` photo (3:4) with a cream pill **tag** centred at the bottom (Foundation / Advanced / Retreat)
  → gold uppercase meta ("20 DAYS · UBUD, BALI" / "RETREAT · UBUD, BALI") → `h3.card-heading` link → `.small-text`
  → footer with hairline: price (Didot + small "FROM" / "DATES & FEES" label) + `.link-line` "View Course →" / "View Retreat →".
- **Desktop (≥992px):** 3 columns, middle card stepped down 64px.
- **Mobile/tablet (<992px): Swiper slider** (JS `[data-mobile-slider]` — shared with the course-page photo row, destroyed on desktop): 1 full slide (≥576px: 2 full slides), **no peeking card** (user). Custom controls: Didot "01 / 03" count · 1px progress line filling amber gold · prev/next `.circle-btn`.
- **CTA:** centred `.theme-btn--outline` "View All Courses".
- Data: `$courses` PHP array (img, alt, focus, tag, days, meta, title, text, label, price, url). `focus` → `.is-focus-mid` (60%) / `.is-focus-low` (72%).
- Photos: `200-hour-ttc.webp`, `300-hour-ttc.webp`, `yoga-retreat-img.webp` (user, Ubud).
- **Facts** (Aug 2026 snapshot — re-check before launch): Bali 200hr 20 days from $1,299; 300hr 25 days from $1,490 (needs a 200-hour certificate);
  retreat price not published → "On request". RYT wording: "eligible to apply for RYT 200".

### Why Us (`.why` + `.why-item` — `index.php`, after Courses)
**v2 — intro + feature grid** (v1 "3 points · arch photo · 3 points" was rejected; a royal-blue background was also rejected — user wants `.section-bg`).
- **Section:** `.section-bg spacing` (cream). Royal-blue titles, `$text-muted` text, `$amber-gold-dark` icons, `$line` hairlines.
  No superlatives ("best") — every point is a verifiable fact.
- **Desktop (≥992px):** grid `5fr 7fr`.
  - Left (sticky, top 110px): `.sub-heading` + h2 "A training you can trust" + `.para` → photo (`why-dining.webp`, 4:5) with a thin gold frame
    14px inside and a cream **rating pill** (royal-blue circle + gold star, Didot "4.8", "Google rating / 200+ reviews") bottom-left.
  - Right: **feature grid**, 2 columns, cells divided by hairlines (no filled boxes). Cell = 52px gold-ring icon + Didot number `01–08` (faded gold)
    → Didot title (20–24px, royal blue) → text (14px, `$text-muted`). Hover: icon ring fills royal blue (cream icon), number turns gold.
- **Mobile:** intro → photo (4:3) → features in 1 column (2 columns from 768px).
- **Icons:** `include/icons.php` → badge, mountain, shala, lotus, sprout, bed, globe, calendar, star.
- Data: `$reasons` PHP array (icon, title, text) — 8 points. "Elegant Rooms" (private/shared + vegetarian meals) verified for Rishikesh only → **confirm for Bali**.

### Achievements (`.achievements` + `.stat` / `.rating` — `index.php`, after Why Us)
- **Section:** `.spacing`, **white** (alternation). Very faint **logo watermark** (`logo.webp`, 5% opacity, up to 1000px wide) centred behind the numbers.
- **Head:** `.sub-heading` "Our Achievements" + h2 "Since 2010, in numbers".
- **Stats (`.stat`):** 4 items — big Didot count-up number (`%stat-number`, 44–72px, gold "+"), uppercase royal-blue label,
  script note in `$spacial-font` gold. Hairline dividers. 4 columns ≥992px, 2×2 below.
  Count-up JS formats thousands ("5,000").
- **Ratings strip (`.rating`):** between two hairlines; Didot score + gold star + "RATED" + platform name + its own review count.
  Google 4.8 (200+) · TripAdvisor 4.9 (36) · Yoga Alliance 4.4 (78+). Left out: Trustpilot (6 reviews), Tripaneer (user: looked like a TripAdvisor duplicate).
  **Never show 5 filled stars for a score under 5.** 3 columns ≥992px (score beside text); below 992px **Google full width on top + 2 below**,
  each cell stacked + centred (score → ★ RATED → name → review count on its own line). Watermark moves up behind the stats on mobile.
- Data: `$stats` + `$ratings` PHP arrays. ⚠ 5,000+ students conflicts with "3,000+ graduates" on the live Rishikesh page — owner to confirm.

### Slider controls (`.slider-controls`) — reusable for every Swiper
Didot "01 / 03" count · 1px progress line (Swiper progressbar, fills amber gold) · prev/next `.circle-btn` (prev arrow mirrored, disabled = 35% opacity).
`--mobile` hides it ≥992px. JS: spread `...controlOptions(wrap)` into the Swiper config (script.js) — wires count, progress and arrows.

### Testimonials (`.testimonials` — `index.php`, after Achievements)
**v2 — platform tabs.** Data: `$platforms` PHP array (google / trustpilot / tripadvisor → name, score, count, mark type, url, reviews[]).
- **Section:** `.section-bg spacing` (cream).
- **Centred head** (`.testimonials__head`, max 680px): `.sub-heading` "Student Stories" + h2 "In their own words" + `.para` → **`.review-tabs`** pills centred
  (ARIA tablist, arrow keys work).
- **Below:** grid `5fr 6fr` ≥992px → left **arch photo** (`.arch-img`, 4:5, max 460px, `testimonials-img.webp` = webp of `home/IMG_0675.jpg`; desktop only)
  · right the active platform panel.
  Tabs are **pills** in one row (segmented control, equal widths): brand-tinted logo chip · uppercase name (hidden <576px) · hairline · Didot score.
  Active pill = white, brand-tinted border + chip, score in the brand colour, soft shadow.
- **Right:** one **`.review-panel` per platform** (only the active one visible; Swiper created on first show; autoplay stops on hidden ones):
  summary row (logo · Didot score · platform-style rating marks · "N reviews on X") → stacked **`.review-card`s** (Swiper cards effect)
  → `.slider-controls` → `.link-line` "Read all reviews on X →".
- **Platform theming** (`.brand--google|trustpilot|tripadvisor` sets `--brand`, `--brand-mark`, `--brand-text`; colours in the `$brands` map,
  allowed exception to the palette rule because they are the platforms' own brand colours): card top border, avatar, quote mark, tab bar.
  Rating marks match each platform: **Google** = yellow ★, **Trustpilot** = green boxes with white star, **Tripadvisor** = green bubbles.
  `rating_marks($type, $rating)` (include/icons.php) draws a grey base row + coloured row clipped by `.is-fill-0 … .is-fill-100` (2% steps).
- Logos: `brand_icon('google'|'trustpilot'|'tripadvisor')` in include/icons.php (simplified marks in brand colours).
- Scores (verified): Google 4.8 (200+), Trustpilot 4.2 (6), Tripadvisor 4.9 (36).
- ⚠ **Reviews are SAMPLE text (user asked for placeholders)** — replace with real reviews from each platform (with permission) before launch.
  Profile links = `#` (TODO).

### Social (`.social` + `.social-card` — `index.php`, after Testimonials)
**Final: photo mosaic + brand-coloured account row** (user chose this over the 3 big platform cards).
- **Section:** `.spacing`, **white** (alternation). Centred head: `.sub-heading` "Follow Our Journey" + h2 "Life at the shala, every day" + `.para`.
- **Mosaic (desktop 4 cols × 2 rows):** tall photo · photo · photo · tall photo / tall · **cream Instagram card** (spans 2 cols) · tall.
  Card: gold Instagram icon, script "Follow us", Didot "on Instagram", `.link-line`. Photo hover: zoom + royal-blue veil + Instagram icon.
  **Mobile/tablet:** Instagram card full width on top, photos 2×2.
- **Account row (`.social-card.brand--{key}`) — open layout, NO boxes** (user): Instagram, Facebook, YouTube, X, WhatsApp
  (Yoga Alliance is excluded from this section). Each item: brand-filled 58px icon circle inside a soft halo ring of the brand colour
  → Didot name → brand-coloured uppercase label. Hover: icon lifts 4px, halo ring widens, brand underline draws under the name.
  Desktop: one row (flex), items divided by thin vertical `$line` hairlines. Tablet 3 cols, mobile 2 cols (odd last item centred).
  Colours (`$social-brands`): Instagram gradient (underline/label #DD2A7B), Facebook #1877F2, YouTube #FF0000, X #000000, WhatsApp #25D366.
- Links from `$social` — only WhatsApp is real; the rest are `#` (TODO). Photos reused from other sections.

### Gallery (`.gallery` — `index.php`, after Social, before Contact)
**Grid design = FINAL (user's choice).** An arch-photo slider was tried and rejected — "old design is much better".
- **Section:** `.section-bg spacing` (cream). Centred head: `.sub-heading` "Gallery" + h2 "Moments from Ubud" + `.para`.
- **Grid (desktop 4 cols × 6 rows, rows `fluid(110px, 140px)`):** full-height portrait (col 1, 6 rows) · wide (cols 2–3) · tall (col 4, 4 rows) ·
  two small (cols 2, 3) · panorama (cols 2–4, dining hall at `object-position: center 72%`).
  Mobile/tablet: 2 cols, tall items span 2 rows, wide items full width (`grid-auto-flow: dense`).
- **Tiles are buttons** (`data-gallery-item`, `data-label`, `data-title`). **No text on the photos** (user). Hover/focus: slow zoom + cream expand icon bottom-right.
  Label/title are shown only in the lightbox caption.
- **Lightbox** (`.lightbox`, custom, no library): cream overlay, photo + caption + "02 / 06", `.circle-btn` close / prev / next;
  keys ← → Esc, backdrop click closes, Lenis stops while open, focus returns.
- Data: `$gallery` PHP array (img, w, h, label, title, alt). Photos reused from other sections — add fresh campus shots.

### FAQ (`.faq` + `.faq-item` — `index.php`, after Gallery, before Contact, `id="faq"`)
**v2 — question list + answer panel** (user picked it over chips / 2-col cards; v1 was a sticky intro + `<details>` accordion).
- **Section:** `.spacing`, **white**. One markup for both layouts (`[data-faq]`, JS in script.js).
- **Desktop (≥992px):** board grid `5fr 7fr`, rows = `$faq-count + 2` (intro · questions · help).
  - Left: `.sub-heading` "FAQs" + h2 "Questions, answered" + `.para` → **question list** (`button` per row: faded gold Didot number · Didot question in `$text-muted`
    · gold arrow; active = royal blue text, gold number, arrow slides in; hairlines between) → "Still have a question?" row (gold-ring `?` icon + `.link-line` → `#contact`).
  - Right: **cream panel** spanning all rows with an `.arch-img` photo (`overview-img-1.webp`, 38% wide, bottom-right). All answers sit in that one cell
    (`.faq-item { display: contents }`); only `.is-active` shows: big gold Didot count "03 / 08" → question (Didot 22–30px) → 48px gold rule → answer.
    Switch = old answer fades out in 0.2s, new one fades up after it (no overlap). One answer is always open on desktop.
- **Mobile/tablet:** plain accordion — answer opens under its question (`grid-template-rows` 0fr → 1fr), arrow points down → up, can close all. Panel/photo hidden.
- **Data:** `$faqs` PHP array (q, a) → also **FAQPage JSON-LD**. Change `$faq-count` in style.scss if the number of questions changes.
- **Copy rule:** answers use only verified facts (200hr open to beginners · RYS 200/300/500 + "eligible to apply" for RYT · Bali 200hr 20 days from $1,299,
  300hr 25 days from $1,490 · 300hr needs a 200hr certificate · Bali day starts 05:00 · 15–20 students · 90% attendance · refund/transfer policy).
  ⚠ Prices = Aug 2026 snapshot — re-check before launch.

### Contact (`.contact` — `index.php`, last section before the footer, `id="contact"`)
- **Section:** `.section-bg spacing` (**cream** — FAQ before it is white). Form card is **white** on the cream section.
- **Desktop:** 12-col grid — **white form card** (cols 1–6, soft shadow) overlaps a **Google Map** (cols 5–12, min 640px).
  Map iframe toned to the palette: `filter: grayscale(.9) sepia(.15) contrast(1.05)`. Frosted white **location card** on the map
  (royal-blue pin circle with gold icon, Didot name, address, `.link-line` "Get directions →" → Google Maps).
  Mobile/tablet: card → map (360px) stacked; location card sits at the bottom of the map.
- **Form card:** `.sub-heading` "Get in Touch" + h2 "Begin with a conversation" + `.para` → `.contact-form` (2 cols ≥768px):
  name, email, phone/WhatsApp, course select (200hr / 300hr / Retreat / Not sure), message (full width) → `.theme-btn` "Send Enquiry →".
- **Fields (`.field`) — no boxes:** bottom hairline only, **floating label** (input first, label after; `placeholder=" "` +
  `:placeholder-shown` floats it to a small gold uppercase label), gold line draws across on `:focus-within`. Select = custom chevron, label always floated.
- **Contact strip (`.contact-item`):** Call · WhatsApp · Email · Visit, gold-ring icons, hairline dividers, 4 cols ≥992px (`1fr 1fr 1.4fr 1.2fr`),
  2 at 768px, stacked on mobile. Email breaks after "@" (`<wbr>`). Hover: icon ring fills royal blue.
- ⚠ The form has **no backend yet** (`action="#"`) — needs a mail handler before launch.
---

### Page Hero (`.page-hero` + `.breadcrumb`) — reusable top of every inner page (style.scss section 21)
**v3 (current, user): `.page-hero--overlay` on About, Course and Retreat** — no card; only breadcrumb + h1 centred in white on the photo,
darker veil, short gold rule under the h1. The v2 card description below is kept for reference (its styles are still in the file).
**v2 — photo + cream card** (user chose it; v1 = blurred video with centred white text was "could be better"; user wants a **photo, not video** here).
- Full-width photo (`.page-hero__bg img`, cover, slow settle-zoom on load) with a veil that is dark only at the top (keeps the transparent desktop header readable).
  Height `clamp(480px, 76vh, 700px)` desktop · `clamp(300px, 52vh, 420px)` mobile, starts under the white mobile header, inset 12px left/right on mobile.
- **Cream card** (`.page-hero__card`, max 660px, soft shadow) overlaps the photo's bottom-left edge (`margin-top: calc(-1 * fluid(96px, 260px))`):
  `.breadcrumb` (muted links, gold dash, current page gold) → `.accent-text` (gold) → **`h1.main-heading`** (royal blue, 34–56px) → 48px gold rule → muted text.
- About page photo: `about-us/banner-img.webp` (user, 1920×1280 — students arm in arm in the shala). Page images live in `assets/images/<page>/`. Add BreadcrumbList JSON-LD on each page.
- ⚠ `fluid()` only works with positive values — for a negative size use `calc(-1 * #{fluid(a, b)})`.

### About page (`about-us.php`, style.scss section 22)
Order / backgrounds: Page hero → **Story** (white) → **Founder** (bg) → **Approach** (white) → **Campuses** (bg) → **Trust** (white) → **CTA** (bg) → Footer.
- **Story:** `6fr 5fr` — sub-heading + h2 "Rooted in Rishikesh since 2010" + 2 paras + 4 facts (`%stat-number`, count-up) | two overlapping arches (`yoga-retreat-img`, `about-us/img-1.webp` sunset with ring) over a `$cream-dark` tonal arch.
- **Founder:** `5fr 7fr` — `.arch-img` portrait (`guruji.webp`, 3:4, max 420px / 320px mobile) + cream "Founder · Since 2010" pill | name h2, gold uppercase credentials, bio, "Teaches" pills (thin royal-blue ring, Didot).
- **Approach:** centred head + 4 **pillars** (gold-ring icon from `icon()`, faded gold number top-right, Didot title, muted text), hairline dividers, 4 cols ≥1200 / 2 cols ≥768 / 1 col.
- **Campuses:** 2 columns — `.arch-img` media (Rishikesh = banner video, Ubud = `overview-img-1`) with cream pill tag → `card-heading` → text → address + phone between hairlines → "Get directions →".
- **Trust (v2, user picked 'three course levels'):** centred head (sub-heading "Registration", h2 "Registered with Yoga Alliance", para) → 3 `.rys-level` columns between hairlines
  (gold "RYS" label · Didot 64–96px number · title Foundation / Advanced / Complete path · muted text · gold uppercase "eligible to apply for RYT …" line pushed to the bottom)
  → ratings in one centred line (★ score · name · review count, hairline dividers) + "View our Yoga Alliance profile →". Data: `$rys_levels`, `$about_ratings`.
- **CTA:** script "Begin your journey" + h2 + para + `.theme-btn` "View Courses" (→ `#courses` on home) + `.theme-btn--outline` "Contact Us" (→ `#contact`).
- All copy = verified facts only. ⚠ 5,000+ students vs 3,000+ (owner to confirm).

### Header — per-page
- `include/header.php` builds the nav from `$nav_links` and marks the current file `is-active` + `aria-current`.
- `.site-header--home` is added on index.php only: there the mobile header logo is hidden until scroll (logo is in the banner). On other pages the mobile header logo always shows.

### Course page (`200-hour-yoga-teacher-training-in-bali.php`, style.scss section 23) — template for every course page
Order / backgrounds: Page hero `.page-hero--overlay.page-hero--course` (**no card — only breadcrumb + h1 centred in white on the photo**, user; darker veil, gold rule under h1; quick facts strip under the photo) → **Overview** (bg) → **Curriculum** (white)
→ **Daily schedule** (bg) → **Fees + batches** (white, `#fees`) → **Included / not included** (bg) → **Teachers** (white) → **Good to know** (bg) → **FAQ** (white, reuses section 20) → **CTA** (bg, reuses `.about-cta`).
- `.course-head` = shared centred section head (sub-heading + h2 + para).
- **Quick facts:** `.course-facts` strip under the hero photo — 6 in one row ≥1200, 3 cols ≥768, 2 cols mobile.
  Each item: 44px gold-ring icon + `%stat-label` + Didot value, hairlines only.
- `.page-hero--overlay` (section 21) is reusable for any inner page that wants only breadcrumb + h1 on the photo (markup: `.page-hero__overlay.container` inside `.page-hero__bg`).
- **Overview (v2, user):** centred text (max 960px) + 4 tick points in one row → **`.course-gallery`**: 5 photos edge to edge (outside `.container`, 12–24px side gap).
  **v3 photo shape (user, from a reference sketch): rounded rectangles (`$gallery-radius` 12–20px, cream hairline 10px inside — no longer `.arch-img`) in a rising arc** —
  columns `1fr 1.2fr 1.7fr 1.2fr 1fr`, centre biggest (5:6) at the top, 2nd/4th (3:4.2) `margin-top: 7vw`, outer (1:1.05) `17vw`, so tops AND bottoms step down outwards
  (slides need `height: auto` over swiper.css). **v3.1 (user: "better"):** arc softened to `4vw` / `11vw`, photos **fan out** (rotate ±2° / ±4°, origin bottom centre),
  soft royal-blue-dark shadow, side photos slightly muted (`saturate(.85)`) until hover (lift 10px + full colour), centre always full colour;
  swiper container `overflow: visible` ≥992 so corners/shadows aren't clipped; side padding 2.5vw. Reveal: photos rise + fan out from the centre
  (`gallery-fan` keyframes, delays 0 / .15s / .3s). v2 was 5 arches bottom-aligned with wave heights. <992px: **Swiper** `[data-mobile-slider="single"]` — always 1 full photo,
  swipe only, **no controls** (user), 3:4 mobile / 4:3.4 tablet. Data: `$overview_photos`.
- **Curriculum (v2, user picked "grouped in 3 pillars"):** `.pillars` → 3 `.pillar-col` (Practice · Knowledge · Teaching), centred, vertical hairlines between (≥992).
  Each: 64px gold double-ring icon (lotus / globe / users, fills royal blue on hover) · Didot title · muted intro · gold top rule · hairline list of subjects
  (Didot name only — no description in the row, user). Stacked on mobile. Data: `$curriculum` = groups with `subjects[]`.
- **Subject popups (user):** every subject row is a `button.pillar-col__subject` (small "+" ring right, row turns cream + gold title on hover) → opens a
  `<dialog class="modal">` with pillar label + icon, Didot title + gold rule, detail text, "Key topics" pills. Data per subject: `detail`, `items[]`.

### Popup (`.modal`) — reusable (style.scss section 23, JS in script.js)
- Native `<dialog class="modal" id="…">` + `.modal__box`; open with `[data-modal-open="id"]`, close with `[data-modal-close]`, Esc or backdrop click.
- Desktop (≥768): centred cream window, max 620px, thin gold inner frame, soft shadow, fade-up. Mobile: **bottom sheet** (full width, gold top line, slides up).
- Backdrop = royal-blue-dark 55% + blur. Lenis stops + body `.modal-open` while open; focus returns to the button on close.
- **Daily schedule (v4, user: "one round watch in the centre with the schedule written on it"):** `.watch` = SVG watch (viewBox 600, max 620px):
  gold crown · cream-dark bezel · white face · 70 ticks (gold long tick per entry) · dotted inner ring. The 14 entries are written **around the dial**
  at equal angles (Didot time + small uppercase short name; meals' time gold; mobile <768: times only). Active entry: gold text + glow, pulsing gold dot
  on the face edge, short gold **hand** turns to it (`--angle`, cumulative, shortest way). Centre (HTML) = icon · big Didot time · "until …" · full name.
  JS `[data-clock]`: hover / click / focus+Enter selects; auto-steps every 2.6s once visible until the first interaction (off with reduced motion).
  Notes = 3 white gold-bordered pills. Data: `$schedule` (time, end, session, short, icon, meal). (v2 clock cards + v3 24h arc dial with list were replaced.)
- **Photo collages beside the watch (user, ≥1200px only):** `.schedule__stage` grid `1fr · watch (max 560) · 1fr`; each side a 2-column staggered
  collage (`.schedule__collage`, 4 photos, 3:4, 14px radius, even photos 44px lower) **tilted in towards the watch** (`rotateY(±22deg)` + slight
  rotateZ, perspective 1400px; eases to ±14° on hover). Decorative (`aria-hidden`, empty alt). Photos in `$collage` — replace with real campus shots.
- **Fees layout v4 (user: cards left, room photos right, photos outside the container):** head centred in `.container`, then `.fees__split`
  (≥1200: **equal halves** `1fr 1fr` so cards stay narrow and arches tall, `padding-left: $container-edge` = the container's content edge, so the left
  column lines up with the page and the right column runs to the screen edge). Left `.fees__main` = v2 room cards **2×2 only**. **Batches are full width
  below the split** (own `.container`). Right **`.room-view`**: frame `position: absolute; inset: 0` ≥1200 → **exactly as tall as the cards**,
  big curved top-left corner, one photo per room crossfading (0.9s) with a slow settle-zoom, frosted cream caption card bottom-left
  ("01 / 04" · Didot room name · "Female only · from USD 1,299"), Didot room **tabs** in a frosted cream pill **top-right on the photo** ≥1200
  (under the photo below 1200; gold underline on the active one). v4 (7fr/5fr, batches in the left column, sticky photo) left the photo shorter than the cards.
  **Hover / focus a card or click a tab → that room's photo** (`[data-room-view]`, `[data-room-card]`, `[data-room-tab]` in script.js); active card gets the stronger gold frame.
  <1200: photo panel on top, full width edge to edge (4:3 phone / 16:9 tablet), cards (4 in a row ≥992) + batches below.
  Data: `img`, `w`, `h` in `$fees` — ⚠ **currently campus placeholders**; real photos go to `assets/images/rooms/`.
  (v3 = photo inside each arch card + plan medallion — replaced by v4 the same day.) Cards themselves = v2:
- **Fees (room cards v2, user: "make them better"):** 4 cream **arch** cards (closed gold inner frame): **top-down room plan** SVG (`$room_svg($beds)` in the page —
  gold walls with a door gap + dotted door swing, white beds with cream pillows: 6 / 4 in two rows, 2 side by side, 1 single bed; beds tint gold on hover)
  · Didot room name · gold-outline pill (Female only / Shared room / Your own room) · gold rule · big Didot price with small USD · "20 days · room & meals"
  **Phones (<576):** one wide horizontal card per row (plan left · name, pill, price right · Book Now full width below); 576–991: 2 arch cards; 992+: 4.
  · full-width royal-blue outline "Book Now →" (fills on hover + gold underline grows under the label, like every .theme-btn). Hover: card lifts + soft shadow. Then the **batches** list (Didot dates, outline "Book →"). Never show seat counts.
- **Inclusions (v2, user picked "luggage tag / ticket"):** centred head ("Your Fee" / "What is included") → two **`.ticket`** boarding-pass cards (`7fr 4fr`):
  white, 18px radius, soft shadow; head band (included = royal blue with gold "✈ Ubud · Bali"; not included = cream-dark, "Plan ahead"); list with dashed
  dividers and round gold **stamps** (tick, rotated −12°; not-included = muted ×); **perforated tear line** with cream half-circle notches; **stub**
  (Course · Duration · From + decorative PHP barcode `$barcode()`) / "Ask us →". Hover lifts. Stacked on mobile.
- **Teachers:** 3 columns, `.arch-img` photo or cream arch with Didot initials (no photo yet).
- **Good to know:** 3 columns (Who can join · Certification · Getting here) with gold-ring icons and hairline lists.
- New icons in `include/icons.php`: clock, users, chat, check, close, plane, sun.
- JSON-LD: BreadcrumbList + Course + FAQPage. Data arrays at the top of the page (`$facts`, `$curriculum`, `$schedule`, `$fees`, `$batches`, `$included`, `$not_included`, `$teachers`, `$course_faqs`).
- ⚠ Content from the live Bali 200hr page (read 31 Oct 2026). Live page says "certified" (we use "registered" / "eligible to apply"), lists the Bali address as
  "No 77 A, Jl. Bisma" (rest of site: Jl. Raya Andong), and gives a 30-day reschedule notice (refund policy page: 15 days) — owner to confirm. Hero photo = about-us banner (TODO course photo).

### Retreat page (`yoga-retreat-in-bali.php`, style.scss section 24) — relaxed "holiday" feel (user: retreats are for travelling → chill UI)
Order / backgrounds: Page hero (jungle photo `retreat/retreat-banner.webp` + cream card + `.retreat-chips`) → **Durations** (white) → **A gentle rhythm** (bg)
→ **Postcards** (white) → **Included** (bg, reuses `.ticket`) → **Stay & food** (white) → **Packing** (bg) → **How to book** (white) → **FAQ** (bg, reuses section 20) → **CTA** (white).
- **Durations = polaroids (v2 "peaceful", user):** 5 warm **cream** photo cards (3/5/7/14/21 days), barely tilted (−1° / 0.8° / −0.4°, even ones 10px lower),
  very soft shadow, film-like photos (`saturate(.82) sepia(.08)`), slow 0.9–1.2s hover (straighten + lift);
  quiet white gold-outline pill tag ("Most popular" 5 days, "Recommended" 7 days); Parisienne "5 days" caption, Didot title, price ("USD 699 · private room · 4 nights"
  only for 5 days — others "Ask us" / "On request"). 5 per row ≥1200, auto-fit ≥768, 2 per row on phones.
  Under it a dashed-gold cream **5-day box** (what's included + "From USD 699" + `.theme-btn`).
- **Rhythm:** Morning · Day · Evening stops on a dotted gold line (white round icons, Parisienne label) + white pill "Arrival day · check-in 11:00–14:00 · welcome 15:30".
- **Postcards (v2 photo postcards, user):** white cards (±0.8° tilt, soft shadow, slow hover) · film-tone photo (4:3.2) with a **postage stamp** top-right
  (white perforated paper, cream panel + gold frame, royal-blue icon, one-line gold label; straightens on hover) and a white round **"Ubud · Bali" postmark**
  with wavy cancel lines bottom-left · Parisienne title + muted text. Icons redrawn: temple (Balinese split gate), terrace (palm + rice terraces), wave (sun over sea),
  music (kirtan notes), new `flower` (frangipani, wellness). Photos = campus placeholders — TODO real temple / rice field / beach photos.
- **Stay:** arch photo + 3 cream rounded cards (Private room · Shared room · Sattvic meals).
- **Packing:** white **luggage tag** (clip-path cut corners, gold ring hole, royal-blue rule, checkbox list), tilted 1.5°.
- **How to book:** 6 numbered circles on a dashed gold route (6 in a row ≥1200, 3 ≥768); last stop filled gold = destination.
- New icons: temple, terrace, wave, leaf, music, suitcase.
- ⚠ Live page copies the teacher-training timetable, says "accredited", lists address "Jl. Bisma" and has conflicting refund text — none of that is used.

## 12. SCSS Writing Rules

`style.scss` must be written as proper SCSS — never as flat CSS pasted into a `.scss` file.

**Use**
- **Variables** for every colour, font, spacing value, breakpoint and transition (`$royal-blue`, `$heading-font`, `$transition`).
- **Nesting** that follows the HTML: child elements, `&:hover`, `&:focus`, `&.is-active`, `&::before`, `&__element`, `&--modifier`.
- **Mixins** for repeated patterns — e.g. `@mixin respond($bp)` for media queries, `@mixin flex-center`, `@mixin transition`.
- **Media queries nested inside the selector** through the mixin, not collected at the bottom of the file.
- **Maps + `@each`** where a set of classes is generated (e.g. colour helper classes from a `$colors` map).
- `@extend` / placeholder selectors (`%name`) only when it really saves repetition.

**Avoid**
- Repeating the same selector prefix on many lines (`.header .nav`, `.header .nav a`, ...) — nest it.
- Raw HEX, px font sizes or magic numbers inside components — use variables.
- Nesting deeper than 3–4 levels.
- `!important` (unless overriding a library and there is no other way — add a comment).

**Example**
```scss
// wrong — plain CSS inside .scss
.header { background: #FBF8F1; }
.header .nav a { color: #03256F; }
.header .nav a:hover { color: #021A4F; }
@media (max-width: 991px) { .header .nav { display: none; } }

// right — proper SCSS
.header {
  background: $cream;

  .nav {
    @include respond(lg-down) { display: none; }

    a {
      color: $royal-blue;
      @include transition(color);

      &:hover { color: $royal-blue-dark; }
    }
  }
}
```

**File order inside `style.scss`** (one file, divided with comment headers):
1. Font import · 2. Variables & maps · 3. Mixins · 4. Base / reset · 5. Typography classes · 6. Helpers (colours, spacing, container) · 7. Buttons · 8. Loader · 9. Header · 10. Sections (one block per section) · 11. Sliders · 12. Footer

---

## 11. Change Log

| Date       | Change                                                                 |
|------------|------------------------------------------------------------------------|
| 2026-10-30 | v1 draft (forest green + gold, Cormorant/Jost) — replaced.             |
| 2026-10-30 | v2 — Royal blue `#03256F` (from logo) + cream theme; fonts GFS Didot / Lato / Parisienne; container 1350px; custom header/footer/sliders; SVG loader; Lenis smooth scroll; typography classes; no-boxy / minimal-styling rules. |
| 2026-10-30 | Accent changed from muted gold `#B89B5E` to **amber gold** `#C9952B` (+ dark `#8C6210` for text on cream, light `#E0B04A` for hover on blue); gold now the official luxury accent (~10%). |
| 2026-10-30 | Header (desktop transparent → cream on scroll, mobile always cream) and Home Banner (video bg, cream band vertical on mobile / horizontal on desktop, centre video circle) built. Colour helpers renamed `.clr-*`. |
