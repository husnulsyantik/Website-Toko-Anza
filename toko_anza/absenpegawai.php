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
  <body>
  <?php
			$Open = mysql_connect("localhost","root","");
			if (!$Open){
			die ("Koneksi ke Engine MySQL Gagal !");
			}
			$Koneksi = mysql_select_db("toko_anza");
			if (!$Koneksi){
			die ("Koneksi ke Database Gagal !");
			}
  ?>
  <?php
error_reporting(0);
$namaserver ="localhost";
$username = "root";
$password = "";
$db_name = "toko_anza";

$conn = mysqli_connect($namaserver, $username, $password, $db_name);

if ($conn->connect_error) {
die('maaf koneksi gagal :'.$connect->connect_error);
}
?>

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
     <h1 class="h3 display"> <strong>LAPORAN ABSENSI PEGAWAI</strong></h1>
     </div><br>
		 <form class="form-horizontal">
		 <div class="form-group">
		 <div class="call-sm-5 offset-sm-6">
         <div class="input-group">
         </div>
		 </div>
         </form>
     <table border="0">
     <form action="absenpegawai.php" method="post" name="postform">
 	 <tr>
     <td width="125"><b>Dari Tanggal</b></td>
     <td colspan="2" width="190">: <input type="text" name="tanggal_awal" size="16" />
     <a href="javascript:void(0)" onClick="if(self.gfPop)gfPop.fPopCalendar(document.postform.tanggal_awal);return false;" ><img src="calender/calbtn.gif" alt="" name="popcal" width="34" height="29" border="0" align="absmiddle" id="popcal" /></a>
     </td>
     <td width="125"><b>Sampai Tanggal</b></td>
     <td colspan="2" width="190">: <input type="text" name="tanggal_akhir" size="16" />
     <a href="javascript:void(0)" onClick="if(self.gfPop)gfPop.fPopCalendar(document.postform.tanggal_akhir);return false;" ><img src="calender/calbtn.gif" alt="" name="popcal" width="34" height="29" border="0" align="absmiddle" id="popcal" /></a>
     </td>
     <td colspan="2" width="190"><input type="submit" value="Pencarian Data" name="pencarian"/></td>
     <td colspan="2" width="70"><input type="reset" value="Reset" /></td>
     </tr>
     </table>
     </form><br />
     <p>
   <?php
   //proses jika sudah klik tombol pencarian data
   if(isset($_POST['pencarian'])){
   //menangkap nilai form
   $tanggal_awal=$_POST['tanggal_awal'];
   $tanggal_akhir=$_POST['tanggal_akhir'];
   if(empty($tanggal_awal) || empty($tanggal_akhir)){
   //jika data tanggal kosong
   ?>
   <script language="JavaScript">
   alert('Tanggal Awal dan Tanggal Akhir Harap di Isi!');
   document.location='absenpegawai.php';
   </script>
   <?php
   }
   ?>
   </p>
  		<?php
   		}
   		else{
        unset($_POST['pencarian']);
        }
        ?>
        <?php
        $query=mysql_query("select * from absen_pegawai where tgl between '$tanggal_awal' and '$tanggal_akhir'");
        ?>
		</tr>
        <div class="card-body">
        <table class="table table-striped" >
        <thead>
        <tr >
        <th>No.</th>
		    <th>ID Pegawai</th>
        <th>tanggal</th>
        <th>Check In</th>
        <th>Check Out</th>
        </tr>
        </thead>
                    <tbody>

                      <?php
                      //menampilkan pencarian data
                      while($row=mysql_fetch_array($query)){
                      ?>
                      <tr>
                      <th scope="row"><?php echo ++$no; ?></th>
                      <td align="center" height="30"><?php echo $row['kd_pegawai']; ?></td>
                      <td align="center"><?php echo $row['tgl']; ?></td>
                      <td align="center"><?php echo $row['check_in'];?></td>
                      <td align="center"><?php echo $row['check_out'];?></td>
                      </tr>
			<?php
			}
            ?>

      </tbody>
      </table>
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
    <iframe width=174 height=189 name="gToday:normal:calender/normal.js" id="gToday:normal:calender/normal.js" src="calender/ipopeng.htm" scrolling="no" frameborder="0" style="visibility:visible; z-index:999; position:absolute; top:-500px; left:-500px;"></iframe>



  </body>
</html>
