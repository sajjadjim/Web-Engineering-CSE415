<?php
// Database connection variables
$servername = "localhost";
$username = "root"; // default username for XAMPP
$password = "";     // default password for XAMPP (empty)
$dbname = "new_books"; // the name of the database we created

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if form data is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $title = $_POST['title'];
    $author = $_POST['author'];
    $description = $_POST['description'];

    // Prepare SQL query to insert data into the books table
    $sql = "INSERT INTO new_book (Title, Author, Description) 
            VALUES ('$title', '$author', '$description')";

    // Check if insertion is successful
    if ($conn->query($sql) === TRUE) {
        // Show success modal with animation and redirect after 2 seconds
        echo '
        <div id="successModal" style="
            position: fixed;
            top: 0; left: 0; width: 100vw; height: 100vh;
            background: rgba(0,0,0,0.5);
            display: flex; align-items: center; justify-content: center;
            z-index: 9999; opacity: 0; animation: fadeIn 1s forwards;">
            <div id="modalContent" style="
                background: #fff;
                padding: 30px 40px;
                border-radius: 8px;
                box-shadow: 0 2px 8px rgba(0,0,0,0.2);
                text-align: center; opacity: 0; animation: slideUp 0.5s forwards;">
                <h2>Success!</h2>
                <p>New record created successfully.</p>
            </div>
        </div>
        <script>
            // Add fade-in and slide-up animations
            document.getElementById("successModal").style.opacity = "1";
            document.getElementById("modalContent").style.opacity = "1";

            setTimeout(function() {
                window.location.href = "table.php";
            }, 2000);
        </script>
        <style>
            @keyframes fadeIn {
                from { opacity: 0; }
                to { opacity: 1; }
            }

            @keyframes slideUp {
                from { transform: translateY(20px); opacity: 0; }
                to { transform: translateY(0); opacity: 1; }
            }
        </style>
        ';
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Close the connection
$conn->close();
?>
