<?php
// delete_book.php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "new_books";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_GET['id'])) {
    $id = intval($_GET['id']);

    // Delete query
    $sql = "DELETE FROM new_book WHERE id = $id";
    if ($conn->query($sql) === TRUE) {
        // Redirect back to table.php with success message (optional)
        header("Location: table.php?msg=deleted");
        exit;
    } else {
        echo "Error deleting record: " . $conn->error;
    }
} else {
    echo "No ID specified.";
}

$conn->close();
?>
