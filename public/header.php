<?php
session_start();
$isLoggedIn = isset($_SESSION['user_id']);
$isAdmin = isset($_SESSION['is_admin']) && $_SESSION['is_admin'];
$username = $_SESSION['username'] ?? '';
?>

<nav>
    <div class="left-nav">
        <?php if ($isLoggedIn): ?>
            <span class="username"><?php echo htmlspecialchars($username); ?></span>
            <a href="add_book.php" class="btn">Add Book</a>
        <?php endif; ?>
    </div>
    
    <div class="right-nav">
        <?php if ($isLoggedIn): ?>
            <?php if ($isAdmin): ?>
                <a href="dashboard.php" class="btn">Dashboard</a>
            <?php endif; ?>
            <a href="logout.php" class="btn">Logout</a>
        <?php else: ?>
            <a href="login.php" class="btn">Login</a>
            <a href="register.php" class="btn">Register</a>
        <?php endif; ?>
    </div>
</nav>