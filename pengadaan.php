<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Laporan Buku yang Perlu Segera Dibeli</title>
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
                        <h1 class="mt-4">Kebutuhan Buku/Laporan Buku yang Perlu Segera Dibeli</h1><br>
                    
                        
                        <div class="card mb-4">
                            <div class="card-header">
                                <i class="fas fa-table mr-1"></i>
                                DataTable Example
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                            <th>Nama Buku</th>
                                            <th>Nama Penerbit</th>
                                            <th>Sisa Stok</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                                        // Koneksi ke database
                                                        $koneksi = mysqli_connect("localhost", "root", "", "bookstore");

                                                        // Periksa koneksi
                                                        if (mysqli_connect_errno()) {
                                                            echo "Koneksi database gagal: " . mysqli_connect_error();
                                                        }

                                                        // Query untuk mendapatkan buku dengan stok paling sedikit
                                                        $query ="SELECT buku.nama_buku, penerbit.nama, buku.stok
                                                        FROM buku
                                                        JOIN penerbit ON buku.id_penerbit = penerbit.id_penerbit
                                                        WHERE buku.stok = (SELECT MIN(stok) FROM buku)";
                                            
                                            // echo "Query SQL: " . $query . "<br>"; // Cetak query SQL untuk debugging
                                            
                                            $result = mysqli_query($koneksi, $query);
                                            
                                            if ($result) {
                                                // Tampilkan data dalam tabel
                                                if (mysqli_num_rows($result) > 0) {
                                                    while ($row = mysqli_fetch_assoc($result)) {
                                                        echo "<tr>";
                                                        echo "<td>" . $row['nama_buku'] . "</td>";
                                                        echo "<td>" . $row['nama'] . "</td>";
                                                        echo "<td>" . $row['stok'] . "</td>";
                                                        echo "</tr>";
                                                    }
                                                } else {
                                                    echo "<tr><td colspan='3'>Tidak ada data yang ditemukan.</td></tr>";
                                                }
                                            } else {
                                                // Jika terjadi kesalahan dalam eksekusi query
                                                echo "<tr><td colspan='3'>Error: " . mysqli_error($koneksi) . "</td></tr>";
                                            }
                                            
                                            // Tutup koneksi database setelah selesai menggunakan
                                            mysqli_close($koneksi);
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
</html>
