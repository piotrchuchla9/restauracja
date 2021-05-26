<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styleCart.css">
    <title>Document</title>
</head>

<body>
    <h1>Twój koszyk</h1>

    <div class="modal-body">



        <table class="table table-image" style="width: 100%;">
            <thead class="mainTable">
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
                    <td style="float: left;"><?php if (!empty($_COOKIE['id'])) {
                            echo $_COOKIE['id'];
                        }
                        ?>. Jakieś danie </td>
                    <td>89zł</td>
                    <td class="qty"><input type="text" class="form-control" id="input1" style="max-width: 20px; height: 30px;text-align: center;" value="1"></td>
                    <td>89zł</td>
                    <td>
                        <button>Usuń</button>
                    </td>
                </tr>

            </tbody>
        </table>
        <div class="d-flex justify-content-end">
            <h5 style="margin-top: 30px;font-size: 30px; text-align: right; margin-right: 20px;">Do zapłaty: <span class="price text-success">89zł</span></h5>
        </div>
        <div class="modal-footer border-top-0 d-flex justify-content-between">
            <button type="button" class="btn btn-secondary menuBtn" data-dismiss="modal" onclick="window.location='index.php'">Wróć do MENU</button>
            <button type="button" class="btn btn-success zamowBtn">Zamów</button>
        </div>
        
    </div>
    




    <script src="script.js"></script>
</body>

</html>