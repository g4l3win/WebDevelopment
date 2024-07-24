<!doctype html>
<?php ob_start();?>
<?php include 'include/head.php';?>
    <body class="sb-nav-fixed">
        <?php include 'include/menunav.php';?>
        <div id="layoutSidenav">
            <?php include 'include/menu.php';?>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Daftar Kategori</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Rincian Kategori Wisata</li>
                        </ol>
<!--yang penting diatasnya form kalau mau bikin php untuk koneksi ke database-->
<?php
    include "include/config.php";
?>

<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" type = "text/css" href="bootstrap-5.0.2-dist/css/bootstrap.min.css">
    <link rel="stylesheet" type = "text/css" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css">
<!-- ini untuk bootstrap icon sampah -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css" integrity="sha384-b6lVK+yci+bfDmaY1u0zE8YYJt0TZxLEAFyYSLHId4xoVvsrQu3INevFKo+Xir8e" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <title> wisata jawa</title>
  </head>
  <body>
    <!-- ini adalah bagian kerja saya -->
    <div class="row">
        <div class ="col-sm-1"></div>
    <div class="col-sm-10">
  
        <br>
            <div class="jumbotron jumbotron-fluid mb-5 row">
                <div class="container">
                    <h1 class="display-4">Hasil Kategori Wisata</h1>
                </div>
            </div>
        <form method = "POST"> 
        <div class= "form-group row mb-2">
             <label for="search" class="col-sm-3">cari:</label>
                <div class="col-sm-6">
                    <input type="text" name ="search" class="form-control" id="search" value="<?php if(isset($_POST["search"])) {echo $_POST["search"];}?>"
                         placeholder="cari nama kategori">
                </div>
                <input type="submit" name="kirim" class="col-sm-1 btn btn-primary" value="Search">
        </div>
        </form>
        <!-- akhir dari pencarian  -->
        <table class="table table-dark table-hover">
                <thead>
                    <tr>
                    <th scope="col">No</th>
                    <th scope="col">Kode Kategori</th>
                    <th scope="col">Nama Kategori</th>
                    <th scope="col">Keterangan Kategori</th>
                    <th scope="col">Referensi Kategori</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    // --------------------- PAGING -- MEMBUAT GANTI HALAMAN ---------------- >
                        $jumlahtampilan = 3;
                        $halaman = (isset($_GET['page']))? $_GET['page'] : 1;
                        $mulaitampilan = ($halaman - 1) * $jumlahtampilan;

                    // ----------------- AKHIR PAGING -- MEMBUAT GANTI HALAMAN ---------------- >
                    ?>
                <?php 
                //dipanggil dan disimpan di sebuah array
                //$query = mysqli_query($connection, "select destinasi.* from destinasi");

                if (isset ($_POST["kirim"])){
                    $search = $_POST['search'];
                    $query = mysqli_query ($connection, "select kategoriwisata_a.* 
                    from kategoriwisata_a where kategorinama LIKE '%".$search."%'");
                }else {
                    //kalau enggak di search jalanin yang else
                    $query = mysqli_query($connection, "select kategoriwisata_a.* from kategoriwisata_a
                    limit $mulaitampilan, $jumlahtampilan");
                }



                //inisiasi nomor
                $nomor=1;
                    //mengambil satu satu baris yang ditampung di dalam variabel $row
                while($row = mysqli_fetch_array($query)){
            ?>
            <tr>
                    <!-- INI YANG BAKAL DIULANG 
                INI BAKAL DIPHP-in buat munculin yang ketemu pas searching-->
                        <td><?php echo $mulaitampilan + $nomor;?></td>
                        <td><?php echo $row['kategorikode'];?></td>
                        <td><?php echo $row['kategorinama'];?></td>
                        <td><?php echo $row['kategoriket'];?></td>
                        <td><?php echo $row['kategoriref'];?></td>
                   </tr>
            <?php $nomor=$nomor+1; ?>
            <?php }?>  <!-- INI PUNYA PHP JADI HARUS DIAPIT PHP     -->
                </tbody>
        </table>
             <!--------------------- PAGING -- MEMBUAT GANTI HALAMAN ---------------->
  <?php 
    $query = mysqli_query($connection, "SELECT * FROM kategoriwisata_a");
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
           
</div>
    </div>
    <!-- akhir kerja saya -->

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>
    -->
  </body>
  </div>
                </main>
                <?php include 'include/footer.php';?>
            </div>
        </div>
       <?php include 'include/jsscript.php';?>
  <?php ob_end_flush(); ?>
</html>