<?php
session_start();


if (isset($_SESSION['user_id'])) {
    header("Location: home.php");
    exit();
}


header("Location: login.php");
exit();