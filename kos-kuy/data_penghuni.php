<?php
    require 'function.php';
    require 'cek.php';
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>KUY-KOS | DATA PENGHUNI</title>
        <link href="css/styles.css" rel="stylesheet" />
        <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/js/all.min.js" crossorigin="anonymous"></script>
    </head>
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <a class="navbar-brand" href="index.php">KUY KOS</a>
            <button class="btn btn-link btn-sm order-1 order-lg-0" id="sidebarToggle" href="#"><i class="fas fa-bars"></i></button>
            <!-- Navbar-->
            <ul class="navbar-nav ml-auto ml-5 md-5">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="userDropdown" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                        <a class="dropdown-item" href="logout.php">Logout</a>
                    </div>
                </li>
            </ul>
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <div class="sb-sidenav-menu-heading">ADMIN</div>
                            <a class="nav-link" href="index.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Dashboard
                            </a>
                            <div class="sb-sidenav-menu-heading">ADMIN</div>
                            <a class="nav-link" href="data_kamar.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-user-alt"></i></div>
                                Data Kamar
                            </a> 
                            <div class="sb-sidenav-menu-heading">ADMIN</div>
                            <a class="nav-link" href="data_penghuni.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-user-alt"></i></div>
                                Data Penghuni
                            </a> 
                            <div class="sb-sidenav-menu-heading">ADMIN</div>
                            <a class="nav-link" href="data_tagihan.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-sync-alt"></i></div>
                                Riwayat Pembayaran
                            </a>           
                        </div>
                    </div>
                    <div class="sb-sidenav-footer">
                        <div class="small">Logged in as:</div>
                        Admin
                    </div>
                </nav>
            </div>
            <div id="layoutSidenav_content">
                <main>
                        <div class="container-fluid">
                            <h1 class="mt-4">Data Penghuni</h1>
                            <ol class="breadcrumb mb-4">
                                <li class="breadcrumb-item active">Data Penghuni</li>
                            </ol>
                        </div>
                        <div class="card-header">
                            <a href="tambah_penghuni.php" class="btn btn-primary" role="button">Tambah Penghuni</a>
                        </div>
                    <div class="card mb-4">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>No.KTP</th>
                                            <th>No.HP</th>
                                            <th>Nama</th>
                                            <th>Asal Kota</th>
                                            <th>Kamar</th>
                                            <th>Tanggal Masuk</th>
                                            <th>Tanggal Keluar</th>
                                            <th>Aksi</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                            $ambilsemuadatapenghuni = mysqli_query($conn,"SELECT * FROM data_penghuni");
                                            $i=1;
                                            while($data=mysqli_fetch_array($ambilsemuadatapenghuni)){
                                                $nama = $data['nama_penghuni'];
                                                $no_hp = $data['no_hp'];
                                                $no_ktp = $data['no_ktp'];
                                                $asal_kota = $data['asal_kota'];
                                                $id_kamar = $data['id_kamar'];
                                                $tgl_registrasi = $data['tgl_registrasi'];
                                                $id_penghuni = $data['id_penghuni'];
                                                $tgl_keluar = $data['tgl_keluar'];
                                            
                                            ?>
                                            <tr>
                                                <td><?= $i++; ?></td>
                                                <td><?= $no_ktp ?></td>
                                                <td><?= $no_hp ?></td>
                                                <td><?= $nama ?></td>
                                                <td><?= $asal_kota ?></td>
                                                <td><?= $id_kamar ?></td>
                                                <td><?= $tgl_registrasi ?></td>
                                                <td><?= $tgl_keluar ?></td>
                                                <td>
                                                    <div class="btn-group" role="group">
                                                        <a href="tambah_pembayaran.php?id=<?= $id_penghuni ?>" class="btn btn-success btn-sm mr-1" role="button"><i class="fas fa-money-bill"></i></a>
                                                        <a href="edit_penghuni.php?id=<?= $id_penghuni ?>" class="btn btn-warning btn-sm mr-1" role="button"><i class="fas fa-edit"></i></a>
                                                        <form method="post" action="hapus_penghuni.php" style="display: inline-block;">
                                                            <input type="hidden" name="idpenghunihapus" value="<?= $id_penghuni ?>">
                                                            <button type="submit" class="btn btn-danger btn-sm mr-1" role="button" onclick="return confirm('Are you sure you want to delete this room?');"><i class="fas fa-trash"></i></button>
                                                        </form>
                                                    </div>
                                                </td>
                                            </tr>
                                            <?php
                                            }
                                            ?>
                                        </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </main>
                        <footer class="py-4 bg-light mt-auto">
                            <div class="container-fluid">
                                <div class="d-flex align-items-center justify-content-between small">
                                    <div class="text-muted">Copyright &copy; Zexxso 2023</div>
                                </div>
                            </div>
                        </footer>
            </div>
        </div>
        
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/datatables-demo.js"></script>
    </body>
</html>

