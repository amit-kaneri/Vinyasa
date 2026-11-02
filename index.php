<!DOCTYPE html>
<html lang="en">
<head>
    <?php include 'include/css.php'; ?>
</head>
<body>

<?php include 'include/header.php'; ?>

<main>

    <!-- Home Banner -->
    <section class="home-banner">
        <div class="home-banner__bg" aria-hidden="true">
            <video src="<?=$link?>assets/video/banner-vid.mp4" autoplay muted loop playsinline preload="auto"></video>
        </div>

        <div class="home-banner__band">
            <div class="container home-banner__inner">
                <!-- Mobile only: logo sits here instead of the header. Mobile order: logo → circle → welcome text → right content -->
                <img class="home-banner__logo" src="<?=$link?>assets/images/logo.webp" alt="" width="400" height="117" aria-hidden="true">

                <div class="home-banner__content home-banner__content--left">
                    <span class="accent-text">Welcome to</span>
                    <span class="main-heading"><span>Vinyasa Yoga</span> <span>Academy in Bali</span></span>
                    <a href="#" class="link-line">
                        Explore Courses
                        <svg viewBox="0 0 22 10" fill="none" stroke="currentColor" stroke-width="1" aria-hidden="true"><path d="M0 5h21M17 1l4 4-4 4"/></svg>
                    </a>
                </div>

                <div class="home-banner__visual">
                    <div class="home-banner__circle" aria-hidden="true">
                        <video src="<?=$link?>assets/video/banner-vid.mp4" autoplay muted loop playsinline preload="auto"></video>
                    </div>

                    <a href="#" class="home-banner__badge" aria-label="Explore yoga teacher training courses">
                        <svg class="home-banner__badge-text" viewBox="0 0 120 120" aria-hidden="true">
                            <defs><path id="badgeCircle" d="M60 60m-45 0a45 45 0 1 1 90 0a45 45 0 1 1-90 0"/></defs>
                            <text><textPath href="#badgeCircle" textLength="280" lengthAdjust="spacing">Yoga Teacher Training • Ubud · Bali •</textPath></text>
                        </svg>
                        <!-- Lotus mark -->
                        <svg class="home-banner__badge-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1" stroke-linejoin="round" aria-hidden="true">
                            <path d="M12 4c-2.5 3-2.5 8 0 11 2.5-3 2.5-8 0-11z"/>
                            <path d="M12 15c-4-1-7-4-7.5-7 3 .5 5.5 2.5 7.5 7z"/>
                            <path d="M12 15c4-1 7-4 7.5-7-3 .5-5.5 2.5-7.5 7z"/>
                            <path d="M5 18c3 1.5 11 1.5 14 0"/>
                        </svg>
                    </a>
                </div>

                <div class="home-banner__content home-banner__content--right">
                    <!-- TODO: final copy + real stats -->
                    <span class="sub-heading">Residential Training</span>
                    <p class="para">Rooted in tradition and guided with care, an immersive yoga journey in the heart of Bali.</p>

                    <ul class="home-banner__stats">
                        <li><strong data-count="15" data-suffix="+">15<em>+</em></strong><span>Years of Teaching</span></li>
                        <li><strong data-count="5000" data-suffix="+">5,000<em>+</em></strong><span>Students Trained</span></li>
                        <li><strong data-count="4.8" data-decimals="1">4.8</strong><span>Google Rating</span></li>
                    </ul>

                    <div class="home-banner__follow">
                        <span>Follow us</span>
                        <?php echo social_links('social-links--ring'); ?>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Welcome / About -->
    <section class="welcome section-bg section-space">
        <div class="container welcome__grid">
            <div class="welcome__media" data-reveal>
                <figure class="arch-img welcome__arch welcome__arch--main">
                    <img src="<?=$link?>assets/images/home/intro-img-1.webp" alt="Fire ceremony with a clay havan bowl on a carpet of marigold flowers" width="600" height="900" loading="lazy">
                </figure>
                <figure class="arch-img arch-img--ring welcome__arch welcome__arch--side">
                    <img src="<?=$link?>assets/images/home/intro-img-2.webp" alt="Marble-floored hall with a chandelier at the Ubud campus" width="1000" height="689" loading="lazy">
                </figure>
                <span class="welcome__tag">Ubud · Bali</span>
            </div>

            <div class="welcome__content" data-reveal>
                <span class="sub-heading">About Vinyasa Yoga Academy</span>
                <h1 class="section-heading">Yoga teacher training in Ubud, rooted in Rishikesh</h1>

                <p class="para">Vinyasa Yoga Academy was founded in Rishikesh, India, in 2010. Today we teach at two campuses: Rishikesh, on the Ganges at the foothills of the Himalayas, and Ubud, in central Bali.</p>
                <p class="para">We are a Yoga Alliance registered school (RYS 200, RYS 300 and RYS 500, USA). Our courses combine Hatha, Ashtanga, Vinyasa, Yin and Kundalini yoga with philosophy, anatomy, pranayama, meditation and teaching practice. Days start early and follow a full schedule of practice, theory and self-study.</p>

                <ul class="welcome__facts">
                    <li><strong>2010</strong><span>Founded in Rishikesh</span></li>
                    <li><strong>RYS 500</strong><span>Yoga Alliance registered school</span></li>
                    <li><strong>100<em>+</em></strong><span>Countries our students come from</span></li>
                    <li><strong>2</strong><span>Campuses: Rishikesh &amp; Ubud</span></li>
                </ul>

                <div class="welcome__footer">
                    <div class="welcome__founder">
                        <span class="accent-text">Yogi Vishnu Panigrahi</span>
                        <span class="small-text">Founder · E-RYT 500, Yoga Alliance USA · 30+ years of practice</span>
                    </div>
                    <a href="<?=$link?>about-us.php" class="link-line">
                        Read Our Story
                        <svg viewBox="0 0 22 10" fill="none" stroke="currentColor" stroke-width="1" aria-hidden="true"><path d="M0 5h21M17 1l4 4-4 4"/></svg>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Courses — card grid -->
    <?php
    // TODO: course page links; re-check prices on the live site before launch (snapshot Aug 2026)
    // focus = which part of the photo stays in the 4:3 crop: center | mid | low
    $courses = [
        [
            'img'   => 'home/200-hour-ttc.webp',
            'alt'   => 'Student stretching her arms overhead on a yoga mat during an asana class',
            'focus' => 'mid',
            'tag'   => 'Foundation',
            'days'  => 15,
            'meta'  => 'Yoga Alliance RYS 200 · Ubud',
            'title' => '200 Hour Yoga Teacher Training',
            'text'  => 'Your first teacher training. Open to beginners. Graduates are eligible to apply for RYT 200 with Yoga Alliance.',
            'label' => 'From',
            'price' => '$1,699',
            'url'   => $link . '200-hour-yoga-teacher-training-in-bali.php',
        ],
        [
            'img'   => 'home/300-hour-ttc.webp',
            'alt'   => 'Student meditating cross-legged on a yoga mat in the shala',
            'focus' => 'center',
            'tag'   => 'Advanced',
            'days'  => 25,
            'meta'  => 'Yoga Alliance RYS 300 · Ubud',
            'title' => '300 Hour Yoga Teacher Training',
            'text'  => 'For teachers who already hold a 200-hour certificate and want to deepen their practice and teaching.',
            'label' => 'From',
            'price' => '$1,490',
            'url'   => '#',
        ],
        [
            'img'   => 'yoga-retreat-img.webp',
            'alt'   => 'Guests gathering on cushions in an open-air shala with a woven bamboo roof',
            'focus' => 'mid',
            'tag'   => 'Retreat',
            'days'  => null,
            'meta'  => 'Ubud, Bali',
            'title' => 'Yoga Retreat in Bali',
            'text'  => 'Yoga, meditation and time to rest in Ubud. For anyone who wants to practise without training to teach.',
            'label' => 'Dates & fees',
            'price' => 'On request',
            'url'   => $link . 'yoga-retreat-in-bali.php',
        ],
    ];
    $arrow = '<svg viewBox="0 0 22 10" fill="none" stroke="currentColor" stroke-width="1" aria-hidden="true"><path d="M0 5h21M17 1l4 4-4 4"/></svg>';
    ?>
    <section class="courses spacing" id="courses">
        <div class="container">
            <div class="courses__head" data-reveal>
                <span class="sub-heading">Our Courses in Ubud</span>
                <h2 class="section-heading">Train, deepen or simply retreat</h2>
                <p class="para">Two teacher trainings from a Yoga Alliance registered school, and a retreat for anyone who wants to practise without the study load.</p>
            </div>

            <!-- Desktop: 3-column grid · below 992px: Swiper slider (script.js [data-mobile-slider]) -->
            <div class="courses__slider" data-mobile-slider>
            <div class="courses__swiper swiper">
            <div class="courses__grid swiper-wrapper">
                <?php foreach ($courses as $c): ?>
                <article class="course-card swiper-slide" data-reveal>
                    <a href="<?= $e($c['url']) ?>" class="course-card__media" tabindex="-1" aria-hidden="true">
                        <figure class="arch-img">
                            <img class="is-focus-<?= $e($c['focus']) ?>" src="<?=$link?>assets/images/<?= $e($c['img']) ?>" alt="<?= $e($c['alt']) ?>" width="600" height="800" loading="lazy">
                        </figure>
                        <span class="course-card__tag"><?= $e($c['tag']) ?></span>
                    </a>
                    <div class="course-card__body">
                        <span class="course-card__meta"><?= $c['days'] ? (int) $c['days'] . ' Days' : 'Retreat' ?> · Ubud, Bali</span>
                        <h3 class="card-heading"><a href="<?= $e($c['url']) ?>"><?= $e($c['title']) ?></a></h3>
                        <p class="small-text"><?= $e($c['text']) ?></p>
                        <div class="course-card__footer">
                            <span class="course-card__price"><small><?= $e($c['label']) ?></small> <?= $e($c['price']) ?></span>
                            <a href="<?= $e($c['url']) ?>" class="link-line"><?= $c['days'] ? 'View Course' : 'View Retreat' ?> <?= $arrow ?></a>
                        </div>
                    </div>
                </article>
                <?php endforeach; ?>
            </div>
            </div>

            <!-- Slider controls (mobile/tablet only): 01 / 03 · progress line · prev / next -->
            <div class="slider-controls slider-controls--mobile">
                <span class="slider-controls__count"><strong>01</strong> / <?= sprintf('%02d', count($courses)) ?></span>
                <span class="slider-controls__nav">
                    <button type="button" class="circle-btn slider-controls__prev" aria-label="Previous course"><?= $arrow ?></button>
                    <button type="button" class="circle-btn slider-controls__next" aria-label="Next course"><?= $arrow ?></button>
                </span>
            </div>
            </div>

            <div class="courses__cta" data-reveal>
                <a href="#" class="theme-btn theme-btn--outline">View All Courses</a>
            </div>
        </div>
    </section>

    <!-- Why Us — intro + photo · feature grid -->
    <?php
    // Facts verified against the live site (vinyasa-yoga-content skill, Aug 2026)
    $reasons = [
        ['icon' => 'badge',    'title' => 'Yoga Alliance Registered',  'text' => 'We are a registered school with Yoga Alliance USA (RYS 200, RYS 300 and RYS 500).'],
        ['icon' => 'mountain', 'title' => 'Rooted in Rishikesh',       'text' => 'Founded in Rishikesh in 2010. Our founder trained under Swami Niranjan Ji and Swami Veda Bharati.'],
        ['icon' => 'shala',    'title' => 'Luxurious Yoga Shala',      'text' => 'Practise in an open-air shala under a woven bamboo roof, looking out over the Ubud jungle.'],
        ['icon' => 'lotus',    'title' => 'Six Styles, One Training',  'text' => 'Hatha, Ashtanga, Vinyasa, Yin, Acro and Kundalini, with philosophy, anatomy and meditation.'],
        ['icon' => 'sprout',   'title' => 'Open to Beginners',         'text' => 'No prior yoga experience is needed for the 200-hour course. You learn the foundations step by step.'],
        // TODO: confirm Bali room types + meals with the school (private/shared + vegetarian meals are verified for Rishikesh)
        ['icon' => 'bed',      'title' => 'Elegant Rooms',             'text' => 'Calm, comfortable rooms with private and shared options, and freshly prepared vegetarian meals.'],
        ['icon' => 'globe',    'title' => 'A Global Community',        'text' => 'Students from more than 100 countries have trained with us.'],
        ['icon' => 'certificate', 'title' => 'Earned, Not Bought',        'text' => 'Certification needs at least 90% attendance and passing the course evaluation. Payment alone is not enough.'],
    ];
    ?>
    <section class="why section-bg spacing">
        <div class="container why__grid">

            <div class="why__intro" data-reveal>
                <span class="sub-heading">Why Vinyasa Yoga Academy</span>
                <h2 class="section-heading">A training you can trust</h2>
                <p class="para">What you can expect from us, in plain facts.</p>

                <figure class="why__photo">
                    <img src="<?=$link?>assets/images/home/why-choose.webp" alt="Student in a seated twist on a yoga mat during class" width="600" height="900" loading="lazy">
                    <figcaption class="why__rating">
                        <span class="why__rating-icon"><?= icon('star') ?></span>
                        <strong>4.8</strong>
                        <small>Google rating<br>200+ reviews</small>
                    </figcaption>
                </figure>
            </div>

            <ul class="why__features">
                <?php foreach ($reasons as $i => $r): ?>
                <li class="why-item" data-reveal>
                    <span class="why-item__top">
                        <span class="why-item__icon"><?= feature_icon($r['icon']) ?></span>
                        <span class="why-item__num"><?= sprintf('%02d', $i + 1) ?></span>
                    </span>
                    <h3 class="why-item__title"><?= $e($r['title']) ?></h3>
                    <p class="why-item__text"><?= $e($r['text']) ?></p>
                </li>
                <?php endforeach; ?>
            </ul>

        </div>
    </section>

    <!-- Achievements — big count-up stats + review ratings (white section) -->
    <?php
    // Verified on the live site (vinyasa-yoga-content skill, Aug 2026).
    // ⚠ Live site also says "3,000+ graduates" on the Rishikesh hub — owner should confirm 5,000+.
    $stats = [
        ['count' => 15,   'suffix' => '+', 'label' => 'Years of Teaching',  'note' => 'Since 2010'],
        ['count' => 5000, 'suffix' => '+', 'label' => 'Students Trained',   'note' => 'And counting'],
        ['count' => 100,  'suffix' => '+', 'label' => 'Countries',          'note' => 'One community'],
        ['count' => 2,    'suffix' => '',  'label' => 'Campuses',           'note' => 'Rishikesh · Ubud'],
    ];
    // Each platform with its own review count. Google first (main rating).
    // Left out: Trustpilot (only 6 reviews), Tripaneer (4.9 / 36+ — looked like a TripAdvisor duplicate)
    $ratings = [
        ['name' => 'Google',        'score' => '4.8', 'reviews' => '200+ reviews'],
        ['name' => 'TripAdvisor',   'score' => '4.9', 'reviews' => '36 reviews'],
        ['name' => 'Yoga Alliance', 'score' => '4.4', 'reviews' => '78+ reviews'],
    ];
    ?>
    <section class="achievements spacing">
        <img class="achievements__mark" src="<?=$link?>assets/images/logo.webp" alt="" width="400" height="117" aria-hidden="true" loading="lazy">

        <div class="container">
            <div class="achievements__head" data-reveal>
                <span class="sub-heading">Our Achievements</span>
                <h2 class="section-heading">Since 2010, in numbers</h2>
            </div>

            <ul class="achievements__stats">
                <?php foreach ($stats as $s): ?>
                <li class="stat" data-reveal>
                    <strong class="stat__number" data-count="<?= (int) $s['count'] ?>" data-suffix="<?= $e($s['suffix']) ?>"><?= number_format($s['count']) ?><?php if ($s['suffix']): ?><em><?= $e($s['suffix']) ?></em><?php endif; ?></strong>
                    <span class="stat__label"><?= $e($s['label']) ?></span>
                    <span class="stat__note"><?= $e($s['note']) ?></span>
                </li>
                <?php endforeach; ?>
            </ul>

            <ul class="achievements__ratings" data-reveal>
                <?php foreach ($ratings as $r): ?>
                <li class="rating">
                    <span class="rating__score"><?= $e($r['score']) ?></span>
                    <span class="rating__body">
                        <span class="rating__stars" aria-hidden="true"><?= icon('star') ?> Rated</span>
                        <span class="rating__name"><?= $e($r['name']) ?> <small><span class="rating__dot">· </span><?= $e($r['reviews']) ?></small></span>
                    </span>
                </li>
                <?php endforeach; ?>
            </ul>
        </div>
    </section>

    <!-- Testimonials — platform tabs (Google · Trustpilot · Tripadvisor) + themed review stack · section-bg -->
    <?php
    // Platform scores = verified on the live site (Aug 2026).
    // ⚠ The REVIEWS below are SAMPLE text for the design (user asked for placeholders).
    //    Replace with REAL reviews from each platform (with permission) before the site goes live.
    $platforms = [
        'google' => [
            'name' => 'Google', 'score' => 4.8, 'count' => '200+ reviews', 'mark' => 'star', 'url' => '#',
            'reviews' => [
                ['name' => 'Laura M.',  'meta' => 'Germany · 200 Hour YTT', 'rating' => 5, 'when' => '2 months ago',
                 'text' => 'I arrived as a beginner and left confident enough to teach my first class. The teachers explained anatomy and alignment patiently, and the open shala above the jungle made every morning special.'],
                ['name' => 'Sophie K.', 'meta' => 'Netherlands · 300 Hour YTT', 'rating' => 5, 'when' => '4 months ago',
                 'text' => 'The 300-hour course deepened both my practice and my teaching. Long days, but very well structured. Philosophy classes were the highlight for me.'],
                ['name' => 'Emma R.',   'meta' => 'Australia · Yoga Retreat', 'rating' => 5, 'when' => '5 months ago',
                 'text' => 'Exactly what I needed: daily yoga, fresh vegetarian food and quiet time in Ubud. Calm, warm and beautifully organised from the first day.'],
            ],
        ],
        'trustpilot' => [
            'name' => 'Trustpilot', 'score' => 4.2, 'count' => '6 reviews', 'mark' => 'box', 'url' => '#',
            'reviews' => [
                ['name' => 'Anna B.',   'meta' => 'Austria · 200 Hour YTT', 'rating' => 5, 'when' => '3 months ago',
                 'text' => 'Clear communication before arrival and a well-organised course. The daily schedule is full, so come rested and ready to work.'],
                ['name' => 'Mia T.',    'meta' => 'Denmark · 200 Hour YTT', 'rating' => 4, 'when' => '7 months ago',
                 'text' => 'Great teachers and a beautiful shala. Some days felt very long, but I learned far more than I expected.'],
            ],
        ],
        'tripadvisor' => [
            'name' => 'Tripadvisor', 'score' => 4.9, 'count' => '36 reviews', 'mark' => 'bubble', 'url' => '#',
            'reviews' => [
                ['name' => 'Chloe D.',  'meta' => 'France · Yoga Retreat', 'rating' => 5, 'when' => '1 month ago',
                 'text' => 'A peaceful place in Ubud with lovely people. Morning practice in the open shala, simple healthy food and time to rest in the afternoons.'],
                ['name' => 'Hannah W.', 'meta' => 'United Kingdom · 200 Hour YTT', 'rating' => 5, 'when' => '6 months ago',
                 'text' => 'Supportive teachers and a small group that became like family. The training was intense in the best way.'],
                ['name' => 'Lena F.',   'meta' => 'Germany · 300 Hour YTT', 'rating' => 5, 'when' => '8 months ago',
                 'text' => 'Well structured and honest. Teaching practice every week helped me find my own voice as a teacher.'],
            ],
        ],
    ];
    $initials = fn($n) => strtoupper(implode('', array_map(fn($w) => $w[0] ?? '', array_slice(explode(' ', trim($n)), 0, 2))));
    $quote_mark = '<svg viewBox="0 0 48 36" fill="currentColor" aria-hidden="true"><path d="M0 36V22.5C0 9.8 6.3 2.3 18.9 0l1.8 4.4C13.4 6.2 9.8 10.6 9.8 17.6h9.4V36H0zm27.6 0V22.5C27.6 9.8 33.9 2.3 46.5 0l1.5 4.4c-7.3 1.8-10.8 6.2-10.8 13.2h9.4V36H27.6z"/></svg>';
    $first = array_key_first($platforms);
    ?>
    <section class="testimonials section-bg spacing" data-reviews>
        <div class="container">

            <!-- Centred head: title + platform pills -->
            <div class="testimonials__head" data-reveal>
                <span class="sub-heading">Student Stories</span>
                <h2 class="section-heading">In their own words</h2>
                <p class="para">Read what students say on Google, Trustpilot and Tripadvisor.</p>

                <div class="review-tabs" role="tablist" aria-label="Review platforms">
                    <?php foreach ($platforms as $key => $p): ?>
                    <button type="button" class="review-tab brand--<?= $key ?><?= $key === $first ? ' is-active' : '' ?>"
                            role="tab" id="tab-<?= $key ?>" aria-controls="panel-<?= $key ?>"
                            aria-selected="<?= $key === $first ? 'true' : 'false' ?>" tabindex="<?= $key === $first ? '0' : '-1' ?>">
                        <span class="review-tab__icon"><?= brand_icon($key) ?></span>
                        <span class="review-tab__name"><?= $e($p['name']) ?></span>
                        <span class="review-tab__score"><?= number_format($p['score'], 1) ?></span>
                    </button>
                    <?php endforeach; ?>
                </div>
            </div>

            <div class="testimonials__grid">

            <!-- Left: photo (desktop) -->
            <div class="testimonials__visual" data-reveal>
                <figure class="arch-img testimonials__photo">
                    <img src="<?=$link?>assets/images/home/img2.webp" alt="Two guests looking out over the pool at the Ubud campus" width="600" height="799" loading="lazy">
                </figure>
            </div>

            <div class="testimonials__stage" data-reveal>
                <?php foreach ($platforms as $key => $p): ?>
                <div class="review-panel brand--<?= $key ?><?= $key === $first ? ' is-active' : '' ?>"
                     role="tabpanel" id="panel-<?= $key ?>" aria-labelledby="tab-<?= $key ?>"<?= $key === $first ? '' : ' hidden' ?>>

                    <div class="review-panel__summary">
                        <span class="review-panel__logo"><?= brand_icon($key) ?></span>
                        <strong><?= number_format($p['score'], 1) ?></strong>
                        <?= rating_marks($p['mark'], $p['score']) ?>
                        <small><?= $e($p['count']) ?> on <?= $e($p['name']) ?></small>
                    </div>

                    <div class="review-panel__slider swiper">
                        <div class="swiper-wrapper">
                            <?php foreach ($p['reviews'] as $r): ?>
                            <figure class="review-card swiper-slide">
                                <figcaption class="review-card__head">
                                    <span class="review-card__avatar" aria-hidden="true"><?= $e($initials($r['name'])) ?></span>
                                    <span class="review-card__who">
                                        <strong><?= $e($r['name']) ?></strong>
                                        <small><?= $e($r['meta']) ?></small>
                                    </span>
                                    <span class="review-card__logo"><?= brand_icon($key) ?></span>
                                </figcaption>
                                <span class="review-card__rating"><?= rating_marks($p['mark'], $r['rating']) ?><small><?= $e($r['when']) ?></small></span>
                                <blockquote class="review-card__quote"><?= $e($r['text']) ?></blockquote>
                                <span class="review-card__mark"><?= $quote_mark ?></span>
                            </figure>
                            <?php endforeach; ?>
                        </div>
                    </div>

                    <div class="slider-controls">
                        <span class="slider-controls__count"><strong>01</strong> / <?= sprintf('%02d', count($p['reviews'])) ?></span>
                        <span class="slider-controls__nav">
                            <button type="button" class="circle-btn slider-controls__prev" aria-label="Previous review"><?= $arrow ?></button>
                            <button type="button" class="circle-btn slider-controls__next" aria-label="Next review"><?= $arrow ?></button>
                        </span>
                    </div>

                    <!-- TODO: real profile link for each platform -->
                    <a href="<?= $e($p['url']) ?>" class="link-line review-panel__all" target="_blank" rel="noopener">
                        Read all reviews on <?= $e($p['name']) ?> <?= $arrow ?>
                    </a>
                </div>
                <?php endforeach; ?>
            </div>

            </div>

        </div>
    </section>

    <!-- Social — photo mosaic with an Instagram card + one brand-coloured card per social account (white section) -->
    <?php
    // Mosaic photos link to Instagram ($social in include/social.php — URL still # / TODO)
    $mosaic = [
        ['img' => 'overview-img-2.webp',   'alt' => 'Students sitting in a circle in the open-air shala',          'w' => 600, 'h' => 1066],
        ['img' => 'yoga-retreat-img.webp', 'alt' => 'Guests gathering on cushions under the woven bamboo roof',    'w' => 600, 'h' => 1066],
        ['img' => 'about-us/img-2.webp',   'alt' => 'Lounge with a carved Balinese stone relief at the Ubud campus', 'w' => 1000, 'h' => 667],
        ['img' => '300-hour-ttc.webp',     'alt' => 'Graduates in white beside the rice fields in Ubud',           'w' => 800, 'h' => 450],
    ];
    // What each account is for (shown on its card)
    $social_actions = [
        'instagram'     => 'Daily moments',
        'facebook'      => 'News & events',
        'youtube'       => 'Classes & talks',
        'x'             => 'Updates',
        'whatsapp'      => 'Chat with us',
        'yoga-alliance' => 'Our school profile',
    ];
    ?>
    <section class="social spacing">
        <div class="container">
            <div class="social__head" data-reveal>
                <span class="sub-heading">Follow Our Journey</span>
                <h2 class="section-heading">Life at the shala, every day</h2>
                <p class="para">Practice, food, ceremonies and quiet moments in Ubud. Follow along, or message us with any question.</p>
            </div>

            <div class="social__mosaic" data-reveal>
                <?php foreach ($mosaic as $i => $m): ?>
                <a href="<?= $e($social['instagram']['url']) ?>" class="social__tile social__tile--<?= $i + 1 ?>" target="_blank" rel="noopener" aria-label="See more on Instagram">
                    <img src="<?=$link?>assets/images/<?= $e($m['img']) ?>" alt="<?= $e($m['alt']) ?>" width="<?= $m['w'] ?>" height="<?= $m['h'] ?>" loading="lazy">
                    <span class="social__tile-icon" aria-hidden="true"><?= $social_icons['instagram'] ?></span>
                </a>
                <?php endforeach; ?>

                <!-- centre card -->
                <a href="<?= $e($social['instagram']['url']) ?>" class="social__feature" target="_blank" rel="noopener">
                    <span class="social__feature-icon" aria-hidden="true"><?= $social_icons['instagram'] ?></span>
                    <span class="accent-text">Follow us</span>
                    <span class="social__feature-title">on Instagram</span>
                    <span class="link-line">Open Instagram <?= $arrow ?></span>
                </a>
            </div>

            <ul class="social__accounts">
                <?php foreach (array_diff_key($social, ['yoga-alliance' => 1]) as $key => $s): // Yoga Alliance not shown here ?>
                <li data-reveal>
                    <a href="<?= $e($s['url']) ?>" class="social-card brand--<?= $key ?>" target="_blank" rel="noopener">
                        <span class="social-card__icon" aria-hidden="true"><?= $social_icons[$key] ?></span>
                        <span class="social-card__name"><?= $e($s['label']) ?></span>
                        <span class="social-card__action"><?= $e($social_actions[$key] ?? 'Follow') ?></span>
                        <span class="social-card__arrow" aria-hidden="true"><?= $arrow ?></span>
                    </a>
                </li>
                <?php endforeach; ?>
            </ul>
        </div>
    </section>

    <!-- Gallery — editorial grid + custom lightbox (section-bg) -->
    <?php
    // TODO: more / fresher campus photos — these are reused from other sections
    $gallery = [
        ['img' => 'overview-img-2.webp',   'w' => 600, 'h' => 1066, 'label' => 'The Shala',     'title' => 'Morning circle',             'alt' => 'Students sitting in a circle in the open-air shala'],
        ['img' => '300-hour-ttc.webp',     'w' => 800, 'h' => 450,  'label' => 'Graduation',    'title' => 'Beside the rice fields',      'alt' => 'Graduates in white holding certificates beside the rice fields'],
        ['img' => 'yoga-retreat-img.webp', 'w' => 600, 'h' => 1066, 'label' => 'Retreat',       'title' => 'Under the bamboo roof',       'alt' => 'Guests gathering on cushions under the woven bamboo roof'],
        ['img' => 'home/img1.webp',        'w' => 600, 'h' => 800,  'label' => 'Dining Hall',   'title' => 'Meals under one roof',        'alt' => 'Dining hall with a marble floor and set tables at the Ubud campus'],
        ['img' => '200-hour-ttc.webp',     'w' => 600, 'h' => 1066, 'label' => 'Community',     'title' => 'One group, many countries',   'alt' => 'A group of students in white on a garden path'],
        ['img' => 'testimonials-img.webp', 'w' => 800, 'h' => 1422, 'label' => 'Dining',        'title' => 'Evenings together',           'alt' => 'Students sharing dinner in the open-air dining hall'],
    ];
    $expand = '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.3" aria-hidden="true"><path d="M14 4h6v6M10 20H4v-6M20 4l-7 7M4 20l7-7"/></svg>';
    ?>
    <section class="gallery section-bg spacing" data-gallery>
        <div class="container">
            <div class="gallery__head" data-reveal>
                <span class="sub-heading">Gallery</span>
                <h2 class="section-heading">Moments from Ubud</h2>
                <p class="para">The shala, the people and the quiet in between.</p>
            </div>

            <div class="gallery__grid" data-reveal>
                <?php foreach ($gallery as $i => $g): ?>
                <button type="button" class="gallery__item gallery__item--<?= $i + 1 ?>" data-gallery-item="<?= $i ?>"
                        data-label="<?= $e($g['label']) ?>" data-title="<?= $e($g['title']) ?>"
                        aria-label="Open photo: <?= $e($g['title']) ?>">
                    <img src="<?=$link?>assets/images/<?= $e($g['img']) ?>" alt="<?= $e($g['alt']) ?>" width="<?= $g['w'] ?>" height="<?= $g['h'] ?>" loading="lazy">
                    <span class="gallery__expand"><?= $expand ?></span>
                </button>
                <?php endforeach; ?>
            </div>
        </div>

        <!-- Lightbox (filled by script.js) -->
        <div class="lightbox" role="dialog" aria-modal="true" aria-label="Photo gallery" hidden>
            <button type="button" class="circle-btn lightbox__close" aria-label="Close gallery">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.3" aria-hidden="true"><path d="M6 6l12 12M18 6 6 18"/></svg>
            </button>
            <button type="button" class="circle-btn lightbox__prev" aria-label="Previous photo"><?= $arrow ?></button>
            <figure class="lightbox__figure">
                <img src="" alt="">
                <figcaption>
                    <small class="lightbox__label"></small>
                    <strong class="lightbox__title"></strong>
                    <span class="lightbox__count"></span>
                </figcaption>
            </figure>
            <button type="button" class="circle-btn lightbox__next" aria-label="Next photo"><?= $arrow ?></button>
        </div>
    </section>

    <!-- FAQ — sticky intro left · accordion right (white section) -->
    <?php
    // Answers use only facts the live site states (vinyasa-yoga-content skill, verified-facts.md, Aug 2026).
    // TODO before launch: re-check prices on the Bali course pages.
    $faqs = [
        [
            'q' => 'Do I need yoga experience to join the 200-hour course?',
            'a' => 'No. The 200-hour teacher training is open to beginners and no prior yoga experience is necessary. A regular practice before you arrive will make the early mornings and long days easier.',
        ],
        [
            'q' => 'Is Vinyasa Yoga Academy registered with Yoga Alliance?',
            'a' => 'Yes. We are a Yoga Alliance registered school (RYS 200, RYS 300 and RYS 500). After you complete a course you are eligible to apply for the matching RYT designation. Yoga Alliance makes that decision under its own requirements.',
        ],
        [
            'q' => 'How long are the courses in Bali and what do they cost?',
            'a' => 'The 200-hour training runs for 15 days and starts from $1,699. The 300-hour training runs for 25 days and starts from $1,490. Retreat prices are shared on request. Each course page lists the current dates and fees.',
        ],
        [
            'q' => 'What do I need to join the 300-hour course?',
            'a' => 'A 200-hour certificate from any Yoga Alliance registered school is the only requirement.',
        ],
        [
            'q' => 'What does a typical day look like?',
            'a' => 'Days start early: the Bali 200-hour schedule begins at 05:00 and runs through a full day of classes, with breaks and time for self-study. The course page shows the full timetable.',
        ],
        [
            'q' => 'How many students are in a group?',
            'a' => 'Groups are usually 15 to 20 students.',
        ],
        [
            'q' => 'How do I receive my certificate?',
            'a' => 'The certificate is earned, not bought. You need at least 90% attendance and must complete all course requirements.',
        ],
        [
            'q' => 'What is your refund policy?',
            'a' => 'Course fees are non-refundable. If you cannot attend, you can transfer once to a future batch within 12 months, as long as you ask at least 15 days before your course starts. Please read the full refund policy before you book.',
        ],
    ];
    ?>
    <!-- FAQ — shared component include/faq.php: full-height photo left (45%) · accordion right (white) -->
    <?php
    $faq_list  = $faqs;
    $faq_title = 'Questions, answered';
    $faq_text  = 'The things students ask us most before they book a training in Ubud.';
    $faq_img   = ['src' => 'home/faqs-img.webp', 'w' => 995, 'h' => 1337, 'alt' => 'Student practising alternate-nostril breathing (pranayama) on a bolster and block in the shala'];
    include 'include/faq.php';
    ?>

    <!-- Contact — form card overlapping a map · contact strip below (section-bg) -->
    <?php
    // Bali campus details as published on the live site (Aug 2026)
    $contact_address = 'Jl. Raya Andong, Ubud, Kabupaten Gianyar, Bali 80571, Indonesia';
    $contact_map_q   = 'Jl.+Raya+Andong,+Ubud,+Gianyar,+Bali+80571';
    $pin = '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.3"><path d="M12 21s-7-6.2-7-11.5a7 7 0 0 1 14 0C19 14.8 12 21 12 21z"/><circle cx="12" cy="9.5" r="2.5"/></svg>';
    $contact_items = [
        ['label' => 'Call Us',    'value' => '+62 813 2881 810',                 'url' => 'tel:+628132881810',
         'icon' => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.3" stroke-linejoin="round"><path d="M5 4h4l2 5-2.5 1.5a11 11 0 0 0 5 5L15 13l5 2v4a1 1 0 0 1-1 1A16 16 0 0 1 4 5a1 1 0 0 1 1-1z"/></svg>'],
        ['label' => 'WhatsApp',   'value' => 'Chat with us',                     'url' => $social['whatsapp']['url'],
         'icon' => $social_icons['whatsapp']],
        ['label' => 'Email',      'value' => 'contact@vinyasayogaacademy.com',   'url' => 'mailto:contact@vinyasayogaacademy.com',
         'icon' => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.3"><rect x="3" y="5" width="18" height="14" rx="1.5"/><path d="m3.5 6 8.5 7 8.5-7"/></svg>'],
        ['label' => 'Visit Us',   'value' => 'Jl. Raya Andong, Ubud, Bali',      'url' => 'https://maps.google.com/?q=' . $contact_map_q,
         'icon' => $pin],
    ];
    ?>
    <section class="contact section-bg spacing" id="contact">
        <div class="container">
            <div class="contact__wrap">

                <!-- Form card -->
                <div class="contact__card" data-reveal>
                    <span class="sub-heading">Get in Touch</span>
                    <h2 class="section-heading">Begin with a conversation</h2>
                    <p class="para">Tell us a little about yourself and the course you are interested in. We reply to every message personally.</p>

                    <!-- TODO: connect to a mail handler (e.g. include/send-enquiry.php) — the form has no backend yet -->
                    <form class="contact-form" action="#" method="post">
                        <div class="field">
                            <input type="text" id="cf-name" name="name" placeholder=" " autocomplete="name" required>
                            <label for="cf-name">Full name</label>
                        </div>
                        <div class="field">
                            <input type="email" id="cf-email" name="email" placeholder=" " autocomplete="email" required>
                            <label for="cf-email">Email address</label>
                        </div>
                        <div class="field">
                            <input type="tel" id="cf-phone" name="phone" placeholder=" " autocomplete="tel">
                            <label for="cf-phone">Phone / WhatsApp</label>
                        </div>
                        <div class="field field--select">
                            <select id="cf-course" name="course" required>
                                <option value="" disabled selected>Choose a course</option>
                                <option>200 Hour Yoga Teacher Training</option>
                                <option>300 Hour Yoga Teacher Training</option>
                                <option>Yoga Retreat in Bali</option>
                                <option>Not sure yet</option>
                            </select>
                            <label for="cf-course">Interested in</label>
                        </div>
                        <div class="field field--full">
                            <textarea id="cf-message" name="message" rows="3" placeholder=" "></textarea>
                            <label for="cf-message">Your message (preferred dates, questions…)</label>
                        </div>

                        <button type="submit" class="theme-btn contact-form__submit">
                            Send Enquiry
                            <svg viewBox="0 0 22 10" fill="none" stroke="currentColor" stroke-width="1" aria-hidden="true"><path d="M0 5h21M17 1l4 4-4 4"/></svg>
                        </button>
                    </form>
                </div>

                <!-- Map + location card -->
                <div class="contact__map" data-reveal>
                    <iframe src="https://www.google.com/maps?q=<?= $contact_map_q ?>&amp;output=embed" title="Map: Vinyasa Yoga Academy, Ubud, Bali" loading="lazy" referrerpolicy="no-referrer-when-downgrade" allowfullscreen></iframe>

                    <div class="contact__location">
                        <span class="contact__location-pin" aria-hidden="true"><?= $pin ?></span>
                        <span>
                            <strong>Vinyasa Yoga Academy</strong>
                            <small><?= $e($contact_address) ?></small>
                            <a href="https://maps.google.com/?q=<?= $contact_map_q ?>" class="link-line" target="_blank" rel="noopener">Get directions <?= $arrow ?></a>
                        </span>
                    </div>
                </div>

            </div>

            <!-- Contact strip -->
            <ul class="contact__strip">
                <?php foreach ($contact_items as $c): ?>
                <li data-reveal>
                    <a href="<?= $e($c['url']) ?>" class="contact-item"<?= str_starts_with($c['url'], 'http') ? ' target="_blank" rel="noopener"' : '' ?>>
                        <span class="contact-item__icon" aria-hidden="true"><?= $c['icon'] ?></span>
                        <span>
                            <small><?= $e($c['label']) ?></small>
                            <strong><?= str_replace('@', '@<wbr>', $e($c['value'])) ?></strong>
                        </span>
                    </a>
                </li>
                <?php endforeach; ?>
            </ul>
        </div>
    </section>

</main>

<?php include 'include/footer.php'; ?>
<?php include 'include/js.php'; ?>

</body>
</html>
