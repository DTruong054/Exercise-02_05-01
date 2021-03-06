<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Backup Comments</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="modernizr.custom.65897.js"></script>
</head>

<body>
    <h2>Backup Comments</h2>
    <?php
    //Grabbing from other files
        $source = "./comments";
        $destination = "./backups";
        if (!is_dir($destination)) {
            //failure
            mkdir($destination);
            chmod($destination, 0757);
        }
        if (is_dir($source)) {
            $totalFiles = 0;
            $filesCopied = 0;
            $dirEntries = scandir($source);
            foreach ($dirEntries as $entry) {
                //Loop though
                if ($entry !== "." && $entry !== "..") {
                    ++$totalFiles;
                    if (copy("$source/$entry", "$destination/$entry")) {
                        ++$filesCopied;
                    } else {
                        echo "Could not copy file '" . htmlentities($entry) . "'. <br>\n";
                    }
                }
            }
            //Echo how many files backed up
            echo "<p>$filesCopied of $totalFiles files successfully backed up.<br>\n</p>";
        } else {
            //Failed or could not find directory
            echo "The sourse directory '$source' does not exist, nothing to back up\n";
        }
    ?>
</body>

</html>