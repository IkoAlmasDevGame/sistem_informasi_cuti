<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Semua Data Approval Cuti</title>
        <?php 
            if($_SESSION['hak_akses'] == "Manager"){
                require_once("../ui/header.php");
                require_once("../../../../database/koneksi.php");
                $npp = $_SESSION['manager'];
            }else{
                echo "<script>document.location.href = '../ui/header.php?page=beranda'</script>";
            }
        ?>
        <script type="text/javascript">
        function valid() {
            if (document.cuti.akhir.value < document.cuti.mulai.value) {
                alert("Tanggal akhir harus lebih besar dari tanggal mulai cuti!");
                return false;
            }

            if (document.cuti.mulai.value < document.cuti.now.value) {
                alert("Tanggal mulai cuti tidak valid!");
                return false;
            }

            return true;
        }
        </script>
    </head>

    <body>
        <?php require_once("../ui/sidebar.php") ?>
        <div class="panel container panel-default bg-body-tertiary">
            <div class="panel-body py-2">
                <div class="panel-heading">
                    <h4 class="panel-title">Buat Pengajuan</h4>
                    <div class="breadcrumb d-flex justify-content-end align-items-end flex-wrap">
                        <li class="breadcrumb breadcrumb-item">
                            <a href="?page=beranda" aria-current="page" class="text-primary text-decoration-none">
                                Beranda
                            </a>
                        </li>
                        <li class="breadcrumb breadcrumb-item">
                            <a href="?page=cuti_create" aria-current="page" class="text-primary text-decoration-none">
                                Buat Pengajuan
                            </a>
                        </li>
                    </div>
                </div>
                <div class="card container mb-4">
                    <div class="card-header py-2">
                        <h4 class="card-title text-center">Form Pengajuan Cuti</h4>
                    </div>
                    <div class="card-body mt-1">
                        <div class="container">
                            <div class="table-responsive">
                                <form action="?aksi=perjanjian-cuti" name="cuti" enctype="multipart/form-data"
                                    onsubmit="return valid();" method="post">
                                    <div class="d-flex justify-content-center align-items-center flex-wrap">
                                        <div class="card col-sm-7 col-md-7">
                                            <div class="card-body">
                                                <!-- Mulai Cuti -->
                                                <div class="form-group mt-1">
                                                    <div class="form-inline row justify-content-center 
                                                    align-items-center flex-wrap">
                                                        <div class="form-label col-sm-4 col-md-4">
                                                            <label for="" class="fst-normal fw-medium fs-5
                                                                 text-dark display-4">Mulai Cuti</label>
                                                        </div>
                                                        <div class="col-sm-6 col-md-6">
                                                            <input type="date" name="mulai" required
                                                                class="form-control" id="">
                                                            <input type="hidden" name="npp" class="form-control"
                                                                value="<?php echo $npp;?>" required>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!--  -->
                                                <div class="my-1"></div>
                                                <!-- Akhir Cuti -->
                                                <div class="form-group mt-1">
                                                    <div class="form-inline row justify-content-center 
                                                    align-items-center flex-wrap">
                                                        <div class="form-label col-sm-4 col-md-4">
                                                            <label for="" class="fst-normal fw-medium fs-5
                                                                 text-dark display-4">Akhir Cuti</label>
                                                        </div>
                                                        <div class="col-sm-6 col-md-6">
                                                            <input type="date" name="akhir" required
                                                                class="form-control" id="">
                                                        </div>
                                                    </div>
                                                </div>
                                                <!--  -->
                                                <div class="my-1"></div>
                                                <!-- Keterangan -->
                                                <div class="form-group mt-1">
                                                    <div class="form-inline row justify-content-center 
                                                    align-items-center flex-wrap">
                                                        <div class="form-label col-sm-4 col-md-4">
                                                            <label for="" class="fst-normal fw-medium fs-5
                                                                 text-dark display-4">Keterangan</label>
                                                        </div>
                                                        <div class="col-sm-6 col-md-6">
                                                            <textarea name="keterangan" class="form-control"
                                                                placeholder="Keterangan" rows="3" required></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!--  -->
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
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php require_once("../ui/footer.php"); ?>