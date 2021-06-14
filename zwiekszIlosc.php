<?php
require_once 'php/dataBase.php';
require_once "php/component.php";

session_start();

if (isset($_POST)) {
    $productId = $_POST['productId'];
    $porcjaId = $_POST['porcjaId'];

    $cart = $_SESSION['cart'];
    $product = $cart[$productId];
    $porcja = $product[$porcjaId];

    $porcja += 1;

    $product[$porcjaId] = $porcja;
    $cart[$productId] = $product;

    $_SESSION['cart'] = $cart;

    header('location: cart.php');
}