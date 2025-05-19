document.addEventListener('DOMContentLoaded', function() {
    const steps = document.querySelectorAll('.step');
    const sections = document.querySelectorAll('.form-section');
    const nextBtn = document.querySelector('.btn-next');
    const prevBtn = document.querySelector('.btn-prev');
    const submitBtn = document.querySelector('.btn-submit');
    let currentStep = 1;

    // Initialize form
    initializeForm();

    function initializeForm() {
        // Hide all sections except first one
        sections.forEach((section, index) => {
            section.style.display = index === 0 ? 'block' : 'none';
        });

        // Set first step as active
        steps[0].classList.add('active');
        
        // Initialize button states
        updateNavigationButtons(1);
    }

    function navigateToStep(stepNumber) {
        if (stepNumber < 1 || stepNumber > sections.length) return;

        // Update sections visibility
        sections.forEach((section, index) => {
            section.style.display = index === stepNumber - 1 ? 'block' : 'none';
        });

        // Update steps
        steps.forEach((step, index) => {
            if (index < stepNumber - 1) {
                step.classList.add('completed');
                step.classList.remove('active');
            } else if (index === stepNumber - 1) {
                step.classList.add('active');
                step.classList.remove('completed');
            } else {
                step.classList.remove('completed', 'active');
            }
        });

        updateNavigationButtons(stepNumber);
        currentStep = stepNumber;
    }

    // Step click handler
    steps.forEach((step, index) => {
        step.addEventListener('click', () => {
            navigateToStep(index + 1);
        });
    });

    // Next button handler
    nextBtn.addEventListener('click', () => {
        if (currentStep < sections.length) {
            navigateToStep(currentStep + 1);
        }
    });

    // Previous button handler
    prevBtn.addEventListener('click', () => {
        if (currentStep > 1) {
            navigateToStep(currentStep - 1);
        }
    });

    function updateNavigationButtons(step) {
        // Show/hide previous button
        prevBtn.style.display = step === 1 ? 'none' : 'block';
        
        // Show/hide next/submit buttons
        if (step === sections.length) {
            nextBtn.style.display = 'none';
            submitBtn.style.display = 'block';
        } else {
            nextBtn.style.display = 'block';
            submitBtn.style.display = 'none';
        }
    }
});