<?php
// update_book.php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "new_books";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = intval($_POST['id']);
    $title = $conn->real_escape_string($_POST['title']);
    $author = $conn->real_escape_string($_POST['author']);
    $description = $conn->real_escape_string($_POST['description']);

    $sql = "UPDATE new_book SET Title='$title', Author='$author', Description='$description' WHERE id = $id";

    if ($conn->query($sql) === TRUE) {
        // Redirect back to table.php with success message (optional)
        header("Location: table.php?msg=updated");
        exit;
    } else {
        echo "Error updating record: " . $conn->error;
    }
} else {
    echo "Invalid request.";
}

$conn->close();
?>
