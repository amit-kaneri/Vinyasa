<!DOCTYPE html>
<html lang="en">
<head>
    <?php include 'include/css.php'; ?>
</head>
<body>

<?php include 'include/header.php'; ?>

<main class="retreat-page">

    <?php
    /* Yoga Retreat in Bali — relaxed "holiday" page (polaroids, postcards, tickets, luggage tag).
       Facts from the live page (vinyasayogaacademy.com/yoga-retreat-in-bali.php, read 31 Oct + 2 Nov 2026). Text only —
       never use images from that site (user); every photo here is from our own assets/images.
       Left out on purpose: the live page's timetable (copied from the teacher training), "Yoga Alliance accredited" wording,
       student/country counts and the Jl. Bisma address (rest of the site uses Jl. Raya Andong) — owner to confirm.
       Only the 5-day retreat has a published price; the others are "on request". */
    $arrow = '<svg viewBox="0 0 22 10" fill="none" stroke="currentColor" stroke-width="1" aria-hidden="true"><path d="M0 5h21M17 1l4 4-4 4"/></svg>';
    $book_url = $link . '#contact'; // TODO: booking / enquiry page

    $durations = [
        ['days' => 3,  'title' => 'A genuine reset',  'text' => 'A short pause to slow down, breathe and practise.',                          'img' => 'assets/images/about-us/img-1.webp',   'price' => 'Ask us'],
        ['days' => 5,  'title' => 'Our most popular', 'text' => 'Pranayama, asana and meditation, with three guided excursions.',             'img' => 'assets/images/yoga-retreat-img.webp', 'price' => 'USD 699', 'note' => 'private room · 4 nights', 'tag' => 'Most popular'],
        ['days' => 7,  'title' => 'Time to change',   'text' => 'Real physical and mental shifts, with Balinese spiritual excursions.',       'img' => 'assets/images/overview-img-1.webp',   'price' => 'Ask us', 'tag' => 'Recommended'],
        ['days' => 14, 'title' => 'A new routine',    'text' => 'Build a lasting daily practice, with philosophy and a gentle detox.',        'img' => 'assets/images/why-dining.webp',       'price' => 'On request'],
        ['days' => 21, 'title' => 'Full immersion',   'text' => 'Three weeks to live the practice, at your own pace in Ubud.',               'img' => 'assets/images/overview-img-2.webp',   'price' => 'On request'],
    ];

    // Intro (live page, re-read 2 Nov 2026) — quick facts + who the retreat is for
    $retreat_facts = [
        ['num' => '3–21', 'unit' => 'days',            'label' => 'Retreat length'],
        ['num' => '1st',  'unit' => 'of every month',  'label' => 'Start date'],
        ['num' => '3',    'unit' => 'meals a day',     'label' => 'Sattvic vegetarian'],
        ['num' => 'All',  'unit' => 'levels',          'label' => 'Beginners welcome'],
    ];
    // "Who it is for" round slider — photos are placeholders from our own assets (user will send retreat photos)
    $retreat_for = [
        ['title' => 'Busy minds',          'text' => 'Busy people who find it hard to switch off',                      'img' => 'highlights/hightlight-img-14.webp', 'w' => 600, 'h' => 800, 'alt' => 'Quiet spa room with a flower offering'],
        ['title' => 'Practitioners',       'text' => 'Practitioners who want to feel connected to their yoga again',  'img' => 'course/img-1.webp',                 'w' => 600, 'h' => 900, 'alt' => 'Students practising aerial yoga in the shala'],
        ['title' => 'New chapters',        'text' => 'Anyone at a turning point, such as a new job or a new chapter', 'img' => 'about-us/img-1.webp',               'w' => 600, 'h' => 900, 'alt' => 'Sunset over the jungle in Ubud'],
        ['title' => 'Beginners',           'text' => 'Complete beginners, as no experience is needed',                 'img' => 'overview-img-1.webp',               'w' => 600, 'h' => 800, 'alt' => 'Students studying together on cushions in the shala'],
        ['title' => 'Solo travellers',     'text' => 'Solo travellers, since most guests come on their own',          'img' => 'highlights/highlight-img-5.webp',   'w' => 800, 'h' => 533, 'alt' => 'Two people cycling across a bridge above the jungle'],
        ['title' => 'More than a holiday', 'text' => 'Travellers who want more than a holiday',                       'img' => 'home/intro-img-1.webp',             'w' => 600, 'h' => 900, 'alt' => 'Fire ceremony with a clay bowl on marigold flowers'],
        ['title' => 'A full reset',        'text' => 'Anyone who needs a physical, mental or emotional reset',        'img' => 'highlights/highlight-img-3.webp',   'w' => 800, 'h' => 532, 'alt' => 'Bathtub filled with flower petals at dusk'],
    ];

    $five_day = ['4 nights in a private room', 'Three vegetarian meals a day', 'Daily yoga, meditation, philosophy and workshops', 'Three guided excursions', 'One Balinese wellness treatment'];

    $rhythm = [
        ['icon' => 'sun',   'part' => 'Morning', 'text' => 'Asana practice, pranayama and meditation in the cool of the morning.'],
        ['icon' => 'leaf',  'part' => 'Day',     'text' => 'Philosophy talks and workshops, guided trips around Ubud, and time to rest.'],
        ['icon' => 'moon',  'part' => 'Evening', 'text' => 'An evening asana class, shared dinner and the occasional kirtan.'],
    ];

    $excursions = [
        ['icon' => 'lotus',   'img' => 'assets/images/home/intro-img-1.webp', 'title' => 'Welcome ceremony',     'text' => 'Your stay begins in white, with marigold garlands.',  'stamp' => 'Welcome'],
        ['icon' => 'temple',  'img' => 'assets/images/overview-img-1.webp', 'title' => 'Tirta Empul',          'text' => 'The sacred water temple near Ubud, built in 926 AD.',  'stamp' => 'Temple'],
        ['icon' => 'terrace', 'img' => 'assets/images/200-hour-ttc.webp', 'title' => 'Tegallalang',          'text' => 'A walk through centuries-old rice terraces.',          'stamp' => 'Rice'],
        ['icon' => 'wave',    'img' => 'assets/images/about-us/img-1.webp', 'title' => 'Beach yoga',           'text' => 'A practice session by the sea.',                      'stamp' => 'Ocean'],
        ['icon' => 'music',   'img' => 'assets/images/yoga-retreat-img.webp', 'title' => 'Kirtan evenings',      'text' => 'Singing and celebration together after dinner.',       'stamp' => 'Kirtan'],
        ['icon' => 'flower',  'img' => 'assets/images/testimonials-img.webp', 'title' => 'Balinese wellness',    'text' => 'One wellness treatment is part of the 5-day retreat.', 'stamp' => 'Wellness'],
    ];

    $included = [
        'Private room with en-suite bathroom, or a shared twin room',
        'Breakfast, lunch and dinner — sattvic vegetarian',
        'Morning and evening asana every day',
        'Daily pranayama and meditation',
        'Guided cultural excursions and outdoor trips',
        'Welcome and closing ceremonies',
        'Free Wi-Fi on campus',
        'Fresh bedding and towels',
    ];
    $not_included = [
        'Flights and airport transfers',
        'Visa fees',
        'Medical or travel insurance',
        'Air-conditioning (USD 150 per month; rooms have a fan)',
        'Extra excursions, spa treatments and shopping',
    ];

    $packing = ['2–3 sets of breathable yoga clothes', 'A light long-sleeved layer for early mornings', 'Flip-flops and one pair of closed shoes', 'Sunscreen and insect repellent', 'A refillable water bottle', 'A sarong for temple visits', 'One set of white clothes for the welcome ceremony', 'A journal — and an open mind'];

    $retreat_faqs = [
        ['q' => 'Do I need yoga experience?',           'a' => 'No. The retreat is open to beginners and experienced practitioners. On the first day the teachers get to know your level.'],
        ['q' => 'Which length should I choose first?',  'a' => 'For a first retreat we recommend the 5-day programme. If you can stay longer, 7 days gives time for real change.'],
        ['q' => 'When do retreats start?',              'a' => 'Every month, on the 1st. Custom lengths, such as 4 or 10 days, are possible on request.'],
        ['q' => 'When is the best time to come?',       'a' => 'Retreats run all year. April to October is the driest season; November to March is wetter, quieter and cheaper.'],
        ['q' => 'Can I come on my own?',                'a' => 'Yes. Most guests travel solo.'],
        ['q' => 'Can you cater for my diet?',           'a' => 'All meals are sattvic vegetarian. Vegan, gluten-free and allergy needs can be met if you tell us when you book. On Sundays, lunch and dinner are at local cafés nearby.'],
        ['q' => 'How do I get from the airport?',       'a' => 'Fly into Ngurah Rai International Airport (DPS). Ubud is about 1.5 hours by car. We can arrange a paid pickup, or you can use Grab, Gojek or a prepaid taxi.'],
        ['q' => 'Can I stay for a different length?',   'a' => 'Yes. Besides 3, 5, 7, 14 and 21 days we can plan a custom stay, such as 4 or 10 days. The 14- and 21-day retreats are planned with you on request.'],
        ['q' => 'Do I need a visa for Bali?',           'a' => 'Most nationalities get a 30-day visa on arrival, which can be extended once. Please check the rules for your passport before you travel.'],
        ['q' => 'Is it safe to travel alone as a woman?', 'a' => 'Bali is one of the safer places in Southeast Asia for women travelling alone, and the campus is looked after by our team.'],
        ['q' => 'Are there any house guidelines?',      'a' => 'The campus is vegetarian and free of alcohol and smoking. We ask for modest clothing and silence on campus after 20:00.'],
        ['q' => 'What if my plans change?',            'a' => 'The deposit is non-refundable, but it can be used for a retreat in another month. Fees are not refunded once the retreat has started. Please read the full policy before you book.'],
    ];

    $breadcrumb_schema = [
        '@context'        => 'https://schema.org',
        '@type'           => 'BreadcrumbList',
        'itemListElement' => [
            ['@type' => 'ListItem', 'position' => 1, 'name' => 'Home',     'item' => $link],
            ['@type' => 'ListItem', 'position' => 2, 'name' => 'Retreats', 'item' => $link . 'yoga-retreat-in-bali.php'],
        ],
    ];
    ?>

    <!-- Page hero — only breadcrumb + h1 on the jungle photo (.page-hero--overlay, user) -->
    <section class="page-hero page-hero--overlay">
        <div class="page-hero__bg">
            <img src="<?=$link?>assets/images/retreat/retreat-banner.webp" alt="Guests sharing a meal in the open-air pavilion above the jungle in Ubud" width="1920" height="1080" fetchpriority="high">

            <div class="container page-hero__overlay">
                <nav class="breadcrumb" aria-label="Breadcrumb">
                    <ol>
                        <li><a href="<?=$link?>">Home</a></li>
                        <li aria-current="page">Retreats</li>
                    </ol>
                </nav>
                <h1 class="main-heading">Yoga Retreat in Bali</h1>
            </div>
        </div>

        <script type="application/ld+json"><?= json_encode($breadcrumb_schema, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE) ?></script>
    </section>

    <!-- Intro (white, user picked "two overlapping photos") — ≥992: big arch photo + small oval photo overlapping it (left) ·
         heading, text, 4 bold stats (right). "Who it is for" is its own section below. Content from the live page.
         Photos = placeholders from our own assets (user will send retreat photos). -->
    <section class="retreat-intro spacing">
        <div class="container">
            <div class="retreat-intro__grid">
                <div class="retreat-intro__media" data-reveal>
                    <figure class="arch-img retreat-intro__main">
                        <img src="<?=$link?>assets/images/yoga-retreat-img.webp" alt="Guests practising together at the Ubud campus" width="600" height="1066" loading="lazy">
                    </figure>
                    <figure class="arch-img arch-img--ring retreat-intro__side">
                        <img src="<?=$link?>assets/images/about-us/img-1.webp" alt="Sunset over the jungle in Ubud" width="600" height="900" loading="lazy">
                    </figure>
                    <span class="retreat-intro__tag" aria-hidden="true">Ubud · Bali</span>
                    <span class="retreat-intro__seal" aria-hidden="true"><small>Starts every</small><strong>1st</strong><small>of the month</small></span>
                </div>

                <div class="retreat-intro__text" data-reveal>
                    <span class="sub-heading">Yoga Retreat in Ubud</span>
                    <h2 class="section-heading">A pause, not just a holiday</h2>
                    <p class="para">A retreat in Ubud is time away from everyday life. It is not a fitness programme. Every day you practise yoga, breathwork and meditation, eat simple vegetarian food and see the sacred side of Bali on guided visits.</p>
                    <p class="para">Retreats start on the 1st of every month and last from 3 to 21 days. Your room, all meals, classes and excursions come in one price, and the teaching is rooted in the Himalayan tradition of Rishikesh, where the school began in 2010.</p>

                    <dl class="retreat-intro__facts">
                        <?php foreach ($retreat_facts as $f): ?>
                        <div>
                            <dt><?= $e($f['label']) ?></dt>
                            <dd><strong><?= $e($f['num']) ?></strong> <span><?= $e($f['unit']) ?></span></dd>
                        </div>
                        <?php endforeach; ?>
                    </dl>
                </div>
            </div>
        </div>
    </section>

    <!-- Who it is for (section-bg, user: own section + round slider) — 7 round photo cards in a Swiper: round photo with a gold ring,
         royal-blue number disc on its lower edge, title + text below. 1.3 cards (phone) · 2.3 · 3.3 · 4 (≥1200), shared slider controls.
         JS: script.js [data-round-slider]. Photos are placeholders from our own assets. -->
    <section class="retreat-for section-bg spacing">
        <div class="container">
            <div class="retreat-for__head" data-reveal>
                <div>
                    <span class="sub-heading">Who It Is For</span>
                    <h2 class="section-heading">Is this retreat for you?</h2>
                </div>
                <p class="para">Most guests come on their own, from every walk of life, and no experience is needed. If one of these sounds like you, you will feel at home.</p>
            </div>

            <div class="retreat-for__slider" data-round-slider data-reveal>
                <div class="swiper">
                    <ul class="swiper-wrapper">
                        <?php foreach ($retreat_for as $i => $p): ?>
                        <li class="swiper-slide round-card<?= $i % 2 ? ' round-card--low' : '' ?>">
                            <div class="round-card__media">
                                <figure class="round-card__photo">
                                    <img src="<?=$link?>assets/images/<?= $e($p['img']) ?>" alt="<?= $e($p['alt']) ?>" width="<?= $p['w'] ?>" height="<?= $p['h'] ?>" loading="lazy">
                                </figure>
                            </div>
                            <h3 class="round-card__title"><?= $e($p['title']) ?></h3>
                            <p class="round-card__text"><?= $e($p['text']) ?></p>
                        </li>
                        <?php endforeach; ?>
                    </ul>
                </div>

                <!-- pagination dots (user) between the arrows -->
                <div class="slider-controls slider-controls--dots">
                    <button type="button" class="circle-btn slider-controls__prev" aria-label="Previous"><?= $arrow ?></button>
                    <div class="slider-controls__dots"></div>
                    <button type="button" class="circle-btn slider-controls__next" aria-label="Next"><?= $arrow ?></button>
                </div>
            </div>
        </div>
    </section>

    <!-- Durations — tilted polaroids (white) -->
    <section class="escapes spacing" id="durations">
        <div class="container">
            <div class="course-head" data-reveal>
                <span class="sub-heading">Choose Your Escape</span>
                <h2 class="section-heading">How long would you like to stay?</h2>
                <p class="para">Every retreat follows the same gentle rhythm. Stay for a few days to reset, or a few weeks to build a new routine.</p>
            </div>

            <ul class="polaroids" data-reveal>
                <?php foreach ($durations as $d): ?>
                <li class="polaroid<?= !empty($d['tag']) ? ' polaroid--tagged' : '' ?>">
                    <?php if (!empty($d['tag'])): ?><span class="polaroid__tag"><?= $e($d['tag']) ?></span><?php endif; ?>
                    <figure class="polaroid__photo">
                        <img src="<?=$link?><?= $e($d['img']) ?>" alt="" loading="lazy">
                    </figure>
                    <span class="polaroid__days"><?= (int) $d['days'] ?> days</span>
                    <h3 class="polaroid__title"><?= $e($d['title']) ?></h3>
                    <p class="polaroid__text"><?= $e($d['text']) ?></p>
                    <span class="polaroid__price"><?= $e($d['price']) ?><?php if (!empty($d['note'])): ?><small><?= $e($d['note']) ?></small><?php endif; ?></span>
                </li>
                <?php endforeach; ?>
            </ul>

            <!-- 5-day highlight -->
            <div class="five-day" data-reveal>
                <div>
                    <span class="sub-heading">The 5-day retreat includes</span>
                    <ul class="five-day__list">
                        <?php foreach ($five_day as $item): ?>
                        <li><?= icon('check') ?> <?= $e($item) ?></li>
                        <?php endforeach; ?>
                    </ul>
                </div>
                <div class="five-day__cta">
                    <span class="five-day__price"><small>From</small> USD 699</span>
                    <a href="<?= $e($book_url) ?>" class="theme-btn">Plan My Retreat <?= $arrow ?></a>
                </div>
            </div>
        </div>
    </section>

    <!-- A gentle day — morning · day · evening (section-bg) -->
    <section class="rhythm section-bg spacing">
        <div class="container">
            <div class="course-head" data-reveal>
                <span class="sub-heading">A Gentle Rhythm</span>
                <h2 class="section-heading">A day on retreat</h2>
                <p class="para">Practice in the cool of the morning and evening, and free time to explore in between. Your full itinerary arrives after booking.</p>
            </div>

            <ol class="rhythm__path" data-reveal>
                <?php foreach ($rhythm as $r): ?>
                <li class="rhythm__stop">
                    <span class="rhythm__icon" aria-hidden="true"><?= icon($r['icon']) ?></span>
                    <span class="accent-text"><?= $e($r['part']) ?></span>
                    <p><?= $e($r['text']) ?></p>
                </li>
                <?php endforeach; ?>
            </ol>

            <p class="rhythm__arrival" data-reveal>
                <strong>Arrival day</strong> Check in between 11:00 and 14:00 · Welcome ceremony at 15:30
            </p>
        </div>
    </section>

    <!-- Explore Bali — photo postcards: photo + stamp (round postmark removed, user), handwritten title below (white). TODO: real temple / rice field / beach photos -->
    <section class="postcards-section spacing">
        <div class="container">
            <div class="course-head" data-reveal>
                <span class="sub-heading">Explore Bali</span>
                <h2 class="section-heading">Postcards from your retreat</h2>
                <p class="para">Guided outings are part of the retreat, so you see the island as well as the shala.</p>
            </div>

            <ul class="postcards" data-reveal>
                <?php foreach ($excursions as $x): ?>
                <li class="postcard">
                    <figure class="postcard__photo">
                        <img src="<?=$link?><?= $e($x['img']) ?>" alt="" loading="lazy">
                        <span class="postcard__stamp" aria-hidden="true"><span class="postcard__stamp-inner"><?= icon($x['icon']) ?><small><?= $e($x['stamp']) ?></small></span></span>                    </figure>
                    <div class="postcard__body">
                        <h3 class="postcard__title"><?= $e($x['title']) ?></h3>
                        <p class="postcard__text"><?= $e($x['text']) ?></p>
                    </div>
                </li>
                <?php endforeach; ?>
            </ul>
        </div>
    </section>

    <!-- Highlights (user: same strip as the course page) — shared include/highlights.php, cream-dark band -->
    <?php
    $hl_title = 'Life around the retreat';
    $hl_text  = 'Between practice and excursions there is time to rest. A look at the campus in Ubud, from the jungle pool and the spa to the rice fields nearby.';
    include 'include/highlights.php';
    ?>

    <!-- Accommodation (white) — same section as the course page (user), shared include/accommodation.php. Replaces the simple
         "Rooms & food" block; meals are covered in the room features + the included ticket. -->
    <?php
    $acc_text = 'Choose where you stay on retreat: nine room types at the Ubud campus, from deluxe rooms to suites with a private pool.';
    include 'include/accommodation.php';
    ?>

    <!-- Included · not included · what to bring — one section (user): "included" ticket left (spans both rows) · "not included"
         ticket + packing luggage tag stacked right (≥992); stacked on smaller screens (section-bg) -->
    <section class="inclusions section-bg spacing">
        <div class="container">
            <div class="course-head" data-reveal>
                <span class="sub-heading">Your Stay</span>
                <h2 class="section-heading">What is included &amp; what to bring</h2>
                <p class="para">Everything for your retreat in one price. Plan the few extras yourself, and pack light: Bali is warm all year.</p>
            </div>

            <div class="inclusions__grid inclusions__grid--retreat">
                <article class="ticket" data-reveal>
                    <header class="ticket__head">
                        <span class="ticket__label">Included in your retreat</span>
                        <span class="ticket__route"><?= icon('plane') ?> Ubud · Bali</span>
                    </header>
                    <ul class="ticket__list">
                        <?php foreach ($included as $item): ?>
                        <li><span class="ticket__stamp" aria-hidden="true"><?= icon('check') ?></span><?= $e($item) ?></li>
                        <?php endforeach; ?>
                    </ul>
                    <div class="ticket__tear" aria-hidden="true"></div>
                    <footer class="ticket__stub">
                        <dl class="ticket__meta">
                            <div><dt>Retreat</dt><dd>3–21 days</dd></div>
                            <div><dt>Starts</dt><dd>1st of each month</dd></div>
                            <div><dt>5 days from</dt><dd>USD 699</dd></div>
                        </dl>
                    </footer>
                </article>

                <article class="ticket ticket--not" data-reveal>
                    <header class="ticket__head">
                        <span class="ticket__label">Not included</span>
                        <span class="ticket__route">Plan ahead</span>
                    </header>
                    <ul class="ticket__list">
                        <?php foreach ($not_included as $item): ?>
                        <li><span class="ticket__stamp" aria-hidden="true"><?= icon('close') ?></span><?= $e($item) ?></li>
                        <?php endforeach; ?>
                    </ul>
                    <div class="ticket__extra">
                        <span class="ticket__extra-title">Good to know</span>
                        <p><strong>Airport pickup</strong> can be arranged for a fee. Ubud is about 1.5 hours from Denpasar airport (DPS).</p>
                        <p><strong>Visa on arrival</strong> for most nationalities, 30 days, extendable once.</p>
                    </div>
                    <div class="ticket__tear" aria-hidden="true"></div>
                    <footer class="ticket__stub">
                        <p class="ticket__note">Need help with travel? <a href="<?= $e($book_url) ?>" class="link-line">Ask us <?= $arrow ?></a></p>
                    </footer>
                </article>

                <div class="luggage-tag" data-reveal>
                    <span class="luggage-tag__hole" aria-hidden="true"></span>
                    <span class="luggage-tag__head"><?= icon('suitcase') ?> What to bring</span>
                    <ul class="luggage-tag__list">
                        <?php foreach ($packing as $item): ?>
                        <li><span aria-hidden="true"></span><?= $e($item) ?></li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <!-- FAQ — shared component include/faq.php: full-height photo left (45%) · accordion right (white; "How to book" steps removed, user) -->
    <?php
    $faq_list  = $retreat_faqs;
    $faq_title = 'Before you pack';
    $faq_text  = 'Quick answers to what guests ask most before a retreat in Bali.';
    $faq_img   = ['src' => 'about-us/img-1.webp', 'w' => 600, 'h' => 900, 'alt' => 'Sunset over the jungle in Ubud'];
    include 'include/faq.php';
    ?>

    <!-- Closing CTA (section-bg) — reuses .about-cta -->
    <section class="about-cta section-bg spacing">
        <div class="container about-cta__inner" data-reveal>
            <span class="accent-text">Your island pause</span>
            <h2 class="section-heading">Come and slow down with us</h2>
            <p class="para">Tell us how long you would like to stay. We will help you choose the right retreat and the best month to come.</p>
            <div class="about-cta__actions">
                <a href="<?= $e($book_url) ?>" class="theme-btn">Plan My Retreat</a>
                <a href="<?= $e($social['whatsapp']['url']) ?>" class="theme-btn theme-btn--outline" target="_blank" rel="noopener">Chat on WhatsApp</a>
            </div>
        </div>
    </section>

</main>

<?php include 'include/footer.php'; ?>
<?php include 'include/js.php'; ?>

</body>
</html>
