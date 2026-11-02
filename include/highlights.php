<?php
/* Highlights — shared photo strip (course page + retreat page, user). Endless marquee on a cream-dark band: 4 photos in view (desktop),
   drifts slowly, pauses on hover, can be dragged (no arrow buttons — user); every other photo sits lower (wave). JS: script.js [data-highlights].
   Optional before including: $hl_title, $hl_text (heading + text), $hl_id (section id).
   Photos in assets/images/highlights/ (webp only; img-10 is a copy of img-2, so it is left out). */
$hl_title = $hl_title ?? 'Life around the shala';
$hl_text  = $hl_text ?? 'Between classes there is time to slow down. A look at the campus and its surroundings in Ubud, from the jungle pool to the rice fields nearby.';
$hl_id    = $hl_id ?? 'highlights';

$highlights = [
    ['img' => 'highlight-img-1.webp',   'w' => 800, 'h' => 740, 'label' => 'Jungle pool',        'alt' => 'Curved pool with sun loungers between palm trees, beside the campus building'],
    ['img' => 'highlight-img-3.webp',   'w' => 800, 'h' => 532, 'label' => 'Flower bath',        'alt' => 'Round bathtub filled with flower petals on a balcony at dusk'],
    ['img' => 'highlight-img-5.webp',   'w' => 800, 'h' => 533, 'label' => 'Jungle bridge',      'alt' => 'Two people cycling across a suspension bridge above the jungle'],
    ['img' => 'highlight-img-2.webp',   'w' => 800, 'h' => 533, 'label' => 'Restaurant',         'alt' => 'Restaurant with a wooden bar and set tables under a woven ceiling'],
    ['img' => 'hightlight-img-14.webp', 'w' => 600, 'h' => 800, 'label' => 'Spa corner',         'alt' => 'Spa room with a flower offering, wooden chairs and a stone bathtub'],
    ['img' => 'hightlight-img-8.webp',  'w' => 800, 'h' => 533, 'label' => 'Floating breakfast', 'alt' => 'Floating tray with breakfast and flowers in a pool at night'],
    ['img' => 'hightlight-img-13.webp', 'w' => 800, 'h' => 533, 'label' => 'Rice fields',        'alt' => 'Two people cycling along a path beside green rice fields'],
    ['img' => 'hightlight-img-7.webp',  'w' => 800, 'h' => 535, 'label' => 'Poolside dinner',    'alt' => 'Table set for dinner beside a lit pool under a curved wooden roof'],
    ['img' => 'hightlight-img-15.webp', 'w' => 600, 'h' => 800, 'label' => 'Spa suite',          'alt' => 'Spa suite with two treatment beds, a bathtub and a view of the trees'],
    ['img' => 'hightlight-img-9.webp',  'w' => 800, 'h' => 533, 'label' => 'Live kitchen',       'alt' => 'Chef cooking over a tall flame at an open kitchen counter'],
    ['img' => 'hightlight-img-12.webp', 'w' => 800, 'h' => 533, 'label' => 'Lounge',             'alt' => 'Lounge with a carved stone Ganesha relief and views of the jungle'],
    ['img' => 'hightlight-img-18.webp', 'w' => 800, 'h' => 533, 'label' => 'Afternoon tea',      'alt' => 'Host in traditional Balinese dress pouring tea beside a tiered cake stand'],
    ['img' => 'hightlight-img-6.webp',  'w' => 600, 'h' => 800, 'label' => 'Treatment room',     'alt' => 'Treatment room with two massage beds and folded towels'],
    ['img' => 'highlight-img-4.webp',   'w' => 800, 'h' => 533, 'label' => 'Buffet',             'alt' => 'Buffet counter with copper lamps and carved wall art'],
    ['img' => 'hightlight-img-16.webp', 'w' => 600, 'h' => 800, 'label' => 'Juice bar',          'alt' => 'Bartender preparing drinks at a lit bar counter'],
    ['img' => 'hightlight-img-11.webp', 'w' => 800, 'h' => 533, 'label' => 'Breakfast',          'alt' => 'Breakfast table with fresh juices and pastries on carved wooden stands'],
    ['img' => 'hightlight-img-17.webp', 'w' => 600, 'h' => 800, 'label' => 'Grand hall',         'alt' => 'Large hall with a lit tiered ceiling and rows of dressed chairs'],
    ['img' => 'hightlight-img-19.webp', 'w' => 600, 'h' => 900, 'label' => 'Stone stairway',     'alt' => 'Guest walking up a stone stairway beneath a carved round emblem'],
];
?>
<section class="highlights spacing" id="<?= $e($hl_id) ?>">
    <div class="container highlights__head" data-reveal>
        <div class="highlights__intro">
            <span class="sub-heading">Highlights</span>
            <h2 class="section-heading"><?= $e($hl_title) ?></h2>
        </div>
        <p class="para"><?= $e($hl_text) ?></p>
    </div>

    <div class="highlights__slider" data-highlights data-reveal>
        <div class="swiper">
            <div class="swiper-wrapper">
                <?php foreach ($highlights as $i => $h): ?>
                <figure class="swiper-slide highlight<?= $i % 2 ? ' highlight--low' : '' ?>">
                    <div class="highlight__frame">
                        <img src="<?=$link?>assets/images/highlights/<?= $e($h['img']) ?>" alt="<?= $e($h['alt']) ?>" width="<?= $h['w'] ?>" height="<?= $h['h'] ?>" loading="lazy">
                    </div>
                    <figcaption class="highlight__caption">
                        <span class="highlight__num"><?= sprintf('%02d', $i + 1) ?></span>
                        <span class="highlight__label"><?= $e($h['label']) ?></span>
                    </figcaption>
                </figure>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</section>
