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
                        <h1 class="mt-4">Kelola Data Travel</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Kelola data macam macam jenis traveling</li>
                        </ol>
<?php 
include "include/config.php";
//ingin tahu apakah ada atribut yang dikirim di sini. METODE KIRIM bisa POST, GET ATAU REQUEST
if(isset($_POST['simpan'])){
    //BIAR G BINGUNG DISAMAIN SAMA ATRIBUT DI DATABASE
    $kodetravel = $_POST["kodetravel"];
    $namatravel = $_POST["namatravel"];
    $keterangantravel = $_POST["kettravel"];

    //SIMPAN DI TABEL KATEGORI WISATA
    mysqli_query($connection, "insert into detailtravel values ('$kodetravel', '$namatravel', '$keterangantravel')");//kalau kuery harus 1 doang
    header("location:detailtravel.php");//kalau sudah dientri bisa memanggil lagi ke file destinasi.php
    
}
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Destinasi</title>
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
    <!-- form input -->
            <form method="POST">
                <!-- mb 3 itu membuat 3 baris space paling banyak cuma 5-->
                <div class="mb-3 row">
                    <label for="kodetravel" class="col-sm-2 col-form-label">Kode Travel</label>
                        <div class="col-sm-10">
                        <input type="text" class="form-control" name="kodetravel" id="kodetravel" maxlength="4" placeholder="masukkan kode travel">
                        </div>
                </div>
                <div class="mb-3 row">
                    <label for="namatravel" class="col-sm-2 col-form-label">Nama Travel</label>
                        <div class="col-sm-10">
                        <input type="text" class="form-control" name="namatravel" id="namatravel" placeholder="masukkan nama jenis travel">
                        </div>
                </div>
                <div class="mb-3 row">
                    <label for="kettravel" class="col-sm-2 col-form-label">Keterangan travel</label>
                        <div class="col-sm-10">
                        <input type="text" class="form-control" name="kettravel" id="kettravel" placeholder="masukkan keterangan jenis travel">
                        </div>
                </div>
                
                <div class="form-group row">
                    <!-- dikasih 2 kolom kosong biar dia geser -->
                    <div class="col-sm-2"></div>
                    <div class="col-sm-10">
                        <input type="submit" class="btn btn-secondary" value="Simpan" name="simpan">
                        <input type="reset" class="btn btn-success" value="Batal" name="batal">
                    </div>
                </div>
                
            </form>
            <br>
            <div class="jumbotron jumbotron-fluid mb-5 row">
                <div class="container">
                    <h1 class="display-4">Daftar Travel</h1>
                </div>
            </div>

            <!-- untuk membuat form pencarian data -->

                <form method = "POST"> 
                    <div class= "form-group row mb-2">
                        <label for="search" class="col-sm-3">Cari nama Travel:</label>
                        <div class="col-sm-6">
                            <input type="text" name ="search" class="form-control" id="search" value="<?php if(isset($_POST["search"])) {echo $_POST["search"];}?>"
                            placeholder="cari nama kaoskaki">
                        </div>
                        <input type="submit" name="kirim" class="col-sm-1 btn btn-primary" value="Search">
                    </div>
                </form>

            <!-- akhir dari pencarian  -->

            <table class="table table-dark table-hover">
                <thead>
                    <tr>
                    <th scope="col">No</th>
                    <th scope="col">Kode Travel</th>
                    <th scope="col">Nama Travel</th>
                    <th scope="col">Keterangan Travel</th>
                    <th colspan="2" style="text-align:center;">Aksi</th>
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
                if (isset ($_POST["kirim"])){
                    $search = $_POST['search'];
                    $query = mysqli_query ($connection, "select detailtravel.* 
                    from detailtravel where travelNAMA LIKE '%".$search."%'");
                }else {
                    //kalau enggak di search jalanin yang else
                    $query = mysqli_query($connection, "select detailtravel.* from detailtravel
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
                        <td><?php echo $row['travelKODE'];?></td>
                        <td><?php echo $row['travelNAMA'];?></td>
                        <td><?php echo $row['travelKET'];?></td>
                        <td width="5px">
                            <a href="detailtraveledit.php?ubah=<?php echo $row["travelKODE"]?>" class="btn btn-success btn-sm" title="EDIT">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                            <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                            <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                            </svg>
                            </a>
                        </td>
                        <td width="5px">
                            <!-- kalau pake ini link nya harus selalu terkoneksi pake internet -->
                            <a href="detailtravelhapus.php?hapus=<?php echo $row["travelKODE"]?>" class="btn btn-danger btn-sm" title="HAPUS">
                            <i class="bi bi-trash"></i>
                            </a>
                        </td>
                        
                   </tr>
            <?php $nomor=$nomor+1; ?>
            <?php }?>  <!-- INI PUNYA PHP JADI HARUS DIAPIT PHP     -->
                </tbody>
                </table>
                <!--------------------- PAGING -- MEMBUAT GANTI HALAMAN ---------------->
                    <?php 
                        $query = mysqli_query($connection, "SELECT * FROM detailtravel");
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
</body>
                    </div>
                </main>
                <?php include 'include/footer.php';?>
            </div>
        </div>
       <?php include 'include/jsscript.php';?>
       <?php ob_end_flush();?>
</html>
