<?php
require ("koneksi.php");
if(isset($_GET['del']))
{
	mysqli_query($conn,"DELETE FROM kerajang WHERE kd_barang = '$_GET[del]'");
header('Location:transaksi.php');
	}
	?>