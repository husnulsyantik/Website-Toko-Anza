<?php
require ("koneksi.php");

if(isset($_GET['add']))
{
$qry=mysqli_fetch_array(mysqli_query($conn,"Select * from barang where kd_barang = '$_GET[add]'"));
	
}
if(!empty($_GET['add'])) {
mysqli_query($conn,"Insert into kerajang values('','$qry[kd_barang]','$qry[nm_barang]','$qry[barcode]','$qry[harga_jual]')") or die(mysql_error());
header('Location:transaksi.php');
}
?>