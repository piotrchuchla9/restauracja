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
    <title>Koszyk</title>
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
    
    <?PHP

for($i=0;$i<count($_SESSION['cart']);$i++){

            if(isset($_POST['zamow'])){
                    $menuID = $_POST['productID'];
                    $porcjaID = $_POST['porcja'];
                    $ilosc = $_POST['ilosc'];

                    add_zamowienie($conn,$menuID,$porcjaID,$ilosc);
                    deleteItem($menuID);
                }
            }
    ?>



    <script src="script.js"></script>
</body>

</html>