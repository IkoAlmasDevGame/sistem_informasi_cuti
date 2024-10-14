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
                    </div>
                </div>
                <div class="card container mb-4">
                    <div class="card-header">
                        <h4 class="card-title text-dark">Karyawan Master</h4>
                        <?php if($_SESSION['akses'] == "Admin"): ?>
                        <a href="?aksi=tambah-karyawan" aria-current="page" class="btn btn-outline-light btn-danger">
                            <i class="fas fa-plus fa-1x"></i>
                            <span class="fs-5">Tambah Karyawan</span>
                        </a>
                        <?php endif; ?>
                    </div>
                    <div class="card-body my-1">
                        <div class="container">
                            <div class="table-responsive">
                                <form action="" method="post">
                                    <select name="length" id="example1_length" aria-controls="example2_length" required>
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
                                            <tr>
                                                <th class="table-layout-2 text-center">No</th>
                                                <th class="table-layout-2 text-center">NPP</th>
                                                <th class="table-layout-2 text-center">Nama</th>
                                                <th class="table-layout-2 text-center">Telepon</th>
                                                <th class="table-layout-2 text-center">Divisi</th>
                                                <th class="table-layout-2 text-center">Akses</th>
                                                <th class="table-layout-2 text-center">Opsi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php 
                                                $no = 1;
                                                $sql = "SELECT * FROM employee ORDER BY nama_emp desc";
                                                $data = $konfigs->query($sql);
                                                while($pecah = $data->fetch_array()){
                                            ?>
                                            <tr>
                                                <td class="table-layout-2 text-center"><?php echo $no; ?></td>
                                                <td class="table-layout-2 text-center"><?php echo $pecah['npp'] ?></td>
                                                <td class="table-layout-2 text-center">
                                                    <?php echo $pecah['nama_emp'] ?>
                                                </td>
                                                <td class="table-layout-2 text-center">
                                                    <?php echo $pecah['telp_emp'] ?>
                                                </td>
                                                <td class="table-layout-2 text-center">
                                                    <?php echo $pecah['divisi'] ?>
                                                </td>
                                                <td class="table-layout-2 text-center">
                                                    <?php echo $pecah['hak_akses'] ?>
                                                </td>
                                                <td class="table-layout-2 text-center">
                                                    <a href="#myModal" data-bs-toggle="modal"
                                                        data-remote-target="#myModal .modal-body"
                                                        data-load-code="<?php echo $pecah['npp'];?>" aria-current="page"
                                                        class="btn btn-primary btn-outline-light btn-sm">
                                                        <i class="fas fa-eye fa-1x"></i>
                                                    </a>
                                                    <a href="?aksi=edit-karyawan&npp=<?php echo $pecah['npp']?>"
                                                        aria-current="page"
                                                        class="btn btn-sm btn-warning btn-outline-dark">
                                                        <i class="fas fa-edit fa-1x"></i>
                                                    </a>
                                                    <a href="?aksi=karyawan-hapus&npp=<?php echo $pecah['npp']?>"
                                                        aria-current="page"
                                                        onclick="return confirm('Apakah anda yakin akan menghapus ?');"
                                                        class="btn btn-danger btn-outline-secondary btn-sm">
                                                        <i class="fas fa-trash fa-1x"></i>
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
                                                <p>One fine body…</p>
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
        <?php require_once("../ui/footer4.php") ?>