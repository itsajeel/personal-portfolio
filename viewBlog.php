<?php
session_start();
require_once 'db.php';
require_once 'sort.php';

// Get all posts (no ORDER BY - we sort in PHP using merge sort)
$stmt = $pdo->query("SELECT id, title, body, created_at FROM posts");
$posts = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Build the list of unique months for the dropdown
$availableMonths = [];
foreach ($posts as $post) {
    $monthKey = date('Y-m', strtotime($post['created_at']));
    $monthLabel = date('F Y', strtotime($post['created_at']));
    $availableMonths[$monthKey] = $monthLabel;
}
krsort($availableMonths);

// Filter posts if a month was selected
$selectedMonth = $_GET['month'] ?? 'all';

if ($selectedMonth !== 'all') {
    $filteredPosts = [];
    foreach ($posts as $post) {
        if (date('Y-m', strtotime($post['created_at'])) === $selectedMonth) {
            $filteredPosts[] = $post;
        }
    }
    $posts = $filteredPosts;
}

// Sort using merge sort (most recent first)
$posts = mergeSort($posts);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sajeel - Blog</title>
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

    <div class="page-wrapper">

        <article>
            <h2>Blog</h2>

            <section class="blog-controls">
                <a href="addEntry.php" class="btn btn-primary">Add Post</a>

                <form method="get" action="viewBlog.php" class="month-filter">
                    <label for="month">Filter by month:</label>
                    <select name="month" id="month">
                        <option value="all" <?php echo $selectedMonth === 'all' ? 'selected' : ''; ?>>All months</option>
                        <?php foreach ($availableMonths as $key => $label): ?>
                            <option value="<?php echo $key; ?>" <?php echo $selectedMonth === $key ? 'selected' : ''; ?>>
                                <?php echo $label; ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </form>
            </section>

            <section>
                <?php if (empty($posts)): ?>
                    <p>No blog posts to display. <a href="addEntry.php">Add the first post</a>.</p>
                <?php else: ?>
                    <?php foreach ($posts as $post): ?>
                        <article class="blog-post">
                            <p class="post-date">
                                <?php echo date('jS F Y, H:i', strtotime($post['created_at'])); ?> UTC
                            </p>
                            <h3 class="post-title"><?php echo htmlspecialchars($post['title']); ?></h3>
                            <p class="post-body"><?php echo nl2br(htmlspecialchars($post['body'])); ?></p>
                        </article>
                        <hr>
                    <?php endforeach; ?>
                <?php endif; ?>
            </section>
        </article>

        <aside>
            <?php if (isset($_SESSION['user_email'])): ?>
                <h3>Welcome <?php echo htmlspecialchars($_SESSION['user_email']); ?></h3>
                <p>You are logged in.</p>
                <p><a href="addEntry.php">Add a New Post</a></p>
                <p><a href="logout.php">Logout</a></p>
            <?php else: ?>
                <h3>Blogger Area</h3>
                <p>Log in to add new blog posts.</p>
                <p><a href="login.php">Login</a></p>
            <?php endif; ?>
        </aside>

    </div>

    <footer>
        <p>&copy; 2026 Sajeel. All rights reserved.</p>
        <p>ECS417U - Fundamentals of Web Technology</p>
    </footer>

    <script src="js/blogFilter.js"></script>

</body>
</html>
