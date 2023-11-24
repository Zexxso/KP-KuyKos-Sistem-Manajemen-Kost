<?php
    require 'function.php';
    require 'cek.php';

    // Check if the form is submitted
if (isset($_POST['addnewpenghuni'])) {
    // Retrieve form data
    $nama_penghuni = $_POST['nama_penghuni'];
    $no_hp = $_POST['no_hp'];
    $no_ktp = $_POST['no_ktp'];
    $asal_kota = $_POST['asal_kota'];
    $tgl_registrasi = $_POST['tgl_registrasi'];
    $id_Kamar = $_POST['id_Kamar'];
    $tgl_keluar = $_POST['tgl_keluar'];

    // Check if the room is occupied
    $checkOccupancy = $conn->query("SELECT * FROM data_penghuni WHERE id_kamar = '$id_Kamar'");
    
    if ($checkOccupancy->num_rows > 0) {
        // The room is already occupied
        echo "Room is already occupied!";
    } else {
        // The room is vacant, proceed with the insertion
        $conn->query("INSERT INTO data_penghuni (nama_penghuni, no_hp, no_ktp, asal_kota, tgl_registrasi, id_kamar, tgl_keluar) VALUES ('$nama_penghuni', '$no_hp', '$no_ktp', '$asal_kota', '$tgl_registrasi', '$id_Kamar')");
        
        // Redirect to the data_kamar.php page or show a success message
        header("Location: data_kamar.php");
        exit();
    }
}
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
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css">
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
                        <h1 class="mt-4">Tambah Penghuni</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Data Penghuni</li>
                            <li class="breadcrumb-item"><a href="data_kamar.php">Tambah Penghuni</a></li>
                        </ol>
                    <div class="card">
                        <div class="card-body"></div>
                        <form method="POST" id="penghuniForm">
                            <div class="modal-body">
                                <div class="form-group row">
                                    <label for="nama_penghuni" class="col-sm-3 col-form-label">Nama Penghuni</label>
                                    <div class="col-sm-6">
                                        <input type="text" name="nama_penghuni" id="nama_penghuni" placeholder="Nama" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="no_hp" class="col-sm-3 col-form-label">Masukkan Nomor Handphone</label>
                                    <div class="col-sm-6">
                                        <input type="text" name="no_hp" id="no_hp" placeholder="08xxxxxx" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="no_ktp" class="col-sm-3 col-form-label">Masukkan Nomor KTP</label>
                                    <div class="col-sm-6">
                                        <input type="text" name="no_ktp" id="no_ktp" placeholder="2301xxxxx." class="form-control">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="asal_kota" class="col-sm-3 col-form-label">Masukkan Asal Kota</label>
                                    <div class="col-sm-6">
                                        <input type="text" name="asal_kota" id="asal_kota" placeholder="- Kota -" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="tgl_registrasi" class="col-sm-3 col-form-label">Awal Registrasi</label>
                                    <div class="col-sm-4">
                                        <input type="date" name="tgl_registrasi" id="tgl_registrasi" class="form-control" readonly>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="tgl_keluar" class="col-sm-3 col-form-label">Tanggal Keluar</label>
                                    <div class="col-sm-4">
                                        <input type="date" name="tgl_keluar" id="tgl_keluar" class="form-control">
                                    </div>
                                </div>

                                <div class="form-group row">
                                     <label for="id_Kamar" class="col-sm-3 col-form-label">Kamar Yang Di Tempati</label>
                                         <div class="col-sm-6">
                                            <select class="form-control" name="id_Kamar" id="id_Kamar">
                                                <option value="">Pilih No Kamar</option>
                                                <?php 
                                                    $ambil = $conn->query("SELECT * FROM data_kamar");
                                                    while($perkamar = $ambil->fetch_assoc()){
                                                        $isOccupied = $conn->query("SELECT * FROM data_penghuni WHERE id_kamar = '{$perkamar['id_kamar']}'")->num_rows > 0;
                                                ?>
                                                <option value="<?php echo $perkamar['id_kamar'] ?>" <?php echo $isOccupied ? 'disabled' : ''; ?>>
                                                <?php echo $perkamar['id_kamar'] . ($isOccupied ? ' (Sudah Berpenghuni)' : ''); ?>
                                                        </option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                </div><br>
                                <div class="form-group row">
                                     <div class="col-sm-9 offset-sm-3">
                                        <button type="submit" class="btn btn-primary" name="addnewpenghuni">Submit</button>
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
                document.getElementById("penghuniForm").reset();
            }
        </script>
        <script>
            // JavaScript to set the "Awal Registrasi" field to the current timestamp
            document.addEventListener('DOMContentLoaded', function () {
                var currentDate = new Date().toISOString().split('T')[0];
                document.getElementById('tgl_registrasi').value = currentDate;
            });
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
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>
    </body>
</html>
