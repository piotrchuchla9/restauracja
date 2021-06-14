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
    <script src="cartScript.js"></script>
    <script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>


</head>

<body>
    <h1>Twój koszyk</h1>




    <div class="modal-body">



        <table class="table table-image" style="width: 100%;">
            <?php

            if (isset($_POST['add'])) {
                $productID = $_POST['productID'];
                $porcjaID = 2;
                cartElement($productID, $porcjaID);
            }

            if (isset($_POST['delete'])) {
                $productID = $_POST['productID'];
                $porcja = $_POST['porcja'];
                deleteItem($productID, $porcja);
            }

            printCart($conn);

            ?>
    </div>






</body>

</html>