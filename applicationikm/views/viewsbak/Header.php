    <header>
      <nav class="navbar navbar-expand-md navbar-dark fixed-top">
        <div class="container">
          <a class="navbar-brand d-flex align-items-center" href="#">
            <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/e/ee/Coat_of_arms_of_Riau_Islands.png/180px-Coat_of_arms_of_Riau_Islands.png" alt=""/>
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
            aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarCollapse">
            <ul class="navbar-nav ml-auto">
              <li class="nav-item active">
                <?php echo anchor('', 'Beranda <span class="sr-only">(current)</span>', 'class="nav-link"') ?>
              </li>
              <li class="nav-item dropdown">
                <a
                  class="nav-link dropdown-toggle"
                  href="#"
                  id="dd_profile"
                  data-toggle="dropdown"
                  aria-haspopup="true"
                  aria-expanded="false"
                  >Profil</a>
                <div class="dropdown-menu" aria-labelledby="dd_profile">
                  <?php echo anchor('TPDF', 'Tugas Pokok dan Fungsi', 'class="dropdown-item"') ?>
                  <?php echo anchor('Pegawai', 'Pegawai', 'class="dropdown-item"') ?>
                  <?php echo anchor('StrukturOrganisasi', 'Struktur Organisasi', 'class="dropdown-item"') ?>
                </div>
              </li>
              <li class="nav-item active">
                <?php echo anchor('Regulasi', 'Regulasi', 'class="nav-link"') ?>
              </li>
              <li class="nav-item active">
                <?php echo anchor('Berita', 'Berita', 'class="nav-link"') ?>
              </li>
              <li class="nav-item active">
                <?php echo anchor('Pembinaan', 'Pembinaan', 'class="nav-link"') ?>
              </li>
              <li class="nav-item dropdown">
                <a
                  class="nav-link dropdown-toggle"
                  href="#"
                  id="dd_database"
                  data-toggle="dropdown"
                  aria-haspopup="true"
                  aria-expanded="false"
                  >Database</a>
                <div class="dropdown-menu" aria-labelledby="dd_database">
                  <?php echo anchor('DataIKM', 'Data IKM', 'class="dropdown-item"') ?>
                  <?php echo anchor('DataSentra', 'Data Sentra', 'class="dropdown-item"') ?>
                </div>
              </li>
            </ul>
          </div>
        </div>
      </nav>
    </header>