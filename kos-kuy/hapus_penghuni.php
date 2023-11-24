<?php
    require 'function.php';
    require 'cek.php';

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Check if the 'idpenghunihapus' index is set in the $_POST array
        if (isset($_POST['idpenghunihapus'])) {
            $id_penghuni_to_delete = $_POST['idpenghunihapus'];

            // Perform the delete operation based on $id_penghuni_to_delete
            $deleteQuery = "DELETE FROM data_penghuni WHERE id_penghuni = $id_penghuni_to_delete";
            mysqli_query($conn, $deleteQuery);

            // Redirect to the data_penghuni.php page after deletion
            header("Location: data_penghuni.php");
            exit();
        } else {
            // Handle the case where 'idpenghunihapus' is not set
            echo "Error: 'idpenghunihapus' is not set.";
        }
    }
?>
