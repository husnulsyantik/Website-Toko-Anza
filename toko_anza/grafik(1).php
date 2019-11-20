<!DOCTYPE html>
<html>
<meta charset="UTF-8">
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<head>
<title>Grafik Penduduk Indonesia</title>
<script src="js/jquery-1.9.1.min.js" type="text/javascript"></script>
<script src="js/highcharts.js" type="text/javascript"></script>
<script src="js/exporting.js" type="text/javascript"></script>
<script type="text/javascript">
	var chart1; // globally available
$(document).ready(function() {
      chart1 = new Highcharts.Chart({
         chart: {
            renderTo: 'container',
            type: 'column'
         },
         title: {
            text: 'Data Penduduk Provinsi Indonesia '
         },
         xAxis: {
            categories: ['Provinsi']
         },
         yAxis: {
            title: {
               text: 'Jumlah Penduduk'
            }
         },
              series:
            [
<?php
// file koneksi php
$server = "localhost";
$username = "root";
$password = "";
$database = "db_chart";
mysql_connect($server,$username,$password) or die("Koneksi gagal");
mysql_select_db($database) or die("Database tidak bisa dibuka");
$sql   = "SELECT * from datapenduduk"; // file untuk mengakses ke tabel database
$query = mysql_query( $sql ) or die(mysql_error());
while($ambil = mysql_fetch_array($query)){
	$provinsi=$ambil['provinsi'];
	$sql_jumlah   = "SELECT * from datapenduduk where provinsi='$provinsi'";
	$query_jumlah = mysql_query( $sql_jumlah ) or die(mysql_error());
	while( $data = mysql_fetch_array( $query_jumlah ) ){
	   $jumlahx = $data['jumlah'];
	  }

	  ?>
	  {
		  name: '<?php echo $provinsi; ?>',
		  data: [<?php echo $jumlahx; ?>]
	  },
	  <?php } ?>
]
});
});
</script>
</head>
<body>
<!-- fungsi yang di tampilkan dibrowser  -->
<div id="container" style="min-width: 200px; height: 400px; margin: 0 auto"></div>

</body>
</html>
