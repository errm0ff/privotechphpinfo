<?php
$page_title = "Our Projects - Privotech";
$page_description = "View our portfolio of successful web design, development, and technology projects for businesses across various industries.";
include 'header.php';
?>

<!-- Page Hero -->
<section class="hero" style="padding: 150px 0 80px;">
    <div class="container">
        <h1>Our Projects</h1>
        <p>Explore our portfolio of successful technology solutions across various industries.</p>
    </div>
</section>

<!-- Projects Section -->
<section class="projects-section">
    <div class="container">
        <div class="section-title">
            <h2>Featured Projects</h2>
            <p>Here are some of our most recent and impactful projects</p>
        </div>
        <div class="projects-grid">
            <div class="project-card">
                <div class="project-image">E-commerce Platform</div>
                <div class="project-content">
                    <h3>Global Retail E-commerce</h3>
                    <p>A comprehensive e-commerce solution for a global retail brand, featuring advanced inventory management, multi-currency support, and seamless payment integration.</p>
                    <p><strong>Technologies:</strong> PHP, MySQL, React, AWS</p>
                    <p><strong>Duration:</strong> 6 months</p>
                    <a href=''><p><strong>Watch online:</strong> https//link.com</p></a>
                </div>
            </div>
            <div class="project-card">
                <div class="project-image">Healthcare System</div>
                <div class="project-content">
                    <h3>Healthcare Management System</h3>
                    <p>A HIPAA-compliant healthcare management system for a network of clinics, featuring patient records, appointment scheduling, and billing modules.</p>
                    <p><strong>Technologies:</strong> Laravel, Vue.js, PostgreSQL</p>
                    <p><strong>Duration:</strong> 8 months</p>
                </div>
            </div>
            <div class="project-card">
                <div class="project-image">Finance Dashboard</div>
                <div class="project-content">
                    <h3>Financial Analytics Dashboard</h3>
                    <p>Real-time financial data visualization and reporting tools for an investment firm, with predictive analytics and custom reporting features.</p>
                    <p><strong>Technologies:</strong> Python, Django, D3.js, MongoDB</p>
                    <p><strong>Duration:</strong> 5 months</p>
                </div>
            </div>
            <div class="project-card">
                <div class="project-image">Mobile App</div>
                <div class="project-content">
                    <h3>Fitness Tracking App</h3>
                    <p>A cross-platform mobile application for fitness tracking with social features, workout plans, and nutrition tracking capabilities.</p>
                    <p><strong>Technologies:</strong> React Native, Node.js, Firebase</p>
                    <p><strong>Duration:</strong> 4 months</p>
                </div>
            </div>
            <div class="project-card">
                <div class="project-image">Education Platform</div>
                <div class="project-content">
                    <h3>Online Learning Platform</h3>
                    <p>A comprehensive LMS for an educational institution with video streaming, interactive quizzes, and progress tracking features.</p>
                    <p><strong>Technologies:</strong> PHP, JavaScript, MySQL, WebRTC</p>
                    <p><strong>Duration:</strong> 7 months</p>
                </div>
            </div>
            <div class="project-card">
                <div class="project-image">Logistics System</div>
                <div class="project-content">
                    <h3>Supply Chain Management</h3>
                    <p>A logistics and supply chain management system with real-time tracking, inventory optimization, and route planning capabilities.</p>
                    <p><strong>Technologies:</strong> Java, Spring Boot, Angular, Redis</p>
                    <p><strong>Duration:</strong> 9 months</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Stats Section -->
<section class="stats-section">
    <div class="container">
        <div class="section-title">
            <h2>Our Impact in Numbers</h2>
            <p>Measurable results that demonstrate our commitment to excellence</p>
        </div>
        <div class="stats-grid">
            <div class="stat-card">
                <div class="stat-icon">📈</div>
                <div class="stat-number" data-count="250">0</div>
                <div class="stat-label">Projects Delivered</div>
                <div class="stat-description">Successful implementations</div>
            </div>
            <div class="stat-card">
                <div class="stat-icon">😊</div>
                <div class="stat-number" data-count="98">0</div>
                <div class="stat-label">Client Satisfaction</div>
                <div class="stat-description">Exceeding expectations</div>
            </div>
            <div class="stat-card">
                <div class="stat-icon">🌍</div>
                <div class="stat-number" data-count="15">0</div>
                <div class="stat-label">Countries Served</div>
                <div class="stat-description">Global reach</div>
            </div>
            <div class="stat-card">
                <div class="stat-icon">🏢</div>
                <div class="stat-number" data-count="50">0</div>
                <div class="stat-label">Industries</div>
                <div class="stat-description">Diverse expertise</div>
            </div>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="contact-section">
    <div class="container">
        <div class="section-title">
            <h2>Have a Project in Mind?</h2>
            <p>Let's discuss how we can bring your ideas to life with our technology expertise.</p>
            <a href="contact.php" class="btn btn-accent" style="margin-top: 20px;">Start Your Project</a>
        </div>
    </div>
</section>

<?php include 'footer.php'; ?>