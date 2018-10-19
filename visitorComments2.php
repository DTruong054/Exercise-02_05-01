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
                //if user hit the submit button
                if (empty($_POST['name'])) {
                    //If user does not post a name...
                    echo "Unknown visitor\n";
                } else {
                    //If user has name...
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
                    $fileHandle = fopen($saveFileName, "wb");
                    if (!$fileHandle) {
                        //If no filehandle
                        echo "There was an error creating \"" . htmlentities($saveFileName) . "\".<br>\n";
                    } else {
                        //Writes filehandle
                        if (fwrite($fileHandle, $saveString)) {
                            echo "Successfully wrote to file \"" . htmlentities($saveFileName) . "\".<br>\n";
                        } else {
                            echo "There was an error writing \"" . htmlentities($saveFileName) . "\".<br>\n";
                        }
                        //Close the file
                        fclose($fileHandle);
                    }
                    


                    //Grabs the file
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
    <h2>Visitor Comments 2</h2>
    <form action="visitorComments2.php" method="post">
        Your name: <input type="text" name="name"> <br>
        Your email <input type="text" name="email"> <br>
        <textarea name="comment" id="" rows="6" cols="100"></textarea> <br>
        <input type="submit" name="save" value="Submit your comment">
    </form>
</body>

</html>