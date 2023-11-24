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
        <title>KUY-KOS | TAMBAH KAMAR</title>
        <link href="css/styles.css" rel="stylesheet" />
        <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/js/all.min.js" crossorigin="anonymous"></script>
    </head>
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <a class="navbar-brand" href="index.php">KUY KOS</a>
            <button class="btn btn-link btn-sm order-1 order-lg-0" id="sidebarToggle" href="#"><i class="fas fa-bars"></i></button>
            <!-- Navbar-->
            <ul class="navbar-nav ml-auto ml-md-20">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="userDropdown" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                        <a class="dropdown-item" href="logout.php">Logout</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="logout.php">Ubah Password</a>
                    </div>
                </li>
            </ul>
        </nav>
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <div class="sb-sidenav-menu-heading">Dashboard</div>
                            <a class="nav-link" href="index.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Dashboard
                            </a>
                        </div>
                        <div class="nav">
                            <div class="sb-sidenav-menu-heading">Admin</div>
                            <a class="nav-link" href="data_kamar.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-user-alt"></i></div>
                                Data Kamar
                            </a>
                        </div>
                        <div class="nav">
                            <div class="sb-sidenav-menu-heading">Admin</div>
                            <a class="nav-link" href="data_penghuni.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-user-alt"></i></div>
                                Data Penghuni
                            </a>
                        </div>
                        <div class="nav">
                            <div class="sb-sidenav-menu-heading">Keuangan</div>
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
                        <h1 class="mt-4">Tambah Kamar</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item"><a href="data_kamar.php">Data Kamar</a></li>
                            <li class="breadcrumb-item active">Tambah Kamar</li>
                        </ol>
                    <div class="card">
                        <div class="card-body"></div>
                        <form method="post" id="kamarForm">
                        <div class="modal-body">
                                <div class="form-group row">
                                    <label for="id_kamar" class="col-sm-3 col-form-label">Nomor Kamar</label>
                                    <div class="col-sm-6">
                                        <input type="text" name="id_kamar" id="id_kamar" placeholder="Masukkan Nomor Kamar" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="lantaikamar" class="col-sm-3 col-form-label">Lantai Kamar</label>
                                    <div class="col-sm-6">
                                        <input type="text" name="lantaikamar" id="lantaikamar" placeholder="1/2/3" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="hargakamar" class="col-sm-3 col-form-label">Tagihan Per Bulan</label>
                                    <div class="col-sm-6">
                                        <input type="text" name="hargakamar" id="hargakamar" placeholder="RP." class="form-control">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="tipe_kamar" class="col-sm-3 col-form-label">Tipe Kamar</label>
                                    <div class="col-sm-6">
                                        <input type="text" name="tipe_kamar" id="tipe_kamar" placeholder="A/B/C" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="fasilitaskamar" class="col-sm-3 col-form-label">Fasilitas Kamar</label>
                                    <div class="col-sm-6">
                                        <input type="text" name="fasilitaskamar" id="fasilitaskamar" placeholder="1 Kasur dst." class="form-control" >
                                    </div>
                                </div>
                                <div class="form-group row">
                                     <div class="col-sm-9 offset-sm-3">
                                        <button type="submit" class="btn btn-primary" name="addnewkamar">Submit</button>
                                        <button type="reset" class="btn btn-warning mr-2" onclick="resetForm()">Reset</button>
                                    </div>
                                </div>
                               
                        </div>
                        </form>
                    </div>
                    </div>
                </main>
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; Zexxso Corp 2023</div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <script>
            function resetForm() {
                document.getElementById("kamarForm").reset();
            }
        </script>
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
