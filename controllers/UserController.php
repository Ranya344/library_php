<?php
require_once ROOT_DIR . 'models/User.php';

class UserController {
    private $db;
    private $user;

    public function __construct($db) {
        $this->db = $db;
        $this->user = new User($db);
    }

    public function register() {
        echo "Register method called<br>";
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            echo "POST request received<br>";
            // Process form submission
        } else {
            echo "Displaying registration form<br>";
            include ROOT_DIR . 'views/users/register.php';
        }
    }
}