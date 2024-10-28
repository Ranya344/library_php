<?php
session_start();


if (!isset($_SESSION['user_id']) || !$_SESSION['is_admin']) {
    header('Location: login.php');
    exit();
}

require_once '../config/database.php';
require_once '../models/Book.php';

$database = new Database();
$db = $database->getConnection();
$book = new Book($db);


if (!isset($_GET['id'])) {
    header('Location: admin_dashboard.php');
    exit();
}

$book_id = $_GET['id'];
$book_data = $book->getBookById($book_id);

if (!$book_data) {
    header('Location: admin_dashboard.php');
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $book->id = $book_id;
    $book->tittle = $_POST['tittle'];  
    $book->author = $_POST['author'];
    $book->category = $_POST['category'];

    
    if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
        $allowed = ['jpg', 'jpeg', 'png', 'gif'];
        $filename = $_FILES['image']['name'];
        $filetype = pathinfo($filename, PATHINFO_EXTENSION);

        if (in_array(strtolower($filetype), $allowed)) {
           
            $newname = uniqid() . '.' . $filetype;
            $upload_path = '../public/images/' . $newname;

            if (move_uploaded_file($_FILES['image']['tmp_name'], $upload_path)) {
              
                if (!empty($book_data['image'])) {
                    $old_image = '../public/images/' . $book_data['image'];
                    if (file_exists($old_image)) {
                        unlink($old_image);
                    }
                }
                $book->image = $newname;
            }
        }
    } else {
        $book->image = $book_data['image']; 
    }

    if ($book->update()) {
        $success_message = "Book updated successfully!";
        $book_data = $book->getBookById($book_id); 
    } else {
        $error_message = "Error updating book.";
    }
}

include '../views/edit_book.php';