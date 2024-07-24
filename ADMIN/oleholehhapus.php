<?php 
    include "include/config.php";
    if (isset($_GET['hapus'])){
        $kodeoleh = $_GET["hapus"];
        mysqli_query($connection, "delete from souvenir where souvenirKODE = '$kodeoleh'");
        echo "<script>alert('DATA BERHASIL DIHAPUS');
        document.location='oleholeh.php'</script>";
    }
?>