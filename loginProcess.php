<?php
session_start();
require_once 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $email = $_POST['email'] ?? '';
    $password = $_POST['password'] ?? '';

    // Look up the user by email
    $stmt = $pdo->prepare("SELECT id, email, password FROM users WHERE email = :email");
    $stmt->execute(['email' => $email]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user && $user['password'] === $password) {
        // Credentials match - start session and redirect
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['user_email'] = $user['email'];
        header('Location: addEntry.php');
        exit();
    } else {
        header('Location: login.php?error=1');
        exit();
    }

} else {
    header('Location: login.php');
    exit();
}
?>
