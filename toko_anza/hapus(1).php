<?php
	$barang=$_GET['barang'];
	$kategori_barang=$_GET['kategori_barang'];
	if($barang){
		mysql_query("delete from barang where kd_barang='$kd_barang'");
		echo "<script>alert('Data Berhasil Dihapus');location='barang.php'</script>";
	}
	elseif($kategori_barang){
		mysql_query("delete from kategori_barang where kd_kategoribarang='$kategori_barang'");
		echo "<script>alert('Data Berhasil Dihapus');location='kategori_barang.php'</script>";
	}

?>
