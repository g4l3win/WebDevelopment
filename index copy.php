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
  $kaoskaki = mysqli_query($connection, "select * from kaoskaki ORDER BY RAND()");
  $berita = mysqli_query($connection, "select * from winni ORDER BY RAND()");
  $olehhotel =  mysqli_query($connection, "select * from hotel d join souvenir s
    ON d.hotelKODE = s.destinasiKODE ");
  $destinasialter = mysqli_query($connection, "select * from destinasi d JOIN kategoriwisata_a a
  ON d.kategoriKODE = a.kategorikode");
  $coba = mysqli_query($connection, "select * from berita_a");
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.6.4.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8sh+Wy2F1BOtkWqE+0AI3s/Kf7J8Ldd3Bag2EG" crossorigin="anonymous"></script>
    <title>Frontend</title>

    <style>
    .scrollable-card-column {
        max-height: 600px; /* Atur tinggi maksimum  */
        overflow-y: auto;
    }
</style>
</head>
<body>
    <div class="container-fluid">
    <!-- navbar -->
<?php include 'ADMIN/INCLUDE/navbar.php';?>
  <!-- navbar -->
  <!-- carousel -->
        <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
            <div class="carousel-item active">
            <img src="ADMIN/images/th (1).jpg" class="d-block w-100" alt="fotohilang" style="filter: brightness(70%);">
            <div class="carousel-caption d-none d-md-block">
                <h1>Restoran</h1>
                <p>Aneka Kuliner dengan kearifan lokal.</p>
            </div>
            </div>
            <div class="carousel-item">
            <img src="ADMIN/images/candisari1.jpg" class="d-block w-100" alt="fotohilang">
            <div class="carousel-caption d-none d-md-block">
                <h5>Foto Candi Sari</h5>
                <p>Foto destinasi Wisata</p>
            </div>
            </div>
            <div class="carousel-item">
            <img src="ADMIN/images/outdoor-portrait-handsome-travel-man-with-back-pack-walking-rise-terrace-bali.jpg" class="d-block w-100" alt="fotohilang">
            <div class="carousel-caption d-none d-md-block">
                <h5>Foto Traveling Terasering</h5>
                <p>Solo traveling ke desa sangat seru</p>
            </div>
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
        </div>
        <br>
  <!-- akhir carousel -->
        <!-- berita -->
            <div class= "container" >
                <div class="row">
                    <div class= "col-sm-9 scrollable-card-column">
                      <?PHP 
                      if(mysqli_num_rows($destinasi)>0){
                        while ($row2 = mysqli_fetch_array($destinasi)){
                          $linkdestinasi = "D101.php?destinasi=" .urlencode($row2["destinasiKODE"]);
                      ?>
                        <div class="d-flex">
                            <div class="flex-shrink-0">
                                <img src ="ADMIN/images/<?php echo $row2["destinasiFOTO"];?>" alt="no image" style="width:110px; height:100px; margin-right:20px; margin-top:20px;">
                            </div>
                            <div class="flex-grow-1" style = "margin-top : 25px;">
                                <h5><?php echo $row2["destinasiNAMA"];?><small-class="text-muted" style = "font-size : 15px;"><i> <?PHP echo $row2["kategorinama"];?></i></small-class></h5> 
                                <p><?PHP echo substr($row2["destinasiKET"],0,250);?>...</p>
                                <a href="<?php echo $linkdestinasi;?>" class="btn btn-secondary">Read More</a>
                            </div>
                        </div>
                        <?PHP }}?>
                    </div><!--tutup kolom kiri-->
                    <div class="col-sm-3" style="margin-top:10px; margin-bottom:10px">
                      <?php 
                            // --------------------- PAGING -- MEMBUAT GANTI HALAMAN ---------------- >
                            $jumlahtampilan = 2;
                            $halaman = (isset($_GET['page']))? $_GET['page'] : 1;
                            $mulaitampilan = ($halaman - 1) * $jumlahtampilan;

                            // ----------------- AKHIR PAGING -- MEMBUAT GANTI HALAMAN ---------------- >
                            ?>
                      <?php 
                        $query = "SELECT * FROM restoran LIMIT $mulaitampilan, $jumlahtampilan";
                        $result = mysqli_query($connection, $query);
            
                        if(mysqli_num_rows($result) > 0) {
                            while($row = mysqli_fetch_array($result)) {
                        // if(mysqli_num_rows($gambarresto) > 0) {
                        // while($row = mysqli_fetch_array($gambarresto)){
                          ?>
                        <div class="card" style="width: 18rem;">
                          <img src="ADMIN/images/<?php echo $row["restoranFOTO"]; ?>" class="card-img-top" alt="tidak ada gambar">
                          <div class="card-body">
                            <h5 class="card-title"><?php echo $row["restoranNAMA"]; ?></h5>
                            <p class="card-text"><?php echo $row["restoranALAMAT"]; ?></p>
                            <!-- <a href="#" class="btn btn-primary">Go somewhere</a> -->
                          </div>
                        </div>
                        <?php } }?>
                         <!--------------------- PAGING -- MEMBUAT GANTI HALAMAN ---------------->
            <?php 
                $query = mysqli_query($connection, "SELECT * FROM restoran");
                $jumlahrecord = mysqli_num_rows($query);
                $jumlahpage = ceil($jumlahrecord/$jumlahtampilan);
            ?>

        <!-- TAMPILAN PADA HALAMAN PAGINATION INI DAPAT DIAMBIL DARI BOOTSTRAP 5 
		 PADA BAGIAN components -> pagination -->
         <nav aria-label="Page navigation example">
  <ul class="pagination">
    <li class="page-item"><a class="page-link" href="?page=<?php $nomorhal=1; echo $nomorhal?>">PERTAMA</a></li>
    <?php for($nomorhal=1; $nomorhal<=$jumlahpage; $nomorhal++)
    { ?>
    <li class="page-item">
      <?php 
      if($nomorhal!=$halaman)
      { ?>  
      <a class="page-link" href="?page=<?php echo $nomorhal?>"><?php echo $nomorhal?></a>
      <?php }
      else { ?>
      <a class="page-link" href="?page=<?php echo $nomorhal?>"><?php echo $nomorhal?></a>
    <?php } ?>
    </li>
    <?php } ?>
    <li class="page-item"><a class="page-link" href="?page=<?php echo $nomorhal-1?>">TERAKHIR</a></li>
  </ul>
</nav>

<!----------------- AKHIR PAGING -- MEMBUAT GANTI HALAMAN ---------------->
                    </div><!--tutup kolom kanan-->
                </div><!--tutup div row-->
            </div> <!--tutup container-->
        <!-- berita -->
        <div class="jumbotron jumbotron-fluid mb-5 row">
                <div class="container">
                    <h1 class="display-4" style = "text-align: center; margin-top :25px; margin-bottom:25px;">Ayo cek oleh-oleh hotel</h1>
            </div>
<!-- hotel join oleh oleh -->
<div class="row" >
  <div class= "col-sm-1"></div>
  <div class="accordion col-sm-10" id="accordionExample">
  
          <?php
                        if(mysqli_num_rows($olehhotel) > 0) {
                          $count = 1;
                        while ($row = mysqli_fetch_array($olehhotel)) {
                          ?>
      <div class="accordion-item">
        <h2 class="accordion-header" id="heading<?php echo $count; ?>">
          <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapse<?php echo $count; ?>" aria-expanded="true" aria-controls="collapse<?php echo $count; ?>">
            <?php echo $row['hotelNAMA'];?>
          </button>
        </h2>
        <div id="collapse<?php echo $count; ?>" class="accordion-collapse collapse show" aria-labelledby="heading<?php echo $count; ?>" data-bs-parent="#accordionExample">
          <div class="accordion-body">
            <strong>Menjual Oleh oleh  <?php echo $row['souvenirNAMA'];?> </strong> <?php echo $row['souvernirJENIS'];?>
          </div>
        </div>
      </div>
      <?php $count++;} } ?>

    </div>
  </div>
</div>
<!-- akhir hotel join oleh oleh -->
        <!-- gallery  -->
    <!-- Carousel wrapper -->
    <div id="carouselExample" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-inner py-4">
        <?php
        if (mysqli_num_rows($foto) > 0) {
            $itemCount = 0;
            $itemInARow = 3;
            while ($row = mysqli_fetch_array($foto)) {
                $linkdestinasi = "FO01.php?travel=" . urlencode($row["fotodestinasiKODE"]);
                if ($itemCount % $itemInARow == 0) {
                    echo '<div class="carousel-item';
                    echo $itemCount == 0 ? ' active' : '';
                    echo '"><div class="container"><div class="row">';
                }
                ?>
                <div class="col-lg-4 col-md-12 mb-4 mb-lg-0">
                    <div class="card">
                        <img src="ADMIN/images/<?php echo $row["fotodestinasiFILE"] ?>" class="card-img-top" alt="Boat on Calm Water" />
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $row["fotodestinasiNAMA"] ?></h5>
                            <p class="card-text"><?php echo substr($row["travelKET"], 0, 100); ?></p>
                            <a href="<?php echo $linkdestinasi; ?>" class="btn btn-primary">Read more</a>
                        </div>
                    </div>
                </div>
                <?php
                $itemCount++;
                if ($itemCount % $itemInARow == 0) {
                    echo '</div></div></div>'; // menutup carousel item, container dan row
                }
            }
            // kalau item ga sampai kelipatan 3, tetep tutup div jadi cuma tampil yang ada (ga sampai 3 bisa)
            if ($itemCount % $itemInARow != 0) {
                echo '</div></div></div>';
            }
        }
        ?>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
</div>

  <!-- gallery -->
  <!-- berita dan kaos kaki -->
  <div class="row">
            <div class="jumbotron jumbotron-fluid ">
                <div class="container">
                    <h1 class="display-4" style = "text-align: center; margin-top :25px; margin-bottom:25px;">Kaos kaki dan Berita terbaik</h1>
            </div>        
  </div>
  <div class="row">

    <!-- buat kaos kaki -->
    <div class="col-sm-3 scrollable-card-column">
                      <?php 
                        if(mysqli_num_rows($kaoskaki) > 0) {
                          while($row = mysqli_fetch_array($kaoskaki)){
                          ?>
    <div class="card text-dark bg-light">
      <div class="card-body">
        <h5 class="card-title"><?php echo $row["nama"];?><small-class="text-muted" style = "font-size : 15px;"><i> Rp <?PHP echo $row["harga"];?></i></small-class></h5>
        <p class="card-text"><?php echo $row["keterangan"];?></p>
      </div>
    </div>
    <br>
        <?php }}?>
    </div>
    <div class="col-sm-9 scrollable-card-column">
    <!-- buat berita -->
    <?php 
                        if(mysqli_num_rows($berita) > 0) {
                          while ($row = mysqli_fetch_array($berita)){
                          ?>
    <div class="card text-white bg-primary">
      <div class="card-header">
        <?php echo $row['beritaWinni'];?>
      </div>
      <div class="card-body">
        <blockquote class="blockquote mb-0">
          <p><?php echo $row['kategoriberita0002'];?></p>
          <footer class="blockquote-footer"><?php echo $row['event0002'];?></footer>
        </blockquote>
      </div>
    </div>
    <br>
    <?php } }?>
  </div>
</div><!-- akhir kaoskaki dan berita-->

<br>
<!-- footer -->
<?php include 'ADMIN/INCLUDE/footerindex.php'?>
  <!-- footer -->
</div> <!-- akhir container-->
</body>
<!-- java script -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script>
   $(document).ready(function () {
      $('#carouselExampleCaptions').carousel();
   });
</script>

</html>