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
        $openDir = opendir($dir);
        while ($curFile = readdir($openDir)) {
            if (strcmp($curFile, '.') !== 0 && strcmp($curFile, '..') !== 0) {
                echo "$curFile<br>";
                //Links to all the files 
                echo "<a href=\"$dir/$curFile\">$curFile</a>";
            }
        }
        closedir($openDir);
    ?>
</body>

</html>