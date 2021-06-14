<?php
session_start();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styleIndex.css">
    <link rel="stylesheet" href="styleFinal.css">

    <title>Dziękujemy!</title>
</head>
<body>
    <h1>Dziękujemy za złożenie zamówienia!</h1>
    <h2>Do zapłaty: <?php echo $_SESSION['cartSum'] ?>zł</h2>
    <div class="btn"><button class="noselect" onclick="location.href='index.php'">Wróć do strony głównej</button></div>
    
    
    <?php
        unset($_SESSION['cart']);
        unset($_SESSION['cartSum']);
    ?>
</body>
</html>