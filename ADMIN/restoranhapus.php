<?php 
    include "include/config.php";
    if (isset($_GET['hapusfoto'])){
        $koderesto = $_GET["hapusfoto"];
        mysqli_query($connection, "delete from restoran where restoranKODE = '$koderesto'");
        echo "<script>alert('DATA BERHASIL DIHAPUS');
        document.location='restoran.php'</script>";
    }
?>