<?php 
require_once("../../../../database/koneksi.php");
/* Files Model & Files Controller */ 
/* Files Model */
require_once("../../../../model/cuti.php");
$cuti = new model\cuti($konfigs);
require_once("../../../../model/approve.php");
require_once("../../../../model/pengaturan.php");
require_once("../../../../model/karyawan.php");
require_once("../../../../model/employe.php");
$employe = new model\employee($konfigs);
require_once("../../../../controller/controller.php");
$authentication = new controller\Authentication($konfigs);
$izin = new controller\izincuti($konfigs);
$approve = new controller\approval($konfigs);

if(!isset($_GET['page'])){
}else{
    switch($_GET['page']){
    case 'beranda':
        require_once("../dashboard/index.php");
        break;
        
    # Approval Manager
    case 'approval-cuti':
        require_once("../approval/approval_cuti.php");
        break;
        
    case 'approval-all':
        require_once("../approval/approval.php");
        break;

     case 'approval-review':
        require_once("../approval/approval_review.php");
        break;
        
    case 'karyawan_detail':
        require_once("../approval/karyawan_detail.php");
        break;
        
    case 'cetak':
        require_once("../approval/app_cetak.php");
        break;
    # Approval Manager

    # Cuti Manager
    case 'cuti_create':
        require_once("../cuti/cuti_create.php");
        break;
    case 'cuti_waitapp':
        require_once("../cuti/cuti_waitapp.php");
        break;
    case 'cuti_reject':
        require_once("../cuti/cuti_reject.php");
        break;
    case 'cuti_app':
        require_once("../cuti/cuti_app.php");
        break;
    case 'cuti_detail':
        require_once("../cuti/cuti_detail.php");
        break;
    # Cuti Manager

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
        # code ...
        break;
    }
}

if(!isset($_GET['aksi'])){
}else{
    switch ($_GET['aksi']) {
        case 'izin-cuti':
            $izin->buatSupervisor();
            break;
        
        default:
            require_once("../../../../controller/controller.php");
            break;
    }
}
?>