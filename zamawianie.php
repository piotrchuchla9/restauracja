<?php
require_once 'php/dataBase.php';
require_once "php/component.php";

session_start();

// if (isset($_POST['submit'])) {
//     $imie = $_POST['imie'];
//     $nazwisko = $_POST['nazwisko'];
//     $komentarz = $_POST['komentarz'];
//     $numer = $_POST['numer'];
//     $adres = $_POST['adres'];
//     $data = date('d-m-y h:i:s');
//     $platnosc = $_POST['platnosc'];
//     $klientid = //nie wiem jak to wyciagnąć 
    
//     $klient = "INSERT INTO klient (Imie,Nazwisko,Telefon,Adres)
//      VALUES ('$imie','$nazwisko','$numer','$adres')";
//     $zamowienie = "INSERT INTO zamowienia (KlientID,DataZamówienia,Komentarz,KodZniżkowy,Płatność)
//      VALUES ('$klientid','$data','$komentarz','$kod','$platnosc')";
//     if (mysqli_query($conn, $sql)) {
//         echo "Pomyślnie dodano zmówienie !";
//     } else {
//         echo "Error: " . $sql . ":-" . mysqli_error($conn);
//     }
// }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styleCart.css">
    <title>Realizacja zamówienia</title>
</head>

<body>
    <h1>Dokończ zamówienie!</h1>
    <div class="modal-body">
        <form method="POST" action="zamawianie.php">
            <thead>
                <td style='float: left; width: 70%; text-align: left;'>
                    <label for="imie">Imie</label>
                    <input type="text" name="imie" id="imie">
                </td><br>
                <td style='float: left; width: 70%; text-align: left;'>
                    <label for="nazwisko">Nazwisko</label>
                    <input type="text" name="nazwisko" id="nazwisko">
                </td><br>
                <td style='float: left; width: 70%; text-align: left;'>
                    <label for="numer">Numer tel.</label>
                    <input type="text" name="telefon" id="numer">
                </td><br>
                <td style='float: left; width: 70%; text-align: left;'>
                    <label for="adres">Adres</label>
                    <input type="text" name="adres" id="numer">
                </td><br>
                <td style='float: left; width: 70%; text-align: left;'>
                    <label for="message">Komentarz do zamówienia
                    </label>
                    <textarea name="komentarz" id="komentarz" cols="150" rows="10">
                </textarea>
                </td>
                <div id="platnosc" name="platnosc">
                    <label>Płatność: </label><br>
                    Kartą <input type="radio" name="platnosc" value="karta">
                    <th>
                        <br>
                        Gotówką <input type="radio" name="platnosc" value="gotowka">
                </div>
                <td style='float: left; width: 70%; text-align: left;'>
                <label for="message">
                    Kod Zniżkowy
                </label>
                <input type="text" name="znizka" id="znizka">
            </thead>

            <div class="modal-footer border-top-0 d-flex justify-content-between">
                <button type="button" class="btn btn-secondary menuBtn" data-dismiss="modal" onclick="window.location='cart.php'">Wróć do zamówienia</button>
                <button type="submit" name="zamowFinal" class="btn btn-success zamowBtn">Zamów</button>
            </div>
        </form>
    </div>


    </div>
    <?php

$max_id = sprawdz_max_id($conn);
$id = $max_id + 1;

$porcja = 0;
if(isset($_POST['zamow'])) {
    $porcja = $_POST['porcja'];
}

if(isset($_POST['zamowFinal'])) {
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