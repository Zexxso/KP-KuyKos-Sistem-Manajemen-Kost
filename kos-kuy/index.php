<?php
    require 'function.php';
    require 'cek.php';
    // Function to get total rows from a table
function getTotalRows($table)
{
    global $conn;
    $result = mysqli_query($conn, "SELECT COUNT(*) as total FROM $table");
    $data = mysqli_fetch_assoc($result);
    return $data['total'];
}

$totalKamar = getTotalRows('data_kamar');
$totalPenghuni = getTotalRows('data_penghuni');
$totalTagihan = getTotalRows('data_tagihan');
?>
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>KUY KOS | DASHBOARD</title>
        <link href="css/styles.css" rel="stylesheet" />
        <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/js/all.min.js" crossorigin="anonymous"></script>
    </head>
    <style>
       .image-kos {
        text-align: center; /* Center the image */
        padding: 20px; /* Add padding around the image */
    }
    .image-kos img {
        max-width: 100%; /* Make sure the image doesn't exceed its container */
        height: 100%; /* Maintain the aspect ratio */
        border-radius: 10px; /* Add rounded corners to the image */
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Add a subtle box shadow */
    }

    .h3{
        color:black;
    }

    </style>
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
                        <h1 class="mt-4">Dashboard</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Dashboard</li>
                        </ol>
                        <div class="image-kos">
                        <div class="content-wrapper">
            <!-- START PAGE CONTENT -->
            <div class="fade-in-up">
                <div class="row">
                    <div class="col-lg-12" style="padding: 0 0 15px 0;">
                            <!--Carousel Wrapper-->
                            <div id="slide-carousel" class="carousel slide carousel-fade" data-ride="carousel">
                                <!--Slides-->
                                <div class="carousel-inner" role="listbox">
                                    <div class="carousel-caption">
                                        <h3 class="h3-responsive big-brand1" style="color: red;">SELAMAT DATANG</h3>
                                        <p class="big-brand2">DI SISTEM INFORMASI KOS-KOSAN</p>
                                    </div>
                                    <div class="carousel-item active">
                                        <div class="view">
                                            <img class="d-block" src="http://localhost/simkos/assets/img/kos/1.jpg"
                                            alt="First slide" size="40x40">
                                            <div class="mask rgba-black-light"></div>
                                        </div>
                                    </div>
                                    <div class="carousel-item">
                                        <div class="view">
                                            <img class="d-block" src="http://localhost/simkos/assets/img/kos/2.jpg"
                                            alt="First slide" size="40x40">
                                            <div class="mask rgba-black-light"></div>
                                        </div>
                                    </div>
                                </div>
                                <!--/.Slides-->
                                <a class="carousel-control-next" href="#slide-carousel" role="button" data-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="sr-only">Next</span>
                                </a>
                            </div>
                            <!--/.Carousel Wrapper-->
                    </div>
                </div>
            </div>
                        </div>
                        <div class="row">
                        <div class="col-xl-3 col-md-6">
                            <div class="card bg-primary text-white mb-4">
                                <div class="card-body">Data Kamar</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <span class="small text-white"><?php echo $totalKamar; ?> Kamar</span>
                                        <a class="small text-white stretched-link" href="data_kamar.php">View Details</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-danger text-white mb-4">
                                    <div class="card-body">Data Penghuni</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <span class="small text-white"><?php echo $totalPenghuni; ?> Penghuni</span>
                                        <a class="small text-white stretched-link" href="data_penghuni.php">View Details</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-success text-white mb-4">
                                    <div class="card-body">Riwayat Pembayaran </div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <span class="small text-white"><?php echo $totalTagihan; ?> Pembayaran</span>
                                        <a class="small text-white stretched-link" href="data_tagihan.php">View Details</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
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
