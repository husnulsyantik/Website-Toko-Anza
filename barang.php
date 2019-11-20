<?php
require ("koneksi.php");
$no=0;
if($_POST[go])
{
$qry=mysqli_query($conn,"Select * from barang JOIN jenis_barang ON barang.kd_jenisbarang=jenis_barang.kd_jenisbarang JOIN kategori_barang ON barang.kd_kategoribarang=kategori_barang.kd_kategoribarang AND kategori_barang.kd_jenisbarang=jenis_barang.kd_jenisbarang WHERE barang.nm_barang like '%$_POST[cari]%' or jenis_barang.nm_jenisbarang like '%$_POST[cari]%' or kategori_barang.nm_kategoribarang like '%$_POST[cari]%' or barang.kd_barang like '%$_POST[cari]%' ORDER BY barang.kd_barang");
} /*else { 
	$jml=mysqli_num_rows(mysqli_query($conn,"Select * from barang JOIN jenis_barang ON barang.kd_jenisbarang=jenis_barang.kd_jenisbarang JOIN kategori_barang ON barang.kd_kategoribarang=kategori_barang.kd_kategoribarang AND kategori_barang.kd_jenisbarang=jenis_barang.kd_jenisbarang"));
	$jml_hal=ceil($jml/6);
	if (empty($_GET[hal])) $_GET[hal]=1;
	
	$mulai=($_GET[hal]-1)*6;
	
	$qry="Select * from barang JOIN jenis_barang ON barang.kd_jenisbarang=jenis_barang.kd_jenisbarang JOIN kategori_barang ON barang.kd_kategoribarang=kategori_barang.kd_kategoribarang AND kategori_barang.kd_jenisbarang=jenis_barang.kd_jenisbarang ORDER BY barang.kd_barang LIMIT $mulai,6";
}*/


if(isset($_GET['del']))
{
	mysqli_query($conn,"DELETE FROM barang WHERE kd_barang = '$_GET[del]'");
	echo "<script>
alert('Data Sudah Dihapus');
window.location='barang.php';
</script>";	
	}
	
	
?>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Toko Anza</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="all,follow">
    <!-- Bootstrap CSS-->
    <link rel="stylesheet" href="vendor/bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome CSS-->
    <link rel="stylesheet" href="vendor/font-awesome/css/font-awesome.min.css">
    <!-- Custom icon font-->
    <link rel="stylesheet" href="css/fontastic.css">
    <!-- Google fonts - Roboto -->
    <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto:300,400,500,700">
    <!-- jQuery Circle-->
    <link rel="stylesheet" href="css/grasp_mobile_progress_circle-1.0.0.min.css">
    <!-- Custom Scrollbar-->
    <link rel="stylesheet" href="vendor/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.css">
    <!-- theme stylesheet-->
    <link rel="stylesheet" href="css/style.default.css" id="theme-stylesheet">
    <!-- Custom stylesheet - for your changes-->
    <link rel="stylesheet" href="css/custom.css">
    <!-- Favicon-->
    <link rel="shortcut icon" href="favicon.png">
    <!-- Tweaks for older IEs--><!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
  </head>
    <?php
	include "header.php";
	?><br>
     <section class="forms">
        <div class="container-fluid">
          <div class="row">
          	             
			    <div class="col-lg-12">
              <div class="card">
                <div class="card-header d-flex align-items-center">
                  <h1 class="h3 display"> <strong>DATA BARANG</strong></h1>
                </div><br>
				
				 <form class="form-horizontal" method="post">
				 
				   <div class="col-sm-4 offset-sm-7">
                          <div class="input-group">
                            <input type="text" class="form-control" name="cari" placeholder="Cari Barang"><span class="input-group-btn">
                             <input type="submit" class="btn btn-primary" value="Go" name="go"></span>
                          </div><br>
						  
						<select name="urut" class="form-control">
                          <option>Urut Berdasarkan</option>
						<option name="jenis" value="jenis" <?php if(($_POST['urut'])=="jenis") echo "SELECTED";?> > Jenis Barang</option>
						<option name="rendah" value="rendah" <?php if(($_POST['urut'])=="rendah") echo "SELECTED";?> > Stok Terendah</option>
						<option name="tinggi" value="tinggi" <?php if(($_POST['urut'])=="tinggi") echo "SELECTED";?> > Stok Tertinggi</option></select>
						
						 
                      </form></div>
                       
                <div class="card-body">
                  <table class="table table-striped" >
                    <thead>
                      <tr >
                        <th>No.</th>
						<th>ID Barang</th>
                        <th>Nama Barang</th>
                        <th>Jenis </th>
                        <th>Kategori </th>
						<th>Barcode</th>
						<th>Stok </th>
						<th>Harga Jual</th>
						<th>Harga Asli </th>
						<th>Laba </th>
						<th><center>Aksi</center></th>
                      </tr>
                    </thead>
					
                    <tbody>
					<?php
					if(($_POST['urut'])== "jenis") 
					{
					$query=mysqli_query($conn,"Select * from barang JOIN jenis_barang ON barang.kd_jenisbarang=jenis_barang.kd_jenisbarang JOIN kategori_barang ON barang.kd_kategoribarang=kategori_barang.kd_kategoribarang AND kategori_barang.kd_jenisbarang=jenis_barang.kd_jenisbarang WHERE barang.nm_barang like '%$_POST[cari]%' or jenis_barang.nm_jenisbarang like '%$_POST[cari]%' or kategori_barang.nm_kategoribarang like '%$_POST[cari]%' or barang.kd_barang like '%$_POST[cari]%' Order by jenis_barang.nm_jenisbarang");
					}
					else if(($_POST['urut'])== "rendah") 
					{
					$query=mysqli_query($conn,"Select * from barang JOIN jenis_barang ON barang.kd_jenisbarang=jenis_barang.kd_jenisbarang JOIN kategori_barang ON barang.kd_kategoribarang=kategori_barang.kd_kategoribarang AND kategori_barang.kd_jenisbarang=jenis_barang.kd_jenisbarang WHERE barang.nm_barang like '%$_POST[cari]%' or jenis_barang.nm_jenisbarang like '%$_POST[cari]%' or kategori_barang.nm_kategoribarang like '%$_POST[cari]%' or barang.kd_barang like '%$_POST[cari]%' Order by barang.stok ASC");
					}
					else if(($_POST['urut'])== "tinggi")
					{
					$query=mysqli_query($conn,"Select * from barang JOIN jenis_barang ON barang.kd_jenisbarang=jenis_barang.kd_jenisbarang JOIN kategori_barang ON barang.kd_kategoribarang=kategori_barang.kd_kategoribarang AND kategori_barang.kd_jenisbarang=jenis_barang.kd_jenisbarang WHERE barang.nm_barang like '%$_POST[cari]%' or jenis_barang.nm_jenisbarang like '%$_POST[cari]%' or kategori_barang.nm_kategoribarang like '%$_POST[cari]%' or barang.kd_barang like '%$_POST[cari]%' Order by barang.stok DESC");
					}
					else {
					$query=mysqli_query($conn,"Select * from barang JOIN jenis_barang ON barang.kd_jenisbarang=jenis_barang.kd_jenisbarang JOIN kategori_barang ON barang.kd_kategoribarang=kategori_barang.kd_kategoribarang AND kategori_barang.kd_jenisbarang=jenis_barang.kd_jenisbarang WHERE barang.nm_barang like '%$_POST[cari]%' or jenis_barang.nm_jenisbarang like '%$_POST[cari]%' or kategori_barang.nm_kategoribarang like '%$_POST[cari]%' or barang.kd_barang like '%$_POST[cari]%' Order by kd_barang"); }
						while($tampil=mysqli_fetch_array($query)){
					?>
                      <tr>
                        <th scope="row"><?php echo ++$no; ?></th>
						<td><?php echo $tampil['kd_barang']; ?></td>
                        <td><?php echo $tampil['nm_barang']; ?></td>
                        <td><?php echo $tampil['nm_jenisbarang']; ?></td>
                        <td><?php echo $tampil['nm_kategoribarang']; ?></td>
						<td><?php echo $tampil['barcode']; ?></td>
                        <td><?php echo $tampil['stok']; ?></td>
                        <td><?php echo $tampil['harga_jual']; ?></td>
						<td><strong><?php echo $tampil['harga_kulak']; ?></strong></td>
						<td><strong><?php echo $tampil['laba']; ?></strong></td>
                        <td><a href="edit.php?update=<?php echo $tampil['kd_barang']; ?>"><img src="img/edit.png" width="35" height="35"></a>&nbsp;
						<a href="?del=<?php echo $tampil['kd_barang']; ?>"><img src="img/hapus.png" width="30" height="30"></a> </td>
											
                      </tr>
					<?php } ?>
                      
                    </tbody>
                  </table><br>
				 
                </div>
              </div>
            </div>
			   </div>
              </div>
			  
      </section>
		 
     
	 
      <footer class="main-footer">
        <div class="container-fluid">
          <div class="row">
            <div class="col-sm-6">
              <p>Continue DEV &copy; 2017</p>
            </div>
            <div class="col-sm-6 text-right">
              <p>Design by <a href="https://bootstrapious.com" class="external">Bootstrapious</a></p>
              <!-- Please do not remove the backlink to us unless you support further theme's development at https://bootstrapious.com/donate. It is part of the license conditions. Thank you for understanding :)-->
            </div>
          </div>
        </div>
      </footer>
    </div>
     <!-- Javascript files-->
    <script src="vendor/jquery/jquery-3.2.1.min.js"></script>
    <script src="vendor/ajax/popper.min.js"> </script>
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
    <script src="vendor/jquery.cookie/jquery.cookie.js"> </script>
    <script src="js/grasp_mobile_progress_circle-1.0.0.min.js"></script>
    <script src="vendor/jquery-validation/jquery.validate.min.js"></script>
    <script src="vendor/malihu-custom-scrollbar-plugin/jquery.mCustomScrollbar.concat.min.js"></script>
    <script src="vendor/ajax/Chart.min.js"></script>
    <script src="js/charts-custom.js"></script>
    <script src="js/front.js"></script>
    <!-- Google Analytics: change UA-XXXXX-X to be your site's ID.-->
    <!---->
    <script>
      (function(b,o,i,l,e,r){b.GoogleAnalyticsObject=l;b[l]||(b[l]=
      function(){(b[l].q=b[l].q||[]).push(arguments)});b[l].l=+new Date;
      e=o.createElement(i);r=o.getElementsByTagName(i)[0];
      e.src='//www.google-analytics.com/analytics.js';
      r.parentNode.insertBefore(e,r)}(window,document,'script','ga'));
      ga('create','UA-XXXXX-X');ga('send','pageview');
    </script>
  </body>
</html>