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
                    <li><button type="submit" style="border: 0; background: transparent" data-toggle="modal" data-target="#cartModal">
                        <img src="img/cart2.png" alt="Koszyk" />
                        </button></li>
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
    <div  class="w3-row w3-center w3-border w3-border-dark-grey foodBtnCont">
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
                echo "<h1><b>" . $row['Menu_ID'] . "." . $row['Nazwa'] . "</b>";
                echo '<input type="image" style="float:right; width:40px;" src="img/addtocart.png" name="id"/>';
                echo "<span class='w3-right w3-tag w3-round'>" . $row['Cena'] . "</span></h1>";
                echo "<p class='w3-text-grey'>" . $row['Opis'] . "</p><hr>";
               
            }
        ?>
    </div>
    <div id="Zupy" class="w3-container menu w3-padding-32 w3-white">
        <?php
            while ($row = mysqli_fetch_array($zupy)) {
                echo "<h1><b>" . $row['Menu_ID'] . "." . $row['Nazwa'] . "</b>";
                echo '<input type="image" style="float:right; width:40px;" src="img/addtocart.png" name="id"/>';
                echo "<span class='w3-right w3-tag w3-round'>" . $row['Cena'] . "</span></h1>";
                echo "<p class='w3-text-grey'>" . $row['Opis'] . "</p><hr>";
            }
        ?>
    </div>
    <div id="Sushi" class="w3-container menu w3-padding-32 w3-white">
        <?php
            while ($row = mysqli_fetch_array($sushi)) {
                echo "<h1><b>" . $row['Menu_ID'] . "." . $row['Nazwa'] . "</b>";
                echo '<input type="image" style="float:right; width:40px;" src="img/addtocart.png" name="id"/>';
                echo "<span class='w3-right w3-tag w3-round'>" . $row['Cena'] . "</span></h1>";
                echo "<p class='w3-text-grey'>" . $row['Opis'] . "</p><hr>";
            }
        ?>
    </div>
    <div id="Pierogi" class="w3-container menu w3-padding-32 w3-white">
        <?php
            while ($row = mysqli_fetch_array($pierogi)) {
                echo "<h1><b>" . $row['Menu_ID'] . "." . $row['Nazwa'] . "</b>";
                echo '<input type="image" style="float:right; width:40px;" src="img/addtocart.png" name="id"/>';
                echo "<span class='w3-right w3-tag w3-round'>" . $row['Cena'] . "</span></h1>";
                echo "<p class='w3-text-grey'>" . $row['Opis'] . "</p><hr>";
            }
        ?>
    </div>


        <div class="opinie">
            
            opinie
            
            
</div>



        </div>

        <footer>footer</footer>
        
        
        <!--KOSZYK-->

         
        
        <div class="modal fade" id="cartModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header border-bottom-0">
        <h5 class="modal-title" id="exampleModalLabel">
          Your Shopping Cart
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
          <?php
            while ($row = mysqli_fetch_array($addtocart)) {
                echo "<tr><td>" . $row['Nazwa'] . "</td>";
                echo "<td>" . $row['Cena'] . "</td></tr>";
            }
        ?>
            <tr>
              <td>Jakieś danie</td>
              <td>89zł</td>
              <td class="qty"><input type="text" class="form-control" id="input1" value="2"></td>
              <td>178zł</td>
              <td>
                <a href="#" class="btn btn-danger btn-sm">
                  <i class="fa fa-times"></i>
                </a>
              </td>
            </tr>
          </tbody>
        </table> 
        <div class="d-flex justify-content-end">
          <h5>Do zapłaty: <span class="price text-success">89$</span></h5>
        </div>
      </div>
      <div class="modal-footer border-top-0 d-flex justify-content-between">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Zamknij</button>
        <button type="button" class="btn btn-success">Zamów</button>
      </div>
    </div>
  </div>

    </main>




    <script src="script.js"></script>

</body>

</html>