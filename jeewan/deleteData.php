<?php 
// Delete Record
if(isset($_POST['delete'])) {
    include 'conn.php';
    $id = $_POST['id'];

    $sql = "DELETE FROM tbl_records WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        echo "Record deleted successfully";
    } else {
        echo "Error deleting record: " . $conn->error;
    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete Record</title>
</head>
<body>
    <h2>Delete Record</h2>
    <form action="deleteData.php" method="post">
        <label for="id">Enter ID of the record to delete:</label><br>
        <input type="text" id="id" name="id" required><br><br>
        <input type="submit" name="delete" value="Delete Record">
    </form>
</body>
</html>
