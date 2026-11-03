<?php
/* Contact — shared section (home page + contact page). Form card overlapping a toned Google Map · location card · contact strip below.
   Bali campus details as published on the live site (Aug 2026). Needs from the page: $arrow, $social, $social_icons.
   Optional before including: $contact_bg ('section-bg' or ''), $contact_sub, $contact_title, $contact_text.
   TODO: the form has no backend yet (action="#") — connect to a mail handler. */
$contact_bg    = $contact_bg ?? 'section-bg';
$contact_sub   = $contact_sub ?? 'Get in Touch';
$contact_title = $contact_title ?? 'Begin with a conversation';
$contact_text  = $contact_text ?? 'Tell us a little about yourself and the course you are interested in. We reply to every message personally.';

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
<section class="contact spacing<?= $contact_bg ? ' ' . $e($contact_bg) : '' ?>" id="contact">
    <div class="container">
        <div class="contact__wrap">

            <!-- Form card -->
            <div class="contact__card" data-reveal>
                <span class="sub-heading"><?= $e($contact_sub) ?></span>
                <h2 class="section-heading"><?= $e($contact_title) ?></h2>
                <p class="para"><?= $e($contact_text) ?></p>

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
