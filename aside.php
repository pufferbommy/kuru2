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
      <a data-bs-toggle="collapse" href="#collapseDurableArticles" role="button" aria-expanded="false" aria-controls="collapseDurableArticles" class="nav-link link-dark">
        ครุภัณฑ์
        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="currentColor" class="bi bi-chevron-down" viewBox="0 0 16 16">
          <path fill-rule="evenodd" d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z" />
        </svg>
      </a>
      <div class="collapse" id="collapseDurableArticles">
        <div>
          <a style="padding: 0.5rem 2rem;" href="durable_articles.php" class="nav-link link-secondary">
            เบิกครุภัณฑ์
          </a>
          <a style="padding: 0.5rem 2rem;" href="durable_articles.php" class="nav-link link-secondary">
            ยืมครุภัณฑ์
          </a>
        </div>
      </div>
    </li>
    <li>
      <a data-bs-toggle="collapse" href="#collapseRegister" role="button" aria-expanded="false" aria-controls="collapseRegister" class="nav-link link-dark">
        ลงทะเบียน
        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="currentColor" class="bi bi-chevron-down" viewBox="0 0 16 16">
          <path fill-rule="evenodd" d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z" />
        </svg>
      </a>
      <div class="collapse" id="collapseRegister">
        <div>
          <a style="padding: 0.5rem 2rem;" href="register.php" class="nav-link link-secondary">
            ลงทะเบียนวัสดุ
          </a>
          <a style="padding: 0.5rem 2rem;" href="register.php" class="nav-link link-secondary">
            ลงทะเบียนครุภัณฑ์
          </a>
        </div>
      </div>
    </li>
    <li>
      <a data-bs-toggle="collapse" href="#collapseRegister" role="button" aria-expanded="false" aria-controls="collapseRegister" class="nav-link link-dark">
        แสดงรายงาน....
        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="currentColor" class="bi bi-chevron-down" viewBox="0 0 16 16">
          <path fill-rule="evenodd" d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z" />
        </svg>
      </a>
      <div class="collapse" id="collapseRegister">
        <div>
          <a style="padding: 0.5rem 2rem;" href="register.php" class="nav-link link-secondary">
            วัสดุ
          </a>
          <a style="padding: 0.5rem 2rem;" href="register.php" class="nav-link link-secondary">
            ครุภัณฑ์
          </a>
        </div>
      </div>
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
      <a data-bs-toggle="collapse" href="#collapsePurchase" role="button" aria-expanded="false" aria-controls="collapsePurchase" class="nav-link link-dark">
        จัดซื้อ
        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="currentColor" class="bi bi-chevron-down" viewBox="0 0 16 16">
          <path fill-rule="evenodd" d="M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z" />
        </svg>
      </a>
      <div class="collapse" id="collapsePurchase">
        <div>
          <a style="padding: 0.5rem 2rem;" href="purchase.php" class="nav-link link-secondary">
            วัสดุ
          </a>
          <a style="padding: 0.5rem 2rem;" href="purchase.php" class="nav-link link-secondary">
            ครุภัณฑ์
          </a>
        </div>
      </div>
    </li>
    <li>
      <a href="#" class="nav-link link-dark">
        ออกรายงาน
      </a>
    </li>
  </ul>
</aside>