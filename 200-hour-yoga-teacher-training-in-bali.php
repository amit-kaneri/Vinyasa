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
        ['icon' => 'calendar', 'label' => 'Duration',    'value' => '20 days'],
        ['icon' => 'clock',    'label' => 'Training',    'value' => '200 hours'],
        ['icon' => 'sprout',   'label' => 'Level',       'value' => 'Beginners welcome'],
        ['icon' => 'users',    'label' => 'Group size',  'value' => '15–20 students'],
        ['icon' => 'chat',     'label' => 'Language',    'value' => 'English'],
        ['icon' => 'badge',    'label' => 'Certificate', 'value' => 'RYT 200 eligible'],
    ];

    // Overview photo row — middle one is the tallest (wave). TODO: replace with dedicated 200hr Bali photos
    $overview_photos = [
        ['img' => 'assets/images/overview-img-2.webp',   'w' => 600, 'h' => 1066, 'alt' => 'Yoga class in the open-air shala in Ubud'],
        ['img' => 'assets/images/yoga-retreat-img.webp', 'w' => 600, 'h' => 1066, 'alt' => 'Students practising together in the shala'],
        ['img' => 'assets/images/200-hour-ttc.webp',     'w' => 600, 'h' => 1066, 'alt' => 'Graduates in white holding their certificates beside rice fields in Ubud'],
        ['img' => 'assets/images/overview-img-1.webp',   'w' => 600, 'h' => 800,  'alt' => 'Morning practice in the Ubud shala'],
        ['img' => 'assets/images/why-dining.webp',       'w' => 600, 'h' => 1066, 'alt' => 'Students sharing a meal in the open-air dining pavilion'],
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

    // Top-down room drawing for the fee cards: gold room outline + one bed per person (pillow at the wall side).
    // Layouts per room size: [x, y, width, height, pillow at top?]
    $room_svg = function (int $beds): string {
        $layouts = [
            1 => [[27, 9, 26, 30, true]],                                    // private room: one bed
            2 => [[16, 14, 18, 30, true], [46, 14, 18, 30, true]],
            4 => [[20, 9, 15, 17, true], [45, 9, 15, 17, true], [20, 28, 15, 17, false], [45, 28, 15, 17, false]],
            6 => [[10, 9, 14, 17, true], [33, 9, 14, 17, true], [56, 9, 14, 17, true],
                  [10, 28, 14, 17, false], [33, 28, 14, 17, false], [56, 28, 14, 17, false]],
        ];
        $svg = '<svg viewBox="0 0 80 56" fill="none" stroke="currentColor" stroke-width="1.2" stroke-linejoin="round" aria-hidden="true">'
             . '<path d="M42 53H77V3H3v50h31"/>'                                   // walls, gap at the bottom = door
             . '<path d="M34 53a8 8 0 0 1 8-8" stroke-dasharray="1.5 2"/>';          // door swing
        foreach ($layouts[$beds] ?? [] as [$x, $y, $w, $h, $top]) {
            $py = $top ? $y + 2 : $y + $h - 6;                                       // pillow near the wall
            $svg .= sprintf('<rect class="bed" x="%s" y="%s" width="%s" height="%s" rx="2"/>', $x, $y, $w, $h)
                  . sprintf('<rect class="pillow" x="%s" y="%s" width="%s" height="4" rx="1.2"/>', $x + 2, $py, $w - 4);
        }
        return $svg . '</svg>';
    };

    // TODO: real room photos — save as assets/images/rooms/6-sharing.webp, 4-sharing.webp, 2-sharing.webp, private.webp
    // and update img/w/h. Until then these are campus placeholders.
    $fees = [
        ['room' => '6-Sharing', 'note' => 'Female only',   'beds' => 6, 'price' => '1,299', 'img' => 'assets/images/about-us/back-view.webp', 'w' => 1000, 'h' => 750],
        ['room' => '4-Sharing', 'note' => 'Female only',   'beds' => 4, 'price' => '1,399', 'img' => 'assets/images/about-us/img-2.webp',     'w' => 1000, 'h' => 667],
        ['room' => '2-Sharing', 'note' => 'Shared room',   'beds' => 2, 'price' => '1,699', 'img' => 'assets/images/about-us/image-3.webp',   'w' => 1000, 'h' => 689],
        ['room' => 'Private',   'note' => 'Your own room', 'beds' => 1, 'price' => '2,299', 'img' => 'assets/images/about-us/img-4.webp',     'w' => 1000, 'h' => 551],
    ];

    // Monthly batches from the 1st to the 20th
    $batches = [
        ['start' => '01 Nov', 'end' => '20 Nov', 'year' => '2026'],
        ['start' => '01 Dec', 'end' => '20 Dec', 'year' => '2026'],
        ['start' => '01 Jan', 'end' => '20 Jan', 'year' => '2027'],
        ['start' => '01 Feb', 'end' => '20 Feb', 'year' => '2027'],
        ['start' => '01 Mar', 'end' => '20 Mar', 'year' => '2027'],
        ['start' => '01 Apr', 'end' => '20 Apr', 'year' => '2027'],
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
        ['q' => 'How long is the course and when does it start?', 'a' => 'The training runs for 20 days and 200 hours. A new batch starts on the 1st of every month and ends on the 20th.'],
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
        'description' => 'A 20-day residential 200-hour yoga teacher training in Ubud, Bali, open to beginners. Graduates are eligible to apply for RYT 200 with Yoga Alliance.',
        'provider'    => ['@type' => 'Organization', 'name' => $site_name, 'sameAs' => $link],
        'offers'      => ['@type' => 'Offer', 'category' => 'Paid', 'price' => '1299', 'priceCurrency' => 'USD'],
    ];
    $faq_schema = [
        '@context'   => 'https://schema.org',
        '@type'      => 'FAQPage',
        'mainEntity' => array_map(fn ($f) => ['@type' => 'Question', 'name' => $f['q'], 'acceptedAnswer' => ['@type' => 'Answer', 'text' => $f['a']]], $course_faqs),
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
            <img src="<?=$link?>assets/images/about-us/banner-img.webp" alt="Yoga teacher training students standing arm in arm in the Ubud shala" width="1920" height="1280" fetchpriority="high">

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

        <div class="container">
            <!-- Quick facts — one strip under the photo -->
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
                <p class="para">This 200-hour course is a full, residential foundation in yoga. You live on campus in Ubud for 20 days and follow a set daily schedule, from morning sadhana to evening Hatha practice.</p>
                <p class="para">The main styles are Hatha, Ashtanga and Vinyasa, with elements of Yin, Restorative yoga and Yoga Nidra. Alongside asana you study pranayama, meditation, philosophy, anatomy and teaching methodology, and you practise teaching every day.</p>
                <ul class="course-overview__points">
                    <li><?= icon('check') ?> Open to beginners, age 18+</li>
                    <li><?= icon('check') ?> Monthly batches, 1st to 20th</li>
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
            <div class="pillars" data-reveal>
                <?php $n = 0; foreach ($curriculum as $group): ?>
                <article class="pillar-col">
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

    <!-- Daily schedule (v4, "watch") — one round watch in the centre; the 14 schedule entries are written around the dial like hour
         markers. The active entry glows and the gold hand points to it; the centre shows it in full (section-bg). JS: [data-clock] -->
    <?php
    $slots = count($schedule);
    // point on a circle around the watch centre (300, 300); 0° = top, clockwise
    $pt = fn(float $deg, float $r) => [round(300 + $r * sin(deg2rad($deg)), 2), round(300 - $r * cos(deg2rad($deg)), 2)];
    ?>
    <section class="schedule section-bg spacing">
        <div class="container">
            <div class="course-head" data-reveal>
                <span class="sub-heading">A Day at the Shala</span>
                <h2 class="section-heading">Daily schedule</h2>
                <p class="para">Days start early and follow a steady rhythm of practice, study and rest. Timings may change slightly with the season and weather.</p>
            </div>

            <!-- Stage (≥1200px): tilted photo collage left · watch · tilted photo collage right (photos lean in towards the watch) -->
            <?php
            $collage = [
                'left'  => [
                    ['assets/images/overview-img-2.webp', 600, 1066], ['assets/images/200-hour-ttc.webp', 600, 1066],
                    ['assets/images/yoga-retreat-img.webp', 600, 1066], ['assets/images/why-dining.webp', 600, 1066],
                ],
                'right' => [
                    ['assets/images/overview-img-1.webp', 600, 800], ['assets/images/about-us/img-1.webp', 600, 900],
                    ['assets/images/testimonials-img.webp', 800, 1422], ['assets/images/300-hour-ttc.webp', 800, 450],
                ],
            ];
            ?>
            <div class="schedule__stage">
                <div class="schedule__collage schedule__collage--left" aria-hidden="true">
                    <?php foreach ($collage['left'] as [$src, $w, $h]): ?>
                    <img src="<?=$link?><?= $src ?>" alt="" width="<?= $w ?>" height="<?= $h ?>" loading="lazy">
                    <?php endforeach; ?>
                </div>

            <div class="watch" data-clock data-reveal>
                <svg class="watch__svg" viewBox="0 0 600 600" role="group" aria-label="Daily schedule">
                    <!-- crown + bezel + face -->
                    <rect class="watch__crown" x="588" y="284" width="16" height="32" rx="4"/>
                    <circle class="watch__bezel" cx="300" cy="300" r="292"/>
                    <circle class="watch__face" cx="300" cy="300" r="266"/>
                    <circle class="watch__ring" cx="300" cy="300" r="150"/>

                    <!-- minute-style ticks: 5 per schedule entry, the entry's own tick is long and gold -->
                    <?php for ($t = 0; $t < $slots * 5; $t++): $deg = $t * 360 / ($slots * 5); $major = $t % 5 === 0;
                        [$x1, $y1] = $pt($deg, $major ? 240 : 248); [$x2, $y2] = $pt($deg, 256); ?>
                    <line class="watch__tick<?= $major ? ' watch__tick--major' : '' ?>" x1="<?= $x1 ?>" y1="<?= $y1 ?>" x2="<?= $x2 ?>" y2="<?= $y2 ?>"/>
                    <?php endfor; ?>

                    <!-- the schedule, written around the dial -->
                    <?php foreach ($schedule as $i => $slot): $deg = $i * 360 / $slots; [$lx, $ly] = $pt($deg, 200); [$dx, $dy] = $pt($deg, 256); ?>
                    <g class="watch__entry<?= !empty($slot['meal']) ? ' watch__entry--meal' : '' ?>" tabindex="0" role="button"
                       data-i="<?= $i ?>" data-deg="<?= round($deg, 3) ?>" data-time="<?= $e($slot['time']) ?>" data-end="<?= $e($slot['end']) ?>" data-session="<?= $e($slot['session']) ?>"
                       aria-label="<?= $e($slot['time'] . ' ' . $slot['session']) ?>">
                        <circle class="watch__glow" cx="<?= $dx ?>" cy="<?= $dy ?>" r="7"/>
                        <circle class="watch__hit" cx="<?= $lx ?>" cy="<?= $ly ?>" r="34"/>
                        <text class="watch__label" x="<?= $lx ?>" y="<?= $ly ?>">
                            <tspan class="watch__time" x="<?= $lx ?>" dy="-4"><?= $e($slot['time']) ?></tspan>
                            <tspan class="watch__name" x="<?= $lx ?>" dy="17"><?= $e($slot['short']) ?></tspan>
                        </text>
                        <g class="watch__icon-src"><?= icon($slot['icon']) ?></g>
                    </g>
                    <?php endforeach; ?>

                    <!-- hand: short gold pointer between the inner ring and the labels (rotated by JS) -->
                    <g class="watch__hand">
                        <line x1="300" y1="152" x2="300" y2="138"/>
                        <circle cx="300" cy="135" r="4"/>
                    </g>
                </svg>

                <!-- centre readout -->
                <div class="watch__center" aria-live="polite">
                    <span class="watch__c-icon" aria-hidden="true"></span>
                    <span class="watch__c-time"></span>
                    <span class="watch__c-until"></span>
                    <span class="watch__c-session"></span>
                </div>
            </div>

                <div class="schedule__collage schedule__collage--right" aria-hidden="true">
                    <?php foreach ($collage['right'] as [$src, $w, $h]): ?>
                    <img src="<?=$link?><?= $src ?>" alt="" width="<?= $w ?>" height="<?= $h ?>" loading="lazy">
                    <?php endforeach; ?>
                </div>
            </div>

            <ul class="schedule__notes" data-reveal>
                <li><strong>Thursday</strong> Silence day</li>
                <li><strong>Sunday</strong> Free day with excursions</li>
                <li><strong>After 20:00</strong> Silence on campus</li>
            </ul>
        </div>
    </section>

    <!-- Fees + dates (white) -->
    <section class="fees spacing" id="fees">
        <div class="container">
            <div class="course-head" data-reveal>
                <span class="sub-heading">Dates &amp; Fees</span>
                <h2 class="section-heading">Choose your room and your month</h2>
                <p class="para">All fees are in US dollars and include your room, three meals a day and course materials.</p>
            </div>
        </div>

        <!-- Split (v4.1, user): left = 4 room cards (aligned to the container) · right = room photo panel, exactly as tall
             as the cards, running to the screen edge; batches full width below. Hover / focus a card or click a tab → that room's photo (script.js [data-room-view]). -->
        <div class="fees__split">
            <div class="fees__main">
            <ul class="fees__grid" data-reveal>
                <?php foreach ($fees as $i => $fee): ?>
                <li class="fee<?= $i === 0 ? ' is-active' : '' ?>" data-room-card>
                    <span class="fee__room-plan" role="img" aria-label="Room plan: <?= (int) $fee['beds'] ?> <?= $fee['beds'] === 1 ? 'bed' : 'beds' ?>">
                        <?= $room_svg((int) $fee['beds']) ?>
                    </span>
                    <h3 class="fee__room"><?= $e($fee['room']) ?></h3>
                    <span class="fee__note"><?= $e($fee['note']) ?></span>
                    <strong class="fee__price"><small>USD</small><?= $e($fee['price']) ?></strong>
                    <span class="fee__per">20 days · room &amp; meals</span>
                    <a href="<?= $e($book_url) ?>" class="theme-btn theme-btn--outline theme-btn--block fee__btn" aria-label="Book the <?= $e($fee['room']) ?> room">Book Now <?= $arrow ?></a>
                </li>
                <?php endforeach; ?>
            </ul>
            </div>

            <aside class="room-view" data-room-view data-reveal aria-label="Room photos">
                <div class="room-view__frame">
                    <?php foreach ($fees as $i => $fee): ?>
                    <figure class="room-view__photo<?= $i === 0 ? ' is-active' : '' ?>" data-room-photo>
                        <img src="<?=$link?><?= $e($fee['img']) ?>" alt="<?= $e($fee['room']) ?> room at the Ubud campus" width="<?= $fee['w'] ?>" height="<?= $fee['h'] ?>" loading="lazy">
                        <figcaption class="room-view__caption">
                            <span class="room-view__count"><?= sprintf('%02d', $i + 1) ?> / <?= sprintf('%02d', count($fees)) ?></span>
                            <strong class="room-view__name"><?= $e($fee['room']) ?></strong>
                            <span class="room-view__meta"><?= $e($fee['note']) ?> · from USD <?= $e($fee['price']) ?></span>
                        </figcaption>
                    </figure>
                    <?php endforeach; ?>
                </div>
                <div class="room-view__tabs" role="group" aria-label="Choose a room">
                    <?php foreach ($fees as $i => $fee): ?>
                    <button type="button" class="room-view__tab<?= $i === 0 ? ' is-active' : '' ?>" data-room-tab aria-pressed="<?= $i === 0 ? 'true' : 'false' ?>"><?= $e($fee['room']) ?></button>
                    <?php endforeach; ?>
                </div>
            </aside>
        </div>

        <div class="container">
            <div class="batches" data-reveal>
                <h3 class="batches__title">Upcoming batches</h3>
                <ul class="batches__list">
                    <?php foreach ($batches as $batch): ?>
                    <li class="batch">
                        <span class="batch__dates"><?= $e($batch['start']) ?> <em>—</em> <?= $e($batch['end']) ?></span>
                        <span class="batch__year"><?= $e($batch['year']) ?></span>
                        <a href="<?= $e($book_url) ?>" class="theme-btn theme-btn--outline theme-btn--sm" aria-label="Book the <?= $e($batch['start'] . ' ' . $batch['year']) ?> batch">Book <?= $arrow ?></a>
                    </li>
                    <?php endforeach; ?>
                </ul>
                <p class="batches__note">A new batch starts on the 1st of every month. Ask us about later dates.</p>
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
                <p class="para">Everything you need for 20 days on campus is in one fee. A few travel costs are yours to plan.</p>
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
                            <div><dt>Duration</dt><dd>20 days</dd></div>
                            <div><dt>From</dt><dd>USD 1,299</dd></div>
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

    <!-- Good to know — eligibility · certification · getting here (section-bg) -->
    <section class="good-to-know section-bg spacing">
        <div class="container">
            <div class="course-head" data-reveal>
                <span class="sub-heading">Good to Know</span>
                <h2 class="section-heading">Before you book</h2>
            </div>

            <div class="good-to-know__grid" data-reveal>
                <article class="know">
                    <span class="know__icon" aria-hidden="true"><?= icon('sprout') ?></span>
                    <h3 class="know__title">Who can join</h3>
                    <ul>
                        <li>Age 18 and above</li>
                        <li>No previous yoga experience needed</li>
                        <li>Attendance at all classes is required</li>
                        <li>Vegetarian food only; no smoking or alcohol on campus</li>
                    </ul>
                </article>
                <article class="know">
                    <span class="know__icon" aria-hidden="true"><?= icon('badge') ?></span>
                    <h3 class="know__title">Certification</h3>
                    <ul>
                        <li>Practical asana test</li>
                        <li>Assessment of attendance and conduct</li>
                        <li>VYA 200-hour completion certificate</li>
                        <li>Eligible to apply for RYT 200 with Yoga Alliance</li>
                    </ul>
                </article>
                <article class="know">
                    <span class="know__icon" aria-hidden="true"><?= icon('plane') ?></span>
                    <h3 class="know__title">Getting here</h3>
                    <ul>
                        <li>Fly into Ngurah Rai Airport (DPS), Denpasar</li>
                        <li>About 1.5 hours by road to Ubud</li>
                        <li>Airport pickup at extra cost</li>
                        <li>Driest months: April to October</li>
                    </ul>
                </article>
            </div>
        </div>
    </section>

    <!-- FAQ — same component as the home page (white) -->
    <section class="faq spacing" id="faq" data-faq>
        <div class="container faq__board" data-reveal>

            <div class="faq__intro">
                <span class="sub-heading">FAQs</span>
                <h2 class="section-heading">Questions about this course</h2>
                <p class="para">Short answers to what students ask before joining the 200-hour training in Bali.</p>
            </div>

            <div class="faq__panel" aria-hidden="true">
                <figure class="arch-img faq__photo"><img src="<?=$link?>assets/images/overview-img-1.webp" alt="" width="600" height="800" loading="lazy"></figure>
            </div>

            <?php foreach ($course_faqs as $i => $faq): $num = sprintf('%02d', $i + 1); ?>
            <div class="faq-item<?= $i === 0 ? ' is-active' : '' ?>">
                <h3 class="faq-item__head">
                    <button type="button" class="faq-item__q" id="faq-q-<?= $i ?>" aria-expanded="<?= $i === 0 ? 'true' : 'false' ?>" aria-controls="faq-a-<?= $i ?>" data-faq-q>
                        <span class="faq-item__num"><?= $num ?></span>
                        <span class="faq-item__text"><?= $e($faq['q']) ?></span>
                        <svg class="faq-item__arrow" viewBox="0 0 22 10" fill="none" stroke="currentColor" stroke-width="1" aria-hidden="true"><path d="M0 5h21M17 1l4 4-4 4"/></svg>
                    </button>
                </h3>
                <div class="faq-item__a" id="faq-a-<?= $i ?>" role="region" aria-labelledby="faq-q-<?= $i ?>">
                    <div class="faq-item__inner">
                        <span class="faq-item__count" aria-hidden="true"><?= $num ?> <em>/ <?= sprintf('%02d', count($course_faqs)) ?></em></span>
                        <p class="faq-item__title" aria-hidden="true"><?= $e($faq['q']) ?></p>
                        <p class="faq-item__answer"><?= $e($faq['a']) ?></p>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>

            <div class="faq__help">
                <span class="faq__help-icon" aria-hidden="true">
                    <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.3" stroke-linecap="round"><circle cx="12" cy="12" r="9"/><path d="M9.6 9.4a2.5 2.5 0 1 1 3.4 2.3c-.6.3-1 .8-1 1.5v.6"/><circle cx="12" cy="16.8" r=".6" fill="currentColor" stroke="none"/></svg>
                </span>
                <div>
                    <p class="faq__help-title">Still have a question?</p>
                    <a href="<?= $e($book_url) ?>" class="link-line">Ask us directly <?= $arrow ?></a>
                </div>
            </div>
        </div>

        <script type="application/ld+json"><?= json_encode($faq_schema, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE) ?></script>
    </section>

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
