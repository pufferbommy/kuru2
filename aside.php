<aside class="d-flex h-100 flex-column flex-shrink-0 p-3 border-end" style="width: 280px;">
  <div class="d-flex justify-content-between align-items-center">
    <div class="d-flex gap-2">
      <img src="https://i.pinimg.com/564x/47/ba/71/47ba71f457434319819ac4a7cbd9988e.jpg" alt="mdo" width="24" height="24" class="rounded-circle">
      <?= $_SESSION["username"]; ?>
    </div>
    <a onclick="return confirm('ต้องการออกจากระบบใช่ไหม?')" href="logout.php">ออกจากระบบ</a>
  </div>
  <hr>
  <ul class="nav nav-pills flex-column mb-auto">
    <li class="nav-item">
      <a href="#" class="nav-link active" aria-current="page">
        หน้าหลัก
      </a>
    </li>
    <li>
      <a href="#" class="nav-link link-dark">
        บุคลากร
      </a>
    </li>
    <li>
      <a href="#" class="nav-link link-dark">
        สถานที่
      </a>
    </li>
    <li>
      <a href="#" class="nav-link link-dark">
        เบิกวัสดุ
      </a>
    </li>
    <li>
      <a href="#" class="nav-link link-dark">
        ครุภัณฑ์
      </a>
    </li>
    <li>
      <a href="#" class="nav-link link-dark">
        ลงทะเบียน
      </a>
    </li>
    <li>
      <a href="#" class="nav-link link-dark">
        แสดงรายงาน....
      </a>
    </li>
    <li>
      <a href="#" class="nav-link link-dark">
        คำนวนค่าเสื่อมชำรุด
      </a>
    </li>
    <li>
      <a href="#" class="nav-link link-dark">
        แทงจำหน่ายซ่อม
      </a>
    </li>
    <li>
      <a href="#" class="nav-link link-dark">
        จัดซื้อ
      </a>
    </li>
    <li>
      <a href="#" class="nav-link link-dark">
        ออกรายงาน
      </a>
    </li>
  </ul>
</aside>