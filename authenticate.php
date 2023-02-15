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
  $_SESSION["error"] = "โปรดกรอกชื่อผู้ใช้และรหัสผ่าน!";
  header("location: " . $_SERVER['HTTP_REFERER']);
}

if ($stmt = $conn->prepare("SELECT id, password FROM accounts WHERE username = ?")) {
  $stmt->execute([$_POST["username"]]);
  $row = $stmt->fetch();

  if ($row && password_verify($_POST["password"], $row["password"])) {
    session_regenerate_id();

    $sql = "UPDATE accounts SET last_login = NOW() WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$row["id"]]);

    $_SESSION['loggedin'] = true;
    $_SESSION["username"] = $_POST["username"];
    header("location: index.php");
  } else {
    $_SESSION["error"] = "ชื่อผู้ใช้หรือรหัสไม่ถูกต้อง!";
    header("location: " . $_SERVER['HTTP_REFERER']);
  }
}
