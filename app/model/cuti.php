<?php 

namespace model;

use DateTime;

class cuti {
    protected $db;
    public function __construct($db)
    {
        $this->db = $db;
    }

    public function delete($no_cuti){
        $no_cuti = htmlspecialchars($_GET['no']) ? htmlentities($_GET['no']) : strip_tags($_GET['no']);
        $table = "cuti";
        $hapus = "DELETE * FROM $table WHERE no_cuti = '$no_cuti'";
        $data = $this->db->query($hapus);
        if($data != ""){
            if($data){
                echo "<script>document.location.href = '../ui/header.php?page=cuti_waitapp'; alert('Data berhasil dihapus.');</script>";
                die;
            }
        }else{
            echo "<script>document.location.href = '../ui/header.php?page=cuti_waitapp'; alert('Gagal menghapus data.');</script>";
            die;
        }
    }

    public function create($npp, $mulai, $akhir, $ket){ // Manager
        $npp = htmlspecialchars($_POST['npp']) ? htmlentities($_POST['npp']) : strip_tags($_POST['npp']);
        $ajuan = date('Y-m-d');
        $mulai = htmlspecialchars($_POST['mulai']) ? htmlentities($_POST['mulai']) : strip_tags($_POST['mulai']);
        $akhir = htmlspecialchars($_POST['akhir']) ? htmlentities($_POST['akhir']) : strip_tags($_POST['akhir']);
        $ket = htmlspecialchars($_POST['keterangan']) ? htmlentities($_POST['keterangan']) : strip_tags($_POST['keterangan']);
        $stt = "Menunggu Approval HRD";
        # data 2
        $start = new DateTime($mulai);
        $finish = new DateTime($akhir);
        $int = $start->diff($finish);
        $dur = $int->days;
        $durasi = $dur+1;
        # data 3
        $id = date('dmYHis');
        #data 4
        $pgw = "SELECT * FROM employee WHERE npp='$npp'";
        $qpgw = mysqli_query($this->db,$pgw);
        $ress = mysqli_fetch_array($qpgw);
        $jml = $ress['jml_cuti'];
        #data input ke database ...
        if($jml > $durasi){
            echo "<script>document.location.href = '../ui/header.php?page=cuti_create'; alert('Durasi cuti lebih banyak dari jumlah cuti tersedia!.');</script>";
            die;
        }else{
            $insert = "INSERT INTO cuti (no_cuti, npp, tgl_pengajuan, tgl_awal, tgl_akhir, durasi, keterangan, stt_cuti)
             VALUES ('$id','$npp','$ajuan','$mulai','$akhir','$durasi','$ket','$stt')";
            $data = $this->db->query($insert);
            if($data != ""){
                if($data){
                    echo "<script>document.location.href = '../ui/header.php?page=cuti_waitapp'; alert('Pengajuan cuti berhasil!');</script>";
                    die;
                }
            }else{
                echo "<script>document.location.href = '../ui/header.php?page=cuti_create'; alert('Terjadi kesalahan, silahkan coba lagi!.');</script>";
                die;
            }
        }
    }

    public function createSupervisor($npp, $mulai, $akhir, $ket, $mng){ // Supervisor
        $npp = htmlspecialchars($_POST['npp']) ? htmlentities($_POST['npp']) : strip_tags($_POST['npp']);
        $mulai = htmlspecialchars($_POST['mulai']) ? htmlentities($_POST['mulai']) : strip_tags($_POST['mulai']);
        $akhir = htmlspecialchars($_POST['akhir']) ? htmlentities($_POST['akhir']) : strip_tags($_POST['akhir']);
        $ket = htmlspecialchars($_POST['keterangan']) ? htmlentities($_POST['keterangan']) : strip_tags($_POST['keterangan']);
        $mng = htmlspecialchars($_POST['mng']) ? htmlentities($_POST['mng']) : strip_tags($_POST['mng']);
        $ajuan = date('Y-m-d');
        $stt = "Menunggu Approval Manager";
        # data 2
        $start = new DateTime($mulai);
        $finish = new DateTime($akhir);
        $int = $start->diff($finish);
        $dur = $int->days;
        $durasi = $dur+1;
        # data 3
        $id = date('dmYHis');
        #data 4
        $pgw = "SELECT * FROM employee WHERE npp='$npp'";
        $qpgw = mysqli_query($this->db,$pgw);
        $ress = mysqli_fetch_array($qpgw);
        $jml = $ress['jml_cuti'];
        #data input ke database ...
        if($jml > $durasi){
            echo "<script>document.location.href = '../ui/header.php?page=cuti_create'; alert('Durasi cuti lebih banyak dari jumlah cuti tersedia!.');</script>";
            die;
        }else{
            $insert = "INSERT INTO cuti (no_cuti, npp, tgl_pengajuan, tgl_awal, tgl_akhir, durasi, keterangan, manager, stt_cuti) 
            VALUES ('$id','$npp','$ajuan','$mulai','$akhir','$durasi','$ket','$mng','$stt')";
            $data = $this->db->query($insert);
            if($data != ""){
                if($data){
                    echo "<script>document.location.href = '../ui/header.php?page=cuti_waitapp'; alert('Pengajuan cuti berhasil!');</script>";
                    die;
                }
            }else{
                echo "<script>document.location.href = '../ui/header.php?page=cuti_create'; alert('Terjadi kesalahan, silahkan coba lagi!.');</script>";
                die;
            }
        }
    }

    public function createleader($npp, $mulai, $akhir, $ket, $spv){ // Leader
        $npp = htmlspecialchars($_POST['npp']) ? htmlentities($_POST['npp']) : strip_tags($_POST['npp']);
        $mulai = htmlspecialchars($_POST['mulai']) ? htmlentities($_POST['mulai']) : strip_tags($_POST['mulai']);
        $akhir = htmlspecialchars($_POST['akhir']) ? htmlentities($_POST['akhir']) : strip_tags($_POST['akhir']);
        $ket = htmlspecialchars($_POST['keterangan']) ? htmlentities($_POST['keterangan']) : strip_tags($_POST['keterangan']);
        $spv = htmlspecialchars($_POST['spv']) ? htmlentities($_POST['spv']) : strip_tags($_POST['spv']);
        $ajuan = date('Y-m-d');
        $stt = "Menunggu Approval Supervisor";
        # data 2
        $start = new DateTime($mulai);
        $finish = new DateTime($akhir);
        $int = $start->diff($finish);
        $dur = $int->days;
        $durasi = $dur+1;
        # data 3
        $id = date('dmYHis');
        #data 4
        $pgw = "SELECT * FROM employee WHERE npp='$npp'";
        $qpgw = mysqli_query($this->db,$pgw);
        $ress = mysqli_fetch_array($qpgw);
        $jml = $ress['jml_cuti'];
        #data input ke database ...
        if($jml > $durasi){
            echo "<script>document.location.href = '../ui/header.php?page=cuti_create'; alert('Durasi cuti lebih banyak dari jumlah cuti tersedia!.');</script>";
            die;
        }else{
            $insert = "INSERT INTO cuti (no_cuti, npp, tgl_pengajuan, tgl_awal, tgl_akhir, durasi, keterangan, spv, stt_cuti)
             VALUES ('$id','$npp','$ajuan','$mulai','$akhir','$durasi','$ket','$spv','$stt')";
            $data = $this->db->query($insert);
            if($data != ""){
                if($data){
                    echo "<script>document.location.href = '../ui/header.php?page=cuti_waitapp'; alert('Pengajuan cuti berhasil!');</script>";
                    die;
                }
            }else{
                echo "<script>document.location.href = '../ui/header.php?page=cuti_create'; alert('Terjadi kesalahan, silahkan coba lagi!.');</script>";
                die;
            }
        }
    }
}

?>