<?php
require_once 'php/dataBase.php';
require_once "php/component.php";

session_start();

if(isset($_POST)) {
    $productId = $_POST['productId'];
    $porcjaId = $_POST['porcjaId'];
    $nowaPorcjaId = $_POST['nowaPorcjaId'];

    $cart = $_SESSION['cart'];
    $product = $cart[$productId];

    $oldValue = 0;


    if(isset($product[$nowaPorcjaId])) {
        $oldValue = $product[$nowaPorcjaId];
    }
    
    $product[$nowaPorcjaId] = $product[$porcjaId] + $oldValue;
    unset($product[$porcjaId]);

    $cart[$productId] = $product;

    $_SESSION['cart'] = $cart;

    header('location: cart.php');
}


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
    
</body>
</html>