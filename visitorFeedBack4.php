<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Visitor Feedback 3</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="modernizr.custom.65897.js"></script>
</head>

<body>
    <h2>Visitor Feedback 4</h2>
    <?php
        $dir = "./comments";
        if (is_dir($dir)) {
            //If file is a directory
            $commentFiles = scandir($dir);
            foreach ($commentFiles as $fileName) {
                //Loops though
                if ($fileName !== "." && $fileName !== "..") {
                    echo "From <strong>$fileName</strong><br>";
                    $filehandle = fopen($dir . "/" . $fileName, "rb");
                    if (!$filehandle) {
                        echo "There was an error reading file\"" . "\$fileName\".<br>\n";
                    } else {
                        $from = fgets($filehandle);
                        echo "From: " . htmlentities($from) . "<br>\n";
                        $email = fgets($filehandle);
                        echo "Email: " . htmlentities($email) . "<br>\n";
                        $date = fgets($filehandle);
                        echo "Date: " . htmlentities($date) . "<br>\n";
                        $comment = "";
                        while (!feof($filehandle)) {
                            $comment = fgets($filehandle);
                            echo htmlentities($comment) . "<br>\n";
                        }
                        echo "</hr>\n";
                        fclose($filehandle);
                    }
                    echo "<hr>\n";
                }
            }
        } else {
            echo "Folder \"$dir\" does not exist";
        }
        
    ?>
</body>

</html>