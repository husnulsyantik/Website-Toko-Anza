<?php
require ("koneksi.php");

if(isset($_POST['go']))
{
	$kode=$_POST['kode'];
	$que=mysqli_fetch_array(mysqli_query($conn, "Select kd_barang,nm_barang,barcode,harga_jual from barang where kd_barang='$kode'"));
	$nama=$que['nm_barang'];
	$barcod=$que['barcode'];
	$harga=$que['harga_jual'];
	
	
$q = mysqli_query($conn,"Insert into kerajang values('','$kode','$nama','$barcod','$harga','1')") or die(mysql_error());
echo "<script>
alert('Data Sudah Diinputkan');
window.location='transaksi.php';
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
		
<!--Include Script jQuery -->
<script type="text/javascript" src="vendor/jquery/jquery.js"></script>
 
 
  </head>
    <?php
	include "header.php";
	?>
	<br>
      <section class="forms">
        <div class="container-fluid">
          <div class="row">
          
			<div class="col-lg-12">
              <div class="card">
                <div class="card-header d-flex align-items-center">
					<h1 class="h3 display"> <strong>TRANSAKSI PENJUALAN</strong></h1>				
                </div>
               
                
				
			
				 <div class="card-body">
				 <form class="form-horizontal" method="post" >
					 <div class="col-sm-4 offset-sm-8">
                          <div class="input-group">
                            <input type="text" class="form-control" name="kode" placeholder="Ketik Kode Barang"><span class="input-group-btn">
                             <input type="submit" class="btn btn-primary" value="Go" name="go"></span>
                          </div>
						  </div>
                  <table class="table table-striped" border="0">
				  
                    <thead>
                      <tr >
                        <th>No.</th>
						<th>ID Barang</th>
                        <th>Nama Barang</th>
                       <th>Barcode</th>
						<th>Harga </th>
						<th>Qty </th>
						<th>Jumlah </th>
						<th>Aksi</th>
                      </tr>
                    </thead>
					
                    <tbody>
					<?php

					$que=mysqli_query($conn,"Select * from kerajang "); 
					while($tampil=mysqli_fetch_array($que)){
					?>
                      <tr>
                        <th scope="row"><?php echo ++$n; ?></th>
						<td><?php echo $tampil['kd_barang']; ?></td>
                        <td><?php echo $tampil['nm_barang']; ?></td>
                        <td><?php echo $tampil['barcode']; ?></td>
                        <td><input type="text" class="form-control" size="1" value="<?php $format_indonesia = number_format ($tampil['harga_jual'], 0, ',', '');
						echo $format_indonesia; ?>" id="harga_jual" onkeyup="sum();" disabled></td>
						 <td> <input type="text" class="form-control" size="1" name="kuantitas" <?php echo $tampil['barcode']; ?> id="kuantitas" onkeyup="sum();"></td>
						 <td> <input type="text" class="form-control" size="1" id="hasil" disabled >
							<script>
							function sum() {
								  var txtFirstNumberValue = document.getElementById('harga_jual').value;
								  var txtSecondNumberValue = document.getElementById('kuantitas').value;
								  var result = parseInt(txtFirstNumberValue) * parseInt(txtSecondNumberValue);
								  if (!isNaN(result)) {
									 document.getElementById('hasil').value = result;
								  }
							}
							</script>
					</td>
						<td><a href="hapustrans.php?del=<?php echo $tampil['kd_barang']; ?>"><img src="img/hapus.png" width="30" height="30"></a></a></td>
											
                      </tr>
					<?php } ?>
					<tr>
					<td colspan="8">&nbsp;</td>
					</tr>
					<tr>
					<td colspan="6"></td>
					<td><strong><h1>TOTAL</h1></strong></td>
					<td><strong><h1>Rp.  </h1></strong></td>
					</tr>
					<tr>
					<td colspan="6"></td>
					<td><strong><h1>BAYAR  </h1></strong></td>
					<td><strong><h1><input type="text" class="form-control" size="1" name="kd_barang" ></h1></strong></td>
					</tr>
					<tr>
					<td colspan="7"></td>
					<td colspan="1" ><input type="submit" class="btn btn-primary" value="&nbsp;&nbsp;&nbsp;SIMPAN&nbsp;&nbsp;&nbsp;" name="simpan"></td>
					</tr>
                      
                    </tbody></form>
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