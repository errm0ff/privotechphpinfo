<?php
$page_title = "SEO Services - Privotech";
$page_description = "Professional SEO services to improve your website's visibility and drive more organic traffic. Comprehensive SEO strategies with proven results.";
include 'header.php';
?>

<!-- Page Hero -->
<section class="hero" style="padding: 150px 0 80px;">
    <div class="container">
        <h1>Professional SEO Services</h1>
        <p>Improve your website's visibility and drive more organic traffic with our comprehensive SEO strategies and proven techniques.</p>
        <a href="#packages" class="btn btn-accent" style="margin-top: 20px;">View SEO Packages</a>
    </div>
</section>

<!-- Introduction -->
<section>
    <div class="container">
        <div class="about-content">
            <div class="about-text">
                <h2>Get Found by Your Ideal Customers</h2>
                <p>Search Engine Optimization is essential for any business wanting to succeed online. Our SEO services help your website rank higher in search results, driving qualified traffic and increasing conversions while building sustainable online visibility.</p>
                <p>We use proven strategies and white-hat techniques to improve your search engine rankings while providing detailed reporting and transparent communication so you can see the results of our work and understand the impact on your business.</p>
                
                <div class="seo-metrics-grid" style="margin: 30px 0; grid-template-columns: repeat(2, 1fr);">
                    <div class="seo-metric-card">
                        <div class="seo-metric-icon">📈</div>
                        <div class="seo-metric-number" data-count="85">0</div>
                        <div class="seo-metric-label">Traffic Increase</div>
                        <div class="seo-metric-description">Average organic growth</div>
                    </div>
                    <div class="seo-metric-card">
                        <div class="seo-metric-icon">💼</div>
                        <div class="seo-metric-number" data-count="60">0</div>
                        <div class="seo-metric-label">More Leads</div>
                        <div class="seo-metric-description">Qualified conversions</div>
                    </div>
                </div>
            </div>
            <div class="about-image">
                SEO Analytics Dashboard
            </div>
        </div>
    </div>
</section>

<!-- SEO Services -->
<section class="projects-section">
    <div class="container">
        <div class="section-title">
            <h2>Our SEO Services</h2>
            <p>Comprehensive SEO strategies tailored to your business goals and industry</p>
        </div>
        <div class="seo-services-grid">
            <div class="seo-service-card">
                <div class="seo-service-icon">🔍</div>
                <h4>Keyword Research</h4>
                <p>Identify the most valuable keywords for your business and target audience with comprehensive competitor analysis and search volume data.</p>
            </div>
            <div class="seo-service-card">
                <div class="seo-service-icon">📊</div>
                <h4>Technical SEO</h4>
                <p>Optimize website structure, speed, mobile-friendliness, and technical elements for better crawling and indexing by search engines.</p>
            </div>
            <div class="seo-service-card">
                <div class="seo-service-icon">✍️</div>
                <h4>Content Optimization</h4>
                <p>Create and optimize content that ranks well, engages your audience, and establishes your authority in your industry.</p>
            </div>
            <div class="seo-service-card">
                <div class="seo-service-icon">📈</div>
                <h4>Performance Tracking</h4>
                <p>Monitor rankings, traffic, conversions, and user behavior with detailed analytics reports and actionable insights.</p>
            </div>
            <div class="seo-service-card">
                <div class="seo-service-icon">🔗</div>
                <h4>Link Building</h4>
                <p>Build high-quality backlinks from authoritative websites to improve domain authority and search engine rankings.</p>
            </div>
            <div class="seo-service-card">
                <div class="seo-service-icon">📍</div>
                <h4>Local SEO</h4>
                <p>Optimize for local search results and Google My Business listings to attract customers in your geographic area.</p>
            </div>
        </div>
    </div>
</section>

<!-- SEO Packages -->
<section id="packages">
    <div class="container">
        <div class="section-title">
            <h2>SEO Packages</h2>
            <p>Choose the SEO package that matches your business needs and budget requirements</p>
        </div>
        <div class="seo-packages-grid">
            <div class="seo-package-card">
                <div class="seo-package-header">
                    <h3>Starter SEO</h3>
                    <p>For new websites</p>
                </div>
                <div class="seo-price">$299<span class="seo-price-period">/month</span></div>
                <ul class="seo-features-list">
                    <li>Keyword Research (15 target keywords)</li>
                    <li>On-Page Optimization</li>
                    <li>Basic Technical Audit</li>
                    <li>Google Analytics Setup</li>
                    <li>Monthly Performance Report</li>
                    <li>Email Support</li>
                    <li>3-Month Minimum Contract</li>
                </ul>
                <a href="contact.php?package=seo&plan=starter" class="btn">Get Started</a>
            </div>

            <div class="seo-package-card featured">
                <div class="seo-package-badge">Recommended</div>
                <div class="seo-package-header">
                    <h3>Professional SEO</h3>
                    <p>For growing businesses</p>
                </div>
                <div class="seo-price">$599<span class="seo-price-period">/month</span></div>
                <ul class="seo-features-list">
                    <li>Keyword Research (30 target keywords)</li>
                    <li>Complete Technical SEO Audit</li>
                    <li>Content Strategy & Optimization</li>
                    <li>Local SEO Optimization</li>
                    <li>Backlink Building (5 quality links/month)</li>
                    <li>Competitor Analysis</li>
                    <li>Bi-weekly Progress Reports</li>
                    <li>Priority Support</li>
                    <li>6-Month Minimum Contract</li>
                </ul>
                <a href="contact.php?package=seo&plan=professional" class="btn btn-accent">Get Started</a>
            </div>

            <div class="seo-package-card">
                <div class="seo-package-header">
                    <h3>Enterprise SEO</h3>
                    <p>For established businesses</p>
                </div>
                <div class="seo-price">$999<span class="seo-price-period">/month</span></div>
                <ul class="seo-features-list">
                    <li>Comprehensive Keyword Research</li>
                    <li>Advanced Technical SEO</li>
                    <li>Content Marketing Strategy</li>
                    <li>Advanced Link Building (10+ links/month)</li>
                    <li>International SEO</li>
                    <li>E-commerce SEO Optimization</li>
                    <li>Weekly Progress Reports</li>
                    <li>Dedicated Account Manager</li>
                    <li>24/7 Priority Support</li>
                    <li>12-Month Minimum Contract</li>
                </ul>
                <a href="contact.php?package=seo&plan=enterprise" class="btn">Get Started</a>
            </div>
        </div>
    </div>
</section>

<!-- SEO Results Section -->
<section class="seo-results-section">
    <div class="container">
        <div class="section-title">
            <h2>Proven SEO Results</h2>
            <p>Our strategies deliver measurable improvements and sustainable growth</p>
        </div>
        <div class="seo-metrics-grid">
            <div class="seo-metric-card">
                <div class="seo-metric-icon">🚀</div>
                <div class="seo-metric-number" data-count="85">0</div>
                <div class="seo-metric-label">Traffic Boost</div>
                <div class="seo-metric-description">Average organic traffic increase</div>
            </div>
            <div class="seo-metric-card">
                <div class="seo-metric-icon">💼</div>
                <div class="seo-metric-number" data-count="60">0</div>
                <div class="seo-metric-label">More Leads</div>
                <div class="seo-metric-description">Increase in qualified leads</div>
            </div>
            <div class="seo-metric-card">
                <div class="seo-metric-icon">💰</div>
                <div class="seo-metric-number" data-count="45">0</div>
                <div class="seo-metric-label">Higher Conversion</div>
                <div class="seo-metric-description">Improved conversion rates</div>
            </div>
            <div class="seo-metric-card">
                <div class="seo-metric-icon">📈</div>
                <div class="seo-metric-number" data-count="200">0</div>
                <div class="seo-metric-label">Top Rankings</div>
                <div class="seo-metric-description">Keywords on first page</div>
            </div>
        </div>
    </div>
</section>

<!-- SEO Guarantee -->
<section>
    <div class="container">
        <div class="seo-guarantee">
            <div class="seo-guarantee-icon">📈</div>
            <h3>Proven Results Guarantee</h3>
            <p>We focus on strategies that deliver measurable results. Our clients typically see significant improvements in organic traffic and search rankings within 3-6 months of starting our SEO services. We provide transparent reporting and regular updates so you can track progress and see the return on your investment.</p>
        </div>
    </div>
</section>

<!-- CTA -->
<section class="contact-section">
    <div class="container">
        <div class="section-title">
            <h2>Ready to Boost Your Online Visibility?</h2>
            <p>Start driving more qualified traffic to your website with our professional SEO services</p>
            <a href="contact.php?package=seo" class="btn btn-accent" style="margin-top: 20px;">Start SEO Campaign</a>
        </div>
    </div>
</section>

<?php include 'footer.php'; ?>