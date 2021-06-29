<?php 
// mengaktifkan session pada php
session_start();
 
// menghubungkan php dengan koneksi database
include 'koneksi.php';

// menangkap data yang dikirim dari form
$username = $_POST['username'];
$password = md5($_POST['password']);

// menyeleksi data user dengan username dan password yang sesuai
$login = mysqli_query($koneksi,"select * from user where username='$username' and password='$password'");
// menghitung jumlah data yang ditemukan
$cek = mysqli_num_rows($login);

// cek apakah username dan password di temukan pada database
if($cek > 0){
 
	$data = mysqli_fetch_assoc($login);
 
	// cek jika user login sebagai admin
	if($data['level']=="1"){
 
		// buat session login dan username
		$_SESSION['username'] = $username;
		$_SESSION['level'] = "1";

		//log
		$user_id = $username;
		$action = "has been log in";
		mysqli_query($koneksi,"INSERT INTO user_log (user_id,action) values('$user_id','$action')");

		// alihkan ke halaman dashboard admin
		header("location:leader/board.php");
 
	// cek jika user login sebagai pegawai
	}else if($data['level']=="2"){
		// buat session login dan username
		$_SESSION['username'] = $username;
		$_SESSION['level'] = "2";

		//log
		$user_id = $username;
		$action = "has been log in";
		mysqli_query($koneksi,"INSERT INTO user_log (user_id,action) values('$user_id','$action')");

		// alihkan ke halaman dashboard pegawai
		header("location:staff/index.php");
 
	// cek jika user login sebagai pengurus
	}else{
 
		// alihkan ke halaman login kembali
		header("location:index.php?pesan=gagal");
	}	
}else{
	header("location:index.php?pesan=gagal");
}

?>