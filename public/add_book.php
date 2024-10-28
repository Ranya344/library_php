<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

require_once '../config/database.php';
require_once '../models/Book.php';

$database = new Database();
$db = $database->getConnection();
$book = new Book($db);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $book->tittle = $_POST['tittle'];
    $book->author = $_POST['author'];
    $book->category = $_POST['category'];
    $book->description = $_POST['description'];
    $book->publication_year = $_POST['publication_year'];

    if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
        $allowed = ['jpg', 'jpeg', 'png', 'gif'];
        $filename = $_FILES['image']['name'];
        $filetype = pathinfo($filename, PATHINFO_EXTENSION);

        if (in_array(strtolower($filetype), $allowed)) {
         
            $newname = uniqid() . '.' . $filetype;
            $upload_path = '../public/images/' . $newname;

            if (move_uploaded_file($_FILES['image']['tmp_name'], $upload_path)) {
                $book->image = $newname;
            }
        }
    }

    if ($book->create()) {
        $success_message = "Book added successfully!";
    } else {
        $error_message = "Error adding book.";
    }
}

include '../views/add_book.php';