<?php
session_start();

if (!isset($_SESSION['user_id']) || !$_SESSION['is_admin']) {
    header('Location: login.php');
    exit();
}

require_once '../config/database.php';
require_once '../models/Book.php';
require_once '../models/User.php';

$database = new Database();
$db = $database->getConnection();


$bookModel = new Book($db);
$books = $bookModel->getAllBooks();


$userModel = new User($db);
$users = $userModel->getAllUsers();


include '../views/admin_dashboard.php';