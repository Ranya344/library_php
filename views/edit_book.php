<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Book - Library System</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Arial', sans-serif;
            background-color: #f5f5f5;
            display: flex;
            min-height: 100vh;
        }

        /* Sidebar Styles (same as admin dashboard) */
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
            margin-bottom: 30px;
        }

        .header h1 {
            color: #2c3e50;
            font-size: 32px;
            margin-bottom: 10px;
        }

        /* Form Styles */
        .edit-form {
            background: white;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
            max-width: 800px;
        }

        .form-group {
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin-bottom: 8px;
            color: #2c3e50;
            font-weight: 500;
        }

        input[type="text"],
        input[type="file"],
        textarea,
        select {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 4px;
            font-size: 16px;
        }

        textarea {
            height: 100px;
            resize: vertical;
        }

        .current-image {
            margin: 10px 0;
        }

        .current-image img {
            max-width: 150px;
            border-radius: 4px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }

        .submit-btn {
            background-color: #3498db;
            color: white;
            padding: 12px 24px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
            transition: background-color 0.3s;
        }

        .submit-btn:hover {
            background-color: #2980b9;
        }

        .error-message {
            color: #e74c3c;
            margin-bottom: 20px;
        }

        .success-message {
            color: #2ecc71;
            margin-bottom: 20px;
        }
    </style>

</head>
<body>
    <div class="sidebar">
        <h2>Library System</h2>
        <a href="admin_dashboard.php" class="nav-button">← Back to Dashboard</a>
        <a href="home.php" class="nav-button">View Library</a>
        <a href="logout.php" class="nav-button">Logout</a>
    </div>

    <div class="main-content">
        <div class="header">
            <h1>Edit Book</h1>
        </div>

        <?php if (isset($error_message)): ?>
            <div class="error-message"><?= htmlspecialchars($error_message) ?></div>
        <?php endif; ?>

        <?php if (isset($success_message)): ?>
            <div class="success-message"><?= htmlspecialchars($success_message) ?></div>
        <?php endif; ?>

        <form class="edit-form" method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label for="tittle">Title</label>
                <input type="text" 
                       id="tittle" 
                       name="tittle" 
                       value="<?= htmlspecialchars($book_data['tittle'] ?? '') ?>" 
                       required>
            </div>

            <div class="form-group">
                <label for="author">Author</label>
                <input type="text" 
                       id="author" 
                       name="author" 
                       value="<?= htmlspecialchars($book_data['author'] ?? '') ?>" 
                       required>
            </div>

            <div class="form-group">
                <label for="category">Category</label>
                <input type="text" 
                       id="category" 
                       name="category" 
                       value="<?= htmlspecialchars($book_data['category'] ?? '') ?>">
            </div>

            <div class="form-group">
                <label for="image">Book Cover</label>
                <?php if (!empty($book_data['image'])): ?>
                    <div class="current-image">
                        <p>Current image:</p>
                        <img src="../public/images/<?= htmlspecialchars($book_data['image']) ?>" 
                             alt="Current cover">
                    </div>
                <?php endif; ?>
                <input type="file" id="image" name="image" accept="image/*">
            </div>

            <button type="submit" class="submit-btn">Update Book</button>
        </form>
    </div>
</body>
</html>