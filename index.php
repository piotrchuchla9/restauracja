<?PHP
require_once "php/dbh.inc.php"
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Amatic+SC">
    <link rel="stylesheet" href="./css/bootstrap.min.css">
    <script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>
    <script src="./js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>

<body>
    $conn;


    <div class="top"></div>
    <header>
        <div class="container">
            <a href="index.php"><img src="img/logo.png" alt="logo" class="logo"></a>
            <nav>
                <ul>
                    <li><a href="#" class="homeBtn">Home</a></li>
                    <li><a href="#" class="menuBtn">Menu</a></li>
                    <li><a href="#" class="opinieBtn">Opinie</a></li>
                    <li><a href="#" class="kontaktBtn">Kontakt</a></li>
                    <li><button type="submit" class="cart" data-toggle="modal" data-target="#cartModal">
                            <img src="img/cart2.png" alt="Koszyk" />
                        </button>
                        <div class="countCart"></div>
                    </li>
                </ul>
            </nav>
        </div>


    </header>



    <main>
        <div class="enter">
            <div class="welcome">
                <p>Zapraszamy do naszej oferty!</p>
                <button class="buttonMenu">MENU</button>
            </div>
            <div class="photo">
                <img src="img/tlo_logo.png" alt="tlo_logo">
            </div>
        </div>



        <div class="food">

            <!-- Menu Container -->
            <div class="w3-container  w3-padding-64 w3-xxlarge" id="tabs">
                <div id="tabs" class="w3-content">
                    <h1 class="w3-center w3-jumbo" style="margin-bottom:64px">NASZE MENU</h1>
                    <div class="w3-row w3-center w3-border w3-border-dark-grey foodBtnCont">
                        <a href="javascript:void(0)" class="aFoodBtn" onclick="openMenu(event, 'Pizza');">
                            <div class="w3-col s4 tablink w3-padding-large w3-hover-red foodBtn">Pizza</div>
                        </a>
                        <a href="javascript:void(0)" class="aFoodBtn" onclick="openMenu(event, 'Zupy');">
                            <div class="w3-col s4 tablink w3-padding-large w3-hover-red foodBtn">Zupy</div>
                        </a>
                        <a href="javascript:void(0)" class="aFoodBtn" onclick="openMenu(event, 'Sushi');">
                            <div class="w3-col s4 tablink w3-padding-large w3-hover-red foodBtn">Sushi</div>
                        </a>
                        <a href="javascript:void(0)" class="aFoodBtn" onclick="openMenu(event, 'Pierogi');">
                            <div class="w3-col s4 tablink w3-padding-large w3-hover-red foodBtn">Pierogi</div>
                        </a>
                    </div>

                    <div id="Pizza" class="w3-container menu w3-padding-32 w3-white">
                        <?php
                        while ($row = mysqli_fetch_array($pizze)) {
                            echo "<h1><b>" . $row['Nazwa'] . "</b>";
                            echo '<input type="image" style="float:right; width:40px;" src="img/addtocart.png" name="id"/>';
                            echo "<span class='w3-right w3-tag w3-round'>" . $row['Cena'] . "</span></h1>";
                            echo "<p class='w3-text-grey' style='word-wrap: break-word;'>" . $row['Opis'] . "</p><hr>";
                        }
                        ?>
                    </div>
                    <div id="Zupy" class="w3-container menu w3-padding-32 w3-white">
                        <?php
                        while ($row = mysqli_fetch_array($zupy)) {
                            echo "<h1><b>" . $row['Nazwa'] . "</b>";
                            echo '<input type="image" style="float:right; width:40px;" src="img/addtocart.png" name="id"/>';
                            echo "<span class='w3-right w3-tag w3-round'>" . $row['Cena'] . "</span></h1>";
                            echo "<p class='w3-text-grey'>" . $row['Opis'] . "</p><hr>";
                        }
                        ?>
                    </div>
                    <div id="Sushi" class="w3-container menu w3-padding-32 w3-white">
                        <?php
                        while ($row = mysqli_fetch_array($sushi)) {
                            echo "<h1><b>" . $row['Nazwa'] . "</b>";
                            echo '<input type="image" style="float:right; width:40px;" src="img/addtocart.png" name="id"/>';
                            echo "<span class='w3-right w3-tag w3-round'>" . $row['Cena'] . "</span></h1>";
                            echo "<p class='w3-text-grey'>" . $row['Opis'] . "</p><hr>";
                        }
                        ?>
                    </div>
                    <div id="Pierogi" class="w3-container menu w3-padding-32 w3-white">
                        <?php
                        while ($row = mysqli_fetch_array($pierogi)) {
                            echo "<h1><b>" . $row['Nazwa'] . "</b>";
                            echo '<input type="image" style="float:right; width:40px;" src="img/addtocart.png" name="id"/>';
                            echo "<span class='w3-right w3-tag w3-round'>" . $row['Cena'] . "</span></h1>";
                            echo "<p class='w3-text-grey'>" . $row['Opis'] . "</p><hr>";
                        }
                        ?>
                    </div>


                    <!--KOSZYK-->



                    <div class="modal fade" id="cartModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header border-bottom-0">
                                    <h5 class="modal-title" id="exampleModalLabel">
                                        Twoje zamówienia
                                    </h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">



                                    <table class="table table-image">
                                        <thead>
                                            <tr>
                                                <th scope="col" style="float:left;">Danie</th>
                                                <th scope="col">Cena/szt</th>
                                                <th scope="col">Ilość</th>
                                                <th scope="col">Suma</th>
                                                <th scope="col">Usuń</th>
                                            </tr>
                                        </thead>

                                        <tbody>



                                            <tr class="inCart">
                                                <td>Jakieś danie</td>
                                                <td>89zł</td>
                                                <td class="qty"><input type="text" class="form-control" id="input1" style="max-width: 20px; height: 10px; text-align: center;" value="1"></td>
                                                <td>89zł</td>
                                                <td>
                                                    <a href="#" class="btn btn-danger btn-sm">
                                                        <i class="fa fa-times"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <div class="d-flex justify-content-end">
                                        <h5 style="font-size: 30px; text-align: right; margin-right: 20px;">Do zapłaty: <span class="price text-success">89zł</span></h5>
                                    </div>
                                </div>
                                <div class="modal-footer border-top-0 d-flex justify-content-between">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Zamknij</button>
                                    <button type="button" class="btn btn-success">Zamów</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="opinie">
                        <p>OPINIE</p>
                        <div id="slideshow">
                            <div class="slide">
                                <div class="slideHead">Tomek</div>
                                <div class="slideContent">Profesionalnie zapakowanie i genialnie przyrządzone sushi!
                                    Na pewno nie raz jeszcze coś zamówię z tej restauracji.</div>
                            </div>
                            <div class="slide">
                                <div class="slideHead">Ola</div>
                                <div class="slideContent">Bywamy z rodziną bardzo często i za każdym razem tak samo pysznie :)
                                    moja ulubiona restauracja w Rzeszowie ♥️
                                </div>
                            </div>
                            <div class="slide">
                                <div class="slideHead">Piotrek</div>
                                <div class="slideContent">Smaczne jedzienie i miła obsługa, przyjemny wystrój.
                                    Świetne miejsce na spotkanie że znajomymi 😄</div>
                            </div>
                            <div class="slide">
                                <div class="slideHead">Marysia</div>
                                <div class="slideContent">Pyszna pizza na cienkim cieście! Szybka dostawa i wysokiej jakości
                                    składniki! Polecam</div>
                            </div>
                            <div class="slide">
                                <div class="slideHead">Daniel i Magda</div>
                                <div class="slideContent">Pyszne jedzenie, czas oczekiwania jak na dobra restauracje przystało!
                                    Polecamy i pozdrawiamy 😘</div>
                            </div>
                        </div>

                    </div>

                    <footer>
                        <div>Tu jesteśmy!</div>
                            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2563.3229862561348!2d22.005592916278296!3d50.024043425877565!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x473cfa50df98ace3%3A0x86e562765f4eba75!2sNowe%20Miasto%2C%2035-309%20Rzesz%C3%B3w!5e0!3m2!1spl!2spl!4v1621292311287!5m2!1spl!2spl" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                            <div class="dane">
                                <p><i class="bi bi-telephone">e</i></p>
                            </div>
                            <div class="copy">&copy; P&R Restaurant</div>
                        
                    </footer>

    </main>




    <script src="script.js"></script>

</body>

</html>