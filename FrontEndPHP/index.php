<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Application and Assessment Form</title>
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&display=swap" rel="stylesheet">
</head>
<body>
    <div class="container">
        <div class="project-header">
            <h1>Application and Assessment Form</h1>
            <p>Empowering Mumineen Entrepreneurs Across India</p>
        </div>
        <div class="progress-container">
            <ul class="progress-steps">
                <li class="step active" data-step="1">
                    <div class="step-circle">
                        <i class="fas fa-user"></i>
                    </div>
                    <div class="step-text">Applicant's Details</div>
                </li>
                <li class="step" data-step="2">
                    <div class="step-circle">
                        <i class="fas fa-users"></i>
                    </div>
                    <div class="step-text">Family Detail</div>
                </li>
                <li class="step" data-step="3">
                    <div class="step-circle">
                        <i class="fas fa-comments"></i>
                    </div>
                    <div class="step-text">Counsellor's Assessment</div>
                </li>
                <li class="step" data-step="4">
                    <div class="step-circle">
                        <i class="fas fa-chart-line"></i>
                    </div>
                    <div class="step-text">Economic Upliftment</div>
                </li>
                <li class="step" data-step="5">
                    <div class="step-circle">
                        <i class="fas fa-check-circle"></i>
                    </div>
                    <div class="step-text">Outcome</div>
                </li>
                <li class="step" data-step="6">
                    <div class="step-circle">
                        <i class="fas fa-paperclip"></i>
                    </div>
                    <div class="step-text">Attachments</div>
                </li>
            </ul>
        </div>

        <form id="applicationForm" method="POST" action="process.php" enctype="multipart/form-data">
            <div class="form-sections">
                <!-- Applicant's Details Section -->
                <section class="form-section active" id="section1">
                    <h2>Applicant's Details</h2>
                    <div class="form-grid">
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" name="name" required>
                        </div>
                        <div class="form-group">
                            <label>ITS</label>
                            <input type="text" name="its" required>
                        </div>
                        <div class="form-group">
                            <label>Age</label>
                            <input type="number" name="age" required>
                        </div>
                        <div class="form-group">
                            <label>Contact Number</label>
                            <input type="tel" name="contact" required>
                        </div>
                        <div class="form-group">
                            <label>Email ID</label>
                            <input type="email" name="email" required>
                        </div>
                        <div class="form-group full-width">
                            <label>Full Residential Address</label>
                            <textarea name="address" required></textarea>
                        </div>
                        <div class="form-group full-width">
                            <label>Present Occupation and Address of Place of Work</label>
                            <textarea name="occupation" required></textarea>
                        </div>
                    </div>
                </section>

                <!-- Family Detail Section -->
                <section class="form-section" id="section2">
                    <h2>Family Details</h2>
                    <div class="subsection">
                        <h3>2.1 Family Members</h3>
                        <button type="button" class="add-btn" id="addFamilyMember">Add Family Member</button>
                        <div class="table-responsive">
                            <table id="familyMembersTable">
                                <thead>
                                    <tr>
                                        <th>Sr No</th>
                                        <th>Name</th>
                                        <th>Age & Relation</th>
                                        <th>Education/Occupation</th>
                                        <th>Annual Income</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody></tbody>
                            </table>
                        </div>
                    </div>

                    <div class="subsection">
                        <h3>2.2 Present Family Wellbeing</h3>
                        <div class="wellbeing-form form-grid">
                            <div class="form-group">
                                <label>Food</label>
                                <input type="text" name="wellbeing[food][status]" required placeholder="Present Standard">
                            </div>
                            <div class="form-group">
                                <label>Housing</label>
                                <input type="text" name="wellbeing[housing][status]" required placeholder="Present Standard">
                            </div>
                            <div class="form-group">
                                <label>Education</label>
                                <input type="text" name="wellbeing[education][status]" required placeholder="Present Standard">
                            </div>
                            <div class="form-group">
                                <label>Health</label>
                                <input type="text" name="wellbeing[health][status]" required placeholder="Present Standard">
                            </div>
                            <div class="form-group">
                                <label>Deeni</label>
                                <input type="text" name="wellbeing[deeni][status]" required placeholder="Present Standard">
                            </div>
                            <div class="form-group full-width">
                                <small><em>Support may be arranged locally to improve present standard as applicable.</em></small>
                            </div>
                        </div>
                    </div>

                    <div class="subsection">
                        <h3>2.3 Present Household Income and Expense</h3>
                        <div class="table-responsive">
                            <table class="income-expense-table">
                                <thead>
                                    <tr>
                                        <th>Sr No</th>
                                        <th>Category and Subcategory</th>
                                        <th>Monthly</th>
                                        <th>Yearly</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <!-- INCOME Section -->
                                    <tr class="section-header">
                                        <td>1</td>
                                        <td colspan="3">INCOME</td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td>a) Business</td>
                                        <td><input type="number" name="income[business][monthly]"></td>
                                        <td><input type="number" name="income[business][yearly]"></td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td>b) Salary</td>
                                        <td><input type="number" name="income[salary][monthly]"></td>
                                        <td><input type="number" name="income[salary][yearly]"></td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td>c) Home Industry</td>
                                        <td><input type="number" name="income[home_industry][monthly]"></td>
                                        <td><input type="number" name="income[home_industry][yearly]"></td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td>d) Others <input type="text" class="inline-input" name="income[others][description]" placeholder="________________"></td>
                                        <td><input type="number" name="income[others][monthly]"></td>
                                        <td><input type="number" name="income[others][yearly]"></td>
                                    </tr>
                                    <tr class="total-row">
                                        <td></td>
                                        <td>TOTAL FAMILY INCOME (1)</td>
                                        <td><input type="number" name="income_total_monthly" readonly></td>
                                        <td><input type="number" name="income_total_yearly" readonly></td>
                                    </tr>

                                    <!-- EXPENSES Section -->
                                    <tr class="section-header">
                                        <td>2</td>
                                        <td colspan="3">EXPENSES</td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td>a) Food: Groceries & Others</td>
                                        <td><input type="number" name="expenses[food][monthly]"></td>
                                        <td><input type="number" name="expenses[food][yearly]"></td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td>b) Housing: Rent, Maintenance, Electricity etc.</td>
                                        <td><input type="number" name="expenses[housing][monthly]"></td>
                                        <td><input type="number" name="expenses[housing][yearly]"></td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td>c) Health: Doctor, Medicine</td>
                                        <td><input type="number" name="expenses[health][monthly]"></td>
                                        <td><input type="number" name="expenses[health][yearly]"></td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td>d) Education: Fees, Books, Tuitions, etc.</td>
                                        <td><input type="number" name="expenses[education][monthly]"></td>
                                        <td><input type="number" name="expenses[education][yearly]"></td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td>e) Deeni: Sabeel, Wajebaat etc.</td>
                                        <td><input type="number" name="expenses[deeni][monthly]"></td>
                                        <td><input type="number" name="expenses[deeni][yearly]"></td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td>f) Others Essential: Clothes, Personal Care, Local transport, Misc. etc.</td>
                                        <td><input type="number" name="expenses[others_essential][monthly]"></td>
                                        <td><input type="number" name="expenses[others_essential][yearly]"></td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td>g) Others <input type="text" class="inline-input" name="expenses[others][description]" placeholder="________________"></td>
                                        <td><input type="number" name="expenses[others][monthly]"></td>
                                        <td><input type="number" name="expenses[others][yearly]"></td>
                                    </tr>
                                    <tr class="total-row">
                                        <td></td>
                                        <td>TOTAL FAMILY EXPENSES (2)</td>
                                        <td><input type="number" name="expenses_total_monthly" readonly></td>
                                        <td><input type="number" name="expenses_total_yearly" readonly></td>
                                    </tr>

                                    <!-- SURPLUS/DEFICIT Section -->
                                    <tr class="section-header">
                                        <td>3</td>
                                        <td colspan="3">SURPLUS/DEFICIT [(1)- (2)]</td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td>Scholarship/Enayat/Muwasaat/etc.</td>
                                        <td><input type="number" name="scholarship_monthly"></td>
                                        <td><input type="number" name="scholarship_yearly"></td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td>Borrowing/Qardan etc.</td>
                                        <td><input type="number" name="borrowing_monthly"></td>
                                        <td><input type="number" name="borrowing_yearly"></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div class="subsection">
                        <h3>2.4 Present Assets and Liability</h3>
                        <div class="assets-liability-form">
                            <h4>ASSETS</h4>
                            <div class="form-grid">
                                <div class="form-group">
                                    <label>Own House</label>
                                    <input type="text" name="assets[own_house][description]" placeholder="Description">
                                </div>
                                <div class="form-group">
                                    <label>Shop/Godown/Land</label>
                                    <input type="text" name="assets[shop_land][description]" placeholder="Description">
                                </div>
                                <div class="form-group">
                                    <label>Equipment/Machinery/Vehicle</label>
                                    <input type="text" name="assets[equipment][description]" placeholder="Description">
                                </div>
                                <div class="form-group">
                                    <label>Stock/Raw material</label>
                                    <input type="text" name="assets[stock][description]" placeholder="Description">
                                </div>
                                <div class="form-group">
                                    <label>Others</label>
                                    <input type="text" name="assets[others][description]" placeholder="Description">
                                </div>
                            </div>

                            <h4>LIABILITY</h4>
                            <div class="form-grid">
                                <div class="form-group">
                                    <label>Qardan</label>
                                    <input type="text" name="liability[qardan][description]" placeholder="Description">
                                </div>
                                <div class="form-group">
                                    <label>Goods taken on credit</label>
                                    <input type="text" name="liability[credit_goods][description]" placeholder="Description">
                                </div>
                                <div class="form-group">
                                    <label>Others</label>
                                    <input type="text" name="liability[others][description]" placeholder="Description">
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

                <!-- Remaining sections -->
                <div class="form-navigation">
                    <button type="button" class="btn-prev" disabled>Previous</button>
                    <button type="button" class="btn-next">Next</button>
                    <button type="submit" class="btn-submit" style="display: none;">Submit</button>
                </div>
            </div>
        </form>
    </div>
    <script src="assets/js/script.js"></script>
    <script>
        // Auto refresh every 30 seconds (only in development)
        if (window.location.hostname === 'localhost' || window.location.hostname === '127.0.0.1') {
            setInterval(function() {
                window.location.reload();
            }, 30000); // 30 seconds
        }
    </script>
</body>
</html>