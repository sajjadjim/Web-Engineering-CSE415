<?php
// Database connection variables
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "new_books";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch data from new_book table
$sql = "SELECT id, Title, Author, Description FROM new_book";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <title>Books List with Update/Delete</title>

    <!-- DataTables CSS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css" />

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>

    <!-- DataTables JS -->
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>

    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 40px;
        }
        h2 {
            margin-bottom: 20px;
        }
        #updateForm {
            display: none;
            margin-bottom: 30px;
            padding: 20px;
            border: 2px solid #333;
            background-color: #f9f9f9;
            width: 50%;
        }
        #updateForm label {
            display: block;
            margin-top: 10px;
        }
        #updateForm input[type="text"], #updateForm textarea {
            width: 100%;
            padding: 7px;
            margin-top: 5px;
        }
        #updateForm button {
            margin-top: 15px;
            padding: 10px 20px;
        }
        .action-btn {
            cursor: pointer;
            padding: 5px 10px;
            margin: 0 3px;
            border: none;
            border-radius: 3px;
            color: white;
        }
        .update-btn {
            background-color: #4CAF50;
        }
        .delete-btn {
            background-color: #f44336;
        }
    </style>

</head>
<body>

    <h2>Books List with Update/Delete</h2>

    <!-- Update form -->
    <div id="updateForm">
        <h3>Update Book</h3>
        <form id="formUpdate" method="POST" action="update_book.php">
            <input type="hidden" name="id" id="update_id" required>

            <label for="update_title">Title:</label>
            <input type="text" id="update_title" name="title" required>

            <label for="update_author">Author:</label>
            <input type="text" id="update_author" name="author" required>

            <label for="update_description">Description:</label>
            <textarea id="update_description" name="description" rows="4" required></textarea>

            <button type="submit">Update Book</button>
            <button type="button" id="cancelUpdate">Cancel</button>
        </form>
    </div>

    <table id="booksTable" class="display" style="width:100%">
        <thead>
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Author</th>
                <th>Description</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if ($result && $result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . htmlspecialchars($row['id']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['Title']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['Author']) . "</td>";
                    echo "<td>" . htmlspecialchars($row['Description']) . "</td>";
                    echo '<td>
                        <button class="action-btn update-btn" 
                            data-id="'.htmlspecialchars($row['id']).'" 
                            data-title="'.htmlspecialchars($row['Title'], ENT_QUOTES).'" 
                            data-author="'.htmlspecialchars($row['Author'], ENT_QUOTES).'" 
                            data-description="'.htmlspecialchars($row['Description'], ENT_QUOTES).'">Update</button>
                        <button class="action-btn delete-btn" data-id="'.htmlspecialchars($row['id']).'">Delete</button>
                    </td>';
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='5'>No records found</td></tr>";
            }
            ?>
        </tbody>
    </table>

    <script>
        $(document).ready(function() {
            // Initialize DataTable
            $('#booksTable').DataTable({
                pageLength: 5,
                lengthMenu: [5, 10, 25, 50]
            });

            // Show update form and fill it when Update button clicked
            $('.update-btn').on('click', function() {
                $('#update_id').val($(this).data('id'));
                $('#update_title').val($(this).data('title'));
                $('#update_author').val($(this).data('author'));
                $('#update_description').val($(this).data('description'));

                $('#updateForm').slideDown();
                // Scroll to update form
                $('html, body').animate({scrollTop: $("#updateForm").offset().top - 20}, 500);
            });

            // Cancel button hides the update form
            $('#cancelUpdate').on('click', function() {
                $('#updateForm').slideUp();
            });

            // Delete button with confirmation
            $('.delete-btn').on('click', function() {
                let id = $(this).data('id');
                if(confirm("Are you sure you want to delete this record?")) {
                    // Redirect to delete script with id parameter
                    window.location.href = "delete_book.php?id=" + id;
                }
            });
        });
    </script>

</body>
</html>

<?php
$conn->close();
?>
