<?php
require_once ROOT_DIR . 'models/Book.php';

class BookController {
    private $db;
    private $book;

    public function __construct($db) {
        $this->db = $db;
        $this->book = new Book($db);
    }

    public function index() {
        $result = $this->book->read();
        $books = $result->fetchAll(PDO::FETCH_ASSOC);
        render('books/index', ['books' => $books]);
    }

}