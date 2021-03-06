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
    
    <?php
        $dir = "./comments";
        if (is_dir($dir)) {
            // Success
            if (isset($_POST['save'])) {
                if (empty($_POST['name'])) {
                    echo "Unknown visitor\n";
                } else {
                    $saveString = stripslashes($_POST['name']) . "\n";
                    $saveString .= stripslashes($_POST['email']) . "\n";
                    $saveString .= date('r') . "\n";
                    $saveString .= stripslashes($_POST['comment']) . "\n";
                    echo "\$saveString: $saveString <br>";
                    $currentTime = microtime();
                    echo "\$currentTime: $currentTime <br>";
                    $timeArray = explode(" ", $currentTime);
                    echo var_dump($timeArray) . "<br>";
                    $timeStamp = (float)$timeArray[1] + (float)$timeArray[0];
                    echo "\$timeStamp: $timeStamp <br>";
                    $saveFileName = "$dir/Comment.$timeStamp.txt";
                    echo "\$saveFileName: $saveFileName <br>";
                    if (file_put_contents($saveFileName, $saveString) > 0) {
                        echo 'File  "' . htmlentities($saveFileName) . "\"successfully saved.<br>\n";
                    } else {
                        echo 'There was an error writing "' . htmlentities($saveFileName) . "\".<br>\n";
                    }
                    
                }
                
            }
            
        } else {
            //Fail
            mkdir($dir);
            chmod($dir, 0757);
        }
        
    ?>
    <h2>Visitor Comments</h2>
    <form action="vistorComments.php" method="post">
        Your name: <input type="text" name="name"> <br>
        Your email <input type="text" name="email"> <br>
        <textarea name="comment" id="" rows="6" cols="100"></textarea> <br>
        <input type="submit" name="save" value="Submit your comment">
    </form>
</body>

</html>