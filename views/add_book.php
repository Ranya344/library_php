

<!-- Your HTML/CSS content here -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add New Book - Library System</title>
    <style>
        * {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}


body {
    font-family: 'Arial', sans-serif;
    background-color: #ccd5e1;  /* Slightly darker than #d5dde7 */
    display: flex;
    min-height: 100vh;
}



/* Sidebar Styles */
.sidebar {
    width: 250px;
    background-color: #2c3e50;
    color: white;
    padding: 20px;
    position: fixed;
    height: 100vh;
}

.sidebar h2 {
    margin-bottom: 30px;
    font-size: 24px;
}

.nav-button {
    display: block;
    padding: 14px 20px;
    background-color: rgba(255, 255, 255, 0.08);
    color: white;
    text-decoration: none;
    border-radius: 10px;
    margin-bottom: 12px;
    transition: all 0.3s ease;
    font-weight: 500;
    border: 1px solid rgba(255, 255, 255, 0.1);
}

.nav-button:hover {
    background-color: rgba(255, 255, 255, 0.15);
    transform: translateX(5px);
    border-color: rgba(255, 255, 255, 0.2);
}

.nav-button.active {
    background-color: rgba(255, 255, 255, 0.2);
    border-color: rgba(255, 255, 255, 0.3);
}

/* Main Content Styles */
.main-content {
    flex: 1;
    margin-left: 250px;
    padding: 40px;
}

.header h1 {
    color: #2c3e50;
    margin-bottom: 30px;
    font-size: 28px;
}

.add-form {
    background: white;
    padding: 40px;
    border-radius: 15px;
    box-shadow: 0 4px 15px rgba(44, 62, 80, 0.1);
    max-width: 800px;
}

.form-group {
    margin-bottom: 20px;
}

.form-group label {
    display: block;
    margin-bottom: 8px;
    color: #2c3e50;
    font-weight: 500;
}

input[type="text"],
input[type="file"],
textarea {
    width: 100%;
    padding: 12px;
    border: 2px solid #e2e8f0;
    border-radius: 8px;
    font-size: 15px;
    background-color: #f8fafc;
    transition: all 0.3s ease;
}

input[type="text"]:focus,
textarea:focus {
    outline: none;
    border-color: #2c3e50;
    box-shadow: 0 0 0 3px rgba(44, 62, 80, 0.1);
}

.submit-btn {
    background-color: #2c3e50;
    color: white;
    padding: 14px 28px;
    border: none;
    border-radius: 10px;
    cursor: pointer;
    font-size: 16px;
    font-weight: 600;
    transition: all 0.3s ease;
    width: 100%;
    margin-top: 20px;
}

.submit-btn:hover {
    background-color: #34495e;
    transform: translateY(-2px);
    box-shadow: 0 4px 6px rgba(44, 62, 80, 0.2);
}

.error-message,
.success-message {
    padding: 15px;
    border-radius: 8px;
    margin-bottom: 20px;
}

.error-message {
    background-color: #fee2e2;
    color: #dc2626;
    border: 1px solid #fecaca;
}

.success-message {
    background-color: #dcfce7;
    color: #16a34a;
    border: 1px solid #bbf7d0;
}

@media (max-width: 768px) {
    .sidebar {
        width: 100%;
        height: auto;
        position: relative;
        padding: 15px;
    }

    .nav-button {
        margin-bottom: 8px;
        padding: 12px 16px;
    }

    .main-content {
        margin-left: 0;
        padding: 20px;
    }

    .add-form {
        padding: 20px;
    }
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
            <h1>Add New Book</h1>
        </div>

        <?php if (isset($error_message)): ?>
            <div class="error-message"><?= htmlspecialchars($error_message) ?></div>
        <?php endif; ?>

        <?php if (isset($success_message)): ?>
            <div class="success-message"><?= htmlspecialchars($success_message) ?></div>
        <?php endif; ?>

        <form class="add-form" method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label for="tittle">Title</label>
                <input type="text" id="tittle" name="tittle" required>
            </div>

            <div class="form-group">
                <label for="author">Author</label>
                <input type="text" id="author" name="author" required>
            </div>

            <div class="form-group">
                <label for="category">Category</label>
                <input type="text" id="category" name="category">
            </div>

            <div class="form-group">
                <label for="publication_year">Publication Year</label>
                <input type="text" id="publication_year" name="publication_year">
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <input type="text" id="description" name="description">
            </div>
            <div class="form-group">
                <label for="image">Book Cover</label>
                <input type="file" id="image" name="image" accept="image/*">
            </div>

            <button type="submit" class="submit-btn">Add Book</button>
        </form>
    </div>
</body>
</html>