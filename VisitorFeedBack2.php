<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Visitor Feedback 2</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="modernizr.custom.65897.js"></script>
</head>

<body>
    <h2>Visitor Feedback 2</h2>
    <?php
        $dir = "./comments";
        if (is_dir($dir)) {
            $commentFiles = scandir($dir);
            foreach ($commentFiles as $fileName) {
                if ($fileName !== "." && $fileName !== "..") {
                    echo "From <strong>$fileName</strong><br>";
                    echo "<pre>\n";
                    readfile($dir . "/" .$fileName);
                    echo "</pre>\n";
                    echo "<hr>\n";
                }
            }
        } else {
            echo "Folder \"$dir\" does not exist";
        }
        
    ?>
</body>

</html>