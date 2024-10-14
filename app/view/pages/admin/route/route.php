<?php 
require_once("../../../../database/koneksi.php");
/* Files Model & Files Controller */ 
/* Files Model */
require_once("../../../../model/cuti.php");
require_once("../../../../model/approve.php");
$app = new model\approve($konfigs);
require_once("../../../../model/pengaturan.php");
require_once("../../../../model/karyawan.php");
require_once("../../../../model/employe.php");
$employe = new model\employee($konfigs);
require_once("../../../../controller/controller.php");
$authentication = new controller\Authentication($konfigs);
$approve = new controller\approval($konfigs);

if(!isset($_GET['page'])){
}else{
    switch($_GET['page']){
        case 'beranda':
            require_once("../dashboard/index.php");
            break;

        # Master Karyawan
        case 'karyawan':
            require_once("../karyawan/karyawan.php");
            break;
        case 'detail':
            require_once("../karyawan/detail.php");
            break;
        # Master Karyawan

        # Master Approval
        case 'approval':
            require_once("../approval/app.php");
            break;
        case 'approval-all':
            require_once("../approval/app_all.php");
            break;
        case 'approval-wait':
            require_once("../approval/app_wait.php");
            break;
        case 'cetak':
            require_once("../approval/app_cetak.php");
            break;
        case 'cuti_detail':
            require_once("../approval/cuti_detail.php");
            break;
        case 'approval-review':
            require_once("../approval/approval_review.php");
            break;
        # Master Approval
    
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
        # Master Karyawan
        case 'tambah-karyawan':
            require_once("../karyawan/tambah.php");
            break;
        case 'edit-karyawan':
            require_once("../karyawan/edit.php");
            break;
            case 'karyawan-tambah':
                $authentication->buatkaryawan();
                break;
            case 'karyawan-ubah':
                $authentication->ubahkaryawan();
                break;
            case 'karyawan-hapus':
                $authentication->hapus();
                break;
        # Master Karyawan

        # Master Approval
        case 'update-perjanjian':
            $approve->updateperjanjian();
            break;
        # Master Approval
        
        default:
            require_once("../../../../controller/controller.php");
            break;
    }
}
?>