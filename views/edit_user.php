<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit User - Library System</title>
    <style>
        /* ... (keep the same styles as edit_book.php) ... */
        
        /* Additional styles for user form */
        .role-select {
            margin-top: 5px;
            padding: 8px;
            border-radius: 4px;
            border: 1px solid #ddd;
            width: 100%;
        }

        .checkbox-group {
            margin-top: 10px;
        }

        .checkbox-group label {
            display: inline;
            margin-left: 8px;
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
            <h1>Edit User</h1>
        </div>

        <?php if (isset($error_message)): ?>
            <div class="error-message"><?= htmlspecialchars($error_message) ?></div>
        <?php endif; ?>

        <?php if (isset($success_message)): ?>
            <div class="success-message"><?= htmlspecialchars($success_message) ?></div>
        <?php endif; ?>

        <form class="edit-form" method="POST">
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" 
                       id="email" 
                       name="email" 
                       value="<?= htmlspecialchars($user_data['email']) ?>" 
                       required>
            </div>

            <div class="form-group">
                <label for="new_password">New Password (leave blank to keep current)</label>
                <input type="password" 
                       id="new_password" 
                       name="new_password" 
                       minlength="6">
            </div>

            <div class="form-group">
                <label for="is_admin">User Role</label>
                <select name="is_admin" id="is_admin" class="role-select">
                    <option value="0" <?= $user_data['is_admin'] == 0 ? 'selected' : '' ?>>Regular User</option>
                    <option value="1" <?= $user_data['is_admin'] == 1 ? 'selected' : '' ?>>Administrator</option>
                </select>
            </div>

            <button type="submit" class="submit-btn">Update User</button>
        </form>
    </div>
</body>
</html>