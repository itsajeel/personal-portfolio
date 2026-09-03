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
            <li><a href="index.php">Home</a></li>
            <li><a href="education.php">Education</a></li>
            <li><a href="skills.php">Skills</a></li>
            <li><a href="portfolio.php" class="active">Portfolio</a></li>
            <li><a href="viewBlog.php">Blog</a></li>
        </ul>
    </nav>

    <div class="page-wrapper">

        <article>
            <h2>My Projects</h2>

            <section>
                <p>
                    Below are some of the projects I have developed during my first year of
                    university. I have learnt different programming concepts throughout the
                    year and implemented them within these projects.
                </p>

                <div class="project-list">

                    <div class="project-card">
                        <h3> Double or Quit Quiz</h3>
                        <p>
                            A game in JavaScript built for my Procedural Programming module
                            where players have to answer questions with short answers. Each
                            correct answer doubles their winnings, an incorrect answer halves
                            it.
                        </p>
                        <p><strong>Technologies:</strong> JavaScript</p>
                    </div>

                    <div class="project-card">
                        <h3>Student Management System</h3>
                        <p>
                            A Java console application built for my Object-Oriented
                            Programming module. Implements encapsulation, static methods,
                            and a management hierarchy. Uses bubble sort to organise
                            student records.
                        </p>
                        <p><strong>Technologies:</strong> Java</p>
                    </div>

                    <div class="project-card">
                        <h3>Portfolio Website</h3>
                        <p>
                            This website itself- built using HTML5, CSS with Flexbox and Grid,
                            and designed to showcase my work and skills to potential employers. 
                            Will later include a PHP-powered blog.
                        </p>
                        <p><strong>Technologies:</strong> HTML5, CSS, JavaScript, PHP</p>
                    </div>

                </div>
            </section>

            <figure>
                <img src="images/projects.jpg" alt="Screenshot of project work" width="400">
                <figcaption>A snapshot of some of my development work</figcaption>
            </figure>
        </article>

        <aside>
            <h3>Currently Working On</h3>
            <p>
                Expanding this portfolio site with a dynamic blog powered by PHP
                and MySQL, and JavaScript for form validation.
            </p>
            <p><a href="viewBlog.php">Go to Blog</a></p>
        </aside>

    </div>

    <footer>
        <p>&copy; 2026 Sajeel. All rights reserved.</p>
        <p>ECS417U - Fundamentals of Web Technology</p>
    </footer>

</body>
</html>
