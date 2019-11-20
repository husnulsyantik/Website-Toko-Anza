<?php
require ("koneksi.php");
//session_start();
if(isset($_POST['out']))
{
if($_POST['captcha'] != $_SESSION['captcha']) {
echo'<script type="text/javascript">
alert("Kode salah, Silahkan Mencoba kembali!");
window.location="absen.php";
</script>';
}
else if(mysqli_num_rows(mysqli_query($conn,"select * from pegawai where nama='$_POST[nama]' and pwd='$_POST[pwd]'"))==1)
{
	$kd_absen=$_POST['kd_absen'];
	$kd_pegawai=$_POST['kd_pegawai'];
	$tgl=date('Y-m-d');
	$in=date('h:i:s');
	$out=date('h:i:s');
	$data=mysqli_fetch_array(mysqli_query($conn,"select kd_pegawai, nama from pegawai where nama='$_POST[nama]' and pwd='$_POST[pwd]'"));
$q = mysqli_query($conn,"Update absen_pegawai set check_out='$out' where kd_absen='$kd_absen'") or die(mysql_error());
echo "<script>
alert('Anda Sudah CheckOut');
window.location='absen.php';
</script>";	

}
else {
echo'<script type="text/javascript">
alert("Username/Password salah!");
window.location="absen.php";
</script>';
}
}



if (isset($_GET['checkout']))
	{
	$qedit = mysqli_query($conn,"SELECT * FROM absen_pegawai JOIN pegawai ON absen_pegawai.kd_pegawai=pegawai.kd_pegawai WHERE kd_absen = '$_GET[checkout]'");
	$edit = mysqli_fetch_array($qedit);
	$_POST['kd_absen']=$edit[kd_absen];
	$_POST['kd_pegawai']=$edit[kd_pegawai];
	$_POST['nama']=$edit[nama];
	
	
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
	?>
	<br>
      <section class="forms">
        <div class="container-fluid">
          <div class="row">
          
			<div class="col-lg-12 ">
              <div class="card">
                <div class="card-header d-flex align-items-center">
					<h1 class="h3 display"> <strong>ABSENSI PEGAWAI</strong></h1>				
                </div><br>
                <div class="card-body">
				<form class="form-horizontal" method="post">
                    <div class="form-group row">
						<h2 class="col-sm-2 form-control-label">ID Pegawai</h2>
                      <div class="col-sm-8">
                        <input type="text" class="form-control" name="kd_pegawai" required="" value="<?php echo $edit['kd_pegawai'];?>"><input type="text" class="form-control" name="kd_absen" value="<?php echo $edit['kd_absen'];?>" hidden>
                      </div>
                    </div><div class="line"></div>
					<div class="form-group row">
                      <h2 class="col-sm-2 form-control-label">Username</h2>
                      <div class="col-sm-8">
                        <input type="text" class="form-control" name="nama" required="" value="<?php echo $edit['nama'];?>">
                      </div></div><div class="line"></div>
					  <div class="form-group row">
                      <h2 class="col-sm-2 form-control-label">Password</h2>
                      <div class="col-sm-8">
                        <input type="password" class="form-control" name="pwd" required="">
                      </div></div><div class="line"></div>
					  <div class="form-group row">
                      <h2 class="col-sm-2 form-control-label">Captcha</h2>
					  &nbsp;&nbsp;&nbsp;&nbsp;<img src='captcha.php'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
					   <div class="col-sm-6	">
					   <input type="text" class="form-control" placeholder="Masukkan Kode Disamping" name="captcha" required="" >
                      </div>
                    </div><div class="line"></div>
					
                    <div class="form-group row">
                      <div class="col-sm-4 offset-sm-2">
					  <?php if(empty($edit['kd_absen'])) { ?>
                        <input type="submit" class="btn btn-primary" value="&nbsp;&nbsp;&nbsp;&nbsp;ABSEN&nbsp;&nbsp;&nbsp;&nbsp;" name="absen">
					 <?php } else { ?>
						<input type="submit" class="btn btn-primary" value="CHECKOUT" name="out">
					 <?php } ?>
                        
                      </div>
                    </div>
                  </form><br>
 <?php
if(isset($_POST['absen']))
{
if($_POST['captcha'] != $_SESSION['captcha']) {
echo'<script type="text/javascript">
alert("Kode salah, Silahkan Mencoba kembali!");
window.location="absen.php";
</script>';
}
else if(mysqli_num_rows(mysqli_query($conn,"select * from pegawai where nama='$_POST[nama]' and pwd='$_POST[pwd]'"))==1)
{
	$kd_absen=$_POST['kd_absen'];
	$kd_pegawai=$_POST['kd_pegawai'];
	$tgl=date('Y-m-d');
	$in=date('h:i:s');

	$data=mysqli_fetch_array(mysqli_query($conn,"select kd_pegawai, nama from pegawai where nama='$_POST[nama]' and pwd='$_POST[pwd]'"));
	
	$q = mysqli_query($conn,"Insert into absen_pegawai values('','$kd_pegawai','$tgl','$in','')") or die(mysql_error());
	//$_SESSION['login']=$data[0];
	//$_SESSION['user']=$data[1];
echo'<script type="text/javascript">
alert("Anda Sudah Absen");
window.location="absen.php";
</script>';
}
//else if(mysqli_fetch_array(mysqli_query($conn,"select* from absen_pegawai where kd_pegawai='$_POST[kd_pegawai]'
else {
echo'<script type="text/javascript">
alert("Username/Password salah!");
window.location="absen.php";
</script>';
}
}


?>				 
				  
				
			  <div class="line"></div>
			   <div class="card-body">
                  <table class="table table-striped" >
                    <thead>
                      <tr >
                        <th>No.</th>
						<th>Kode Pegawai </th>
						<th>Nama Pegawai</th>
						<th>Tanggal</th>
						<th>Check In</th>
						<th>Check Out</th>
                      
                      </tr>
                    </thead>
					
                    <tbody>
					<?php 
					$no=0;
					$query=mysqli_query($conn,"Select * from absen_pegawai JOIN pegawai ON absen_pegawai.kd_pegawai=pegawai.kd_pegawai where DATE(tgl) = DATE(NOW())");
					while($tampil=mysqli_fetch_array($query)){
					?>
                      <tr>
                        <th><?php echo ++$no; ?></th>
						<th><?php echo $tampil['kd_pegawai']; ?></th>
						<th><?php echo $tampil['nama']; ?></th>
						<th><?php echo $tampil['tgl']; ?></th>
						<th><?php echo $tampil['check_in']; ?></th>
						<?php if($tampil['check_out'] != '00:00:00') { ?>
						<th><?php echo $tampil['check_out']; ?></th>
						<?php } else { ?>
						<th><a href="?checkout=<?php echo $tampil['kd_absen']; ?>"><input type="submit" class="btn btn-danger" name="checkout" value="Checkout"></a>&nbsp;</th>
                        <?php } ?>
                      </tr>
					<?php } ?>
                      
                    </tbody>
                  </table>
    </div>
              </div>            </div>
				
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