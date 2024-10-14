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
                            <a href="?aksi=edit-karyawan&npp=<?php echo $_GET['npp']?>" aria-current="page"
                                class="text-primary text-decoration-none">
                                Edit Data Karyawan
                            </a>
                        </li>
                    </div>
                </div>
                <div class="card container mb-4">
                    <div class="card-header py-2">
                        <h4 class="card-title">Edit Karyawan</h4>
                    </div>
                    <div class="card-body my-1">
                        <div class="d-flex justify-content-center align-items-center flex-wrap">
                            <div class="card col-sm-8 col-md-8">
                                <?php if(isset($_GET['npp'])): ?>
                                <?php 
                                    $npp = htmlspecialchars($_GET['npp']);
                                    $sql = "SELECT * FROM employee WHERE npp = '$npp'";
                                    $data = $konfigs->query($sql);
                                    while($pecah = mysqli_fetch_assoc($data)){
                                ?>
                                <form action="?aksi=karyawan-ubah" enctype="multipart/form-data" method="post">
                                    <div class="card-body">
                                        <div class="card-header">
                                            <h4 class="card-title text-center"><?php echo $pecah['nama_emp'] ?></h4>
                                        </div>
                                        <div class="form-group my-1  overflow-scroll scroll-smooth">
                                            <!--  -->
                                            <div class="form-inline row justify-content-center
                                                 align-items-center flex-wrap">
                                                <div class="form-label col-sm-5 col-md-5">
                                                    <label for="" class="label label-default">NPP Lama</label>
                                                </div>
                                                <div class="col-sm-6 col-md-6">
                                                    <input type="text" name="npplama" value="<?php echo $pecah['npp']?>"
                                                        class="form-control" maxlength="20" placeholder="NPP" readonly>
                                                </div>
                                            </div>
                                            <!--  -->
                                            <div class="my-1"></div>
                                            <div class="form-inline row justify-content-center
                                             align-items-center flex-wrap">
                                                <div class="form-label col-sm-5 col-md-5">
                                                    <label for="nama" class="label label-default">Nama Karyawan</label>
                                                </div>
                                                <div class="col-sm-6 co-md-6">
                                                    <input type="text" id="nama" name="nama_emp"
                                                        value="<?php echo $pecah['nama_emp']?>" class="form-control"
                                                        placeholder="Nama" maxlength="100" required>
                                                </div>
                                            </div>
                                            <!--  -->
                                            <div class="my-1"></div>
                                            <div class="form-inline row justify-content-center
                                             align-items-center flex-wrap">
                                                <div class="form-label col-sm-5 col-md-5">
                                                    <label for="jk" class="label label-default">Jenis Kelamin</label>
                                                </div>
                                                <div class="col-sm-6 col-md-6">
                                                    <select name="jk_emp" id="jk" class="form-control" required>
                                                        <option value="<?php echo $pecah['jk_emp']?>" selected>
                                                            <?php echo $pecah['jk_emp']?></option>
                                                        <option value="Laki-Laki">Laki-Laki</option>
                                                        <option value="Perempuan">Perempuan</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <!--  -->
                                            <div class="my-1"></div>
                                            <div class="form-inline row justify-content-center
                                             align-items-center flex-wrap">
                                                <div class="form-label col-sm-5 col-md-5">
                                                    <label for="tlpn" class="label label-default">Telepon</label>
                                                </div>
                                                <div class="col-sm-6 col-md-6">
                                                    <input type="number" id="tlpn" name="telp_emp"
                                                        value="<?php echo $pecah['telp_emp']?>" min="0"
                                                        class="form-control" placeholder="Telepon" required
                                                        maxlength="20">
                                                </div>
                                            </div>
                                            <!--  -->
                                            <div class="my-1"></div>
                                            <div class="form-inline row justify-content-center
                                             align-items-center flex-wrap">
                                                <div class="form-label col-sm-5 col-md-5">
                                                    <label for="divisi" class="label label-default">Divisi</label>
                                                </div>
                                                <div class="col-sm-6 col-md-6">
                                                    <input type="text" name="divisi"
                                                        value="<?php echo $pecah['divisi']?>" id="divisi" maxlength="50"
                                                        class="form-control" placeholder="Divisi" required>
                                                </div>
                                            </div>
                                            <!--  -->
                                            <div class="my-1"></div>
                                            <div class="form-inline row justify-content-center
                                             align-items-center flex-wrap">
                                                <div class="form-label col-sm-5 col-md-5">
                                                    <label for="jabatan" class="label label-default">Jabatan</label>
                                                </div>
                                                <div class="col-sm-6 col-md-6">
                                                    <input type="text" name="jabatan"
                                                        value="<?php echo $pecah['jabatan']?>" id="jabatan"
                                                        maxlength="50" class="form-control" placeholder="Jabatan"
                                                        required>
                                                </div>
                                            </div>
                                            <!--  -->
                                            <div class="my-1"></div>
                                            <div class="form-inline row justify-content-center
                                             align-items-start flex-wrap">
                                                <div class="form-label col-sm-5 col-md-5">
                                                    <label for="alamat" class="label label-default">Alamat</label>
                                                </div>
                                                <div class="col-sm-6 col-md-6">
                                                    <textarea name="alamat" rows="3" class="form-control"
                                                        placeholder="Alamat" id="alamat"
                                                        required><?php echo $pecah['alamat'] ?></textarea>
                                                </div>
                                            </div>
                                            <!--  -->
                                            <div class="my-1"></div>
                                            <div class="form-inline row justify-content-center
                                             align-items-center flex-wrap">
                                                <div class="form-label col-sm-5 col-md-5">
                                                    <label for="akses" class="label label-default">Hak Akses</label>
                                                </div>
                                                <div class="col-sm-6 col-md-6">
                                                    <select name="hak_akses" id="akses" class="form-control" required>
                                                        <option value="<?php echo $pecah['hak_akses'] ?>" selected>
                                                            <?php echo $pecah['hak_akses'] ?></option>
                                                        <option value="Leader">Leader</option>
                                                        <option value="Manager">Manager</option>
                                                        <option value="Pegawai">Pegawai</option>
                                                        <option value="Supervisor">Supervisor</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <!--  -->
                                            <div class="my-1"></div>
                                            <div class="form-inline row justify-content-center
                                             align-items-center flex-wrap">
                                                <div class="form-label col-sm-5 col-md-5">
                                                    <label for="jabatan" class="label label-default">Jumlah Cuti</label>
                                                </div>
                                                <div class="col-sm-6 col-md-6">
                                                    <input type="number" name="jml_cuti"
                                                        value="<?php echo $pecah['jml_cuti']?>" maxlength="11" min="0"
                                                        class="form-control" placeholder="Jumlah Cuti" required>
                                                </div>
                                            </div>
                                            <!--  -->
                                            <div class="my-1"></div>
                                            <div class="form-inline row justify-content-center
                                             align-items-center flex-wrap">
                                                <div class="form-label col-sm-5 col-md-5">
                                                    <label for="aktif" class="label label-default">Aktif</label>
                                                </div>
                                                <div class="col-sm-6 col-md-6">
                                                    <select name="active" id="aktif" class="form-control" required>
                                                        <option value="<?php echo $pecah['active'] ?>" selected>
                                                            <?php echo $pecah['active'] ?></option>
                                                        <option value="Aktif">Aktif</option>
                                                        <option value="Tidak Aktif">Tidak Aktif</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <!--  -->
                                            <div class="my-1"></div>
                                            <div class="form-inline row justify-content-center
                                             align-items-center flex-wrap">
                                                <div class="form-label col-sm-5 col-md-5">
                                                    <label for="" class="label label-default">password</label>
                                                </div>
                                                <div class="col-sm-6 col-md-6">
                                                    <input type="text" maxlength="100"
                                                        value="<?php echo $pecah['npp']?>" name="password" min="0"
                                                        class="form-control" placeholder="Password" required>
                                                </div>
                                            </div>
                                            <!--  -->
                                            <div class="my-1"></div>
                                            <div class="form-inline row justify-content-center
                                             align-items-center flex-wrap">
                                                <div class="form-label col-sm-5 col-md-5">
                                                    <label for="Foto" class="label label-default">Foto (Abaikan Jika
                                                        Tidak Diubah)</label>
                                                </div>
                                                <div class="col-sm-6 col-md-6">
                                                    <div class="col-sm-2 col-md-2">
                                                        <img class='img-responsive rounded-2 my-1' id="preview"
                                                            width="64" <?php if($pecah['foto_emp'] != ""){ ?>
                                                            src='../../../../../assets/profile/<?php echo $pecah['foto_emp']?>'
                                                            <?php }else{ ?>
                                                            src='../../../../../assets/profile/data/user_logo.png'
                                                            <?php } ?>>
                                                    </div>
                                                    <input type="file" name="foto_emp" onchange="previewImage(this)"
                                                        id="Foto" class="form-control" accept="image/*" required>
                                                    <div class="my-1"></div>
                                                    <input type="checkbox" name="ubahfoto" id=""> Klik jika ingin ubah
                                                    foto
                                                </div>
                                            </div>
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
        <?php require_once("../ui/footer.php") ?>