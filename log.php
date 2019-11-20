<?php

require ("koneksi.php");

session_start();


	$nama = $_POST['nama'];
    $pwd = $_POST['pwd'];
    
    $cek = 'SELECT * FROM admin where nama="'.$nama.'" AND pwd="'.$pwd.'"';
    $sql = mysqli_query($conn, $cek);
    
    if(mysqli_num_rows($sql)==1){//jika berhasil akan bernilai 1
        $c = mysqli_fetch_array($sql);
        $_SESSION['login'] = $c['nama'];
        echo "<script>alert('Anda Berhasil Login'); 
        window.location='index.php';
        </script>";  
    } else {
        echo "<script>alert('Login Gagal'); 
        window.location='login.php';
        </script>";
    }
/*

if(isset($_POST['login']))
{
if($_POST['captcha'] != TRUE) {
echo'<script type="text/javascript">
alert("Kode salah, Silahkan Mencoba kembali!");
window.location="login.php";
</script>';
}
else if(mysqli_num_rows(mysqli_query($conn,"select * from admin where nama='$_POST[nama]' and pwd='$_POST[pwd]'"))==1)
{
	
	$data=mysqli_fetch_array(mysqli_query($conn,"select kd_admin, nama from admin where nama='$_POST[nama]' and pwd='$_POST[pwd]'"));
	$_SESSION['login']=$data[0];
	//$_SESSION['user']=$data[1];
echo'<script type="text/javascript">
alert("Login berhasil, Selamat Datang :)");
window.location="index.php";
</script>';
}
else {
echo'<script type="text/javascript">
alert("Username/Password salah!");
window.location="login.php";
</script>';
}
}*/
		  ?>