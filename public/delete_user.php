<?php
session_start();


if (!isset($_SESSION['user_id']) || !$_SESSION['is_admin']) {
    header('Location: login.php');
    exit();
}

require_once '../config/database.php';
require_once '../models/User.php';

if (isset($_GET['id'])) {
    $database = new Database();
    $db = $database->getConnection();
    
    $user = new User($db);
    $user->id = $_GET['id'];
    
    if ($user->id == $_SESSION['user_id']) {
        $_SESSION['error_message'] = "You cannot delete your own account.";
    } else {
        if ($user->delete()) {
            $_SESSION['success_message'] = "User deleted successfully.";
        } else {
            $_SESSION['error_message'] = "Error deleting user.";
        }
    }
}

header('Location: admin_dashboard.php');
exit();