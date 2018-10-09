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
            # code...
        } else {
            mkdir($dir);
            chmod($dir, 0666);
        }
        
    ?>
    <h2>Visitor Comments</h2>
    <form action="vistorComments.php" method="post">
        Your name: <input type="text" name="name"> <br>
        Email <input type="text" name="email"> <br>
        <textarea name="comment" id="" rows="6" cols="100"></textarea> <br>
        <input type="submit" name="save" value="Submit your comment">
    </form>
</body>

</html>