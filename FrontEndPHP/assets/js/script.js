document.addEventListener('DOMContentLoaded', function() {
    const steps = document.querySelectorAll('.step');
    const sections = document.querySelectorAll('.form-section');
    const nextBtn = document.querySelector('.btn-next');
    const prevBtn = document.querySelector('.btn-prev');
    const submitBtn = document.querySelector('.btn-submit');
    let currentStep = 1;

    // Initialize form state
    updateFormState(currentStep);

    // Add click handlers to step navigation
    steps.forEach((step, index) => {
        step.addEventListener('click', () => {
            if (validateCurrentSection(currentStep)) {
                navigateToStep(index + 1);
            }
        });
    });

    // Next button handler
    nextBtn?.addEventListener('click', () => {
        if (validateCurrentSection(currentStep)) {
            navigateToStep(currentStep + 1);
        }
    });

    // Previous button handler
    prevBtn?.addEventListener('click', () => {
        navigateToStep(currentStep - 1);
    });

    function validateCurrentSection(stepNumber) {
        const currentSection = sections[stepNumber - 1];
        const requiredFields = currentSection.querySelectorAll('[required]');
        let isValid = true;

        // Only validate when moving forward
        if (stepNumber <= currentStep) {
            return true;
        }

        requiredFields.forEach(field => {
            if (!field.value.trim()) {
                field.classList.add('error');
                isValid = false;
            } else {
                field.classList.remove('error');
            }
        });

        if (!isValid) {
            alert('Please fill in all required fields before proceeding.');
        }

        return isValid;
    }

    function navigateToStep(stepNumber) {
        if (stepNumber < 1 || stepNumber > sections.length) return;

        // Only validate when moving forward
        if (stepNumber > currentStep && !validateCurrentSection(currentStep)) {
            return;
        }

        // Hide all sections
        sections.forEach(section => {
            section.classList.remove('active');
            section.style.display = 'none'; // Ensure sections are hidden
        });

        // Show target section
        sections[stepNumber - 1].classList.add('active');
        sections[stepNumber - 1].style.display = 'block'; // Explicitly show the section

        // Update steps
        steps.forEach((step, index) => {
            if (index < stepNumber - 1) {
                step.classList.add('completed');
                step.classList.add('active');
            } else if (index === stepNumber - 1) {
                step.classList.remove('completed');
                step.classList.add('active');
            } else {
                step.classList.remove('completed', 'active');
            }
        });

        // Update buttons
        updateNavigationButtons(stepNumber);
        
        currentStep = stepNumber;
    }

    // Initialize form state - Modified to handle initial load
    function initializeForm() {
        // Hide all sections except the first one
        sections.forEach((section, index) => {
            if (index === 0) {
                section.classList.add('active');
                section.style.display = 'block';
            } else {
                section.classList.remove('active');
                section.style.display = 'none';
            }
        });
        updateNavigationButtons(1);
    }

    // Call initialize on load
    initializeForm();

    // Modified step click handler to allow preview of upcoming sections
    steps.forEach((step, index) => {
        step.addEventListener('click', () => {
            const targetStep = index + 1;
            
            if (targetStep > currentStep) {
                // For future steps, show a preview message
                alert('This section will be available once you complete the previous steps.');
                return;
            }
            
            if (validateCurrentSection(currentStep)) {
                navigateToStep(targetStep);
            }
        });
    });

    function updateNavigationButtons(step) {
        if (!prevBtn || !nextBtn || !submitBtn) return; // Guard clause for null checks
        
        prevBtn.disabled = step === 1;
        prevBtn.style.display = step === 1 ? 'none' : 'block';
        
        if (step === sections.length) {
            nextBtn.style.display = 'none';
            submitBtn.style.display = 'block';
        } else {
            nextBtn.style.display = 'block';
            submitBtn.style.display = 'none';
        }
    }

    function updateFormState(step) {
        sections.forEach((section, index) => {
            if (index === step - 1) {
                section.classList.add('active');
            } else {
                section.classList.remove('active');
            }
        });
        updateNavigationButtons(step);
    }

    // Family members table functionality
    const addFamilyMemberBtn = document.getElementById('addFamilyMember');
    const familyMembersTable = document.querySelector('#familyMembersTable tbody');
    let memberCount = 0;

    addFamilyMemberBtn?.addEventListener('click', () => {
        memberCount++;
        const newRow = document.createElement('tr');
        newRow.innerHTML = `
            <td>${memberCount}</td>
            <td><input type="text" name="familyMember[${memberCount}][name]" required></td>
            <td><input type="text" name="familyMember[${memberCount}][age_relation]" required></td>
            <td><input type="text" name="familyMember[${memberCount}][education]" required></td>
            <td><input type="number" name="familyMember[${memberCount}][income]" required></td>
            <td><button type="button" class="delete-row" onclick="deleteRow(this)">Delete</button></td>
        `;
        familyMembersTable.appendChild(newRow);
    });

    // Present Family Wellbeing section
    const addWellbeingBtn = document.getElementById('addWellbeing');
    const wellbeingTable = document.querySelector('#wellbeingTable tbody');
    let wellbeingCount = 0;

    addWellbeingBtn?.addEventListener('click', () => {
        wellbeingCount++;
        const newRow = document.createElement('tr');
        newRow.innerHTML = `
            <td>${wellbeingCount}</td>
            <td><input type="text" name="wellbeing[${wellbeingCount}][category]" required></td>
            <td><input type="text" name="wellbeing[${wellbeingCount}][status]" required></td>
            <td><input type="text" name="wellbeing[${wellbeingCount}][remarks]" required></td>
            <td><button type="button" class="delete-row" onclick="deleteRow(this)">Delete</button></td>
        `;
        wellbeingTable.appendChild(newRow);
    });

    // Household Income and Expense section
    const addIncomeBtn = document.getElementById('addIncome');
    const incomeTable = document.querySelector('#incomeTable tbody');
    let incomeCount = 0;

    addIncomeBtn?.addEventListener('click', () => {
        incomeCount++;
        const newRow = document.createElement('tr');
        newRow.innerHTML = `
            <td>${incomeCount}</td>
            <td><input type="text" name="income[${incomeCount}][source]" required></td>
            <td><input type="number" name="income[${incomeCount}][amount]" required></td>
            <td><input type="text" name="income[${incomeCount}][frequency]" required></td>
            <td><button type="button" class="delete-row" onclick="deleteRow(this)">Delete</button></td>
        `;
        incomeTable.appendChild(newRow);
    });

    // Assets section
    const addAssetBtn = document.getElementById('addAsset');
    const assetsTable = document.querySelector('#assetsTable tbody');
    let assetCount = 0;

    addAssetBtn?.addEventListener('click', () => {
        assetCount++;
        const newRow = document.createElement('tr');
        newRow.innerHTML = `
            <td>${assetCount}</td>
            <td><input type="text" name="asset[${assetCount}][type]" required></td>
            <td><input type="text" name="asset[${assetCount}][description]" required></td>
            <td><input type="number" name="asset[${assetCount}][value]" required></td>
            <td><input type="text" name="asset[${assetCount}][remarks]"></td>
            <td><button type="button" class="delete-row" onclick="deleteRow(this)">Delete</button></td>
        `;
        assetsTable.appendChild(newRow);
    });

    // Liabilities section
    const addLiabilityBtn = document.getElementById('addLiability');
    const liabilitiesTable = document.querySelector('#liabilitiesTable tbody');
    let liabilityCount = 0;

    addLiabilityBtn?.addEventListener('click', () => {
        liabilityCount++;
        const newRow = document.createElement('tr');
        newRow.innerHTML = `
            <td>${liabilityCount}</td>
            <td><input type="text" name="liability[${liabilityCount}][type]" required></td>
            <td><input type="number" name="liability[${liabilityCount}][outstanding]" required></td>
            <td><input type="number" name="liability[${liabilityCount}][monthly_payment]" required></td>
            <td><input type="text" name="liability[${liabilityCount}][remarks]"></td>
            <td><button type="button" class="delete-row" onclick="deleteRow(this)">Delete</button></td>
        `;
        liabilitiesTable.appendChild(newRow);
    });

    // Delete row functionality
    function addDefaultRows() {
        // Add default row to Family Members table
        if (familyMembersTable && familyMembersTable.rows.length === 0) {
            addFamilyMemberBtn.click();
        }

        // Add default row to Income table
        if (incomeTable && incomeTable.rows.length === 0) {
            addIncomeBtn.click();
        }

        // Add default row to Assets table
        if (assetsTable && assetsTable.rows.length === 0) {
            addAssetBtn.click();
        }

        // Add default row to Liabilities table
        if (liabilitiesTable && liabilitiesTable.rows.length === 0) {
            addLiabilityBtn.click();
        }
    }

    // Call after DOM is loaded
    addDefaultRows();

    // Enhance delete row functionality
    window.deleteRow = function(button) {
        const row = button.closest('tr');
        const tbody = row.closest('tbody');
        
        // Add fade-out animation
        row.style.transition = 'opacity 0.3s ease';
        row.style.opacity = '0';
        
        setTimeout(() => {
            row.remove();
            
            // Reorder remaining rows
            const rows = tbody.querySelectorAll('tr');
            rows.forEach((row, index) => {
                row.querySelector('td:first-child').textContent = index + 1;
            });

            // If no rows left, add a default row
            if (rows.length === 0) {
                const addButton = tbody.closest('table').parentElement.querySelector('.add-btn');
                if (addButton) {
                    addButton.click();
                }
            }
        }, 300);
    };
});