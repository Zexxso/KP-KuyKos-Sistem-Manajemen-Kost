<?php
    session_start();
//membuat koneksi ke db
$conn = mysqli_connect("localhost", "root", "", "kuy-kos");

//membuat kamar baru
if(isset($_POST['addnewkamar'])){
    $id_kamar = $_POST["id_kamar"];
    $lantaikamar = $_POST["lantaikamar"];
    $hargakamar = $_POST["hargakamar"];
    $tipe_kamar = $_POST["tipe_kamar"];
    $fasilitaskamar = $_POST["fasilitaskamar"];

    $addtotable = mysqli_query($conn, "INSERT INTO data_kamar (id_kamar, lantaikamar, hargakamar, tipe_kamar, fasilitaskamar) VALUES ('$id_kamar', '$lantaikamar', '$hargakamar','$tipe_kamar','$fasilitaskamar')");

    if($addtotable){
        header('location:data_kamar.php');
    } else {
        echo "<div class=alert alert-success>
        <strong>Success!</strong> Indicates a successful or positive action.
      </div>";
        header('location:data_kamar.php');  

    }  
}

//membuat data penghuni
if(isset($_POST['addnewpenghuni'])){
    $nama_penghuni = $_POST["nama_penghuni"];
    $no_hp = $_POST["no_hp"];
    $no_ktp = $_POST["no_ktp"];
    $asal_kota = $_POST["asal_kota"];
    $tgl_registrasi = $_POST["tgl_registrasi"];
    $id_kamar = $_POST["id_Kamar"];
    $tgl_keluar = $_POST["tgl_keluar"];


    $addtotable = mysqli_query($conn, "INSERT INTO data_penghuni (nama_penghuni, id_kamar, no_hp, no_ktp, asal_kota, tgl_registrasi, tgl_keluar) VALUES('$nama_penghuni','$id_kamar','$no_hp','$no_ktp','$asal_kota','$tgl_registrasi','$tgl_keluar')");
    if($addtotable){
        header('location:data_penghuni.php');
    } else {
        echo "<div class=alert alert-success>
        <strong>Success!</strong> Indicates a successful or positive action.
      </div>";
        header('location:data_penghuni.php');  

    }  

}
//membuat data tagihan
if(isset($_POST['tambahpembayaran'])){
    $id_kamar = $_POST["id_kamar"];
    $id_penghuni = $_POST["id_penghuni"];
    $nama_penghuni = $_POST["nama_penghuni"];
    $no_hp = $_POST["no_hp"];
    $no_ktp = $_POST["no_ktp"];
    $tgl_registrasi = $_POST["tgl_registrasi"];
    $tgl_keluar = $_POST["tgl_keluar"];
    $hargakamar = $_POST["hargakamar"];
    $jumlah = $_POST["jumlah"];
    $jumlah_uang = $_POST["jumlah_uang"];
    $keterangan = $_POST["keterangan"];


    $addtotable = mysqli_query($conn, "INSERT INTO data_tagihan (nama_penghuni, id_kamar, id_penghuni, hargakamar, jumlah_uang, jumlah_total, tgl_registrasi, tgl_keluar, keterangan) VALUES('$nama_penghuni','$id_kamar','$id_penghuni','$hargakamar','$jumlah_uang','$jumlah','$tgl_registrasi','$tgl_keluar','$keterangan')");
    if($addtotable){
        header('location:data_tagihan.php');
    } else {
        echo "<div class=alert alert-success>
        <strong>Success!</strong> Indicates a successful or positive action.
      </div>";
        header('location:data_tagihan.php');  

    }  

}

if(isset($_POST['addnewpenghunikasir'])){
    $nama_penghuni = $_POST["nama_penghuni"];
    $no_hp = $_POST["no_hp"];
    $no_ktp = $_POST["no_ktp"];
    $asal_kota = $_POST["asal_kota"];
    $tgl_registrasi = $_POST["tgl_registrasi"];
    $id_kamar = $_POST["id_Kamar"];
    $tgl_keluar = $_POST["tgl_keluar"];


    $addtotable = mysqli_query($conn, "INSERT INTO data_penghuni (nama_penghuni, id_kamar, no_hp, no_ktp, asal_kota, tgl_registrasi, tgl_keluar) VALUES('$nama_penghuni','$id_kamar','$no_hp','$no_ktp','$asal_kota','$tgl_registrasi','$tgl_keluar')");
    if($addtotable){
        header('location:data_penghuni_kasir.php');
    } else {
        echo "<div class=alert alert-success>
        <strong>Success!</strong> Indicates a successful or positive action.
      </div>";
        header('location:data_penghuni_kasir.php');  

    }  

}

?>