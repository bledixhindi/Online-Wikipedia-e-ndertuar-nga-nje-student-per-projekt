<!DOCTYPE html>
<html>
<head>
    <title>Online Wikipedia - Articles</title>
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
            </div>
        </nav>
    </header>
    <div class="container">
        <main class="main-content">
            <section class="articles">
                <h2>Articles</h2>
                <?php
                // Include the database connection file
                include 'database.php';

                // Fetch articles from the database with Category 1
                $query = "SELECT * FROM articles WHERE category = 'Category 1'";
                $result = $conn->query($query);

                if ($result) {
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            $articleId = $row['id'];
                            $articleTitle = $row['title'];
                            $articleContent = $row['content'];

                            echo '<article>';
                            echo '<h3><a href="article.php?id=' . $articleId . '">' . $articleTitle . '</a></h3>';
                            echo '<p>' . $articleContent . '</p>';
                            echo '</article>';
                        }
                    } else {
                        echo '<p>No articles found in Category 1.</p>';
                    }
                } else {
                    echo 'Error: ' . $conn->error;
                }

                // Close the database connection
                $conn->close();
                ?>
            </section>
        </main>
    </div>
    
    <footer>
        <p>&copy; 2023 Online Wikipedia. All rights reserved.</p>
    </footer>
</body>
</html>
