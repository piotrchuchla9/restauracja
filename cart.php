<?php
require_once 'php/dataBase.php';
require_once "php/component.php";

session_start();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styleCart.css">
    <title>Document</title>
</head>

<body>
    <h1>Twój koszyk</h1>

    <div class="modal-body">



        <table class="table table-image" style="width: 100%;">
            <?php

                if(isset($_POST['add'])) {
                    $productID = $_POST['productID'];

                    cartElement($productID);
                }

                if(isset($_POST['delete'])) {
                    $productID = $_POST['productID'];

                    deleteItem($productID);
                }

                printCart($conn);

            ?>     
    </div>
    
    <?php

                $max_id = sprawdz_max_id($conn);
                $id = $max_id + 1;

                if(isset($_POST['zamow'])) {
                    $id = sprawdz_max_id($conn);
                    $id = $id + 1;
                    $porcja = $_POST['porcja'];

                    foreach()

                    
                }
                




    ?>




    <script src="script.js"></script>
</body>

</html>