<?php 
    include "include/config.php";
    if (isset($_GET['hapus'])){
        $kodekaoskaki = $_GET["hapus"];
        mysqli_query($connection, "delete from kaoskaki where kode = '$kodekaoskaki'");
        echo "<script>alert('DATA BERHASIL DIHAPUS');
        document.location='kaoskaki.php'</script>";
    }

?>