<?php
// Include the database connection file
include 'database.php';

// Get the article details from the form submission
$title = $_POST['title'];
$content = $_POST['content'];

// Insert the article into the database
$query = "INSERT INTO articles (title, content) VALUES ('$title', '$content')";
$result = $conn->query($query);

if ($result === true) {
    // Article inserted successfully
    echo '<h2>Article Posted</h2>';
    echo '<p>Your article has been posted successfully.</p>';
} else {
    // Error occurred while inserting article
    echo '<h2>Error</h2>';
    echo '<p>An error occurred while posting the article. Please try again.</p>';
}

// Close the database connection
$conn->close();
?>
