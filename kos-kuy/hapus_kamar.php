<?php
    require 'function.php';
    require 'cek.php';

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Check if the 'idkamarhapus' index is set in the $_POST array
        if (isset($_POST['idkamarhapus'])) {
            $id_kamar_to_delete = $_POST['idkamarhapus'];

            // Perform the delete operation based on $id_kamar_to_delete
            $deleteQuery = "DELETE FROM data_kamar WHERE id_kamar = $id_kamar_to_delete";
            mysqli_query($conn, $deleteQuery);

            // Redirect to the data_kamar.php page after deletion
            header("Location: data_kamar.php");
            exit();
        } else {
            // Handle the case where 'idkamarhapus' is not set
            echo "Error: 'idkamarhapus' is not set.";
        }
    }
?>
