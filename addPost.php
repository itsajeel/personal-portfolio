<?php
session_start();
require_once 'db.php';

if (!isset($_SESSION['user_email'])) {
    header('Location: login.php');
    exit();
}

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('Location: addEntry.php');
    exit();
}

$title = trim($_POST['title'] ?? '');
$body = trim($_POST['post'] ?? '');
$action = $_POST['action'] ?? 'post';

// Server-side check in case JavaScript was bypassed
if ($title === '' || $body === '') {
    header('Location: addEntry.php');
    exit();
}

// If user clicked Preview, save to session and show preview page
if ($action === 'preview') {
    $_SESSION['preview_title'] = $title;
    $_SESSION['preview_body'] = $body;
    header('Location: preview.php');
    exit();
}

// Otherwise insert the post into the database
$createdAt = date('Y-m-d H:i:s');

$stmt = $pdo->prepare("INSERT INTO posts (title, body, created_at) VALUES (:title, :body, :created_at)");
$stmt->execute([
    'title' => $title,
    'body' => $body,
    'created_at' => $createdAt
]);

unset($_SESSION['preview_title'], $_SESSION['preview_body']);

header('Location: viewBlog.php');
exit();
?>
