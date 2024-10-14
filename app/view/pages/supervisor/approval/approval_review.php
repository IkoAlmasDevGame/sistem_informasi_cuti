<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Review Approval</title>
        <?php 
            if($_SESSION['hak_akses'] == "Leader"){
                require_once("../ui/header.php");
                require_once("../../../../database/koneksi.php");
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
                    <h4 class="panel-title">Review Approval</h4>
                    <div class="breadcrumb d-flex justify-content-end align-items-end flex-wrap">
                        <li class="breadcrumb breadcrumb-item">
                            <a href="?page=beranda" aria-current="page" class="text-primary text-decoration-none">
                                Beranda
                            </a>
                        </li>
                        <li class="breadcrumb breadcrumb-item">
                            <a href="?page=approval-review&no=<?php echo $_GET['no_cuti']?>" aria-current="page"
                                class="text-primary text-decoration-none">
                                Data Approval Cuti
                            </a>
                        </li>
                    </div>
                </div>
                <div class="card container mb-4">
                    <div class="card-header py-2">
                        <h4 class="card-title text-center">Data Approval Cuti</h4>
                        <h4 class="card-title text-center">Review Pengajuan Cuti</h4>
                    </div>
                    <div class="card-body mt-2">
                        <div class="container">
                            <div class="table-responsive">
                                <div class="d-flex justify-content-center align-items-center flex-wrap">
                                    <div class="card col-sm-7 col-md-7">
                                        <div class="card-header">
                                            <h4 class="card-title">Data Approval Cuti</h4>
                                        </div>
                                        <div class="card-body">
                                            <?php if(isset($_GET['no'])): ?>
                                            <?php
                                            $now = date('Y-m-d');
                                            $Sql = "SELECT cuti.*, employee.* FROM cuti, employee WHERE cuti.npp=employee.npp AND cuti.no_cuti='$_GET[no]'"; 
                                            $ambil = mysqli_query($konfigs, $Sql);
                                            while($data = $ambil->fetch_array()){
                                            ?>
                                            <form action="" name="cuti" enctype="multipart/form-data"
                                                onsubmit="return valid();" method="post">
                                                <div class="form-group mt-1">
                                                    <!-- No Cuti -->
                                                    <div class="form-inline row justify-content-center
                                                         align-items-center flex-wrap">
                                                        <div class="form-label label-default col-sm-4 col-md-4">
                                                            <label for="" class="fst-normal fw-medium fs-5
                                                                text-dark display-4">No. Cuti</label>
                                                        </div>
                                                        <div class="col-sm-6 col-md-6">
                                                            <input type="text" name="no"
                                                                value="<?php echo $data['no_cuti'];?>" readonly
                                                                class="form-control" required id="">
                                                        </div>
                                                    </div>
                                                    <div class="my-1"></div>
                                                    <!-- nama employee -->
                                                    <div class="form-inline row justify-content-center
                                                         align-items-center flex-wrap">
                                                        <div class="form-label label-default col-sm-4 col-md-4">
                                                            <label for="" class="fst-normal fw-medium fs-5
                                                                text-dark display-4">Nama Pemohon</label>
                                                        </div>
                                                        <div class="col-sm-6 col-md-6">
                                                            <input type="text" name="mulai"
                                                                value="<?php echo $data['nama_emp'];?>" readonly
                                                                class="form-control" required id="">
                                                        </div>
                                                    </div>
                                                    <div class="my-1"></div>
                                                    <!-- Tanggal Pengajuan -->
                                                    <div class="form-inline row justify-content-center
                                                         align-items-center flex-wrap">
                                                        <div class="form-label label-default col-sm-4 col-md-4">
                                                            <label for="" class="fst-normal fw-medium fs-5
                                                                text-dark display-4">Tanggal Pengajuan</label>
                                                        </div>
                                                        <div class="col-sm-6 col-md-6">
                                                            <input type="text" name="mulai"
                                                                value="<?php echo format_tanggal($data['tgl_pengajuan']);?>"
                                                                readonly class="form-control" required id="">
                                                        </div>
                                                    </div>
                                                    <div class="my-1"></div>
                                                    <!-- Tanggal Mulai -->
                                                    <div class="form-inline row justify-content-center
                                                         align-items-center flex-wrap">
                                                        <div class="form-label label-default col-sm-4 col-md-4">
                                                            <label for="" class="fst-normal fw-medium fs-5
                                                                text-dark display-4">Tanggal Mulai</label>
                                                        </div>
                                                        <div class="col-sm-6 col-md-6">
                                                            <input type="text" name="mulai"
                                                                value="<?php echo format_tanggal($data['tgl_awal']);?>"
                                                                readonly class="form-control" required id="">
                                                        </div>
                                                    </div>
                                                    <div class="my-1"></div>
                                                    <!-- Tanggal Akhir -->
                                                    <div class="form-inline row justify-content-center
                                                         align-items-center flex-wrap">
                                                        <div class="form-label label-default col-sm-4 col-md-4">
                                                            <label for="" class="fst-normal fw-medium fs-5
                                                                text-dark display-4">Tanggal Akhir</label>
                                                        </div>
                                                        <div class="col-sm-6 col-md-6">
                                                            <input type="text" name="mulai"
                                                                value="<?php echo format_tanggal($data['tgl_akhir']);?>"
                                                                readonly class="form-control" required id="">
                                                        </div>
                                                    </div>
                                                    <div class="my-1"></div>
                                                    <!-- Durasi -->
                                                    <div class="form-inline row justify-content-center
                                                         align-items-center flex-wrap">
                                                        <div class="form-label label-default col-sm-4 col-md-4">
                                                            <label for="" class="fst-normal fw-medium fs-5
                                                                text-dark display-4">Durasi</label>
                                                        </div>
                                                        <div class="col-sm-6 col-md-6">
                                                            <input type="text" name="mulai"
                                                                value="<?php echo ($data['durasi']);?>" readonly
                                                                class="form-control" required id="">
                                                        </div>
                                                    </div>
                                                    <div class="my-1"></div>
                                                    <!-- Keterangan -->
                                                    <div class="form-inline row justify-content-center
                                                         align-items-center flex-wrap">
                                                        <div class="form-label label-default col-sm-4 col-md-4">
                                                            <label for="" class="fst-normal fw-medium fs-5
                                                                text-dark display-4">Keterangan</label>
                                                        </div>
                                                        <div class="col-sm-6 col-md-6">
                                                            <textarea name="keterangan" class="form-control"
                                                                placeholder="Keterangan" rows="3"
                                                                readonly><?php echo $data['keterangan'];?></textarea>
                                                        </div>
                                                    </div>
                                                    <div class="my-1"></div>
                                                    <!-- Aksi -->
                                                    <div class="form-inline row justify-content-center
                                                         align-items-center flex-wrap">
                                                        <div class="form-label label-default col-sm-4 col-md-4">
                                                            <label for="" class="fst-normal fw-medium fs-5
                                                                text-dark display-4">Aksi</label>
                                                        </div>
                                                        <div class="col-sm-6 col-md-6">
                                                            <select name="aksi" id="aksi" class="form-control" required>
                                                                <option value="" selected>---- Pilih Aksi ----</option>
                                                                <option value="1">Approved</option>
                                                                <option value="2">Rejected</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="my-1"></div>
                                                    <!-- Supervisor -->
                                                    <div class="form-inline row justify-content-center
                                                         align-items-center flex-wrap">
                                                        <div class="form-label label-default col-sm-4 col-md-4">
                                                            <label for="" class="fst-normal fw-medium fs-5
                                                                text-dark display-4">Supervisor</label>
                                                        </div>
                                                        <div class="col-sm-6 col-md-6">
                                                            <select name="mng" id="mng" class="form-select" disabled
                                                                required>
                                                                <?php
												                	$sql_don = "SELECT * FROM employee WHERE hak_akses='Manager' AND active='aktif' ORDER BY nama_emp ASC";
												                	$ress_don = mysqli_query($konfigs, $sql_don);
												                	while($li = mysqli_fetch_array($ress_don)) {
												                		echo '<option value="'. $li['npp'] .'">'. $li['nama_emp'].'</option>';
												                	}
												                ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="my-1"></div>
                                                    <!-- Keterangan Reject -->
                                                    <div class="form-inline row justify-content-center
                                                         align-items-center flex-wrap">
                                                        <div class="form-label label-default col-sm-4 col-md-4">
                                                            <label for="" class="fst-normal fw-medium fs-5
                                                                text-dark display-4">Keterangan Reject</label>
                                                        </div>
                                                        <div class="col-sm-6 col-md-6">
                                                            <textarea name="reject" class="form-control"
                                                                placeholder="Keterangan Reject" rows="3" id="reject"
                                                                required disabled></textarea>
                                                        </div>
                                                    </div>
                                                    <div class="my-1"></div>
                                                </div>
                                                <div class="card-footer">
                                                    <div class="text-center">
                                                        <button type="submit" class="btn btn-primary">
                                                            <i class="fa fa-save fa-1x"></i>
                                                            <span>Simpan</span>
                                                        </button>
                                                    </div>
                                                </div>
                                            </form>
                                            <?php
                                            }
                                            ?>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php require_once('../ui/footer.php'); ?>