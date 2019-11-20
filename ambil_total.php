<?php
   require ("koneksi.php");

$data = $_POST['k'];
$baki = 'SELECT * FROM kerajang where kuantitas="'.$data.'"';
$query = mysqli_query($conn, $baki);


 while($row=mysqli_fetch_array($query)){
    
    ?>
       <?php //$total = $row[kuatitas]*$row[harga_jual]; echo $total; 
	   echo $row[kuantitas];?>
    
    <?php
        
}
?>