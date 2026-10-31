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
       Facts from the live page (vinyasayogaacademy.com/yoga-retreat-in-bali.php, read 31 Oct 2026).
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

    $five_day = ['4 nights in a private room', 'Three vegetarian meals a day', 'Daily yoga, meditation, philosophy and workshops', 'Three guided excursions', 'One Balinese wellness treatment'];

    $rhythm = [
        ['icon' => 'sun',   'part' => 'Morning', 'text' => 'Asana practice, pranayama and meditation in the cool of the morning.'],
        ['icon' => 'leaf',  'part' => 'Day',     'text' => 'Philosophy talks and workshops, guided trips around Ubud, and time to rest.'],
        ['icon' => 'moon',  'part' => 'Evening', 'text' => 'An evening asana class, shared dinner and the occasional kirtan.'],
    ];

    $excursions = [
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

    $steps = [
        ['title' => 'Choose your length', 'text' => '3, 5, 7, 14 or 21 days — or ask for a custom stay.'],
        ['title' => 'Pick a start date',  'text' => 'Retreats start on the 1st of every month.'],
        ['title' => 'Send the form',      'text' => 'Tell us your dates, room and any dietary needs.'],
        ['title' => 'Pay the deposit',    'text' => 'This holds your place on the retreat.'],
        ['title' => 'Get your guide',     'text' => 'Your itinerary and pre-retreat guide arrive within 48 hours.'],
        ['title' => 'Arrive in Ubud',     'text' => 'Check in from 11:00, welcome ceremony at 15:30.'],
    ];

    $retreat_faqs = [
        ['q' => 'Do I need yoga experience?',           'a' => 'No. The retreat is open to beginners and experienced practitioners. On the first day the teachers get to know your level.'],
        ['q' => 'Which length should I choose first?',  'a' => 'For a first retreat we recommend the 5-day programme. If you can stay longer, 7 days gives time for real change.'],
        ['q' => 'When do retreats start?',              'a' => 'Every month, on the 1st. Custom lengths, such as 4 or 10 days, are possible on request.'],
        ['q' => 'When is the best time to come?',       'a' => 'Retreats run all year. April to October is the driest season; November to March is wetter, quieter and cheaper.'],
        ['q' => 'Can I come on my own?',                'a' => 'Yes. Most guests travel solo.'],
        ['q' => 'Can you cater for my diet?',           'a' => 'All meals are sattvic vegetarian. Vegan, gluten-free and allergy needs can be met if you tell us when you book.'],
        ['q' => 'How do I get from the airport?',       'a' => 'Fly into Ngurah Rai International Airport (DPS). Ubud is about 1.5 hours by car. We can arrange a paid pickup, or you can use Grab, Gojek or a prepaid taxi.'],
        ['q' => 'What if my plans change?',             'a' => 'The deposit is non-refundable, but it can be used for a retreat in another month. Fees are not refunded once the retreat has started. Please read the full policy before you book.'],
    ];

    $faq_schema = [
        '@context'   => 'https://schema.org',
        '@type'      => 'FAQPage',
        'mainEntity' => array_map(fn ($f) => ['@type' => 'Question', 'name' => $f['q'], 'acceptedAnswer' => ['@type' => 'Answer', 'text' => $f['a']]], $retreat_faqs),
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

    <!-- Explore Bali — photo postcards: photo + stamp + round postmark, handwritten title below (white). TODO: real temple / rice field / beach photos -->
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
                        <span class="postcard__stamp" aria-hidden="true"><span class="postcard__stamp-inner"><?= icon($x['icon']) ?><small><?= $e($x['stamp']) ?></small></span></span>
                        <span class="postcard__mark" aria-hidden="true"><span>Ubud</span><span>Bali</span></span>
                    </figure>
                    <div class="postcard__body">
                        <h3 class="postcard__title"><?= $e($x['title']) ?></h3>
                        <p class="postcard__text"><?= $e($x['text']) ?></p>
                    </div>
                </li>
                <?php endforeach; ?>
            </ul>
        </div>
    </section>

    <!-- What's included — travel tickets (reuses .ticket) (section-bg) -->
    <section class="inclusions section-bg spacing">
        <div class="container">
            <div class="course-head" data-reveal>
                <span class="sub-heading">Your Stay</span>
                <h2 class="section-heading">What is included</h2>
            </div>

            <div class="inclusions__grid">
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
                    <div class="ticket__tear" aria-hidden="true"></div>
                    <footer class="ticket__stub">
                        <p class="ticket__note">Need help with travel? <a href="<?= $e($book_url) ?>" class="link-line">Ask us <?= $arrow ?></a></p>
                    </footer>
                </article>
            </div>
        </div>
    </section>

    <!-- Stay & food (white) -->
    <section class="stay spacing">
        <div class="container stay__grid">
            <figure class="arch-img stay__img" data-reveal>
                <img src="<?=$link?>assets/images/why-dining.webp" alt="Shared vegetarian meal in the dining pavilion" width="600" height="1066" loading="lazy">
            </figure>

            <div class="stay__content" data-reveal>
                <span class="sub-heading">Rooms &amp; Food</span>
                <h2 class="section-heading">Simple, quiet and well looked after</h2>
                <p class="para">Rooms are clean and calm, with soft bedding and fresh towels. Meals are freshly cooked and shared together.</p>

                <div class="stay__cards">
                    <div class="stay-card">
                        <span class="stay-card__icon" aria-hidden="true"><?= icon('bed') ?></span>
                        <h3>Private room</h3>
                        <p>Your own room with an attached bathroom and hot water.</p>
                    </div>
                    <div class="stay-card">
                        <span class="stay-card__icon" aria-hidden="true"><?= icon('users') ?></span>
                        <h3>Shared room</h3>
                        <p>A room for two people, with twin beds.</p>
                    </div>
                    <div class="stay-card">
                        <span class="stay-card__icon" aria-hidden="true"><?= icon('bowl') ?></span>
                        <h3>Sattvic meals</h3>
                        <p>Three vegetarian meals a day. Vegan, gluten-free and allergy needs on request. On Sundays, lunch and dinner are at local cafés.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Packing list — luggage tag (section-bg) -->
    <section class="packing section-bg spacing">
        <div class="container packing__grid">
            <div class="packing__intro" data-reveal>
                <span class="sub-heading">Pack Light</span>
                <h2 class="section-heading">What to bring</h2>
                <p class="para">Bali is warm all year. Bring light clothes, something for the early mornings and a sarong for the temples.</p>
            </div>

            <div class="luggage-tag" data-reveal>
                <span class="luggage-tag__hole" aria-hidden="true"></span>
                <span class="luggage-tag__head"><?= icon('suitcase') ?> Packing list</span>
                <ul class="luggage-tag__list">
                    <?php foreach ($packing as $item): ?>
                    <li><span aria-hidden="true"></span><?= $e($item) ?></li>
                    <?php endforeach; ?>
                </ul>
            </div>
        </div>
    </section>

    <!-- How to book — dotted travel route (white) -->
    <section class="route spacing">
        <div class="container">
            <div class="course-head" data-reveal>
                <span class="sub-heading">How to Book</span>
                <h2 class="section-heading">Six easy steps to Ubud</h2>
            </div>

            <ol class="route__steps" data-reveal>
                <?php foreach ($steps as $i => $s): ?>
                <li class="route__step">
                    <span class="route__num"><?= $i + 1 ?></span>
                    <h3 class="route__title"><?= $e($s['title']) ?></h3>
                    <p class="route__text"><?= $e($s['text']) ?></p>
                </li>
                <?php endforeach; ?>
            </ol>
        </div>
    </section>

    <!-- FAQ — same component as the home page (section-bg) -->
    <section class="faq section-bg spacing" id="faq" data-faq>
        <div class="container faq__board" data-reveal>
            <div class="faq__intro">
                <span class="sub-heading">FAQs</span>
                <h2 class="section-heading">Before you pack</h2>
                <p class="para">Quick answers to what guests ask most before a retreat in Bali.</p>
            </div>

            <div class="faq__panel" aria-hidden="true">
                <figure class="arch-img faq__photo"><img src="<?=$link?>assets/images/about-us/img-1.webp" alt="" width="600" height="900" loading="lazy"></figure>
            </div>

            <?php foreach ($retreat_faqs as $i => $faq): $num = sprintf('%02d', $i + 1); ?>
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
                        <span class="faq-item__count" aria-hidden="true"><?= $num ?> <em>/ <?= sprintf('%02d', count($retreat_faqs)) ?></em></span>
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

    <!-- Closing CTA (white) — reuses .about-cta -->
    <section class="about-cta spacing">
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
