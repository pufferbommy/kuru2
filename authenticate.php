<?php
session_start();

$servername = "localhost";
$dbname = "kuru2";
$username = "root";
$password = "";

try {
  $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  echo "Connected successfully";
} catch (PDOException $e) {
  echo "Connection failed: " . $e->getMessage();
}

if (!isset($_POST["username"], $_POST["password"])) {
  header("location: " . $_SERVER['HTTP_REFERER'] . "?err=โปรดกรอกชื่อผู้ใช้และรหัสผ่าน!");
}

if ($stmt = $conn->prepare("SELECT id, password FROM accounts WHERE username = ?")) {
  $stmt->execute([$_POST["username"]]);
  $row = $stmt->fetch();

  if ($row && password_verify($_POST["password"], $row["password"])) {
    session_regenerate_id();
    $_SESSION['loggedin'] = true;
    $_SESSION["username"] = $_POST["username"];
    header("location: index.php");
  } else {
    header("location: " . $_SERVER['HTTP_REFERER'] . "?err=ชื่อผู้ใช้หรือรหัสไม่ถูกต้อง!");
  }
}
