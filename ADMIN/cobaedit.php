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
                        <h1 class="mt-4">Dashboard coba tanggal</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Dashboard Berita</li>
                        </ol>
<?php 
include "include/config.php";
//ingin tahu apakah ada atribut yang dikirim di sini. METODE KIRIM bisa POST, GET ATAU REQUEST
if(isset($_POST['edit'])){
    //BIAR G BINGUNG DISAMAIN SAMA ATRIBUT DI DATABASE
    $kodeberita = $_POST["beritakode"];
    $namaberita = $_POST["namaberita"];
    $ketberita = $_POST["ketberita"];
    $jumlah = $_POST['jumlah'];
    $tanggal = $_POST['tanggal'];

    //SIMPAN DI TABEL KATEGORI WISATA
    mysqli_query($connection, "update berita_a set namaberita = '$namaberita', 
    ketberita ='$ketberita', jumlah = '$jumlah', tanggal = '$tanggal'
    where kodeberita = '$kodeberita'");
    header("location:coba.php");//kalau sudah dientri bisa memanggil lagi ke file awal
    
    
}
    $beritakode = $_GET['ubah'];
    $editberita = mysqli_query($connection, "select * from berita_a 
    where kodeberita = '$beritakode'");
    $rowedit = mysqli_fetch_array($editberita);
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
                    <label for="beritakode" class="col-sm-2 col-form-label">Kode Berita </label>
                        <div class="col-sm-10">
                        <input type="text" class="form-control" name="beritakode" id="beritakode" placeholder="masukkan kode berita"
                        maxlength="4" value ="<?php echo $rowedit["kodeberita"];?>" readonly>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="namaberita" class="col-sm-2 col-form-label">Nama Berita </label>
                        <div class="col-sm-10">
                        <input type="text" class="form-control" name="namaberita" id="namaberita" placeholder="masukkan nama berita"
                        value ="<?php echo $rowedit["namaberita"];?>">
                    </div>
                </div>
                <div class="mb-3 row">
                <label for="ketberita" class="col-sm-2 col-form-label">keterangan berita </label>
                        <div class="col-sm-10">
                        <input type="text" class="form-control" name="ketberita" id="ketberita" placeholder="masukkan keterangan berita"
                        value ="<?php echo $rowedit["ketberita"];?>">
                    </div>
                </div>
                <div class="mb-3 row">
                <label for="jumlah" class="col-sm-2 col-form-label">Jumlah Berita : </label>
                        <div class="col-sm-10">
                        <input type="number" id="jumlah" name="jumlah" min="0" max="10" step="1" class="form-control" 
                        placeholder="masukkan jumlah berita" value ="<?php echo $rowedit["jumlah"];?>">
                    </div>
                </div>
                <div class="mb-3 row">
                <label for="tanggal" class="col-sm-2 col-form-label">tanggal berita : </label>
                        <div class="col-sm-10">
                        <input type="date" id="tanggal" name="tanggal" class="form-control" 
                        placeholder="masukkan tanggal berita" value ="<?php echo $rowedit["tanggal"];?>">
                    </div>
                </div>
                <div class="form-group row">
                    <!-- dikasih 2 kolom kosong biar dia geser -->
                    <div class="col-sm-2"></div>
                    <div class="col-sm-10">
                        <input type="submit" class="btn btn-secondary" value="Ubah" name="edit">
                        <input type="reset" class="btn btn-success" value="Batal" name="batal">
                    </div>
                </div>
                
            </form>
            <br>
            <div class="jumbotron jumbotron-fluid mb-5 row">
                <div class="container">
                    <h1 class="display-4">Hasil Input Tabel Berita</h1>
            </div>
            </div>
            <form method = "POST"> 
                    <div class= "form-group row mb-2">
                        <label for="search" class="col-sm-3">cari nama berita:</label>
                        <div class="col-sm-6">
                            <input type="text" name ="search" class="form-control" id="search" value="<?php if(isset($_POST["search"])) {echo $_POST["search"];}?>"
                            placeholder="cari nama berita">
                        </div>
                        <input type="submit" name="kirim" class="col-sm-1 btn btn-primary" value="Search">
                    </div>
                    <div class= "form-group row mb-2">
                        <label for="cari" class="col-sm-3">Keterangan berita :</label>
                        <div class="col-sm-6">
                            <input type="text" name ="cari" class="form-control" id="cari" value="<?php if(isset($_POST["cari"])) {echo $_POST["cari"];}?>"
                            placeholder="cari kategori berita">
                        </div>
                        <input type="submit" name="send" class="col-sm-1 btn btn-primary" value="Search">
                    </div>
                </form>
            <table class="table table-dark table-hover">
                <thead>
                    <tr>
                    <th scope="col">No</th>
                    <th scope="col">Kode Berita </th>
                    <th scope="col">nama berita</th>
                    <th scope="col">Kategori berita</th>
                    <th scope="col">jumlah berita</th>
                    <th scope="col">tanggal berita</th>
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
                    <!-- kode php menampilkan data kalau mau menyisipkan kode php karena isinya dari table, tag html td enggak bisa hilang
            maka si php harus ada diatara tag td. jangan lupa dimana buka dan dimana tutup tag phpnya
            php untuk menampilkan yang ada di dalam tbody-->
            <?php 
             if (isset ($_POST["kirim"])){
                $search = $_POST['search'];
                $query = mysqli_query ($connection, "select berita_a.* 
                from berita_a where namaberita LIKE '%".$search."%'");
             }
             else if (isset($_POST["send"])){
                $cari = $_POST['cari'];
                $query = mysqli_query($connection, "select berita_a.* 
                from berita_a where ketberita LIKE '%".$cari."%'
                limit $mulaitampilan, $jumlahtampilan");
             }
             else{
                //dipanggil dan disimpan di sebuah array
                $query = mysqli_query($connection, "select berita_a.* from berita_a
                limit $mulaitampilan, $jumlahtampilan");
             }
                
                //inisiasi nomor
                $nomor=1;
                    //mengambil satu satu baris yang ditampung di dalam variabel $row
                while($row = mysqli_fetch_array($query)){

            ?>
                   <tr>

                    <!-- INI YANG BAKAL DIULANG -->
                        <td><?php echo $mulaitampilan + $nomor;?></td>
                        <!-- pad bagian ini ganti dengan $mulaitampilan + $nomor -->
                        <!-- ----------------- AKHIR PAGING -- MEMBUAT GANTI HALAMAN -------------- --> 
                        <td><?php echo $row['kodeberita'];?></td>
                        <td><?php echo $row['namaberita'];?></td>
                        <td><?php echo $row['ketberita'];?></td>
                        <td><?php echo $row['jumlah'];?></td>
                        <td><?php echo $row['tanggal'];?></td>
                        <td width="5px">
                            <a href="cobaedit.php?ubah=<?php echo $row["kodeberita"]?>" class="btn btn-success btn-sm" title="EDIT">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                            <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                            <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                            </svg>
                            </a>
                        </td>
                        <td width="5px">
                            <!-- kalau pake ini link nya harus selalu terkoneksi pake internet -->
                            <a href="cobahapus.php?hapus=<?php echo $row["kodeberita"]?>" class="btn btn-danger btn-sm" title="HAPUS">
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
                $query = mysqli_query($connection, "SELECT * FROM berita_a");
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

</body>
</div>
                </main>
                <?php include 'include/footer.php';?>
            </div>
        </div>
       <?php include 'include/jsscript.php';?>
       <?php ob_end_flush();?>
</html>