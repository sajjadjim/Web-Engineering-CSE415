<?php
include 'db.php';

$id = $_GET['id'];

if(isset($_POST['update'])){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $address = $_POST['address'];

    $sql = "UPDATE users SET name='$name', email='$email', address='$address' WHERE id=$id";
    $conn->query($sql);
    header("Location: index.php");
}

$result = $conn->query("SELECT * FROM users WHERE id=$id");
$row = $result->fetch_assoc();
?>

<!DOCTYPE html>
<html>
<head>
 <title>Edit User</title>
</head>
<body>
<h2>Update User</h2>
<form method="POST">
 <input type="text" name="name" value="<?php echo $row['name']; ?>"><br>
 <input type="email" name="email" value="<?php echo $row['email']; ?>"><br>
 <input type="text" name="address" value="<?php echo $row['address']; ?>"><br>
 <button type="submit" name="update">Update</button>
</form>
</body>
</html>
