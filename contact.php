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
        $to = 'orders@privotech.co.uk';
        $subject = 'New Contact Form Submission - Privotech';
        
        // HTML email content
        $email_content = "
        <!DOCTYPE html>
        <html>
        <head>
            <style>
                body { 
                    font-family: 'Arial', sans-serif; 
                    line-height: 1.6; 
                    color: #333; 
                    background-color: #f9f9f9;
                    margin: 0;
                    padding: 0;
                }
                .container { 
                    max-width: 600px; 
                    margin: 0 auto; 
                    background: #ffffff; 
                    border-radius: 10px;
                    overflow: hidden;
                    box-shadow: 0 4px 6px rgba(0,0,0,0.1);
                }
                .header { 
                    background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
                    color: white; 
                    padding: 30px; 
                    text-align: center;
                }
                .header h1 { 
                    margin: 0; 
                    font-size: 24px;
                    font-weight: 600;
                }
                .content { 
                    padding: 30px; 
                }
                .field { 
                    margin-bottom: 15px; 
                    padding: 15px;
                    background: #f8f9fa;
                    border-radius: 8px;
                    border-left: 4px solid #667eea;
                }
                .label { 
                    font-weight: bold; 
                    color: #495057;
                    display: block;
                    margin-bottom: 5px;
                    font-size: 14px;
                }
                .value { 
                    color: #212529;
                    font-size: 16px;
                }
                .message-box {
                    background: #e9ecef;
                    padding: 20px;
                    border-radius: 8px;
                    margin-top: 10px;
                    border: 1px solid #dee2e6;
                }
                .footer { 
                    background: #f8f9fa; 
                    padding: 20px; 
                    text-align: center; 
                    color: #6c757d;
                    font-size: 14px;
                    border-top: 1px solid #dee2e6;
                }
                .highlight {
                    background: #fff3cd;
                    padding: 10px;
                    border-radius: 5px;
                    border-left: 4px solid #ffc107;
                    margin: 15px 0;
                }
            </style>
        </head>
        <body>
            <div class='container'>
                <div class='header'>
                    <h1>🎯 New Contact Form Submission</h1>
                    <p>New order request has been received!</p>
                </div>
                <div class='content'>
                    <div class='highlight'>
                        <strong>🚀 Provided client information:</strong>
                    </div>
                    
                    <div class='field'>
                        <span class='label'>👤 Full Name:</span>
                        <span class='value'>$name</span>
                    </div>
                    
                    <div class='field'>
                        <span class='label'>📧 Email Address:</span>
                        <span class='value'>$email</span>
                    </div>
                    
                    <div class='field'>
                        <span class='label'>📞 Phone Number:</span>
                        <span class='value'>" . ($phone ?: 'Not provided') . "</span>
                    </div>
                    
                    <div class='field'>
                        <span class='label'>🏢 Company:</span>
                        <span class='value'>" . ($company ?: 'Not provided') . "</span>
                    </div>
                    
                    <div class='field'>
                        <span class='label'>💼 Service Interested In:</span>
                        <span class='value'>" . ($service ?: 'Not specified') . "</span>
                    </div>
                    
                    <div class='field'>
                        <span class='label'>💰 Project Budget:</span>
                        <span class='value'>" . ($budget ?: 'Not specified') . "</span>
                    </div>
                    
                    <div class='field'>
                        <span class='label'>✉️ Message:</span>
                        <div class='message-box'>
                            " . nl2br($message) . "
                        </div>
                    </div>
                    
                    <div style='margin-top: 25px; padding: 15px; background: #d1ecf1; border-radius: 8px; border-left: 4px solid #0dcaf0;'>
                        <strong>⏰ Action Required:</strong> Please respond within 24 hours
                    </div>
                </div>
                <div class='footer'>
                    <p>This email was sent from your website contact form<br>
                    <strong>Privotech Ltd</strong> | 347 Barking Road, London E13 8EE</p>
                </div>
            </div>
        </body>
        </html>
        ";
        
        // Email headers
        $headers = "MIME-Version: 1.0" . "\r\n";
        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
        $headers .= "From: Privotech Website <noreply@privotech.co.uk>" . "\r\n";
        $headers .= "Reply-To: $email" . "\r\n";
        $headers .= "X-Mailer: PHP/" . phpversion();
        
        // Send email
        if (mail($to, $subject, $email_content, $headers)) {
            // Success message
            $success_message = '
            <div class="success-animation">
                <svg class="checkmark" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 52 52">
                    <circle class="checkmark__circle" cx="26" cy="26" r="25" fill="none"/>
                    <path class="checkmark__check" fill="none" d="M14.1 27.2l7.1 7.2 16.7-16.8"/>
                </svg>
                <h3>🎉 Message Sent Successfully!</h3>
                <p>Thank you <strong>' . htmlspecialchars($name) . '</strong> for contacting us!</p>
                <div class="success-details">
                    <p>✅ We have received your message and will get back to you within <strong>24 hours</strong></p>
                    <p>📧 A confirmation has been sent to: <strong>' . htmlspecialchars($email) . '</strong></p>
                </div>
                <div class="next-steps">
                    <h4>What happens next?</h4>
                    <ul>
                        <li>Our team will review your requirements</li>
                        <li>We\'ll contact you to discuss your project</li>
                        <li>We\'ll provide a detailed proposal</li>
                    </ul>
                </div>
            </div>
            ';
            
            // Clear form fields
            $_POST = [];
            
        } else {
            // Error message
            $error_message = '
            <div class="error-animation">
                <div class="error-icon">⚠️</div>
                <h3>😔 Message Not Sent</h3>
                <p>We encountered an issue while sending your message. Please try one of the following:</p>
                <div class="error-solutions">
                    <div class="solution-item">
                        <strong>📧 Email us directly:</strong>
                        <a href="mailto:orders@privotech.co.uk" class="solution-link">orders@privotech.co.uk</a>
                    </div>
                    <div class="solution-item">
                        <strong>📞 Call us:</strong>
                        <a href="tel:+447459086462" class="solution-link">+44 (0) 7459 086462</a>
                    </div>
                    <div class="solution-item">
                        <strong>🔄 Try again:</strong>
                        <p>Please check your internet connection and try submitting the form again</p>
                    </div>
                </div>
                <div class="error-technical">
                    <small>Technical details: Unable to send email. Please contact the website administrator.</small>
                </div>
            </div>
            ';
        }
    } else {
        $error_message = '
        <div class="validation-error">
            <div class="error-header">
                <span class="error-icon">❌</span>
                <h4>Please fix the following errors:</h4>
            </div>
            <ul class="error-list">
        ';
        
        foreach ($errors as $error) {
            $error_message .= '<li>' . htmlspecialchars($error) . '</li>';
        }
        
        $error_message .= '
            </ul>
            <p class="error-help">Please correct the highlighted fields and try again.</p>
        </div>
        ';
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
                            <p>347 Barking Road<br>E13 8EE, London, England</p>
                        </div>
                    </div>
                    
                    <div class="contact-detail-item">
                        <div class="contact-icon">✉️</div>
                        <div class="contact-detail-content">
                            <h4>Email Address</h4>
                            <p>orders@privotech.co.uk<br>We reply within 24 hours</p>
                        </div>
                    </div>
                    
                    <div class="contact-detail-item">
                        <div class="contact-icon">📞</div>
                        <div class="contact-detail-content">
                            <h4>Phone Number</h4>
                            <p>+44 (0) 7459 086462<br>WhatsApp available<br>Mon-Fri from 9am to 6pm</p>
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
                    <div class="alert-message alert-success-enhanced">
                        <?php echo $success_message; ?>
                    </div>
                <?php endif; ?>
                
                <?php if ($error_message && $_SERVER['REQUEST_METHOD'] === 'POST'): ?>
                    <div class="alert-message alert-error-enhanced">
                        <?php echo $error_message; ?>
                    </div>
                <?php endif; ?>
                
                <form action="contact.php" method="POST" id="contact-form-enhanced" novalidate>
                    <div class="form-group-enhanced">
                        <div class="form-floating">
                            <input type="text" name="name" id="name" placeholder=" " 
                                   value="<?php echo htmlspecialchars($_POST['name'] ?? ''); ?>" required
                                   class="<?php echo (isset($errors) && in_array('Name is required', $errors)) ? 'error' : ''; ?>">
                            <label for="name">Your Full Name *</label>
                        </div>
                    </div>
                    
                    <div class="form-group-enhanced">
                        <div class="form-floating">
                            <input type="email" name="email" id="email" placeholder=" "
                                   value="<?php echo htmlspecialchars($_POST['email'] ?? ''); ?>" required
                                   class="<?php echo (isset($errors) && in_array('Valid email is required', $errors)) ? 'error' : ''; ?>">
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
                                <option value="under-1k" <?php echo ($_POST['budget'] ?? '') === 'under-1k' ? 'selected' : ''; ?>>Under £1,000</option>
                                <option value="1k-5k" <?php echo ($_POST['budget'] ?? '') === '1k-5k' ? 'selected' : ''; ?>>£1,000 - £2,000</option>
                                <option value="5k-10k" <?php echo ($_POST['budget'] ?? '') === '5k-10k' ? 'selected' : ''; ?>>£2,000 - £3,000</option>
                                <option value="10k-plus" <?php echo ($_POST['budget'] ?? '') === '10k-plus' ? 'selected' : ''; ?>>£3,000+</option>
                                <option value="not-sure" <?php echo ($_POST['budget'] ?? '') === 'not-sure' ? 'selected' : ''; ?>>Not Sure Yet</option>
                            </select>
                            <label for="budget">Project Budget</label>
                        </div>
                    </div>
                    
                    <div class="form-group-enhanced">
                        <div class="form-floating">
                            <textarea name="message" id="message" placeholder=" " required
                                      class="<?php echo (isset($errors) && in_array('Message is required', $errors)) ? 'error' : ''; ?>"><?php echo htmlspecialchars($_POST['message'] ?? ''); ?></textarea>
                            <label for="message">Your Message *</label>
                        </div>
                    </div>
                    
                    <button type="submit" class="submit-btn" id="submit-btn">
                        <span class="btn-text">Send Message</span>
                        <span class="btn-loading" style="display: none;">
                            <span class="spinner"></span>
                            Sending...
                        </span>
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

<!-- Подключение CSS и JS файлов -->
<link rel="stylesheet" href="css/contact-form.css">
<script src="script/js/contact-form.js" defer></script>

<?php include 'footer.php'; ?>