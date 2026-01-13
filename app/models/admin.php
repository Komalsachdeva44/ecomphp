<?php
declare(strict_types=1);

class Admin
{
    public static function findByEmail(string $email): ?array
    {
        require __DIR__ . '/../config/connection.php';

        $stmt = $pdo->prepare(
            "SELECT id, email, password FROM admins WHERE email = ? AND status = 1 LIMIT 1"
        );
        $stmt->execute([$email]);

        $admin = $stmt->fetch();
        return $admin ?: null;
    }
}
