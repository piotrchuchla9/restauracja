<?PHP
require_once "php/dbh.inc.php"
?>
<script>
// Tabbed Menu
function openMenu(evt, menuName) {
  var i, x, tablinks;
  x = document.getElementsByClassName("menu");
  for (i = 0; i < x.length; i++) {
     x[i].style.display = "none";
  }
  tablinks = document.getElementsByClassName("tablink");
  for (i = 0; i < x.length; i++) {
     tablinks[i].className = tablinks[i].className.replace(" w3-red", "");
  }
  document.getElementById(menuName).style.display = "block";
  evt.currentTarget.firstElementChild.className += " w3-red";
}
document.getElementById("myLink").click();
</script>

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
                </ul>
            </nav>
        </div>

        <div class="category">
            <ul>
                <li><a href="#" class="pizzaBtn">Pizze</a></li>
                <li><a href="#" class="zupaBtn">Zupy</a></li>
                <li><a href="#" class="susziBtn">Suszi</a></li>
                <li><a href="#" class="pierogiBtn">Pierogi</a></li>
                <li><a href="#" class="inneBtn">Inne</a></li>
            </ul>
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
    <div  class="w3-row w3-center w3-border w3-border-dark-grey">
      <a href="javascript:void(0)" onclick="openMenu(event, 'Pizza');">
        <div class="w3-col s4 tablink w3-padding-large w3-hover-red">Pizza</div>
      </a>
      <a href="javascript:void(0)" onclick="openMenu(event, 'Zupy');">
        <div class="w3-col s4 tablink w3-padding-large w3-hover-red">Zupy</div>
      </a>
      <a href="javascript:void(0)" onclick="openMenu(event, 'Sushi');">
        <div class="w3-col s4 tablink w3-padding-large w3-hover-red">Sushi</div>
      </a>
      <a href="javascript:void(0)" onclick="openMenu(event, 'Pierogi');">
        <div class="w3-col s4 tablink w3-padding-large w3-hover-red">Pierogi</div>
      </a>
    </div>

    <div id="Pizza" class="w3-container menu w3-padding-32 w3-white">
        <?php
            while ($row = mysqli_fetch_array($pizze)) {
                echo "<h1><b>" . $row['Nazwa'] . "</b>";
                echo "<span class='w3-right w3-tag w3-round'>" . $row['Cena'] . "</span></h1>";
                echo "<p class='w3-text-grey'>" . $row['Opis'] . "</p><hr>";
            }
        ?>
    </div>
    <div id="Zupy" class="w3-container menu w3-padding-32 w3-white">
        <?php
            while ($row = mysqli_fetch_array($zupy)) {
                echo "<h1><b>" . $row['Nazwa'] . "</b>";
                echo "<span class='w3-right w3-tag w3-round'>" . $row['Cena'] . "</span></h1>";
                echo "<p class='w3-text-grey'>" . $row['Opis'] . "</p><hr>";
            }
        ?>
    </div>
    <div id="Sushi" class="w3-container menu w3-padding-32 w3-white">
        <?php
            while ($row = mysqli_fetch_array($sushi)) {
                echo "<h1><b>" . $row['Nazwa'] . "</b>";
                echo "<span class='w3-right w3-tag w3-round'>" . $row['Cena'] . "</span></h1>";
                echo "<p class='w3-text-grey'>" . $row['Opis'] . "</p><hr>";
            }
        ?>
    </div>
    <div id="Pierogi" class="w3-container menu w3-padding-32 w3-white">
        <?php
            while ($row = mysqli_fetch_array($pierogi)) {
                echo "<h1><b>" . $row['Nazwa'] . "</b>";
                echo "<span class='w3-right w3-tag w3-round'>" . $row['Cena'] . "</span></h1>";
                echo "<p class='w3-text-grey'>" . $row['Opis'] . "</p><hr>";
            }
        ?>
    </div>


        <div class="opinie">
            opinie

        </div>

        <footer>footer</footer>
    </main>




    <script src="script.js"></script>

</body>

</html>