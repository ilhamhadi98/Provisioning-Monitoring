<?php 
// mengaktifkan session php
session_start();

// menghubungkan php dengan koneksi database
include '../koneksi.php';

$username = $_SESSION['username'];

//log
$user_id = $username;
$action = "has been log out";
mysqli_query($koneksi,"INSERT INTO user_log (user_id,action) values('$user_id','$action')");
 
// menghapus semua session
session_destroy();
 
// mengalihkan halaman ke halaman login
header("location:../index.php");
?>