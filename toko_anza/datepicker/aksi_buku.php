<?php
$con = mysqli_connect("localhost","root","","cerdas");

$nama = $_POST['nama'];
$penulis = $_POST['penulis'];
$tanggal = $_POST['tanggal'];
$submit = $_POST['submit'];

function ubahTanggal($tanggal){
	$pisah = explode('/',$tanggal);
	$array = array($pisah[2],$pisah[0],$pisah[1]);
	$satukan = implode('-',$array);
	return $satukan;
}

$tgl_terbit = ubahTanggal($tanggal);

if(isset($submit)){
	if(empty($nama) or empty($penulis) or empty($tanggal)){
		echo"<script>window.alert('Maaf,Form tidak boleh kosong....!!!');window.location=('form_buku.php');</script>";
	}else{
		$ins = mysqli_query($con,"insert into buku(judul,penulis,tgl_terbit) values ('$nama','$penulis','$tgl_terbit')");
		echo"<script>window.alert('Data Berhasil diupload');window.location=('form_buku.php');</script>";
	}
}

?>