<?php
include "koneksi_toko_anza.php";

    if(isset($_POST['simpan'])){
        $data1=$_POST['id_barang'];
        $data2=$_POST['nama_barang'];
        $data3=$_POST['kategori_barang'];
       /* $data4=$_POST['aksi'];*/
        $query=mysqli_query($conn, "insert into kategori values ('$data1','$data2','$data3')");    
   
        if($query){
            echo '<script language="javascript">alert("Data berhasil ditambahkan"); document.location="kategori.php";</script>';
        } else {
            echo 'gagal';
        }
        
    }
?>