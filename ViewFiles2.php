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
    <h2>View Files</h2>
    <?php
    //Going into another project file
        $dir = "../Exercise02_01_01";
        $dirEntry = scandir($dir);
        foreach ($dirEntry as $entry) {
            if (strcmp($entry, '.') !== 0 && strcmp($entry, '..') !== 0) {
                echo "$entry<br>";
                //Links to all the files 
                echo "<a href=\"$dir/$entry\">$entry</a>";
            }
        }
    ?>
</body>

</html>