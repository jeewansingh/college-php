<?php
try{
   $connection = mysqli_connect('localhost','root','','db_blogs');
    $sql = "select * from semesters order by rank asc";
    $result = mysqli_query($connection,$sql);
    $semesters = [];
    if(mysqli_num_rows($result)  > 0){
       while ($sem = mysqli_fetch_assoc($result)) {
            array_push($semesters,$sem);
       }
    }
}catch(Exception $ex){
    die('Database Error: ' . $ex->getMessage());
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajax For Dropdown</title>
</head>
<body>
    <h1>Dropdown Ajax</h1>
    <form action="">
        <label for="">Semester</label>
        <select name="semester" id="semester">
            <option value="">Select Semester</option>
            <?php foreach($semesters as $semester){ ?>
                <option value="<?php echo $semester['id'] ?>"><?php echo $semester['name'] ?></option>
            <?php } ?>
        </select>
        <br>
        <label for="">Subject</label>
        <select name="subject" id="subject">
            <option value="">Select Subject</option>
        </select>
    </form>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script>
        $(document).ready(function(){
            $('#semester').change(function(){
                var sem = $(this).val();
                // ajax call
                $.ajax('load_subject.php',{
                    data:{'semester':sem},
                    dataType:'text',
                    method:'post',
                    success:function(response){
                        $('#subject').html(response);
                    }
                });
            });
        });
    </script>
</body>
</html>