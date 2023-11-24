<?php
    require 'function.php';
    require 'cek.php';

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Check if the 'idpembayaranhapus' index is set in the $_POST array
        if (isset($_POST['idpembayaranhapus'])) {
            $id_pembayaran_to_delete = $_POST['idpembayaranhapus'];

            // Perform the delete operation based on $id_pembayaran_to_delete
            $deleteQuery = "DELETE FROM data_tagihan WHERE id_pembayaran = ?";
            
            // Use prepared statement to prevent SQL injection
            $stmt = mysqli_prepare($conn, $deleteQuery);
            
            if ($stmt) {
                // Bind the parameter to the statement
                mysqli_stmt_bind_param($stmt, "i", $id_pembayaran_to_delete);

                // Execute the statement
                mysqli_stmt_execute($stmt);

                // Close the statement
                mysqli_stmt_close($stmt);

                // Redirect to the data_tagihan.php page after deletion
                header("Location: data_tagihan.php");
                exit();
            } else {
                // Handle the case where the prepared statement fails
                echo "Error: Failed to prepare the delete statement.";
            }
        } else {
            // Handle the case where 'idpembayaranhapus' is not set
            echo "Error: 'idpembayaranhapus' is not set.";
        }
    }
?>
