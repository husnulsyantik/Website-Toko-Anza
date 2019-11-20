<!DOCTYPE html>
<html>
 <Head>
  <link href="jquery-ui-1.11.4/smoothness/jquery-ui.css" rel="stylesheet" />
  <script src="jquery-ui-1.11.4/external/jquery/jquery.js"></script>
  <script src="jquery-ui-1.11.4/jquery-ui.js"></script>
  <script src="jquery-ui-1.11.4/jquery-ui.min.js"></script>
  <link rel="stylesheet" href="jquery-ui-1.11.4/jquery-ui.theme.css">
  <script>
   $(document).ready(function(){
	   $("#tanggal").datepicker({
	   })
   })
  </script>
 </head>
 <body>
  <form action="aksi_buku.php" method="post">
   <table>
    <tr>
	 <td>Judul</td><td>:</td>
	 <td><input type="text" name="nama" /></td>
	</tr>
    <tr>
	 <td>Penulis</td><td>:</td>
	 <td><input type="text" name="penulis" /></td>
	</tr>
    <tr>
	 <td>Tanggal</td><td>:</td>
	 <td><input type="text" name="tanggal" id="tanggal" /></td>
	</tr>
	<tr>
	 <td colspan="3"><input type="submit" value="submit" name="submit" /></td>
	</tr>
   </table>
  </form>
 </body>
</html>