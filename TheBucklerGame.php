<!DOCTYPE html>
<!-- 
    Name: Daniel Truong
    FileName: TheBucklerGame.php
    Date: 10.8.18 
-->
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>The Buckler's game</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="modernizr.custom.65897.js"></script>
</head>
<body>
    <?php
        //Entry code
        // How did we get here?
        // On submit process the data
        //Validate and write to file
        $dir = ".";
        $saveFileName = './TheBucklerGame.txt';
        $saveString = "";
        $dataArray = "";

        function displayAlert($message) {
            echo "<script>alert('$message');</script>";
        }
        if (is_dir($dir)) {
            if (isset($_POST['save'])) {
                if (empty($_POST['username'])) {
                    displayAlert("Unknown Username");
                } else{
                    $dataArray[] = stripslashes($_POST['username']);
                    $dataArray[] = md5(stripslashes($_POST['password']));
                    $dataArray[] = stripslashes($_POST['fullName']);
                    $dataArray[] = stripslashes($_POST['email']);
                    $dataArray[] = stripslashes($_POST['age']);
                    $dataArray[] = stripslashes($_POST['screenName']);
                    $dataArray[] = stripslashes($_POST['comments']);
                    $saveString = implode(";", $dataArray);
                    $saveString .= "\n";
                    //Debug
                    echo "\$saveString = $saveString <br>";
                    $fileHandle = fopen($saveFileName, "ab");
                    if (!$fileHandle) {
                        displayAlert("There was an error creating $saveFileName");
                    } else {
                        if (flock($fileHandle, LOCK_EX)) {
                            if (fwrite($fileHandle, $saveString) > 0) {
                                displayAlert("Successfully wrote to file $saveFileName");
                            } else {
                                displayAlert("There was an error writing to $saveFileName");
                            }
                            flock($fileHandle, LOCK_UN);
                        } else {
                            displayAlert("There was an error locking file $saveFileName for writing");
                        }
                        fclose($fileHandle);
                    }
                    
                }
            }
        }
    ?>
    <!-- HTML Form -->
    <h1>Register for the Game</h1>
    <form action="TheBucklerGame.php" method="post">
        Username: <br> <input type="text" name="username"> <br>
        Password: <br> <input type="password" name="password"> <br>
        Full Name: <br> <input type="text" name="fullName"> <br>
        Email: <br> <input type="email" name="email"> <br>
        Age: <br> <input type="number" name="age"> <br>
        Screen Name: <br> <input type="text" name="screenName"> <br>
        Comments: <br> <textarea name="comments" cols="40" rows="6"></textarea> <br>
        <input type="submit" name="save" value="Submit Your Registration">
    </form>
    <?php
        //Display code
        //Read file / Display data
        $labels = array("Username", "Password", "Full Name", "E-mail", "Age", "Screen Name", "Comments");
        echo "<hr>";
        echo "<h3>The Gamers</h3>";
        echo "<hr>";
        $fileHandle = fopen($saveFileName, "rb");
        if (!$fileHandle) {
            displayAlert("There was an error reading file $saveFileName");
        } else{
            $saveString = fgets($fileHandle);
            //Loop though users
            while (!feof($fileHandle)) {
                //debug
                $outputArray = explode(";", $saveString);
                foreach ($outputArray as $key => $value) {
                    echo "<strong>$labels[$key]:</strong> <em>$value</em><br>";
                }
                echo "<hr>\n";
                $saveString = fgets($fileHandle);
            }
            fclose($fileHandle);
        }
    ?>
</body>
</html>