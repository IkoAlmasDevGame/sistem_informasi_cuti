<?php 
namespace model;
class employee {
    protected $db;
    public function __construct($db)
    {
        $this->db = $db;
    }
    
    public function SignIn($userInput, $password){
        session_start();       
        if(empty($_POST['userInput']) || empty($_POST['password'])){
            echo "<script>document.location.href = '../auth/index.php'; alert('anda harus mengisi form login ini ...');</script>";
            die;
        }else{
            $userInput = htmlspecialchars(strip_tags($_POST['userInput']));
            $password = htmlspecialchars(strip_tags($_POST['password']));
            $hakasses = htmlspecialchars($_POST['akses']);
        if($hakasses == "Admin"){
            $sql = "SELECT * FROM admin WHERE user_adm = '$userInput' and pass_adm = '$password'";
            $data = $this->db->query($sql);
            $rows = mysqli_num_rows($data);
            $dataku = mysqli_fetch_array($data);
            if($rows == 1){
                $_SESSION['status'] = true;
                $_SESSION['admin'] = strtolower($dataku['id_adm']);
                $_SESSION['cookies'] = $userInput;
                $_SERVER['HTTPS'] = "on";
                $_SESSION['akses'] = "Admin";
                setcookie($_SESSION['admin'], $hakasses, time() + (86400 * 30), "/");
                echo "<script>document.location.href = '../admin/ui/header.php?page=beranda'; alert('selamat anda berhasil login.');</script>";
                die;
            }else{
                $_SESSION['status'] = false;
                $_SERVER['HTTPS'] = "off";
                echo "<script>document.location.href = '../auth/index.php'; alert('anda gagal login.');</script>";
                die;
            }
        }else if($hakasses == "Lead"){
            $hakasses = "Leader";
            $sql = "SELECT * FROM employee WHERE hak_akses = '$hakasses' and npp = '$userInput' and password = '$password'";
            $data = $this->db->query($sql);
            $rows = mysqli_num_rows($data);
            $dataku = mysqli_fetch_array($data);
            if($rows == 1){
                $_SESSION['status'] = true;
                $_SESSION['leader'] = strtolower($dataku['npp']);
                $_SESSION['cookies'] = $userInput;
                $_SERVER['HTTPS'] = "on";
                $_SESSION['hak_akses'] = "Leader";
                setcookie($_SESSION['leader'], $hakasses, time() + (86400 * 30), "/");
                echo "<script>document.location.href = ''; alert('selamat anda berhasil login.');</script>";
                die;
            }else{
                $_SESSION['status'] = false;
                $_SERVER['HTTPS'] = "off";
                echo "<script>document.location.href = '../auth/index.php'; alert('anda gagal login.');</script>";
                die;
            }
        }elseif($hakasses == "Mng"){
            $hakasses = "Manager";
            $sql = "SELECT * FROM employee WHERE hak_akses = '$hakasses' and npp = '$userInput' and password = '$password'";
            $data = $this->db->query($sql);
            $rows = mysqli_num_rows($data);
            $dataku = mysqli_fetch_array($data);
            if($rows == 1){
                $_SESSION['status'] = true;
                $_SESSION['cookies'] = $userInput;
                $_SERVER['HTTPS'] = "on";
                $_SESSION['manager'] = strtolower($dataku['npp']);
                setcookie($_SESSION['manager'], $hakasses, time() + (86400 * 30), "/");
                echo "<script>document.location.href = ''; alert('selamat anda berhasil login.');</script>";
                die;
            }else{
                $_SESSION['status'] = false;
                $_SERVER['HTTPS'] = "off";
                echo "<script>document.location.href = '../auth/index.php'; alert('anda gagal login.');</script>";
                die;
            }
        }elseif($hakasses == "Supervisor"){
            $hakasses = "Supervisor";
            $sql = "SELECT * FROM employee WHERE hak_akses = '$hakasses' and npp = '$userInput' and password = '$password'";
            $data = $this->db->query($sql);
            $rows = mysqli_num_rows($data);
            $dataku = mysqli_fetch_array($data);
            if($rows == 1){
                $_SESSION['status'] = true;
                $_SESSION['cookies'] = $userInput;
                $_SERVER['HTTPS'] = "on";
                $_SESSION['supervisor'] = strtolower($dataku['npp']);
                setcookie($_SESSION['supervisor'], $hakasses, time() + (86400 * 30), "/");
                echo "<script>document.location.href = ''; alert('selamat anda berhasil login.');</script>";
                die;
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