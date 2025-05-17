document.addEventListener('DOMContentLoaded', function() {
    const slidePage = document.querySelector(".slide-page");
    const nextBtns = document.querySelectorAll(".next");
    const prevBtns = document.querySelectorAll(".prev");
    const formSteps = document.querySelectorAll(".step");
    const bullets = document.querySelectorAll(".bullet");
    const progressText = document.querySelectorAll(".step p");
    let max = 6;
    let current = 1;

    // Next button event
    nextBtns.forEach(button => {
        button.addEventListener("click", function(e) {
            e.preventDefault();
            slidePage.style.marginLeft = `-${(current) * 100}%`;
            bullets[current - 1].classList.add("active");
            progressText[current - 1].classList.add("active");
            current += 1;
        });
    });

    // Previous button event
    prevBtns.forEach(button => {
        button.addEventListener("click", function(e) {
            e.preventDefault();
            slidePage.style.marginLeft = `-${(current - 2) * 100}%`;
            bullets[current - 2].classList.remove("active");
            progressText[current - 2].classList.remove("active");
            current -= 1;
        });
    });

    // Family members table functionality
    const addFamilyMemberBtn = document.getElementById('addFamilyMember');
    const familyMembersTable = document.querySelector('#familyMembersTable tbody');
    let memberCount = 0;

    addFamilyMemberBtn.addEventListener('click', () => {
        memberCount++;
        const newRow = document.createElement('tr');
        newRow.innerHTML = `
            <td>${memberCount}</td>
            <td><input type="text" name="familyMember[${memberCount}][name]" required></td>
            <td><input type="text" name="familyMember[${memberCount}][age_relation]" required></td>
            <td><input type="text" name="familyMember[${memberCount}][education]" required></td>
            <td><input type="number" name="familyMember[${memberCount}][income]" required></td>
        `;
        familyMembersTable.appendChild(newRow);
    });
});