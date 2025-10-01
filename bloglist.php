<?php
$page_title = "Blog - Privotech";
$page_description = "Stay updated with the latest technology trends, insights, and company news from Privotech's expert team.";
include 'header.php';
?>

<!-- Page Hero -->
<section class="hero" style="padding: 150px 0 80px;">
    <div class="container">
        <h1>Our Blog</h1>
        <p>Stay updated with the latest technology trends, insights, and company news.</p>
    </div>
</section>

<!-- Blog Section -->
<section class="blog-section">
    <div class="container">
        <!-- Blog Filters -->
        <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 40px; flex-wrap: wrap; gap: 20px;">
            <div class="blog-filters">
                <a href="#" class="category-filter active" data-category="all">All Posts</a>
                <a href="#" class="category-filter" data-category="technology">Technology</a>
                <a href="#" class="category-filter" data-category="development">Development</a>
                <a href="#" class="category-filter" data-category="business">Business</a>
            </div>
            <div class="blog-search">
                <input type="text" id="blog-search" placeholder="Search blog posts..." style="padding: 10px 15px; border: 1px solid #ddd; border-radius: 4px; width: 250px;">
            </div>
        </div>

        <!-- Blog Grid -->
        <div class="blog-grid">
            <!-- Blog Post 1 -->
            <div class="blog-card">
                <div class="blog-image">AI Technology</div>
                <div class="blog-content">
                    <div class="blog-meta">
                        <span class="blog-date">March 15, 2024</span>
                        <span class="blog-category">Technology</span>
                    </div>
                    <h3>The Future of Artificial Intelligence in Business</h3>
                    <p>Explore how AI is transforming business operations and creating new opportunities for innovation and growth across various industries.</p>
                    <a href="blogname.php" class="read-more">Read More →</a>
                </div>
            </div>

            <!-- Blog Post 2 -->
            <div class="blog-card">
                <div class="blog-image">Web Development</div>
                <div class="blog-content">
                    <div class="blog-meta">
                        <span class="blog-date">March 10, 2024</span>
                        <span class="blog-category">Development</span>
                    </div>
                    <h3>Modern Web Development Trends in 2024</h3>
                    <p>Discover the latest trends in web development including new frameworks, tools, and methodologies that are shaping the future of the web.</p>
                    <a href="blogname.php" class="read-more">Read More →</a>
                </div>
            </div>

            <!-- Blog Post 3 -->
            <div class="blog-card">
                <div class="blog-image">Cloud Computing</div>
                <div class="blog-content">
                    <div class="blog-meta">
                        <span class="blog-date">March 5, 2024</span>
                        <span class="blog-category">Technology</span>
                    </div>
                    <h3>Cloud Security Best Practices for Enterprises</h3>
                    <p>Learn essential security measures and best practices to protect your enterprise data and applications in the cloud environment.</p>
                    <a href="blogname.php" class="read-more">Read More →</a>
                </div>
            </div>

            <!-- Blog Post 4 -->
            <div class="blog-card">
                <div class="blog-image">Mobile Apps</div>
                <div class="blog-content">
                    <div class="blog-meta">
                        <span class="blog-date">February 28, 2024</span>
                        <span class="blog-category">Development</span>
                    </div>
                    <h3>Cross-Platform Mobile Development: Pros and Cons</h3>
                    <p>An in-depth analysis of cross-platform mobile development frameworks and when to choose them over native development approaches.</p>
                    <a href="blogname.php" class="read-more">Read More →</a>
                </div>
            </div>

            <!-- Blog Post 5 -->
            <div class="blog-card">
                <div class="blog-image">Business Strategy</div>
                <div class="blog-content">
                    <div class="blog-meta">
                        <span class="blog-date">February 20, 2024</span>
                        <span class="blog-category">Business</span>
                    </div>
                    <h3>Digital Transformation: Key Success Factors</h3>
                    <p>Understand the critical factors that determine the success of digital transformation initiatives in modern organizations.</p>
                    <a href="digital-transformation-success.php" class="read-more">Read More →</a>
                </div>
            </div>

            <!-- Blog Post 6 -->
            <div class="blog-card">
                <div class="blog-image">Cybersecurity</div>
                <div class="blog-content">
                    <div class="blog-meta">
                        <span class="blog-date">February 15, 2024</span>
                        <span class="blog-category">Technology</span>
                    </div>
                    <h3>Emerging Cybersecurity Threats and Protection Strategies</h3>
                    <p>Stay informed about the latest cybersecurity threats and learn effective strategies to protect your organization from potential attacks.</p>
                    <a href="cybersecurity-threats.php" class="read-more">Read More →</a>
                </div>
            </div>
        </div>

        <!-- Pagination -->
        <div class="pagination">
            <a href="#" class="active">1</a>
            <a href="#">2</a>
            <a href="#">3</a>
            <a href="#">Next →</a>
        </div>
    </div>
</section>

<?php include 'footer.php'; ?>