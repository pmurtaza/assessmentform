document.addEventListener('DOMContentLoaded', function() {
    const sections = document.querySelectorAll('.form-section');
    const steps = document.querySelectorAll('.step');
    let currentStep = 0;

    // Show initial section
    showSection(currentStep);

    // Navigation button click handlers
    document.querySelectorAll('.btn-prev').forEach(button => {
        button.addEventListener('click', () => {
            if (currentStep > 0) {
                currentStep--;
                showSection(currentStep);
                updateSteps();
            }
        });
    });

    document.querySelectorAll('.btn-next').forEach(button => {
        button.addEventListener('click', () => {
            if (currentStep < sections.length - 1) {
                currentStep++;
                showSection(currentStep);
                updateSteps();
            }
        });
    });

    function showSection(stepIndex) {
        sections.forEach((section, index) => {
            section.classList.toggle('active', index === stepIndex);
        });
        updateSteps();
    }

    function updateSteps() {
        steps.forEach((step, index) => {
            if (index < currentStep) {
                step.classList.add('completed');
                step.classList.remove('active');
            } else if (index === currentStep) {
                step.classList.add('active');
                step.classList.remove('completed');
            } else {
                step.classList.remove('completed', 'active');
            }
        });
    }
});

// File Upload Preview
document.addEventListener('DOMContentLoaded', function() {
    const fileInputs = document.querySelectorAll('input[type="file"]');

    fileInputs.forEach(input => {
        input.addEventListener('change', function(e) {
            const files = e.target.files;
            const container = input.closest('.file-upload-container');
            const previewContainer = container.querySelector('.file-preview-container') || 
                                   createPreviewContainer(container);

            previewContainer.innerHTML = '';

            Array.from(files).forEach(file => {
                const fileName = document.createElement('div');
                fileName.className = 'file-name';
                fileName.textContent = file.name;
                previewContainer.appendChild(fileName);

                if (file.type.startsWith('image/')) {
                    const preview = document.createElement('img');
                    preview.className = 'file-preview';
                    preview.file = file;
                    previewContainer.appendChild(preview);

                    const reader = new FileReader();
                    reader.onload = (function(aImg) { 
                        return function(e) { aImg.src = e.target.result; }; 
                    })(preview);
                    reader.readAsDataURL(file);
                }
            });

            previewContainer.classList.add('active');
        });
    });

    function createPreviewContainer(container) {
        const previewContainer = document.createElement('div');
        previewContainer.className = 'file-preview-container';
        container.appendChild(previewContainer);
        return previewContainer;
    }
});

// Add Family Member functionality
document.addEventListener('DOMContentLoaded', function() {
    // Initialize Family Members Table with one row
    const familyMembersTable = document.querySelector('#familyMembersTable tbody');
    if (familyMembersTable && familyMembersTable.rows.length === 0) {
        addFamilyMemberRow(1);
    }

    // Add Family Member button click handler
    const addFamilyMemberBtn = document.querySelector('#addFamilyMember');
    if (addFamilyMemberBtn && familyMembersTable) {
        addFamilyMemberBtn.addEventListener('click', function() {
            const newRowNumber = familyMembersTable.rows.length + 1;
            addFamilyMemberRow(newRowNumber);
        });
    }

    // Function to add a new family member row
    function addFamilyMemberRow(rowNumber) {
        const newRow = document.createElement('tr');
        newRow.innerHTML = `
            <td>${rowNumber}</td>
            <td><input type="text" name="family_members[${rowNumber-1}][name]" placeholder="Name" required></td>
            <td><input type="text" name="family_members[${rowNumber-1}][age_relation]" placeholder="Age & Relation" required></td>
            <td><input type="text" name="family_members[${rowNumber-1}][education_occupation]" placeholder="Education/Occupation" required></td>
            <td><input type="number" name="family_members[${rowNumber-1}][annual_income]" placeholder="Annual Income" required></td>
            <td>
                <button type="button" class="delete-btn" onclick="deleteRow(this)">
                    <i class="fas fa-trash-alt"></i>
                </button>
            </td>
        `;
        familyMembersTable.appendChild(newRow);
    }

    // Delete row function (make it globally accessible)
    window.deleteRow = function(button) {
        const row = button.closest('tr');
        const tbody = row.closest('tbody');
        
        // Don't delete if it's the last row
        if (tbody.rows.length > 1) {
            row.remove();
            reorderRows(tbody);
        }
    }

    // Reorder row numbers
    function reorderRows(tbody) {
        const rows = tbody.getElementsByTagName('tr');
        Array.from(rows).forEach((row, index) => {
            const rowNum = index + 1;
            row.cells[0].textContent = rowNum;
            
            // Update input field names
            row.querySelectorAll('input').forEach(input => {
                const name = input.getAttribute('name');
                if (name) {
                    const newName = name.replace(/\[\d+\]/, `[${index}]`);
                    input.setAttribute('name', newName);
                }
            });
        });
    }
});