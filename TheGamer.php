<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>The Game</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="modernizr.custom.65897.js"></script>
</head>
<body>
    <style>
        h2{
            text-align: center;
            color: rgb(255,255,240);
            background-color: rgb(105,105,105);
            margin-bottom: 0px;
            padding-bottom: 1em;
        }
        #space{
            margin-top: 0px;
        }
        p{
            text-align: center;
            color: rgb(255,255,240);
        }
        form{
            background-color: rgb(105,105,105);
        }
    </style>
    <h2>The Game</h2>
    <form action="TheGamer.php" method="post">
        <!-- This is the form that the user input data -->
        <p id="space">Username: <input type="text" name="username"></p>
        <p>Password: <input type="password" name="password"></p>
        <p>Full Name: <input type="text" name="fullName"></p>
        <p>Email: <input type="email" name="email"></p>
        <p>Age: <input type="number" name="age"></p>
        <p>Screen Name: <input type="text" name="screenName"></p>
        <p>Comments: <input type="text" name="comments"></p>
        <input type="submit" value="Submit" name="submit">
        <input type="reset" value="Clear" name="clear">
    </form>
    <?php
    //Code
            if (isset($_POST['submit'])) {
                //This is grabbing data from the form
                $saveString = "Username:" . stripslashes($_POST['username']) . "\n";
                $saveString .= "Password:" . md5(stripslashes($_POST['password'])) . "\n";
                $saveString .= "Full Name: " . stripslashes($_POST['fullName']) . "\n";
                $saveString .= "Email: " . stripslashes($_POST['email']) . "\n";
                $saveString .= "Age: " . stripslashes($_POST['age']) . "\n";
                $saveString .= "ScreenName: " . stripslashes($_POST['screenName']) . "\n";
                $saveString .= "Comments: " . stripslashes($_POST['comments']) . "\n";
                $saveString .= "---------------------------------------" . "\n";
                $fileHandle = fopen("TheGame.txt", "a+");
                fwrite($fileHandle, $saveString);
                fclose($fileHandle);
            }
            //This is grabbing the txt file and putting it into the html
            $theGame =  file_get_contents('TheGame.txt');
            echo nl2br($theGame);
    ?>
</body>
</html>