
<?php
$semester_id = $_POST['semester'];
try{
    $connection = mysqli_connect('localhost','root','','db_blogs');
     $sql = "select * from subjects where semester_id=$semester_id";
     $result = mysqli_query($connection,$sql);
     $subject = "<option value=''>Select Subject</option>";
     if(mysqli_num_rows($result)  > 0){
        while ($sub = mysqli_fetch_assoc($result)) {
            $subject .= "<option value='" . $sub['id'] . "'>" . $sub['title'] ."</option>";
        }
     }
     echo $subject;
 }catch(Exception $ex){
     die('Database Error: ' . $ex->getMessage());
 }
?>