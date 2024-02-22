<?php
// Memasukkan file function
require_once 'function.php';
if (isset($_POST["addnewbuku"] ) )

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Pengelolaan Data</title>
        <link href="css/styles.css" rel="stylesheet" />
        <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/js/all.min.js" crossorigin="anonymous"></script>
    </head>
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <a class="navbar-brand" href="index.html">UNIBOOKSTORE</a>
            <button class="btn btn-link btn-sm order-1 order-lg-0" id="sidebarToggle" href="#"><i class="fas fa-bars"></i></button>
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <div class="sb-sidenav-menu-heading">Lulu Hidayah</div>
                            <a class="nav-link" href="index.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Home
                            </a>

                            <a class="nav-link" href="admin.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Admin
                            </a>

                            <a class="nav-link" href="pengadaan.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Pengadaan
                            </a>

                            
                        </div>
                    </div>
                    
                </nav>
            </div>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid">
                        <h1 class="mt-4">Pengelolaan Data</h1><br>
                    
                        
                        <div class="card mb-4">
                            <div class="card-header">
                                <!-- Button to Open the Modal -->
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">
                                Tambah Buku
                            </button>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>ID Buku</th>
                                                <th>Kategori</th>
                                                <th>Nama Buku</th>
                                                <th>Harga</th>
                                                <th>Stok</th>
                                                <th>Penerbit</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                            $ambilsemuadatabuku = mysqli_query($connection, "select * from buku");
                                            while($data=mysqli_fetch_array($ambilsemuadatabuku)){
                                                $kode_buku = $data['kode_buku'];
                                                $kategori = $data['kategori'];
                                                $nama_buku = $data['nama_buku'];
                                                $harga = $data['harga'];
                                                $stok = $data['stok'];
                                                $penerbit = $data['penerbit'];
                                                $idb = $data["id"];
                                        
                                            ?>
                                            <tr>
                                                <td><?=$kode_buku?></td>
                                                <td><?=$kategori?></td>
                                                <td><?=$nama_buku?></td>
                                                <td><?=$harga?></td>
                                                <td><?=$stok?></td>
                                                <td><?=$penerbit?></td>
                                            <td>
                                                <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#edit<?=$idb;?>">Edit</button>
                                                <a href="delete.php?id=<?= $data['id']; ?>"onclick="return confirm('Apakah Yakin ingin Mengahpus Data ini?')" 
                                                class="btn" style="background-color: #FE6383; color: #fff; border-radius:12px;">HAPUS</a>
 
                                            </td>
                                            </tr> 
                                                <!-- Edit The Modal -->
                                                <div class="modal fade" id="edit<?=$idb;?>">
                                                    <div class="modal-dialog">
                                                    <div class="modal-content">
                                                    
                                                        <!-- Modal Header -->
                                                        <div class="modal-header">
                                                        <h4 class="modal-title">Edit Buku</h4>
                                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                        </div>
                                                        
                                                        <!-- Modal body -->
                                                        <form method="post">
                                                        <div class="modal-body">
                                                        <input type ="text" name="kode_buku" value="<?=$kode_buku;?>" placeholder="ID Buku" class="from-control" require_once>
                                                        <br>
                                                        <input type ="text" name="kategori" value="<?=$kategori;?>" placeholder="Kategori" class="from-control" require_once>
                                                        <br>
                                                        <input type ="text" name="nama_buku" value="<?=$nama_buku;?>" placeholder="Nama Buku" class="from-control" require_once>
                                                        <br>
                                                        <input type ="num" name="harga"  value="<?=$harga;?>" placeholder="Harga" class="from-control" require_once>
                                                        <br>
                                                        <input type ="num" name="stok" value="<?=$stok;?>" placeholder="Stok" class="from-control" require_once>
                                                        <br>
                                                        <input type ="text" name="penerbit" value="<?=$penerbit;?>" placeholder="Penerbit" class="from-control" require_once>
                                                        <br>
                                                        <input type="hidden" name="idb" value="<?=$idb;?>">
                                                            <button type="submit" class="btn btn-primary" name="updatebuku">Submit</button>
                                                        </div>
                                                        </form>  
                                                    </div>
                                                    </div>


                                            <?php
                                            };
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>



                        <div class="card mb-5">
                            <div class="card-header">
                                <!-- Button to Open the Modal -->
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myForm">
                                Tambah Penerbit
                            </button>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>ID Penerbit</th>
                                                <th>Nama</th>
                                                <th>Alamat</th>
                                                <th>Kota</th>
                                                <th>Telepon</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                            $ambilsemuadatabuku = mysqli_query($connection, "select * from penerbit");
                                            while($data=mysqli_fetch_array($ambilsemuadatabuku)){
                                                $kode_penerbit = $data['kode_penerbit'];
                                                $nama = $data['nama'];
                                                $alamat= $data['alamat'];
                                                $kota = $data['kota'];
                                                $telepon = $data['telepon'];
                                        
                                            ?>
                                            <tr>
                                                <td><?=$kode_penerbit?></td>
                                                <td><?=$nama?></td>
                                                <td><?=$alamat?></td>
                                                <td><?=$kota?></td>
                                                <td><?=$telepon?></td>
                                                <td>
                                                <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#edit">Edit</button>
                                                <input type="hidden" name="idbuku" value="<?=$idb;?>">
                                                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#delete">Delete</button>
                                            </td>
                                            </tr> 
                                                <!-- The Modal -->
                                                <div class="modal fade" id="edit<?=$idb;?>">
                                                    <div class="modal-dialog">
                                                    <div class="modal-content">
                                                    
                                                        <!-- Modal Header -->
                                                        <div class="modal-header">
                                                        <h4 class="modal-title">Edit Buku</h4>
                                                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                        </div>
                                                        
                                                        <!-- Modal body -->
                                                        <form method="post">
                                                        <div class="modal-body">
                                                        <input type ="text" name="kode_buku" value="<?=$kode_buku;?>" placeholder="ID Buku" class="from-control" require_once>
                                                        <br>
                                                        <input type ="text" name="kategori" value="<?=$kategori;?>" placeholder="Kategori" class="from-control" require_once>
                                                        <br>
                                                        <input type ="text" name="nama_buku" value="<?=$nama_buku;?>" placeholder="Nama Buku" class="from-control" require_once>
                                                        <br>
                                                        <input type ="num" name="harga"  value="<?=$harga;?>" placeholder="Harga" class="from-control" require_once>
                                                        <br>
                                                        <input type ="num" name="stok" value="<?=$harga;?>" placeholder="Stok" class="from-control" require_once>
                                                        <br>
                                                        <input type ="text" name="penerbit" value="<?=$penerbit;?>" placeholder="Penerbit" class="from-control" require_once>
                                                        <br>
                                                            <button type="submit" class="btn btn-primary" name="updatebuku">Submit</button>
                                                        </div>
                                                        </form>  
                                                    </div>
                                                    </div>

                                            <?php
                                            };
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; Lulu Hidayah</div>
                            <div>
                                <a href="#">Privacy Policy</a>
                                &middot;
                                <a href="#">Terms &amp; Conditions</a>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/chart-area-demo.js"></script>
        <script src="assets/demo/chart-bar-demo.js"></script>
        <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/datatables-demo.js"></script>
    </body>



    
      <!-- The Modal -->
  <div class="modal fade" id="myModal">
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h4 class="modal-title">Tambah Buku</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        
        <!-- Modal body -->
        <form method="post">
        <div class="modal-body">
          <input type ="text" name="kode_buku" placeholder="ID Buku" class="from-control" require_once>
          <br>
          <input type ="text" name="kategori" placeholder="Kategori" class="from-control" require_once>
          <br>
          <input type ="text" name="nama_buku" placeholder="Nama Buku" class="from-control" require_once>
          <br>
          <input type ="num" name="harga" placeholder="Harga" class="from-control" require_once>
          <br>
          <input type ="num" name="stok" placeholder="Stok" class="from-control" require_once>
          <br>
          <input type ="text" name="penerbit" placeholder="Penerbit" class="from-control" require_once>
          <br>
          <input type ="text" name="id_penerbit" placeholder="Id_Penerbit" class="from-control" require_once>
          <br>
            <button type="submit" class="btn btn-primary" name="addnewbuku">Submit</button>
        </div>
        </form>  

        
      </div>
    </div>
  </div>
</html>