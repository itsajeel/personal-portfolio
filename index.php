<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sajeel - Portfolio</title>
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
            <li><a href="index.php" class="active">Home</a></li>
            <li><a href="education.php">Education</a></li>
            <li><a href="skills.php">Skills</a></li>
            <li><a href="portfolio.php">Portfolio</a></li>
            <li><a href="viewBlog.php">Blog</a></li>
        </ul>
    </nav>

    <div class="page-wrapper">

        <article>
            <h2>About Me</h2>

            <section>
                <figure>
                    <img src="images/profile.jpg" alt="Photo of Sajeel" width="220">
                    <figcaption>Sajeel - First Year CS Student at QMUL</figcaption>
                </figure>

                <p>
                    Hi, I'm Sajeel! A first year Computer Science student at Queen Mary
                    University of London. I've had an interest in technology since primary
                    school, where I was first introduced to programming through my uncle who
                    was a software engineer. I later became increasingly fascinated by Computer
                    Science after learning about the theory at GCSE and A-level.
                </p>
                <p>
                    Since then, I've built up experience in languages such as Python, Java, and
                    JavaScript. I'm looking to expand my skill set to PHP, C#, and more. I enjoy the
                    problem solving side of programming, from building small web apps to working
                    through algorithm challenges.
                </p>
            </section>

            <section>
                <h3>Beyond Coding</h3>
                <p>
                    Outside of my studies, I play badminton and regularly go to
                    the gym. I am also an avid anime watcher as well as reading a variety of pieces 
                    of literature- though mostly classic novels.
                </p>
                <p>
                    I built this portfolio to document my journey through university, showcase
                    the projects I've worked on, and share my thoughts through my blog. Feel
                    free to look around and get in touch if you'd like to connect.
                </p>
            </section>

            <section>
                <h3>Contact</h3>
                <p>Email: sajeelkhan1026@icloud.com</p>
                <p>LinkedIn: linkedin.com/in/its-sajeel-khan</p>
                <p>GitHub: github.com/itsajeel</p>
            </section>
        </article>

        <aside>
            <?php if (isset($_SESSION['user_email'])): ?>
                <h3>Welcome <?php echo htmlspecialchars($_SESSION['user_email']); ?></h3>
                <p>You are logged in as the blogger.</p>
                <p><a href="addEntry.php">Add a New Post</a></p>
                <p><a href="viewBlog.php">View Blog</a></p>
                <p><a href="logout.php">Logout</a></p>
            <?php else: ?>
                <h3>Quick Links</h3>
                <p><a href="portfolio.php">View My Projects</a></p>
                <p><a href="skills.php">See My Skills</a></p>
                <p><a href="login.php">Blogger Login</a></p>
            <?php endif; ?>
        </aside>

    </div>

    <footer>
        <p>&copy; 2026 Sajeel. All rights reserved.</p>
        <p>ECS417U - Fundamentals of Web Technology</p>
    </footer>

</body>
</html>
