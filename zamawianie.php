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
    <link rel="stylesheet" href="styleZamawianie.css">
    <title>Realizacja zamówienia</title>
</head>

<body>
    <h1>Dokończ zamówienie!</h1>
    <div class="modal-body" width="30%">
        <table class="table table-image" style="width: 100%; margin: auto;">
            <form method="POST" action="zamawianie.php">
                <thead>
                    <tr>
                        <td style='width: 30%; text-align: left;'>
                            <label for="imie">Imie</label>
                        </td>
                        <td>
                            <input type="text" name="imie" id="imie" required>
                        </td>
                    </tr>
                    <tr>
                        <td style='width: 30%; text-align: left;'>
                            <label for="nazwisko">Nazwisko</label>
                        </td>
                        <td>
                            <input type="text" name="nazwisko" id="nazwisko" required>
                        </td>
                    </tr>
                    <tr>
                        <td style=' width: 30%; text-align: left;'>
                            <label for="numer">Numer tel.</label>
                        </td>
                        <td>
                            <input type="text" name="telefon" id="numer" required>
                        </td>
                    </tr>
                    <tr>
                        <td style='width: 30%; text-align: left;'>
                            <label for="adres">Adres</label>
                        </td>
                        <td>
                            <input type="text" name="adres" id="numer" required>
                        </td>
                    </tr>
                    <tr>
                        <td style='width: 30%; text-align: left;'>
                            <label for="message">Komentarz do zamówienia</label>
                        </td>
                        <td>
                            <textarea name="komentarz" id="komentarz" cols="40" rows="10"></textarea>
                        </td>
                    </tr>
                    <tr>
                        <div style="margin-left: 0;" id="platnosc" name="platnosc">
                            <td style='width: 50%; text-align: left;'>
                            <label>Płatność: </label><br>
                             <span>Kartą</span> <input type="radio" name="platnosc" value="karta" required><span>Gotówką</span><input type="radio" name="platnosc" value="gotowka">
                            

                            
                            </td>
                        </div>
                    </tr>
                    <tr>
                        <td style='width: 30%; text-align: left;'>
                            <label for="message">Kod Zniżkowy</label>
                        </td>
                        <td>
                            <input type="text" name="znizka" id="znizka">
                        </td>
                    </tr>
                </thead>
        </table>
        <hr>
        <div class="modal-footer border-top-0 d-flex justify-content-between">
            <button style='cursor: pointer; border-radius: 25%;' type="button" class="btn btn-secondary menuBtn" data-dismiss="modal" onclick="window.location='cart.php'">Wróć do zamówienia</button>
            <button style='cursor: pointer; border-radius: 25%;' type="submit" name="zamowFinal" class="btn btn-success zamowBtn">Zamów</button>
        </div>
        </form>

    </div>


    </div>
    <?php

    $max_id = sprawdz_max_id($conn);
    $id = $max_id + 1;

    $porcja = 0;
    if (isset($_POST['zamow'])) {
        $porcja = $_POST['porcja'];
    }

    if (isset($_POST['zamowFinal'])) {
        $id = sprawdz_max_id($conn);
        $id = $id + 1;
        $imie = $_POST['imie'];
        $nazwisko = $_POST['nazwisko'];
        $telefon = $_POST['telefon'];
        $adres = $_POST['adres'];
        $komentarz = $_POST['komentarz'];
        $platnosc = $_POST['platnosc'];
        $znizka = $_POST['znizka'];


        order_zamow($conn, $id, $imie, $nazwisko, $telefon, $adres, $komentarz, $znizka, $platnosc);


        //header("location: zamawianie.php");
        //exit();

    }





    ?>


    <script src="script.js"></script>
</body>

</html>