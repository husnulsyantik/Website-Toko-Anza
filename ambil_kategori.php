<?php
   require ("koneksi.php");

$data = $_POST['jb'];
$baki = 'SELECT * FROM kategori_barang where kd_jenisbarang="'.$data.'"';
$query = mysqli_query($conn, $baki);

 while($row=mysqli_fetch_array($query)){
    
    ?>
        <option value="<?php echo $row['kd_kategoribarang'] ?>"><?php echo $row['nm_kategoribarang'] ?></option><br>
    
    <?php
        
}
?>