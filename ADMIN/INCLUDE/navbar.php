<?PHP 
  include "ADMIN/INCLUDE/config.php";

  $destinasi = mysqli_query($connection, "select * from destinasi_a d JOIN kategoriwisata_a a
   ON d.kategoriKODE = a.kategorikode");
  $hotel = mysqli_query($connection, "select * from destinasi_a");
  $kategori = mysqli_query($connection, "select * from kategoriwisata_a");
  
  $restoran = mysqli_query ($connection, "select * from travel");
  $gambarresto = mysqli_query($connection, "select * from restoran ORDER BY RAND()");
  $kaoskaki = mysqli_query($connection, "select * from kaoskaki ORDER BY RAND()");
  $berita = mysqli_query($connection, "select * from winni ORDER BY RAND()");
  $olehhotel =  mysqli_query($connection, "select * from hotel d join souvenir s
    ON d.hotelKODE = s.destinasiKODE ");
?>

<style>
  nav {
    background-color: #C76D7E; /* Warna latar belakang yang diinginkan */
  }
</style>
<!-- navbar -->
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid" >
        <a class="navbar-brand" href="#">Tugas UAS</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="index.php">Home</a>
            </li>
            <!-- <li class="nav-item">
            <a class="nav-link" href="#">Link</a>
            </li> -->
            <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Destinasi
            </a>
            
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
              <?php if(mysqli_num_rows($hotel)>0) {
              while ($row = mysqli_fetch_array($hotel))
              { $linkdestinasi = "D101.php?destinasi=" .urlencode($row["destinasiKODE"]);
                
                $destinasiNAMA = $row["destinasiNAMA"];
                ?>
                <li><a class="dropdown-item" href="<?php echo $linkdestinasi ?>"><?php echo $destinasiNAMA;?></a></li>
              <?php } } ?>
                <!-- <li><a class="dropdown-item" href="#">Another action</a></li>
                <li><hr class="dropdown-divider"></li>
                <li><a class="dropdown-item" href="#">Something else here</a></li> -->
            </ul>
            
            </li>
            <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Kategori wisata
            </a>
            
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
              <?php if(mysqli_num_rows($kategori)>0) {
              while ($row = mysqli_fetch_array($kategori))
              {$linkdestinasi = "K101.php?kategori=" .urlencode($row["kategorikode"]);
               
                $kategorinama = $row["kategorinama"];
                ?>
                <li><a class="dropdown-item" href="<?php echo $linkdestinasi; ?>"><?php echo $kategorinama;?></a></li>
              <?php } } ?>
            </ul>
            
            </li>
            <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
               Foto Travel
            </a>
            
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
              <?php if(mysqli_num_rows($restoran)>0) {
              while ($row = mysqli_fetch_array($restoran))
              {$linkdestinasi = "FO01.php?travel=" .urlencode($row["fotodestinasiKODE"]);
                $fotonama = $row["fotodestinasiNAMA"];
                ?>
                <li><a class="dropdown-item" href="<?php echo $linkdestinasi; ?>"><?php echo $fotonama;?></a></li>
              <?php } } ?>
            </ul>
            
        </ul>
        <!-- <form class="d-flex">
            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success" type="submit">Search</button>
        </form> -->
        </div>
    </div>
    </nav>
  <!-- navbar -->