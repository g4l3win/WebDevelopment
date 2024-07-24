<!DOCTYPE html>
<?PHP 
  include "ADMIN/INCLUDE/config.php";

  $destinasi = mysqli_query($connection, "select * from destinasi_a d JOIN kategoriwisata_a a
   ON d.kategoriKODE = a.kategorikode");
  $hotel = mysqli_query($connection, "select * from destinasi_a");
  $kategori = mysqli_query($connection, "select * from kategoriwisata_a");
  $foto = mysqli_query($connection, "select * from travel t JOIN detailtravel d
  ON t.travelKODE = d.travelKODE where fotodestinasiKODE = 'FO01'");
  $restoran = mysqli_query ($connection, "select * from travel");
  
  if(isset($_GET['travel'])){
    $pilihtravel = urldecode($_GET['travel']);
    //query untuk dapat data yang di select
    $query = "select * from travel t JOIN detailtravel d
    ON t.travelKODE = d.travelKODE where fotodestinasiKODE = '$pilihtravel'";
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
  <div class="card mb-3">
  <img src="ADMIN/images/<?php echo $row['fotodestinasiFILE'];?>" class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title"><?php echo $row['fotodestinasiNAMA'];?></h5>
    <p class="card-text"><?php echo $row['travelKET'];?></p>
    <p class="card-text"><small class="text-muted"><?php echo $row['travelNAMA'];?></small></p>
  </div>
  </div>
  <?php } } ?>
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