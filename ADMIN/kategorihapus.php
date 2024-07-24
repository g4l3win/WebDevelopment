<?php 
    include "include/config.php";
    if (isset($_GET['hapus'])){
        $kodekate = $_GET["hapus"];
        mysqli_query($connection, "delete from kategoriwisata_a where kategorikode = '$kodekate'");
        echo "<script>alert('DATA BERHASIL DIHAPUS');
        document.location='dashboardkategoriwisata.php'</script>";
    }

?>