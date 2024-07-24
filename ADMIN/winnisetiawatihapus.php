<?php 
    include "include/config.php";
    if (isset($_GET['hapus'])){
        $winniID = $_GET["hapus"];
        mysqli_query($connection, "delete from winnisetiawati where winniID = '$winniID'");
        echo "<script>alert('DATA BERHASIL DIHAPUS');
        document.location='winnisetiawati.php'</script>";
    }
?>