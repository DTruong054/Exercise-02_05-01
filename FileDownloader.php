<?php
        $dir = "../Exercise02_01_01";
        if (isset($_GET['fileName'])) {
            $fileToGet = $dir . "/" .  stripslashes($_GET['fileName']);
            if (is_readable($fileToGet)) {
                $errorMsg = "";
                $showErrorPage = true;
            } else {
                $errorMsg = "Can't read \"$fileToGet\"";
                $showErrorPage = true;
            }
            
        } else {
            //Failure
            $errorMsg = "No name specified";
            $showErrorPage = true;
        }
        
        if ($showErrorPage) {
            //Starts a html
            ?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>File download error page</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="modernizr.custom.65897.js"></script>
</head>

<body>
    <p>There was an error downloading, "<?php echo htmlentities($_GET['fileName'])?>"</p>
    <p><?php echo htmlentities($errorMsg); ?></p>
</body>
</html>
    <?php
        }
    ?>