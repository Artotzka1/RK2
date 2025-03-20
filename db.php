<?php
$host = 'localhost';
$dbname = 'sacham9c_rk2';
$username = 'sacham9c_rk2';
$password = 'SQL_Rk2';

try {
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Ошибка подключения: " . $e->getMessage();
}
?>