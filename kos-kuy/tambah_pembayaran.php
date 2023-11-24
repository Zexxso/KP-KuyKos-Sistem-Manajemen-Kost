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
        <title>KUY-KOS | Tambah Pembayaran</title>
        <link href="css/styles.css" rel="stylesheet" />
        <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/js/all.min.js" crossorigin="anonymous"></script>
    </head>
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <a class="navbar-brand" href="index.html">KUY KOS</a>
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
                        <h1 class="mt-4">Tambah Pembayaran</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Tambah Pembayaran</li>
                        </ol>
                    </div>

                    <div class="card">
                        <div class="card-body">
                            <?php
                            // Fetch data for a specific room based on the room ID
                            $id_penghuni = $_GET['id']; // Make sure to sanitize and validate user input
                            $ambildatapenghuni = mysqli_query($conn, "SELECT * FROM data_penghuni WHERE id_penghuni=$id_penghuni");
                            $data = mysqli_fetch_array($ambildatapenghuni);

                            // Check if room data exists
                            if ($data) {
                                $id_kamar = $data['id_kamar'];
                                $ambildatakamar = mysqli_query($conn, "SELECT * FROM data_kamar WHERE id_kamar=$id_kamar");
                                $data_kamar = mysqli_fetch_array($ambildatakamar);
                                $jumlah = isset($_POST['jumlah']) ? $_POST['jumlah'] : 0;
                            
                            ?>
                            <form method="post">
                                <div class="modal-body">
                                <div class="form-group row">
                                    <label for="id_kamar" class="col-sm-3 col-form-label">Kamar Yang Di Tempati</label>
                                    <div class="col-sm-6">
                                        <input type="text" name="id_kamar" id="id_kamar" placeholder="No Kamar" class="form-control" value="<?= $data['id_kamar'] ?>" readonly>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="id_penghuni" class="col-sm-3 col-form-label">ID Penghuni</label>
                                    <div class="col-sm-6">
                                        <input type="text" name="id_penghuni" id="id_penghuni" placeholder="ID" class="form-control" value="<?= $data['id_penghuni'] ?>" readonly>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="nama_penghuni" class="col-sm-3 col-form-label"> Nama Penghuni</label>
                                    <div class="col-sm-6">
                                        <input type="text" name="nama_penghuni" id="nama_penghuni" placeholder="Nama" class="form-control" value="<?= $data['nama_penghuni'] ?>" readonly>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="no_hp" class="col-sm-3 col-form-label"> Nomor Handphone</label>
                                    <div class="col-sm-6">
                                        <input type="text" name="no_hp" id="no_hp" placeholder="08xxxxxx" class="form-control" value="<?= $data['no_hp'] ?>" readonly>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="no_ktp" class="col-sm-3 col-form-label"> Nomor KTP</label>
                                    <div class="col-sm-6">
                                        <input type="text" name="no_ktp" id="no_ktp" placeholder="2301xxxxx." class="form-control" value="<?= $data['no_ktp'] ?>" readonly>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="tgl_registrasi" class="col-sm-3 col-form-label">Tanggal Masuk</label>
                                    <div class="col-sm-6">
                                        <input type="date" name="tgl_registrasi" id="tgl_registrasi" class="form-control" value="<?= $data['tgl_registrasi'] ?>" readonly>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="tgl_keluar" class="col-sm-3 col-form-label">Tanggal Keluar</label>
                                    <div class="col-sm-6">
                                        <input type="date" name="tgl_keluar" id="tgl_keluar" class="form-control" value="<?= $data['tgl_keluar'] ?>">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="hargakamar" class="col-sm-3 col-form-label">Tagihan Per Bulan</label>
                                    <div class="col-sm-6">
                                        <input type="text" name="hargakamar" id="hargakamar" class="form-control" value="<?= $data_kamar['hargakamar'] ?>" readonly>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="jumlah" class="col-sm-3 col-form-label">Jumlah Yang Harus Dibayarkan</label>
                                    <div class="col-sm-6">
                                        <input type="text" name="jumlah" id="jumlah" class="form-control" value="<?= $jumlah?>" readonly>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="keterangan" class="col-sm-3 col-form-label">Keterangan (Opsional)</label>
                                    <div class="col-sm-6">
                                        <input type="text" name="keterangan" id="keterangan" class="form-control" value="" placeholder="">
                                    </div>
                                </div>
                                <div class="form-group row">
                                     <div class="col-sm-9 offset-sm-3">
                                        <button type="submit" class="btn btn-primary" name="tambahpembayaran">Submit</button>
                                    </div>
                                </div>
                                </div>
                            </form>
                                <?php
                                    } else {
                                        echo "User not found.";
                                    }
                                ?>
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
        <script>
        document.addEventListener("DOMContentLoaded", function () {
            // Function to calculate the total based on selected dates
            function calculateTotal() {
                // Get the values from the date inputs
                var tglRegistrasi = document.getElementById("tgl_registrasi").value;
                var tglKeluar = document.getElementById("tgl_keluar").value;
                var hargakamar = <?= $data_kamar['hargakamar'] ?>; // Use PHP to get the value

                // Parse the dates
                var date1 = new Date(tglRegistrasi);
                var date2 = new Date(tglKeluar);

                // Calculate the duration in months
                var durationInMonths = (date2.getFullYear() - date1.getFullYear()) * 12 + date2.getMonth() - date1.getMonth();

                // Calculate the total amount
                var jumlah = durationInMonths * hargakamar;

                // Update the Jumlah input field
                document.getElementById("jumlah").value = jumlah;
            }

            // Attach the calculateTotal function to the change event of date inputs
            document.getElementById("tgl_registrasi").addEventListener("change", calculateTotal);
            document.getElementById("tgl_keluar").addEventListener("change", calculateTotal);
        });
    </script>
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
        <script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/datatables-demo.js"></script>
    </body>
</html>
