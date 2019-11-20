<?php 
include 'koneksi_toko_anza.php';
$bubar=$_GET['id_barang'];
mysql_query("delete from kategori where id_barang='$bubar'");
 if($query){
		
		echo"<script languange=\"JavaScript\">\n";
		echo"alert(\"Data Berhasil Diupdate...!!\");\n";
		echo"window.location=\"kategori.php\"";
		echo"</script>";
	}else{
		echo"<script languange=\"JavaScript\">\n";
		echo"alert(\"Data Gagal Diupdate...!!\");\n";
		echo"window.location=\"kategori.php\"";
		echo"</script>";
	}
?>