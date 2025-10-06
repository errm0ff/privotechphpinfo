<?php
$current_page = basename($_SERVER['PHP_SELF']);
require_once 'Router.php';

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $page_title ?? 'Fast, Fixed-Price Web Development UK | Privotech'; ?></title>
    <meta name="description" content="<?php echo $page_description ?? 'Affordable fixed-price web development, e-commerce & CRM solutions for UK businesses. Fast delivery, guaranteed pricing.'; ?>">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/seo-optimizations.css">
    <link rel="stylesheet" href="css/print.css" media="print">
    <meta name="keywords" content="
web development UK, affordable web development UK, small business website UK, SME web solutions,
custom web design UK, responsive website design, WordPress development UK, Joomla development,
Drupal development, software development UK, CRM system UK, CRM solutions for small business,
SEO services UK, affordable SEO UK, SEO optimization UK, search engine optimization UK,
digital marketing UK, fast website delivery 1-3 days, quick website setup, affordable website setup,
e-commerce website UK, online store development, website maintenance UK, business website design,
logo design UK, branding services UK, London Web development services
">
    <meta name="robots" content="index, follow">
    <meta name="geo.region" content="GB">
    <meta name="geo.placename" content="United Kingdom">
</head>
<body>
    <!-- Header -->
    <header>
        <div class="container header-container">
            <a href="home" class="logo">PRIVO<span>TECH</span></a>
            <button class="mobile-menu-btn">☰</button>
            <ul class="nav-menu">
                <li><a href="./home" <?php echo $current_page == 'home' ? 'class="active"' : ''; ?>>Home</a></li>
                <li><a href="./about" <?php echo $current_page == 'about' ? 'class="active"' : ''; ?>>About Us</a></li>
                
                <li>
                    <a href="./web-design" <?php echo in_array($current_page, ['web-design.php', 'ecommerce-design.php', 'lite-package.php', 'pro-package.php', 'ready-made.php', 'micro-package.php']) ? 'class="active"' : ''; ?>>Web Development & Design</a>
                    <ul class="dropdown-menu">
                        <li><a href="./ecommerce-design" <?php echo $current_page == 'ecommerce-design.php' ? 'class="active"' : ''; ?>>Ecommerce Design</a></li>
                        <li><a href="./lite-package" <?php echo $current_page == 'lite-package.php' ? 'class="active"' : ''; ?>>Lite Package</a></li>
                        <li><a href="./pro-package" <?php echo $current_page == 'pro-package.php' ? 'class="active"' : ''; ?>>Pro Package</a></li>
                        <li><a href="./ready-made" <?php echo $current_page == 'ready-made.php' ? 'class="active"' : ''; ?>>ReadyMade Package</a></li>
                        <li><a href="./micro-package" <?php echo $current_page == 'micro-package.php' ? 'class="active"' : ''; ?>>Micro Package</a></li>
                    </ul>
                </li>
        
                
                 <li><a href="./logo-design" <?php echo $current_page == 'logo-design.php' ? 'class="active"' : ''; ?>>Logo Design</a></li>
                 <li><a href="./seo" <?php echo $current_page == 'seo.php' ? 'class="active"' : ''; ?>>SEO</a></li>
                <li><a href="./cms" <?php echo $current_page == 'cms.php' ? 'class="active"' : ''; ?>>CMS</a></li>
                <!--<li><a href="bloglist.php" php echo $current_page == 'bloglist.php' ? 'class="active"' : ''; ?>>Blog</a></li>-->
                <li><a href="./projects" <?php echo $current_page == 'projects.php' ? 'class="active"' : ''; ?>>Our projects</a></li>
                <li>
                    <a  <?php echo in_array($current_page, ['faq.php', 'terms.php', 'lite-package.php', 'privacy.php' ]) ? 'class="active"' : ''; ?>>Help</a>
                    <ul class="dropdown-menu">
                        <li><a href="./faq" <?php echo $current_page == 'faq.php' ? 'class="active"' : ''; ?>>FAQ</a></li>
                        <li><a href="./terms" <?php echo $current_page == 'terms.php' ? 'class="active"' : ''; ?>>Terms & Conditions</a></li>
                        <li><a href="./privacy" <?php echo $current_page == 'privacy.php' ? 'class="active"' : ''; ?>>Privacy policy</a></li>
                    </ul>
                </li>
                <li><a href="./contact" <?php echo $current_page == 'contact.php' ? 'class="active"' : ''; ?>>Contact</a></li>
            </ul>
        </div>
    </header>