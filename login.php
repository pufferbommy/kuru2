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
  <main class="container">
    <h1>เข้าสู่ระบบ</h1>
    <form action="authenticate.php" method="post">
      <label>
        ชื่อผู้ใช้
        <input autocomplete="off" aria-autocomplete="none" type="text" name="username" placeholder="Username" required>
      </label>
      <label>
        รหัสผ่าน
        <input autocomplete="off" aria-autocomplete="none" type="password" name="password" placeholder="Password" required>
      </label>
      <button>Submit</button>
    </form>
  </main>
</body>

</html>