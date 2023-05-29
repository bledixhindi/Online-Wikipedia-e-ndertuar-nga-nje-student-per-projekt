<?php
// Include the database connection file
include 'database.php';

// Get the form data
$title = $_POST['title'];
$content = $_POST['content'];

// Image upload
$image = "";
$targetDirectory = "images/";

if (!empty($_FILES['image']['name'])) {
    // Create the images directory if it doesn't exist
    if (!is_dir($targetDirectory)) {
        mkdir($targetDirectory, 0777, true);
    }

    $targetFile = $targetDirectory . basename($_FILES['image']['name']);
    $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

    // Check if the file is a valid image
    $check = getimagesize($_FILES['image']['tmp_name']);
    if ($check !== false) {
        if (move_uploaded_file($_FILES['image']['tmp_name'], $targetFile)) {
            $image = $targetFile;
        }
    }
}

// Insert the article into the database
$sql = "INSERT INTO articles (title, content, image) VALUES ('$title', '$content', '$image')";

if ($conn->query($sql) === TRUE) {
    // Redirect to the index page after saving the article
    header("Location: index.php");
    exit();
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Close the database connection
$conn->close();
?>
