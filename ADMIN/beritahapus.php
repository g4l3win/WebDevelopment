<?php 
    include "include/config.php";
    if (isset($_GET['hapus'])){
        $kode0002 = $_GET["hapus"];
        mysqli_query($connection, "delete from winni where berita0002 = '$kode0002'");
        echo "<script>alert('DATA BERHASIL DIHAPUS');
        document.location='berita.php'</script>";
    }
?>