<!DOCTYPE html>
<html>
<head>
    <title>Online Wikipedia - Categories</title>
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
        <aside class="sidebar">
            <ul>
                <?php
                // Include the database connection file
                include 'database.php';

                // Fetch all categories from the database
                $query = "SELECT DISTINCT category FROM articles";
                $result = $conn->query($query);

                if ($result && $result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        $category = $row['category'];
                        echo '<li><a href="category_articles.php?category=' . urlencode($category) . '">' . $category . '</a></li>';
                    }
                } else {
                    echo '<li>No categories found.</li>';
                }

                // Close the database connection
                $conn->close();
                ?>
            </ul>
        </aside>
        <main class="main-content">
            <section class="articles">
                <h2>All Categories</h2>
                <p>Click on a category to explore more articles.</p>
            </section>
        </main>
    </div>
    
    <footer>
        <p>&copy; 2023 Online Wikipedia. All rights reserved.</p>
    </footer>
</body>
</html>
