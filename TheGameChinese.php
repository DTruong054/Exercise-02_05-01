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
    <form action="TheGameChinese.php" method="post">
        <p>用戶名: <input type="text" name="username"></p>
        <p>密碼: <input type="text" name="password"></p>
        <p>全名: <input type="text" name="fullName"></p>
        <p>電子郵件: <input type="text" name="email"></p>
        <p>年齡: <input type="number" name="age"></p>
        <p>屏幕名稱: <input type="text" name="screenName"></p>
        <p>評論: <input type="text" name="comments"></p>
        <input type="submit" value="提交" name="submit">
        <input type="reset" value="明確" name="clear">
    </form>
    <?php
    //Code
            if (isset($_POST['submit'])) {
                $saveString = "用戶名: " . stripslashes($_POST['username']) . "\n";
                $saveString .= "密碼: " . md5(stripslashes($_POST['password'])) . "\n";
                $saveString .= "全名: " . stripslashes($_POST['fullName']) . "\n";
                $saveString .= "電子郵件: " . stripslashes($_POST['email']) . "\n";
                $saveString .= "年齡: " . stripslashes($_POST['age']) . "\n";
                $saveString .= "屏幕名稱: " . stripslashes($_POST['screenName']) . "\n";
                $saveString .= "評論: " . stripslashes($_POST['comments']) . "\n";
                $saveString .= "---------------------------------------" . "\n";
                $fileHandle = fopen("TheGameChinese.txt", "a+");
                fwrite($fileHandle, $saveString);
                fclose($fileHandle);
            }
            $theGame =  file_get_contents('TheGameChinese.txt');
            echo nl2br($theGame);
    ?>
</body>
</html>