    <header>
      <!-- <nav class="navbar navbar-expand-md fixed-top navbar-dark dark-blue">
        <div class="container">
          <ul class="navbar-nav ml-auto">
            <li>Senin, 27 Juli 2019 | 12:00:01</li>
          </ul>
        </div>
      </nav> -->
      <nav class="navbar navbar-expand-md navbar-dark fixed-top">
        <div class="container">
          <a class="navbar-brand d-flex align-items-center" href="#">
            <img
              src="https://upload.wikimedia.org/wikipedia/commons/thumb/e/ee/Coat_of_arms_of_Riau_Islands.png/180px-Coat_of_arms_of_Riau_Islands.png"
              alt=""
            />
            <div>
              <h3 class="mb-1"><b>BIDANG IKM DISPERINDAG</b></h3>
              <p class="mb-0">Provinsi Kepulauan Riau</p>
            </div>
          </a>
          <button
            class="navbar-toggler"
            type="button"
            data-toggle="collapse"
            data-target="#navbarCollapse"
            aria-controls="navbarCollapse"
            aria-expanded="false"
            aria-label="Toggle navigation"
          >
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarCollapse">
            <ul class="navbar-nav ml-auto">
              <li class="nav-item dropdown">
                <a
                  class="nav-link dropdown-toggle"
                  href="#"
                  id="dd_profile"
                  data-toggle="dropdown"
                  aria-haspopup="true"
                  aria-expanded="false"
                  >Database</a
                >
                <div class="dropdown-menu" aria-labelledby="dd_profile">
                  <?php echo anchor('adminpage/DataIKM', 'Data IKM', 'class="dropdown-item"') ?>
                  <?php echo anchor('adminpage/DataKube', 'Data Kube', 'class="dropdown-item"') ?>
                </div>
              </li>
              <li class="nav-item dropdown">
                <a
                  class="nav-link dropdown-toggle"
                  href="#"
                  id="dd_profile"
                  data-toggle="dropdown"
                  aria-haspopup="true"
                  aria-expanded="false"
                  >Profile</a
                >
                <div class="dropdown-menu" aria-labelledby="dd_profile">
                  <?php echo anchor('adminpage/Profile/TPDF', 'Tugas Pokok dan Fungsi', 'class="dropdown-item"') ?>
                  <?php echo anchor('adminpage/Profile/StrukturOrg', 'Struktur Organisasi', 'class="dropdown-item"') ?>
                  <?php echo anchor('adminpage/Profile/EmployeeList', 'Pegawai', 'class="dropdown-item"') ?>
                  <!--<?php //echo anchor('adminpage/Profile/Logo', 'Logo', 'class="dropdown-item"') ?>-->
                </div>
              </li>
              <li class="nav-item active">
                <?php echo anchor('adminpage/Regulasi', 'Regulasi', 'class="nav-link"') ?>
              </li>
              <li class="nav-item dropdown">
                <a
                  class="nav-link dropdown-toggle"
                  href="#"
                  id="dd_profile"
                  data-toggle="dropdown"
                  aria-haspopup="true"
                  aria-expanded="false"
                  >Data Pendukung</a
                >
                <div class="dropdown-menu" aria-labelledby="dd_profile">
                  <a class="dropdown-item" href="#"></a>
                  <?php echo anchor('adminpage/DP_Petugas', 'Data Petugas Pendataan', 'class="dropdown-item"') ?>
                  <?php echo anchor('adminpage/DP_Satuan', 'Data Satuan', 'class="dropdown-item"') ?>
                  <?php echo anchor('adminpage/DP_Produk', 'Data Produk', 'class="dropdown-item"') ?>
                  <?php echo anchor('adminpage/DP_Bahan_Baku', 'Data Bahan Baku', 'class="dropdown-item"') ?>
                  <?php echo anchor('adminpage/DP_Kota', 'Data Kota/ Negara', 'class="dropdown-item"') ?>
                  <?php echo anchor('adminpage/DP_BB', 'Data Bahan Bakar', 'class="dropdown-item"') ?>
                </div>
              </li>
              <li class="nav-item dropdown">
                <a
                  class="nav-link dropdown-toggle"
                  href="#"
                  id="dd_profile"
                  data-toggle="dropdown"
                  aria-haspopup="true"
                  aria-expanded="false"
                  >Input Data By Admin</a
                >
                <div class="dropdown-menu" aria-labelledby="dd_profile">
                  <?php echo anchor('adminpage/ByAdmin_Sentra', 'Data Sentra', 'class="dropdown-item"') ?>
                  <a class="dropdown-item" href="#">Data Calon WUB</a>
                  <a class="dropdown-item" href="#">Data Potensi Bahan Baku</a>
                </div>
              </li>
              <li class="nav-item dropdown">
                <a
                  class="nav-link dropdown-toggle"
                  href="#"
                  id="dd_profile"
                  data-toggle="dropdown"
                  aria-haspopup="true"
                  aria-expanded="false"
                  >Input Database By User</a
                >
                <div class="dropdown-menu" aria-labelledby="dd_profile">
                  <a class="dropdown-item" href="#">Beranda</a>
                  <a class="dropdown-item" href="#">Verifikasi Data Petugas</a>
                  <a class="dropdown-item" href="#">Kembali / Hapus</a>
                </div>
              </li>
              <li class="nav-item dropdown">
                <a
                  class="nav-link dropdown-toggle"
                  href="#"
                  id="dd_profile"
                  data-toggle="dropdown"
                  aria-haspopup="true"
                  aria-expanded="false"
                  >Pembinaan</a
                >
                <div class="dropdown-menu" aria-labelledby="dd_profile">
                  <a class="dropdown-item" href="#">Narasumber/Instruktur</a>
                  <a class="dropdown-item" href="#">Peserta Binaan</a>
                  <a class="dropdown-item" href="#">Data Pembinaan</a>
                </div>
              </li>
              <li class="nav-item dropdown">
                <a
                  class="nav-link dropdown-toggle"
                  href="#"
                  id="dd_profile"
                  data-toggle="dropdown"
                  aria-haspopup="true"
                  aria-expanded="false"
                  >Berita</a
                >
                <div class="dropdown-menu" aria-labelledby="dd_profile">
                  <a class="dropdown-item" href="#">IKM @News</a>
                  <a class="dropdown-item" href="#">IKM @Foto</a>
                  <a class="dropdown-item" href="#">IKM @Video</a>
                </div>
              </li>
              <li class="nav-item active">
                <a class="nav-link" href="#">Manage User Account</a>
              </li>
              <li class="nav-item dropdown">
                <a
                  class="nav-link dropdown-toggle"
                  href="#"
                  id="dd_profile"
                  data-toggle="dropdown"
                  aria-haspopup="true"
                  aria-expanded="false"
                  >Berita</a
                >
                <div class="dropdown-menu" aria-labelledby="dd_profile">
                  <a class="dropdown-item" href="#">Administrator</a>
                  <a class="dropdown-item" href="#">Petugas</a>
                  <a class="dropdown-item" href="#">Pegawai</a>
                </div>
              </li>
              <li class="nav-item dropdown">
                <a
                  class="nav-link dropdown-toggle"
                  href="#"
                  id="dd_profile"
                  data-toggle="dropdown"
                  aria-haspopup="true"
                  aria-expanded="false"
                  >Others</a
                >
                <div class="dropdown-menu" aria-labelledby="dd_profile">
                  <a class="dropdown-item" href="#">Link</a>
                </div>
              </li>
              <li class="nav-item active">
                <a class="nav-link" href="#">Menu User</a>
              </li>
              <li class="nav-item active">
                <a class="nav-link" href="#">Logout</a>
              </li>
            </ul>
          </div>
        </div>
      </nav>
    </header>
