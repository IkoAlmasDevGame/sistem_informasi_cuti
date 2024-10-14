<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Review Approval</title>
        <?php 
            if($_SESSION['akses'] == "Admin"){
                require_once("../ui/header.php");
                require_once("../../../../database/koneksi.php");
                require_once("../library/format_tanggal.php");
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
                    <h4 class="panel-title">Data Approval Cuti</h4>
                    <div class="breadcrumb d-flex justify-content-end align-items-end flex-wrap">
                        <li class="breadcrumb breadcrumb-item">
                            <a href="?page=beranda" aria-current="page" class="text-primary text-decoration-none">
                                Beranda
                            </a>
                        </li>
                        <li class="breadcrumb breadcrumb-item">
                            <a href="?page=approval-review&no=<?php echo $_GET['no']?>" aria-current="page"
                                class="text-primary text-decoration-none">
                                Review Approval
                            </a>
                        </li>
                    </div>
                </div>
                <div class="card container mb-4">
                    <div class="card-header py-2">
                        <h4 class="card-title text-center">Data Approval Cuti</h4>
                    </div>
                    <div class="card-body mt-2">
                        <div class="container">
                            <div class="table-responsive">
                                <div class="d-flex justify-content-center align-items-center flex-wrap">
                                    <div class="card col-sm-7 col-md-7">
                                        <div class="card-header">
                                            <h4 class="card-title text-center">Data Approval Cuti</h4>
                                        </div>
                                        <div class="card-body">
                                            <?php if(isset($_GET['no'])): ?>
                                            <?php 
                                                $no_cuti = htmlspecialchars($_GET['no']);
                                                $Sql = "SELECT cuti.*, employee.* FROM cuti, employee WHERE cuti.npp=employee.npp AND cuti.no_cuti='$no_cuti'";
                                                $data = $konfigs->query($Sql);
                                                $data = mysqli_fetch_array($data);
                                            ?>
                                            <form action="?aksi=update-perjanjian" name="cuti"
                                                onsubmit="return valid();" method="post" enctype="multipart/form-data">
                                                <div class="form-group my-1">
                                                    <!-- No. Cuti -->
                                                    <div class="form-inline row justify-content-center
                                                     align-items-center flex-wrap">
                                                        <div class="form-label col-sm-4 col-md-4">
                                                            <div class="label label-default">
                                                                <label for="" class="fs-5 display-4 text-dark 
                                                                fst-normal fw-medium">No. Cuti</label>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-6 col-md-6">
                                                            <input type="text" name="no" class="form-control"
                                                                value="<?php echo $data['no_cuti'];?>" readonly>
                                                        </div>
                                                    </div>
                                                    <div class="my-1"></div>
                                                    <!--  -->
                                                    <div class="my-1"></div>
                                                    <!-- Nama Pemohon -->
                                                    <div class="form-inline row justify-content-center
                                                     align-items-center flex-wrap">
                                                        <div class="form-label col-sm-4 col-md-4">
                                                            <div class="label label-default">
                                                                <label for="" class="fs-5 display-4 text-dark 
                                                                fst-normal fw-medium">Nama Pemohon</label>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-6 col-md-6">
                                                            <input type="text" name="mulai" class="form-control"
                                                                value="<?php echo $data['nama_emp'];?>" readonly>
                                                        </div>
                                                    </div>
                                                    <div class="my-1"></div>
                                                    <!--  -->
                                                    <div class="my-1"></div>
                                                    <!-- Tanggal Pengajuan -->
                                                    <div class="form-inline row justify-content-center
                                                     align-items-center flex-wrap">
                                                        <div class="form-label col-sm-4 col-md-4">
                                                            <div class="label label-default">
                                                                <label for="" class="fs-5 display-4 text-dark 
                                                                fst-normal fw-medium">Tanggal Pengajuan</label>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-6 col-md-6">
                                                            <input type="text" name="mulai" class="form-control"
                                                                value="<?php echo format_tanggal($data['tgl_pengajuan']);?>"
                                                                readonly>
                                                        </div>
                                                    </div>
                                                    <div class="my-1"></div>
                                                    <!--  -->
                                                    <div class="my-1"></div>
                                                    <!-- Tanggal Mulai -->
                                                    <div class="form-inline row justify-content-center
                                                     align-items-center flex-wrap">
                                                        <div class="form-label col-sm-4 col-md-4">
                                                            <div class="label label-default">
                                                                <label for="" class="fs-5 display-4 text-dark 
                                                                fst-normal fw-medium">Tanggal Mulai</label>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-6 col-md-6">
                                                            <input type="text" name="mulai" class="form-control"
                                                                value="<?php echo format_tanggal($data['tgl_awal']);?>"
                                                                readonly>
                                                        </div>
                                                    </div>
                                                    <div class="my-1"></div>
                                                    <!--  -->
                                                    <div class="my-1"></div>
                                                    <!-- Tanggal Akhir -->
                                                    <div class="form-inline row justify-content-center
                                                     align-items-center flex-wrap">
                                                        <div class="form-label col-sm-4 col-md-4">
                                                            <div class="label label-default">
                                                                <label for="" class="fs-5 display-4 text-dark 
                                                                fst-normal fw-medium">Tanggal Akhir</label>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-6 col-md-6">
                                                            <input type="text" name="mulai" class="form-control"
                                                                value="<?php echo format_tanggal($data['tgl_akhir']);?>"
                                                                readonly>
                                                        </div>
                                                    </div>
                                                    <div class="my-1"></div>
                                                    <!--  -->
                                                    <div class="my-1"></div>
                                                    <!-- Durasi -->
                                                    <div class="form-inline row justify-content-center
                                                     align-items-center flex-wrap">
                                                        <div class="form-label col-sm-4 col-md-4">
                                                            <div class="label label-default">
                                                                <label for="" class="fs-5 display-4 text-dark 
                                                                fst-normal fw-medium">Durasi</label>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-6 col-md-6">
                                                            <input type="text" name="mulai" class="form-control"
                                                                value="<?php echo $data['durasi'];?>" readonly>
                                                        </div>
                                                    </div>
                                                    <div class="my-1"></div>
                                                    <!--  -->
                                                    <div class="my-1"></div>
                                                    <!-- Keterangan -->
                                                    <div class="form-inline row justify-content-center
                                                     align-items-start flex-wrap">
                                                        <div class="form-label col-sm-4 col-md-4">
                                                            <div class="label label-default">
                                                                <label for="" class="fs-5 display-4 text-dark 
                                                                fst-normal fw-medium">Keterangan</label>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-6 col-md-6">
                                                            <textarea name="keterangan" class="form-control"
                                                                placeholder="Keterangan" rows="3"
                                                                readonly><?php echo $data['keterangan'];?></textarea>
                                                        </div>
                                                    </div>
                                                    <div class="my-1"></div>
                                                    <!--  -->
                                                    <div class="my-1"></div>
                                                    <!-- Aksi -->
                                                    <div class="form-inline row justify-content-center
                                                     align-items-center flex-wrap">
                                                        <div class="form-label col-sm-4 col-md-4">
                                                            <div class="label label-default">
                                                                <label for="" class="fs-5 display-4 text-dark 
                                                                fst-normal fw-medium">Aksi</label>
                                                            </div>
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
                                                    <!--  -->
                                                    <div class="my-1"></div>
                                                    <!-- Keterangan Reject -->
                                                    <div class="form-inline row justify-content-center
                                                     align-items-start flex-wrap">
                                                        <div class="form-label col-sm-4 col-md-4">
                                                            <div class="label label-default">
                                                                <label for="" class="fs-5 display-4 text-dark 
                                                                fst-normal fw-medium">Keterangan Reject</label>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-6 col-md-6">
                                                            <textarea name="reject" id="reject" class="form-control"
                                                                placeholder="Keterangan Reject" rows="3"
                                                                disabled></textarea>
                                                        </div>
                                                    </div>
                                                    <div class="my-1"></div>
                                                    <div class="text-center">
                                                        <div class="card-footer">
                                                            <button type="submit" class="btn btn-sm btn-primary">
                                                                <i class="fa fa-save fa-1x"></i>
                                                                <span>Simpan Data</span>
                                                            </button>
                                                            <button type="reset" class="btn btn-sm btn-danger">
                                                                <i class="fa fa-eraser fa-1x"></i>
                                                                <span>Cancel</span>
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
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
        <?php require_once("../ui/footer.php") ?>