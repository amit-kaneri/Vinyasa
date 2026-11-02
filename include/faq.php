<?php
/* ---- FAQ section (shared: home, course page, retreat page) ----
   Full-height photo flush with the left screen edge (45%, sticky, square corners) · accordion right (native <details>,
   one answer open at a time, works without JS) + FAQPage JSON-LD. Styles: .course-faq / .faq-acc in style.scss.

   Set before including:
     $faq_list    array of ['q' => ..., 'a' => ...]
     $faq_title   h2 text
     $faq_text    intro paragraph
     $faq_img     ['src' => path under assets/images/, 'w' => .., 'h' => .., 'alt' => ..]
     $faq_bg      optional extra section class, e.g. 'section-bg' (default: white) */

$faq_schema = [
    '@context'   => 'https://schema.org',
    '@type'      => 'FAQPage',
    'mainEntity' => array_map(fn ($f) => ['@type' => 'Question', 'name' => $f['q'], 'acceptedAnswer' => ['@type' => 'Answer', 'text' => $f['a']]], $faq_list),
];
$faq_esc = fn ($v) => htmlspecialchars((string) $v, ENT_QUOTES, 'UTF-8');
?>
    <section class="course-faq spacing<?= !empty($faq_bg) ? ' ' . $faq_esc($faq_bg) : '' ?>" id="faq">
        <div class="course-faq__grid">
            <figure class="course-faq__media" data-reveal>
                <img src="<?=$link?>assets/images/<?= $faq_esc($faq_img['src']) ?>" alt="<?= $faq_esc($faq_img['alt']) ?>" width="<?= (int) $faq_img['w'] ?>" height="<?= (int) $faq_img['h'] ?>" loading="lazy">
            </figure>

            <div class="course-faq__content" data-reveal>
                <span class="sub-heading">FAQs</span>
                <h2 class="section-heading"><?= $faq_esc($faq_title) ?></h2>
                <p class="para"><?= $faq_esc($faq_text) ?></p>

                <div class="course-faq__list">
                    <?php foreach ($faq_list as $i => $faq): ?>
                    <details class="faq-acc" name="faq"<?= $i === 0 ? ' open' : '' ?>>
                        <summary class="faq-acc__q">
                            <span class="faq-acc__num"><?= sprintf('%02d', $i + 1) ?></span>
                            <span class="faq-acc__text"><?= $faq_esc($faq['q']) ?></span>
                            <span class="faq-acc__toggle" aria-hidden="true"></span>
                        </summary>
                        <div class="faq-acc__a">
                            <p><?= $faq_esc($faq['a']) ?></p>
                        </div>
                    </details>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>

        <script type="application/ld+json"><?= json_encode($faq_schema, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE) ?></script>
    </section>
