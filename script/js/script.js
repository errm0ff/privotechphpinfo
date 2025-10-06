// Main JavaScript for Privotech Website
document.addEventListener('DOMContentLoaded', function() {
    // Mobile Menu Toggle
    const mobileMenuBtn = document.querySelector('.mobile-menu-btn');
    const navMenu = document.querySelector('.nav-menu');
    
    if (mobileMenuBtn && navMenu) {
        mobileMenuBtn.addEventListener('click', function() {
            navMenu.classList.toggle('active');
            this.textContent = navMenu.classList.contains('active') ? '✕' : '☰';
        });
    }

    // Close mobile menu when clicking on a link
    document.querySelectorAll('.nav-menu a').forEach(link => {
        link.addEventListener('click', () => {
            navMenu.classList.remove('active');
            if (mobileMenuBtn) {
                mobileMenuBtn.textContent = '☰';
            }
        });
    });

    // Smooth scrolling for anchor links
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function(e) {
            e.preventDefault();
            
            const targetId = this.getAttribute('href');
            if (targetId === '#') return;
            
            const targetElement = document.querySelector(targetId);
            if (targetElement) {
                const headerHeight = document.querySelector('header').offsetHeight;
                const targetPosition = targetElement.offsetTop - headerHeight - 20;
                
                window.scrollTo({
                    top: targetPosition,
                    behavior: 'smooth'
                });
            }
        });
    });

    // Header scroll effect
    window.addEventListener('scroll', function() {
        const header = document.querySelector('header');
        if (window.scrollY > 100) {
            header.classList.add('header-scrolled');
        } else {
            header.classList.remove('header-scrolled');
        }
    });

    // Contact form handling
    const contactForm = document.getElementById('contact-form');
    if (contactForm) {
        contactForm.addEventListener('submit', function(e) {
            // Basic client-side validation
            const requiredFields = this.querySelectorAll('[required]');
            let isValid = true;
            
            requiredFields.forEach(field => {
                if (!field.value.trim()) {
                    isValid = false;
                    field.style.borderColor = 'var(--accent)';
                } else {
                    field.style.borderColor = '#ddd';
                }
            });
            
            if (!isValid) {
                e.preventDefault();
                alert('Please fill in all required fields.');
            }
        });
    }

    // Blog search functionality
    const blogSearch = document.getElementById('blog-search');
    if (blogSearch) {
        blogSearch.addEventListener('input', function(e) {
            const searchTerm = e.target.value.toLowerCase();
            const blogCards = document.querySelectorAll('.blog-card');
            
            blogCards.forEach(card => {
                const title = card.querySelector('h3').textContent.toLowerCase();
                const excerpt = card.querySelector('p').textContent.toLowerCase();
                
                if (title.includes(searchTerm) || excerpt.includes(searchTerm)) {
                    card.style.display = 'block';
                } else {
                    card.style.display = 'none';
                }
            });
        });
    }

    // Blog category filter
    const categoryFilters = document.querySelectorAll('.category-filter');
    if (categoryFilters.length > 0) {
        categoryFilters.forEach(filter => {
            filter.addEventListener('click', function(e) {
                e.preventDefault();
                const category = this.getAttribute('data-category');
                
                // Update active state
                categoryFilters.forEach(f => f.classList.remove('active'));
                this.classList.add('active');
                
                // Filter blog posts
                const blogCards = document.querySelectorAll('.blog-card');
                blogCards.forEach(card => {
                    const cardCategory = card.querySelector('.blog-category').textContent.toLowerCase();
                    
                    if (category === 'all' || cardCategory === category) {
                        card.style.display = 'block';
                    } else {
                        card.style.display = 'none';
                    }
                });
            });
        });
    }

    // Package selection
    const packageButtons = document.querySelectorAll('.package-select');
    packageButtons.forEach(button => {
        button.addEventListener('click', function() {
            const packageType = this.getAttribute('data-package');
            localStorage.setItem('selectedPackage', packageType);
        });
    });

    // Pre-fill package in contact form if coming from package page
    const urlParams = new URLSearchParams(window.location.search);
    const packageParam = urlParams.get('package');
    if (packageParam && contactForm) {
        const serviceSelect = contactForm.querySelector('select[name="service"]');
        if (serviceSelect) {
            serviceSelect.value = packageParam;
        }
    }

    // Lazy loading for images
    if ('IntersectionObserver' in window) {
        const imageObserver = new IntersectionObserver((entries, observer) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    const img = entry.target;
                    img.src = img.dataset.src;
                    img.classList.remove('lazy');
                    imageObserver.unobserve(img);
                }
            });
        });

        document.querySelectorAll('img[data-src]').forEach(img => {
            imageObserver.observe(img);
        });
    }

    // Animation on scroll
    function animateOnScroll() {
        const elements = document.querySelectorAll('.service-card, .pricing-card, .blog-card');
        
        elements.forEach(element => {
            const elementTop = element.getBoundingClientRect().top;
            const windowHeight = window.innerHeight;
            
            if (elementTop < windowHeight - 100) {
                element.style.opacity = '1';
                element.style.transform = 'translateY(0)';
            }
        });
    }

    // Initialize elements for animation
    document.querySelectorAll('.service-card, .pricing-card, .blog-card').forEach(element => {
        element.style.opacity = '0';
        element.style.transform = 'translateY(30px)';
        element.style.transition = 'opacity 0.6s ease, transform 0.6s ease';
    });

    window.addEventListener('scroll', animateOnScroll);
    animateOnScroll(); // Initial check

    // Current year for copyright
    const yearElement = document.querySelector('.copyright p');
    if (yearElement) {
        const currentYear = new Date().getFullYear();
        yearElement.innerHTML = yearElement.innerHTML.replace('2023', currentYear);
    }

    // Service worker registration for PWA (optional)
    if ('serviceWorker' in navigator) {
        window.addEventListener('load', function() {
            navigator.serviceWorker.register('/sw.js')
                .then(function(registration) {
                    console.log('ServiceWorker registration successful');
                })
                .catch(function(error) {
                    console.log('ServiceWorker registration failed: ', error);
                });
        });
    }
});

// Utility functions
const Privotech = {
    // Debounce function for performance
    debounce: function(func, wait) {
        let timeout;
        return function executedFunction(...args) {
            const later = () => {
                clearTimeout(timeout);
                func(...args);
            };
            clearTimeout(timeout);
            timeout = setTimeout(later, wait);
        };
    },

    // Format phone number
    formatPhone: function(phone) {
        return phone.replace(/(\d{3})(\d{3})(\d{4})/, '($1) $2-$3');
    },

    // Validate email
    validateEmail: function(email) {
        const re = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        return re.test(email);
    }
};
// Animated counter for stats
function animateCounter() {
    const counters = document.querySelectorAll('.stat-number');
    const speed = 200; // The lower the slower
    
    counters.forEach(counter => {
        const target = +counter.getAttribute('data-count');
        const count = +counter.innerText;
        
        if (count < target) {
            counter.innerText = Math.ceil(count + (target / speed));
            setTimeout(() => animateCounter(), 1);
        } else {
            counter.innerText = target;
            counter.classList.add('animated');
        }
    });
}

// Intersection Observer for counter animation
function initCounterAnimation() {
    const statsSection = document.querySelector('.stats-section, .projects-section');
    
    if (statsSection) {
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    animateCounter();
                    observer.unobserve(entry.target);
                }
            });
        }, { threshold: 0.5 });
        
        observer.observe(statsSection);
    }
}

// Initialize when DOM is loaded
document.addEventListener('DOMContentLoaded', function() {
    // ... existing code ...
    
    // Initialize counter animation
    initCounterAnimation();
    
    // ... rest of existing code ...
});
// Project filtering functionality
function initProjectFilter() {
    const categoryFilters = document.querySelectorAll('.category-filter');
    const projectCards = document.querySelectorAll('.project-card');
    
    if (categoryFilters.length > 0 && projectCards.length > 0) {
        categoryFilters.forEach(filter => {
            filter.addEventListener('click', function() {
                // Update active state
                categoryFilters.forEach(f => f.classList.remove('active'));
                this.classList.add('active');
                
                const category = this.getAttribute('data-category');
                
                // Filter projects
                projectCards.forEach(card => {
                    const cardCategories = card.getAttribute('data-category').split(' ');
                    
                    if (category === 'all' || cardCategories.includes(category)) {
                        card.style.display = 'block';
                        setTimeout(() => {
                            card.style.opacity = '1';
                            card.style.transform = 'translateY(0)';
                        }, 50);
                    } else {
                        card.style.opacity = '0';
                        card.style.transform = 'translateY(20px)';
                        setTimeout(() => {
                            card.style.display = 'none';
                        }, 300);
                    }
                });
            });
        });
    }
}

// Initialize when DOM is loaded
document.addEventListener('DOMContentLoaded', function() {
    // ... existing code ...
    
    // Initialize project filtering
    initProjectFilter();
    
    // ... rest of existing code ...
});
// Improved animated counter for stats
function animateCounter() {
    const counters = document.querySelectorAll('.seo-metric-number, .stat-number');
    const speed = 200; // The lower the slower
    
    counters.forEach(counter => {
        const target = +counter.getAttribute('data-count');
        const count = +counter.innerText;
        
        if (count < target) {
            const increment = Math.ceil(target / speed);
            const newCount = count + increment > target ? target : count + increment;
            counter.innerText = newCount;
            setTimeout(() => animateCounter(), 10);
        } else {
            counter.innerText = target;
            counter.classList.add('animated');
        }
    });
}

// Intersection Observer for counter animation
function initCounterAnimation() {
    const statsSections = document.querySelectorAll('.seo-results-section, .stats-section');
    
    if (statsSections.length > 0) {
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    animateCounter();
                    observer.unobserve(entry.target);
                }
            });
        }, { 
            threshold: 0.5,
            rootMargin: '0px 0px -100px 0px'
        });
        
        statsSections.forEach(section => {
            observer.observe(section);
        });
    }
}

// Initialize when DOM is loaded
document.addEventListener('DOMContentLoaded', function() {
    // ... existing code ...
    
    // Initialize counter animation
    initCounterAnimation();
    
    // ... rest of existing code ...
});
// Enhanced contact form functionality
function initContactForm() {
    const contactForm = document.getElementById('contact-form-enhanced');
    const submitBtn = document.getElementById('submit-btn');
    
    if (contactForm && submitBtn) {
        // Floating labels functionality
        const floatingInputs = contactForm.querySelectorAll('.form-floating input, .form-floating select, .form-floating textarea');
        
        floatingInputs.forEach(input => {
            // Check initial state
            if (input.value) {
                input.previousElementSibling.classList.add('floating');
            }
            
            input.addEventListener('focus', function() {
                this.previousElementSibling.classList.add('floating');
            });
            
            input.addEventListener('blur', function() {
                if (!this.value) {
                    this.previousElementSibling.classList.remove('floating');
                }
            });
        });
        
        // Form submission with loading state
        contactForm.addEventListener('submit', function(e) {
            const requiredFields = this.querySelectorAll('[required]');
            let isValid = true;
            
            // Enhanced validation
            requiredFields.forEach(field => {
                if (!field.value.trim()) {
                    isValid = false;
                    field.style.borderColor = 'var(--accent)';
                    field.parentElement.classList.add('error');
                } else {
                    field.style.borderColor = '';
                    field.parentElement.classList.remove('error');
                }
            });
            
            // Email validation
            const emailField = this.querySelector('input[type="email"]');
            if (emailField && emailField.value) {
                const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
                if (!emailRegex.test(emailField.value)) {
                    isValid = false;
                    emailField.style.borderColor = 'var(--accent)';
                    emailField.parentElement.classList.add('error');
                }
            }
            
            if (!isValid) {
                e.preventDefault();
                // Add shake animation to submit button
                submitBtn.style.animation = 'shake 0.5s ease-in-out';
                setTimeout(() => {
                    submitBtn.style.animation = '';
                }, 500);
            } else {
                // Show loading state
                submitBtn.classList.add('loading');
                submitBtn.innerHTML = 'Sending...';
            }
        });
        
        // Real-time validation
        contactForm.addEventListener('input', function(e) {
            const target = e.target;
            if (target.hasAttribute('required') && target.value.trim()) {
                target.style.borderColor = '';
                target.parentElement.classList.remove('error');
            }
        });
    }
}

// Add shake animation to CSS
const style = document.createElement('style');
style.textContent = `
    @keyframes shake {
        0%, 100% { transform: translateX(0); }
        25% { transform: translateX(-5px); }
        75% { transform: translateX(5px); }
    }
    
    .form-floating.error label {
        color: var(--accent) !important;
    }
`;
document.head.appendChild(style);

// Initialize when DOM is loaded
document.addEventListener('DOMContentLoaded', function() {
    // ... existing code ...
    
    // Initialize enhanced contact form
    initContactForm();
    
    // ... rest of existing code ...
});