<?php
session_start();

if (!isset($_SESSION["loggedin"])) {
  header("location: login.php");
}

include_once "dbconnect.php";

if ($result = $conn->query("SELECT * FROM personnel LEFT JOIN departments ON personnel.department_id = departments.department_id WHERE personnel.full_name LIKE '%{$_GET['search']}%' OR personnel.address LIKE '%{$_GET['search']}%'")) {
  $personnel = $result->fetchAll();
}
if ($result = $conn->query("SELECT * FROM departments")) {
  $departments = $result->fetchAll();
}
if (isset($_POST["action"])) {
  switch ($_POST["action"]) {
    case "add":
      $sql = "INSERT INTO personnel VALUES (?,?,?,?,?)";
      $stmt = $conn->prepare($sql);
      $stmt->execute(array($_POST["personnel_id"], $_POST["full_name"], $_POST["address"], $_POST["phone_number"], $_POST["department_id"]));
      break;
    case "delete":
      $sql = "DELETE FROM personnel WHERE personnel_id = ?";
      $stmt = $conn->prepare($sql);
      $stmt->execute(array($_POST["personnel_id"]));
      break;
    case "edit":
      $sql = "UPDATE personnel SET personnel_id = ?,full_name = ?, address = ?, phone_number = ?, department_id = ? WHERE personnel_id = ?";
      $stmt = $conn->prepare($sql);
      $stmt->execute(array($_POST["personnel_id"], $_POST["full_name"], $_POST["address"], $_POST["phone_number"], $_POST["department_id"], $_POST["prev_personnel_id"]));
      break;
  }
  header("Refresh:0");
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

    th,
    td {
      padding: 1rem !important;
    }
  </style>
</head>

<body class="bg-light d-flex w-100">
  <?php include_once("aside.php"); ?>
  <div class="container py-4">
    <header>
      <h1 class="fs-2">บุคลากร</h1>
      <div class="mt-4 d-flex align-items-center justify-content-between gap-2">
        <form class="d-flex gap-2 mb-0">
          <input value="<?= isset($_GET["search"]) ? $_GET["search"] : ""; ?>" name="search" style="width: 300px;" type="text" class="form-control" placeholder="ค้นหา">
          <button class="btn btn-primary d-inline-flex justify-content-center align-items-center">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
              <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z" />
            </svg>
          </button>
        </form>
        <button type="button" data-bs-toggle="modal" data-bs-target="#adder" class="btn btn-primary">เพิ่มบุคลากร</button>
        <div class="modal fade" id="adder" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
          <div class="modal-dialog">
            <form action="" method="post" class="modal-content">
              <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">ฟอร์มเพิ่มบุคลากร</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                <div class="mb-3">
                  <label for="personnel_id" class="form-label">รหัสบุคลากร</label>
                  <input name="personnel_id" type="text" class="form-control" id="personnel_id">
                </div>
                <div class="mb-3">
                  <label for="full_name" class="form-label">ชื่อ-สกุล</label>
                  <input name="full_name" type="text" class="form-control" id="full_name">
                </div>
                <div class="mb-3">
                  <label for="address" class="form-label">ที่อยู่</label>
                  <textarea name="address" class="form-control" id="address" rows="3"></textarea>
                </div>
                <div class="mb-3">
                  <label for="phone_number" class="form-label">เบอร์โทร</label>
                  <input type="text" name="phone_number" class="form-control" id="phone_number">
                </div>
                <div class="mb-3">
                  <label for="department_id" class="form-label">แผนก</label>
                  <select name="department_id" id="department_id" class="form-select">
                    <?php foreach ($departments as $key => $value) : ?>
                      <option value="<?= $value["department_id"]; ?>"><?= $value["department_name"]; ?></option>
                    <?php endforeach; ?>
                  </select>
                </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">ยกเลิก</button>
                <button name="action" value="add" type="submit" class="btn btn-primary">เพิ่มบุคลากร</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </header>
    <main>
      <table class="table table-bordered rounded mt-4">
        <thead>
          <tr>
            <th scope="col">รหัสบุคลากร</th>
            <th scope="col">ชื่อ-สกุล</th>
            <th scope="col">ที่อยู่</th>
            <th scope="col">เบอร์โทร</th>
            <th scope="col">แผนก</th>
            <th scope="col">แอคชั่น</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($personnel as $key => $value) : ?>
            <tr>
              <th scope="row"><?= $value["personnel_id"]; ?></th>
              <td><?= $value["full_name"]; ?></td>
              <td><?= $value["address"];  ?></td>
              <td><?= $value["phone_number"];  ?></td>
              <td><?= $value["department_name"]; ?></td>
              <td class="d-flex align-items-start gap-2">
                <button data-bs-target="#editor<?= $key + 1; ?>" type="button" data-bs-toggle="modal" class="p-2 btn btn-outline-success">
                  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pen" viewBox="0 0 16 16">
                    <path d="m13.498.795.149-.149a1.207 1.207 0 1 1 1.707 1.708l-.149.148a1.5 1.5 0 0 1-.059 2.059L4.854 14.854a.5.5 0 0 1-.233.131l-4 1a.5.5 0 0 1-.606-.606l1-4a.5.5 0 0 1 .131-.232l9.642-9.642a.5.5 0 0 0-.642.056L6.854 4.854a.5.5 0 1 1-.708-.708L9.44.854A1.5 1.5 0 0 1 11.5.796a1.5 1.5 0 0 1 1.998-.001zm-.644.766a.5.5 0 0 0-.707 0L1.95 11.756l-.764 3.057 3.057-.764L14.44 3.854a.5.5 0 0 0 0-.708l-1.585-1.585z" />
                  </svg>
                </button>
                <div class="modal fade" id="editor<?= $key + 1; ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                  <div class="modal-dialog">
                    <form action="" method="post" class="modal-content">
                      <div class="modal-header">
                        <h1 class="modal-title fs-5" id="staticBackdropLabel">ฟอร์มแก้ไขบุคลากร</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                      <div class="modal-body">
                        <input type="hidden" name="prev_personnel_id" value="<?= $value['personnel_id']; ?>">
                        <div class="mb-3">
                          <label for="personnel_id" class="form-label">รหัสบุคลากร</label>
                          <input value="<?= $value['personnel_id']; ?>" name="personnel_id" type="text" class="form-control" id="personnel_id">
                        </div>
                        <div class="mb-3">
                          <label for="full_name" class="form-label">ชื่อ-สกุล</label>
                          <input value="<?= $value['full_name']; ?>" name="full_name" type="text" class="form-control" id="full_name">
                        </div>
                        <div class="mb-3">
                          <label for="address" class="form-label">ที่อยู่</label>
                          <textarea name="address" class="form-control" id="address" rows="3"><?= $value['address']; ?></textarea>
                        </div>
                        <div class="mb-3">
                          <label for="phone_number" class="form-label">เบอร์โทร</label>
                          <input value="<?= $value['phone_number']; ?>" type="text" name="phone_number" class="form-control" id="phone_number">
                        </div>
                        <div class="mb-3">
                          <label for="department_id" class="form-label">แผนก</label>
                          <select name="department_id" id="department_id" class="form-select">
                            <?php
                            foreach ($departments as $key2 => $value2) {
                              if ($value["department_id"] === $value2["department_id"]) {
                                echo "<option selected value='{$value2["department_id"]}'>{$value2["department_name"]}</option>";
                              } else {
                                echo "<option value='{$value2["department_id"]}'>{$value2["department_name"]}</option>";
                              }
                            }
                            ?>
                          </select>
                        </div>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">ยกเลิก</button>
                        <button name="action" value="edit" type="submit" class="btn btn-primary">อัพเดต</button>
                      </div>
                    </form>
                  </div>
                </div>
                <form action="" method="post">
                  <input type="hidden" name="personnel_id" value="<?= $value["personnel_id"]; ?>">
                  <button class="p-2 btn btn-outline-danger" name="action" value="delete">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                      <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z" />
                      <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z" />
                    </svg>
                  </button>
                </form>
              </td>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </main>
  </div>
</body>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>

</html>