 <?php
$conn = mysql_connect("localhost","root","");
mysql_select_db("toko_anza");

$nm_jenisbarang=$_POST['nm_jenisbarang'];
$query=mysql_query("insert into jenis_barang (nm_jenisbarang) values  ('$nm_jenisbarang')");
$sql=mysql_query($query);
if ($sql){
echo "Data tidak berhasil disimpan";
}
?>
