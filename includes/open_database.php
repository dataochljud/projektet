<?php
$servername = "johantibbelin.se.mysql";
$username = "johantibbelin_se_projektet";
$password = "projekt2018";
$dbname = "johantibbelin_se_projektet";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
