<?php 
namespace controller;

use model\approve;
use model\employee;
use model\cuti;

class Authentication {
    protected $konfig;
    public function __construct($konfig)
    {
        $this->konfig = new employee($konfig);
    }

    public function Login(){
        $userInput = htmlspecialchars(strip_tags($_POST['userInput']));
        $password = md5($_POST['password'], false);
        password_verify($password, PASSWORD_DEFAULT);
        $data = $this->konfig->SignIn($userInput,$password);
        if($data === true){
            return true;
        }else{
            return false;
        }
    }

    public function buatkaryawan(){
        $npp = htmlspecialchars($_POST['npp']) ? htmlentities($_POST['npp']) : strip_tags($_POST['npp']);
        $nama_emp = htmlspecialchars($_POST['nama_emp']) ? htmlentities($_POST['nama_emp']) : strip_tags($_POST['nama_emp']);
        $jk_emp = htmlspecialchars($_POST['jk_emp']) ? htmlentities($_POST['jk_emp']) : strip_tags($_POST['jk_emp']);
        $telp_emp = htmlspecialchars($_POST['telp_emp']) ? htmlentities($_POST['telp_emp']) : strip_tags($_POST['telp_emp']);
        $divisi = htmlspecialchars($_POST['divisi']) ? htmlentities($_POST['divisi']) : strip_tags($_POST['divisi']);
        $jabatan = htmlspecialchars($_POST['jabatan']) ? htmlentities($_POST['jabatan']) : strip_tags($_POST['jabatan']);
        $hak_akses = htmlspecialchars($_POST['hak_akses']) ? htmlentities($_POST['hak_akses']) : strip_tags($_POST['hak_akses']);
        $jml_cuti = htmlspecialchars($_POST['jml_cuti']) ? htmlentities($_POST['jml_cuti']) : strip_tags($_POST['jml_cuti']);
        $alamat = htmlspecialchars($_POST['alamat']) ? htmlentities($_POST['alamat']) : strip_tags($_POST['alamat']);
        $aktif = "aktif";
        $id_adm = htmlspecialchars($_POST['id_adm']) ? htmlentities($_POST['id_adm']) : strip_tags($_POST['id_adm']);
        $data = $this->konfig->create($npp, $nama_emp, $jk_emp, $telp_emp, $divisi, $jabatan, $hak_akses, $jml_cuti, $alamat, $aktif, $id_adm);
        if($data === true){
            return true;
        }else{
            return false;
        }
    }

    public function ubahkaryawan(){
        $npplama = htmlspecialchars($_POST['npplama']) ? htmlentities($_POST['npplama']) : strip_tags($_POST['npplama']);
        $nama_emp = htmlspecialchars($_POST['nama_emp']) ? htmlentities($_POST['nama_emp']) : strip_tags($_POST['nama_emp']);
        $jk_emp = htmlspecialchars($_POST['jk_emp']) ? htmlentities($_POST['jk_emp']) : strip_tags($_POST['jk_emp']);
        $telp_emp = htmlspecialchars($_POST['telp_emp']) ? htmlentities($_POST['telp_emp']) : strip_tags($_POST['telp_emp']);
        $divisi = htmlspecialchars($_POST['divisi']) ? htmlentities($_POST['divisi']) : strip_tags($_POST['divisi']);
        $jabatan = htmlspecialchars($_POST['jabatan']) ? htmlentities($_POST['jabatan']) : strip_tags($_POST['jabatan']);
        $hak_akses = htmlspecialchars($_POST['hak_akses']) ? htmlentities($_POST['hak_akses']) : strip_tags($_POST['hak_akses']);
        $jml_cuti = htmlspecialchars($_POST['jml_cuti']) ? htmlentities($_POST['jml_cuti']) : strip_tags($_POST['jml_cuti']);
        $alamat = htmlspecialchars($_POST['alamat']) ? htmlentities($_POST['alamat']) : strip_tags($_POST['alamat']);
        $aktif = htmlspecialchars($_POST['active']) ? htmlentities($_POST['active']) : strip_tags($_POST['active']);
        $data = $this->konfig->update($nama_emp, $jk_emp, $telp_emp, $divisi, $jabatan, $hak_akses, $jml_cuti, $alamat, $aktif, $npplama);
        if($data === true){
            return true;
        }else{
            return false;
        }
    }

    public function hapus(){
        $npp = htmlspecialchars($_GET['npp']) ? htmlentities($_GET['npp']) : strip_tags($_GET['npp']);
        $data = $this->konfig->delete($npp);
        if($data === true){
            return true;
        }else{
            return false;
        }
    }
}

class izincuti {
    protected $konfig;
    public function __construct($konfig)
    {
        $this->konfig = new cuti($konfig);
    }

    public function buatperjanjian(){
        $npp = htmlspecialchars($_POST['npp']) ? htmlentities($_POST['npp']) : strip_tags($_POST['npp']);
        $mulai = htmlspecialchars($_POST['mulai']) ? htmlentities($_POST['mulai']) : strip_tags($_POST['mulai']);
        $akhir = htmlspecialchars($_POST['akhir']) ? htmlentities($_POST['akhir']) : strip_tags($_POST['akhir']);
        $ket = htmlspecialchars($_POST['keterangan']) ? htmlentities($_POST['keterangan']) : strip_tags($_POST['keterangan']);
        $data = $this->konfig->create($npp, $mulai, $akhir, $ket);
        if($data === true){
            return true;
        }else{
            return false;
        }
    }

    public function buatleader(){
        $npp = htmlspecialchars($_POST['npp']) ? htmlentities($_POST['npp']) : strip_tags($_POST['npp']);
        $mulai = htmlspecialchars($_POST['mulai']) ? htmlentities($_POST['mulai']) : strip_tags($_POST['mulai']);
        $akhir = htmlspecialchars($_POST['akhir']) ? htmlentities($_POST['akhir']) : strip_tags($_POST['akhir']);
        $ket = htmlspecialchars($_POST['keterangan']) ? htmlentities($_POST['keterangan']) : strip_tags($_POST['keterangan']);
        $spv = htmlspecialchars($_POST['spv']) ? htmlentities($_POST['spv']) : strip_tags($_POST['spv']);
        $data = $this->konfig->createleader($npp, $mulai, $akhir, $ket, $spv);
        if($data === true){
            return true;
        }else{
            return false;
        }
    }

    public function buatSupervisor(){
        $npp = htmlspecialchars($_POST['npp']) ? htmlentities($_POST['npp']) : strip_tags($_POST['npp']);
        $mulai = htmlspecialchars($_POST['mulai']) ? htmlentities($_POST['mulai']) : strip_tags($_POST['mulai']);
        $akhir = htmlspecialchars($_POST['akhir']) ? htmlentities($_POST['akhir']) : strip_tags($_POST['akhir']);
        $ket = htmlspecialchars($_POST['keterangan']) ? htmlentities($_POST['keterangan']) : strip_tags($_POST['keterangan']);
        $mng = htmlspecialchars($_POST['mng']) ? htmlentities($_POST['mng']) : strip_tags($_POST['mng']);
        $data = $this->konfig->createSupervisor($npp, $mulai, $akhir, $ket, $mng);
        if($data === true){
            return true;
        }else{
            return false;
        }
    }

    public function hapus(){
        $no_cuti = htmlspecialchars($_GET['no']) ? htmlentities($_GET['no']) : strip_tags($_GET['no']);
        $data = $this->konfig->delete($no_cuti);
        if($data === true){
            return true;
        }else{
            return false;
        }
    }
}

class approval {
    protected $konfig;
    public function __construct($konfig)
    {
        $this->konfig = new approve($konfig);
    }

    public function buatperjanjian2(){
        $no = htmlspecialchars($_POST['no']);
        $stt = "";
        $reject = htmlspecialchars($_POST['reject']);
        $spv = htmlspecialchars($_POST['spv']);
        $data = $this->konfig->create2($no, $stt, $reject, $spv);
        if($data === true){
            return true;
        }else{
            return false;
        }
    }

    public function buatperjanjian3(){
        $no = htmlspecialchars($_POST['no']);
        $stt = "";
        $data = $this->konfig->create3($no, $stt);
        if($data === true){
            return true;
        }else{
            return false;
        }
    }

    public function updateperjanjian(){
        $no = htmlspecialchars($_POST['no']);
        $stt = "";
        $reject = htmlspecialchars($_POST['reject']);
        $data = $this->konfig->create($no, $stt, $reject);
        if($data === true){
            return true;
        }else{
            return false;
        }
    }
}

?>