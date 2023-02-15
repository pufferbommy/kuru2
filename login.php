<?php
session_start();
if (isset($_SESSION["error"])) {
  echo "<script>alert('{$_SESSION["error"]}')</script>";
  unset($_SESSION["error"]);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Login</title>
  <!-- bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
  <!-- noto sans thai font -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+Thai:wght@400;700&display=swap" rel="stylesheet">
  <style>
    html,
    body {
      height: 100%;
    }
  </style>
</head>

<body class="bg-light">
  <div class="container h-100 d-flex justify-content-center align-items-center">
    <main style="max-width: 500px;" class="bg-white w-100 shadow rounded p-5">
      <div class="d-flex flex-column mb-4 align-items-center">
        <h1>ยินดีต้อนรับ</h1>
        <small class="text-secondary">กรอกชื่อผู้ใช้และรหัสผ่านเพื่อเข้าใช้งานระบบ</small>
      </div>
      <form class="d-flex flex-column" action="authenticate.php" method="post">
        <div class="mb-3">
          <label for="username" class="form-label">
            ชื่อผู้ใช้
          </label>
          <input id="username" class="form-control" autocomplete="off" aria-autocomplete="none" type="text" name="username" placeholder="Username" required>
        </div>
        <div class="mb-3">
          <label for="password" class="form-label">
            รหัสผ่าน
          </label>
          <input id="password" class="form-control" autocomplete="off" aria-autocomplete="none" type="password" name="password" placeholder="Password" required>
        </div>
        <button class="btn btn-primary">เข้าสู่ระบบ</button>
      </form>
    </main>
  </div>
</body>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>

</html>