<h2>SELAMAT DATANG</h2>
<?php
$q=mysqli_query("select * from barang");
$num=mysql_num_rows($q);

$qkk=mysql_query("select * from jenis_barang");
$numk=mysql_num_rows($qkk);

$qbd=mysql_query("select * from kategori_barang");
$numsk=mysql_num_rows($qbd);

$qn=mysql_query("select * from pegawai");
$numbd=mysql_num_rows($qn);
?>

<?php
	$no=1;
	$i=1;
	while($query=mysql_fetch_array($query)){
		$query=mysqli_query($conn,"Select * from barang ");
?>

        <?php
        if($cek == 0){
		}else{
			?>
        <?php while($query=mysql_fetch_array($query)){ ?>

        <?php }}}?>
      </table>
