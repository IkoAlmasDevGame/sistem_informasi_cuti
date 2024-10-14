<!-- Printing -->
<html>

    <head>
        <?php
        require_once("../library/format_tanggal.php");
        require_once("../../../../database/koneksi.php");
        if(isset($_GET)) {
        	$kode = htmlspecialchars($_GET['code']);
        	$sql = "SELECT * FROM employee WHERE npp='$kode'";
        	$query = mysqli_query($konfigs,$sql);
        ?>
    </head>

    <body>
        <?php while($result = mysqli_fetch_array($query)){ ?>
        <div id="section-to-print">
            <div id="only-on-print">
            </div>
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel">Detail Karyawan</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div><br />
                <table width="100%">
                    <tr>
                        <td width="20%"><b>NPP</b></td>
                        <td width="2%"><b>:</b></td>
                        <td width="78%"><?php echo $result['npp'];?></td>
                    </tr>
                    <tr>
                        <td colspan="3">&nbsp;</td>
                    </tr>
                    <tr>
                        <td width="20%"><b>Nama</b></td>
                        <td width="2%"><b>:</b></td>
                        <td width="78%"><?php echo $result['nama_emp'];?></td>
                    </tr>
                    <tr>
                        <td colspan="3">&nbsp;</td>
                    </tr>
                    <tr>
                        <td width="20%"><b>Jenis Kelamin</b></td>
                        <td width="2%"><b>:</b></td>
                        <td width="78%"><?php echo $result['jk_emp'];?></td>
                    </tr>
                    <tr>
                        <td colspan="3">&nbsp;</td>
                    </tr>
                    <tr>
                        <td width="20%"><b>Telepon</b></td>
                        <td width="2%"><b>:</b></td>
                        <td width="78%"><?php echo $result['telp_emp'];?></td>
                    </tr>
                    <tr>
                        <td colspan="3">&nbsp;</td>
                    </tr>
                    <tr>
                        <td width="20%"><b>Divisi</b></td>
                        <td width="2%"><b>:</b></td>
                        <td width="78%"><?php echo $result['divisi'];?></td>
                    </tr>
                    <tr>
                        <td colspan="3">&nbsp;</td>
                    </tr>
                    <tr>
                        <td width="20%"><b>Jabatan</b></td>
                        <td width="2%"><b>:</b></td>
                        <td width="78%"><?php echo $result['jabatan'];?></td>
                    </tr>
                    <tr>
                        <td colspan="3">&nbsp;</td>
                    </tr>
                    <tr>
                        <td width="20%"><b>Alamat</b></td>
                        <td width="2%"><b>:</b></td>
                        <td width="78%"><?php echo $result['alamat'];?></td>
                    </tr>
                    <tr>
                        <td colspan="3">&nbsp;</td>
                    </tr>
                    <tr>
                        <td width="20%"><b>Jumlah Cuti</b></td>
                        <td width="2%"><b>:</b></td>
                        <td width="78%"><?php echo $result['jml_cuti'];?></td>
                    </tr>
                    <tr>
                        <td colspan="3">&nbsp;</td>
                    </tr>
                    <tr>
                        <td width="20%"><b>Hak Akses</b></td>
                        <td width="2%"><b>:</b></td>
                        <td width="78%"><b><?php echo $result['hak_akses'];?></b></td>
                    </tr>
                    <tr>
                        <td colspan="3">&nbsp;</td>
                    </tr>
                    <tr>
                        <td width="20%"><b>Aktif</b></td>
                        <td width="2%"><b>:</b></td>
                        <td width="78%">
                            <?php 
		                        if($result['active'] == 'aktif'){
		                        echo "Ya";
		                        }else{
		                        echo "Tidak";
		                        }
		                    ?>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="3">&nbsp;</td>
                    </tr>
                    <tr>
                        <td width="20%"><b>Foto</b></td>
                        <td width="2%"><b>:</b></td>
                        <td width="78%"><img src="../../../../../assets/profile/<?php echo $result['foto_emp'];?>"
                                width="70px"></td>
                    </tr>
                    <tr>
                        <td colspan="3">&nbsp;</td>
                    </tr>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-bs-dismiss="modal">Close</button>
                <?php 
                    echo "";
                    }
                }
                die;
                ?>
            </div>
        </div>
    </body>

</html>