<!DOCTYPE html>
<html lang="en">
<head>
    <?php include 'include/css.php'; ?>
</head>
<body>

<?php include 'include/header.php'; ?>

<main class="contact-page">

    <?php
    /* Contact page v2 (user: "make it much better", details first, form LAST):
       hero · ways to reach us (panel overlapping the hero: WhatsApp · Call · Email) · find us (map + address card | getting to Ubud) ·
       enquiry (what happens next | form with course chips).
       Contact details = Bali campus as published on the live site (also in the footer + include/contact.php). Travel facts are the ones
       already on the course + retreat pages. TODO: the form has no backend yet (action="#"). */
    $arrow = '<svg viewBox="0 0 22 10" fill="none" stroke="currentColor" stroke-width="1" aria-hidden="true"><path d="M0 5h21M17 1l4 4-4 4"/></svg>';
    $pin   = '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.3"><path d="M12 21s-7-6.2-7-11.5a7 7 0 0 1 14 0C19 14.8 12 21 12 21z"/><circle cx="12" cy="9.5" r="2.5"/></svg>';
    $address = 'Jl. Raya Andong, Ubud, Kabupaten Gianyar, Bali 80571, Indonesia';
    $map_q   = 'Jl.+Raya+Andong,+Ubud,+Gianyar,+Bali+80571';

    // 2 columns (user): WhatsApp + call share one number → one column with two actions · email
    $channels = [
        ['key' => 'whatsapp', 'label' => 'Call or WhatsApp', 'value' => '+62 813 2881 810', 'url' => 'tel:+628132881810', 'tag' => 'Quickest reply',
         'text' => 'The quickest way to reach our team in Ubud: talk to us about dates, rooms and the right course.',
         'icon' => $social_icons['whatsapp'],
         'actions' => [['label' => 'Chat on WhatsApp', 'url' => $social['whatsapp']['url']], ['label' => 'Call now', 'url' => 'tel:+628132881810', 'outline' => true]]],
        ['key' => 'email', 'label' => 'Email', 'value' => 'contact@vinyasayogaacademy.com', 'url' => 'mailto:contact@vinyasayogaacademy.com',
         'text' => 'For longer questions, documents and bookings.',
         'icon' => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.3"><rect x="3" y="5" width="18" height="14" rx="1.5"/><path d="m3.5 6 8.5 7 8.5-7"/></svg>',
         'actions' => [['label' => 'Write to us', 'url' => 'mailto:contact@vinyasayogaacademy.com', 'outline' => true]]],
    ];

    $travel = [
        ['icon' => 'globe',       'title' => 'Fly into Bali',   'text' => 'Land at Ngurah Rai International Airport (DPS). Ubud is about 1.5 hours away; we can arrange a paid pickup, or take Grab, Gojek or a prepaid taxi.'],
        ['icon' => 'certificate', 'title' => 'Visa & season',   'text' => 'Most nationalities get a 30-day visa on arrival, extendable once. April to October is the driest season; November to March is quieter.'],
        ['icon' => 'lotus',       'title' => 'When to arrive',  'text' => 'The 200-hour training runs from the 1st to the 15th, and retreats start on the 1st of every month. Retreat check-in is 11:00–14:00.'],
    ];

    $next_steps = [
        ['title' => 'Send your question', 'text' => 'Tell us your dates, the course or retreat, and any room or diet wishes.'],
        ['title' => 'We reply personally', 'text' => 'Someone from our team in Ubud answers every message.'],
        ['title' => 'Plan your stay',      'text' => 'We help you choose the right month and room, then hold your place.'],
    ];
    $interests = ['200 Hour Teacher Training', '300 Hour Teacher Training', 'Yoga Retreat', 'Not sure yet'];

    $breadcrumb_schema = [
        '@context'        => 'https://schema.org',
        '@type'           => 'BreadcrumbList',
        'itemListElement' => [
            ['@type' => 'ListItem', 'position' => 1, 'name' => 'Home',    'item' => $link],
            ['@type' => 'ListItem', 'position' => 2, 'name' => 'Contact', 'item' => $link . 'contact-us.php'],
        ],
    ];
    ?>

    <!-- Page hero — breadcrumb + h1 on the campus photo (.page-hero--overlay) -->
    <section class="page-hero page-hero--overlay">
        <div class="page-hero__bg">
            <img src="<?=$link?>assets/images/about-us/banner-img.webp" alt="Front of the Vinyasa Yoga Academy campus in Ubud, Bali" width="1920" height="935" fetchpriority="high">

            <div class="container page-hero__overlay">
                <nav class="breadcrumb" aria-label="Breadcrumb">
                    <ol>
                        <li><a href="<?=$link?>">Home</a></li>
                        <li aria-current="page">Contact</li>
                    </ol>
                </nav>
                <h1 class="main-heading">Contact Us</h1>
            </div>
        </div>

        <script type="application/ld+json"><?= json_encode($breadcrumb_schema, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE) ?></script>
    </section>

    <!-- 1 · Ways to reach us (section-bg) — one white panel pulled up over the hero, 2 columns (user): Call or WhatsApp (highlighted) · Email -->
    <section class="reach section-bg">
        <div class="container">
            <ul class="reach__panel" data-reveal>
                <?php foreach ($channels as $c): ?>
                <li class="reach__item reach__item--<?= $e($c['key']) ?>">
                    <span class="reach__top">
                        <span class="reach__icon" aria-hidden="true"><?= $c['icon'] ?></span>
                        <span class="reach__label"><?= $e($c['label']) ?></span>
                        <?php if (!empty($c['tag'])): ?><span class="reach__tag"><?= $e($c['tag']) ?></span><?php endif; ?>
                    </span>
                    <a href="<?= $e($c['url']) ?>" class="reach__value"><?= str_replace('@', '@<wbr>', $e($c['value'])) ?></a>
                    <p class="reach__text"><?= $e($c['text']) ?></p>
                    <span class="reach__actions">
                        <?php foreach ($c['actions'] as $a): ?>
                        <a href="<?= $e($a['url']) ?>" class="theme-btn theme-btn--sm<?= !empty($a['outline']) ? ' theme-btn--outline' : '' ?>"<?= str_starts_with($a['url'], 'http') ? ' target="_blank" rel="noopener"' : '' ?>><?= $e($a['label']) ?></a>
                        <?php endforeach; ?>
                    </span>
                </li>
                <?php endforeach; ?>

                <!-- footer strip inside the panel -->
                <li class="reach__social">
                    <span>Follow our days in Ubud</span>
                    <?php echo social_links('social-links--ring'); ?>
                </li>
            </ul>

        </div>
    </section>

    <!-- 2 · Find us (white) — big toned map with the address card (left) · getting to Ubud (right) -->
    <section class="find-us spacing">
        <div class="container">
            <div class="find-us__head" data-reveal>
                <div>
                    <span class="sub-heading">Visit Us</span>
                    <h2 class="section-heading">Find us in Ubud</h2>
                </div>
                <p class="para">The campus sits between gardens and rice fields in Ubud, the green heart of Bali.</p>
            </div>

            <div class="find-us__grid">
                <div class="find-us__map" data-reveal>
                    <iframe src="https://www.google.com/maps?q=<?= $map_q ?>&amp;output=embed" title="Map: Vinyasa Yoga Academy, Ubud, Bali" loading="lazy" referrerpolicy="no-referrer-when-downgrade" allowfullscreen></iframe>

                    <div class="contact__location">
                        <span class="contact__location-pin" aria-hidden="true"><?= $pin ?></span>
                        <span>
                            <strong>Vinyasa Yoga Academy</strong>
                            <small><?= $e($address) ?></small>
                            <a href="https://maps.google.com/?q=<?= $map_q ?>" class="link-line" target="_blank" rel="noopener">Get directions <?= $arrow ?></a>
                        </span>
                    </div>
                </div>

                <div class="find-us__travel" data-reveal>
                    <span class="accent-text">Getting to Ubud</span>
                    <ol>
                        <?php foreach ($travel as $t): ?>
                        <li>
                            <span class="find-us__icon" aria-hidden="true"><?= feature_icon($t['icon']) ?></span>
                            <span>
                                <h3><?= $e($t['title']) ?></h3>
                                <p><?= $e($t['text']) ?></p>
                            </span>
                        </li>
                        <?php endforeach; ?>
                    </ol>
                </div>
            </div>
        </div>
    </section>

    <!-- 3 · Enquiry — LAST (user) (section-bg): what happens next (left) · form panel with course chips (right) -->
    <section class="enquire section-bg spacing" id="contact">
        <div class="container enquire__grid">
            <div class="enquire__intro" data-reveal>
                <span class="sub-heading">Send an Enquiry</span>
                <h2 class="section-heading">Let’s plan your time in Ubud</h2>
                <p class="para">Prefer to write it all down? Send us the form and we will come back to you with dates, rooms and everything you need to know.</p>

                <ol class="enquire__steps">
                    <?php foreach ($next_steps as $n => $s): ?>
                    <li>
                        <span class="enquire__num"><?= sprintf('%02d', $n + 1) ?></span>
                        <span>
                            <strong><?= $e($s['title']) ?></strong>
                            <small><?= $e($s['text']) ?></small>
                        </span>
                    </li>
                    <?php endforeach; ?>
                </ol>
            </div>

            <div class="enquire__card" data-reveal>
                <!-- TODO: connect to a mail handler (e.g. include/send-enquiry.php) — the form has no backend yet -->
                <form class="contact-form" action="#" method="post">
                    <fieldset class="chips field--full">
                        <legend>I am interested in</legend>
                        <?php foreach ($interests as $n => $opt): ?>
                        <label class="chip">
                            <input type="radio" name="course" value="<?= $e($opt) ?>"<?= $n === 0 ? ' required' : '' ?>>
                            <span><?= $e($opt) ?></span>
                        </label>
                        <?php endforeach; ?>
                    </fieldset>
                    <div class="field">
                        <input type="text" id="ep-name" name="name" placeholder=" " autocomplete="name" required>
                        <label for="ep-name">Full name</label>
                    </div>
                    <div class="field">
                        <input type="email" id="ep-email" name="email" placeholder=" " autocomplete="email" required>
                        <label for="ep-email">Email address</label>
                    </div>
                    <div class="field">
                        <input type="tel" id="ep-phone" name="phone" placeholder=" " autocomplete="tel">
                        <label for="ep-phone">Phone / WhatsApp</label>
                    </div>
                    <div class="field">
                        <input type="text" id="ep-month" name="month" placeholder=" ">
                        <label for="ep-month">Preferred month</label>
                    </div>
                    <div class="field field--full">
                        <textarea id="ep-message" name="message" rows="4" placeholder=" "></textarea>
                        <label for="ep-message">Your message (room wishes, diet, questions…)</label>
                    </div>

                    <button type="submit" class="theme-btn contact-form__submit">Send Enquiry <?= $arrow ?></button>
                </form>
            </div>
        </div>
    </section>

</main>

<?php include 'include/footer.php'; ?>
<?php include 'include/js.php'; ?>

</body>
</html>
