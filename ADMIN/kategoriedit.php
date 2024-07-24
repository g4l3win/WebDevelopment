<!doctype html>
<?php 
ob_start();?>
<!--yang penting diatasnya form kalau mau bikin php untuk koneksi ke database-->
<?php include 'include/head.php';?>
    <body class="sb-nav-fixed">
        <?php include 'include/menunav.php';?>
        <div id="layoutSidenav">
            <?php include 'include/menu.php';?>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Dashboard Kategori</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Dashboard Kelola Kategori</li>
                        </ol>
<?php
    include "include/config.php";
    //ingin tahu apakah ada atribut yang dikirim di sini. METODE KIRIM bisa POST, GET ATAU REQUEST
    if(isset($_POST['edit'])){
        //BIAR G BINGUNG DISAMAIN SAMA ATRIBUT DI DATABASE
        $kategoriKODE = $_POST["inputkategorikode"];
        $kategoriNAMA = $_POST["inputkategorinama"];
        $kategoriKET = $_POST["inputkategoriket"];
        $kategoriREFERENCE = $_POST["inputkategoriref"];

        //update DI TABEL KATEGORI WISATA
        mysqli_query($connection, "update kategoriwisata_a set kategorinama = '$kategoriNAMA', 
        kategoriket = '$kategoriKET', 
        kategoriref = '$kategoriREFERENCE'
        where kategorikode = '$kategoriKODE'");
        header("location:dashboardkategoriwisata.php");//kalau sudah dientri bisa memanggil lagi ke file inputkategori.php
    }
    $datakategori = mysqli_query($connection, "select * from kategoriwisata_a");
    $kodekategori = $_GET['ubah'];
    $editkategori = mysqli_query($connection, "select * from kategoriwisata_a where kategorikode = '$kodekategori'");
    $rowedit = mysqli_fetch_array($editkategori);
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
     
    <div class="col-sm-1"></div>
    <div class="col-sm-10">
        <form method="POST"><!--KIRIM FORM PAKAI METODE POST-->
        <div class="form-group row mb-3">
            <!-- col sm 2 mengatur lebar 2 kolom -->
            <label for="kategorikode" class="col-sm-3 col-form-label">kategori Kode : </label>
                <div class="col-sm-7"><!-- colom lebar 10-->
                    <input type="text" class="form-control" id="kategorikode" name="inputkategorikode" placeholder="inputkan kode kategori"
                    value="<?php echo $rowedit["kategorikode"];?>" read only>
                    <!--apa yang kita input di form akan disimpan ke inputkategorikode-->
                </div>
        </div>
        <div class="form-group row mb-3">
            <!-- col sm 2 mengatur lebar 2 kolom -->
            <label for="kategorinama" class="col-sm-3 col-form-label">kategori Nama : </label>
                <div class="col-sm-7"><!-- colom lebar 10-->
                    <input type="text" class="form-control" id="kategorinama" name="inputkategorinama" placeholder="inputkan nama kategori"
                    value="<?php echo $rowedit["kategorinama"];?>">
                </div>
        </div>
        <div class="form-group row mb-3">
            <!-- col sm 2 mengatur lebar 2 kolom -->
            <label for="kategoriket" class="col-sm-3 col-form-label">Keterangan kategori  : </label>
                <div class="col-sm-7"><!-- colom lebar 10-->
                    <input type="text" class="form-control" id="kategoriket" name="inputkategoriket" placeholder="inputkan keterangan kategori"
                    value="<?php echo $rowedit["kategoriket"];?>">
                </div>
        </div>
        <div class="form-group row mb-3">
            <!-- col sm 2 mengatur lebar 2 kolom -->
            <label for="kategoriref" class="col-sm-3 col-form-label">referensi kategori  : </label>
                <div class="col-sm-7"><!-- colom lebar 10-->
                    <input type="text" class="form-control" id="kategoriref" name="inputkategoriref" placeholder="inputkan referensi kategori"
                    value="<?php echo $rowedit["kategoriref"];?>">
                </div>
        </div>
        <div class="form-group row">
            <div class="col-sm-3"></div>
            <div class="col-sm-9">
                <button type="submit" class="btn btn-secondary" value="Ubah" name="edit">Ubah</button>
                <input type="reset" class="btn btn-success" value="Batal" name="batal">
        
            </div>
        </div>
        </form>
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
                    <th colspan="2" style="text-align:center;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                <?php 
                //dipanggil dan disimpan di sebuah array
                //$query = mysqli_query($connection, "select destinasi.* from destinasi");

                if (isset ($_POST["kirim"])){
                    $search = $_POST['search'];
                    $query = mysqli_query ($connection, "select kategoriwisata_a.* 
                    from kategoriwisata_a where kategorinama LIKE '%".$search."%'");
                }else {
                    //kalau enggak di search jalanin yang else
                    $query = mysqli_query($connection, "select kategoriwisata_a.* from kategoriwisata_a");
                }



                //inisiasi nomor
                $nomor=1;
                    //mengambil satu satu baris yang ditampung di dalam variabel $row
                while($row = mysqli_fetch_array($query)){
            ?>
            <tr>
                    <!-- INI YANG BAKAL DIULANG 
                INI BAKAL DIPHP-in buat munculin yang ketemu pas searching-->
                        <td><?php echo $nomor;?></td>
                        <td><?php echo $row['kategorikode'];?></td>
                        <td><?php echo $row['kategorinama'];?></td>
                        <td><?php echo $row['kategoriket'];?></td>
                        <td><?php echo $row['kategoriref'];?></td>
                        <td width="5px">
                            <a href="kategoriedit.php?ubah=<?php echo $row["kategorikode"]?>" class="btn btn-success btn-sm" title="EDIT">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                            <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                            <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                            </svg>
                            </a>
                        </td>
                        <td width="5px">
                            <!-- kalau pake ini link nya harus selalu terkoneksi pake internet -->
                            <a href="kategorihapus.php?hapus=<?php echo $row["kategorikode"]?>" class="btn btn-danger btn-sm" title="HAPUS">
                            <i class="bi bi-trash"></i>
                            </a>
                        </td>
                        
                   </tr>
            <?php $nomor=$nomor+1; ?>
            <?php }?>  <!-- INI PUNYA PHP JADI HARUS DIAPIT PHP     -->
                </tbody>
        </table>

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
  <?php 
        //mysqli_close($connection);
        ob_end_flush();
    ?>
</html>