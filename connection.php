<?php
$hostname = 'localhost';
$database = 'my_own';
$username = 'root';
$password = '';

$connect = new mysqli($hostname, $username, $password, $database);
?>

<?php if ($connect->connect_error) {
    die('Connect Error: ' . $connect->connect_error);
} else {
    echo 'Connection Success';
} ?>