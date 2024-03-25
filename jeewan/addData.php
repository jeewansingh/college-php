<?php
if(isset($_POST['create'])) {
    $servername = "127.0.0.1";
    $username = "root";
    $password = "";
    $database = "db_users";

    $conn = new mysqli($servername, $username, $password, $database);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
    $name = trim($_POST['name']);
    $rank = trim($_POST['rank']);
    $status = trim($_POST['status']);
    $image = file_get_contents($_FILES['image']['tmp_name']);
    $image = addslashes($image);
    $created_by = trim($_POST['created_by']);

    $sql = "INSERT INTO tbl_records (name, rank, status, image, created_by, created_at, updated_at) 
    VALUES ('$name', '$rank', '$status', '$image', '$created_by', NOW(), NOW())";

    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
$conn->close();
}



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Lab5 add</title>
</head>
<body>
    <form action="addData.php" method="post" enctype="multipart/form-data">
        <label for="name">Name:</label><br>
        <input type="text" id="name" name="name" required><br>
        
        <label for="rank">Rank:</label><br>
        <input type="number" id="rank" name="rank" required><br>
        
        <label for="status">Status:</label><br>
        <input type="number" id="status" name="status" required><br>
        
        <label for="image">Image:</label><br>
        <input type="file" id="image" name="image" required><br>
        
        <label for="created_by">Created By:</label><br>
        <input type="text" id="created_by" name="created_by" required><br><br>

        
        <input type="submit" name="create" value="Create">
    </form>  
</body>
</html>