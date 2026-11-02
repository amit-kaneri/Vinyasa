<?php
/* Accommodation — shared section (course page + retreat page, user). Room tabs on top (pill row, scroll arrows when they don't fit) ·
   per room: photo slider left (flag ribbon with the main feature, "Recommended · Best value" badge, count + arrows) · details right
   (name, text, feature boxes with icons, Book Now + WhatsApp). JS: script.js [data-rooms] (one Swiper per room, made on first show).
   Needs from the page: $book_url, $arrow, $social. Optional: $acc_text (intro line).
   Photos load automatically from assets/images/acc/<folder>/ — every .webp in the folder, sorted by file name (other formats are
   ignored). A room without photos shows a "Photos coming soon" panel.
   TODO: replace 'text' with the school's own room descriptions (these lines only restate the room name + features).
   'sash' (optional) = shorter label for the corner ribbon when the first tag is too long to fit.
   'badge' (optional): 'recommended' = best-value room, listed first so it opens by default (user, 2026-11-02: Ashva One Bedroom Suite);
   'premium' = premium room, listed second (Ashva One Bedroom with Terrace Pool). */
$acc_text = $acc_text ?? 'Nine room types at the Ubud campus, from deluxe rooms to family rooms and suites with a private pool.';

// badge kinds — photo badge (prefix hidden on phones), info label, screen-reader note on the tab
$room_badges = [
    'recommended' => ['prefix' => 'Recommended · ', 'label' => 'Best value', 'info' => 'Our recommendation · Best value', 'sr' => 'recommended, best value'],
    'premium'     => ['prefix' => '',               'label' => 'Premium',    'info' => 'Premium choice · Ubud',           'sr' => 'premium'],
];

$rooms = [
    ['folder' => 'ashva-one-badroom-suite',        'name' => 'Ashva One Bedroom Suite',   'tab' => 'Ashva One Bedroom Suite',  'tags' => [],
     'badge' => 'recommended',
     'text' => 'A one-bedroom Ashva suite with its own living room, a bathroom with a freestanding tub and a terrace by the garden.'],
    ['folder' => 'ashva-one-bedroom-with-tarrace-private-pool', 'name' => 'Ashva One Bedroom with Terrace Pool', 'tab' => 'Ashva One Bedroom · Terrace Pool',
     'tags' => ['Private terrace pool'], 'sash' => 'Terrace pool', 'badge' => 'premium',
     'text' => 'A one-bedroom Ashva suite with a living room, a canopy bedroom and a plunge pool on its own terrace beside the garden.'],
    ['folder' => 'nature-heaven-family-room-pool', 'name' => 'Nature Haven Family Room',  'tab' => 'Nature Haven Family Room', 'tags' => ['Private pool', 'Family'],
     'text' => 'A family room with its own private pool, for families or friends who would like to stay together.'],
    ['folder' => 'premier-suite-with-pool',        'name' => 'Premier Suite with Pool',   'tab' => 'Premier Suite · Pool',     'tags' => ['Private pool', 'Nature view'],
     'text' => 'A premier suite with its own plunge pool on a covered terrace beside the garden.'],
    ['folder' => 'village-family-room',            'name' => 'Village Family Room',       'tab' => 'Village Family Room',      'tags' => ['Family'],
     'text' => 'A family room with space for parents and children, or for friends who travel together.'],
    ['folder' => 'deluxe-room',                    'name' => 'Deluxe Room',               'tab' => 'Deluxe Room',              'tags' => [],
     'text' => 'A calm deluxe room, a simple and comfortable base for your stay.'],
    ['folder' => 'deluxe-room-with-nature',        'name' => 'Deluxe Room with Nature View', 'tab' => 'Deluxe Room · Nature View', 'tags' => ['Nature view'],
     'text' => 'A deluxe room with tall glass doors that open onto the garden and the green around the campus.'],
    ['folder' => 'deluxe-room-with-nature-balcony', 'name' => 'Deluxe Room with Nature View & Balcony', 'tab' => 'Deluxe Room · Balcony', 'tags' => ['Balcony', 'Nature view'],
     'text' => 'A deluxe room whose balcony looks out over the rice fields and palm trees around the campus.'],
    ['folder' => 'pavilion-studio',               'name' => 'Pavilion Studio',           'tab' => 'Pavilion Studio',          'tags' => ['Balcony', 'Nature view'],
     'text' => 'A timber-walled studio under a high wooden roof, with a balcony that looks into the tropical garden.'],
];
// feature box icon per tag (include/icons.php) — every room also gets "3 meals a day" (the course fee includes three meals)
$room_feature_icons = [
    'Private pool' => 'wave', 'Private terrace pool' => 'wave', 'Nature view' => 'leaf',
    'Balcony' => 'terrace', 'Family' => 'users', '3 meals a day' => 'bowl',
];
// scandir, not glob — glob() returns nothing on this XAMPP build
$room_photos = function (string $folder): array {
    $dir = dirname(__DIR__) . '/assets/images/acc/' . $folder;
    $files = is_dir($dir) ? array_values(array_filter(scandir($dir), fn ($f) => preg_match('/\.webp$/i', $f))) : [];
    natsort($files);                                                       // img-2 before img-10
    $photos = [];
    foreach ($files as $file) {
        [$w, $h] = getimagesize($dir . '/' . $file) ?: [800, 533];
        $photos[] = ['src' => 'acc/' . $folder . '/' . $file, 'w' => $w, 'h' => $h];
    }
    return $photos;
};
?>
<section class="rooms spacing" id="rooms" data-rooms>
    <div class="container">
        <div class="course-head" data-reveal>
            <span class="sub-heading">Accommodation</span>
            <h2 class="section-heading">Choose your room</h2>
            <p class="para"><?= $e($acc_text) ?></p>
        </div>

        <!-- arrows scroll the pill row; shown only when the pills don't fit (JS adds .is-overflowing) -->
        <div class="rooms__tabbar" data-reveal>
            <button type="button" class="circle-btn rooms__scroll rooms__scroll--prev" aria-label="Scroll room types left" tabindex="-1"><?= $arrow ?></button>
            <div class="rooms__tabs" role="tablist" aria-label="Room types">
                <?php foreach ($rooms as $i => $room): ?>
                <button type="button" class="room-tab<?= $i === 0 ? ' is-active' : '' ?>" role="tab" id="room-tab-<?= $i ?>" aria-controls="room-panel-<?= $i ?>" aria-selected="<?= $i === 0 ? 'true' : 'false' ?>"<?= $i === 0 ? '' : ' tabindex="-1"' ?> data-room-tab><?php $b = $room_badges[$room['badge'] ?? ''] ?? null; if ($b): ?><span class="room-tab__star room-tab__star--<?= $e($room['badge']) ?>" aria-hidden="true"><?= icon('star') ?></span><?php endif; ?><?= $e($room['tab']) ?><?php if ($b): ?><span class="visually-hidden"> (<?= $e($b['sr']) ?>)</span><?php endif; ?></button>
                <?php endforeach; ?>
            </div>
            <button type="button" class="circle-btn rooms__scroll rooms__scroll--next" aria-label="Scroll room types right" tabindex="-1"><?= $arrow ?></button>
        </div>

        <?php foreach ($rooms as $i => $room):
            $photos = $room_photos($room['folder']);
            $url = fn ($src) => $link . 'assets/images/' . implode('/', array_map('rawurlencode', explode('/', $src))); // file names may have spaces
            $features = array_merge($room['tags'], ['3 meals a day']);
        ?>
        <div class="room-panel<?= $i === 0 ? ' is-active' : '' ?>" role="tabpanel" id="room-panel-<?= $i ?>" aria-labelledby="room-tab-<?= $i ?>"<?= $i === 0 ? '' : ' hidden' ?> data-room-panel>
            <div class="room-panel__media">
                <?php if ($photos): ?>
                <div class="swiper room-panel__main">
                    <div class="swiper-wrapper">
                        <?php foreach ($photos as $n => $photo): ?>
                        <figure class="swiper-slide room-panel__photo">
                            <img src="<?= $e($url($photo['src'])) ?>" alt="<?= $e($room['name']) ?><?= $room['tags'] ? ' with ' . $e(strtolower(implode(', ', $room['tags']))) : '' ?>, photo <?= $n + 1 ?>" width="<?= $photo['w'] ?>" height="<?= $photo['h'] ?>" loading="lazy">
                        </figure>
                        <?php endforeach; ?>
                    </div>
                </div>
                <?php else: ?>
                <!-- no photos in assets/images/acc/<?= $e($room['folder']) ?>/ yet -->
                <div class="room-panel__empty">
                    <span class="room-panel__empty-icon" aria-hidden="true"><?= icon('bed') ?></span>
                    <span>Photos coming soon</span>
                </div>
                <?php endif; ?>

                <!-- royal-blue flag ribbon on the right edge (the room's main feature); the gold bookmark ribbon was removed (user) -->
                <?php if ($room['tags']): ?>
                <span class="room-panel__sash" aria-hidden="true"><?= $e($room['sash'] ?? $room['tags'][0]) ?></span>
                <?php endif; ?>

                <!-- badge top-left: gold "Recommended · Best value" or royal-blue "Premium" (room with a 'badge') -->
                <?php $b = $room_badges[$room['badge'] ?? ''] ?? null; if ($b): ?>
                <span class="room-panel__badge room-panel__badge--<?= $e($room['badge']) ?>"><?= icon('star') ?> <?php if ($b['prefix']): ?><span><?= $e($b['prefix']) ?></span><?php endif; ?><?= $e($b['label']) ?></span>
                <?php endif; ?>

                <?php if (count($photos) > 1): ?>
                <div class="room-panel__nav">
                    <span class="room-panel__count"><strong>01</strong> / <?= sprintf('%02d', count($photos)) ?></span>
                    <button type="button" class="circle-btn circle-btn--light room-panel__prev" aria-label="Previous photo"><?= $arrow ?></button>
                    <button type="button" class="circle-btn circle-btn--light room-panel__next" aria-label="Next photo"><?= $arrow ?></button>
                </div>
                <?php endif; ?>
            </div>

            <div class="room-panel__info">
                <span class="room-panel__label"><?= $e(($room_badges[$room['badge'] ?? ''] ?? null)['info'] ?? 'Accommodation · Ubud') ?></span>
                <h3 class="room-panel__name"><?= $e($room['name']) ?></h3>
                <p class="room-panel__text"><?= $e($room['text']) ?></p>

                <ul class="room-panel__features">
                    <?php foreach ($features as $feature): ?>
                    <li>
                        <span class="room-panel__feature-icon" aria-hidden="true"><?= icon($room_feature_icons[$feature] ?? 'check') ?></span>
                        <?= $e($feature) ?>
                    </li>
                    <?php endforeach; ?>
                </ul>

                <div class="room-panel__actions">
                    <a href="<?= $e($book_url) ?>" class="theme-btn" aria-label="Book the <?= $e($room['tab']) ?>">Book Now <?= $arrow ?></a>
                    <a href="<?= $e($social['whatsapp']['url']) ?>" class="theme-btn theme-btn--outline" target="_blank" rel="noopener">Ask on WhatsApp</a>
                </div>
            </div>
        </div>
        <?php endforeach; ?>
    </div>
</section>
