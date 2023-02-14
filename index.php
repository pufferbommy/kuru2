<?php
session_start();

if (!isset($_SESSION["loggedin"])) {
  header('location: login.php');
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Login</title>
  <!-- pico.css -->
  <link rel="stylesheet" href="https://unpkg.com/@picocss/pico@1.*/css/pico.min.css" />
  <!-- noto sans thai font -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+Thai:wght@400;700&display=swap" rel="stylesheet">
</head>

<body>
  <nav class="container-fluid">
    <ul>
      <li><strong>Brand</strong></li>
    </ul>
    <ul>
      <li>
        <details role="list" dir="rtl">
          <summary aria-haspopup="listbox" role="link"><?= $_SESSION["username"] ?></summary>
          <ul role="listbox">
            <li><a href="logout.php">ออกจากระบบ</a></li>
          </ul>
        </details>
      </li>
    </ul>
  </nav>
  <main class="container">
    <h1>หน้าหลัก</h1>
  </main>
</body>

</html>