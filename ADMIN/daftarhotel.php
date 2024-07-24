<!DOCTYPE html>
<?php ob_start();?>
<?php include 'include/head.php';?>
    <body class="sb-nav-fixed">
        <?php include 'include/menunav.php';?>
        <div id="layoutSidenav">
            <?php include 'include/menu.php';?>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Daftar Hotel</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">List Hotel yang Ada</li>
                        </ol>
<?php 
include "include/config.php";
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hotel</title>
    <link rel="stylesheet" type = "text/css" href="bootstrap-5.0.2-dist/css/bootstrap.min.css">
    <link rel="stylesheet" type = "text/css" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css">
    <!-- ini untuk bootstrap icon sampah -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css" integrity="sha384-b6lVK+yci+bfDmaY1u0zE8YYJt0TZxLEAFyYSLHId4xoVvsrQu3INevFKo+Xir8e" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <!-- link yang kita pakai adalah link css, memberitahu browser bahwa link yang kita panggil adalah css -->
</head>
<body>
    <!-- dibuat 1 class kolom kosong sebelum form -->
    <div class="row">
        <div class="col-sm-1"></div>

        <div class="col-sm-10">
    <!-- hasil -->
            <br>
            <div class="jumbotron jumbotron-fluid mb-5 row">
                <div class="container">
                    <h1 class="display-4">Hasil Hotel</h1>
            </div>
            </div>

            <!-- untuk membuat form pencarian data -->

                <form method = "POST"> 
                    <div class= "form-group row mb-2">
                        <label for="search" class="col-sm-3">cari Nama:</label>
                        <div class="col-sm-6">
                            <input type="text" name ="search" class="form-control" id="search" value="<?php if(isset($_POST["search"])) {echo $_POST["search"];}?>"
                            placeholder="cari nama Hotel">
                        </div>
                        <input type="submit" name="kirim" class="col-sm-1 btn btn-primary" value="Search">
                    </div>
                    <div class= "form-group row mb-2">
                        <label for="cari" class="col-sm-3">cari Alamat:</label>
                        <div class="col-sm-6">
                            <input type="text" name ="cari" class="form-control" id="cari" value="<?php if(isset($_POST["cari"])) {echo $_POST["cari"];}?>"
                            placeholder="cari alamat Hotel">
                        </div>
                        <input type="submit" name="send" class="col-sm-1 btn btn-primary" value="Search">
                    </div>
                </form>

            <!-- akhir dari pencarian  -->

            <table class="table table-dark table-hover">
                <thead>
                    <tr>
                    <th scope="col">No</th>
                    <th scope="col">Kode Hotel</th>
                    <th scope="col">Nama Hotel</th>
                    <th scope="col">Alamat Hotel</th>
                    <th scope="col">Kode Kategori</th>
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
                    <!-- kode php menampilkan data kalau mau menyisipkan kode php karena isinya dari table, tag html td enggak bisa hilang
            maka si php harus ada diatara tag td. jangan lupa dimana buka dan dimana tutup tag phpnya
            php untuk menampilkan yang ada di dalam tbody-->
            <?php 
                //dipanggil dan disimpan di sebuah array
                //$query = mysqli_query($connection, "select destinasi.* from destinasi");

                if (isset ($_POST["kirim"])){
                    $search = $_POST['search'];
                    $query = mysqli_query ($connection, "select * 
                    from hotel, kategoriwisata_a where hotelNAMA LIKE '%".$search."%'
                    and kategoriwisata_a.kategorikode = hotel.kategoriKODE");
                } else if (isset ($_POST["send"])){
                    $cari = $_POST['cari'];
                    $query = mysqli_query ($connection, "select * 
                    from hotel, kategoriwisata_a where hotelALAMAT LIKE '%".$cari."%'
                    and kategoriwisata_a.kategorikode = hotel.kategoriKODE");
                }
                else {
                    //kalau enggak di search jalanin yang else
                    $query = mysqli_query($connection, "select * from hotel, kategoriwisata_a
                    where kategoriwisata_a.kategorikode = hotel.kategoriKODE
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
                        <td><?php echo $row['hotelKODE'];?></td>
                        <td><?php echo $row['hotelNAMA'];?></td>
                        <td><?php echo $row['hotelALAMAT'];?></td>
                        <td><?php echo $row['kategorinama'];?></td>
                   </tr>
            <?php $nomor=$nomor+1; ?>
            <?php }?>  <!-- INI PUNYA PHP JADI HARUS DIAPIT PHP     -->
                </tbody>
                </table>
                    <!--------------------- PAGING -- MEMBUAT GANTI HALAMAN ---------------->
                <?php 
                    $query = mysqli_query($connection, "SELECT * FROM hotel");
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

        </div><!--penutup div class col-sm -10-->
    </div> <!--penutup div class row-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
    <script >
        $(document).ready(function(){
            $('#kodekategori').select2({//disesuaikan nama atribut di form
                closeOnSelect:true,
                allowClear:true,
                placeholder:"Pilih kategori wisata"
            });
        });
    </script>
</div>
                </main>
                <?php include 'include/footer.php';?>
            </div>
        </div>
       <?php include 'include/jsscript.php';?>
       <?php ob_end_flush();?>
</body>
</html>