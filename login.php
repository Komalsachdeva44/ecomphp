<?php
$error = "";
require_once __DIR__ . "/app/config/connection.php";
echo"<br>";
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email=trim($_POST['email']);
    $password=trim($_POST['password']);
    echo "Email recived ".($email);
    echo"Password Recieved ".($password);

}
echo"<br>"."<br>";
$sql = "SELECT * FROM admins ";
$stmt=$conn->prepare($sql);
$stmt->execute();
$result = $stmt->get_result();    // get the “data inside the box”
$row = $result->fetch_assoc();    // read the first row as an array

if ($row) {
    echo "Admin found: " . $row['email'];  // ✅ actual data
        if (password_verify($password, $row['password'])) {
        echo "You entered correct email and password!";
    } else {
        echo "Password is incorrect!";
    }

} else {
    echo "No admin found";
}

?>

<!DOCTYPE html>
<html>

<head>
    <title>Admin Login</title>
</head>

<body>

    <h2>Admin Login</h2>

    <?php if (!empty($error)): ?>
    <p style="color:red"><?= htmlspecialchars($error) ?></p>
    <?php endif; ?>

    <form method="POST">
        <input type="email" name="email" required><br><br>
        <input type="password" name="password" required><br><br>
        <button type="submit">Login</button>
    </form>

</body>

</html>