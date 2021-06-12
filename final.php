<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Dziękujemy za złożenie zamówienia!</h1>
    <h2>Do zapłaty: <?php echo $_SESSION['cartSum'] ?></h2>
    <a href="index.php">Wróc do strony głównej</a>

    <?php
        unset($_SESSION['cart']);
        unset($_SESSION['cartSum']);
    ?>
</body>
</html>