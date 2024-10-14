<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Semua Data Approval Cuti</title>
        <?php 
            if($_SESSION['hak_akses'] == "Leader"){
                require_once("../ui/header.php");
                require_once("../../../../database/koneksi.php");
                require_once("../library/format_tanggal.php");
                require_once("../library/format_rupiah.php");
            }else{
                echo "<script>document.location.href = '../ui/header.php?page=beranda'</script>";
            }
        ?>
    </head>

    <body>
        <?php require_once("../ui/sidebar.php") ?>
        <div class="panel container panel-default bg-body-tertiary">
            <div class="panel-body py-2">
                <div class="panel-heading">
                    <h4 class="panel-title">Semua Data Approval Cuti</h4>
                    <div class="breadcrumb d-flex justify-content-end align-items-end flex-wrap">
                        <li class="breadcrumb breadcrumb-item">
                            <a href="?page=beranda" aria-current="page" class="text-primary text-decoration-none">
                                Beranda
                            </a>
                        </li>
                        <li class="breadcrumb breadcrumb-item">
                            <a href="?page=approval-all" aria-current="page" class="text-primary text-decoration-none">
                                Semua Data Approval Cuti
                            </a>
                        </li>
                    </div>
                </div>
                <div class="card container mb-4">
                    <div class="card-header py-2">
                        <h4 class="card-title text-start">
                            Semua Data Approval Cuti
                        </h4>
                    </div>
                    <div class="card-body mt-1">
                        <div class="container">
                            <div class="table-responsive">
                                <div class="d-table">
                                    <table class="table-layout" id="tabel-data">
                                        <thead>
                                            <tr>
                                                <th class="text-center table-layout-2">No</th>
                                                <th class="text-center table-layout-2">No Cuti</th>
                                                <th class="text-center table-layout-2">Nama Pemohon</th>
                                                <th class="text-center table-layout-2">Tanggal Pengajuan</th>
                                                <th class="text-center table-layout-2">Tanggal Awal</th>
                                                <th class="text-center table-layout-2">Tanggal Akhir</th>
                                                <th class="text-center table-layout-2">Opsional</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php 
                                                $no = 1;
                                                $npp = $_SESSION['leader'];
                                                $Sql = "SELECT cuti.*, employee.* FROM cuti JOIN employee ON cuti.npp=employee.npp WHERE cuti.leader='$npp' ORDER BY cuti.tgl_pengajuan DESC";
                                                $ambil = $konfigs->query($Sql);
                                                while($pecah = $ambil->fetch_assoc()){
                                            ?>
                                            <tr>
                                                <td class="table-layout-2 text-center"><?php echo $no; ?></td>
                                                <td class="table-layout-2 text-center">
                                                    <?php echo $pecah['no_cuti'] ?>
                                                </td>
                                                <td class="table-layout-2 text-center">
                                                    <a href="#myModal" data-toggle="modal"
                                                        data-load-npp="<?php echo $pecah['npp']?>"
                                                        data-remote-target="#myModal .modal-body">
                                                        <?php echo $pecah['nama_emp'] ?>
                                                    </a>
                                                </td>
                                                <td class="table-layout-2 text-center">
                                                    <?php echo format_tanggal($pecah['tgl_pengajuan']) ?></td>
                                                <td class="table-layout-2 text-center">
                                                    <?php echo format_tanggal($pecah['tgl_awal']) ?></td>
                                                <td class="table-layout-2 text-center">
                                                    <?php echo format_tanggal($pecah['tgl_akhir']) ?></td>
                                                <td class="table-layout-2 text-center">
                                                    <a href="" aria-current="page"
                                                        data-load-code="<?php echo $pecah['no_cuti']; ?>"
                                                        class="btn btn-info btn-sm btn-outline-dark">
                                                        Detail
                                                    </a>
                                                    <?php if($pecah['hrd_app'] == 1): ?>
                                                    <a href="?page=cetak&no=<?php echo $pecah['no_cuti'];?>"
                                                        aria-current="page"
                                                        onclick="return confirm('Apakah anda ingin print no cuti ini ?');"
                                                        class="btn btn-primary btn-sm btn-outline-light">
                                                        <i class="fas fa-print fa-1x"></i>
                                                    </a>
                                                    <?php endif; ?>
                                                </td>
                                            </tr>
                                            <?php
                                                }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="modal fade bs-example-modal" id="myModal" tabindex="-1" role="dialog"
                                    aria-hidden="true">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                            <div class="modal-body">
                                                <p>Sedang memproses…</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php require_once("../../leader/ui/footer2.php"); ?>