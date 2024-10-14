<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Waiting Approval</title>
        <?php 
            if($_SESSION['akses'] == "Admin"){
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
                    <h4 class="panel-title">Waiting Approval</h4>
                    <div class="breadcrumb d-flex justify-content-end align-items-end flex-wrap">
                        <li class="breadcrumb breadcrumb-item">
                            <a href="?page=beranda" aria-current="page" class="text-primary text-decoration-none">
                                Beranda
                            </a>
                        </li>
                        <li class="breadcrumb breadcrumb-item">
                            <a href="?page=approval-wait" aria-current="page" class="text-primary text-decoration-none">
                                Waiting Approval
                            </a>
                        </li>
                    </div>
                </div>
                <div class="z-1 mt-3">
                    <div class="card container mb-3">
                        <div class="card-header">
                            <h4 class="card-title">Waiting Approval</h4>
                        </div>
                        <div class="card-body mt-1">
                            <div class="container">
                                <div class="table-responsive">
                                    <form action="" method="post">
                                        <select name="length" id="example1_length" aria-controls="example2_length"
                                            required>
                                            <option value="10">10</option>
                                            <option value="25">25</option>
                                            <option value="50">50</option>
                                            <option value="100">100</option>
                                        </select>
                                        <input type="search" name="cari" aria-controls="example2_filter"
                                            id="example1_filter" required>
                                    </form>
                                    <div class="d-table">
                                        <table class="table-layout" id="example1">
                                            <thead>
                                                <th class="table-layout-2 text-center">No</th>
                                                <th class="table-layout-2 text-center">No Cuti</th>
                                                <th class="table-layout-2 text-center">Nama Pemohon</th>
                                                <th class="table-layout-2 text-center">Tgl Pengajuan</th>
                                                <th class="table-layout-2 text-center">Tgl Awal</th>
                                                <th class="table-layout-2 text-center">Tgl Akhir</th>
                                                <th class="table-layout-2 text-center">Opsi</th>
                                            </thead>
                                            <tbody>
                                                <?php 
                                                    $no = 1;
                                                    $sql = "SELECT cuti.*, employee.* FROM cuti, employee WHERE cuti.npp=employee.npp AND cuti.stt_cuti='Menunggu Approval HRD' ORDER BY cuti.tgl_pengajuan DESC";
                                                    $ambil = $konfigs->query($sql);
                                                    while($data = $ambil->fetch_array()){
                                                ?>
                                                <tr>
                                                    <td class="table-layout-2 text-center"><?php echo $no; ?></td>
                                                    <td class="table-layout-2 text-center">
                                                        <?php echo $data['no_cuti'] ?>
                                                    </td>
                                                    <td class="table-layout-2 text-center">
                                                        <a href="#myModal" data-bs-toggle="modal"
                                                            data-remote-target="#myModal .modal-body"
                                                            data-load-npp="<?php echo $data['npp']?>"
                                                            class=""><?php echo $data['nama_emp'] ?></a>
                                                    </td>
                                                    <td class="table-layout-2 text-center">
                                                        <?php echo format_tanggal($data['tgl_pengajuan']) ?></td>
                                                    <td class="table-layout-2 text-center">
                                                        <?php echo format_tanggal($data['tgl_awal']) ?></td>
                                                    <td class="table-layout-2 text-center">
                                                        <?php echo format_tanggal($data['tgl_akhir']) ?></td>
                                                    <td class="table-layout-2 text-center">
                                                        <a href="#myModal" aria-current="page" data-bs-toggle="modal"
                                                            data-remote-target="#myModal .modal-body"
                                                            data-load-code="<?php echo $data['no_cuti'];?>"
                                                            class="btn btn-sm btn-warning">
                                                            <span>Detail</span>
                                                        </a>
                                                        <a href="?page=approval-review&no=<?php echo $data['no_cuti']?>"
                                                            aria-current="page" class="btn btn-primary btn-sm"
                                                            target="_blank" onclick="return confirm('review data')">
                                                            <i class="fa fa-eye fa-1x"></i>
                                                        </a>
                                                    </td>
                                                </tr>
                                                <?php
                                                $no++;
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
        </div>
        <?php require_once("../ui/footer2.php") ?>