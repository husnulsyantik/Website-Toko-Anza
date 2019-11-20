<!-- Side Navbar -->
    <nav class="side-navbar">
      <div class="side-navbar-wrapper">
        <div class="sidenav-header d-flex align-items-center justify-content-center">
          <div class="sidenav-header-inner text-center">
		  <h1><strong>TOKO&nbsp;</strong><strong class="text-primary">ANZA</strong></h1>
          </div>
          <div class="sidenav-header-logo"><a href="index.php" class="brand-small text-center"> <strong>T</strong><strong class="text-primary">A</strong></a></div>
        </div>
        <div class="main-menu">
          <ul id="side-main-menu" class="side-menu list-unstyled">
            <li ><a href="index.php"> <i class="icon-home"></i><span>Home</span></a></li>
			<li> <a href="inputdata.php"><i class="icon-padnote"></i><span>Input Data Barang</span></a></li>
            <li> <a href="#barang" data-toggle="collapse" aria-expanded="false"><i class="icon-interface-windows"></i><span>Master Data</span>
                <div class="arrow pull-right"><i class="fa fa-angle-down"></i></div></a>
              <ul id="barang" class="collapse list-unstyled">
                <li> <a href="barang.php">Barang</a></li>
                <li> <a href="kategori.php">Kategori barang</a></li>
                <li> <a href="jenis.php">Jenis Barang</a></li>
                </ul>
            </li>
			<li> <a href="#pages-nav-list" data-toggle="collapse" aria-expanded="false"><i class="icon-presentation"></i><span>Laporan</span>
                <div class="arrow pull-right"><i class="fa fa-angle-down"></i></div></a>
              <ul id="pages-nav-list" class="collapse list-unstyled">
                <li> <a href="penjualan.php">Penjualan Barang</a></li>
                <li> <a href="stok.php">Stok Barang</a></li>
                <li> <a href="absenpegawai.php">Absensi Pegawai</a></li>
              </ul>
            </li>
            <li> <a href="transaksi.php"><i class="icon-form"></i><span>Transaksi Barang</span></a></li>
            <li> <a href="absen.php"> <i class="icon-user"> </i><span>Absensi</span></a></li>
            <li> <a href="login.php"> <i class="icon-screen"></i><span>Login page</span></a></li>

          </ul>
        </div>

      </div>
    </nav>
    <div class="page home-page">
      <!-- navbar-->
      <header class="header">
        <nav class="navbar">
          <div class="container-fluid">
            <div class="navbar-holder d-flex align-items-center justify-content-between">
              <div class="navbar-header"><a id="toggle-btn" href="#" class="menu-btn"><i class="icon-bars"> </i></a><a href="index.html" class="navbar-brand">
                  <div class="brand-text d-none d-md-inline-block"></div></a></div>
              <ul class="nav-menu list-unstyled d-flex flex-md-row align-items-md-center">

               <li class="nav-item"><a href="login.php" class="nav-link logout">Logout<i class="fa fa-sign-out"></i></a></li>
              </ul>
            </div>
          </div>
        </nav>
      </header>
