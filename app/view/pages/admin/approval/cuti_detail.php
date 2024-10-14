<?php
require_once("../library/format_tanggal.php");
require_once("../../../../database/koneksi.php");
if(isset($_GET['code'])) {
	$kode = $_GET['code'];
	$sql = "SELECT cuti.*, employee.* FROM cuti JOIN employee ON cuti.npp=employee.npp WHERE cuti.no_cuti='$kode'";
	$query = mysqli_query($konfigs,$sql);
	$result = mysqli_fetch_array($query);
}
else {
	echo "Nomor Transaksi Tidak Terbaca";
	exit;
}
?>
<html>

    <head>
    </head>

    <body>
        <div id="section-to-print">
            <div id="only-on-print">
            </div>
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel">Detail Pengajuan Cuti</h4>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div><br />
                <table width="100%">
                    <tr>
                        <td width="20%"><b>No. Cuti</b></td>
                        <td width="2%"><b>:</b></td>
                        <td width="78%"><?php echo $result['no_cuti'];?></td>
                    </tr>
                    <tr>
                        <td colspan="3">&nbsp;</td>
                    </tr>
                    <tr>
                        <td width="20%"><b>NPP</b></td>
                        <td width="2%"><b>:</b></td>
                        <td width="78%"><?php echo $result['npp'];?></td>
                    </tr>
                    <tr>
                        <td colspan="3">&nbsp;</td>
                    </tr>
                    <tr>
                        <td width="20%"><b>Nama Pemohon</b></td>
                        <td width="2%"><b>:</b></td>
                        <td width="78%"><?php echo $result['nama_emp'];?></td>
                    </tr>
                    <tr>
                        <td colspan="3">&nbsp;</td>
                    </tr>
                    <tr>
                        <td width="20%"><b>Tangal Pengajuan</b></td>
                        <td width="2%"><b>:</b></td>
                        <td width="78%"><?php echo format_tanggal($result['tgl_pengajuan']);?></td>
                    </tr>
                    <tr>
                        <td colspan="3">&nbsp;</td>
                    </tr>
                    <tr>
                        <td width="20%"><b>Tanggal Mulai</b></td>
                        <td width="2%"><b>:</b></td>
                        <td width="78%"><?php echo format_tanggal($result['tgl_awal']);?></td>
                    </tr>
                    <tr>
                        <td colspan="3">&nbsp;</td>
                    </tr>
                    <tr>
                        <td width="20%"><b>Tanggal Akhir</b></td>
                        <td width="2%"><b>:</b></td>
                        <td width="78%"><?php echo format_tanggal($result['tgl_akhir']);?></td>
                    </tr>
                    <tr>
                        <td colspan="3">&nbsp;</td>
                    </tr>
                    <tr>
                        <td width="20%"><b>Durasi</b></td>
                        <td width="2%"><b>:</b></td>
                        <td width="78%"><?php echo $result['durasi'];?> Hari</td>
                    </tr>
                    <tr>
                        <td colspan="3">&nbsp;</td>
                    </tr>
                    <tr>
                        <td width="20%"><b>Keterangan</b></td>
                        <td width="2%"><b>:</b></td>
                        <td width="78%"><?php echo $result['keterangan'];?></td>
                    </tr>
                    <tr>
                        <td colspan="3">&nbsp;</td>
                    </tr>
                    <tr>
                        <td width="20%"><b>Status</b></td>
                        <td width="2%"><b>:</b></td>
                        <td width="78%"><?php echo $result['stt_cuti'];?></td>
                    </tr>
                    <tr>
                        <td colspan="3">&nbsp;</td>
                    </tr>
                    <?php
		if($result['ket_reject']!=""){
		?>
                    <tr>
                        <td width="20%"><b>Keterangan Reject</b></td>
                        <td width="2%"><b>:</b></td>
                        <td width="78%"><b><?php echo $result['ket_reject'];?></b></td>
                    </tr>
                    <?php
		}else{
		}
		?>
                    <tr>
                        <td colspan="3">&nbsp;</td>
                    </tr>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-bs-dismiss="modal">Close</button>
            </div>
        </div>

    </body>

</html>