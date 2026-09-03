<?php
session_start();

if (isset($_SESSION['user_email'])) {
    header('Location: addEntry.php');
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sajeel - Login</title>
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
            <li><a href="viewBlog.php">Blog</a></li>
        </ul>
    </nav>

    <div class="page-wrapper full-width">

        <article>
            <section>
                <div class="form-container">
                    <h2>Login</h2>

                    <?php if (isset($_GET['error'])): ?>
                        <p class="error-message">Invalid email or password. Please try again.</p>
                    <?php endif; ?>

                    <form action="loginProcess.php" method="post">

                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" id="email" name="email" placeholder="Enter your email" required>
                        </div>

                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" id="password" name="password" placeholder="Enter your password" minlength="6" required>
                        </div>

                        <div class="form-buttons">
                            <button type="submit" class="btn btn-primary">Login</button>
                        </div>

                    </form>
                </div>
            </section>

            <figure>
                <figcaption class="text-center mt-1">Please log in to add a new blog post.</figcaption>
            </figure>
        </article>

    </div>

    <footer>
        <p>&copy; 2026 Sajeel. All rights reserved.</p>
        <p>ECS417U - Fundamentals of Web Technology</p>
    </footer>

</body>
</html>
