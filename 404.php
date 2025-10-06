<?php
$page_title = "Page Not Found - 404 Error";
$page_description = "The page you're looking for doesn't exist or has been moved.";
http_response_code(404);
include 'header.php';
?>

<!-- Page Hero -->

<section class="projects-section">
    <div class="container">
        <div class="section-title">
            <h1>    </h1>
            <div style="font-size: 4rem; margin-bottom: 20px;">🔍</div>
                        <h2>ERROR 404</h2>
            <h2>Oops! Page Not Found</h2>
             <p>We couldn't find the page you were looking for. It might have been moved, deleted, or you entered the wrong URL.</p>
        </div>
        <div style="margin-top: 30px; display: flex; gap: 15px; justify-content: center; flex-wrap: wrap;">
                        <a href="index.php" class="btn" style="background: var(--primary-color); color: var(--text-color);; padding: 12px 24px; text-decoration: none; border-radius: 5px;">Go Back Home</a>
                        <a href="sitemap.php" class="btn" style="background: var(--surface-color); color: var(--text-color); padding: 12px 24px; text-decoration: none; border-radius: 5px; border: 1px solid var(--border-color);">View Sitemap</a>
                    </div>
        
    </div>
</section>


<?php include 'footer.php'; ?>