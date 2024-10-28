<?php
session_start();
require_once '../config/database.php';

$error_message = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $database = new Database();
    $db = $database->getConnection();
    
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    
    if ($password !== $confirm_password) {
        $error_message = "Passwords do not match!";
    } else {
        
        $check_query = "SELECT id FROM users WHERE email = ?";
        $check_stmt = $db->prepare($check_query);
        $check_stmt->execute([$email]);
        
        if ($check_stmt->fetch()) {
            $error_message = "Email already exists!";
        } else {
           
            try {
                $stmt = $db->prepare($query);
                $hashed_password = password_hash($password, PASSWORD_DEFAULT);
                
                if ($stmt->execute([$username, $email, $hashed_password, 0])) {
                    
                    header("Location: login.php");
                    exit();
                } else {
                    $error_message = "Registration failed!";
                }
            } catch(PDOException $e) {
                $error_message = "Registration error!";
            }
        }
    }
}

include '../views/register.php';
?>