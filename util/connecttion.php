<?php

$user="root";
$password="";
$server="localhost";
$bd="cardapio";



// Create connection
$conn = new mysqli($server, $user, $password, $bd);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}


 

?>