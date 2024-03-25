<?php
// Database connection details
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "db_blogs";


// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Function to validate input data


$sql = "CREATE TABLE IF NOT EXISTS records (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    rank VARCHAR(50) NOT NULL,
    status VARCHAR(50) NOT NULL,
    image longblob NOT NULL,
    created_by VARCHAR(100) NOT NULL,
    updated_by VARCHAR(100),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
    )";

$result=mysqli_query($conn,$sql);
if ($result){
echo "Table Created <br />";
}else {
echo "Failed Creating Table";
}

// Create record
if (isset($_POST['submit'])) {
    $name =  trim($_POST['name']);
    $rank =  trim($_POST['rank']);
    $status =  trim($_POST['status']);
    $image = file_get_contents($_FILES['image']['tmp_name']);
    $image = addslashes($image);
    $created_by =  trim($_POST['created_by']);
    
    $sql = "INSERT INTO records (name, rank, status, image, created_by, created_at) 
            VALUES ('$name', '$rank', '$status', '$image', '$created_by', NOW())";

    if ($conn->query($sql) === TRUE) {
        echo "Record created successfully";
    } else {
        echo "Error creating record: " . $conn->error;
    }
}

// Update record
if (isset($_POST['update'])) {
    $id =  trim($_POST['id']);
    $name =  trim($_POST['name']);
    $rank =  trim($_POST['rank']);
    $status =  trim($_POST['status']);
    $image = file_get_contents($_FILES['image']['tmp_name']);
    $image = addslashes($image);
    $updated_by =  trim($_POST['updated_by']);
    
    $sql = "UPDATE records 
            SET name='$name', rank='$rank', status='$status', image='$image', updated_by='$updated_by', updated_at=NOW() 
            WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        echo "Record updated successfully";
    } else {
        echo "Error updating record: " . $conn->error;
    }
}

// Delete record
if (isset($_GET['delete'])) {
    $id = ($_GET['id']);

    $sql = "DELETE FROM records WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        echo "Record deleted successfully";
    } else {
        echo "Error deleting record: " . $conn->error;
    }
}

// Retrieve records
$sql = "SELECT * FROM records";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD Operations</title>
</head>
<body>

<h2>Create Record</h2>
<form method="post" action="" enctype="multipart/form-data">
    <label>Name: <input type="text" name="name" required></label><br>
    <label>Rank: <input type="text" name="rank" required></label><br>
    <label>Status: <input type="text" name="status" required></label><br>
    <label>Image: <input type="file" name="image" required></label><br>
    <label>Created By: <input type="text" name="created_by" required></label><br>
    <input type="submit" name="submit" value="Create Record">
</form>

<h2>Update Record</h2>
<form method="post" action="" enctype="multipart/form-data">
    <label>ID: <input type="text" name="id" required></label><br>
    <label>Name: <input type="text" name="name" required></label><br>
    <label>Rank: <input type="text" name="rank" required></label><br>
    <label>Status: <input type="text" name="status" required></label><br>
    <label>Image: <input type="file" name="image" required></label><br>
    <label>Updated By: <input type="text" name="updated_by" required></label><br>
    <input type="submit" name="update" value="Update Record">
</form>

<h2>Delete Record</h2>
<form method="get" action="">
    <label>ID: <input type="text" name="id" required></label><br>
    <input type="submit" name="delete" value="Delete Record">
</form>

<h2>Record List</h2>
<?php
if ($result->num_rows > 0) {
    ?>
    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Rank</th>
                <th>Status</th>
                <th>Image</th>
                <th>Created By</th>
                <th>Updated By</th>
                <th>Created At</th>
                <th>Updated At</th>
            </tr>
        </thead>
        <tbody>
            <?php
    while ($row = $result->fetch_assoc()) {
        echo '
        <tr>
            <td>' . $row['id'] . '</td>
            <td>' . $row['name'] . '</td>
            <td>' . $row['rank'] . '</td>
            <td>' . $row['status'] . '</td>
            <td><img src="data:image/jpeg;base64,' . base64_encode($row['image']) . '" width="200" height="200"/><br></td>
            <td>' . $row['created_by'] . '</td>
            <td>' . $row['updated_by'] . '</td>
            <td>' . $row['created_at'] . '</td>
            <td>' . $row['updated_at'] . '</td>
        </tr>
    ';
    
    }
} else {
    echo "0 results";
}
?>
        </tbody>
</table>

</body>
</html>

<?php
$conn->close();
?>
