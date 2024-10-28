<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Library Management System</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Arial', sans-serif;
            background-color: #ccd5e1;
            display: flex;
            min-height: 100vh;
        }

        /* Sidebar/Nav Styles */
        .sidebar {
            width: 250px;
            background-color: #2c3e50;
            color: white;
            padding: 20px;
            position: fixed;
            height: 100vh;
        }

        .sidebar h2 {
            color: white;
            margin-bottom: 30px;
            font-size: 24px;
            text-align: center;
            padding-bottom: 20px;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
        }

        .nav-button {
            display: block;
            padding: 12px 20px;
            background-color: rgba(255, 255, 255, 0.1);
            color: white;
            text-decoration: none;
            border-radius: 8px;
            margin-bottom: 10px;
            transition: all 0.3s ease;
        }

        .nav-button:hover {
            background-color: rgba(255, 255, 255, 0.2);
            transform: translateX(5px);
        }

        /* Main Content Styles */
        .main-content {
            flex: 1;
            margin-left: 250px;
            padding: 40px;
        }

        .header {
            margin-bottom: 40px;
        }

        .header h1 {
            color: #2c3e50;
            font-size: 32px;
            margin-bottom: 10px;
        }

        /* Book Grid Styles */
        .book-grid {
            display: flex;
            flex-wrap: wrap;
            gap: 25px;
            padding: 20px 0;
        }

        .book-card {
            width: 130px;
            text-align: center;
            transition: transform 0.2s ease;
        }

        .book-card:hover {
            transform: translateY(-3px);
        }

        .book-card a {
            text-decoration: none;
            color: inherit;
            display: block;
        }

        .book-image-container {
            height: 180px;
            margin-bottom: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .book-image {
            height: 100%;
            width: auto;
            max-width: 100%;
            object-fit: contain;
            border-radius: 4px;
            box-shadow: 2px 2px 4px rgba(0,0,0,0.1);
            transition: transform 0.2s ease;
        }

        .book-card:hover .book-image {
            transform: scale(1.03);
        }

        .no-image {
            height: 100%;
            width: 120px;
            display: flex;
            align-items: center;
            justify-content: center;
            background: #f8f9fa;
            border-radius: 4px;
            color: #6c757d;
            font-size: 2em;
        }

        .book-info {
            padding: 0 5px;
        }

        .book-title {
            font-size: 0.9em;
            color: #2c3e50;
            margin-bottom: 4px;
            font-weight: 500;
            line-height: 1.3;
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }

        .book-author {
            font-size: 0.8em;
            color: #666;
            font-style: italic;
        }

        @media (max-width: 768px) {
            .sidebar {
                width: 100%;
                height: auto;
                position: relative;
            }

            .main-content {
                margin-left: 0;
            }

            body {
                flex-direction: column;
            }

            .book-card {
                width: 110px;
            }

            .book-image-container {
                height: 160px;
            }
        }
    </style>
</head>
<body>
    <div class="sidebar">
        <h2>Library System</h2>
        <?php if ($isLoggedIn): ?>
            <div class="nav-button">Welcome, <?= htmlspecialchars($username) ?></div>
            <?php if ($isAdmin): ?>
                <a href="admin_dashboard.php" class="nav-button">Dashboard</a>
            <?php endif; ?>
            <a href="add_book.php" class="nav-button">Add New Book</a>
            <a href="../public/logout.php" class="nav-button">Logout</a>
        <?php else: ?>
            <a href="login.php" class="nav-button">Login</a>
            <a href="register.php" class="nav-button">Register</a>
        <?php endif; ?>
    </div>

    <div class="main-content">
        <div class="header">
            <h1>Our Books</h1>
        </div>

        <div class="book-grid">
            <?php if (!empty($books)): ?>
                <?php foreach ($books as $book): ?>
                    <div class="book-card">
                        <a href="book_details.php?id=<?= htmlspecialchars($book['id']) ?>">
                            <div class="book-image-container">
                                <?php if (!empty($book['image'])): ?>
                                    <img src="../public/images/<?= htmlspecialchars($book['image']) ?>" 
                                         alt="<?= htmlspecialchars($book['tittle']) ?>" 
                                         class="book-image"
                                         loading="lazy">
                                <?php else: ?>
                                    <div class="no-image">📚</div>
                                <?php endif; ?>
                            </div>
                            <div class="book-info">
                                <div class="book-title"><?= htmlspecialchars($book['tittle']) ?></div>
                                <div class="book-author"><?= htmlspecialchars($book['author']) ?></div>
                            </div>
                        </a>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <p>No books available at the moment.</p>
            <?php endif; ?>
        </div>
    </div>
</body>
</html>