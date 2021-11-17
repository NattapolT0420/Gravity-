<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Test File</title>
</head>




<body>
    <?php
    $files = scandir("media");
    for ($a = 2; $a < count($files); $a++) {
    ?>
        <p>
            <!-- Displaying file name !-->
            <?php echo $files[$a]; ?>
        </p>
    <?php
    }
    ?>
</body>

</html>