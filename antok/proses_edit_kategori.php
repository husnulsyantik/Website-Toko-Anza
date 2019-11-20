<?php
	require("koneksi_toko_anza.php");
    if(isset($_POST['save']))
	$data1=$_REQUEST['id_barang'];
	$edit="UPDATE kategori SET kategori='$_REQUEST[kategori]', id_barang='$_REQUEST[id_barang]', nama_barang='$_REQUEST[nama_barang]', kategori_barang='$_REQUEST[kategori_barang]', where id_kategori='$data1'";
	$query_edit=mysql_query($edit);
	header("Location:kategori.php");
	
	if($query_edit){
		
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