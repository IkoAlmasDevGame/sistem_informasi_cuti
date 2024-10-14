<?php if($_SESSION['hak_akses'] == ""){ ?>
<?php echo "<script>document.location.href = '../../auth/index.php';</script>"; die; ?>
<?php } ?>

<?php if($_SESSION['hak_akses'] == "Supervisor"){ ?>
<!-- ======= Header ======= -->
<header id="header" class="header fixed-top d-flex align-items-center" style="position:fixed">
    <div class="d-flex align-items-center justify-content-between">
        <a href="" role="button" class="logo d-flex align-items-center fs-5 fst-normal fw-semibold">
            Sistem Pengajuan Cuti
        </a>
        <i class="bi bi-list toggle-sidebar-btn"></i>
        <?php 
            // setting tanggal
            $haries = array("Sunday" => "Minggu", "Monday" => "Senin", "Tuesday" => "Selasa", "Wednesday" => "Rabu", "Thursday" => "Kamis", "Friday" => "Jum'at", "Saturday" => "Sabtu");
            $bulans = array("", "Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember");
            $bulans_count = count($bulans);
            // tanggal bulan dan tahun hari ini
            $hari_ini = $haries[date("l")];
            $bulan_ini = $bulans[date("n")];
            $tanggal = date("d");
            $bulan = date("m");
            $tahun = date("Y");
        ?>
        &nbsp;<?php echo $hari_ini.", ".$tanggal." ".$bulan_ini." ".$tahun ?>
    </div><!-- End Logo -->

    <nav class="header-nav ms-auto mx-3">
        <ul>
            <li class="nav-item dropdown pe-3">

                <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" role="button"
                    data-bs-toggle="dropdown" aria-controls="dropdown">
                    <?php $npp = $_SESSION['supervisor']; $data = mysqli_query($konfigs, "SELECT * FROM employee WHERE npp = '$npp' and hak_akses = 'Supervisor'"); ?>
                    <i class="fa fa-2x fa-user-circle"></i>
                    <span class="d-none d-md-block dropdown-toggle ps-2"></span>
                </a><!-- End Profile Iamge Icon -->

                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
                    <?php $baseFile = mysqli_fetch_array($data); ?>
                    <li class="dropdown-header">
                        <hr class="dropdown-divider">
                        <div class="text-start">npp : <?php  echo $baseFile['npp']; ?></div>
                        <hr class="dropdown-divider">
                        <div class="text-start">Nama : <?php  echo $baseFile['nama_emp']; ?></div>
                        <hr class="dropdown-divider">
                        <div class="text-start">Jabatan : <?php  echo $baseFile['jabatan']; ?></div>
                        <hr class="dropdown-divider">
                        <div class="text-start">Divisi : <?php  echo $baseFile['divisi']; ?></div>
                        <hr class="dropdown-divider">
                    </li>
                </ul><!-- End Profile Dropdown Items -->
            </li><!-- End Profile Nav -->

        </ul>
    </nav><!-- End Icons Navigation -->

</header>
<!-- ======= Header ======= -->
<!-- ======= Sidebar ======= -->
<aside id="sidebar" class="sidebar">
    <ul class="sidebar-nav" id="sidebar-nav">
        <li class="nav-item">
            <a href="?page=beranda" aria-current="page" class="nav-link collapsed">
                <i class="fa fa-home fa-1x"></i>
                <span>Dashboard</span>
            </a>
        </li>
        <div class="border border-top mt-1 mb-1 border-dark"></div>
        <li class="nav-item">
            <a href="#" aria-current="page" data-bs-target="#approval-nav" data-bs-toggle="collapse"
                class="nav-link collapsed">
                <i class="bi bi-menu-button-wide"></i>
                <span>Data Approval</span>
                <i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul class="nav-content collapse" id="approval-nav" data-bs-parent="#sidebar-nav">
                <a href="?page=approval-cuti" aria-current="page">
                    <i class="bi bi-circle fa-1x"></i>
                    <span>Approval Cuti</span>
                </a>
                <a href="?page=approval-all" aria-current="page">
                    <i class="bi bi-circle fa-1x"></i>
                    <span>Semua Data</span>
                </a>
            </ul>
        </li>
        <div class="border border-top mt-1 mb-1 border-dark"></div>
        <li class="nav-item">
            <a href="#" aria-current="page" data-bs-target="#pengajuan-nav" data-bs-toggle="collapse"
                class="nav-link collapsed">
                <i class="bi bi-menu-button-wide"></i>
                <span>Pengajuan Cuti</span>
                <i class="bi bi-chevron-down ms-auto"></i>
            </a>
            <ul class="nav-content collapse" id="pengajuan-nav" data-bs-parent="#sidebar-nav">
                <a href="?page=cuti_create" aria-current="page">
                    <i class="bi bi-circle fa-1x"></i>
                    <span>Buat Pengajuan</span>
                </a>
                <a href="?page=cuti_waitapp" aria-current="page">
                    <i class="bi bi-circle fa-1x"></i>
                    <span>Menunggu Approval</span>
                </a>
                <a href="?page=cuti_reject" aria-current="page">
                    <i class="bi bi-circle fa-1x"></i>
                    <span>Rejected</span>
                </a>
                <a href="?page=cuti_app" aria-current="page">
                    <i class="bi bi-circle fa-1x"></i>
                    <span>Approved</span>
                </a>
            </ul>
        </li>
        <div class="border border-top mt-1 mb-1 border-dark"></div>
        <li class="nav-item">
            <a href="?page=keluar" onclick="return confirm('Apakah anda ingin keluar ?')" aria-current="page"
                class="nav-link collapsed">
                <i class="fa fa-sign-out fa-1x"></i>
                <span>Log Out</span>
            </a>
        </li>
    </ul>
</aside>
<!-- ======= Sidebar ======= -->
<main id="main" class="main">
    <section class="section dashboard">
        <div class="row">

            <!-- Left side columns -->
            <div class="col-lg-8">
                <div class="row">

                </div>

            </div><!-- End Right side columns -->

        </div>
    </section>
    <?php }else{ ?>
    <?php echo "<script>document.location.href = '../../auth/index.php';</script>"; die; ?>
    <?php } ?>