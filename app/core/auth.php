<?php
declare(strict_types=1);

require_once __DIR__ . '/../models/admin.php';

class Auth
{
    public static function login(string $email, string $password): bool
    {
        $admin = Admin::findByEmail($email);

        if (!$admin) {
            return false;
        }

        if (!password_verify($password, $admin['password'])) {
            return false;
        }

        session_regenerate_id(true);

        $_SESSION['admin_id']  = $admin['id'];
        $_SESSION['logged_in'] = true;

        return true;
    }

    public static function check(): void
    {
        if (empty($_SESSION['logged_in'])) {
            header('Location: /ecom/login.php');
            exit;
        }
    }

    public static function logout(): void
    {
        session_destroy();
        header('Location: /ecom/login.php');
        exit;
    }
}
