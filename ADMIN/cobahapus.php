<?php 
    include "include/config.php";
    if (isset($_GET['hapus'])){
        $kode = $_GET["hapus"];
        mysqli_query($connection, "delete from berita_a where kodeberita = '$kode'");
        echo "<script>alert('DATA BERHASIL DIHAPUS');
        document.location='coba.php'</script>";
    }
?>