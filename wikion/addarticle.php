<!DOCTYPE html>
<html>
<head>
    <title>Online Wikipedia - Add Article</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <style>
        .add-article {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            background-color: #f9f9f9;
            border-radius: 5px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .add-article h2 {
            margin-top: 0;
            color: #333;
            font-size: 24px;
        }

        .add-article form {
            margin-top: 20px;
        }

        .add-article label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
            color: #555;
        }

        .add-article input[type="text"],
        .add-article textarea,
        .add-article select {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 16px;
        }

        .add-article button {
            display: inline-block;
            padding: 10px 20px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 4px;
            font-size: 16px;
            cursor: pointer;
        }

        .add-article button:hover {
            background-color: #0056b3;
        }
    </style>
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
            <section class="add-article">
                <h2>Add Article</h2>
                <?php
                // Include the database connection file
                include 'database.php';

                // Function to generate a unique file name
                function generateFileName($originalName, $uploadFolder)
                {
                    $extension = pathinfo($originalName, PATHINFO_EXTENSION);
                    $filename = uniqid() . '.' . $extension;
                    $filepath = $uploadFolder . '/' . $filename;
                    return $filepath;
                }

                // Check if the form is submitted
                if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                    // Get the form data
                    $title = $_POST['title'];
                    $content = $_POST['content'];
                    $category = $_POST['category'];
                    $pdfName = $_FILES['pdf']['name'];
                    $pdfTmpName = $_FILES['pdf']['tmp_name'];

                    // Folder to store uploaded PDF files
                    $uploadFolder = 'uploads';

                    // Check if the folder exists, if not, create it
                    if (!is_dir($uploadFolder)) {
                        mkdir($uploadFolder, 0755, true);
                    }

                    // Generate a unique file name
                    $pdfPath = generateFileName($pdfName, $uploadFolder);

                    // Move the uploaded PDF file to the uploads directory
                    if (move_uploaded_file($pdfTmpName, $pdfPath)) {
                        // Insert the article into the database
                        $query = "INSERT INTO articles (title, content, category, pdf) VALUES ('$title', '$content', '$category', '$pdfPath')";

                        if ($conn->query($query) === TRUE) {
                            echo "<p class='success-message'>Article added successfully</p>";
                        } else {
                            echo "<p class='error-message'>Error: " . $query . "<br>" . $conn->error . "</p>";
                        }
                    } else {
                        echo "<p class='error-message'>File upload failed</p>";
                    }
                }
                ?>

                <form action="addarticle.php" method="POST" enctype="multipart/form-data">
                    <label for="title">Title:</label>
                    <input type="text" name="title" id="title" required>

                    <label for="content">Content:</label>
                    <textarea name="content" id="content" rows="10" required></textarea>

                    <label for="category">Category:</label>
                    <select name="category" id="category" required>
                        <option value="Category 1">Crypto</option>
                        <option value="Category 2">Category 2</option>
                        <option value="Category 3">Category 3</option>
                        <!-- Add more options as needed -->
                    </select>

                    <label for="pdf">PDF File:</label>
                    <input type="file" name="pdf" id="pdf" accept="application/pdf" required>

                    <button type="submit">Add Article</button>
                </form>
            </section>
        </main>
    </div>
    
    <footer>
        <p>&copy; 2023 Online Wikipedia. All rights reserved.</p>
    </footer>
</body>
</html>
