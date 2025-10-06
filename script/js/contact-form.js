/**
 * Contact Form Enhancement Script
 * Handles form submission, validation, and UI interactions
 */

class ContactForm {
    constructor() {
        this.form = document.getElementById('contact-form-enhanced');
        this.submitBtn = document.getElementById('submit-btn');
        this.btnText = this.submitBtn?.querySelector('.btn-text');
        this.btnLoading = this.submitBtn?.querySelector('.btn-loading');
        
        this.init();
    }
    
    init() {
        if (this.form) {
            this.bindEvents();
            this.initRealTimeValidation();
        }
    }
    
    bindEvents() {
        // Form submission
        this.form.addEventListener('submit', (e) => this.handleSubmit(e));
        
        // Input focus effects
        this.addInputFocusEffects();
        
        // Auto-format phone number
        this.initPhoneFormatting();
    }
    
    handleSubmit(e) {
        if (!this.validateForm()) {
            e.preventDefault();
            this.showValidationErrors();
            return;
        }
        
        this.showLoadingState();
    }
    
    validateForm() {
        let isValid = true;
        const requiredFields = this.form.querySelectorAll('[required]');
        
        // Clear previous error states
        this.clearErrorStates();
        
        requiredFields.forEach(field => {
            if (!field.value.trim()) {
                isValid = false;
                this.markFieldAsError(field, 'This field is required');
            }
        });
        
        // Email validation
        const emailField = this.form.querySelector('#email');
        if (emailField && emailField.value) {
            const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            if (!emailRegex.test(emailField.value)) {
                isValid = false;
                this.markFieldAsError(emailField, 'Please enter a valid email address');
            }
        }
        
        return isValid;
    }
    
    markFieldAsError(field, message) {
        field.classList.add('error');
        
        // Create or update error message
        let errorElement = field.parentNode.querySelector('.field-error');
        if (!errorElement) {
            errorElement = document.createElement('div');
            errorElement.className = 'field-error';
            field.parentNode.appendChild(errorElement);
        }
        errorElement.textContent = message;
    }
    
    clearErrorStates() {
        const errorFields = this.form.querySelectorAll('.error');
        errorFields.forEach(field => field.classList.remove('error'));
        
        const errorMessages = this.form.querySelectorAll('.field-error');
        errorMessages.forEach(msg => msg.remove());
    }
    
    showValidationErrors() {
        // Scroll to first error
        const firstError = this.form.querySelector('.error');
        if (firstError) {
            firstError.scrollIntoView({ 
                behavior: 'smooth', 
                block: 'center' 
            });
        }
    }
    
    showLoadingState() {
        if (this.btnText && this.btnLoading) {
            this.btnText.style.display = 'none';
            this.btnLoading.style.display = 'inline-block';
            this.submitBtn.disabled = true;
        }
    }
    
    addInputFocusEffects() {
        const inputs = this.form.querySelectorAll('input, textarea, select');
        
        inputs.forEach(input => {
            // Focus effect
            input.addEventListener('focus', () => {
                input.parentElement.classList.add('focused');
            });
            
            // Blur effect
            input.addEventListener('blur', () => {
                if (!input.value) {
                    input.parentElement.classList.remove('focused');
                }
            });
            
            // Check initial state
            if (input.value) {
                input.parentElement.classList.add('focused');
            }
        });
    }
    
    initRealTimeValidation() {
        const emailField = this.form.querySelector('#email');
        if (emailField) {
            emailField.addEventListener('blur', () => {
                if (emailField.value) {
                    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
                    if (!emailRegex.test(emailField.value)) {
                        this.markFieldAsError(emailField, 'Please enter a valid email address');
                    } else {
                        this.clearFieldError(emailField);
                    }
                }
            });
        }
        
        // Real-time validation for required fields
        const requiredFields = this.form.querySelectorAll('[required]');
        requiredFields.forEach(field => {
            field.addEventListener('blur', () => {
                if (!field.value.trim()) {
                    this.markFieldAsError(field, 'This field is required');
                } else {
                    this.clearFieldError(field);
                }
            });
        });
    }
    
    clearFieldError(field) {
        field.classList.remove('error');
        const errorElement = field.parentNode.querySelector('.field-error');
        if (errorElement) {
            errorElement.remove();
        }
    }
    
    initPhoneFormatting() {
        const phoneField = this.form.querySelector('#phone');
        if (phoneField) {
            phoneField.addEventListener('input', (e) => {
                let value = e.target.value.replace(/\D/g, '');
                
                // UK phone number formatting
                if (value.startsWith('0')) {
                    if (value.length >= 4 && value.length <= 6) {
                        value = value.replace(/(\d{4})/, '$1 ');
                    } else if (value.length > 6) {
                        value = value.replace(/(\d{4})(\d{3})/, '$1 $2');
                        if (value.length > 10) {
                            value = value.replace(/(\d{4})\s(\d{3})(\d{4})/, '$1 $2 $3');
                        }
                    }
                }
                
                e.target.value = value;
            });
        }
    }
}

// Initialize the contact form when DOM is loaded
document.addEventListener('DOMContentLoaded', function() {
    new ContactForm();
});