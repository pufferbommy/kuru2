<?php
session_start();

include_once "dbconnect.php";

if (!isset($_POST["username"], $_POST["password"])) {
  $_SESSION["error"] = "โปรดกรอกชื่อผู้ใช้และรหัสผ่าน!";
  header("location: " . $_SERVER['HTTP_REFERER']);
}

if ($stmt = $conn->prepare("SELECT account_id,password FROM accounts WHERE username = ?")) {
  $stmt->execute([$_POST["username"]]);
  $row = $stmt->fetch();

  if ($row && password_verify($_POST["password"], $row["password"])) {
    session_regenerate_id();

    $sql = "UPDATE accounts SET last_login = NOW() WHERE account_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$row["account_id"]]);

    $_SESSION['loggedin'] = true;
    $_SESSION["username"] = $_POST["username"];
    header("location: index.php");
  } else {
    $_SESSION["error"] = "ชื่อผู้ใช้หรือรหัสไม่ถูกต้อง!";
    header("location: " . $_SERVER['HTTP_REFERER']);
  }
}
