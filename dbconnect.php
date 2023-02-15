<?php
include_once 'pdoconfig.php';

try {
  $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  echo "<script>console.log('Connected DB Successfully')</script>";
} catch (PDOException $pe) {
  echo "Connection Failed: " . $e->getMessage();
}
