<?php
session_start();
error_reporting(0);
$namaserver ="localhost";
$username = "root";
$password = "";
$db_name = "toko_anza";
date_default_timezone_set('Asia/Jakarta');
$conn = mysqli_connect($namaserver, $username, $password, $db_name);

if ($conn->connect_error) {
	die('maaf koneksi gagal :'.$connect->connect_error);
}
?>
