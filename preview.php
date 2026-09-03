<?php
session_start();
require_once 'db.php';
require_once 'sort.php';

if (!isset($_SESSION['user_email']) || !isset($_SESSION['preview_title'])) {
    header('Location: addEntry.php');
    exit();
}

// User clicked "Publish this post" - save to DB and go to viewBlog
if (isset($_GET['confirm']) && $_GET['confirm'] === 'upload') {
    $createdAt = date('Y-m-d H:i:s');
    $stmt = $pdo->prepare("INSERT INTO posts (title, body, created_at) VALUES (:title, :body, :created_at)");
    $stmt->execute([
        'title' => $_SESSION['preview_title'],
        'body' => $_SESSION['preview_body'],
        'created_at' => $createdAt
    ]);
    unset($_SESSION['preview_title'], $_SESSION['preview_body']);
    header('Location: viewBlog.php');
    exit();
}

// Get existing posts to show below the preview
$stmt = $pdo->query("SELECT id, title, body, created_at FROM posts");
$existingPosts = $stmt->fetchAll(PDO::FETCH_ASSOC);
$existingPosts = mergeSort($existingPosts);

$previewTitle = $_SESSION['preview_title'];
$previewBody = $_SESSION['preview_body'];
$previewDate = date('jS F Y, H:i') . ' UTC';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sajeel - Preview Post</title>
    <link rel="stylesheet" href="reset.css">
    <link rel="stylesheet" href="styles.css">
</head>
<body>

    <header>
        <h1>Sajeel</h1>
        <p>Computer Science Undergraduate Student</p>
    </header>

    <nav>
        <ul>
            <li><a href="index.php">Home</a></li>
            <li><a href="education.php">Education</a></li>
            <li><a href="skills.php">Skills</a></li>
            <li><a href="portfolio.php">Portfolio</a></li>
            <li><a href="viewBlog.php" class="active">Blog</a></li>
        </ul>
    </nav>

    <div class="page-wrapper full-width">

        <article>
            <h2>Post Preview</h2>
            <p>This is how your post will look. Choose to publish it or go back to edit.</p>

            <div class="preview-actions">
                <a href="preview.php?confirm=upload" class="btn btn-primary">Publish this post</a>
                <a href="addEntry.php" class="btn btn-secondary">Go back and edit</a>
            </div>

            <section class="preview-banner">
                <p class="preview-label">DRAFT - NOT YET PUBLISHED</p>
                <article class="blog-post">
                    <p class="post-date"><?php echo $previewDate; ?></p>
                    <h3 class="post-title"><?php echo htmlspecialchars($previewTitle); ?></h3>
                    <p class="post-body"><?php echo nl2br(htmlspecialchars($previewBody)); ?></p>
                </article>
            </section>

            <hr>

            <h3>Previous Entries</h3>

            <?php if (empty($existingPosts)): ?>
                <p>No previous posts yet.</p>
            <?php else: ?>
                <?php foreach ($existingPosts as $post): ?>
                    <article class="blog-post">
                        <p class="post-date"><?php echo date('jS F Y, H:i', strtotime($post['created_at'])); ?> UTC</p>
                        <h3 class="post-title"><?php echo htmlspecialchars($post['title']); ?></h3>
                        <p class="post-body"><?php echo nl2br(htmlspecialchars($post['body'])); ?></p>
                    </article>
                    <hr>
                <?php endforeach; ?>
            <?php endif; ?>
        </article>

    </div>

    <footer>
        <p>&copy; 2026 Sajeel. All rights reserved.</p>
        <p>ECS417U - Fundamentals of Web Technology</p>
    </footer>

</body>
</html>
