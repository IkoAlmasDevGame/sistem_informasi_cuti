<?php 
date_default_timezone_set("Asia/Jakarta");
$konfigs = mysqli_connect("localhost", "root", "", "db_cuti") or mysqli_connect_errno();
try {
    $config = new PDO("mysql:host=localhost;dbname=db_cuti;", "root", "");
} catch(Exception $e){
    die("database gagal terkoneksi : ".$e->getMessage());
}
?>