<?php
/* ---- Footer ----
   Contact details = Bali campus, as published on the live site (Aug 2026).
   TODO: real page links (about, courses, contact, legal pages). */
$footer_courses = [
    ['label' => '200 Hour Yoga Teacher Training', 'url' => $link . '200-hour-yoga-teacher-training-in-bali.php'],
    ['label' => '300 Hour Yoga Teacher Training', 'url' => '#'],
    ['label' => 'Yoga Retreat in Bali',           'url' => $link . 'yoga-retreat-in-bali.php'],
];
$footer_links = [
    ['label' => 'About Us',  'url' => $link . 'about-us.php'],
    ['label' => 'Our Teachers', 'url' => '#'],
    ['label' => 'Reviews',   'url' => '#'],
    ['label' => 'FAQ',       'url' => '#'],
    ['label' => 'Contact',   'url' => '#'],
];
$footer_legal = [
    ['label' => 'Privacy Policy',        'url' => '#'],
    ['label' => 'Terms & Conditions',    'url' => '#'],
    ['label' => 'Refund Policy',         'url' => '#'],
];
// Thin-line lotus (top divider)
$footer_lotus = '<svg viewBox="0 0 64 40" fill="none" stroke="currentColor" stroke-width="1" stroke-linejoin="round" aria-hidden="true">'
              . '<path d="M32 4c-5 6-5 20 0 28 5-8 5-22 0-28z"/>'
              . '<path d="M32 32c-9-2-15-9-16-17 7 1 13 6 16 17z"/><path d="M32 32c9-2 15-9 16-17-7 1-13 6-16 17z"/>'
              . '<path d="M32 32C22 32 12 28 6 21c8-1 18 2 26 11z"/><path d="M32 32c10 0 20-4 26-11-8-1-18 2-26 11z"/>'
              . '<path d="M14 36.5c11 3 25 3 36 0"/><circle cx="32" cy="20" r="1.6" fill="currentColor" stroke="none"/></svg>';
?>
<footer class="site-footer">

    <!-- Top edge: hairline · lotus · hairline -->
    <div class="container site-footer__divider" aria-hidden="true">
        <span></span><?= $footer_lotus ?><span></span>
    </div>

    <div class="container site-footer__grid">

        <!-- Brand -->
        <div class="site-footer__brand">
            <a href="<?=$link?>" class="site-footer__logo" aria-label="<?php echo $e($site_name); ?> — Home">
                <img src="<?=$link?>assets/images/logo.webp" alt="<?php echo $e($site_name); ?>" width="400" height="117" loading="lazy">
            </a>
            <p>A Yoga Alliance registered school (RYS 200, RYS 300, RYS 500), founded in Rishikesh in 2010 and teaching in Ubud, Bali.</p>
            <?php echo social_links('social-links--footer'); ?>
        </div>

        <!-- Courses -->
        <nav class="site-footer__col" aria-label="Courses">
            <h3 class="site-footer__title">Courses</h3>
            <ul>
                <?php foreach ($footer_courses as $item): ?>
                <li><a href="<?= $e($item['url']) ?>"><?= $e($item['label']) ?></a></li>
                <?php endforeach; ?>
            </ul>
        </nav>

        <!-- Quick links -->
        <nav class="site-footer__col" aria-label="Quick links">
            <h3 class="site-footer__title">Explore</h3>
            <ul>
                <?php foreach ($footer_links as $item): ?>
                <li><a href="<?= $e($item['url']) ?>"><?= $e($item['label']) ?></a></li>
                <?php endforeach; ?>
            </ul>
        </nav>

        <!-- Contact -->
        <div class="site-footer__col site-footer__contact">
            <h3 class="site-footer__title">Visit Us</h3>
            <ul>
                <li>
                    <span class="site-footer__icon" aria-hidden="true"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.3"><path d="M12 21s-7-6.2-7-11.5a7 7 0 0 1 14 0C19 14.8 12 21 12 21z"/><circle cx="12" cy="9.5" r="2.5"/></svg></span>
                    <a href="https://maps.google.com/?q=Jl.+Raya+Andong,+Ubud,+Gianyar,+Bali+80571" target="_blank" rel="noopener">Jl. Raya Andong, Ubud, Kabupaten Gianyar, Bali 80571, Indonesia</a>
                </li>
                <li>
                    <span class="site-footer__icon" aria-hidden="true"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.3" stroke-linejoin="round"><path d="M5 4h4l2 5-2.5 1.5a11 11 0 0 0 5 5L15 13l5 2v4a1 1 0 0 1-1 1A16 16 0 0 1 4 5a1 1 0 0 1 1-1z"/></svg></span>
                    <a href="tel:+628132881810">+62 813 2881 810</a>
                </li>
                <li>
                    <span class="site-footer__icon" aria-hidden="true"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.3"><rect x="3" y="5" width="18" height="14" rx="1.5"/><path d="m3.5 6 8.5 7 8.5-7"/></svg></span>
                    <a href="mailto:contact@vinyasayogaacademy.com">contact@vinyasayogaacademy.com</a>
                </li>
            </ul>
        </div>
    </div>

    <!-- Bottom bar -->
    <div class="container site-footer__bottom">
        <p>&copy; <?= date('Y') ?> <?php echo $e($site_name); ?>. All rights reserved.</p>
        <ul class="site-footer__legal">
            <?php foreach ($footer_legal as $item): ?>
            <li><a href="<?= $e($item['url']) ?>"><?= $e($item['label']) ?></a></li>
            <?php endforeach; ?>
        </ul>
    </div>
</footer>

<!-- Floating back-to-top: fixed bottom-right, gold ring = scroll progress -->
<button type="button" class="back-to-top" data-back-to-top aria-label="Back to top">
    <svg class="back-to-top__ring" viewBox="0 0 56 56" aria-hidden="true">
        <circle cx="28" cy="28" r="26"/>
        <circle cx="28" cy="28" r="26" pathLength="100" data-back-to-top-progress/>
    </svg>
    <svg class="back-to-top__arrow" viewBox="0 0 12 18" fill="none" stroke="currentColor" stroke-width="1.2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true"><path d="M6 17V1M1 6l5-5 5 5"/></svg>
</button>
