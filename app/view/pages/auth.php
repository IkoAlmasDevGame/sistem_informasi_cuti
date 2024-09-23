<?php 
if(isset($_SESSION['status'])){
    if(isset($_SESSION['admin']) || isset($_SESSION['leader']) || isset($_SESSION['manager']) || isset($_SESSION['supervisor'])){
        if(isset($_SESSION['cookies'])){
            if(isset($_SERVER['HTTPS'])){
                if(isset($_SESSION['hak_akses']) || isset($_SESSION['akses'])){
                    if(isset($_SESSION['leader'])){
                        if(isset($_SESSION['manager'])){
                            if(isset($_SESSION['supervisor'])){
                                
                            }
                        }
                    }
                }
            }   
        }
    }
}else{
    echo "<script lang='javascript'>
    window.setTimeout(() => {
        alert('Maaf anda gagal masuk ke halaman utama ...'),
        window.location.href='../../auth/index.php'
    }, 3000);
    </script>
    ";
    die;
    exit(0);
}
?>