<?php 
namespace model;
class employee {
    protected $db;
    public function __construct($db)
    {
        $this->db = $db;
    }

    public function create($npp, $nama_emp, $jk_emp, $telp_emp, $divisi, $jabatan, $hak_akses, $jml_cuti, $alamat, $aktif, $id_adm){
        $npp = htmlspecialchars($_POST['npp']) ? htmlentities($_POST['npp']) : strip_tags($_POST['npp']);
        $nama_emp = htmlspecialchars($_POST['nama_emp']) ? htmlentities($_POST['nama_emp']) : strip_tags($_POST['nama_emp']);
        $jk_emp = htmlspecialchars($_POST['jk_emp']) ? htmlentities($_POST['jk_emp']) : strip_tags($_POST['jk_emp']);
        $telp_emp = htmlspecialchars($_POST['telp_emp']) ? htmlentities($_POST['telp_emp']) : strip_tags($_POST['telp_emp']);
        $divisi = htmlspecialchars($_POST['divisi']) ? htmlentities($_POST['divisi']) : strip_tags($_POST['divisi']);
        $jabatan = htmlspecialchars($_POST['jabatan']) ? htmlentities($_POST['jabatan']) : strip_tags($_POST['jabatan']);
        $hak_akses = htmlspecialchars($_POST['hak_akses']) ? htmlentities($_POST['hak_akses']) : strip_tags($_POST['hak_akses']);
        $jml_cuti = htmlspecialchars($_POST['jml_cuti']) ? htmlentities($_POST['jml_cuti']) : strip_tags($_POST['jml_cuti']);
        $password = md5(htmlspecialchars($_POST['npp']), false);
        $alamat = htmlspecialchars($_POST['alamat']) ? htmlentities($_POST['alamat']) : strip_tags($_POST['alamat']);
        $ekstensi_diperbolehkan_foto = array('png', 'jpg', 'jpeg', 'jfif', 'gif'); 
        $photo_src = htmlentities($_FILES["foto_emp"]["name"]) ? htmlspecialchars($_FILES["foto_emp"]["name"]) : $_FILES["foto_emp"]["name"];
        $x_foto = explode('.', $photo_src);
        $ekstensi_photo_src = strtolower(end($x_foto));
        $ukuran_photo_src = $_FILES['foto_emp']['size'];
        $file_tmp_photo_src = $_FILES['foto_emp']['tmp_name'];
        $aktif = "aktif";
        $id_adm = htmlspecialchars($_POST['id_adm']) ? htmlentities($_POST['id_adm']) : strip_tags($_POST['id_adm']);

        if(in_array($ekstensi_photo_src, $ekstensi_diperbolehkan_foto) === true){
            if($ukuran_photo_src < 10440070){
                move_uploaded_file($file_tmp_photo_src, "../../../../../assets/profile/" . $photo_src);
            }else{
                echo "Tidak Dapat Ter - Upload Size Gambar";
                exit;                
            }
        }else{
            echo "Tidak Dapat Ter - Upload Gambar";
            exit;
        }

        # DataBase employee
        $table = "employee";
        $select = $this->db->query("SELECT * FROM $table WHERE npp='$npp' order by npp asc");
        $cek = mysqli_num_rows($select);

        if($cek){
            if($npp != ""){
                echo("Error description: ".mysqli_error($this->db));
                echo "<script>document.location.href = '../ui/header.php?aksi=tambah-karyawan'; alert('npp employee sudah ada coba ganti npp employe lain.');</script>";
                die;
            }
        }else{
            $insert = "INSERT INTO $table SET npp='$npp', nama_emp='$nama_emp', jk_emp='$jk_emp', telp_emp='$telp_emp', divisi='$divisi', jabatan='$jabatan', alamat='$alamat', 
            hak_akses='$hak_akses', jml_cuti='$jml_cuti', password='$password', foto_emp='$photo_src', active='$aktif', id_adm='$id_adm'";
            $data = $this->db->query($insert);
            if($data != ""){
                if($data){
                    echo "<script>document.location.href = '../ui/header.php?page=karyawan'; alert('Tambah Karyawan Berhasil!');</script>";
                    die;
                }
            }else{
                echo("Error description: ".mysqli_error($this->db));
                echo "<script>document.location.href = '../ui/header.php?aksi=tambah-karyawan'; alert('Ops, terjadi kesalahan. Silahkan coba lagi.');</script>";
                die;
            }
        }
    }

    public function update($nama_emp, $jk_emp, $telp_emp, $divisi, $jabatan, $hak_akses, $jml_cuti, $alamat, $aktif, $npplama){
        $npplama = htmlspecialchars($_POST['npplama']) ? htmlentities($_POST['npplama']) : strip_tags($_POST['npplama']);
        $nama_emp = htmlspecialchars($_POST['nama_emp']) ? htmlentities($_POST['nama_emp']) : strip_tags($_POST['nama_emp']);
        $jk_emp = htmlspecialchars($_POST['jk_emp']) ? htmlentities($_POST['jk_emp']) : strip_tags($_POST['jk_emp']);
        $telp_emp = htmlspecialchars($_POST['telp_emp']) ? htmlentities($_POST['telp_emp']) : strip_tags($_POST['telp_emp']);
        $divisi = htmlspecialchars($_POST['divisi']) ? htmlentities($_POST['divisi']) : strip_tags($_POST['divisi']);
        $jabatan = htmlspecialchars($_POST['jabatan']) ? htmlentities($_POST['jabatan']) : strip_tags($_POST['jabatan']);
        $hak_akses = htmlspecialchars($_POST['hak_akses']) ? htmlentities($_POST['hak_akses']) : strip_tags($_POST['hak_akses']);
        $jml_cuti = htmlspecialchars($_POST['jml_cuti']) ? htmlentities($_POST['jml_cuti']) : strip_tags($_POST['jml_cuti']);
        $password = md5(htmlspecialchars($_POST['npp']), false);
        $alamat = htmlspecialchars($_POST['alamat']) ? htmlentities($_POST['alamat']) : strip_tags($_POST['alamat']);
        $ekstensi_diperbolehkan_foto = array('png', 'jpg', 'jpeg', 'jfif', 'gif'); 
        $photo_src = htmlentities($_FILES["foto_emp"]["name"]) ? htmlspecialchars($_FILES["foto_emp"]["name"]) : $_FILES["foto_emp"]["name"];
        $x_foto = explode('.', $photo_src);
        $ekstensi_photo_src = strtolower(end($x_foto));
        $ukuran_photo_src = $_FILES['foto_emp']['size'];
        $file_tmp_photo_src = $_FILES['foto_emp']['tmp_name'];
        $aktif = htmlspecialchars($_POST['active']) ? htmlentities($_POST['active']) : strip_tags($_POST['active']);

        if(in_array($ekstensi_photo_src, $ekstensi_diperbolehkan_foto) === true){
            if($ukuran_photo_src < 10440070){
                move_uploaded_file($file_tmp_photo_src, "../../../../../assets/profile/" . $photo_src);
            }else{
                echo "Tidak Dapat Ter - Upload Size Gambar";
                exit;                
            }
        }else{
            echo "Tidak Dapat Ter - Upload Gambar";
            exit;
        }

        # DataBase employee
        $table = "employee";
        $select = $this->db->query("SELECT * FROM $table WHERE npp='$npplama' order by npp asc");
        $cekselect = mysqli_fetch_array($select);

        if($cekselect['npp'] > 0){
            if(isset($_POST['ubahfoto'])){
                if($cekselect['foto_emp'] == ""){
                    $updated = "UPDATE $table SET nama_emp='$nama_emp', jk_emp='$jk_emp', telp_emp='$telp_emp', divisi='$divisi', jabatan='$jabatan', alamat='$alamat', 
                    hak_akses='$hak_akses', jml_cuti='$jml_cuti', password='$password', foto_emp='$photo_src', active='$aktif' WHERE npp = '$npplama'";
                    $data = $this->db->query($updated);
                    if($data != ""){
                        if($data){
                            echo "<script>document.location.href = '../ui/header.php?page=karyawan'; alert('berhasil di ubah profile employee.');</script>";
                            die;
                        }
                    }else{
                        echo "<script>document.location.href = '../ui/header.php?aksi=edit-karyawan&npp=$npplama'; alert('profile pada employee tidak berhasil di ubah.');</script>";
                        die;
                    }
                }elseif($cekselect['foto_emp'] != ""){
                    if($photo_src != ""){
                        unlink("../../../../../assets/profile/$cekselect[foto_emp]");
                        $update = "UPDATE $table SET nama_emp='$nama_emp', jk_emp='$jk_emp', telp_emp='$telp_emp', divisi='$divisi', jabatan='$jabatan', alamat='$alamat', 
                        hak_akses='$hak_akses', jml_cuti='$jml_cuti', password='$password', foto_emp='$photo_src', active='$aktif' WHERE npp = '$npplama'";  
                        $data = $this->db->query($update);
                        if($data != ""){
                            if($data){
                                echo "<script>document.location.href = '../ui/header.php?page=karyawan'; alert('berhasil di ubah profile employee.');</script>";
                                die;
                            }
                        }else{
                            echo "<script>document.location.href = '../ui/header.php?aksi=edit-karyawan&npp=$npplama'; alert('profile pada employee tidak berhasil di ubah.');</script>";
                            die;
                        } 
                    }
                }
            }
        }else{
            echo "<script>document.location.href = '../ui/header.php?aksi=edit-karyawan&npp=$npplama'; alert('profile pada employee tidak berhasil di ubah.');</script>";
            die;
        }
    }

    public function delete($npp){
        $npp = htmlspecialchars($_GET['npp']) ? htmlentities($_GET['npp']) : strip_tags($_GET['npp']);
        $table = "employee";
        $select = $this->db->query("SELECT * FROM $table WHERE npp = '$npp'");
        $array = mysqli_fetch_array($select);
        $foto = $array["foto_emp"];

        if($array["foto_emp"] == ""){
            $delete = "DELETE FROM $table WHERE npp = '$npp'";
            $data = $this->db->query($delete);
            if($data != null){
                if($data){
                    echo "<script>document.location.href = '../ui/hedaer.php?page=karyawan'</script>";
                    die;
                }
            }else{
                echo "<script>document.location.href = '../ui/hedaer.php?page=karyawan'</script>";
                die;
            }
        }else{
            unlink("../../../../../assets/profile/$foto");
            $data = $this->db->query("DELETE FROM $table WHERE npp = '$npp'");
            if($data != null){
                if($data){
                    echo "<script>document.location.href = '../ui/hedaer.php?page=karyawan'</script>";
                    die;
                    }
            }else{
                echo "<script>document.location.href = '../ui/hedaer.php?page=karyawan'</script>";
                die;                
            }            
        }
    }
    
    public function SignIn($userInput, $password){
        session_start();       
        if(empty($_POST['userInput']) || empty($_POST['password'])){
            echo "<script>document.location.href = '../auth/index.php'; alert('anda harus mengisi form login ini ...');</script>";
            die;
        }else{
            $table = 'employee';
            $userInput = htmlspecialchars(strip_tags($_POST['userInput']));
            $password = md5($_POST['password'], false);
            password_verify($password, PASSWORD_DEFAULT);
            $hakasses = htmlspecialchars(strip_tags($_POST['akses']));
        if($hakasses == "Admin"){
            $sql = "SELECT * FROM admin WHERE user_adm = '$userInput' and pass_adm = '$password'";
            $data = $this->db->query($sql);
            $rows = mysqli_num_rows($data);
            $dataku = mysqli_fetch_array($data);
            if($rows == 1){
                $_SESSION['status'] = true;
                $_SESSION['admin'] = $dataku['id_adm'];
                $_SESSION['cookies'] = $userInput;
                $_SESSION['akses'] = "Admin";
                $_SERVER['HTTPS'] = "on";
                echo "<script>document.location.href = '../admin/ui/header.php?page=beranda'; alert('selamat anda berhasil login.');</script>";
                die;
            }else{
                $_SESSION['status'] = false;
                $_SERVER['HTTPS'] = "off";
                echo "<script>document.location.href = '../auth/index.php'; alert('anda gagal login.');</script>";
                die;
            }
        }else if($hakasses == "Lead"){
            $sql = "SELECT * FROM employee WHERE npp = '$userInput' and password = '$password'";
            $data = $this->db->query($sql);
            $rows = mysqli_num_rows($data);
            if($rows == 1){
                $response = array($userInput, $password);
                $response[$table] = array($userInput, $password);
                if($dataku = $data->fetch_assoc()){
                    if($dataku['hak_akses'] == "Leader"){
                        $_SESSION['akses'] = "Lead";
                        $_SESSION['hak_akses'] = $dataku['hak_akses'];
                        $_SESSION['divisi'] = $dataku['divisi'];
                        $_SESSION['jabatan'] = $dataku['jabatan'];
                        $_SESSION['leader'] = $dataku['npp'];
                        $_SESSION['nama_emp'] = $dataku['nama_emp'];
                        echo "<script>document.location.href = '../leader/ui/header.php?page=beranda'; alert('selamat anda berhasil login.');</script>";
                    }
                    $_SESSION['status'] = true;
                    $_SERVER['HTTPS'] = "on";
                    $_COOKIE['cookies'] = $userInput;
                    setcookie($response[$table], $dataku, time() + (86400 * 30), "/");
                    array_push($response['employee'], $dataku);
                }
            }else{
                $_SESSION['status'] = false;
                $_SERVER['HTTPS'] = "off";
                echo "<script>document.location.href = '../auth/index.php'; alert('anda gagal login.');</script>";
                die;
            }
        }else if($hakasses == "Mng"){
            $sql = "SELECT * FROM employee WHERE npp = '$userInput' and password = '$password'";
            $data = $this->db->query($sql);
            $cek = mysqli_num_rows($data);
            if($cek == 1){
                $response = array($userInput, $password);
                $response[$table] = array($userInput, $password);
                if($dataku = $data->fetch_assoc()){
                    if($dataku['hak_akses'] == "Manager"){
                        $_SESSION['akses'] = "Mng";
                        $_SESSION['hak_akses'] = $dataku['hak_akses'];
                        $_SESSION['divisi'] = $dataku['divisi'];
                        $_SESSION['jabatan'] = $dataku['jabatan'];
                        $_SESSION['manager'] = $dataku['npp'];
                        $_SESSION['nama_emp'] = $dataku['nama_emp'];
                        echo "<script>document.location.href = '../manager/ui/header.php?page=beranda'; alert('selamat anda berhasil login.');</script>";
                    }
                    $_SESSION['status'] = true;
                    $_SERVER['HTTPS'] = "on";
                    $_COOKIE['cookies'] = $userInput;
                    setcookie($response[$table], $dataku, time() + (86400 * 30), "/");
                    array_push($response['employee'], $dataku);
                }
            }else{
                $_SESSION['status'] = false;
                $_SERVER['HTTPS'] = "off";
                echo "<script>document.location.href = '../auth/index.php'; alert('anda gagal login.');</script>";
                die;
            }
        }elseif($hakasses == "Spv"){
            $sql = "SELECT * FROM employee WHERE npp = '$userInput' and password = '$password'";
            $data = $this->db->query($sql);
            $rows = mysqli_num_rows($data);
            if($rows == 1){
                $response = array($userInput, $password);
                $response[$table] = array($userInput, $password);
                if($dataku = $data->fetch_assoc()){
                    if($dataku['hak_akses'] == "Supervisor"){
                        $_SESSION['akses'] = "Spv";
                        $_SESSION['hak_akses'] = $dataku['hak_akses'];
                        $_SESSION['divisi'] = $dataku['divisi'];
                        $_SESSION['jabatan'] = $dataku['jabatan'];
                        $_SESSION['supervisor'] = $dataku['npp'];
                        $_SESSION['nama_emp'] = $dataku['nama_emp'];
                        echo "<script>document.location.href = '../supervisor/ui/header.php?page=beranda'; alert('selamat anda berhasil login.');</script>";
                    }
                    $_SESSION['status'] = true;
                    $_SERVER['HTTPS'] = "on";
                    $_COOKIE['cookies'] = $userInput;
                    setcookie($response[$table], $dataku, time() + (86400 * 30), "/");
                    array_push($response['employee'], $dataku);
                }
            }else{
                $_SESSION['status'] = false;
                $_SERVER['HTTPS'] = "off";
                echo "<script>document.location.href = '../auth/index.php'; alert('anda gagal login.');</script>";
                die;
                }
            }
        }
    }
}

?>