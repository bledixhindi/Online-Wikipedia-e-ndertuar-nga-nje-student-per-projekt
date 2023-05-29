<!DOCTYPE html>
<html>
<head>
    <title>Online Wikipedia - Login</title>
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
            <section class="login">
                <h2>Login</h2>
                <?php
                // Include the database connection file
                include 'database.php';

                // Check if the form is submitted
                if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                    // Get the form data
                    $email = $_POST['email'];
                    $password = $_POST['password'];

                    // Check if the user exists in the database
                    $query = "SELECT * FROM users WHERE email = '$email' AND password = '$password'";
                    $result = $conn->query($query);

                    if ($result->num_rows > 0) {
                        // User exists, perform login
                        session_start();
                        $_SESSION['email'] = $email;
                        header('Location: index.php');
                        exit;
                    } else {
                        // User does not exist or incorrect credentials
                        echo "<p>Invalid email or password. Please try again.</p>";
                    }
                }
                ?>

                <form action="login.php" method="POST">
                    <label for="email">Email:</label>
                    <input type="email" name="email" id="email" required>

                    <label for="password">Password:</label>
                    <input type="password" name="password" id="password" required>

                    <button type="submit">Login</button>
                </form>
            </section>
        </main>
    </div>
    
    <footer>
        <p>&copy; 2023 Online Wikipedia. All rights reserved.</p>
    </footer>
</body>
</html>
