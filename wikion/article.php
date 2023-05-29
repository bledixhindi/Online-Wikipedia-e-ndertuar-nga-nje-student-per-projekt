<!DOCTYPE html>
<html>
<head>
    <title>Online Wikipedia - Article</title>
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
            </div>
        </nav>
    </header>
    <div class="container">
        <main>
            <?php
            // Include the database connection file
            include 'database.php';

            // Retrieve the article ID from the query string
            if (isset($_GET['id'])) {
                $articleId = $_GET['id'];

                // Fetch the article from the database
                $query = "SELECT * FROM articles WHERE id = '$articleId'";
                $result = $conn->query($query);

                if ($result->num_rows > 0) {
                    $row = $result->fetch_assoc();
                    $title = $row['title'];
                    $content = $row['content'];
                    $pdfPath = $row['pdf']; // Path to the PDF file

                    echo '<h2>' . $title . '</h2>';
                    echo '<p>' . $content . '</p>';
                    
                    if ($pdfPath) {
                        echo '<p><a href="' . $pdfPath . '" target="_blank">View PDF</a></p>';
                    }
                } else {
                    echo '<p>Article not found.</p>';
                }
            } else {
                echo '<p>Invalid article ID.</p>';
            }

            // Close the database connection
            $conn->close();
            ?>
        </main>
    </div>
    
    <footer>
        <p>&copy; 2023 Online Wikipedia. All rights reserved.</p>
    </footer>
</body>
</html>
