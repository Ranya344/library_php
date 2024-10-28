<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Library System</title>
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

.login-container {
    background: white;
    padding: 40px;
    border-radius: 20px;
    box-shadow: 0 10px 25px rgba(44, 62, 80, 0.1);
    width: 100%;
    max-width: 400px;
}

.header {
    text-align: center;
    margin-bottom: 35px;
}

.header h1 {
    color: #2c3e50;
    font-size: 28px;
    margin-bottom: 10px;
    font-weight: 600;
}

.header p {
    color: #64748b;
    font-size: 16px;
}

.form-group {
    margin-bottom: 24px;
}

label {
    display: block;
    margin-bottom: 8px;
    color: #2c3e50;
    font-weight: 500;
    font-size: 14px;
}

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

.register-link {
    margin-top: 25px;
    text-align: center;
    color: #64748b;
    font-size: 14px;
}

.register-link a {
    color: #2c3e50;
    text-decoration: none;
    font-weight: 600;
    transition: all 0.3s ease;
}

.register-link a:hover {
    color: #34495e;
    text-decoration: underline;
}

.book-icon {
    font-size: 48px;
    margin-bottom: 25px;
    text-align: center;
    animation: float 3s ease-in-out infinite;
}

@keyframes float {
    0% { transform: translateY(0px); }
    50% { transform: translateY(-10px); }
    100% { transform: translateY(0px); }
}

@media (max-width: 480px) {
    .login-container {
        margin: 20px;
        padding: 30px;
    }
}
    </style>
</head>
<body>
<div class="login-container">
    <div class="header">
        <div class="book-icon">📚</div>
        <h1>Welcome Back</h1>
        <p>Please login to your account</p>
    </div>

    <?php if (isset($error_message) && !empty($error_message)): ?>
        <div class="error-message">
            <?php echo htmlspecialchars($error_message); ?>
        </div>
    <?php endif; ?>

    <!-- Make sure the form has the correct action and method -->
    <form method="POST" action="../public/login.php">
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" id="email" name="email" required>
        </div>

        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" id="password" name="password" required>
        </div>

        <button type="submit" class="submit-btn">Login</button>
    </form>

    <div class="register-link">
        Don't have an account? <a href="register.php">Register here</a>
    </div>
</div>
</body>
</html>