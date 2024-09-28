<?php
$host = 'localhost';
$user = 'root';
$password = 'Lenam123@';
$dbname = 'v_store';

$conn = new mysqli($host, $user, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
