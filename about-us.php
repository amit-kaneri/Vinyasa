<!DOCTYPE html>
<html lang="en">
<head>
    <?php include 'include/css.php'; ?>
</head>
<body>

<?php include 'include/header.php'; ?>

<main>

    <?php
    /* About page — every fact below is from the vinyasa-yoga-content skill (verified-facts.md, Aug 2026).
       ⚠ 5,000+ students: the live site also says 3,000+ graduates on the Rishikesh page — owner to confirm. */
    $arrow = '<svg viewBox="0 0 22 10" fill="none" stroke="currentColor" stroke-width="1" aria-hidden="true"><path d="M0 5h21M17 1l4 4-4 4"/></svg>';

    $about_facts = [
        ['count' => '2010', 'plain' => true, 'label' => 'Founded in Rishikesh'],
        ['count' => '5000', 'suffix' => '+', 'label' => 'Students trained'],
        ['count' => '100',  'suffix' => '+', 'label' => 'Countries represented'],
        ['count' => '2',    'label' => 'Campuses'],
    ];

    $pillars = [
        ['icon' => 'mountain', 'title' => 'Rooted in tradition',     'text' => 'Our teaching comes from Rishikesh, where the academy began in 2010 under Yogi Vishnu Panigrahi.'],
        ['icon' => 'lotus',    'title' => 'A complete curriculum',   'text' => 'The 200-hour syllabus covers 14 subjects, from asana, pranayama and meditation to anatomy, philosophy and teaching methodology.'],
        ['icon' => 'shala',    'title' => 'Residential immersion',   'text' => 'Students live on campus for the whole course. Days start early and follow a set daily schedule.'],
        ['icon' => 'badge',    'title' => 'Certification you earn', 'text' => 'Certificates need at least 90% attendance and all course requirements. Graduates are eligible to apply for Yoga Alliance registration.'],
    ];

    // Bali only (user: the site focuses on Bali — Rishikesh campus card removed)
    $campuses = [
        [
            'name'    => 'Ubud, Bali',
            'tag'     => 'Our Bali campus',
            'text'    => 'Our campus in Ubud, with an open-air shala surrounded by green Balinese countryside.',
            'address' => 'Jl. Raya Andong, Ubud, Kabupaten Gianyar, Bali 80571, Indonesia',
            'map'     => 'https://maps.google.com/?q=Jl.+Raya+Andong,+Ubud,+Gianyar,+Bali+80571',
            'phone'   => '+62 813 2881 810',
            'tel'     => '+628132881810',
            'img'     => 'assets/images/about-us/back-view.webp',
            'alt'     => 'Vinyasa Yoga Academy campus building in Ubud, Bali, with balconies and a tropical garden',
        ],
    ];

    // Yoga Alliance levels — wording per verified-facts.md (Yoga Alliance registers; graduates are "eligible to apply")
    $rys_levels = [
        ['num' => '200', 'title' => 'Foundation',    'text' => 'The 200-hour teacher training. Open to beginners, no prior yoga experience needed.',            'ryt' => 'Eligible to apply for RYT 200'],
        ['num' => '300', 'title' => 'Advanced',      'text' => 'The 300-hour training for teachers who already hold a 200-hour certificate.',                 'ryt' => 'With a 200-hour: eligible to apply for RYT 500'],
        ['num' => '500', 'title' => 'Complete path', 'text' => 'The full 500-hour training in Rishikesh. No prior certificate needed; students must be 18+.', 'ryt' => 'Eligible to apply for RYT 500'],
    ];

    $about_ratings = [
        ['name' => 'Google',        'score' => '4.8', 'reviews' => '200+ reviews'],
        ['name' => 'TripAdvisor',   'score' => '4.9', 'reviews' => '36 reviews'],
        ['name' => 'Yoga Alliance', 'score' => '4.4', 'reviews' => '78+ reviews'],
    ];

    $breadcrumb_schema = [
        '@context'        => 'https://schema.org',
        '@type'           => 'BreadcrumbList',
        'itemListElement' => [
            ['@type' => 'ListItem', 'position' => 1, 'name' => 'Home',     'item' => $link],
            ['@type' => 'ListItem', 'position' => 2, 'name' => 'About Us', 'item' => $link . 'about-us.php'],
        ],
    ];
    ?>

    <!-- Page hero — only breadcrumb + h1 on the photo (.page-hero--overlay, user) -->
    <section class="page-hero page-hero--overlay">
        <div class="page-hero__bg">
            <img src="<?=$link?>assets/images/about-us/banner-img.webp" alt="Front of the Vinyasa Yoga Academy campus building in Ubud, Bali" width="1920" height="935" fetchpriority="high">

            <div class="container page-hero__overlay">
                <nav class="breadcrumb" aria-label="Breadcrumb">
                    <ol>
                        <li><a href="<?=$link?>">Home</a></li>
                        <li aria-current="page">About Us</li>
                    </ol>
                </nav>
                <h1 class="main-heading">About Vinyasa Yoga Academy</h1>
            </div>
        </div>

        <script type="application/ld+json"><?= json_encode($breadcrumb_schema, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE) ?></script>
    </section>

    <!-- Story — text left · two arch photos right · facts row (white) -->
    <section class="story spacing">
        <div class="container story__grid">
            <div class="story__content" data-reveal>
                <span class="sub-heading">Who we are</span>
                <h2 class="section-heading">Rooted in Rishikesh since 2010</h2>
                <p class="para">Vinyasa Yoga Academy was founded in Rishikesh, India, in 2010 by Yogi Vishnu Panigrahi. Rishikesh is a town on the Ganges at the foothills of the Himalayas, and it is home to many of India's yoga schools.</p>
                <p class="para">Today we run residential yoga teacher training on two campuses, in Rishikesh and in Ubud, Bali. Our courses teach Hatha, Ashtanga, Vinyasa, Yin, Acro and Kundalini yoga, together with philosophy, anatomy, pranayama and meditation.</p>

                <ul class="story__facts">
                    <?php foreach ($about_facts as $fact): ?>
                    <li>
                        <?php if (!empty($fact['plain'])): ?>
                        <strong><?= $e($fact['count']) ?></strong>
                        <?php else: ?>
                        <strong data-count="<?= $e($fact['count']) ?>"<?= isset($fact['suffix']) ? ' data-suffix="' . $e($fact['suffix']) . '"' : '' ?>><?= number_format((int) $fact['count']) ?><?= isset($fact['suffix']) ? '<em>' . $e($fact['suffix']) . '</em>' : '' ?></strong>
                        <?php endif; ?>
                        <span><?= $e($fact['label']) ?></span>
                    </li>
                    <?php endforeach; ?>
                </ul>
            </div>

            <div class="story__media" data-reveal>
                <figure class="arch-img story__img story__img--main">
                    <img src="<?=$link?>assets/images/about-us/img-2.webp" alt="Lounge with a carved Balinese stone relief at the Ubud campus" width="1000" height="667" loading="lazy">
                </figure>
                <figure class="arch-img arch-img--ring story__img story__img--side">
                    <img src="<?=$link?>assets/images/about-us/img-4.webp" alt="Covered entrance of the Ubud campus" width="1000" height="551" loading="lazy">
                </figure>
            </div>
        </div>
    </section>

    <!-- Founder — arch portrait left · bio right (section-bg) -->
    <section class="founder section-bg spacing">
        <div class="container founder__grid">
            <div class="founder__portrait" data-reveal>
                <figure class="arch-img founder__photo">
                    <img src="<?=$link?>assets/images/guruji.webp" alt="Yogi Vishnu Panigrahi, founder of Vinyasa Yoga Academy, meditating on the banks of the Ganges in Rishikesh" width="900" height="1324" loading="lazy">
                </figure>
                <span class="founder__since">Founder · Since 2010</span>
            </div>

            <div class="founder__content" data-reveal>
                <span class="sub-heading">Our Founder</span>
                <h2 class="section-heading">Yogi Vishnu Panigrahi</h2>
                <p class="founder__role">Founder · E-RYT 500, Yoga Alliance USA · 30+ years of practice</p>
                <p class="para">Yogi Vishnu Panigrahi trained under Swami Niranjan Ji and Swami Veda Bharati. He founded Vinyasa Yoga Academy in Rishikesh in 2010 and still teaches at the school.</p>

                <div class="founder__subjects">
                    <span class="founder__subjects-label">Teaches</span>
                    <ul>
                        <li>Himalayan Yoga</li>
                        <li>Meditation</li>
                        <li>Karma Yoga</li>
                        <li>Yoga Philosophy</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <!-- Approach — 4 pillars with gold-ring icons (white) -->
    <section class="approach spacing">
        <div class="container">
            <div class="approach__head" data-reveal>
                <span class="sub-heading">How We Teach</span>
                <h2 class="section-heading">What guides our training</h2>
            </div>

            <ul class="approach__grid" data-reveal>
                <?php foreach ($pillars as $i => $pillar): ?>
                <li class="pillar">
                    <span class="pillar__num"><?= sprintf('%02d', $i + 1) ?></span>
                    <span class="pillar__icon" aria-hidden="true"><?= icon($pillar['icon']) ?></span>
                    <h3 class="pillar__title"><?= $e($pillar['title']) ?></h3>
                    <p class="pillar__text"><?= $e($pillar['text']) ?></p>
                </li>
                <?php endforeach; ?>
            </ul>
        </div>
    </section>

    <!-- Campus — Ubud only (user: focus on Bali): arch photo left · details right on desktop (section-bg) -->
    <section class="campuses section-bg spacing">
        <div class="container">
            <div class="campuses__head" data-reveal>
                <span class="sub-heading">Our Campus</span>
                <h2 class="section-heading">Your home in Ubud, Bali</h2>
            </div>

            <div class="campuses__grid">
                <?php foreach ($campuses as $campus): ?>
                <article class="campus" data-reveal>
                    <figure class="arch-img campus__media">
                        <img src="<?=$link?><?= $e($campus['img']) ?>" alt="<?= $e($campus['alt']) ?>" width="600" height="800" loading="lazy">
                        <span class="campus__tag"><?= $e($campus['tag']) ?></span>
                    </figure>

                    <div class="campus__body">
                        <h3 class="card-heading"><?= $e($campus['name']) ?></h3>
                        <p class="campus__text"><?= $e($campus['text']) ?></p>
                        <ul class="campus__info">
                            <li>
                                <span class="campus__icon" aria-hidden="true"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.3"><path d="M12 21s-7-6.2-7-11.5a7 7 0 0 1 14 0C19 14.8 12 21 12 21z"/><circle cx="12" cy="9.5" r="2.5"/></svg></span>
                                <span><?= $e($campus['address']) ?></span>
                            </li>
                            <li>
                                <span class="campus__icon" aria-hidden="true"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.3" stroke-linejoin="round"><path d="M5 4h4l2 5-2.5 1.5a11 11 0 0 0 5 5L15 13l5 2v4a1 1 0 0 1-1 1A16 16 0 0 1 4 5a1 1 0 0 1 1-1z"/></svg></span>
                                <a href="tel:<?= $e($campus['tel']) ?>"><?= $e($campus['phone']) ?></a>
                            </li>
                        </ul>
                        <a href="<?= $e($campus['map']) ?>" class="link-line" target="_blank" rel="noopener">Get directions <?= $arrow ?></a>
                    </div>
                </article>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <!-- Registration + ratings (white) -->
    <!-- v2 (user): centred head · 3 RYS levels in columns · one ratings line -->
    <section class="trust spacing">
        <div class="container">
            <div class="trust__head" data-reveal>
                <span class="sub-heading">Registration</span>
                <h2 class="section-heading">Registered with Yoga Alliance</h2>
                <p class="para">Vinyasa Yoga Academy is a Yoga Alliance USA registered school at three levels. Yoga Alliance registers schools and teachers. After a course you are eligible to apply for the matching RYT designation, under Yoga Alliance's own requirements.</p>
            </div>

            <ul class="trust__levels" data-reveal>
                <?php foreach ($rys_levels as $level): ?>
                <li class="rys-level">
                    <span class="rys-level__label">RYS</span>
                    <strong class="rys-level__num"><?= $e($level['num']) ?></strong>
                    <h3 class="rys-level__title"><?= $e($level['title']) ?></h3>
                    <p class="rys-level__text"><?= $e($level['text']) ?></p>
                    <span class="rys-level__ryt"><?= $e($level['ryt']) ?></span>
                </li>
                <?php endforeach; ?>
            </ul>

            <div class="trust__foot" data-reveal>
                <ul class="trust__ratings">
                    <?php foreach ($about_ratings as $rating): ?>
                    <li>
                        <span class="trust__star" aria-hidden="true"><?= icon('star') ?></span>
                        <strong><?= $e($rating['score']) ?></strong>
                        <span><?= $e($rating['name']) ?> <small>(<?= $e($rating['reviews']) ?>)</small></span>
                    </li>
                    <?php endforeach; ?>
                </ul>
                <a href="<?= $e($social['yoga-alliance']['url']) ?>" class="link-line" target="_blank" rel="noopener">View our Yoga Alliance profile <?= $arrow ?></a>
            </div>
        </div>
    </section>

    <!-- Closing CTA (section-bg) -->
    <section class="about-cta section-bg spacing">
        <div class="container about-cta__inner" data-reveal>
            <span class="accent-text">Begin your journey</span>
            <h2 class="section-heading">Find the course that fits you</h2>
            <p class="para">Compare our 200-hour and 300-hour trainings and retreats, or ask us anything before you book.</p>
            <div class="about-cta__actions">
                <a href="<?=$link?>#courses" class="theme-btn">View Courses</a>
                <a href="<?=$link?>#contact" class="theme-btn theme-btn--outline">Contact Us</a>
            </div>
        </div>
    </section>

</main>

<?php include 'include/footer.php'; ?>
<?php include 'include/js.php'; ?>

</body>
</html>
