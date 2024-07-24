<?php 
    include "include/config.php";
    if (isset($_GET['hapus'])){
        $kodetravel = $_GET["hapus"];
        mysqli_query($connection, "delete from detailtravel where travelKODE = '$kodetravel'");
        echo "<script>alert('DATA BERHASIL DIHAPUS');
        document.location='detailtravel.php'</script>";
    }

?>