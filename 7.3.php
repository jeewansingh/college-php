<?php
if (isset($_POST['btnSave'])){
    if (isset($_FILES['file'])){
        $file = $_FILES['file'];
        if ($file['error'] == 0){
            if($file['size'] < 1024*1024){
                $filetype = ['image/png', 'image/jpg', 'image/jpeg'];
                if (in_array($file['type'], $filetype )){
                    $filename = uniqid(). $file['name'] ;
                    $upload_path = 'files/' . $filename;
                    $filesave = move_uploaded_file($file['tmp_name'], $upload_path);
                    if ($filesave ){
                        echo 'File has been Uploaded.';
                        echo '<h2>Uploaded Image:</h2>';
                        echo '<img src="' . $upload_path . '" alt="Uploaded Image" width="300">';
                        echo '<p><strong>File Name:</strong> ' . $file['name'] . '</p>';
                        echo '<p><strong>File Type:</strong> ' . $file['type'] . '</p>';
                        echo '<p><strong>File Size:</strong> ' . $file['size']/1024 . ' KB</p>';
                    }
                    else {
                        echo 'Upload Failed';
                    }
                } else {
                    echo 'File should be Image';
                }
            } else {
                echo 'File Size should be less than 1MB';
            }
            
        } else {
            echo 'Error in File';
        }
    } else {
        echo 'File Upload Failed';
}

}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Form</title>
</head>
<body>
    <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post" enctype="multipart/form-data">
        Upload Image:
        <input type="file" accept=".png, .jpg, .jpeg" name="file"/><br>
        <button type="submit" name="btnSave">Save</button>
    </form>
    <?php
    ?>
</body>
</html>