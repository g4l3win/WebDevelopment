<!DOCTYPE html>
<?PHP 
  include "ADMIN/INCLUDE/config.php";

  $destinasi = mysqli_query($connection, "select * from destinasi_a d JOIN kategoriwisata_a a
   ON d.kategoriKODE = a.kategorikode");
  $hotel = mysqli_query($connection, "select * from destinasi_a");
  $kategori = mysqli_query($connection, "select * from kategoriwisata_a");
  $foto = mysqli_query($connection, "select * from travel t JOIN detailtravel d
  ON t.travelKODE = d.travelKODE");
  $restoran = mysqli_query ($connection, "select * from travel");
  $candisarihobi = mysqli_query($connection, " select * from destinasi_a d JOIN kategoriwisata_a a
  ON d.kategoriKODE = a.kategorikode");

  if(isset($_GET['destinasi'])){
    $pilihdestinasi = urldecode($_GET['destinasi']);
    //query untuk dapat data yang di select
    $query = "select * from destinasi_a d JOIN kategoriwisata_a a
    ON d.kategoriKODE = a.kategorikode where destinasiKODE ='$pilihdestinasi'";
    $pilihdata = mysqli_query ($connection, $query);
  }
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
    <div class="container-fluid">
    <!-- navbar -->
    <?php include 'ADMIN/INCLUDE/navbar.php';?>
  <!-- navbar -->
  <!-- carousel -->
  <br>
  <div class="row">
  <?php if(mysqli_num_rows($pilihdata)>0) {
              while ($row = mysqli_fetch_array($pilihdata))
              {?>
      <div class="card col-mb-11" >
        <div class="row g-0">
          <div class="col-md-5">
            <img src="ADMIN/images/<?php echo $row['destinasiFOTO'];?>" class="img-fluid rounded-start" alt="Foto Candi Sari">
          </div>
          <div class="col-md-7">
            <div class="card-body">
              <h5 class="card-title"><?php echo $row["destinasiNAMA"];?> <small class="text-muted">Kategori <?php echo $row["kategorinama"];?></small></h5>
              <p class="card-text"><b>Keterangan destinasi : </b><?php echo $row["destinasiKET"];?></p>
              <p class="card-text"><b>Keterangan kategori : </b><?php echo $row["kategoriket"];?></p>
            </div>
          </div>
        </div>
      </div>
    <?php }} ?>
  </div>
<br>
  <!-- footer -->
<?php include 'ADMIN/INCLUDE/footerindex.php'?>
  <!-- footer -->
</div> <!-- akhir container-->
</body>
<!-- java script -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</html>