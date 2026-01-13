

<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_name('ADMINSESSID');
session_start([
    'cookie_httponly' => true,
    'use_strict_mode' => true
]);

require_once __DIR__ . '/app/core/auth.php';

$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $email    = trim($_POST['email'] ?? '');
    $password = $_POST['password'] ?? '';

    if ($email === '' || $password === '') {
        $error = 'All fields are required';
    } else {
        if (Auth::login($email, $password)) {
            header('Location: admin/dashboard.php');
            exit;
        } else {
            $error = 'Invalid credentials';
        }
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Admin Login</title>
</head>
<body>

<h2>Admin Login</h2>

<?php if ($error): ?>
    <p style="color:red"><?= htmlspecialchars($error) ?></p>
<?php endif; ?>

<form method="POST">
    <input type="email" name="email" required><br><br>
    <input type="password" name="password" required><br><br>
    <button type="submit">Login</button>
</form>

</body>
</html>
