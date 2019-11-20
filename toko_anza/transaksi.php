<?php
require ("koneksi.php");
$no=0;
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
                  <h1 class="h3 display"> <strong>TRANSAKSI BARANG</strong></h1>
                </div><br>
				
				 <form class="form-horizontal">
				 <div class="form-group">
				   <div class="col-sm-5 offset-sm-6">
                          <div class="input-group">
                            <input type="text" class="form-control"><span class="input-group-btn">
                          </div>
							</div>
						
                      </form>
					  
                <div class="card-body">
                  <table class="table table-striped" >
                    <thead>
                      <tr >
                        <th>No.</th>
						<th>ID Barang</th>
                        <th>Kuantitas</th>
                        <th>Harga</th>
                        <th>Jumlah</th>
						<th>Total Harga</th>
						<th>Aksi</th>
                      </tr>
                    </thead>
					
                    <tbody>
                    
                    
					<?php 
					$query=mysqli_query($conn,"Select * from barang JOIN jenis_barang ON barang.kd_jenisbarang=jenis_barang.kd_jenisbarang JOIN kategori_barang ON barang.kd_kategoribarang=kategori_barang.kd_kategoribarang AND kategori_barang.kd_jenisbarang=jenis_barang.kd_jenisbarang");
					while($tampil=mysqli_fetch_array($query)){
					?>
                      <tr>
                        <th scope="row"><?php echo ++$no; ?></th>
						<td><?php echo $tampil['kd_barang']; ?></td>
                        <td><?php echo $tampil['kuantitas']; ?></td>
                        <td><?php echo $tampil['harga']; ?></td>
                        <td><?php echo $tampil['jumlah']; ?></td>
                        <td><?php echo $tampil['total_harga']; ?></td>
                        <td><input type="submit" class="btn btn-success" name="Hapus" value="&nbsp;&nbsp;Hapus&nbsp;&nbsp;">&nbsp;
                      </tr>
					<?php } ?>
             
             		 <div class="card-body">
                  <table class="table table-striped" >
                 		<div class="form-group row">
                      <h2 class="col-sm-2 offset-sm-8 form-control-label"><strong>TOTAL BELANJAAN</strong></h2>
                      <div class="col-sm-2 ">
                        <input type="text" class="form-control" name="stok">
                      </div>
                    <thead>
                     	<div class="form-group row">
                      <h2 class="col-sm-2 offset-sm-8 form-control-label"><strong>TOTAL BAYAR</strong></h2>
                      <div class="col-sm-2 ">
                        <input type="text" class="form-control" name="stok">
                      </div>
                      </thead>
                      <div class="form-group row">
                      <h2 class="col-sm-2 offset-sm-8 form-control-label"><strong>KEMBALIAN</strong></h2>
                      <div class="col-sm-2 ">
                        <input type="text" class="form-control" name="stok">
                      </div>
                </table>
                <tr>
                <td><input type="submit" class="btn btn-success" name="Save" value="&nbsp;&nbsp;Save&nbsp;&nbsp;">&nbsp;

                </tr>
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