<?php


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


function cartElement($productID)
{

    //session_start();
    $_SESSION['cart'][$productID] += 1;

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
        <form action="cart.php" method="POST">
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
                    <th scope="col">Porcja</th>
                    <th scope="col">Suma</th>
                    <th scope="col">Usuń</th>

                </tr>

            </thead>
        ';

        foreach ($_SESSION['cart'] as $item => $ilosc) {

            $sql = "SELECT * FROM Menu WHERE Menu_ID = '$item'";
            $result = mysqli_query($conn, $sql);

            $row = mysqli_fetch_array($result);
            $suma_czesciowa = $row['Cena'] * $ilosc;

            $suma += $suma_czesciowa;

            $element = "
       
    <tbody>

    <tr class='inCart'>
        <td style='float: left; width: 70%; text-align: left;'> $licznik. " . $row['Kategoria'] . " - " . $row['Nazwa'] . " </td>
        <td width='10%'>" . $row['Cena'] . "</td>


        <td width='20%' class='qty'>
     
        <!--<button name='decqty' onClick='decqty($ilosc)'>-</button>-->
        <input type='number' name='ilosc' id='$licznik' style='max-width: 40px; height: 30px;text-align: center;' value='$ilosc'>
        <!--<button name='incqty'>+</button>-->
        
        <td width='10%'>
        <select name='porcja' id='porcja'>
        <option value='2'>Średnia</option>
        <option value='1'>Mała</option>
        <option value='3'>Duża</option>
        </select>
        
        </td>
        <td width='10%'>" . $suma_czesciowa . "zł</td>
        <td width='10%'>
      <form action='cart.php' method='POST'>
            <button type='submit' name='delete'>Usuń</button>
            <input type='hidden' name='productID' value='$item'>
            <!-- </form>  -->
            
        </td>
    </tr>

    </tbody>
    
    ";
            $licznik += 1;
            echo  $element;
        }
    }

    if (!empty($_SESSION['cart'])) {
        echo '
    </table>
    
    <div class="d-flex justify-content-end">
            <h5 style="margin-top: 30px;font-size: 30px; text-align: right; margin-right: 20px;">Do zapłaty: <span class="price text-success"> ' . $suma . ' zł</span></h5>
        </div>
        <div class="modal-footer border-top-0 d-flex justify-content-between">
        
            <button type="button" class="btn btn-secondary menuBtn" data-dismiss="modal" onclick="window.location=\'index.php\'">Wróć do MENU</button>
            <button type="submit" name="zamow" class="btn btn-success zamowBtn" onclick="window.location=\'zamawianie.php\'" >Zamów</button>
            </form>
            </div>
        
    ';
    }
}

function deleteItem($productID)
{
    session_start();
    unset($_SESSION['cart'][$productID]);
    header("location: cart.php");
    exit();

}

function add_zamowienie($conn, $menuID, $porcjaID, $ilosc) {

    $sql = "INSERT INTO zamów (MenuID, PorcjaID, Ilość) VALUES ($menuID, $porcjaID, $ilosc)";
    $result = mysqli_query($conn, $sql);

    
    return $result;
}
