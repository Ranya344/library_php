<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once '../config/database.php';
require_once '../models/Book.php';


$database = new Database();
$db = $database->getConnection();


$bookModel = new Book($db);


$books = $bookModel->getAllBooks();


echo "<!-- Debug books: ";
var_dump($books);
echo " -->";


$isLoggedIn = isset($_SESSION['user_id']);
$isAdmin = isset($_SESSION['is_admin']) && $_SESSION['is_admin'];
$username = isset($_SESSION['username']) ? $_SESSION['username'] : '';


echo "<!-- Debug session: ";
var_dump($_SESSION);
echo " -->";


include '../views/home.php';