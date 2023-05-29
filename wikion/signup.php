<!DOCTYPE html>
<html>
<head>
    <title>Online Wikipedia - Sign Up</title>
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
        <main class="main-content">
            <section class="signup">
                <h2>Sign Up</h2>
                <?php
                // Include the database connection file
                include 'database.php';

                // Check if the form is submitted
                if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                    // Get the form data
                    $name = $_POST['name'];
                    $email = $_POST['email'];
                    $password = $_POST['password'];

                    // Insert the user into the database
                    $query = "INSERT INTO users (name, email, password) VALUES ('$name', '$email', '$password')";

                    if ($conn->query($query) === TRUE) {
                        echo "<p>Registration successful. You can now <a href='login.php'>log in</a>.</p>";
                    } else {
                        echo "<p>Error: " . $query . "<br>" . $conn->error . "</p>";
                    }
                }
                ?>

                <form action="signup.php" method="POST">
                    <label for="name">Name:</label>
                    <input type="text" name="name" id="name" required>

                    <label for="email">Email:</label>
                    <input type="email" name="email" id="email" required>

                    <label for="password">Password:</label>
                    <input type="password" name="password" id="password" required>

                    <button type="submit">Sign Up</button>
                </form>
            </section>
        </main>
    </div>
    
    <footer>
        <p>&copy; 2023 Online Wikipedia. All rights reserved.</p>
    </footer>
</body>
</html>
