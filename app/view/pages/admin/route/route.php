<?php 
require_once("../../../../database/koneksi.php");
/* Files Model & Files Controller */ 
/* Files Model */
require_once("../../../../model/cuti.php");
require_once("../../../../model/approve.php");
require_once("../../../../model/pengaturan.php");
require_once("../../../../model/karyawan.php");
require_once("../../../../model/employe.php");
$employe = new model\employee($konfigs);
require_once("../../../../controller/controller.php");
$authentication = new controller\Authentication($konfigs);

if(!isset($_GET['page'])){
}else{
    switch($_GET['page']){
        case 'beranda':
            require_once("../dashboard/index.php");
            break;
    
        case 'keluar':
            if(isset($_SESSION['status'])){                
                unset($_SESSION['status']);
                session_unset();
                session_destroy();
                $_SESSION = array();
            }
            header("location:../../auth/index.php");
            exit(0);
            break;
        
        default:
            require_once("../dashboard/index.php");
            break;    
    }
}

if(!isset($_GET['aksi'])){
}else{
    switch ($_GET['aksi']) {
        case 'value':
            # code...
            break;
        
        default:
            require_once("../../../../controller/controller.php");
            break;
    }
}
?>