<?php
$host = "localhost";
$user = "root";
$password = "";
$database = "cesta";
$conn = new mysqli($host, $user, $password, $database);

if ($conn->error) {
    die('erro database ' . $conn->error);
}
