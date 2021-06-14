<?php
require_once 'php/dataBase.php';
require_once "php/component.php";

session_start();

if(isset($_POST)) {
    $productId = $_POST['productId'];
    $porcjaId = $_POST['porcjaId'];

    $cart = $_SESSION['cart'];
    $product = $cart[$productId];
    $porcja = $product[$porcjaId];

    $porcja -= 1;

    if($porcja == 0) {
        unset($product[$porcjaId]);
    } else {
        $product[$porcjaId] = $porcja;

    }

    if(empty($product)) {
        unset($cart[$productId]);
    } else {
        $cart[$productId] = $product;

    }

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