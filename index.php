<?PHP
require_once "php/dbh.inc.php"
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
            <a href="index.html"><img src="img/logo.png" alt="logo" class="logo"></a>
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
                <li><a href="#" class="pizzaBtn">Pizza</a></li>
                <li><a href="#" class="kebabBtn">Kebab</a></li>
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
            <div class="categories">
                <p>nasze menu</p>
            </div>
            <div class="pizza">
                <p>pizza</p>
            </div>
            <div class="kebab">
                <p>kebab</p>
            </div>
            <div class="suszi">
                <p>suszi</p>
            </div>
            <div class="pierogi">
                <p>pierogi</p>
            </div>
            <div class="inne">
                <p>inne</p>
            </div>
        </div>



 
        <div class="opinie">
            opinie
            <div>
            <?php

                $sql = "SELECT * FROM menu WHERE Menu_ID = 20;";
                $result = mysqli_query($conn, $sql);
                $resultCheck = mysqli_num_rows($result);

                if ($resultCheck > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo $row['Kategoria'];
                    }
                }

            ?>
            </div>
            
        </div>
        
        <footer>footer</footer>
    </main>




    <script src="script.js"></script>

</body>

</html>