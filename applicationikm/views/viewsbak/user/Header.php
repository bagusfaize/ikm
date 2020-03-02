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
              <li class="nav-item active">
                <a class="nav-link" href="#">Data IKM</a>
              </li>
              <li class="nav-item active">
                <a class="nav-link" href="#">Data Kube</a>
              </li>
              <li class="nav-item active">
				<?php echo anchor('user/StatusData', 'Status Data', 'class="nav-link"') ?>
              </li>
              <li class="nav-item active">
				<?php echo anchor('user/Rekap', 'Rekapitulasi Data', 'class="nav-link"') ?>
              </li>
              <li class="nav-item active">
				<?php echo anchor('user/PetugasPendataan', 'Petugas Pendataan', 'class="nav-link"') ?>
              </li>
              <li class="nav-item active">
                <a class="nav-link" href="#">Logout</a>
              </li>
            </ul>
          </div>
        </div>
      </nav>
    </header>
