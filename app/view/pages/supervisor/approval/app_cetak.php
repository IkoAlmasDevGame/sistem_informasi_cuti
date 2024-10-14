<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Cetak Form Cuti</title>
        <link rel="stylesheet" href="../../../../../dist/css/offline-font.css" crossorigin="anonymous">
        <link rel="stylesheet" href="../../../../../dist/css/custom-report.css" crossorigin="anonymous">
        <link rel="stylesheet" crossorigin="anonymous"
            href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
        <link rel="stylesheet" crossorigin="anonymous"
            href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    </head>

    <body>
        <?php 
            require_once("../../../../database/koneksi.php");
            require_once("../library/format_tanggal.php");
	        require_once("../library/format_rupiah.php");
            if(isset($_GET['no'])):
	        $no  = htmlspecialchars($_GET['no']);
	        $sql = "SELECT * FROM cuti JOIN employee ON cuti.npp = employee.npp WHERE cuti.no_cuti ='$no'";
	        $query = mysqli_query($konfigs,$sql);
	        $result = mysqli_fetch_array($query);
        ?>
        <section id="header-kop">
            <div class="container-fluid">
                <table class="table table-borderless">
                    <tbody>
                        <tr>
                            <td class="text-center" width="60%">
                                <b>Cetak Form Cuti</b><br>
                            <td class="text-right" width="20%"></td>
                        </tr>
                    </tbody>
                </table>
                <hr class="line-top" />
            </div>
        </section>
        <br />
        <br />
        <section id="body-of-report">
            <div class="container-fluid">
                <h4 class="text-center">FORM PENGAJUAN CUTI (APPROVED)</h4>
                <br />
                <br />
                <table class="table table-bordered">
                    <h3>
                        <tbody>
                            <tr>
                                <td width="30%">No. Cuti</td>
                                <td><?php echo $result['no_cuti'];?></td>
                            </tr>
                            <tr>
                                <td>NPP</td>
                                <td><?php echo $result['npp'] ?></td>
                            </tr>
                            <tr>
                                <td>Pemohon</td>
                                <td><?php echo $result['nama_emp'] ?></td>
                            </tr>
                            <tr>
                                <td>Telepon</td>
                                <td><?php echo $result['telp_emp'];?></td>
                            </tr>
                            <tr>
                                <td>Divisi</td>
                                <td><?php echo $result['divisi'];?></td>
                            </tr>
                            <tr>
                                <td>Jabatan</td>
                                <td><?php echo $result['jabatan'];?></td>
                            </tr>
                            <tr>
                                <td>Tanggal Pengajuan</td>
                                <td><?php echo format_tanggal($result['tgl_pengajuan']);?></td>
                            </tr>
                            <tr>
                                <td>Tanggal Mulai</td>
                                <td><?php echo format_tanggal($result['tgl_awal']);?></td>
                            </tr>
                            <tr>
                                <td>Tanggal Akhir</td>
                                <td><?php echo format_tanggal($result['tgl_akhir']);?></td>
                            </tr>
                            <tr>
                                <td>Durasi</td>
                                <td><?php echo $result['durasi'];?> Hari</td>
                            </tr>
                            <tr>
                                <td>Keterangan</td>
                                <td><?php echo $result['keterangan'];?></td>
                            </tr>
                            <tr>
                                <td>Status</td>
                                <td><?php echo $result['stt_cuti'];?></td>
                            </tr>
                        </tbody>
                    </h3>
                </table>
                <br>
                <div>
                    <label>*Form ini dicetak oleh sistem dan tidak memerlukan tanda tangan atau pengesahan lain.</label>
                </div>

            </div><!-- /.container -->
        </section>
        <?php endif; ?>
        <script type="text/javascript">
        window.print();
        </script>
        <script crossorigin="anonymous" src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script crossorigin="anonymous"
            src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js">
        </script>
        <script src="../../../../../dist/library/jTerbilang/jTerbilang.js" crossorigin="anonymous"></script>
    </body>

</html>