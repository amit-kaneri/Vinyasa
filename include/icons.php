<?php
/* ---- Custom line icons ----
   Thin-stroke SVGs (stroke = currentColor, 24×24). No icon fonts.
   Usage: <?php echo icon('globe'); ?> */

function icon(string $name): string
{
    $paths = [
        // rosette with ribbons — registration / credential
        'badge'    => '<circle cx="12" cy="9" r="5.5"/><circle cx="12" cy="9" r="2.5"/><path d="M8.5 13.3 7 21l5-2.5 5 2.5-1.5-7.7"/>',
        // mountains over a river — Rishikesh roots
        'mountain' => '<path d="M2.5 16 8.5 7l3.5 5 2.5-3.5 7 7.5"/><path d="M3 19.5c2 0 2-1 4-1s2 1 4 1 2-1 4-1 2 1 4 1 2-1 2-1"/>',
        // pavilion roof on pillars — yoga shala
        'shala'    => '<path d="M2.5 9.5 12 4l9.5 5.5"/><path d="M4.5 9.5h15"/><path d="M6 9.5V19M18 9.5V19M10 9.5V19M14 9.5V19"/><path d="M3.5 19.5h17"/>',
        // bed — rooms
        'bed'      => '<path d="M3 18.5V6.5M21 18.5v-5.5a2.5 2.5 0 0 0-2.5-2.5H11v5.5"/><path d="M3 15.5h18"/><circle cx="7" cy="12" r="1.8"/><path d="M3 18.5h18"/>',
        // lotus — styles of yoga
        'lotus'    => '<path d="M12 5c-2.2 2.6-2.2 7.4 0 10 2.2-2.6 2.2-7.4 0-10z"/><path d="M12 15c-3.7-.8-6.4-3.6-7-6.6 2.8.4 5.2 2.4 7 6.6z"/><path d="M12 15c3.7-.8 6.4-3.6 7-6.6-2.8.4-5.2 2.4-7 6.6z"/><path d="M4.5 18.5c3.5 1.6 11.5 1.6 15 0"/>',
        // sprout — open to beginners
        'sprout'   => '<path d="M12 21v-9"/><path d="M12 12c0-3.5-2.5-6-6.5-6 0 3.5 2.5 6 6.5 6z"/><path d="M12 14.5c0-3.2 2.3-5.5 6-5.5 0 3.2-2.3 5.5-6 5.5z"/><path d="M8 21h8"/>',
        // globe — students from many countries
        'globe'    => '<circle cx="12" cy="12" r="9"/><path d="M3 12h18"/><path d="M12 3c2.5 2.6 3.8 5.6 3.8 9s-1.3 6.4-3.8 9c-2.5-2.6-3.8-5.6-3.8-9S9.5 5.6 12 3z"/>',
        // calendar with tick — attendance requirement
        'calendar' => '<rect x="3.5" y="5" width="17" height="15.5" rx="1.5"/><path d="M3.5 9.5h17M8 3v4M16 3v4"/><path d="m8.8 14.6 2.2 2.2 4.3-4.3"/>',
        // star — rating
        'star'     => '<path d="m12 3.5 2.6 5.3 5.8.8-4.2 4.1 1 5.8L12 16.8l-5.2 2.7 1-5.8-4.2-4.1 5.8-.8z"/>',
        // clock — duration / hours
        'clock'    => '<circle cx="12" cy="12" r="8.5"/><path d="M12 7.5V12l3 2"/>',
        // two people — group size
        'users'    => '<circle cx="9" cy="8.5" r="3"/><path d="M3.5 19c.5-3.2 2.7-5 5.5-5s5 1.8 5.5 5"/><circle cx="16.5" cy="9.5" r="2.4"/><path d="M15.5 14.2c2.6-.3 4.6 1.4 5 4.3"/>',
        // speech bubble — language
        'chat'     => '<path d="M4 5.5h16v10H9.5L5 19v-3.5H4z"/><path d="M8 9.5h8M8 12h5"/>',
        // tick — included
        'check'    => '<path d="m5 12.5 4.2 4.2L19 7"/>',
        // cross — not included
        'close'    => '<path d="m6.5 6.5 11 11M17.5 6.5l-11 11"/>',
        // plane — travel / airport
        'plane'    => '<path d="M10.5 13.5 3 11l1.5-1.5 8 .5 4.5-4.5c.8-.8 2.2-.8 2.5 0 .3.3.2 1.7-.5 2.5L14.5 12.5l.5 8L13.5 22l-2.5-7.5"/>',
        // moon — night / lights off
        'moon'     => '<path d="M19.5 14.5A8 8 0 0 1 9.5 4.5a8 8 0 1 0 10 10z"/>',
        // open book — study / philosophy
        'book'     => '<path d="M12 6.5c-2-1.5-5-2-8-1.5v13c3-.5 6 0 8 1.5 2-1.5 5-2 8-1.5V5c-3-.5-6 0-8 1.5z"/><path d="M12 6.5v13"/>',
        // breath lines — pranayama
        'wind'     => '<path d="M3 9h11a3 3 0 1 0-3-3"/><path d="M3 13h15a3 3 0 1 1-3 3"/><path d="M3 17h7"/>',
        // bowl — meals
        'bowl'     => '<path d="M3.5 11.5h17a8.5 8.5 0 0 1-17 0z"/><path d="M9 20.5h6"/><path d="M10 8c0-1.5 1-1.5 1-3M14 8c0-1.5 1-1.5 1-3"/>',
        // spine / body — anatomy
        'body'     => '<circle cx="12" cy="4.5" r="2"/><path d="M12 7v7M12 14l-3 6.5M12 14l3 6.5M6 10l6-2 6 2"/>',
        // Balinese temple gate (candi bentar) — temple visits
        'temple'   => '<path d="M3 21h18"/><path d="M4.5 21v-4h6v4M13.5 21v-4h6v4"/><path d="M5.5 17v-3.5h4V17M14.5 17v-3.5h4V17"/><path d="M6.5 13.5V10h2v3.5M15.5 13.5V10h2v3.5"/><path d="M7.5 10V6.5M16.5 10V6.5"/><circle cx="7.5" cy="5.3" r="1.1"/><circle cx="16.5" cy="5.3" r="1.1"/>',
        // rice terraces — Tegallalang
        'terrace'  => '<path d="M2.5 21c3.5-1.5 6-2 9.5-2s6 .5 9.5 2"/><path d="M2.5 17c3.5-1.5 6-2 9.5-2s6 .5 9.5 2"/><path d="M3.5 13c2.6-1.2 5-1.7 8-1.7"/><path d="M17 15V7.2"/><path d="M17 7.2c-1.2-1.6-3-2.2-4.8-1.8M17 7.2c1.2-1.6 3-2.2 4.8-1.8M17 7.2c-.6-2 .2-3.6 1.6-4.4M17 7.2c-1.4-1.3-3.2-1.2-4.3 0"/>',
        // wave — beach
        'wave'     => '<circle cx="12" cy="9" r="3.3"/><path d="M12 2.5v1.3M6 4.8l.9.9M18 4.8l-.9.9M4 9.5h1.4M18.6 9.5H20"/><path d="M2.5 15c2 0 2.5-1.5 4.75-1.5S9.5 15 12 15s2.5-1.5 4.75-1.5S19 15 21.5 15"/><path d="M2.5 19c2 0 2.5-1.5 4.75-1.5S9.5 19 12 19s2.5-1.5 4.75-1.5S19 19 21.5 19"/>',
        // leaf — wellness treatment
        'leaf'     => '<path d="M5 19c0-8 5-13 14-14-1 9-6 14-14 14z"/><path d="M5 19l8-8"/>',
        // music note — kirtan
        'music'    => '<path d="M9 17.5V6l11-2.5v11.5"/><path d="M9 9.5l11-2.5"/><ellipse cx="6.5" cy="17.5" rx="2.5" ry="2"/><ellipse cx="17.5" cy="15" rx="2.5" ry="2"/>',
        // suitcase — packing
        'suitcase' => '<rect x="3.5" y="7" width="17" height="12.5" rx="2"/><path d="M9 7V5a1.5 1.5 0 0 1 1.5-1.5h3A1.5 1.5 0 0 1 15 5v2"/><path d="M3.5 12.5h17"/>',
        // frangipani flower — Balinese wellness
        'flower'   => '<path d="M12 10.4C10 8 10.3 4.5 12 3c1.7 1.5 2 5 0 7.4z" transform="rotate(0 12 12)"/><path d="M12 10.4C10 8 10.3 4.5 12 3c1.7 1.5 2 5 0 7.4z" transform="rotate(72 12 12)"/><path d="M12 10.4C10 8 10.3 4.5 12 3c1.7 1.5 2 5 0 7.4z" transform="rotate(144 12 12)"/><path d="M12 10.4C10 8 10.3 4.5 12 3c1.7 1.5 2 5 0 7.4z" transform="rotate(216 12 12)"/><path d="M12 10.4C10 8 10.3 4.5 12 3c1.7 1.5 2 5 0 7.4z" transform="rotate(288 12 12)"/><circle cx="12" cy="12" r="1.6"/>',
        // sun — season / weather
        'sun'      => '<circle cx="12" cy="12" r="4"/><path d="M12 2.5v2.5M12 19v2.5M2.5 12H5M19 12h2.5M5.3 5.3l1.8 1.8M16.9 16.9l1.8 1.8M5.3 18.7l1.8-1.8M16.9 7.1l1.8-1.8"/>',
    ];

    if (!isset($paths[$name])) {
        return '';
    }

    return '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.2" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">'
         . $paths[$name] . '</svg>';
}

/* ---- Review platform logos ----
   Simplified marks in each platform's own brand colours (logo exception to the palette rule).
   Usage: <?php echo brand_icon('google'); ?> */

function brand_icon(string $name): string
{
    $icons = [
        'google'      => '<svg viewBox="0 0 24 24" aria-hidden="true"><path fill="#4285F4" d="M22.5 12.3c0-.8-.1-1.5-.2-2.3H12v4.3h5.9a5 5 0 0 1-2.2 3.3v2.7h3.5c2.1-1.9 3.3-4.7 3.3-8z"/><path fill="#34A853" d="M12 23c3 0 5.4-1 7.2-2.7l-3.5-2.7c-1 .7-2.2 1.1-3.7 1.1-2.9 0-5.3-1.9-6.2-4.5H2.2v2.8A11 11 0 0 0 12 23z"/><path fill="#FBBC05" d="M5.8 14.2a6.6 6.6 0 0 1 0-4.3V7.1H2.2a11 11 0 0 0 0 9.9z"/><path fill="#EA4335" d="M12 5.4c1.6 0 3.1.6 4.2 1.7l3.1-3.1A11 11 0 0 0 2.2 7.1l3.6 2.8C6.7 7.3 9.1 5.4 12 5.4z"/></svg>',
        'trustpilot'  => '<svg viewBox="0 0 24 24" aria-hidden="true"><path fill="#00B67A" d="m12 2 2.9 6.9 7.4.6-5.6 4.9 1.7 7.3L12 17.8l-6.4 3.9 1.7-7.3-5.6-4.9 7.4-.6z"/><path fill="#005128" d="m15.3 15.1-.7-3L12 17.8z"/></svg>',
        'tripadvisor' => '<svg viewBox="0 0 24 24" fill="none" stroke="#00AA6C" stroke-width="1.8" aria-hidden="true"><path d="M3 8.5c2.5-2 5.7-3 9-3s6.5 1 9 3"/><circle cx="7" cy="13.5" r="4.2"/><circle cx="17" cy="13.5" r="4.2"/><circle cx="7" cy="13.5" r="1.4" fill="#00AA6C" stroke="none"/><circle cx="17" cy="13.5" r="1.4" fill="#00AA6C" stroke="none"/><path d="m10.6 16.4 1.4 2.1 1.4-2.1"/></svg>',
    ];

    return $icons[$name] ?? '';
}

/* Rating marks in the platform's style: star (Google) · box (Trustpilot) · bubble (Tripadvisor).
   $rating 0–5 → fill width; two layers so partial values (4.2) show correctly. */
function rating_marks(string $type, float $rating): string
{
    $mark = match ($type) {
        'box'    => '<span class="r-mark r-mark--box"><svg viewBox="0 0 24 24"><path fill="#fff" d="m12 4 2.3 5.4 5.8.5-4.4 3.8 1.3 5.7L12 16.4l-5 3 1.3-5.7-4.4-3.8 5.8-.5z"/></svg></span>',
        'bubble' => '<span class="r-mark r-mark--bubble"></span>',
        default  => '<span class="r-mark r-mark--star">★</span>',
    };
    $row  = str_repeat($mark, 5);
    $fill = max(0, min(100, $rating / 5 * 100));

    $step = (int) (round($fill / 2) * 2); // 2% steps → .is-fill-0 … .is-fill-100 (style.scss)

    return '<span class="r-marks r-marks--' . $type . ' is-fill-' . $step . '" role="img" aria-label="Rated ' . $rating . ' out of 5">'
         . '<span class="r-marks__base">' . $row . '</span>'
         . '<span class="r-marks__fill">' . $row . '</span></span>';
}
