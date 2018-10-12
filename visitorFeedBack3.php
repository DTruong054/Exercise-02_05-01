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
    <h2>Visitor Feedback 3</h2>
    <?php
        $dir = "./comments";
        if (is_dir($dir)) {
            $commentFiles = scandir($dir);
            foreach ($commentFiles as $fileName) {
                if ($fileName !== "." && $fileName !== "..") {
                    echo "From <strong>$fileName</strong><br>";
                    $comments = file($dir . "/" .$fileName);
                    echo "From: " . htmlentities($comments[0]) . "<br>\n";
                    echo "Email: " . htmlentities($comments[1]) . "<br>\n";
                    echo "Date: " . htmlentities($comments[2]) . "<br>\n";
                    $commentLines = count($comments);
                    for ($i = 3; $i < $commentLines; $i++) { 
                        echo htmlentities($comments[$i]) . "<br>\n";
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