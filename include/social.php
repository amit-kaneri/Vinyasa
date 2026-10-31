<?php
/* ---- Social profiles ----
   One place for all social links. Use social_links() anywhere (banner, footer, contact).
   TODO: replace # with the real profile URLs (Instagram, Facebook, YouTube, X).
   WhatsApp = +91 87557 44872 — the number the live site lists as WhatsApp (Rishikesh). Confirm or swap for Bali. */
$social = [
    'instagram'     => ['label' => 'Instagram',     'url' => '#'],
    'facebook'      => ['label' => 'Facebook',      'url' => '#'],
    'youtube'       => ['label' => 'YouTube',       'url' => '#'],
    'x'             => ['label' => 'X (Twitter)',   'url' => '#'],
    'whatsapp'      => ['label' => 'WhatsApp',      'url' => 'https://wa.me/918755744872'],
    'yoga-alliance' => ['label' => 'Yoga Alliance', 'url' => 'https://app.yogaalliance.org/schoolpublicprofile?id=0013g000002piOSAAY&sid=0013g000002nnvzAAA'],
];

// Thin line icons (stroke = currentColor) — no icon fonts
$social_icons = [
    'instagram'     => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.3" aria-hidden="true"><rect x="3" y="3" width="18" height="18" rx="5"/><circle cx="12" cy="12" r="4.2"/><circle cx="17.3" cy="6.7" r="0.6" fill="currentColor" stroke="none"/></svg>',
    'facebook'      => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.3" stroke-linejoin="round" aria-hidden="true"><path d="M14.5 3H13a4 4 0 0 0-4 4v3H6.5v3.5H9V21h3.5v-7.5h2.8l.5-3.5h-3.3V7.5a1 1 0 0 1 1-1h2V3z"/></svg>',
    'youtube'       => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.3" stroke-linejoin="round" aria-hidden="true"><rect x="2.5" y="5" width="19" height="14" rx="4"/><path d="M10 9.2v5.6l4.8-2.8z"/></svg>',
    'x'             => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.3" stroke-linejoin="round" aria-hidden="true"><path d="M4 4h4.6L20 20h-4.6z"/><path d="M19.5 4l-6.6 7.4M4.5 20l6.6-7.4" stroke-linecap="round"/></svg>',
    'whatsapp'      => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.3" stroke-linejoin="round" aria-hidden="true"><path d="M4 20l1.2-4A8.5 8.5 0 1 1 8.3 19z"/><path d="M9.2 8.3c.3-.4.8-.4 1 0l.7 1.4c.1.3 0 .6-.2.8l-.5.5a5 5 0 0 0 2.8 2.8l.5-.5c.2-.2.5-.3.8-.2l1.4.7c.4.2.4.7 0 1-.6.6-1.5.9-2.4.6a7.5 7.5 0 0 1-4.6-4.6c-.3-.9 0-1.8.5-2.5z"/></svg>',
    'yoga-alliance' => '<svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.3" aria-hidden="true"><circle cx="12" cy="12" r="9"/><text x="12" y="15.6" text-anchor="middle" font-family="Raleway, sans-serif" font-size="10.5" fill="currentColor" stroke="none">YA</text></svg>',
];

function social_links(string $class = ''): string
{
    global $social, $social_icons;

    $html = '<ul class="social-links ' . $class . '">';
    foreach ($social as $key => $item) {
        $html .= '<li><a href="' . htmlspecialchars($item['url'], ENT_QUOTES, 'UTF-8') . '" target="_blank" rel="noopener" aria-label="' . $item['label'] . '" title="' . $item['label'] . '">'
               . $social_icons[$key] . '</a></li>';
    }
    return $html . '</ul>';
}
