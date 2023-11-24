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
        <title>KUY-KOS | DATA KAMAR</title>
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
                    <a class="nav-link dropdown-toggle" id="userDropdown" href="" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                        <a class="dropdown-item" href="login.php">Logout</a>
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
                            <h1 class="mt-4">Data Kamar</h1>
                            <ol class="breadcrumb mb-4">
                                <li class="breadcrumb-item active">Data Kamar</li>
                            </ol>
                        </div>
                        <div class="card-header">
                            <a href="tambah_kamar.php" class="btn btn-primary" role="button">Tambah Kamar</a>
                        </div>
                    <div class="card mb-4">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered text-center" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>No.Kamar</th>
                                            <th>Lantai</th>
                                            <th>Harga Per Bulan</th>
                                            <th>Tipe Kamar</th>
                                            <th>Fasilitas</th>
                                            <th>Status</th>
                                            <th>Aksi</th>
                                    
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $ambilsemuadatakamar = mysqli_query($conn,"SELECT * FROM data_kamar");
                                        $i=1;
                                        while($data=mysqli_fetch_array($ambilsemuadatakamar)){
                                        $id_kamar = $data['id_kamar'];
                                        $lantaikamar = $data['lantaikamar'];
                                        $hargakamar = $data['hargakamar'];
                                        $fasilitaskamar = $data['fasilitaskamar'];
                                        $status = $data['status'];
                                        $tipe_kamar = $data['tipe_kamar'];

                                        $isOccupied = mysqli_query($conn, "SELECT * FROM data_penghuni WHERE id_kamar = '$id_kamar'")->num_rows > 0;
                                        $occupancyStatus = $isOccupied ? 'Sudah Berpenghuni' : 'Belum Berpenghuni';
                                                            
                                        ?>

                                        <tr>
                                            <td><?= $i++;?></td>
                                            <td><?= $id_kamar?></td>
                                            <td><?= $lantaikamar?></td>
                                            <td>Rp <?= number_format($hargakamar)?></td>
                                            <td><?= $tipe_kamar?></td>
                                            <td><?= $fasilitaskamar?></td>
                                            <td><span class="badge <?= $isOccupied ? 'badge-danger' : 'badge-primary' ?>">
                                                    <?= $occupancyStatus ?>
                                                </span>
                                            </td>
                                            <td>
                                            <div class="btn-group" role="group">
                                                        <a href="edit_kamar.php?id=<?= $id_kamar ?>" class="btn btn-warning btn-sm mr-1" role="button"><i class="fas fa-edit"></i></a>
                                                        <form method="post" action="hapus_kamar.php" style="display: inline-block;">
                                                            <input type="hidden" name="idkamarhapus" value="<?= $id_kamar ?>">
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

