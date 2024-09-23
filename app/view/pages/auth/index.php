<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Login Sistem Informasi Pengajuan Cuti</title>
        <link rel="stylesheet" href="../auth/style.css" crossorigin="anonymous">
        <link rel="stylesheet" crossorigin="anonymous"
            href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
        <link rel="stylesheet" crossorigin="anonymous"
            href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    </head>

    <body class="body" onload="startTime()">
        <!-- Layout Start -->
        <nav class="navbar navbar-default navbar-expand-lg bg-body-tertiary">
            <div class="container-fluid">
                <a href="index.php" aria-current="page" class="navbar-brand">Sistem Informasi Pengajuan Cuti</a>
            </div>
        </nav>
        <div class="container-fluid mt-4 pt-5">
            <div class="d-flex justify-content-center align-items-center flex-wrap mt-1 pt-1">
                <div class="card shadow mb-4">
                    <div class="card-header py-2">
                        <h4 class="card-title text-center">- Login Sistem Informasi Pengajuan Cuti -</h4>
                        <h4 class="card-title text-center">- Admin/Manager/Supervisor -</h4>
                    </div>
                    <div class="card-body mt-1">
                        <!-- Layout Form -->
                        <?php 
                            require_once("../../../database/koneksi.php");
                            require_once("../../../model/employe.php");
                            require_once("../../../controller/controller.php");
                            $employe = new model\employee($konfigs);
                            $authentication = new controller\Authentication($konfigs);
                            if(!isset($_GET['aksi'])){
                            }else{
                                switch ($_GET['aksi']) {
                                    case 'Sign-in':
                                        $authentication->Login();
                                        break;
                                    
                                    default:
                                        require_once("../../../controller/controller.php");
                                        break;
                                }
                            }
                        ?>
                        <form action="?aksi=Sign-in" enctype="multipart/form-data" method="post">
                            <div class="form-group">
                                <div class="form-inline row justify-content-center
                                     align-items-center flex-wrap mb-1 mt-1">
                                    <div class="form-label col-sm-2 col-md-3">
                                        <label for="user" class="label label-default">User Input</label>
                                    </div>
                                    <div class="col-sm-8 col-md-9">
                                        <input type="text" name="userInput" aria-required="TRUE" class="form-control"
                                            placeholder="masukkan username anda ..." required id="user">
                                    </div>
                                </div>
                                <div class="form-inline row justify-content-center
                                 align-items-center flex-wrap mb-1 mt-1">
                                    <div class="form-label col-sm-2 col-md-3">
                                        <label for="pass" class="label label-default">Kata Sandi</label>
                                    </div>
                                    <div class="col-sm-8 col-md-9">
                                        <input type="password" name="password" aria-required="TRUE" class="form-control"
                                            placeholder="masukkan kata sandi anda ..." required id="pass">
                                    </div>
                                </div>
                                <div class="form-inline row justify-content-center
                                 align-items-center flex-wrap mb-1 mt-1">
                                    <div class="form-label col-sm-2 col-md-3">
                                        <label for="pass" class="label label-default">Hak Ases</label>
                                    </div>
                                    <div class="col-sm-8 col-md-9">
                                        <select name="akses" required class="form-select" id="">
                                            <option value="0" disabled selected>Pilih Hak Akses</option>
                                            <option value="Admin">Admin</option>
                                            <option value="Lead">Leader</option>
                                            <option value="Mng">Manager</option>
                                            <option value="Supervisor">Supervisor</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer m-1">
                                <div class="text-center">
                                    <button type="submit" class="btn btn-primary btn-outline-light">
                                        <i class="fa fa-sign-in-alt fa-1x"></i>
                                        <span>Sign In</span>
                                    </button>
                                    <button type="reset" class="btn btn-danger btn-outline-light">
                                        <i class="fa fa-eraser fa-1x"></i>
                                        <span>Hapus</span>
                                    </button>
                                </div>
                                <div class="container mt-4 p-1">
                                    <footer class="footer">
                                        <p id="year" class="text-center"></p>
                                    </footer>
                                </div>
                            </div>
                        </form>
                        <!-- Layout Form -->
                    </div>
                </div>
            </div>
        </div>
        <!-- Layout Start -->
        <script crossorigin="anonymous" lang="javascript"
            src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js">
        </script>
        <script crossorigin="anonymous" lang="javascript"
            src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js">
        </script>
        <script crossorigin="anonymous" lang="javascript"
            src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js">
        </script>
        <script type="text/javascript" crossorigin="anonymous">
        function startTime() {
            var day = ["minggu", "senin", "selasa", "rabu", "kamis", "jumat", "sabtu"];
            var today = new Date();
            var h = today.getHours();
            var tahun = today.getFullYear();
            var m = today.getMinutes();
            var s = today.getSeconds();
            m = checkTime(m);
            s = checkTime(s);
            document.getElementById('year').innerHTML =
                "&copy Sistem Informasi Cuti " + tahun + "<br>" + day[today.getDay()] + ", " + h +
                " : " +
                m +
                " : " + s;
            var t = setTimeout(startTime, 500);
        }

        function checkTime(i) {
            if (i < 10) {
                i = "0" + i
            }; // add zero in front of numbers < 10
            return i;
        }
        </script>
    </body>

</html>