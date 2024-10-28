<?php
session_start();


if (!isset($_SESSION['user_id']) || !$_SESSION['is_admin']) {
    header('Location: login.php');
    exit();
}

require_once '../config/database.php';
require_once '../models/User.php';

$database = new Database();
$db = $database->getConnection();
$user = new User($db);


if (!isset($_GET['id'])) {
    header('Location: admin_dashboard.php');
    exit();
}

$user_id = $_GET['id'];
$user_data = $user->getUserById($user_id);

if (!$user_data) {
    header('Location: admin_dashboard.php');
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $user->id = $user_id;
    $user->email = $_POST['email'];
    $user->is_admin = $_POST['is_admin'];
    
    
    if (!empty($_POST['new_password'])) {
        $user->password = password_hash($_POST['new_password'], PASSWORD_DEFAULT);
        $update_result = $user->updateWithPassword();
    } else {
        $update_result = $user->updateWithoutPassword();
    }

    if ($update_result) {
        $success_message = "User updated successfully!";
        $user_data = $user->getUserById($user_id); 
    } else {
        $error_message = "Error updating user.";
    }
}

include '../views/edit_user.php';