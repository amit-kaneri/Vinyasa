<?php

session_start();

if (isset($_SERVER['HTTP_REFERER']) && $_SERVER['HTTP_REFERER'] !== $_SERVER['REQUEST_URI']) {
    $_SESSION['last_url'] = $_SERVER['HTTP_REFERER'];
}

// HTTPS directly, or behind a proxy/tunnel (Cloudflare sends X-Forwarded-Proto: https)
$protocol = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on')
    || (($_SERVER['HTTP_X_FORWARDED_PROTO'] ?? '') === 'https') ? 'https' : 'http';

$fullurl = $protocol . '://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];

// Local XAMPP (and a Cloudflare quick tunnel to it) serves the site from /luxury-vinyasa/; the live domain serves it from /.
$host     = strtok($_SERVER['HTTP_HOST'], ':');
$isLocal  = in_array($host, ['localhost', '127.0.0.1'], true) || str_ends_with($host, '.trycloudflare.com');
$basePath = $isLocal ? '/luxury-vinyasa/' : '/';
$link = $protocol . '://' . $_SERVER['HTTP_HOST'] . $basePath;

$fullurl = strtok($fullurl, '?');

/* ---- Page SEO ----
   Meta title, description, OG image and breadcrumb label for every page, keyed
   by file name. Add a row here when a new page is created. Keep titles under
   ~60 characters and descriptions under ~160 so Google doesn't cut them off. */
$site_name = 'Vinyasa Yoga Academy';

$seo = [
    // TODO: final title + description for the home page
    'index.php' => [
        'title'       => 'Vinyasa Yoga Academy',
        'description' => 'Vinyasa Yoga Academy — yoga teacher training and retreats.',
    ],
    'about-us.php' => [
        'title'       => 'About Us | Vinyasa Yoga Academy, Rishikesh & Bali',
        'description' => 'Founded in Rishikesh in 2010 by Yogi Vishnu Panigrahi. A Yoga Alliance registered school (RYS 200, 300, 500) with campuses in Rishikesh and Ubud, Bali.',
        'crumb'       => 'About Us',
    ],
    '200-hour-yoga-teacher-training-in-bali.php' => [
        'title'       => '200 Hour Yoga Teacher Training in Bali | Ubud, 20 Days',
        'description' => '20-day residential 200-hour yoga teacher training in Ubud, Bali. Open to beginners, monthly batches, from $1,299 with room and meals. Eligible to apply for RYT 200.',
        'crumb'       => '200 Hour YTT in Bali',
    ],
    'yoga-retreat-in-bali.php' => [
        'title'       => 'Yoga Retreat in Bali | 3 to 21 Days in Ubud',
        'description' => 'A relaxed yoga retreat in Ubud, Bali: daily yoga and meditation, vegetarian meals and guided trips to temples and rice terraces. Beginners welcome.',
        'crumb'       => 'Retreats',
    ],
];

$page_seo = $seo[basename($_SERVER['SCRIPT_NAME'])] ?? $seo['index.php'];

$page_title       = $page_seo['title'];
$page_description = $page_seo['description'];
// OG image is optional: add 'image' => 'og-home.jpg' to a page once the file exists in assets/images/og/
$page_image       = isset($page_seo['image']) ? $link . 'assets/images/og/' . $page_seo['image'] : null;
$page_crumb       = $page_seo['crumb'] ?? null;
$page_image_alt   = $page_seo['image_alt'] ?? $site_name;
$page_robots      = $page_seo['robots']    ?? 'index, follow, max-image-preview:large, max-snippet:-1, max-video-preview:-1';

$e = fn($v) => htmlspecialchars($v, ENT_QUOTES, 'UTF-8');

// Cache-busting: ?v=<file modified time>, so browsers fetch our own CSS/JS again after every change
$ver = fn(string $path) => @filemtime(__DIR__ . '/../' . $path) ?: 1;

/* Social profiles + social_links() */
require_once __DIR__ . '/social.php';

/* Custom SVG icons — icon('globe') */
require_once __DIR__ . '/icons.php';
?>
<base href="<?php echo $link; ?>">
<!-- Required meta tags -->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<!-- primary meta -->
<title><?php echo $e($page_title); ?></title>
<meta name="description" content="<?php echo $e($page_description); ?>">
<meta name="robots" content="<?php echo $e($page_robots); ?>">
<meta name="author" content="<?php echo $e($site_name); ?>">
<meta name="theme-color" content="#03256F">
<link rel="canonical" href="<?php echo $e($fullurl); ?>">

<!-- open graph (facebook, linkedin, whatsapp) -->
<meta property="og:type" content="website">
<meta property="og:site_name" content="<?php echo $e($site_name); ?>">
<meta property="og:locale" content="en_US">
<meta property="og:title" content="<?php echo $e($page_title); ?>">
<meta property="og:description" content="<?php echo $e($page_description); ?>">
<meta property="og:url" content="<?php echo $e($fullurl); ?>">
<?php if ($page_image): ?>
<meta property="og:image" content="<?php echo $e($page_image); ?>">
<meta property="og:image:width" content="1200">
<meta property="og:image:height" content="630">
<meta property="og:image:alt" content="<?php echo $e($page_image_alt); ?>">
<?php endif; ?>

<!-- twitter / x -->
<meta name="twitter:card" content="<?php echo $page_image ? 'summary_large_image' : 'summary'; ?>">
<meta name="twitter:title" content="<?php echo $e($page_title); ?>">
<meta name="twitter:description" content="<?php echo $e($page_description); ?>">
<?php if ($page_image): ?>
<meta name="twitter:image" content="<?php echo $e($page_image); ?>">
<meta name="twitter:image:alt" content="<?php echo $e($page_image_alt); ?>">
<?php endif; ?>

<!-- css -->
<link rel="stylesheet" href="<?=$link?>assets/css/bootstrap.css">
<link rel="stylesheet" href="<?=$link?>assets/css/swiper.css">
<link rel="stylesheet" href="<?=$link?>assets/css/style.css?v=<?= $ver('assets/css/style.css') ?>">
