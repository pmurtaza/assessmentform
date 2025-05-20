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
                    <div class="form-navigation">
                        <button type="button" class="btn-next">Next</button>
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
                    <div class="form-navigation">
                        <button type="button" class="btn-prev">Previous</button>
                        <button type="button" class="btn-next">Next</button>
                    </div>
                </section>

                <!-- Assessment & Counseling Section -->
                <section class="form-section" id="section3">
                    <h2>Assessment & Counseling</h2>

                    <!-- 3.1 Applicant's Background -->
                    <div class="subsection">
                        <h3>3.1. Applicant's Background:</h3>
                        <table class="assessment-table">
                            <tr>
                                <td class="label-cell" width="40%">
                                    Please mention in detail applicant's education, skillsets, past business and/or service experience, current business and any other relevant information
                                </td>
                                <td>
                                    <textarea name="applicant_background" required></textarea>
                                </td>
                            </tr>
                        </table>
                    </div>

                    <!-- 3.2 Applicant's Present Business -->
                    <div class="subsection">
                        <h3>3.2. Applicant's Present Business:</h3>
                        <table class="assessment-table">
                            <tr>
                                <td class="label-cell" width="40%">
                                    Mention in detail present business condition, from where goods are purchased, credit period / cash, products / service, cash/credit, typical customers, location, competitions, total monthly or annual revenue, stocks held, income
                                </td>
                                <td>
                                    <textarea name="present_business" required></textarea>
                                    <div class="note">Also mention family business in brief</div>
                                </td>
                            </tr>
                        </table>
                    </div>

                    <!-- 3.3 Counsellor's Assessment and recommendations -->
                    <div class="subsection">
                        <h3>3.3. Counsellor's Assessment and recommendations:</h3>
                        <table class="assessment-table">
                            <tr>
                                <td class="label-cell" width="40%">
                                    What is Counsellor's assessment of applicant's profile.<br>
                                    Any specific positive/negative points, strength /weakness etc.
                                </td>
                                <td>
                                    <ul style="margin:0; padding-left:1.2em;">
                                        <li><input type="text" name="counsellor_assessment[]" style="width:95%;" required></li>
                                        <li><input type="text" name="counsellor_assessment[]" style="width:95%;" required></li>
                                        <li><input type="text" name="counsellor_assessment[]" style="width:95%;" required></li>
                                    </ul>
                                </td>
                            </tr>
                            <tr>
                                <td class="label-cell" width="40%">
                                    What are Counselor's recommendation for business opportunities available to the applicant to increase income 3 to 5 times in the <i>mauze?</i>
                                </td>
                                <td>
                                    <textarea name="counsellor_recommendation" required></textarea>
                                </td>
                            </tr>
                            <tr>
                                <td class="label-cell" width="40%">
                                    Who are likely customer and competitors in proposed business?<br>
                                    How the applicant will increase number of customers and compete with competitors?
                                </td>
                                <td>
                                    <textarea name="customer_competitor_strategy" required></textarea>
                                </td>
                            </tr>
                        </table>
                    </div>
                    <div class="form-navigation">
                        <button type="button" class="btn-prev">Previous</button>
                        <button type="button" class="btn-next">Next</button>
                    </div>
                </section>

                <!-- Economic Upliftment Plan Section -->
                <section class="form-section" id="section4">
                    <h2>Economic Upliftment Plan</h2>

                    <!-- 4.1 Action Plan -->
                    <div class="subsection">
                        <h3>4.1. Action Plan</h3>
                        <div class="note-box">
                            <p>How the applicant can take advantage of available opportunity in phased manner?</p>
                            <p>What action plan is proposed over next 3 to 5 year to increase income 3 to 5 times by taking advantage of above-mentioned business opportunity?</p>
                        </div>
                        <table class="action-plan-table">
                            <thead>
                                <tr>
                                    <th width="25%">Time-line</th>
                                    <th width="75%">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td rowspan="5">upto 1<sup>st</sup> year end</td>
                                    <td>1. <textarea name="action_plan[year1][1]" rows="2"></textarea></td>
                                </tr>
                                <tr>
                                    <td>2. <textarea name="action_plan[year1][2]" rows="2"></textarea></td>
                                </tr>
                                <tr>
                                    <td>3. <textarea name="action_plan[year1][3]" rows="2"></textarea></td>
                                </tr>
                                <tr>
                                    <td>4. <textarea name="action_plan[year1][4]" rows="2"></textarea></td>
                                </tr>
                                <tr>
                                    <td>5. <textarea name="action_plan[year1][5]" rows="2"></textarea></td>
                                </tr>

                                <tr>
                                    <td rowspan="3">2<sup>nd</sup> and 3<sup>rd</sup> year</td>
                                    <td>6. <textarea name="action_plan[year2_3][1]" rows="2"></textarea></td>
                                </tr>
                                <tr>
                                    <td>7. <textarea name="action_plan[year2_3][2]" rows="2"></textarea></td>
                                </tr>
                                <tr>
                                    <td>8. <textarea name="action_plan[year2_3][3]" rows="2"></textarea></td>
                                </tr>

                                <tr>
                                    <td rowspan="3">4<sup>th</sup> and 5<sup>th</sup> year</td>
                                    <td>9. <textarea name="action_plan[year4_5][1]" rows="2"></textarea></td>
                                </tr>
                                <tr>
                                    <td>10. <textarea name="action_plan[year4_5][2]" rows="2"></textarea></td>
                                </tr>
                                <tr>
                                    <td>11. <textarea name="action_plan[year4_5][3]" rows="2"></textarea></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <!-- 4.2 Financial and non-financial assistance required -->
                    <div class="subsection">
                        <h3>4.2. Financial and non-financial assistance required</h3>
                        <div class="info-text" style="background: #d6f5d6; padding: 10px; margin-bottom: 15px;">
                            <p>What financials assistance may be needed to implement the upliftment plan?</p>
                            <p><em>Applicant may require investment in machinery, stock, raw material, furniture, shop (rent), packaging, promotion and marketing, business registration, etc. Wherever applicable, provide support documents for financial assistance such as quotation, photographs, descriptions etc. in installments.</em></p>
                        </div>
                        <table class="financial-assistance-table">
                            <thead>
                                <tr>
                                    <th>Time line (Tentative)</th>
                                    <th>Purpose (end-use) & Cost</th>
                                    <th>Enayat</th>
                                    <th>Qardan & Months**</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td rowspan="5" style="background: #fff3cd;">Immediate</td>
                                    <td><input type="text" name="financial_assistance[immediate][purpose][]"></td>
                                    <td><input type="number" name="financial_assistance[immediate][enayat][]"></td>
                                    <td><input type="text" name="financial_assistance[immediate][qardan][]"></td>
                                </tr>
                                <tr>
                                    <td><input type="text" name="financial_assistance[immediate][purpose][]"></td>
                                    <td><input type="number" name="financial_assistance[immediate][enayat][]"></td>
                                    <td><input type="text" name="financial_assistance[immediate][qardan][]"></td>
                                </tr>
                                <tr>
                                    <td><input type="text" name="financial_assistance[immediate][purpose][]"></td>
                                    <td><input type="number" name="financial_assistance[immediate][enayat][]"></td>
                                    <td><input type="text" name="financial_assistance[immediate][qardan][]"></td>
                                </tr>
                                <tr>
                                    <td><input type="text" name="financial_assistance[immediate][purpose][]"></td>
                                    <td><input type="number" name="financial_assistance[immediate][enayat][]"></td>
                                    <td><input type="text" name="financial_assistance[immediate][qardan][]"></td>
                                </tr>
                                <tr>
                                    <td><input type="text" name="financial_assistance[immediate][purpose][]"></td>
                                    <td><input type="number" name="financial_assistance[immediate][enayat][]"></td>
                                    <td><input type="text" name="financial_assistance[immediate][qardan][]"></td>
                                </tr>
                                <tr>
                                    <td style="background: #fff3cd;">after 1<sup>st</sup> yr</td>
                                    <td><input type="text" name="financial_assistance[after_1yr][purpose][]"></td>
                                    <td><input type="number" name="financial_assistance[after_1yr][enayat][]"></td>
                                    <td><input type="text" name="financial_assistance[after_1yr][qardan][]"></td>
                                </tr>
                                <tr>
                                    <td style="background: #fff3cd;">after 2<sup>nd</sup> yr</td>
                                    <td><input type="text" name="financial_assistance[after_2yr][purpose][]"></td>
                                    <td><input type="number" name="financial_assistance[after_2yr][enayat][]"></td>
                                    <td><input type="text" name="financial_assistance[after_2yr][qardan][]"></td>
                                </tr>
                                <tr>
                                    <td style="background: #fff3cd;">after 3<sup>rd</sup> yr #</td>
                                    <td><input type="text" name="financial_assistance[after_3yr][purpose][]"></td>
                                    <td><input type="number" name="financial_assistance[after_3yr][enayat][]"></td>
                                    <td><input type="text" name="financial_assistance[after_3yr][qardan][]"></td>
                                </tr>
                                <tr class="total-row">
                                    <td colspan="2" style="text-align: center;">TOTAL</td>
                                    <td><input type="number" name="total_enayat" readonly></td>
                                    <td><input type="number" name="total_qardan" readonly></td>
                                </tr>
                            </tbody>
                        </table>
                        <p class="note"># After 3<sup>rd</sup> year or before local Qardan can be extended to support business needs or avoid capital reduction due to ongoing Qardan repayment</p>

                        <!-- Repayment Schedule -->
                        <table class="repayment-table">
                            <thead>
                                <tr>
                                    <th>Repayment</th>
                                    <th>Year 1</th>
                                    <th>Year 2</th>
                                    <th>Year 3</th>
                                    <th>Year 4</th>
                                    <th>Year 5</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td style="background: #fff3cd;">QH 1</td>
                                    <td><input type="number" name="repayment[qh1][year1]"></td>
                                    <td><input type="number" name="repayment[qh1][year2]"></td>
                                    <td><input type="number" name="repayment[qh1][year3]"></td>
                                    <td><input type="number" name="repayment[qh1][year4]"></td>
                                    <td><input type="number" name="repayment[qh1][year5]"></td>
                                </tr>
                                <tr>
                                    <td style="background: #fff3cd;">QH 2</td>
                                    <td>NA</td>
                                    <td><input type="number" name="repayment[qh2][year2]"></td>
                                    <td><input type="number" name="repayment[qh2][year3]"></td>
                                    <td><input type="number" name="repayment[qh2][year4]"></td>
                                    <td><input type="number" name="repayment[qh2][year5]"></td>
                                </tr>
                                <tr>
                                    <td style="background: #fff3cd;">QH 3</td>
                                    <td>NA</td>
                                    <td>NA</td>
                                    <td><input type="number" name="repayment[qh3][year3]"></td>
                                    <td><input type="number" name="repayment[qh3][year4]"></td>
                                    <td><input type="number" name="repayment[qh3][year5]"></td>
                                </tr>
                                <tr>
                                    <td style="background: #fff3cd;">Local QH</td>
                                    <td>NA</td>
                                    <td>NA</td>
                                    <td>NA</td>
                                    <td><input type="number" name="repayment[local_qh][year4]"></td>
                                    <td><input type="number" name="repayment[local_qh][year5]"></td>
                                </tr>
                                <tr class="total-row">
                                    <td style="background: #fff3cd;">TOTAL</td>
                                    <td><input type="number" name="repayment_total[year1]" readonly></td>
                                    <td><input type="number" name="repayment_total[year2]" readonly></td>
                                    <td><input type="number" name="repayment_total[year3]" readonly></td>
                                    <td><input type="number" name="repayment_total[year4]" readonly></td>
                                    <td><input type="number" name="repayment_total[year5]" readonly></td>
                                </tr>
                            </tbody>
                        </table>
                        <p class="note">** Repayment can be staggered. Need NOT be equal amount during all years.</p>

                        <div class="form-group" style="margin-top: 20px;">
                            <label>Rahan available (if any):</label>
                            <input type="text" name="rahan_available">
                        </div>
                        <div class="form-group">
                            <label>Self-funding:</label>
                            <input type="text" name="self_funding">
                        </div>

                        <h4>What non-financial help may be needed for economic upliftment?</h4>
                        <table class="non-financial-table">
                            <tr>
                                <td style="background: #fff3cd;">Mentoring</td>
                                <td><input type="text" name="non_financial[mentoring]"></td>
                            </tr>
                            <tr>
                                <td style="background: #fff3cd;">Skill Development</td>
                                <td>Book Keeping, <input type="text" name="non_financial[skill_development]"></td>
                            </tr>
                            <tr>
                                <td style="background: #fff3cd;">Sourcing Support</td>
                                <td><input type="text" name="non_financial[sourcing]"></td>
                            </tr>
                            <tr>
                                <td style="background: #fff3cd;">Sales/Market Access</td>
                                <td><input type="text" name="non_financial[sales_market]"></td>
                            </tr>
                            <tr>
                                <td style="background: #fff3cd;">Other</td>
                                <td><input type="text" name="non_financial[other]"></td>
                            </tr>
                        </table>
                    </div>

                    <!-- 4.3 Targeted Economic Outcome -->
                    <div class="subsection">
                        <h3>4.3. Targeted Economic Outcome</h3>
                        <table class="economic-outcome-table">
                            <thead>
                                <tr>
                                    <th>Sr No</th>
                                    <th>Category and Subcategory</th>
                                    <th>Last Year (actual)</th>
                                    <th>Year 1 (proj)</th>
                                    <th>Year 2 (proj)</th>
                                    <th>Year 3 (proj)</th>
                                    <th>Year 4 (proj)</th>
                                    <th>Year 5 (proj)</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>REVENUE (Turnover / Sales) (1)</td>
                                    <td><input type="number" name="revenue[last_year]"></td>
                                    <td><input type="number" name="revenue[year1]"></td>
                                    <td><input type="number" name="revenue[year2]"></td>
                                    <td><input type="number" name="revenue[year3]"></td>
                                    <td><input type="number" name="revenue[year4]"></td>
                                    <td><input type="number" name="revenue[year5]"></td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td colspan="7">EXPENSES</td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td>a) Raw material / stock</td>
                                    <td><input type="number" name="expenses[raw_material][last_year]"></td>
                                    <td><input type="number" name="expenses[raw_material][year1]"></td>
                                    <td><input type="number" name="expenses[raw_material][year2]"></td>
                                    <td><input type="number" name="expenses[raw_material][year3]"></td>
                                    <td><input type="number" name="expenses[raw_material][year4]"></td>
                                    <td><input type="number" name="expenses[raw_material][year5]"></td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td>b) Labor / salary</td>
                                    <td><input type="number" name="expenses[labor][last_year]"></td>
                                    <td><input type="number" name="expenses[labor][year1]"></td>
                                    <td><input type="number" name="expenses[labor][year2]"></td>
                                    <td><input type="number" name="expenses[labor][year3]"></td>
                                    <td><input type="number" name="expenses[labor][year4]"></td>
                                    <td><input type="number" name="expenses[labor][year5]"></td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td>c) Rent</td>
                                    <td><input type="number" name="expenses[rent][last_year]"></td>
                                    <td><input type="number" name="expenses[rent][year1]"></td>
                                    <td><input type="number" name="expenses[rent][year2]"></td>
                                    <td><input type="number" name="expenses[rent][year3]"></td>
                                    <td><input type="number" name="expenses[rent][year4]"></td>
                                    <td><input type="number" name="expenses[rent][year5]"></td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td>d) Overhead & Misc (electricity, petrol, etc. & unforeseen)</td>
                                    <td><input type="number" name="expenses[overhead][last_year]"></td>
                                    <td><input type="number" name="expenses[overhead][year1]"></td>
                                    <td><input type="number" name="expenses[overhead][year2]"></td>
                                    <td><input type="number" name="expenses[overhead][year3]"></td>
                                    <td><input type="number" name="expenses[overhead][year4]"></td>
                                    <td><input type="number" name="expenses[overhead][year5]"></td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td>e) Repair & Maintenance</td>
                                    <td><input type="number" name="expenses[repair][last_year]"></td>
                                    <td><input type="number" name="expenses[repair][year1]"></td>
                                    <td><input type="number" name="expenses[repair][year2]"></td>
                                    <td><input type="number" name="expenses[repair][year3]"></td>
                                    <td><input type="number" name="expenses[repair][year4]"></td>
                                    <td><input type="number" name="expenses[repair][year5]"></td>
                                </tr>
                                <tr class="total-row">
                                    <td></td>
                                    <td>Total Expenses (2)</td>
                                    <td><input type="number" name="expenses_total[last_year]" readonly></td>
                                    <td><input type="number" name="expenses_total[year1]" readonly></td>
                                    <td><input type="number" name="expenses_total[year2]" readonly></td>
                                    <td><input type="number" name="expenses_total[year3]" readonly></td>
                                    <td><input type="number" name="expenses_total[year4]" readonly></td>
                                    <td><input type="number" name="expenses_total[year5]" readonly></td>
                                </tr>
                                <tr>
                                    <td>3</td>
                                    <td>PROFIT [(1)- (2)]</td>
                                    <td><input type="number" name="profit[last_year]" readonly></td>
                                    <td><input type="number" name="profit[year1]" readonly></td>
                                    <td><input type="number" name="profit[year2]" readonly></td>
                                    <td><input type="number" name="profit[year3]" readonly></td>
                                    <td><input type="number" name="profit[year4]" readonly></td>
                                    <td><input type="number" name="profit[year5]" readonly></td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td>(-) Fund blocked in Credit / Dead stock</td>
                                    <td><input type="number" name="fund_blocked[last_year]"></td>
                                    <td><input type="number" name="fund_blocked[year1]"></td>
                                    <td><input type="number" name="fund_blocked[year2]"></td>
                                    <td><input type="number" name="fund_blocked[year3]"></td>
                                    <td><input type="number" name="fund_blocked[year4]"></td>
                                    <td><input type="number" name="fund_blocked[year5]"></td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td>(-) Qardan Repayment</td>
                                    <td><input type="number" name="qardan_repayment[last_year]"></td>
                                    <td><input type="number" name="qardan_repayment[year1]"></td>
                                    <td><input type="number" name="qardan_repayment[year2]"></td>
                                    <td><input type="number" name="qardan_repayment[year3]"></td>
                                    <td><input type="number" name="qardan_repayment[year4]"></td>
                                    <td><input type="number" name="qardan_repayment[year5]"></td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td>(-) House hold expense</td>
                                    <td><input type="number" name="household_expense[last_year]"></td>
                                    <td><input type="number" name="household_expense[year1]"></td>
                                    <td><input type="number" name="household_expense[year2]"></td>
                                    <td><input type="number" name="household_expense[year3]"></td>
                                    <td><input type="number" name="household_expense[year4]"></td>
                                    <td><input type="number" name="household_expense[year5]"></td>
                                </tr>
                                <tr>
                                    <td>4</td>
                                    <td>CASH SURPLUS **</td>
                                    <td><input type="number" name="cash_surplus[last_year]" readonly></td>
                                    <td><input type="number" name="cash_surplus[year1]" readonly></td>
                                    <td><input type="number" name="cash_surplus[year2]" readonly></td>
                                    <td><input type="number" name="cash_surplus[year3]" readonly></td>
                                    <td><input type="number" name="cash_surplus[year4]" readonly></td>
                                    <td><input type="number" name="cash_surplus[year5]" readonly></td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td>(+) Additional Qardan / Enayat at the end of year</td>
                                    <td><input type="number" name="additional_qardan[last_year]"></td>
                                    <td><input type="number" name="additional_qardan[year1]"></td>
                                    <td><input type="number" name="additional_qardan[year2]"></td>
                                    <td><input type="number" name="additional_qardan[year3]"></td>
                                    <td><input type="number" name="additional_qardan[year4]"></td>
                                    <td><input type="number" name="additional_qardan[year5]"></td>
                                </tr>
                            </tbody>
                        </table>
                        <p class="note">** If there is deficit in initial years, provision for additional Qardan may be kept at the end of the year to fill the deficit. Also, the applicant will be eligible to take additional local qardan if his business grows and exiting qardan is insufficient for available growth opportunity.</p>

                        <!-- Business Assets Table -->
                        <table class="business-assets-table">
                            <thead>
                                <tr>
                                    <th rowspan="2">Sr No</th>
                                    <th rowspan="2">Business assets<br>(at the end of the year)</th>
                                    <th>Last Year</th>
                                    <th>Year 1</th>
                                    <th>Year 2</th>
                                    <th>Year 3</th>
                                    <th>Year 4</th>
                                    <th>Year 5</th>
                                </tr>
                                <tr>
                                    <th>(actual)</th>
                                    <th>(proj)</th>
                                    <th>(proj)</th>
                                    <th>(proj)</th>
                                    <th>(proj)</th>
                                    <th>(proj)</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>5</td>
                                    <td>a) Cash in Hand</td>
                                    <td><input type="number" name="business_assets[cash][last_year]"></td>
                                    <td><input type="number" name="business_assets[cash][year1]"></td>
                                    <td><input type="number" name="business_assets[cash][year2]"></td>
                                    <td><input type="number" name="business_assets[cash][year3]"></td>
                                    <td><input type="number" name="business_assets[cash][year4]"></td>
                                    <td><input type="number" name="business_assets[cash][year5]"></td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td>b) Raw materials / stock</td>
                                    <td><input type="number" name="business_assets[raw_materials][last_year]"></td>
                                    <td><input type="number" name="business_assets[raw_materials][year1]"></td>
                                    <td><input type="number" name="business_assets[raw_materials][year2]"></td>
                                    <td><input type="number" name="business_assets[raw_materials][year3]"></td>
                                    <td><input type="number" name="business_assets[raw_materials][year4]"></td>
                                    <td><input type="number" name="business_assets[raw_materials][year5]"></td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td>c) Sale on Credit **</td>
                                    <td><input type="number" name="business_assets[credit_sale][last_year]"></td>
                                    <td><input type="number" name="business_assets[credit_sale][year1]"></td>
                                    <td><input type="number" name="business_assets[credit_sale][year2]"></td>
                                    <td><input type="number" name="business_assets[credit_sale][year3]"></td>
                                    <td><input type="number" name="business_assets[credit_sale][year4]"></td>
                                    <td><input type="number" name="business_assets[credit_sale][year5]"></td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td>d) Machines / Vehicles</td>
                                    <td><input type="number" name="business_assets[machines][last_year]"></td>
                                    <td><input type="number" name="business_assets[machines][year1]"></td>
                                    <td><input type="number" name="business_assets[machines][year2]"></td>
                                    <td><input type="number" name="business_assets[machines][year3]"></td>
                                    <td><input type="number" name="business_assets[machines][year4]"></td>
                                    <td><input type="number" name="business_assets[machines][year5]"></td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td>e) Furniture / Storage</td>
                                    <td><input type="number" name="business_assets[furniture][last_year]"></td>
                                    <td><input type="number" name="business_assets[furniture][year1]"></td>
                                    <td><input type="number" name="business_assets[furniture][year2]"></td>
                                    <td><input type="number" name="business_assets[furniture][year3]"></td>
                                    <td><input type="number" name="business_assets[furniture][year4]"></td>
                                    <td><input type="number" name="business_assets[furniture][year5]"></td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td>f) Shop / Godown etc.</td>
                                    <td><input type="number" name="business_assets[shop][last_year]"></td>
                                    <td><input type="number" name="business_assets[shop][year1]"></td>
                                    <td><input type="number" name="business_assets[shop][year2]"></td>
                                    <td><input type="number" name="business_assets[shop][year3]"></td>
                                    <td><input type="number" name="business_assets[shop][year4]"></td>
                                    <td><input type="number" name="business_assets[shop][year5]"></td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td>g) Branding / Goodwill</td>
                                    <td colspan="6" style="text-align: center;">The applicant is encouraged to earn goodwill by his behavior.</td>
                                </tr>
                                <tr>
                                    <td>6</td>
                                    <td>Business liability – other than Qardan<br>(at the end of the year)</td>
                                    <td><input type="number" name="business_liability[last_year]"></td>
                                    <td><input type="number" name="business_liability[year1]"></td>
                                    <td><input type="number" name="business_liability[year2]"></td>
                                    <td><input type="number" name="business_liability[year3]"></td>
                                    <td><input type="number" name="business_liability[year4]"></td>
                                    <td><input type="number" name="business_liability[year5]"></td>
                                </tr>
                                <tr>
                                    <td></td>
                                    <td>h) Purchase on Credit **</td>
                                    <td><input type="number" name="credit_purchase[last_year]"></td>
                                    <td><input type="number" name="credit_purchase[year1]"></td>
                                    <td><input type="number" name="credit_purchase[year2]"></td>
                                    <td><input type="number" name="credit_purchase[year3]"></td>
                                    <td><input type="number" name="credit_purchase[year4]"></td>
                                    <td><input type="number" name="credit_purchase[year5]"></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="form-navigation">
                        <button type="button" class="btn-prev">Previous</button>
                        <button type="button" class="btn-next">Next</button>
                    </div>
                </section>
            </div>
                <!-- Declaration Section -->
                <section class="form-section" id="section5">
                    <h2>Declaration</h2>
                    <div class="declaration-section">
                        <div class="applicant-declaration">
                            <h3>The applicant hereby confirms that:</h3>
                            <ol>
                                <li>The information provided about his personal, family and present business are correct and free of any error</li>
                                <li>He/she has understood the details filled in this form and purpose and content of Economic Upliftment Plan.</li>
                                <li>By signing this form he is applying for Enayat and Qardan amount as mentioned in 4.2 above</li>
                                <li>Any amount granted against this application will be utilized only for economic upliftment purpose as mentioned in this application.</li>
                            </ol>
                            
                            <div class="comments-section">
                                <label>Any other comments:</label>
                                <textarea name="applicant_comments" rows="3"></textarea>
                            </div>
                            
                            <div class="signature-grid">
                                <div class="signature-field">
                                    <label>Applicant's Name</label>
                                    <input type="text" name="applicant_name" required>
                                </div>
                                <div class="signature-field">
                                    <label>Contact No.</label>
                                    <input type="tel" name="applicant_contact" required>
                                </div>
                                <div class="signature-field">
                                    <label>Date</label>
                                    <input type="date" name="applicant_date" required>
                                </div>
                            </div>
                            <div class="signature-field">
                                <label>Signature</label>
                                <div class="file-upload-container">
                                    <input type="file" class="file-upload-input" name="applicant_signature" accept="image/*" required>
                                    <div class="file-upload-label">
                                        <i class="fas fa-upload file-upload-icon"></i>
                                        <span class="file-upload-text">Choose file to upload</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="counsellor-declaration">
                            <h3>The counsellor hereby confirms that:</h3>
                            <ol>
                                <li>The applicant's potential has been assessed and proposed action plan has been explained to the applicant along with the larger objective of the upliftment program.</li>
                                <li>The proposed business/economic activity has potential in the suggested location and will increase income of the applicant over next three to five year in sustainable manner.</li>
                                <li>The recommended economic upliftment plan is realistic and feasible in local mauza context.</li>
                            </ol>
                            
                            <div class="comments-section">
                                <label>Any other comments:</label>
                                <textarea name="counsellor_comments" rows="3"></textarea>
                            </div>
                            
                            <div class="signature-grid">
                                <div class="signature-field">
                                    <label>Counsellor's Name</label>
                                    <input type="text" name="counsellor_name" required>
                                </div>
                                <div class="signature-field">
                                    <label>Contact No.</label>
                                    <input type="tel" name="counsellor_contact" required>
                                </div>
                                <div class="signature-field">
                                    <label>Date</label>
                                    <input type="date" name="counsellor_date" required>
                                </div>
                            </div>
                            <div class="signature-field">
                                <label>Signature</label>
                                <div class="file-upload-container">
                                    <input type="file" class="file-upload-input" name="counsellor_signature" accept="image/*" required>
                                    <div class="file-upload-label">
                                        <i class="fas fa-upload file-upload-icon"></i>
                                        <span class="file-upload-text">Choose file to upload</span>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="signature-grid">
                                <div class="signature-field">
                                    <label>TR Committee Member's Name</label>
                                    <input type="text" name="tr_member_name" required>
                                </div>
                                <div class="signature-field">
                                    <label>Contact No.</label>
                                    <input type="tel" name="tr_member_contact" required>
                                </div>
                                <div class="signature-field">
                                    <label>Date</label>
                                    <input type="date" name="tr_member_date" required>
                                </div>
                            </div>
                            <div class="signature-field">
                                <label>Signature</label>
                                <div class="file-upload-container">
                                    <input type="file" class="file-upload-input" name="tr_member_signature" accept="image/*" required>
                                    <div class="file-upload-label">
                                        <i class="fas fa-upload file-upload-icon"></i>
                                        <span class="file-upload-text">Choose file to upload</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-navigation">
                        <button type="button" class="btn-prev">Previous</button>
                        <button type="button" class="btn-next">Next</button>
                    </div>
                </section>

                <!-- Attachments Section -->
                <section class="form-section" id="section6">
                    <h2>Attachments</h2>
                    <div class="attachments-section">
                        <table class="attachments-table">
                            <thead>
                                <tr>
                                    <th width="5%">No.</th>
                                    <th width="45%">Description</th>
                                    <th width="50%">Upload</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>Photograph of exiting place of work and proposed place of business</td>
                                    <td>
                                        <div class="file-upload-container">
                                            <input type="file" class="file-upload-input" name="business_photos[]" multiple accept="image/*">
                                            <div class="file-upload-label">
                                                <i class="fas fa-camera file-upload-icon"></i>
                                                <span class="file-upload-text">Choose files to upload</span>
                                            </div>
                                        </div>
                                        <small class="file-hint">You can select multiple photos</small>
                                    </td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>Quotation of end-use of Enayat / Qardan amount whenever possible</td>
                                    <td>
                                        <div class="file-upload-container">
                                            <input type="file" class="file-upload-input" name="quotations[]" multiple accept=".pdf,.doc,.docx,.jpg,.jpeg,.png">
                                            <div class="file-upload-label">
                                                <i class="fas fa-file-alt file-upload-icon"></i>
                                                <span class="file-upload-text">Choose files to upload</span>
                                            </div>
                                        </div>
                                        <small class="file-hint">You can upload multiple quotations</small>
                                    </td>
                                </tr>
                                <tr>
                                    <td>3</td>
                                    <td>Product photograph / brochure / marketing material (if any)</td>
                                    <td>
                                        <div class="file-upload-container">
                                            <input type="file" class="file-upload-input" name="marketing_materials[]" multiple accept=".pdf,.doc,.docx,.jpg,.jpeg,.png">
                                            <div class="file-upload-label">
                                                <i class="fas fa-images file-upload-icon"></i>
                                                <span class="file-upload-text">Choose files to upload</span>
                                            </div>
                                        </div>
                                        <small class="file-hint">You can upload multiple files</small>
                                    </td>
                                </tr>
                                <tr>
                                    <td>4</td>
                                    <td>Any other documents applicant/counsellor may wish to attach</td>
                                    <td>
                                        <div class="file-upload-container">
                                            <input type="file" class="file-upload-input" name="other_documents[]" multiple accept=".pdf,.doc,.docx,.jpg,.jpeg,.png">
                                            <div class="file-upload-label">
                                                <i class="fas fa-file file-upload-icon"></i>
                                                <span class="file-upload-text">Choose files to upload</span>
                                            </div>
                                        </div>
                                        <small class="file-hint">You can upload multiple documents</small>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="form-navigation">
                        <button type="button" class="btn-prev">Previous</button>
                        <button type="submit" class="btn-submit">Submit</button>
                    </div>
                </section>
            </div>
        </form>
    </div>
    <script>
document.addEventListener('DOMContentLoaded', function() {
    const steps = document.querySelectorAll('.step');
    const sections = document.querySelectorAll('.form-section');

    // Function to update active states
    function updateActiveStates(stepIndex) {
        // Update steps
        steps.forEach((step, index) => {
            if (index <= stepIndex) {
                step.classList.add('active');
            } else {
                step.classList.remove('active');
            }
        });

        // Update sections
        sections.forEach((section, index) => {
            if (index === stepIndex) {
                section.classList.add('active');
            } else {
                section.classList.remove('active');
            }
        });
    }

    // Add click event to steps
    steps.forEach((step, index) => {
        step.addEventListener('click', () => {
            updateActiveStates(index);
        });
    });

    // Navigation button functionality
    document.addEventListener('click', function(e) {
        if (e.target.classList.contains('btn-next')) {
            const currentSection = e.target.closest('.form-section');
            const currentIndex = Array.from(sections).indexOf(currentSection);
            if (currentIndex < sections.length - 1) {
                updateActiveStates(currentIndex + 1);
            }
        }
        if (e.target.classList.contains('btn-prev')) {
            const currentSection = e.target.closest('.form-section');
            const currentIndex = Array.from(sections).indexOf(currentSection);
            if (currentIndex > 0) {
                updateActiveStates(currentIndex - 1);
            }
        }
    });
});
</script>
         