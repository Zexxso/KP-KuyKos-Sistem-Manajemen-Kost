<?php
require 'function.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Data Riwayat Pembayaran</title>
    <style>
        @media print {
            /* Define your print styles here */
            table {
                width: 100%;
                border-collapse: collapse;
                margin-bottom: 10px;
                page-break-inside: auto; /* Avoid breaking the table across pages */
                margin-top: 200px; /* Add margin to the top of the table */
            }

            th, td {
                border: 1px solid #ddd;
                padding: 8px;
                text-align: left;
                page-break-inside: avoid; /* Avoid breaking rows across pages */
            }

            thead {
                background-color: #f2f2f2;
            }

            /* Define styles for the header and footer */
            #header {
                position: fixed;
                top: 0;
                left: 0;
                width: 100%;
                background-color: #f2f2f2;
                padding: 0px; /* Add padding to the header */
                text-align: center;
                display: flex;
                align-items: center;
                font-family: Arial;
                border-bottom: 2px solid #000; /* Add a black border as the line */
            }

            #header img {
                max-height: 150px; /* Set the maximum height for the logo */
                margin-right: 20px; /* Add margin to the right of the logo */
                margin-left: -50px;
            }

            #header h1{
                margin-right: 10px;
                margin-left: -150px;
            }

            #header h4 {
                margin-right: 10px;
                margin-left: -100px;
            }

            #footer {
                position: fixed;
                bottom: 0;
                left: 0;
                width: 100%;
                background-color: #f2f2f2;
                padding: 10px;
                text-align: left;
                border-top: 2px solid #000; /* Add a black border as the line */
            }

            #signature {
                position: fixed;
                bottom: 200px; /* Adjust the distance from the bottom */
                left: 70%;
                width: 150px; /* Adjust the width of the signature area */
            }

        }
    </style>
</head>
<body>

    <!-- Header for the printed page -->
    <div id="header">
        <img src="logo_koskuy.png" alt="Your Logo">
        <div>
            <h1>KUY KOS</h1>
            <h4>JL.RAHMANIYA NO.4 BLOK 11 KECAMATAN CILALENUNGKA KABUPATEN SORABU KODE POS:177013</h4>
        </div>
    </div>

    <?php
    $ambilsemuadatatagihan = mysqli_query($conn, "SELECT * FROM data_tagihan");
    $total_rows = mysqli_num_rows($ambilsemuadatatagihan); // Count the total number of rows
    $total_income = 0; // Initialize total income variable
    $i = 1;
    ?>

    <!-- Start printing the table -->
    <table>
    <caption style="font-size: 20px; font-weight: bold; padding: 20px; font-family: Arial;">REKAPITULASI RIWAYAT PEMBAYARAN KOST</caption>
        <thead>
            <tr>
                <th>No.</th>
                <th>No.Kamar</th>
                <th>Nama</th>
                <th>Tanggal Masuk</th>
                <th>Tanggal Keluar</th>
                <th>Tagihan Per Bulan</th>
                <th>Jumlah Yang Harus DiBayar</th>
                <th>Keterangan</th>
            </tr>
        </thead>
        <tbody>

    <?php
    while ($data = mysqli_fetch_array($ambilsemuadatatagihan)) {
        $nama_penghuni = $data['nama_penghuni'];
        $jumlah_uang = $data['jumlah_uang'];
        $tgl_registrasi = $data['tgl_registrasi'];
        $tgl_keluar = $data['tgl_keluar'];
        $id_kamar = $data['id_kamar'];
        $keterangan = $data['keterangan'];
        $hargakamar = $data['hargakamar'];
        $jumlah_total = $data['jumlah_total'];

        // Accumulate the total income
        $total_income += $jumlah_total;

        echo "<tr>
                <td>$i</td>
                <td>$id_kamar</td>
                <td>$nama_penghuni</td>
                <td>$tgl_registrasi</td>
                <td>$tgl_keluar</td>
                <td>Rp " . number_format($hargakamar) . "</td>
                <td>Rp " . number_format($jumlah_total) . "</td>
                <td>$keterangan</td>
              </tr>";

        $i++;
    }
    ?>

    <!-- End the table -->
    </tbody></table>
    <p>Jumlah Data: <?php echo $total_rows; ?></p> <!-- Display the total number of rows -->
    <p><b>Perkiraan Total Penghasilan: Rp <?php echo number_format($total_income); ?></p></b> <!-- Display the total income -->

    <!-- Signature area -->
    <div id="signature">
        <p>Pemilik Kos</p><br><br><br>
        <p>________________________</p>
    </div>

    <!-- Footer for the printed page -->
    <div id="footer">
        <p><i>Kuy Kos - Copyright 2023</i></p>
    </div>

    <script>
        // Automatically trigger the print dialog when the page loads
        window.onload = function () {
            window.print();
            window.onafterprint = function () {
                window.location.href = 'data_tagihan.php'; // Redirect back to the original page after printing
            };
        };
    </script>
</body>
</html>
