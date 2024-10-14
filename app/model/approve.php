<?php 
namespace model;

class approve {
    protected $db;
    public function __construct($db)
    {
        $this->db = $db;
    }

    public function create2($no, $stt, $reject, $spv){
        $no = htmlspecialchars($_POST['no']);
        $stt = "";
        $reject = htmlspecialchars($_POST['reject']);
        $aksi = htmlspecialchars($_POST['aksi']);
        $spv = htmlspecialchars($_POST['spv']);

        if($aksi == "2"){
            $stt="Rejected";
            $update = "UPDATE cuit SET stt_cuti = '$stt', ket_reject = '$reject' WHERE no_cuti = '$no'";
            $data = $this->db->query($update);
            if($data != ""){
                if($data){
                    echo "<script>document.location.href = '../ui/header.php?page=approval-cuti'; alert('Data berhasil diperbarui.');</script>";
                    die;
                }
            }else{
                echo "<script>document.location.href = '../ui/header.php?page=approval-cuti'; alert('Gagal memperbarui data.');</script>";
                die;
            }
        }else{
            $stt = "Menunggu Approval Supervisor";
            $num = 1;
            $update = "UPDATE cuti SET stt_cuti = '$stt', spv = '$spv', lead_app = '$num' WHERE no_cuti = '$no'";
            $data = $this->db->query($update);
            if($data != ""){
                if($data){
                    echo "<script>document.location.href = '../ui/header.php?page=approval-cuti'; alert('Data berhasil diperbarui'.);</script>";
                    die;
                }
            }else{
                echo "<script>document.location.href = '../ui/header.php?page=approval-cuti'; alert('Gagal memperbarui data');</script>";
                die;
            }
        }
        
    }

    // public function create4(){
        
    // }

    public function create3($no, $stt){
        $no = htmlspecialchars($_POST['no_cuti']);
        $stt = "";
        $null = 0;
        
        if($_POST['aksi'] == "2"){
            $stt="Rejected";
            $updated = "UPDATE cuti SET stt_cuti = '$stt', lead_app = '$null', spv_app = '$null', ket_reject = '$_POST[reject]' WHERE no_cuti = '$no'";
            $data = $this->db->query($updated);
            if($data != ""){
                if($data){
                    echo "<script>document.location.href = '../ui/header.php?page=approval-cuti'; alert('Data berhasil diperbarui.');</script>";
                    die;
                }
            }else{
                echo "<script>document.location.href = '../ui/header.php?page=approval-cuti'; alert('Gagal memperbarui data.');</script>";
                die;
            }
        }else{
            $stt = "Menunggu Approval HRD";
            $num = 1;
            $update = "UPDATE cuti SET stt_cuti = '$stt', mng_app = '$num' WHERE no_cuti = '$no'";
            $data = $this->db->query($update);
            if($data != ""){
                if($data){
                    echo "<script>document.location.href = '../ui/header.php?page=approval-cuti'; alert('Data berhasil diperbarui'.);</script>";
                    die;
                }
            }else{
                echo "<script>document.location.href = '../ui/header.php?page=approval-cuti'; alert('Gagal memperbarui data');</script>";
                die; 
            }
        }
    }

    public function create($no, $stt, $reject){
        $no = htmlspecialchars($_POST['no']);
        $stt = "";
        $reject = htmlspecialchars($_POST['reject']);
        $aksi = htmlspecialchars($_POST['aksi']);
        $null = 0;

        if($aksi == "2"){
            $stt = "Rejected";
            $update = "UPDATE cuti SET stt_cuti = '$stt', lead_app = '$null', spv_app = '$null', mng_app = '$null', ket_reject = '$reject' WHERE no_cuti = '$no'";
            $data = $this->db->query($update);
            if($data != ""){
                if($data){
                    echo "<script>document.location.href = '../ui/header.php?page=approval-wait'; alert('Data berhasil diperbarui.');</script>";
                    die;
                }
            }else{
                echo "<script>document.location.href = '../ui/header.php?page=approval-wait'; alert('Gagal memperbarui data.');</script>";
                die;
            }
        }else{
            $stt = "Approved";
	        $num = 1;
            $updated = "UPDATE cuti SET stt_cuti = '$stt', hrd_app = '$num' WHERE no_cuti = '$no'";
            $data = $this->db->query($updated);
            if($data != ""){
                if($data){
                    echo "<script>document.location.href = '../ui/header.php?page=approval-wait'; alert('Data berhasil diperbarui.');</script>";
                    die;
                }
            }else{
                echo "<script>document.location.href = '../ui/header.php?page=approval-wait'; alert('Gagal memperbarui data.');</script>";
                die;
            }
        }
    }
}

?>