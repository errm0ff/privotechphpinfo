<?php
$current_page = basename($_SERVER['PHP_SELF']);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $page_title ?? 'Privotech - Technology Solutions'; ?></title>
    <meta name="description" content="<?php echo $page_description ?? 'Privotech delivers innovative technology solutions including web design, development, SEO, and CMS services for businesses of all sizes.'; ?>">
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <!-- Header -->
    <header>
        <div class="container header-container">
            <a href="index.php" class="logo">Privo<span>tech</span></a>
            <button class="mobile-menu-btn">☰</button>
            <ul class="nav-menu">
                <li><a href="index.php" <?php echo $current_page == 'index.php' ? 'class="active"' : ''; ?>>Home</a></li>
                <li><a href="about.php" <?php echo $current_page == 'about.php' ? 'class="active"' : ''; ?>>About Us</a></li>
                <li>
                    <a href="web-design.php" <?php echo in_array($current_page, ['web-design.php', 'ecommerce-design.php', 'lite-package.php', 'pro-package.php', 'ready-made.php', 'micro-package.php']) ? 'class="active"' : ''; ?>>Web Design</a>
                    <ul class="dropdown-menu">
                        <li><a href="ecommerce-design.php" <?php echo $current_page == 'ecommerce-design.php' ? 'class="active"' : ''; ?>>Ecommerce Design</a></li>
                        <li><a href="lite-package.php" <?php echo $current_page == 'lite-package.php' ? 'class="active"' : ''; ?>>Lite Package</a></li>
                        <li><a href="pro-package.php" <?php echo $current_page == 'pro-package.php' ? 'class="active"' : ''; ?>>Pro Package</a></li>
                        <li><a href="ready-made.php" <?php echo $current_page == 'ready-made.php' ? 'class="active"' : ''; ?>>Ready Made</a></li>
                        <li><a href="micro-package.php" <?php echo $current_page == 'micro-package.php' ? 'class="active"' : ''; ?>>Micro Package</a></li>
                    </ul>
                </li>
                <li><a href="projects.php" <?php echo $current_page == 'projects.php' ? 'class="active"' : ''; ?>>Our Projects</a></li>
                <li><a href="bloglist.php" <?php echo $current_page == 'bloglist.php' ? 'class="active"' : ''; ?>>Blog</a></li>
                 <li><a href="logo-design.php" <?php echo $current_page == 'logo-design.php' ? 'class="active"' : ''; ?>>Logo Design</a></li>
                 <li><a href="seo.php" <?php echo $current_page == 'seo.php' ? 'class="active"' : ''; ?>>SEO</a></li>
                <li><a href="cms.php" <?php echo $current_page == 'cms.php' ? 'class="active"' : ''; ?>>CMS</a></li>
                
                <li><a href="contact.php" <?php echo $current_page == 'contact.php' ? 'class="active"' : ''; ?>>Contact</a></li>
            </ul>
        </div>
    </header>