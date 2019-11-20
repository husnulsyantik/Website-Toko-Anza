<?php
require ("koneksi.php");

// membaca kode barang terbesar
$query = "SELECT max(kd_barang) as maxKode FROM barang";
$hasil = mysqli_query($conn,$query);
$data  = mysqli_fetch_array($hasil);
$kodemember = $data['maxKode'];

// mengambil angka atau bilangan dalam kode anggota terbesar,
// dengan cara mengambil substring mulai dari karakter ke-1 diambil 6 karakter
// misal 'BRG001', akan diambil '001'
// setelah substring bilangan diambil lantas dicasting menjadi integer
$noUrut = (int) substr($kodemember, 3, 3);

// bilangan yang diambil ini ditambah 1 untuk menentukan nomor urut berikutnya
$noUrut++;

// membentuk kode anggota baru
// perintah sprintf("%03s", $noUrut); digunakan untuk memformat string sebanyak 3 karakter
// misal sprintf("%03s", 12); maka akan dihasilkan '012'
// atau misal sprintf("%03s", 1); maka akan dihasilkan string '001'
$char = "BRG";
$newID = $char . sprintf("%03s", $noUrut);

if(isset($_POST['input']))
{
	$kd_barang=$newID;
	$nm_barang=$_POST['nm_barang'];
	$kd_kategoribarang=$_POST['kd_kategoribarang'];
	$kd_jenisbarang=$_POST['kd_jenisbarang'];
	$barcode=$_POST['barcode'];
	$stok=$_POST['stok'];
	$harga_jual=$_POST['harga_jual'];
	$harga_kulak=$_POST['harga_kulak'];


$q = mysqli_query($conn,"Insert into barang values('$kd_barang','$nm_barang','$kd_kategoribarang','$kd_jenisbarang','$barcode','$stok','$harga_jual','$harga_kulak')") or die(mysql_error());
echo "<script>
alert('Data Sudah Diinputkan');
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
	?>
	<body>
		<form name="jenis" id="jenis" method="post"  action="barang.php">

	<br>
      <section class="forms">
        <div class="container-fluid">
          <div class="row">

			<div class="col-lg-12">
              <div class="card">
                <div class="card-header d-flex align-items-center">
					<h1 class="h3 display"> <strong>INPUT DATA BARANG</strong></h1>
                </div><br>
                <div class="card-body">
                  <form class="form-horizontal" method="post" >
                    <div class="form-group row">
						<h2 class="col-sm-2 form-control-label">ID Barang</h2>
                      <div class="col-sm-8">
                        <input type="text" class="form-control" name="kd_barang" required value="<?php echo $r['kd_barang']?>"disabled>
                      </div>
                    </div><div class="line"></div>
					<div class="form-group row">
                      <h2 class="col-sm-2 form-control-label">Nama Barang</h2>
                      <div class="col-sm-8">
                        <input type="text" class="form-control" name="nm_barang" required value="<?php echo $r['nm_barang']?>">
                      </div>
                    </div><div class="line"></div>
					 <div class="form-group row">
                      <h2 class="col-sm-2 form-control-label">Jenis Barang</h2>
                      <div class="col-sm-8 select">
                        <select name="kd_jenisbarang" class="form-control">
						<?php
						if(empty($_POST['kd_jenisbarang'])) echo "<option value=0>Pilih jenis Barang</option>";
						$jenis1=mysqli_query($conn,"SELECT * FROM jenis_barang");
						while ($jenis2=mysqli_fetch_array($jenis1))
						{
							if($jenis2['kd_jenis']==$_POST['kd_jenis'])
							{
								echo "<option value=$jenis2[kd_jenis] selected>$jenis2[nm_jenisbarang]</option>";
								}
								else
								echo "<option value=$jenis2[kd_jenis]>$jenis2[nm_jenisbarang]</option>";
								}
						?>
                           </select>
                      </div></div><div class="line"></div>
					   <div class="form-group row">
                      <h2 class="col-sm-2 form-control-label">Kategori Barang</h2>
                      <div class="col-sm-8 select">
                    <select name="kd_kategoribarang" class="form-control">
							<?php
						if(empty($_POST['kd_kategoribarang'])) echo "<option value=0>Pilih Kategori Barang</option>";
						$kategori1=mysqli_query($conn,"SELECT * FROM kategori_barang");
						while ($kategori2=mysqli_fetch_array($kategori1))
						{
							if($kategori2['kd_kategoribarang']==$_POST['kd_kategoribarang'])
							{
								echo "<option value=$kategori2[kd_kategoribarang] selected>$kategori2[nm_kategoribarang]</option>";
								}
								else
								echo "<option value=$kategori2[kd_kategoribarang]>$kategori2[nm_kategoribarang]</option>";
								}
						?>
                           </select>
                      </div></div><div class="line"></div>
					  <div class="form-group row">
                      <h2 class="col-sm-2 form-control-label">Barcode</h2>
                      <div class="col-sm-8">
                        <input type="text" class="form-control" name="barcode">
                      </div>
                    </div><div class="line"></div>
					<div class="form-group row">
                      <h2 class="col-sm-2 form-control-label">Stok Barang</h2>
                      <div class="col-sm-8">
                        <input type="text" class="form-control" name="stok">
                      </div>
                    </div><div class="line"></div>
					<div class="form-group row">
                      <h2 class="col-sm-2 form-control-label">Harga Jual</h2>
                      <div class="col-sm-8">
                        <input type="text" class="form-control" name="harga_jual">
                      </div>
                    </div><div class="line"></div>
					<div class="form-group row">
                      <h2 class="col-sm-2 form-control-label">Harga Asli Barang (Kulak)</h2>
                      <div class="col-sm-8">
                        <input type="text" class="form-control" name="harga_kulak">
                      </div>
                    </div><div class="line"></div>
                    <div class="form-group row">
                      <div class="col-sm-4 offset-sm-2">
                        <input type="submit" class="btn btn-secondary" value="Cancel">
                        <input type="submit" class="btn btn-primary" value="Inputkan" name="input">
                      </div>
                    </div>
	<?php
	$kd_barang=$newID;
	$nm_barang=$_POST['nm_barang'];
	$kd_kategoribarang=$_POST['kd_kategoribarang'];
	$kd_jenisbarang=$_POST['kd_jenisbarang'];
	$barcode=$_POST['barcode'];
	$stok=$_POST['stok'];
	$harga_jual=$_POST['harga_jual'];
	$harga_kulak=$_POST['harga_kulak'];
	if(!empty($kode)){
		mysql_query("update barang set kd_barang='$kd_barang',nm_barang='$nm_barang',kd_kategoribarang='$kd_kategoribarang',kd_jenisbarang='$kd_jenisbarang',barcode='barcode'
		stok='$stok',harga_jual='$harga_jual',harga_kulak='harga_kulak' where kd_barang='$newID'");
		echo "<div class='sukses'>Data Berhasil Di EDIT</div>";
	}else{
	mysql_query("insert into barang set d_barang='$kd_barang',nm_barang='$nm_barang',kd_kategoribarang='$kd_kategoribarang',kd_jenisbarang='$kd_jenisbarang',barcode='barcode'
	stok='$stok',harga_jual='$harga_jual',harga_kulak='harga_kulak'")or die(mysql_error());
	echo "<div class='sukses'>Data Berhasil Disimpan</div>";

}
?>
                  </form>
								</body>
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
