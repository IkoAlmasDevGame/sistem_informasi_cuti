<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Data Karyawan</title>
        <?php 
            if($_SESSION['akses'] == "Admin"){
                require_once("../ui/header.php");
                require_once("../../../../database/koneksi.php");
            }else{
                echo "<script>document.location.href = '../ui/header.php?page=beranda'</script>";
            }
        ?>
        <script type="text/javascript">
        function checkNppAvailability() {
            $("#loaderIcon").show();
            jQuery.ajax({
                url: "../karyawan/check_nppavailability.php",
                data: 'npp=' + $("#npp").val(),
                type: "POST",
                success: function(data) {
                    $("#user-availability-status").html(data);
                    $("#loaderIcon").hide();
                },
                error: function() {}
            });
        }

        function previewImage(input) {
            const file = input.files[0];
            if (file) {
                const preview = document.getElementById('preview');
                preview.src = URL.createObjectURL(file);
                preview.onload = function() {
                    URL.revokeObjectURL(preview.src); // Free memory
                };
            }
        }
        </script>
    </head>

    <body>
        <?php require_once("../ui/sidebar.php") ?>
        <div class="panel container panel-default bg-body-tertiary">
            <div class="panel-body py-2">
                <div class="panel-heading">
                    <h4 class="panel-title">Data Karyawan</h4>
                    <div class="breadcrumb d-flex justify-content-end align-items-end flex-wrap">
                        <li class="breadcrumb breadcrumb-item">
                            <a href="?page=beranda" aria-current="page" class="text-primary text-decoration-none">
                                Beranda
                            </a>
                        </li>
                        <li class="breadcrumb breadcrumb-item">
                            <a href="?page=karyawan" aria-current="page" class="text-primary text-decoration-none">
                                Data Karyawan
                            </a>
                        </li>
                        <li class="breadcrumb breadcrumb-item">
                            <a href="?aksi=tambah-karyawan" aria-current="page"
                                class="text-primary text-decoration-none">
                                Tambah Data Karyawan
                            </a>
                        </li>
                    </div>
                </div>
                <div class="card container mb-4">
                    <div class="card-header py-2">
                        <h4 class="card-title">Tambah Karyawan</h4>
                    </div>
                    <div class="card-body my-1">
                        <div class="d-flex justify-content-center align-items-center flex-wrap">
                            <div class="card col-sm-8 col-md-8">
                                <div class="card-header">
                                    <h4 class="card-title text-center">Karyawan</h4>
                                </div>
                                <div class="card-body">
                                    <form action="?aksi=karyawan-tambah" enctype="multipart/form-data" method="post">
                                        <input type="hidden" name="id_adm" value="<?php echo $_SESSION['admin']?>">
                                        <div class="form-group my-1  overflow-scroll scroll-smooth">
                                            <!--  -->
                                            <div class="form-inline row justify-content-center
                                                 align-items-center flex-wrap">
                                                <div class="form-label col-sm-4 col-md-4">
                                                    <label for="" class="label label-default">NPP</label>
                                                </div>
                                                <div class="col-sm-6 col-md-6">
                                                    <input type="text" name="npp" onBlur="checkNppAvailability()"
                                                        class="form-control" maxlength="20" placeholder="NPP" required>
                                                    <span id="user-availability-status" style="font-size:12px;"></span>
                                                </div>
                                            </div>
                                            <!--  -->
                                            <div class="my-1"></div>
                                            <!--  -->
                                            <div class="form-inline row justify-content-center
                                             align-items-center flex-wrap">
                                                <div class="form-label col-sm-4 col-md-4">
                                                    <label for="nama" class="label label-default">Nama Karyawan</label>
                                                </div>
                                                <div class="col-sm-6 co-md-6">
                                                    <input type="text" id="nama" name="nama_emp" class="form-control"
                                                        placeholder="Nama" maxlength="100" required>
                                                </div>
                                            </div>
                                            <!--  -->
                                            <div class="my-1"></div>
                                            <!--  -->
                                            <div class="form-inline row justify-content-center
                                             align-items-center flex-wrap">
                                                <div class="form-label col-sm-4 col-md-4">
                                                    <label for="jk" class="label label-default">Jenis Kelamin</label>
                                                </div>
                                                <div class="col-sm-6 col-md-6">
                                                    <select name="jk_emp" id="jk" class="form-control" required>
                                                        <option value="" selected>--- Pilih Jenis Kelamin ---</option>
                                                        <option value="Laki-Laki">Laki-Laki</option>
                                                        <option value="Perempuan">Perempuan</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <!--  -->
                                            <div class="my-1"></div>
                                            <!--  -->
                                            <div class="form-inline row justify-content-center
                                             align-items-center flex-wrap">
                                                <div class="form-label col-sm-4 col-md-4">
                                                    <label for="tlpn" class="label label-default">Telepon</label>
                                                </div>
                                                <div class="col-sm-6 col-md-6">
                                                    <input type="number" id="tlpn" name="telp_emp" min="0"
                                                        class="form-control" placeholder="Telepon" required
                                                        maxlength="20">
                                                </div>
                                            </div>
                                            <!--  -->
                                            <div class="my-1"></div>
                                            <!--  -->
                                            <div class="form-inline row justify-content-center
                                             align-items-center flex-wrap">
                                                <div class="form-label col-sm-4 col-md-4">
                                                    <label for="divisi" class="label label-default">Divisi</label>
                                                </div>
                                                <div class="col-sm-6 col-md-6">
                                                    <input type="text" name="divisi" id="divisi" maxlength="50"
                                                        class="form-control" placeholder="Divisi" required>
                                                </div>
                                            </div>
                                            <!--  -->
                                            <div class="my-1"></div>
                                            <!--  -->
                                            <div class="form-inline row justify-content-center
                                             align-items-center flex-wrap">
                                                <div class="form-label col-sm-4 col-md-4">
                                                    <label for="jabatan" class="label label-default">Jabatan</label>
                                                </div>
                                                <div class="col-sm-6 col-md-6">
                                                    <input type="text" name="jabatan" id="jabatan" maxlength="50"
                                                        class="form-control" placeholder="Jabatan" required>
                                                </div>
                                            </div>
                                            <!--  -->
                                            <div class="my-1"></div>
                                            <!--  -->
                                            <div class="form-inline row justify-content-center
                                             align-items-start flex-wrap">
                                                <div class="form-label col-sm-4 col-md-4">
                                                    <label for="alamat" class="label label-default">Alamat</label>
                                                </div>
                                                <div class="col-sm-6 col-md-6">
                                                    <textarea name="alamat" rows="3" class="form-control"
                                                        placeholder="Alamat" id="alamat" required></textarea>
                                                </div>
                                            </div>
                                            <!--  -->
                                            <div class="my-1"></div>
                                            <!--  -->
                                            <div class="form-inline row justify-content-center
                                             align-items-center flex-wrap">
                                                <div class="form-label col-sm-4 col-md-4">
                                                    <label for="jabatan" class="label label-default">Jumlah Cuti</label>
                                                </div>
                                                <div class="col-sm-6 col-md-6">
                                                    <input type="number" name="jml_cuti" maxlength="11" min="0"
                                                        class="form-control" placeholder="Jumlah Cuti" required>
                                                </div>
                                            </div>
                                            <!--  -->
                                            <div class="my-1"></div>
                                            <!--  -->
                                            <div class="form-inline row justify-content-center
                                             align-items-center flex-wrap">
                                                <div class="form-label col-sm-4 col-md-4">
                                                    <label for="akses" class="label label-default">Hak Akses</label>
                                                </div>
                                                <div class="col-sm-6 col-md-6">
                                                    <select name="hak_akses" id="akses" class="form-control" required>
                                                        <option value="" selected>--- Pilih Hak Akses ---</option>
                                                        <option value="Leader">Leader</option>
                                                        <option value="Manager">Manager</option>
                                                        <option value="Pegawai">Pegawai</option>
                                                        <option value="Supervisor">Supervisor</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <!--  -->
                                            <div class="my-1"></div>
                                            <!--  -->
                                            <div class="form-inline row justify-content-center
                                             align-items-center flex-wrap">
                                                <div class="form-label col-sm-4 col-md-4">
                                                    <label for="Foto" class="label label-default">Foto </label>
                                                </div>
                                                <div class="col-sm-6 col-md-6">
                                                    <div class="col-sm-2 col-md-2">
                                                        <img class='img-responsive rounded-2 my-1' id="preview"
                                                            width="64"
                                                            src='../../../../../assets/profile/data/user_logo.png'>
                                                    </div>
                                                    <input type="file" name="foto_emp" onchange="previewImage(this)"
                                                        id="Foto" class="form-control" accept="image/*" required>
                                                </div>
                                            </div> <!--  -->
                                        </div>
                                        <div class="card-footer">
                                            <div class="text-center">
                                                <button type="submit" class="btn btn-primary btn-outline-light">
                                                    <i class="fa fa-save fa-1x"></i>
                                                    <span>Simpan Data</span>
                                                </button>
                                                <a href="?page=karyawan" aria-current="page"
                                                    class="btn btn-light btn-outline-secondary">
                                                    <span>Cancel</span>
                                                </a>
                                                <button type="reset" class="btn btn-danger btn-outline-light">
                                                    <span>Hapus Semua</span>
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php require_once("../ui/footer.php") ?>