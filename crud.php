<?php
$server = 'localhost';
$username = 'root';
$password = '';
$database = 'db_20_jeewan_lab';


try {
    // Create Connection
    $conn = mysqli_connect($server, $username, $password);
    if (!$conn) {
        die('Failed: '. mysqli_connect_error());
    }

    // Create Database
    $sql="CREATE DATABASE IF NOT EXISTS db_20_jeewan_lab";
    $result=mysqli_query($conn,$sql);
    if ($result){
        echo"Database Created <br />";
    }else{
        echo "Failed Creating Database";
    }

    //Create Table
    $conn = mysqli_connect($server, $username, $password, $database);
    $sql = "CREATE TABLE IF NOT EXISTS tbl_students_20 (
            Id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
            Name VARCHAR(25),
            Email VARCHAR(25),
            Phone BIGINT (10),
            Program VARCHAR(16),
            Semester VARCHAR(16)
            )";
    $result=mysqli_query($conn,$sql);
    if ($result){
        echo "Table Created <br />";
    }else {
        echo "Failed Creating Table";
    }

    // Insert Data into Table
    // $sql = "INSERT INTO tbl_students_20 (Name, Email, Phone, Program, Semester) VALUES
    //         ('Jeewan Singh','jeewan@gmail.com',9876543210,'BCA','4th'),
    //         ('Ram Thapa','ram@gmail.com',9876873210,'BBA','6th'),
    //         ('Shyam Bahadur','shyam@gmail.com',9876745210,'BBS','1st'),
    //         ('Sita kumari','sita@gmail.com',9872457210,'BIT','5th'),
    //         ('Hari','hari@gmail.com',9800043210,'BScCSIT','8th')
    //         ";
    // $result=mysqli_query($conn,$sql);
    // if ($result){
    //     echo "Data Inserted Succesfully <br />";
    // }else{
    //     echo "Data Insertion Failed";
    // }

    //Delete Data from Table
    $sql = "DELETE FROM tbl_students_20 WHERE Name='Hari' ";
    $result=mysqli_query($conn,$sql);
    if ($result){
        echo "Deleted Sucessfully <br />";
    } else {
        echo "Deletion Failed";
    }

    // Update a Data in Table
    $sql = "UPDATE tbl_students_20 SET Email='jeewanupdated@gmail.com' WHERE Email='jeewan@gmail.com '";
    $result=mysqli_query($conn,$sql);
    if ($result){
        echo "Data Updated Successfully <br />";
    } else {
        echo "Failed Updating";
    }

    // Select Data from table
    $sql = "SELECT * FROM tbl_students_20";
    $result=mysqli_query($conn,$sql);
    $students = [];
    if ($result){
        while ($row = mysqli_fetch_assoc($result)){
            array_push($students, $row);
        }
    } else {
        echo "Data not found";
    }
?>
    <table border="1">
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Program</th>
                <th>Semester</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($students as $key => $student) { ?>
            <tr>
                <td> <?php echo $student['Name'] ?> </td>
                <td> <?php echo $student['Email'] ?> </td>
                <td> <?php echo $student['Phone'] ?> </td>
                <td> <?php echo $student['Program'] ?> </td>
                <td> <?php echo $student['Semester'] ?> </td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
<?php 

}catch (mysqli_sql_exception $e) {
    echo "Error: ". $e->getMessage() ."";
}
?>