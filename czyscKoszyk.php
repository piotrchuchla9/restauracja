<?php
require_once 'php/dataBase.php';
require_once "php/component.php";

session_start();

if(isset($_POST)) {
    unset($_SESSION['cart']);
    unset($_SESSION['cartSum']);
    
    header("location: cart.php");
}

?>