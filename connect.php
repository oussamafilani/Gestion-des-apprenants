<?php

// $servername = "localhost";
// $username = "root";
// $password = "";

// try {
//     $conn = new PDO('mysql:host=localhost;dbname=db_apprenants', $username, $password);
//     // set the PDO error mode to exception
//     $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//     // echo "Connected successfully";
// } catch (PDOException $e) {
//     echo "Connection failed: " . $e->getMessage();
// }

?>

<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "db_apprenants";

$db = new mysqli($servername, $username, $password, $database);
// echo "Connected successfully";

// // Check connection
// if ($db->connect_errno) {
//     echo "Failed to connect to MySQL: " . $db->connect_error;
//     exit();
// }
?>

<?php

// $conn = mysqli_connect("localhost","root","","mydatabase");

// if (!$conn) {
//     die("Connection failed: ".mysqli_connect_error());
// }

?>
