<?php
// Include database connection file
include_once("koneksi.php");

if(isset($_GET['nis'])) {
    $nis = $_GET['nis'];
    
    // Delete user data from table
    $result = mysqli_query($mysqli, "DELETE FROM tb_siswa WHERE nis='$nis'");

    if ($result) {
        header("location: index.php");
    } else {
        echo "Error deleting record: " . $mysqli->error;
    }
}
?>
