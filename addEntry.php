<?php
session_start();

// Block access if not logged in
if (!isset($_SESSION['user_email'])) {
    header('Location: login.php');
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sajeel - Add Blog Entry</title>
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
            <section>
                <div class="form-container">
                    <h2>Add Blog</h2>

                    <p class="text-center">Welcome <?php echo htmlspecialchars($_SESSION['user_email']); ?>. <a href="logout.php">Logout</a></p>

                    <form id="blogForm" action="addPost.php" method="post">

                        <div class="form-group">
                            <label for="title">Title</label>
                            <input type="text" id="title" name="title" placeholder="Enter post title">
                        </div>

                        <div class="form-group">
                            <label for="post">Post</label>
                            <textarea id="post" name="post" placeholder="Enter your text here"></textarea>
                        </div>

                        <div class="form-buttons">
                            <button type="submit" name="action" value="post" class="btn btn-primary">Post</button>
                            <button type="submit" name="action" value="preview" class="btn btn-secondary" id="previewBtn">Preview</button>
                            <button type="button" class="btn btn-secondary" id="clearBtn">Clear</button>
                        </div>

                    </form>
                </div>
            </section>

            <figure>
                <figcaption class="text-center mt-1">Write a new blog entry to share your thoughts.</figcaption>
            </figure>
        </article>

    </div>

    <footer>
        <p>&copy; 2026 Sajeel. All rights reserved.</p>
        <p>ECS417U - Fundamentals of Web Technology</p>
    </footer>

    <script src="js/validation.js"></script>

</body>
</html>
