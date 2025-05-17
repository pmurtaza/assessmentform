CREATE DATABASE IF NOT EXISTS assessment_form;
USE assessment_form;

CREATE TABLE applicants (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    its VARCHAR(50) NOT NULL,
    age INT NOT NULL,
    contact VARCHAR(20) NOT NULL,
    email VARCHAR(100) NOT NULL,
    address TEXT NOT NULL,
    occupation TEXT NOT NULL,
    identity_proof VARCHAR(255),
    income_proof VARCHAR(255),
    counsellor_notes TEXT,
    recommendations TEXT,
    upliftment_plan TEXT,
    expected_outcomes TEXT,
    final_decision ENUM('approved', 'rejected', 'pending') DEFAULT 'pending',
    remarks TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE family_members (
    id INT AUTO_INCREMENT PRIMARY KEY,
    applicant_id INT NOT NULL,
    name VARCHAR(100) NOT NULL,
    age_relation VARCHAR(100) NOT NULL,
    education_occupation VARCHAR(255) NOT NULL,
    annual_income DECIMAL(10,2) NOT NULL,
    FOREIGN KEY (applicant_id) REFERENCES applicants(id)
);

CREATE TABLE attachments (
    id INT AUTO_INCREMENT PRIMARY KEY,
    applicant_id INT NOT NULL,
    file_name VARCHAR(255) NOT NULL,
    file_path VARCHAR(255) NOT NULL,
    uploaded_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (applicant_id) REFERENCES applicants(id)
);