<?php
include 'conn.php';
$sql = "SELECT * FROM tbl_records";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "id: ".$row['id']. " Name: " . $row["name"]. " - Rank: " . $row["rank"]. " - Status: " . $row["status"]. " - Created By: " . $row["created_by"] . "<br>";
        echo '<img src="data:image/jpeg;base64,'.base64_encode($row['image']).'" width="200" height="200"/><br>'; // Display image
        // Display other fields as needed
    }
} else {
    echo "0 results";
}
?>