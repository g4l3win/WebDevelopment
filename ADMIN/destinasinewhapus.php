<?php 
    include "include/config.php";
    if (isset($_GET['hapusfoto'])){
        $kodedestinasi = $_GET["hapusfoto"];
        mysqli_query($connection, "delete from destinasi_a where destinasiKODE = '$kodedestinasi'");
        echo "<script>alert('DATA BERHASIL DIHAPUS');
        document.location='destinasinew.php'</script>";
    }

?>