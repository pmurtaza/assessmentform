<?php
session_start();
require_once 'config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    try {
        $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Begin transaction
        $pdo->beginTransaction();

        // Insert applicant details
        $stmt = $pdo->prepare("INSERT INTO applicants (name, its, age, contact, email, address, occupation) 
                              VALUES (:name, :its, :age, :contact, :email, :address, :occupation)");
        
        $stmt->execute([
            ':name' => $_POST['name'],
            ':its' => $_POST['its'],
            ':age' => $_POST['age'],
            ':contact' => $_POST['contact'],
            ':email' => $_POST['email'],
            ':address' => $_POST['address'],
            ':occupation' => $_POST['occupation']
        ]);

        $applicant_id = $pdo->lastInsertId();

        // Handle file uploads
        $upload_dir = 'uploads/';
        if (!file_exists($upload_dir)) {
            mkdir($upload_dir, 0777, true);
        }

        // Process identity proof
        if (isset($_FILES['identity_proof'])) {
            $file_name = $applicant_id . '_identity_' . basename($_FILES['identity_proof']['name']);
            move_uploaded_file($_FILES['identity_proof']['tmp_name'], $upload_dir . $file_name);
            
            $stmt = $pdo->prepare("UPDATE applicants SET identity_proof = :file WHERE id = :id");
            $stmt->execute([':file' => $file_name, ':id' => $applicant_id]);
        }

        // Process income proof
        if (isset($_FILES['income_proof'])) {
            $file_name = $applicant_id . '_income_' . basename($_FILES['income_proof']['name']);
            move_uploaded_file($_FILES['income_proof']['tmp_name'], $upload_dir . $file_name);
            
            $stmt = $pdo->prepare("UPDATE applicants SET income_proof = :file WHERE id = :id");
            $stmt->execute([':file' => $file_name, ':id' => $applicant_id]);
        }

        // Commit transaction
        $pdo->commit();

        $_SESSION['success'] = "Application submitted successfully!";
        header("Location: index.php");
        exit();

    } catch(PDOException $e) {
        $pdo->rollBack();
        $_SESSION['error'] = "Error: " . $e->getMessage();
        header("Location: index.php");
        exit();
    }
}