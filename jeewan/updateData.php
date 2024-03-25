<?php
if(isset($_POST['update'])) {
    include 'conn.php';

    $id = trim($_POST['id']);
    $name = trim($_POST['name']);
    $rank = trim($_POST['rank']);
    $status = trim($_POST['status']);
    $image = file_get_contents($_FILES['image']['tmp_name']);
    $image = addslashes($image);
    $updated_by = trim($_POST['updated_by']);

    $sql = "UPDATE tbl_records SET name='$name', rank='$rank', status='$status', image='$image', updated_by='$updated_by', updated_at=NOW() WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        echo "Record updated successfully";
    } else {
        echo "Error updating record: " . $conn->error;
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Lab5 update</title>
</head>
<body>
    <form action="updateData.php" method="post" enctype="multipart/form-data">
        <label for="id">Enter the id of user to edit</label><br>
        <input type="text" id="id" name="id" required><br>

        <label for="name">Name:</label><br>
        <input type="text" id="name" name="name" required><br>
        
        <label for="rank">Rank:</label><br>
        <input type="number" id="rank" name="rank" required><br>
        
        <label for="status">Status:</label><br>
        <input type="number" id="status" name="status" required><br>
        
        <label for="image">Image:</label><br>
        <input type="file" id="image" name="image" required><br>
        
        <label for="updated_by">updated By:</label><br>
        <input type="text" name="updated_by" required><br><br>
        
        <input type="submit" name="update" value="update">
    </form>  
</body>
</html>