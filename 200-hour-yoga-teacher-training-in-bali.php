<!DOCTYPE html>
<html lang="en">
<head>
    <?php include 'include/css.php'; ?>
</head>
<body>

<?php include 'include/header.php'; ?>

<main>

    <?php
    /* 200 Hour YTT in Bali — course detail page (template for the other course pages).
       Facts from the live course page (vinyasayogaacademy.com/200-hour-yoga-teacher-training-in-bali.php, read 31 Oct 2026)
       and the vinyasa-yoga-content skill. Yoga Alliance wording = "registered" / "eligible to apply" (never "certified").
       ⚠ Live page lists the Bali address as "No 77 A, Jl. Bisma" — the rest of this site uses "Jl. Raya Andong". Owner to confirm.
       ⚠ Re-check prices + dates before launch; never show seat counts (they change daily). */
    $arrow = '<svg viewBox="0 0 22 10" fill="none" stroke="currentColor" stroke-width="1" aria-hidden="true"><path d="M0 5h21M17 1l4 4-4 4"/></svg>';
    $book_url = $link . '#contact'; // TODO: booking / enquiry page

    $facts = [
        ['icon' => 'calendar', 'label' => 'Duration',    'value' => '15 days'],
        ['icon' => 'clock',    'label' => 'Training',    'value' => '200 hours'],
        ['icon' => 'sprout',   'label' => 'Level',       'value' => 'Beginners welcome'],
        ['icon' => 'users',    'label' => 'Group size',  'value' => '15–20 students'],
        ['icon' => 'chat',     'label' => 'Language',    'value' => 'English'],
        ['icon' => 'badge',    'label' => 'Certificate', 'value' => 'RYT 200 eligible'],
    ];

    // Overview photo row — middle one is the tallest (wave). TODO: replace with dedicated 200hr Bali photos
    $overview_photos = [ // user's course photos (assets/images/course/), centre = the biggest, highest one
        ['img' => 'assets/images/course/img-3.webp', 'w' => 600, 'h' => 900, 'alt' => 'Student sitting cross-legged on a bolster, listening during a class'],
        ['img' => 'assets/images/course/1-321.webp', 'w' => 600, 'h' => 900, 'alt' => 'Teacher giving a student a hands-on adjustment in a supine stretch'],
        ['img' => 'assets/images/course/img-1.webp', 'w' => 600, 'h' => 900, 'alt' => 'Student hanging upside down in an aerial yoga hammock beside a stone Buddha'],
        ['img' => 'assets/images/course/img-2.webp', 'w' => 600, 'h' => 900, 'alt' => 'Student meditating cross-legged with hands in prayer position'],
        ['img' => 'assets/images/course/img-4.webp', 'w' => 600, 'h' => 800, 'alt' => 'Carved stone Ganesha relief at the Ubud campus'],
    ];

    // Curriculum grouped in 3 pillars. Each subject opens a popup (detail + key topics) — content from the live course page.
    $curriculum = [
        [
            'icon'  => 'lotus',
            'title' => 'Practice',
            'intro' => 'The daily disciplines you learn to do, and to teach.',
            'subjects' => [
                ['name' => 'Hatha Yoga',
                 'detail' => 'The foundation of the course. You study the theory of Hatha yoga, including chakras, nadis and its use in yoga therapy, and practise it every evening.',
                 'items' => ['Surya Namaskar', 'Chandra Namaskar', 'Standing postures', 'Seated & supine postures', 'Inversions', 'Fire Series', 'Meditative asana']],
                ['name' => 'Ashtanga Vinyasa',
                 'detail' => 'A daily morning practice of the Ashtanga sequence. You learn its history, the use of bandha and drishti, and how to teach it to others.',
                 'items' => ['History of Ashtanga', 'Bandha', 'Drishti', 'Standing sequence', 'Seated sequence', 'Finishing sequence']],
                ['name' => 'Pranayama',
                 'detail' => 'Fifteen breathing practices, taught step by step together with Shatkarma in the early morning.',
                 'items' => ['Nadi Shodhana', 'Bhastrika', 'Kapalbhati', 'Bhramari', 'Ujjayi', 'Sitali']],
                ['name' => 'Meditation & Nidra',
                 'detail' => 'More than twenty meditation practices, plus the theory of yoga nidra and three ways to practise and guide it.',
                 'items' => ['Tratak', 'Om chanting', 'Kirtan', 'Anapana', 'Silence practice', 'Yoga Nidra']],
                ['name' => 'Shatkarma',
                 'detail' => 'The traditional yogic cleansing practices, learned under supervision as part of the morning session.',
                 'items' => ['Jala Neti', 'Rubber Neti', 'Kapalbhati', 'Agnisara']],
                ['name' => 'Mudra & Bandha',
                 'detail' => 'Seventeen mudras, from Gyan Mudra to Pran-Apan Mudra, and the three main energy locks used in asana and pranayama.',
                 'items' => ['Gyan Mudra', 'Pran-Apan Mudra', 'Mula Bandha', 'Uddiyana Bandha', 'Jalandhara Bandha']],
            ],
        ],
        [
            'icon'  => 'globe',
            'title' => 'Knowledge',
            'intro' => 'The theory behind the practice: body, mind and tradition.',
            'subjects' => [
                ['name' => 'Yoga Philosophy',
                 'detail' => 'The classical texts and ideas of yoga, studied in a daily philosophy class.',
                 'items' => ['Yoga Sutras', 'Eight Limbs', 'Bhagavad Gita', 'Upanishads', 'Chakras', 'Kundalini']],
                ['name' => 'Anatomy & Physiology',
                 'detail' => 'How the body moves and works in practice, taught together with yoga therapy in a daily class.',
                 'items' => ['Body planes', 'Movements', 'Skeletal system', 'Muscular system', 'Nervous system', 'Respiratory system', 'Energy body']],
                ['name' => 'Yoga Therapy & Ayurveda',
                 'detail' => 'The rules and principles of yoga therapy, and an introduction to Ayurveda and the three doshas.',
                 'items' => ['Rules of yoga therapy', 'Ayurveda basics', 'Vata', 'Pitta', 'Kapha', 'Prakriti']],
                ['name' => 'Mantra Chanting',
                 'detail' => 'Twenty traditional mantras, chanted together in the morning Mantra & Meditation session.',
                 'items' => ['Gayatri Mantra', 'Om Namah Shivaya', 'Surya Namaskar 12 mantras']],
            ],
        ],
        [
            'icon'  => 'users',
            'title' => 'Teaching',
            'intro' => 'The skills to lead a safe, clear class of your own.',
            'subjects' => [
                ['name' => 'Teaching Methodology',
                 'detail' => 'How to plan and lead a class: building a sequence, demonstrating clearly and keeping students safe.',
                 'items' => ['Sequencing', 'Demonstration', 'Class structure', 'Adjustments', 'Injury prevention']],
                ['name' => 'Alignment & Adjustment',
                 'detail' => 'A daily session on safe alignment in the postures and on giving hands-on adjustments.',
                 'items' => ['Alignment', 'Hands-on adjustment', 'Daily session']],
                ['name' => 'Injury Prevention',
                 'detail' => 'How to recognise risk in a pose and offer modifications, so every student can practise safely.',
                 'items' => ['Safe practice', 'Modifications']],
                ['name' => 'Daily Teaching Practice',
                 'detail' => 'A short teaching practice session every day, so you build confidence leading a class before the course ends.',
                 'items' => ['Teach every day', 'Lead your fellow students', 'Build confidence']],
            ],
        ],
    ];

    // Daily schedule (live course page). 'short' = label written on the watch face; the centre shows the full name.
    $schedule = [
        ['time' => '05:00', 'end' => '06:00', 'session' => 'Yoga Sadhana',           'short' => 'Sadhana',    'icon' => 'sun'],
        ['time' => '06:00', 'end' => '07:30', 'session' => 'Ashtanga Vinyasa',       'short' => 'Ashtanga',   'icon' => 'lotus'],
        ['time' => '07:40', 'end' => '08:20', 'session' => 'Shatkarma & Pranayama',  'short' => 'Pranayama',  'icon' => 'wind'],
        ['time' => '08:20', 'end' => '09:00', 'session' => 'Mantra & Meditation',    'short' => 'Meditation', 'icon' => 'lotus'],
        ['time' => '09:00', 'end' => '10:00', 'session' => 'Breakfast',              'short' => 'Breakfast',  'icon' => 'bowl', 'meal' => true],
        ['time' => '10:15', 'end' => '11:15', 'session' => 'Yoga Philosophy',        'short' => 'Philosophy', 'icon' => 'book'],
        ['time' => '11:20', 'end' => '12:20', 'session' => 'Alignment & Adjustment', 'short' => 'Alignment',  'icon' => 'users'],
        ['time' => '12:20', 'end' => '12:45', 'session' => 'Teaching Practice',      'short' => 'Teaching',   'icon' => 'chat'],
        ['time' => '12:45', 'end' => '13:30', 'session' => 'Lunch',                  'short' => 'Lunch',      'icon' => 'bowl', 'meal' => true],
        ['time' => '14:30', 'end' => '15:30', 'session' => 'Self Study',             'short' => 'Self Study', 'icon' => 'book'],
        ['time' => '15:45', 'end' => '16:45', 'session' => 'Yoga Anatomy & Therapy', 'short' => 'Anatomy',    'icon' => 'body'],
        ['time' => '17:00', 'end' => '18:30', 'session' => 'Hatha Yoga',             'short' => 'Hatha Yoga', 'icon' => 'lotus'],
        ['time' => '18:45', 'end' => '19:30', 'session' => 'Dinner',                 'short' => 'Dinner',     'icon' => 'bowl', 'meal' => true],
        ['time' => '22:00', 'end' => '05:00', 'session' => 'Lights Off & Rest',      'short' => 'Rest',       'icon' => 'moon'],
    ];

    // Monthly batches from the 1st to the 15th
    $batches = [
        ['start' => '01 Nov', 'end' => '15 Nov', 'year' => '2026'],
        ['start' => '01 Dec', 'end' => '15 Dec', 'year' => '2026'],
        ['start' => '01 Jan', 'end' => '15 Jan', 'year' => '2027'],
        ['start' => '01 Feb', 'end' => '15 Feb', 'year' => '2027'],
        ['start' => '01 Mar', 'end' => '15 Mar', 'year' => '2027'],
        ['start' => '01 Apr', 'end' => '15 Apr', 'year' => '2027'],
    ];

    $included = [
        'Shared or private room with attached bathroom',
        'Three sattvic vegetarian meals a day (Sunday lunch and dinner not included)',
        'Printed and digital study materials and course manual',
        'Yoga props: mat, bolster, belt and blocks',
        'Weekly workshops with visiting teachers',
        'Sunday excursions: temple visits, beach yoga and sightseeing',
        '24/7 clean water on campus',
        'VYA 200-hour completion certificate',
    ];
    $not_included = [
        'Flights and visa fees',
        'Airport pickup (can be arranged at extra cost)',
        'Air-conditioning (USD 150 per month; rooms have a fan)',
        'Extra nights before or after the course',
        'Laundry and personal expenses',
        'Sunday lunch and dinner',
    ];

    $teachers = [
        ['name' => 'Yogi Vishnu Panigrahi', 'role' => 'Founder & Lead Teacher', 'text' => 'E-RYT 500, Yoga Alliance USA. Teaches in the Himalayan yoga tradition.', 'img' => 'assets/images/guruji.webp'],
        ['name' => 'Yogi Yansa Ji',         'role' => 'Lead Teacher, Bali',     'text' => 'Balinese lead teacher of the Ubud campus, focused on asana and sadhana practice.', 'initials' => 'YJ'],
        ['name' => 'Yogi Shakti Ji',        'role' => 'Teacher',                'text' => 'Teaches yogic science and naturopathy.', 'initials' => 'SJ'],
    ];

    $course_faqs = [
        ['q' => 'Do I need yoga experience to join?',       'a' => 'No. The course is open to complete beginners. You need to be 18 or older, and a regular practice before you arrive will make the first week easier.'],
        ['q' => 'How long is the course and when does it start?', 'a' => 'The training runs for 15 days and 200 hours. A new batch starts on the 1st of every month and ends on the 15th.'],
        ['q' => 'Which styles of yoga will I learn?',        'a' => 'The main styles are Hatha, Ashtanga and Vinyasa, with elements of Yin, Restorative yoga and Yoga Nidra.'],
        ['q' => 'How many students are in a group?',         'a' => 'Groups are 15 to 20 students. All sessions are taught in simple, clear English.'],
        ['q' => 'What certificate will I receive?',          'a' => 'After a practical asana test and full attendance, you receive the VYA 200-hour completion certificate. You are then eligible to apply for the RYT 200 designation with Yoga Alliance.'],
        ['q' => 'Do I need a visa for Bali?',                'a' => 'Most travellers can get a visa on arrival in Bali, valid for 30 days and extendable once. Rules depend on your nationality, so please check the official Indonesian immigration website before you book flights.'],
        ['q' => 'How do I get to the campus in Ubud?',       'a' => 'Fly into Ngurah Rai International Airport (DPS) in Denpasar. The drive to Ubud takes about 1.5 hours. We can arrange an airport pickup at extra cost.'],
        ['q' => 'Can I cancel or move my booking?',          'a' => 'The 20% booking deposit is non-refundable, and fees are not refunded once the course has started. You can move to a future batch if you tell us in advance. Please read the full refund policy before you book.'],
    ];

    $course_schema = [
        '@context'    => 'https://schema.org',
        '@type'       => 'Course',
        'name'        => '200 Hour Yoga Teacher Training in Bali',
        'description' => 'A 15-day residential 200-hour yoga teacher training in Ubud, Bali, open to beginners. Graduates are eligible to apply for RYT 200 with Yoga Alliance.',
        'provider'    => ['@type' => 'Organization', 'name' => $site_name, 'sameAs' => $link],
        'offers'      => ['@type' => 'Offer', 'category' => 'Paid', 'price' => '1699', 'priceCurrency' => 'USD'],
    ];
    $breadcrumb_schema = [
        '@context'        => 'https://schema.org',
        '@type'           => 'BreadcrumbList',
        'itemListElement' => [
            ['@type' => 'ListItem', 'position' => 1, 'name' => 'Home',    'item' => $link],
            ['@type' => 'ListItem', 'position' => 2, 'name' => 'Courses', 'item' => $link . '#courses'],
            ['@type' => 'ListItem', 'position' => 3, 'name' => '200 Hour YTT in Bali', 'item' => $link . '200-hour-yoga-teacher-training-in-bali.php'],
        ],
    ];
    ?>

    <!-- Page hero — only breadcrumb + h1 on the photo (.page-hero--overlay, user). TODO: course-specific banner photo -->
    <section class="page-hero page-hero--overlay page-hero--course">
        <div class="page-hero__bg">
            <img src="<?=$link?>assets/images/course/banner-img.webp" alt="Yoga teacher training students meditating together in a circle in the Ubud shala" width="1916" height="1162" fetchpriority="high">

            <div class="container page-hero__overlay">
                <nav class="breadcrumb" aria-label="Breadcrumb">
                    <ol>
                        <li><a href="<?=$link?>">Home</a></li>
                        <li><a href="<?=$link?>#courses">Courses</a></li>
                        <li aria-current="page">200 Hour YTT</li>
                    </ol>
                </nav>
                <h1 class="main-heading">200 Hour Yoga Teacher Training in Bali</h1>
            </div>
        </div>

        <!-- Quick facts — frosted bar on the bottom of the photo (≥992), strip under the photo on mobile -->
        <div class="container course-facts-bar">
            <ul class="course-facts">
                <?php foreach ($facts as $fact): ?>
                <li>
                    <span class="course-facts__icon" aria-hidden="true"><?= icon($fact['icon']) ?></span>
                    <span class="course-facts__label"><?= $e($fact['label']) ?></span>
                    <strong class="course-facts__value"><?= $e($fact['value']) ?></strong>
                </li>
                <?php endforeach; ?>
            </ul>
        </div>

        <script type="application/ld+json"><?= json_encode($breadcrumb_schema, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE) ?></script>
        <script type="application/ld+json"><?= json_encode($course_schema, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE) ?></script>
    </section>

    <!-- Overview (v2) — centred text · full-width row of 5 arch photos below, wider than the container (section-bg) -->
    <section class="course-overview section-bg spacing">
        <div class="container">
            <div class="course-overview__content" data-reveal>
                <span class="sub-heading">Course Overview</span>
                <h2 class="section-heading">Your first step as a yoga teacher</h2>
                <p class="para">This 200-hour course is a full, residential foundation in yoga. You live on campus in Ubud for 15 days and follow a set daily schedule, from morning sadhana to evening Hatha practice.</p>
                <p class="para">The main styles are Hatha, Ashtanga and Vinyasa, with elements of Yin, Restorative yoga and Yoga Nidra. Alongside asana you study pranayama, meditation, philosophy, anatomy and teaching methodology, and you practise teaching every day.</p>
                <ul class="course-overview__points">
                    <li><?= icon('check') ?> Open to beginners, age 18+</li>
                    <li><?= icon('check') ?> Monthly batches, 1st to 15th</li>
                    <li><?= icon('check') ?> Taught in simple, clear English</li>
                    <li><?= icon('check') ?> Eligible to apply for RYT 200</li>
                </ul>
            </div>
        </div>

        <!-- Edge-to-edge photo row (outside .container) — desktop: rounded photos in a rising arc, centre biggest. Below 992px: swipeable Swiper, always 1 full photo, no controls (user) — script.js [data-mobile-slider="single"].
             TODO: more 200hr Bali photos -->
        <div class="course-gallery" data-mobile-slider="single" data-reveal>
            <div class="course-gallery__swiper swiper">
                <div class="course-gallery__track swiper-wrapper">
                    <?php foreach ($overview_photos as $photo): ?>
                    <figure class="course-gallery__item swiper-slide">
                        <img src="<?=$link?><?= $e($photo['img']) ?>" alt="<?= $e($photo['alt']) ?>" width="<?= $photo['w'] ?>" height="<?= $photo['h'] ?>" loading="lazy">
                    </figure>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </section>

    <!-- Curriculum (v2) — subjects grouped in 3 pillars: Practice · Knowledge · Teaching (white) -->
    <section class="curriculum spacing" id="curriculum">
        <div class="container">
            <div class="course-head" data-reveal>
                <span class="sub-heading">Curriculum</span>
                <h2 class="section-heading">What you will study</h2>
                <p class="para">Every subject is taught in theory and in practice, so you learn both how to do it and how to teach it.</p>
            </div>

            <!-- Each subject is a button → opens its popup (<dialog>). JS: [data-modal-open] in script.js -->
            <!-- <992: the 3 pillars become tabs (one list at a time — user: section was far too long on phones). JS: [data-pillars] -->
            <div class="pillars" data-pillars data-reveal>
                <div class="pillars__tabs" role="tablist" aria-label="Curriculum areas">
                    <?php foreach ($curriculum as $g => $group): ?>
                    <button type="button" class="pillars__tab<?= $g === 0 ? ' is-active' : '' ?>" role="tab" aria-selected="<?= $g === 0 ? 'true' : 'false' ?>" data-pillar-tab>
                        <span aria-hidden="true"><?= icon($group['icon']) ?></span><?= $e($group['title']) ?>
                    </button>
                    <?php endforeach; ?>
                </div>
                <?php $n = 0; foreach ($curriculum as $g => $group): ?>
                <article class="pillar-col<?= $g === 0 ? ' is-active' : '' ?>" data-pillar>
                    <span class="pillar-col__icon" aria-hidden="true"><?= icon($group['icon']) ?></span>
                    <h3 class="pillar-col__title"><?= $e($group['title']) ?></h3>
                    <p class="pillar-col__intro"><?= $e($group['intro']) ?></p>
                    <ul class="pillar-col__list">
                        <?php foreach ($group['subjects'] as $subject): $n++; ?>
                        <li>
                            <button type="button" class="pillar-col__subject" data-modal-open="subject-<?= $n ?>" aria-haspopup="dialog">
                                <strong><?= $e($subject['name']) ?></strong>
                                <span class="pillar-col__more" aria-hidden="true"><?= icon('close') ?></span>
                            </button>
                        </li>
                        <?php endforeach; ?>
                    </ul>
                </article>
                <?php endforeach; ?>
            </div>

            <!-- Subject popups — centred window on desktop, bottom sheet on mobile -->
            <?php $n = 0; foreach ($curriculum as $group): foreach ($group['subjects'] as $subject): $n++; ?>
            <dialog class="modal" id="subject-<?= $n ?>" aria-labelledby="subject-<?= $n ?>-title">
                <div class="modal__box">
                    <button type="button" class="modal__close circle-btn" data-modal-close aria-label="Close"><?= icon('close') ?></button>
                    <span class="modal__label"><span aria-hidden="true"><?= icon($group['icon']) ?></span><?= $e($group['title']) ?></span>
                    <h3 class="modal__title" id="subject-<?= $n ?>-title"><?= $e($subject['name']) ?></h3>
                    <p class="modal__text"><?= $e($subject['detail']) ?></p>
                    <span class="modal__subtitle">Key topics</span>
                    <ul class="modal__tags">
                        <?php foreach ($subject['items'] as $item): ?>
                        <li><?= $e($item) ?></li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            </dialog>
            <?php endforeach; endforeach; ?>
        </div>
    </section>

    <!-- Highlights (user: below the curriculum) — shared include/highlights.php -->
    <?php include 'include/highlights.php'; ?>

    <!-- Accommodation — shared include/accommodation.php (room tabs · photo slider · details) -->
    <?php include 'include/accommodation.php'; ?>

    <!-- Daily schedule (v5.1, "day timeline as a table", user) — one sticky arch photo left + right (≥1200) ·
         centre: table-style timeline (Time · Session · Duration), Morning / Afternoon / Evening group rows, hairline rows, a vertical
         line through gold diamond markers. While scrolling the line fills gold and reached rows light up (JS: [data-day-line]).
         The v4 watch's .watch SCSS and [data-clock] JS are kept (unused) for an easy revert. -->
    <?php
    $day_part = fn (string $time) => (int) $time < 12 ? 'Morning' : ((int) $time < 18 ? 'Afternoon' : 'Evening');
    // "40 min" / "1 h" / "1 h 30" — end may be after midnight (rest 22:00 → 05:00)
    $duration = function (string $from, string $to): string {
        [$fh, $fm] = array_map('intval', explode(':', $from));
        [$th, $tm] = array_map('intval', explode(':', $to));
        $min = (($th * 60 + $tm) - ($fh * 60 + $fm) + 1440) % 1440;
        return $min < 60 ? $min . ' min' : intdiv($min, 60) . ' h' . ($min % 60 ? ' ' . $min % 60 : '');
    };
    // one arch photo each side (user: only 2 photos, shown properly) — morning circle left, study session right
    $schedule_photos = [
        'left'  => ['assets/images/overview-img-2.webp', 600, 1066, 'Morning circle in the open-air shala', 'Morning circle'],
        'right' => ['assets/images/overview-img-1.webp', 600, 800, 'Students studying on cushions in the shala above the jungle', 'Afternoon study'],
    ];
    ?>
    <section class="schedule section-bg spacing">
        <div class="container">
            <div class="course-head" data-reveal>
                <span class="sub-heading">A Day at the Shala</span>
                <h2 class="section-heading">Daily schedule</h2>
                <p class="para">Days start early and follow a steady rhythm of practice, study and rest. Timings may change slightly with the season and weather.</p>
            </div>

            <div class="schedule__stage">
                <?php [$src, $w, $h, $alt, $cap] = $schedule_photos['left']; ?>
                <figure class="schedule__photo schedule__photo--left">
                    <span class="arch-img"><img src="<?=$link?><?= $src ?>" alt="<?= $e($alt) ?>" width="<?= $w ?>" height="<?= $h ?>" loading="lazy"></span>
                    <figcaption><?= $e($cap) ?></figcaption>
                </figure>

                <div class="day-line" data-day-line data-reveal>
                    <div class="day-line__head" aria-hidden="true">
                        <span>Time</span><span>Session</span><span>Duration</span>
                    </div>
                    <ol class="day-line__list">
                        <?php $part = ''; foreach ($schedule as $slot): $meal = !empty($slot['meal']);
                            if ($day_part($slot['time']) !== $part): $part = $day_part($slot['time']); ?>
                        <li class="day-line__group"><?= $part ?></li>
                        <?php endif; ?>
                        <li class="day-line__item<?= $meal ? ' day-line__item--meal' : '' ?>">
                            <span class="day-line__time"><strong><?= $e($slot['time']) ?></strong> <span>to <?= $e($slot['end']) ?></span></span>
                            <span class="day-line__dot" aria-hidden="true"></span>
                            <span class="day-line__name"><?= $e($slot['session']) ?></span>
                            <span class="day-line__len"><?= $duration($slot['time'], $slot['end']) ?></span>
                        </li>
                        <?php endforeach; ?>
                    </ol>
                </div>

                <?php [$src, $w, $h, $alt, $cap] = $schedule_photos['right']; ?>
                <figure class="schedule__photo schedule__photo--right">
                    <span class="arch-img"><img src="<?=$link?><?= $src ?>" alt="<?= $e($alt) ?>" width="<?= $w ?>" height="<?= $h ?>" loading="lazy"></span>
                    <figcaption><?= $e($cap) ?></figcaption>
                </figure>
            </div>

            <!-- note under the table (user: "as a note", was 3 pills) -->
            <aside class="schedule__note" data-reveal>
                <span class="schedule__note-title">Please note</span>
                <ul>
                    <li><strong>Thursday</strong> <span>Silence day</span></li>
                    <li><strong>Sunday</strong> <span>Free day with excursions</span></li>
                    <li><strong>After 20:00</strong> <span>Silence on campus</span></li>
                </ul>
            </aside>
        </div>
    </section>

    <!-- Dates (white) — room fees removed (user, 2026-11-02); only the upcoming batches -->
    <section class="fees spacing" id="fees">
        <div class="container">
            <div class="course-head" data-reveal>
                <span class="sub-heading">Upcoming Dates</span>
                <h2 class="section-heading">Choose your month</h2>
                <p class="para">A new batch starts on the 1st of every month and runs for 15 days. Ask us about later dates.</p>
            </div>

            <!-- Upcoming batches (v2, user: "make it better") — calendar cards: a cream calendar page per batch with two gold binding rings,
                 month + year, big date range, length, Book. First = "Next batch". compact (user): 2 · 3 (≥768) · 6 in one row (≥1200). -->
            <div class="batches" data-reveal>
                <ul class="batches__list">
                    <?php foreach ($batches as $i => $batch):
                        $month = date('F', strtotime($batch['start'] . ' ' . $batch['year'])); // "01 Nov" + "2026" → November
                    ?>
                    <li class="batch-card<?= $i === 0 ? ' is-next' : '' ?>">
                        <?php if ($i === 0): ?><span class="batch-card__flag">Next batch</span><?php endif; ?>
                        <div class="batch-card__head">
                            <span class="batch-card__month"><?= $e($month) ?></span>
                            <span class="batch-card__year"><?= $e($batch['year']) ?></span>
                        </div>
                        <div class="batch-card__body">
                            <p class="batch-card__dates">
                                <strong><?= $e(substr($batch['start'], 0, 2)) ?></strong>
                                <em>to</em>
                                <strong><?= $e(substr($batch['end'], 0, 2)) ?></strong>
                            </p>
                            <span class="batch-card__meta">15 days · 200 hours</span>
                            <a href="<?= $e($book_url) ?>" class="theme-btn theme-btn--outline theme-btn--sm theme-btn--block" aria-label="Book the <?= $e($month . ' ' . $batch['year']) ?> batch">Book <?= $arrow ?></a>
                        </div>
                    </li>
                    <?php endforeach; ?>
                </ul>
            </div>
        </div>
    </section>

    <!-- Included / not included (v2, "travel tickets") — two boarding-pass cards with a perforated tear line,
         gold check stamps, a stub with course details and a decorative barcode (section-bg) -->
    <?php
    // decorative barcode: bar widths repeat in a fixed pattern (no meaning)
    $barcode = function (int $bars = 34): string {
        $w = [1, 2, 1, 3, 1, 1, 2, 1, 3, 2, 1, 1];
        $x = 0;
        $out = '';
        for ($b = 0; $b < $bars; $b++) {
            $bw = $w[$b % count($w)];
            if ($b % 2 === 0) $out .= sprintf('<rect x="%d" y="0" width="%d" height="28"/>', $x, $bw);
            $x += $bw + 1;
        }
        return '<svg class="ticket__barcode" viewBox="0 0 ' . $x . ' 28" preserveAspectRatio="none" aria-hidden="true">' . $out . '</svg>';
    };
    ?>
    <section class="inclusions section-bg spacing">
        <div class="container">
            <div class="course-head" data-reveal>
                <span class="sub-heading">Your Fee</span>
                <h2 class="section-heading">What is included</h2>
                <p class="para">Everything you need for 15 days on campus is in one fee. A few travel costs are yours to plan.</p>
            </div>

            <div class="inclusions__grid">
                <!-- Ticket 1: included -->
                <article class="ticket" data-reveal>
                    <header class="ticket__head">
                        <span class="ticket__label">Included in your fee</span>
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
                            <div><dt>Course</dt><dd>200 Hour YTT</dd></div>
                            <div><dt>Duration</dt><dd>15 days</dd></div>
                            <div><dt>From</dt><dd>USD 1,699</dd></div>
                        </dl>
                        <?= $barcode() ?>
                    </footer>
                </article>

                <!-- Ticket 2: not included -->
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

                    <div class="ticket__tear" aria-hidden="true"></div>

                    <footer class="ticket__stub">
                        <p class="ticket__note">Questions about travel or rooms? <a href="<?= $e($book_url) ?>" class="link-line">Ask us <?= $arrow ?></a></p>
                    </footer>
                </article>
            </div>
        </div>
    </section>

    <!-- Teachers (white) -->
    <section class="course-teachers spacing">
        <div class="container">
            <div class="course-head" data-reveal>
                <span class="sub-heading">Your Teachers</span>
                <h2 class="section-heading">Who will guide you</h2>
            </div>

            <ul class="course-teachers__grid" data-reveal>
                <?php foreach ($teachers as $t): ?>
                <li class="teacher">
                    <?php if (!empty($t['img'])): ?>
                    <figure class="arch-img teacher__photo"><img src="<?=$link?><?= $e($t['img']) ?>" alt="<?= $e($t['name']) ?>" width="900" height="1324" loading="lazy"></figure>
                    <?php else: ?>
                    <!-- TODO: teacher photo -->
                    <div class="teacher__photo teacher__photo--initials" aria-hidden="true"><span><?= $e($t['initials']) ?></span></div>
                    <?php endif; ?>
                    <span class="teacher__role"><?= $e($t['role']) ?></span>
                    <h3 class="teacher__name"><?= $e($t['name']) ?></h3>
                    <p class="teacher__text"><?= $e($t['text']) ?></p>
                </li>
                <?php endforeach; ?>
            </ul>
        </div>
    </section>

    <!-- Good to know (v2, user: "make the UI better") — 3 white cards on the cream section: faded gold number, duotone icon in a gold ring,
         gold kicker + title, points with gold check circles; hover lifts the card and draws a gold line along its bottom. -->
    <?php
    $know = [
        ['icon' => 'sprout', 'kicker' => 'Eligibility', 'title' => 'Who can join', 'items' => [
            'Age 18 and above',
            'No previous yoga experience needed',
            'Attendance at all classes is required',
            'Vegetarian food only; no smoking or alcohol on campus',
        ]],
        ['icon' => 'certificate', 'kicker' => 'Assessment', 'title' => 'Certification', 'items' => [
            'Practical asana test',
            'Assessment of attendance and conduct',
            'VYA 200-hour completion certificate',
            'Eligible to apply for RYT 200 with Yoga Alliance',
        ]],
        ['icon' => 'globe', 'kicker' => 'Travel', 'title' => 'Getting here', 'items' => [
            'Fly into Ngurah Rai Airport (DPS), Denpasar',
            'About 1.5 hours by road to Ubud',
            'Airport pickup at extra cost',
            'Driest months: April to October',
        ]],
    ];
    ?>
    <section class="good-to-know section-bg spacing">
        <div class="container">
            <div class="course-head" data-reveal>
                <span class="sub-heading">Good to Know</span>
                <h2 class="section-heading">Before you book</h2>
            </div>

            <div class="good-to-know__grid" data-reveal>
                <?php foreach ($know as $n => $card): ?>
                <article class="know">
                    <span class="know__num" aria-hidden="true"><?= sprintf('%02d', $n + 1) ?></span>
                    <span class="know__icon" aria-hidden="true"><?= feature_icon($card['icon']) ?></span>
                    <span class="know__kicker"><?= $e($card['kicker']) ?></span>
                    <h3 class="know__title"><?= $e($card['title']) ?></h3>
                    <ul class="know__list">
                        <?php foreach ($card['items'] as $item): ?>
                        <li><span class="know__check" aria-hidden="true"><?= icon('check') ?></span><?= $e($item) ?></li>
                        <?php endforeach; ?>
                    </ul>
                </article>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <!-- FAQ — shared component include/faq.php: full-height photo left (45%) · accordion right (white) -->
    <?php
    $faq_list  = $course_faqs;
    $faq_title = 'Questions about this course';
    $faq_text  = 'Short answers to what students ask before joining the 200-hour training in Bali.';
    $faq_img   = ['src' => 'course/faqs-img.webp', 'w' => 992, 'h' => 1336, 'alt' => 'Host carrying a tea tray down a stone stairway beside the pool, under a carved round emblem'];
    include 'include/faq.php';
    ?>

    <!-- Closing CTA (section-bg) — reuses .about-cta -->
    <section class="about-cta section-bg spacing">
        <div class="container about-cta__inner" data-reveal>
            <span class="accent-text">Begin your journey</span>
            <h2 class="section-heading">Join the next batch in Ubud</h2>
            <p class="para">A new 200-hour training starts on the 1st of every month. Ask us about rooms, dates or anything else before you book.</p>
            <div class="about-cta__actions">
                <a href="<?= $e($book_url) ?>" class="theme-btn">Book Your Spot</a>
                <a href="<?= $e($social['whatsapp']['url']) ?>" class="theme-btn theme-btn--outline" target="_blank" rel="noopener">Chat on WhatsApp</a>
            </div>
        </div>
    </section>

</main>

<?php include 'include/footer.php'; ?>
<?php include 'include/js.php'; ?>

</body>
</html>
