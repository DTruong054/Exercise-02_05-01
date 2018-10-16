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
    <form action="TheGamer.php" method="post">
        <p>Username: <input type="text" name="username"></p>
        <p>Password: <input type="text" name="password"></p>
        <p>Full Name: <input type="text" name="fullName"></p>
        <p>Email: <input type="text" name="email"></p>
        <p>Screen Name: <input type="text" name="screenName"></p>
        <p>Comments: <input type="text" name="comments"></p>
        <input type="submit" value="Submit" name="submit">
        <input type="reset" value="Clear" name="clear">
    </form>
    <?php
    //Code
            if (isset($_POST['submit'])) {
                $saveString = stripslashes($_POST['username']) . "\n";
                $saveString .= stripslashes($_POST['password']) . "\n";
                $saveString .= stripslashes($_POST['fullName']) . "\n";
                $saveString .= stripslashes($_POST['email']) . "\n";
                $saveString .= stripslashes($_POST['screenName']) . "\n";
                $saveString .= stripslashes($_POST['comments']) . "\n";
                $fileHandle = fopen("TheGame.txt", "a");
                fwrite($fileHandle, $saveString);
                fclose($fileHandle);
            }
    ?>
</body>
</html>