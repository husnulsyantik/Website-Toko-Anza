<?php
require ("koneksi.php");
$no=0;
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
	?><br>
     <section class="forms">
        <div class="container-fluid">
          <div class="row">

			    <div class="col-lg-12">
              <div class="card">
                <div class="card-header d-flex align-items-center">
                  <h1 class="h3 display"> <strong>KATEGORI BARANG</strong></h1>
                </div><br>

				
                <div class="card-body">
                  <table class="table table-striped" >
                    <thead>
                      <tr >
                        <th>No.</th>
				        <th>ID Barang</th>
                        <th>Nama Barang</th>
                        <th>Kategori Barang</th>
				        <th>Aksi</th>
                      </tr>
                    </thead>

                    <tbody>
					<?php
          $query=mysqli_query($conn,"Select * from kategori_barang");
          while($data=mysqli_fetch_array($query)){

					?>
                      <tr>
                        <th scope="row"><?php echo ++$no; ?></th>
				        <td><?php echo $data['id_barang']; ?></td>
                        <td><?php echo $data['nama_barang']; ?></td>
                        <td><?php echo $data['kategori_barang']; ?></td>
                          
                        <td>
                            <button type="button" data-toggle="modal" data-target="#modal" class="btn btn-warning">edit</button>
                            <a onclick="if(confirm('Apakah anda yakin ingin menghapus data ini ??')){ location.href='hapus_kategori.php?id=<?php echo $data['id_barang']; ?>' }" class="btn btn-danger">Hapus </a>

                        </td>
                        </tr>
					<?php } ?>

                    </tbody>
                  </table>
                    
                       <div class="line"></div>
                        <div class="form-group row">
                          <div class="col-sm-4 offset-sm-3">
                     <input type="submit" name="ll"data-toggle="modal" data-target="#myModal" class="btn btn-primary" value="Tambah data">
                     

                              
                                  <!-- Modal edit--> 
                      <div id="modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left">
                        <div role="document" class="modal-dialog modal-lg">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h4 id="exampleModalLabel" class="modal-title">Tambah data kategori</h4>
                              <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button>
                            </div>
                            <div class="modal-body">
                               <form class="form-horizontal" action="proses_edit_kategori.php" method="post"> <!-- pembuatan form -->
                                <div class="form-group row">
                                  <label class="col-sm-3 form-control-label">id barang </label> <!-- pembuatan label form -->
                                  <div class="col-sm-6">
                                    <input type="text" name="id_barang" class="form-control form-control-success"> <!-- pembuatan inputan form -->
                                  </div>
                                </div>
                                  <div class="form-group row">
                                  <label class="col-sm-3 form-control-label">Nama barang</label>
                                  <div class="col-sm-6">
                                    <input type="text" name="nama_barang" class="form-control form-control-success">
                                  </div>
                                </div>
                                  <div class="form-group row">
                                  <label class="col-sm-3 form-control-label">kategori barang </label>
                                  <div class="col-sm-6">
                                    <textarea type="text" name="kategori_barang" class="form-control form-control-success"></textarea>
                                  </div>
                                </div>
                                 
                            
                            <div class="modal-footer">
                              <button type="button" data-dismiss="modal" class="btn btn-secondary">Close</button>
                              <button type="submit" class="btn btn-primary" name="save">simpan</button>
                            </div>
                            </form>
                          </div>
                        </div>
                      </div>
                    </div>
 
                              
                              
                              
                              
                              <!-- Modal tambah kategori--> 
                      <div id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" class="modal fade text-left">
                        <div role="document" class="modal-dialog modal-lg">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h4 id="exampleModalLabel" class="modal-title">Tambah data kategori</h4>
                              <button type="button" data-dismiss="modal" aria-label="Close" class="close"><span aria-hidden="true">×</span></button>
                            </div>
                            <div class="modal-body">
                               <form class="form-horizontal" action="proses_kategori.php" method="post"> <!-- pembuatan form -->
                                <div class="form-group row">
                                  <label class="col-sm-3 form-control-label">id barang </label> <!-- pembuatan label form -->
                                  <div class="col-sm-6">
                                    <input type="text" name="id_barang" class="form-control form-control-success"> <!-- pembuatan inputan form -->
                                  </div>
                                </div>
                                  <div class="form-group row">
                                  <label class="col-sm-3 form-control-label">Nama barang</label>
                                  <div class="col-sm-6">
                                    <input type="text" name="nama_barang" class="form-control form-control-success">
                                  </div>
                                </div>
                                  <div class="form-group row">
                                  <label class="col-sm-3 form-control-label">kategori barang </label>
                                  <div class="col-sm-6">
                                    <textarea type="text" name="kategori_barang" class="form-control form-control-success"></textarea>
                                  </div>
                                </div>
                                 
                            
                            <div class="modal-footer">
                              <button type="button" data-dismiss="modal" class="btn btn-secondary">Close</button>
                              <button type="submit" class="btn btn-primary" name="simpan">Tambah</button>
                            </div>
                            </form>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                    
                    
                    
                    
                    
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
