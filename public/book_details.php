<?php
session_start();
require_once '../config/database.php';
require_once '../models/Book.php';

$id = isset($_GET['id']) ? $_GET['id'] : die('ERROR: Missing ID.');


$database = new Database();
$db = $database->getConnection();
$book = new Book($db);


$book_data = $book->getBookById($id);


if (!$book_data) {
    die('Book not found');
}


include '../views/book_details.php';