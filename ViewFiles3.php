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
        //Starting creating a table in php
        echo "<table border='1' width='100%'>";
        echo "<tr><th colspan='4'>Directory Listing for <strong>" . htmlentities($dir) . "</strong></th></tr>\n";
        echo "<tr>";
        echo "<th><strong><em>Name</em></strong></th>";
        echo "<th><strong><em>Owner</em></strong></th>";
        echo "<th><strong><em>Permissions</em></strong></th>";
        echo "<th><strong><em>Size</em></strong></th>";
        echo "</tr>";
        foreach ($dirEntry as $entry) {
            if (strcmp($entry, '.') !== 0 && strcmp($entry, '..') !== 0) {
                $fullEntryName = $dir . "/" . $entry;
                echo "<tr><td>";
                if (is_file($fullEntryName)) {
                    //If is a file...
                    echo "<a href=\"$fullEntryName\">$fullEntryName</a><br>\n";
                } else {
                    //If not a file...
                    echo htmlentities($entry);
                }
                echo "</td><td align='center'>" . fileowner($fullEntryName);
                if (is_file($fullEntryName)) {
                    $perms = fileperms($fullEntryName);
                    $perms = decoct($perms % 01000);
                    echo "</td><td align='center'>0$perms";
                    echo "</td><td align='right'>" . number_format(filesize($fullEntryName),0) . " bytes";
                } else{
                    echo "</td><td colspan='2' align='center'>&lt;DIR&gt;";
                }
                echo "</td></tr>";
            }
        }
        echo "</table>";
    ?>
</body>

</html>