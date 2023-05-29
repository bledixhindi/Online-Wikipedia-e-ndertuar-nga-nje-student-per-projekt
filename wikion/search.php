<!DOCTYPE html>
<html>
<head>
    <title>Online Wikipedia - Search Results</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <header>
        <nav>
            <div class="navbar">
                <h1><a href="index.php">Online Wikipedia</a></h1>
                <form class="search-form" action="search.php" method="GET">
                    <input class="search-input" type="text" name="query" placeholder="Search Wikipedia" value="<?php echo $_GET['query']; ?>">
                    <button class="search-button" type="submit">Search</button>
                </form>
            </div>
        </nav>
    </header>
    <div class="container">
        <main class="main-content">
            <section class="search-results">
                <h2>Search Results</h2>
                <ul id="search-list">
                    <?php
                    // Include the database connection file
                    include 'database.php';

                    // Get the search query from the form submission
                    $query = $_GET['query'];

                    // Prepare the SQL query to search for articles by name
                    $searchQuery = "SELECT * FROM articles WHERE title LIKE '%$query%'";

                    // Perform the search query
                    $searchResult = $conn->query($searchQuery);

                    if ($searchResult->num_rows > 0) {
                        while ($row = $searchResult->fetch_assoc()) {
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
