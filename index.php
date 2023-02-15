<?php
session_start();

if (!isset($_SESSION["loggedin"])) {
  header("location: login.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Index</title>
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
      width: 100%;
    }
  </style>
</head>

<body class="bg-light d-flex">
  <?php include_once("aside.php"); ?>
  <main class="w-100">
    <img class="w-100 object-fit-cover" height="600" src="./imgs/bang_mae_nang.jpeg" alt="bang mae nang">
    <div class="p-4 d-flex flex-column justify-content-between">
      <figure>
        <blockquote class="blockquote">
          <p>บางแม่นางน่าอยู่ เชิดชูหลักธรรมาภิบาล สานความรักความสามัคคี คู่วิถีชีวิตแบบเศรษฐพอเพียง</p>
        </blockquote>
        <figcaption class="blockquote-footer">
          วิสัยทัศน์
        </figcaption>
      </figure>
      <div class="row">
        <figure class="figure col">
          <figcaption class="figure-caption text-primary">ตราสัญลักษณ์</figcaption>
          <img class="figure-img mt-2" width="100" src="./imgs/bang-mae-nang-logo.png" alt="bang mae nang logo">
        </figure>
        <div class="col">
          <small class="text-primary">ลักษณะ</small>
          <p style="width:80%;">รูปพานรัฐธรรมนูญเปล่งรัศมีตั้งอยู่บนมือทั้งสองข้าง(ซ้าย-ขวา)</p>
        </div>
        <div class="col">
          <small class="text-primary">ความหมาย</small>
          <p style="width:80%;">
            เป็นการแสดงถึงความเจริญรุ่งเรืองของประชาธิปไตยระดับท้องถิ่นซึ่งประชาชนมีส่วนร่วมและสนับสนุนอย่างเต็มที่และถือว่าตําบลบางแม่นางได้เป็นประชาธิปไตยอย่างเต็มรูปแบบแล้ว
          </p>
        </div>
      </div>
    </div>
  </main>

</body>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>

</html>