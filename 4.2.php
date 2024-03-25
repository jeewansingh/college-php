<?php

if (isset($_POST['btnSave'])){
    //FILE UPLOAD
    if (isset($_FILES['file'])){
        $file = $_FILES['file'];
        if ($file['error'] == 0){
            if($file['size'] < 1000000){
                $filetype = ['application/pdf','application/vnd.openxmlformats-officedocument.wordprocessingml.document'];
                if (in_array($file['type'], $filetype )){
                    $filename = uniqid(). $file['name'] ;
                    $filesave = move_uploaded_file($file['tmp_name'], 'files/'. $filename);
                    if ($filesave ){
                        echo 'File has been Uploaded.';
                    }
                    else {
                        $error['file'] = 'Upload Failed';
                    }
                } else {
                    $error['file'] = 'File should be in .pdf or .docx';
                }
            } else {
                $error['file'] = 'File Size should be less than 2MB';
            }
        } else {
            $error['file'] = 'Error in File';
        }
    } else {
        $error['file'] = 'File Upload Failed';
}

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>File</title>

</head>
<body>
    <h2>File Upload</h2>
    <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post" enctype="multipart/form-data">
        <label for="file">Upload Your Cv</label>
        <input type="file" accept=".pdf, .docx" name="file"/>
        <div><?php echo isset($error['file']) ? $error['file'] : '';?></div>
        <br />
        <button type="submit" name="btnSave">Save</button>
    </form>
</body>
</html>