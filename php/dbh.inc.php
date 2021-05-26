<?php

$serverName = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbName = "restauracja";

$conn = mysqli_connect($serverName, $dbUsername, $dbPassword, $dbName);

if(!$conn){
	die("Connection failed: ". mysqli_connect_error());
}


$pizze = mysqli_query($conn, "SELECT * FROM Menu WHERE Kategoria = 'Pizza'");

$zupy = mysqli_query($conn, "SELECT * FROM Menu WHERE Kategoria = 'Zupa'");

$sushi = mysqli_query($conn, "SELECT * FROM Menu WHERE Kategoria = 'Sushi'");

$pierogi = mysqli_query($conn, "SELECT * FROM Menu WHERE Kategoria = 'Pierogi'");

// $addtocart = mysqli_query($conn, "SELECT * FROM Menu WHERE Menu_ID = $_POST[id]");


//add to cart


// function addToCart($id) {

//     $serverName = "localhost";
//     $dbUsername = "root";
//     $dbPassword = "";
//     $dbName = "restauracja";

//     $conn = mysqli_connect($serverName, $dbUsername, $dbPassword, $dbName);

//     $sqlName = mysqli_query($conn, "SELECT Nazwa FROM menu WHERE Menu_ID = $id");

//     echo '<tr class="inCart">';
//     echo    '<td>Jakieś danie </td>';
//     echo        '<td>89zł</td>';
//     echo        '<td class="qty"><input type="text" class="form-control" id="input1" style="max-width: 20px; height: 10px; text-align: center;" value="1"></td>';
//     echo        '<td>89zł</td>';
//     echo        '<td>';
//     echo            '<a href="#" class="btn btn-danger btn-sm">';
//     echo                "<'i class='fa fa-times'></i>";
//     echo            '</a>';
//     echo        '</td>';
//     echo    '</tr>';
//     echo "<script type='text/javascript'>alert('essa');</script>";
// }
// if(array_key_exists('xd',$_POST)){
//     addToCart($id);
//  }



class DBController
{

   

    function getDBResult($query, $params = array())
    {
        $sql_statement = $this->conn->prepare($query);
        if (! empty($params)) {
            $this->bindParams($sql_statement, $params);
        }
        $sql_statement->execute();
        $result = $sql_statement->get_result();
        
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                $resultset[] = $row;
            }
        }
        
        if (! empty($resultset)) {
            return $resultset;
        }
    }

    function updateDB($query, $params = array())
    {
        $sql_statement = $this->conn->prepare($query);
        if (! empty($params)) {
            $this->bindParams($sql_statement, $params);
        }
        $sql_statement->execute();
    }

    function bindParams($sql_statement, $params)
    {
        $param_type = "";
        foreach ($params as $query_param) {
            $param_type .= $query_param["param_type"];
        }
        
        $bind_params[] = & $param_type;
        foreach ($params as $k => $query_param) {
            $bind_params[] = & $params[$k]["param_value"];
        }
        
        call_user_func_array(array(
            $sql_statement,
            'bind_param'
        ), $bind_params);
    }
}