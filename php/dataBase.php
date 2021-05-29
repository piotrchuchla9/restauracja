<?php

$serverName = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbName = "restauracja";

$conn = mysqli_connect($serverName, $dbUsername, $dbPassword, $dbName);

if (!$conn) {
	die("Connection failed: " . mysqli_connect_error());
}


function getPizza($conn) {
	$sql = "SELECT * FROM Menu WHERE Kategoria = 'Pizza'";
	$result = mysqli_query($conn, $sql);

	if(mysqli_num_rows($result) > 0) {
		return $result;
	}
}

function getZupy($conn) {
	$sql = "SELECT * FROM Menu WHERE Kategoria = 'Zupa'";
	$result = mysqli_query($conn, $sql);

	if(mysqli_num_rows($result) > 0) {
		return $result;
	}
}

function getSushi($conn) {
	$sql = "SELECT * FROM Menu WHERE Kategoria = 'Sushi'";
	$result = mysqli_query($conn, $sql);

	if(mysqli_num_rows($result) > 0) {
		return $result;
	}
}

function getPierogi($conn) {
	$sql = "SELECT * FROM Menu WHERE Kategoria = 'Pierogi'";
	$result = mysqli_query($conn, $sql);

	if(mysqli_num_rows($result) > 0) {
		return $result;
	}
}

function getData($conn) {
	$sql = "SELECT * FROM Menu";
	$result = mysqli_query($conn, $sql);

	if(mysqli_num_rows($result) > 0) {
		return $result;
	}
}





















































// class DBController
// {

   

//     function getDBResult($query, $params = array())
//     {
//         $sql_statement = $this->conn->prepare($query);
//         if (! empty($params)) {
//             $this->bindParams($sql_statement, $params);
//         }
//         $sql_statement->execute();
//         $result = $sql_statement->get_result();
        
//         if ($result->num_rows > 0) {
//             while ($row = $result->fetch_assoc()) {
//                 $resultset[] = $row;
//             }
//         }
        
//         if (! empty($resultset)) {
//             return $resultset;
//         }
//     }

//     function updateDB($query, $params = array())
//     {
//         $sql_statement = $this->conn->prepare($query);
//         if (! empty($params)) {
//             $this->bindParams($sql_statement, $params);
//         }
//         $sql_statement->execute();
//     }

//     function bindParams($sql_statement, $params)
//     {
//         $param_type = "";
//         foreach ($params as $query_param) {
//             $param_type .= $query_param["param_type"];
//         }
        
//         $bind_params[] = & $param_type;
//         foreach ($params as $k => $query_param) {
//             $bind_params[] = & $params[$k]["param_value"];
//         }
        
//         call_user_func_array(array(
//             $sql_statement,
//             'bind_param'
//         ), $bind_params);
//     }
// }