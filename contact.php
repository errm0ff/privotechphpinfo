<?php
// Contact form processing
$success_message = '';
$error_message = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Sanitize input data
    $name = filter_var($_POST['name'], FILTER_SANITIZE_STRING);
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $phone = filter_var($_POST['phone'], FILTER_SANITIZE_STRING);
    $company = filter_var($_POST['company'], FILTER_SANITIZE_STRING);
    $service = filter_var($_POST['service'], FILTER_SANITIZE_STRING);
    $budget = filter_var($_POST['budget'], FILTER_SANITIZE_STRING);
    $message = filter_var($_POST['message'], FILTER_SANITIZE_STRING);
    
    // Basic validation
    $errors = [];
    
    if (empty($name)) {
        $errors[] = 'Name is required';
    }
    
    if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = 'Valid email is required';
    }
    
    if (empty($message)) {
        $errors[] = 'Message is required';
    }
    
    if (empty($errors)) {
        // Prepare email content
        $to = 'info@privotech.com';
        $subject = 'New Contact Form Submission - Privotech';
        $email_content = "
            Name: $name\n
            Email: $email\n
            Phone: $phone\n
            Company: $company\n
            Service: $service\n
            Budget: $budget\n
            Message:\n$message
        ";
        $headers = "From: $email\r\nReply-To: $email";
        
        // In a real application, you would send the email here
        // For demo purposes, we'll just show a success message
        $success_message = 'Thank you for your message! We will get back to you within 24 hours.';
        
        // Clear form fields
        $_POST = [];
    } else {
        $error_message = 'Please fix the following errors: ' . implode(', ', $errors);
    }
}

$page_title = "Contact Us - Privotech";
$page_description = "Get in touch with Privotech for web design, development, SEO, and other technology services. We're here to help your business grow.";
include 'header.php';
?>

<!-- Contact Hero -->
<section class="contact-hero">
    <div class="container">
        <h1>Let's Start Your Project</h1>
        <p>Ready to transform your business? Get in touch with our team and let's discuss how we can help you achieve your goals.</p>
    </div>
</section>

<!-- Contact Main Section -->
<section class="contact-main">
    <div class="container">
        <div class="contact-container-enhanced">
            <!-- Contact Information -->
            <div class="contact-info-enhanced">
                <h3>Get In Touch</h3>
                
                <div class="contact-details-enhanced">
                    <div class="contact-detail-item">
                        <div class="contact-icon">📍</div>
                        <div class="contact-detail-content">
                            <h4>Our Office</h4>
                            <p>123 Tech Street<br>Innovation City, IC 10001</p>
                        </div>
                    </div>
                    
                    <div class="contact-detail-item">
                        <div class="contact-icon">📞</div>
                        <div class="contact-detail-content">
                            <h4>Phone Number</h4>
                            <p>+1 (555) 123-4567<br>Mon-Fri from 9am to 6pm</p>
                        </div>
                    </div>
                    
                    <div class="contact-detail-item">
                        <div class="contact-icon">✉️</div>
                        <div class="contact-detail-content">
                            <h4>Email Address</h4>
                            <p>info@privotech.com<br>We reply within 24 hours</p>
                        </div>
                    </div>
                </div>

                <!-- Office Hours -->
                <div class="office-hours">
                    <h4>Office Hours</h4>
                    <ul class="hours-list">
                        <li>
                            <span class="day">Monday - Friday</span>
                            <span>9:00 AM - 6:00 PM</span>
                        </li>
                        <li>
                            <span class="day">Saturday</span>
                            <span>10:00 AM - 2:00 PM</span>
                        </li>
                        <li>
                            <span class="day">Sunday</span>
                            <span>Closed</span>
                        </li>
                    </ul>
                </div>

                <!-- Social Links -->
                <div class="social-links-enhanced">
                    <a href="#" class="social-link" aria-label="Facebook">f</a>
                    <a href="#" class="social-link" aria-label="Twitter">t</a>
                    <a href="#" class="social-link" aria-label="LinkedIn">in</a>
                    <a href="#" class="social-link" aria-label="Instagram">ig</a>
                </div>
            </div>

            <!-- Contact Form -->
            <div class="contact-form-enhanced">
                <h3>Send Us a Message</h3>
                
                <?php if ($success_message): ?>
                    <div class="alert-message alert-success">
                        <span>✅</span>
                        <?php echo $success_message; ?>
                    </div>
                <?php endif; ?>
                
                <?php if ($error_message): ?>
                    <div class="alert-message alert-error">
                        <span>❌</span>
                        <?php echo $error_message; ?>
                    </div>
                <?php endif; ?>
                
                <form action="contact.php" method="POST" id="contact-form-enhanced">
                    <div class="form-group-enhanced">
                        <div class="form-floating">
                            <input type="text" name="name" id="name" placeholder=" " 
                                   value="<?php echo htmlspecialchars($_POST['name'] ?? ''); ?>" required>
                            <label for="name">Your Full Name *</label>
                        </div>
                    </div>
                    
                    <div class="form-group-enhanced">
                        <div class="form-floating">
                            <input type="email" name="email" id="email" placeholder=" "
                                   value="<?php echo htmlspecialchars($_POST['email'] ?? ''); ?>" required>
                            <label for="email">Your Email Address *</label>
                        </div>
                    </div>
                    
                    <div class="form-group-enhanced">
                        <div class="form-floating">
                            <input type="tel" name="phone" id="phone" placeholder=" "
                                   value="<?php echo htmlspecialchars($_POST['phone'] ?? ''); ?>">
                            <label for="phone">Phone Number</label>
                        </div>
                    </div>
                    
                    <div class="form-group-enhanced">
                        <div class="form-floating">
                            <input type="text" name="company" id="company" placeholder=" "
                                   value="<?php echo htmlspecialchars($_POST['company'] ?? ''); ?>">
                            <label for="company">Company Name</label>
                        </div>
                    </div>
                    
                    <div class="form-group-enhanced">
                        <div class="form-floating">
                            <select name="service" id="service">
                                <option value=""> </option>
                                <option value="web-design" <?php echo ($_POST['service'] ?? '') === 'web-design' ? 'selected' : ''; ?>>Web Design</option>
                                <option value="ecommerce" <?php echo ($_POST['service'] ?? '') === 'ecommerce' ? 'selected' : ''; ?>>E-commerce Design</option>
                                <option value="seo" <?php echo ($_POST['service'] ?? '') === 'seo' ? 'selected' : ''; ?>>SEO Services</option>
                                <option value="logo-design" <?php echo ($_POST['service'] ?? '') === 'logo-design' ? 'selected' : ''; ?>>Logo Design</option>
                                <option value="cms" <?php echo ($_POST['service'] ?? '') === 'cms' ? 'selected' : ''; ?>>CMS Development</option>
                                <option value="consulting" <?php echo ($_POST['service'] ?? '') === 'consulting' ? 'selected' : ''; ?>>IT Consulting</option>
                                <option value="other" <?php echo ($_POST['service'] ?? '') === 'other' ? 'selected' : ''; ?>>Other</option>
                            </select>
                            <label for="service">Service Interested In</label>
                        </div>
                    </div>
                    
                    <div class="form-group-enhanced">
                        <div class="form-floating">
                            <select name="budget" id="budget">
                                <option value=""> </option>
                                <option value="under-1k" <?php echo ($_POST['budget'] ?? '') === 'under-1k' ? 'selected' : ''; ?>>Under $1,000</option>
                                <option value="1k-5k" <?php echo ($_POST['budget'] ?? '') === '1k-5k' ? 'selected' : ''; ?>>$1,000 - $5,000</option>
                                <option value="5k-10k" <?php echo ($_POST['budget'] ?? '') === '5k-10k' ? 'selected' : ''; ?>>$5,000 - $10,000</option>
                                <option value="10k-plus" <?php echo ($_POST['budget'] ?? '') === '10k-plus' ? 'selected' : ''; ?>>$10,000+</option>
                                <option value="not-sure" <?php echo ($_POST['budget'] ?? '') === 'not-sure' ? 'selected' : ''; ?>>Not Sure Yet</option>
                            </select>
                            <label for="budget">Project Budget</label>
                        </div>
                    </div>
                    
                    <div class="form-group-enhanced">
                        <div class="form-floating">
                            <textarea name="message" id="message" placeholder=" " required><?php echo htmlspecialchars($_POST['message'] ?? ''); ?></textarea>
                            <label for="message">Your Message *</label>
                        </div>
                    </div>
                    
                    <button type="submit" class="submit-btn" id="submit-btn">
                        Send Message
                    </button>
                </form>
            </div>
        </div>
    </div>
</section>

<!-- Contact Features -->
<section class="contact-features">
    <div class="container">
        <div class="section-title">
            <h2>Why Choose Privotech?</h2>
            <p>We're committed to delivering exceptional results and outstanding customer service</p>
        </div>
        <div class="features-grid-contact">
            <div class="contact-feature">
                <span class="contact-feature-icon">🚀</span>
                <h4>Fast Response</h4>
                <p>We respond to all inquiries within 24 hours and provide quick project turnaround times.</p>
            </div>
            <div class="contact-feature">
                <span class="contact-feature-icon">💼</span>
                <h4>Expert Team</h4>
                <p>Work with experienced professionals who understand your industry and business needs.</p>
            </div>
            <div class="contact-feature">
                <span class="contact-feature-icon">🔒</span>
                <h4>Secure & Reliable</h4>
                <p>Your information is safe with us. We maintain the highest standards of data security.</p>
            </div>
        </div>
    </div>
</section>

<!-- Map Section -->
<section class="map-section">
    <div class="container">
        <div class="section-title">
            <h2>Find Our Office</h2>
            <p>Visit us or reach out digitally - we're here to help you succeed</p>
        </div>
        <div class="map-container">
            Interactive Map - 123 Tech Street, Innovation City
            <div class="map-overlay">
                <div class="map-address">
                    📍 123 Tech Street, Innovation City, IC 10001
                </div>
                <div class="map-actions">
                    <a href="#" class="btn btn-sm">Get Directions</a>
                    <a href="#" class="btn btn-sm btn-outline">View Street View</a>
                </div>
            </div>
        </div>
    </div>
</section>

<?php include 'footer.php'; ?>