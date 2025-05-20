document.addEventListener('DOMContentLoaded', function() {
    // Get all required elements
    const steps = document.querySelectorAll('.step');
    const sections = document.querySelectorAll('.form-section');
    let currentStep = 0;

    console.log('Steps found:', steps.length);
    console.log('Sections found:', sections.length);

    // Create navigation buttons
    const navDiv = document.createElement('div');
    navDiv.className = 'form-navigation';
    
    const prevBtn = document.createElement('button');
    prevBtn.type = 'button';
    prevBtn.className = 'btn-prev';
    prevBtn.textContent = 'Previous';
    
    const nextBtn = document.createElement('button');
    nextBtn.type = 'button';
    nextBtn.className = 'btn-next';
    nextBtn.textContent = 'Next';
    
    const submitBtn = document.createElement('button');
    submitBtn.type = 'submit';
    submitBtn.className = 'btn-submit';
    submitBtn.textContent = 'Submit';

    navDiv.appendChild(prevBtn);
    navDiv.appendChild(nextBtn);
    navDiv.appendChild(submitBtn);
    document.querySelector('form').appendChild(navDiv);

    // Function to show specific step
    function showStep(stepIndex) {
        // Validate step index
        if (stepIndex < 0 || stepIndex >= sections.length) {
            return;
        }

        sections.forEach((section, index) => {
            section.style.display = index === stepIndex ? 'block' : 'none';
        });

        steps.forEach((step, index) => {
            if (index < stepIndex) {
                step.classList.add('completed');
                step.classList.remove('active');
            } else if (index === stepIndex) {
                step.classList.add('active');
                step.classList.remove('completed');
            } else {
                step.classList.remove('completed', 'active');
            }
        });

        // Update button visibility
        prevBtn.style.display = stepIndex === 0 ? 'none' : 'block';
        nextBtn.style.display = stepIndex === sections.length - 1 ? 'none' : 'block';
        submitBtn.style.display = stepIndex === sections.length - 1 ? 'block' : 'none';

        // Scroll to top of the form
        document.querySelector('form').scrollIntoView({ behavior: 'smooth' });
    }

    // Add click handlers for navigation
    nextBtn.addEventListener('click', () => {
        console.log('Next button clicked, current step:', currentStep);
        if (currentStep < sections.length - 1) {
            currentStep++;
            showStep(currentStep);
            console.log('Moved to step:', currentStep);
        }
    });

    prevBtn.addEventListener('click', () => {
        if (currentStep > 0) {
            currentStep--;
            showStep(currentStep);
        }
    });

    // Add click handlers for step indicators
    steps.forEach((step, index) => {
        step.addEventListener('click', () => {
            // Only allow clicking on completed steps or the next available step
            if (index <= currentStep + 1) {
                currentStep = index;
                showStep(currentStep);
            }
        });

        // Add hover effect to show step is clickable
        step.style.cursor = 'pointer';
    });

    // Initialize first step
    showStep(0);
});