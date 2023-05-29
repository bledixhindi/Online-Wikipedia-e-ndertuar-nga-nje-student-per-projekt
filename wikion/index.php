<!DOCTYPE html>
<html>
<head>
    <title>Online Wikipedia</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <header>
        <nav>
            <div class="navbar">
                <h1><a href="index.php">Online Wikipedia</a></h1>
                <form class="search-form" action="search.php" method="GET">
                    <input class="search-input" type="text" name="query" placeholder="Search Wikipedia">
                    <button class="search-button" type="submit">Search</button>
                </form>
                <a href="addarticle.php" class="add-article-button">Add Article</a>
                <a href="signup.php" class="signup-button">Sign Up</a>
            </div>
        </nav>
    </header>
    <div class="container">
        <aside class="sidebar">
            <ul>
                <li><a href="category.php">Category 1</a></li>
                <li><a href="#">Category 2</a></li>
                <li><a href="#">Category 3</a></li>
                <li><a href="#">Category 4</a></li>
                <li><a href="#">Category 5</a></li>
            </ul>
        </aside>
        <main class="main-content">
            <section class="articles">
                <h2>All Articles</h2>
                <ul>
                    <?php
                    // Include the database connection file
                    include 'database.php';

                    // Fetch all articles from the database ordered by id in descending order
                    $query = "SELECT * FROM articles ORDER BY id DESC";
                    $result = $conn->query($query);

                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            $id = $row['id'];
                            $title = $row['title'];
                            $content = $row['content'];

                            echo '<li>';
                            echo '<h3><a href="article.php?id=' . $id . '">' . $title . '</a></h3>';
                            
                            echo '<p>' . $content . '</p>';
                            echo '</li>';
                        }
                    } else {
                        echo '<li>No articles found.</li>';
                    }

                    // Close the database connection
                    $conn->close();
                    ?>
                </ul>
            </section>
        </main>
    </div>
    
    <footer>
        <p>&copy; 2023 Online Wikipedia. All rights reserved.</p>
    </footer>
</body>
</html>
