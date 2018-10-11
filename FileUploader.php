<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Page Title</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="modernizr.custom.65897.js"></script>
</head>

<body>
    <h2>File Uploader</h2>
    <?php
        $dir = ".";
        if (isset($_POST['upload'])) {
            if (isset($_FILES['newFile'])) {
                //Line below has bug
                if (move_uploaded_file($_FILES['newFile']['tmp_name'], $dir . "/" . $_FILES['newFile']['name']) === true) {
                    // chmod($dir . "/" . $_FILES['newFile']['name'], 0644);
                    echo 'File \"' . htmlentities($_FILES['newFile']['name']) . "\" successfully uploaded.<br>\n";
                } 
                else{
                    echo 'There was an error uploading "' . htmlentities($_FILES['newFile']['name']) . "\".<br>\n";
                }
            }
        }
    ?>
    <form action="FileUploader.php" method="POST" enctype="multipart/form-data">
    <!-- Hidden Form -->
        <input type="hidden" name="MAX_FILE_SIZE" value="25000">
        File to upload: <input type="file" name="newFile"> <br>
        (25,0000 byte limit) <br>
        <input type="submit"  name="upload" value="Upload the file"> <br>
    </form>
</body>

</html>