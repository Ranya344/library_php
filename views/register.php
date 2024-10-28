<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - Library System</title>
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
    justify-content: center;
    align-items: center;
    min-height: 100vh;
}

.register-container {
    background: white;
    padding: 25px 40px;  /* Less vertical padding, keep horizontal */
    border-radius: 20px;
    box-shadow: 0 10px 25px rgba(44, 62, 80, 0.1);
    width: 100%;
    max-width: 480px;  /* Increased from 360px */
}

.header {
    text-align: center;
    margin-bottom: 20px;  /* Reduced from 25px */
}

.header h1 {
    font-size: 24px;  /* Slightly smaller */
    margin-bottom: 5px;  /* Reduced from 10px */
}

.form-group {
    margin-bottom: 15px;  /* Reduced from 20px */
}


label {
    display: block;
    margin-bottom: 8px;
    color: #2c3e50;
    font-weight: 500;
    font-size: 14px;
}

input[type="text"],
input[type="email"],
input[type="password"] {
    width: 100%;
    padding: 14px;
    border: 2px solid #e2e8f0;
    border-radius: 12px;
    font-size: 15px;
    transition: all 0.3s ease;
    background-color: #f8fafc;
}

input[type="text"]:focus,
input[type="email"]:focus,
input[type="password"]:focus {
    border-color: #2c3e50;
    outline: none;
    box-shadow: 0 0 0 3px rgba(44, 62, 80, 0.1);
}

.submit-btn {
    background-color: #2c3e50;
    color: white;
    padding: 14px;
    border: none;
    border-radius: 12px;
    cursor: pointer;
    font-size: 16px;
    font-weight: 600;
    width: 100%;
    transition: all 0.3s ease;
    margin-top: 10px;
}

.submit-btn:hover {
    background-color: #34495e;
    transform: translateY(-2px);
    box-shadow: 0 4px 6px rgba(44, 62, 80, 0.2);
}

.error-message {
    color: #dc2626;
    margin-bottom: 20px;
    text-align: center;
    padding: 12px;
    background-color: #fee2e2;
    border-radius: 12px;
    font-size: 14px;
    border: 1px solid #fecaca;
}

.login-link {
    margin-top: 25px;
    text-align: center;
    color: #64748b;
    font-size: 14px;
}

.login-link a {
    color: #2c3e50;
    text-decoration: none;
    font-weight: 600;
    transition: all 0.3s ease;
}

.login-link a:hover {
    color: #34495e;
    text-decoration: underline;
}

.user-icon {
    font-size: 42px;  /* Reduced from 48px */
    margin-bottom: 20px;  /* Reduced from 25px */
}

@keyframes float {
    0% { transform: translateY(0px); }
    50% { transform: translateY(-10px); }
    100% { transform: translateY(0px); }
}


@media (max-width: 480px) {
    .register-container {
        margin: 15px;
        padding: 20px 25px;
    }
}
    </style>
</head>
<body>
<div class="register-container">
    <div class="header">
        <div class="user-icon">👤</div>
        <h1>Create Account</h1>
        <p>Join our library community</p>
    </div>

    <?php if (isset($error_message) && !empty($error_message)): ?>
        <div class="error-message">
            <?php echo htmlspecialchars($error_message); ?>
        </div>
    <?php endif; ?>

    <form method="POST" action="">
        <div class="form-group">
            <label for="username">Username</label>
            <input type="text" id="username" name="username" required>
        </div>

        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" id="email" name="email" required>
        </div>

        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" id="password" name="password" required>
        </div>

        <div class="form-group">
            <label for="confirm_password">Confirm Password</label>
            <input type="password" id="confirm_password" name="confirm_password" required>
        </div>

        <button type="submit" class="submit-btn">Register</button>
    </form>

    <div class="login-link">
        Already have an account? <a href="login.php">Login here</a>
    </div>
</div>
</body>
</html>