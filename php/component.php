<?php

include_once "database.php";


function component($productID, $productName, $productPrice, $productDescription)
{
    $element = "
    <h1><b><span class='danieID'> $productID </span> $productName </b>
    <form action='cart.php' method='POST'>
    <button type='submit' style='float:right; width:40px;' name='add'> <img src='img/addtocart.png' alt='addtocart' /> </button>
    <input type='hidden' name='productID' value='$productID'>
    </form>
    <span class='w3-right w3-tag w3-round' style='margin-right: 25px;'> $productPrice </span></h1>
    <p class='w3-text-grey style='height: 50px'> $productDescription </p><hr>
    ";

    echo $element;
}


function cartElement($productID, $porcjaID)
{

    //session_start();
    $cart = $_SESSION['cart'];

    if($cart == null) {
        $cart = array();
    }
    $product = $cart[$productID];
    if ($product == null) {
        $cart[$productID] = array($porcjaID => 1);
    } else {
        $porcja = $product[$porcjaID];
        if ($porcja == null) {
            $product[$porcjaID] = 1;
        } else {
            $porcja += 1;
        }
    }
    $_SESSION['cart'] = $cart;
    header("location: ../index.php");


    $nizej = "
    <script type='text/javascript'>alert('essa');</script>
    ";
    echo $nizej;

    //exit();
}

function printCart($conn)
{
    $suma = 0;
    $licznik = 1;

    if (empty($_SESSION['cart'])) {
        echo '
        <h2 style="font-size: 40px">Twój koszyk jest pusty!</h2>
        <div class="modal-footer border-top-0 d-flex justify-content-between">
            <button type="button" class="btn btn-secondary menuBtn" data-dismiss="modal" onclick="window.location=\'index.php\'">Wróć do MENU</button>
        </div>
        ';
    } else if (!empty($_SESSION['cart'])) {

        echo '
        <thead class="mainTable">
                <tr>
                    <th scope="col" style="float:left;">Danie</th>
                    <th scope="col">Cena/szt</th>
                    <th scope="col">Ilość</th>
                    <th scope="col">Suma</th>
                    <th scope="col">Porcja</th>
                    <th scope="col">Usuń</th>
                    

                </tr>

            </thead>
        ';

        foreach ($_SESSION['cart'] as $productId=>$product) {
            foreach ($product as $itemId=>$item) {
                $sql = "SELECT Cena, Kategoria, Nazwa FROM Menu WHERE Menu_ID = '$productId'";
                $result = mysqli_query($conn, $sql);

                $row = mysqli_fetch_array($result);
                $suma_czesciowa = $row['Cena'] * $item;
                $suma += $suma_czesciowa;
                $element = "
            
    <tbody>

    <form action='zamawianie.php' method='POST'>
    <tr class='inCart'>
        <td style='float: left; width: 70%; text-align: left;'> $licznik. " . $row['Kategoria'] . " - " . $row['Nazwa'] . " </td>
        <td width='10%'>" . $row['Cena'] . "</td>
        
        <td width='10%' class='qty'><button name='decqty'>-</button><input type='text' class='form-control' id='input1' style='max-width: 20px; height: 30px;text-align: center;' value='$item'><button name='incqty'>+</button></td>
        
        <td width='10%'>" . $suma_czesciowa . "zł</td>
        
        <td width='10%'>
        <select name='porcja' id='porcja'>
        <option value='2'>Średnia</option>
        <option value='1'>Mała</option>
        <option value='3'>Duża</option>
        </select>
        
        </td>

        <td width='10%'>
            
            <button type='submit' name='delete' formaction='cart.php' >Usuń</button>
            <input type='hidden' name='productID' value='$item'>
            
            
        </td>
        
    </tr>
    
    </tbody>
    
    ";
                $licznik += 1;
                echo  $element;
            }
        }
        $_SESSION['cartSum'] = $suma;
    }

    if (!empty($_SESSION['cart'])) {
        echo '
    </table>
    <div class="d-flex justify-content-end">
            <h5 style="margin-top: 30px;font-size: 30px; text-align: right; margin-right: 20px;">Do zapłaty: <span class="price text-success"> ' . $suma . ' zł</span></h5>
        </div>
        <div class="modal-footer border-top-0 d-flex justify-content-between">
            <button type="button" class="btn btn-secondary menuBtn" data-dismiss="modal" onclick="window.location=\'index.php\'">Wróć do MENU</button>
            <button type="submit" name="zamow" class="btn btn-success zamowBtn">Zamów</button>
        </div>
        </form>
    ';
    }
}

function deleteItem($productID, $porcja)
{
    $toDelete = $_SESSION['cart'][$productID][$porcja];
    if($toDelete > 1) {
        $toDelete -= 1;
        $_SESSION['cart'][$productID][$porcja] = $toDelete;
    } else {
        unset($_SESSION['cart'][$productID][$porcja]);
        if(count($_SESSION['cart'][$productID]) == 0) {
            unset($_SESSION['cart'][$productID]);
        }
    }
    header("location: ../cart.php");
    exit();
}

function sprawdz_max_id($conn)
{

    $sql = "SELECT sprawdz_max_id() as sprawdz_max_id_info";
    $statement = mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($statement, $sql)) {
        return 1;
        // header("location: ../login.php?error=stmtfailed");
        // exit();
    }

    //mysqli_stmt_bind_param($statement);
    mysqli_stmt_execute($statement);


    $result = mysqli_stmt_get_result($statement);
    $row = mysqli_fetch_array($result);
    $id = $row['sprawdz_max_id_info'];

    return $id;
}

function order_zamow($conn, $id, $imie, $nazwisko, $telefon, $adres, $komentarz, $znizka, $platnosc)
{
    $cena_ostateczna = $_SESSION['cartSum'];
    $id_klienta = 0;
    if($znizka != null && strlen($znizka) > 0){
        $sqlZnizka = "SELECT Rabat FROM kupon WHERE KodZniżkowy = '$znizka'";
        $resultZnizka = mysqli_query($conn, $sqlZnizka);
        $rowZnizka = mysqli_fetch_array($resultZnizka);
        if ($rowZnizka != null) {
            $rabat = $rowZnizka['Rabat'];
            $cena_ostateczna = $cena_ostateczna * $rabat;
        } else {
            header("location: ../wrongCode.php");
            exit();
        }
    }




    $sql = "SELECT Klient_ID FROM klient WHERE Imie = '$imie' AND Nazwisko = '$nazwisko' AND Telefon = '$telefon' AND Adres = '$adres'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($result);
    if ($row != null) {
        $id_klienta = $row['Klient_ID'];
    }


    if ($id_klienta < 1) {
        $sql = "INSERT INTO klient (Imie, Nazwisko, Telefon, Adres) VALUES ('$imie', '$nazwisko', '$telefon', '$adres')";
        mysqli_query($conn, $sql);
        $id_klienta = mysqli_insert_id($conn);
    }



    foreach ($_SESSION['cart'] as $productId=>$product) {
        foreach ($product as $itemId=>$item) {
                $sql = "INSERT INTO zamów VALUES($id, $productId, $itemId,$item)";
                mysqli_query($conn, $sql);
            
        }
    }


    $id_zamow = sprawdz_max_id($conn);

    $sql = "INSERT INTO zamówienia (ZamówID, KlientID, DataZamówienia, Komentarz, KodZniżkowy, Płatność, Cena_ostateczna) 
    VALUES ($id_zamow, $id_klienta, current_timestamp(), '$komentarz', '$znizka', '$platnosc', '$cena_ostateczna')";

    $result = mysqli_query($conn, $sql);

    header("location: ../final.php");
}
