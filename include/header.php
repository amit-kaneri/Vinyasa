<?php
// Main menu — 'file' marks the active link. TODO: courses listing page.
$current_page = basename($_SERVER['SCRIPT_NAME']);
$nav_links = [
    ['label' => 'Home',     'url' => $link,                 'file' => 'index.php'],
    ['label' => 'About',    'url' => $link . 'about-us.php', 'file' => 'about-us.php'],
    ['label' => 'Courses',  'url' => $link . '200-hour-yoga-teacher-training-in-bali.php', 'file' => '200-hour-yoga-teacher-training-in-bali.php'], // TODO: courses listing page — 200hr page for now (user)
    ['label' => 'Retreats', 'url' => $link . 'yoga-retreat-in-bali.php', 'file' => 'yoga-retreat-in-bali.php'],
    ['label' => 'Contact',  'url' => $link . 'contact-us.php', 'file' => 'contact-us.php'],
];
?>
<header class="site-header<?= $current_page === 'index.php' ? ' site-header--home' : '' ?>" id="siteHeader">
    <div class="container site-header__inner">
        <a href="<?=$link?>" class="site-header__logo" aria-label="<?php echo $e($site_name); ?> — Home">
            <img src="<?=$link?>assets/images/logo.webp" alt="<?php echo $e($site_name); ?>" width="400" height="117">
        </a>

        <nav class="site-nav" id="siteNav" aria-label="Main menu">
            <ul class="site-nav__list">
                <?php foreach ($nav_links as $item): $active = $item['file'] === $current_page; ?>
                <li><a href="<?= $e($item['url']) ?>" class="site-nav__link<?= $active ? ' is-active' : '' ?>"<?= $active ? ' aria-current="page"' : '' ?>><?= $e($item['label']) ?></a></li>
                <?php endforeach; ?>
            </ul>
            <a href="<?=$link?>contact-us.php#contact" class="theme-btn">Enquire Now</a>
        </nav>

        <button type="button" class="menu-toggle" aria-label="Open menu" aria-expanded="false" aria-controls="siteNav">
            <svg viewBox="0 0 40 40" fill="none" aria-hidden="true">
                <line class="line-top" x1="8" y1="16" x2="32" y2="16" />
                <line class="line-bottom" x1="8" y1="24" x2="32" y2="24" />
            </svg>
        </button>

        <!-- Mobile only — contact page -->
        <a href="<?=$link?>contact-us.php" class="header-contact">
            <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.4" stroke-linejoin="round" aria-hidden="true"><path d="M5 4h4l2 5-2.5 1.5a11 11 0 0 0 5 5L15 13l5 2v4a1 1 0 0 1-1 1A16 16 0 0 1 4 5a1 1 0 0 1 1-1z"/></svg>
            <span>Contact Us</span>
        </a>
    </div>
</header>
