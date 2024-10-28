<?php
session_start();


if (!isset($_SESSION['user_id']) || !$_SESSION['is_admin']) {
    header('Location: login.php');
    exit();
}

require_once '../config/database.php';
require_once '../models/Book.php';

if (isset($_GET['id'])) {
    $database = new Database();
    $db = $database->getConnection();
    
    $book = new Book($db);
    $book->id = $_GET['id'];
    
    
    $book_data = $book->getBookById($_GET['id']);
    
    if ($book->delete()) {
     
        if (!empty($book_data['image'])) {
            $image_path = '../public/images/' . $book_data['image'];
            if (file_exists($image_path)) {
                unlink($image_path);
            }
        }
        $_SESSION['success_message'] = "Book deleted successfully.";
    } else {
        $_SESSION['error_message'] = "Error deleting book.";
    }
}

header('Location: admin_dashboard.php');
exit();