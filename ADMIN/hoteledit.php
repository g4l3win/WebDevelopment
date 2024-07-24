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
                        <h1 class="mt-4">Dashboard</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Dashboard</li>
                        </ol>
<?php 
include "include/config.php";
//ingin tahu apakah ada atribut yang dikirim di sini. METODE KIRIM bisa POST, GET ATAU REQUEST
if(isset($_POST['edit'])){
    //BIAR G BINGUNG DISAMAIN SAMA ATRIBUT DI DATABASE
    $hotelKODE = $_POST["kodehotel"];
    $hotelNAMA = $_POST["namahotel"];
    $alamathotel = $_POST["alamathotel"];
    $kategoriKODE = $_POST["kodekategori"];//tanda petik boleh 1 atau dua

    //SIMPAN DI TABEL KATEGORI WISATA
    mysqli_query($connection, "update hotel set hotelNAMA = '$hotelNAMA',
    hotelALAMAT = '$alamathotel', kategoriKODE = '$kategoriKODE'
    where hotelKODE='$hotelKODE'");//kalau kuery harus 1 doang
    header("location:hotel.php");//kalau sudah dientri bisa memanggil lagi ke file destinasi.php
    
}
    $datakategori = mysqli_query($connection, "select * from kategoriwisata_a");
    $kodehotel = $_GET['ubah'];
    $edithotel = mysqli_query($connection, "select * from hotel where hotelKODE = '$kodehotel'");
    $rowedit = mysqli_fetch_array($edithotel);

    $editkategori = mysqli_query($connection, "select * from hotel h JOIN kategoriwisata_a k
    ON h.kategoriKODE = k.kategorikode
    where hotelKODE = '$kodehotel'");
    $rowedit2 = mysqli_fetch_array($editkategori);
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
    <!-- form input -->
            <form method="POST">
                <!-- mb 3 itu membuat 3 baris space paling banyak cuma 5-->
                <div class="mb-3 row">
                    <label for="kodehotel" class="col-sm-2 col-form-label">Kode Hotel : </label>
                        <div class="col-sm-10">
                        <input type="text" class="form-control" name="kodehotel" id="kodehotel" maxlength="4"
                        value="<?php echo $rowedit["hotelKODE"];?>" readonly>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="namahotel" class="col-sm-2 col-form-label">Nama Hotel : </label>
                        <div class="col-sm-10">
                        <input type="text" class="form-control" name="namahotel" id="namahotel"
                        value="<?php echo $rowedit["hotelNAMA"];?>">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="alamathotel" class="col-sm-2 col-form-label">Alamat hotel : </label>
                        <div class="col-sm-10">
                        <input type="text" class="form-control" name="alamathotel" id="alamathotel"
                        value="<?php echo $rowedit["hotelALAMAT"];?>">
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="kodekategori" class="col-sm-2 col-form-label">Kode Kategori : </label>
                        <div class="col-sm-10">
                        <select name="kodekategori" class="form-control" id="kodekategori">
                            
                            <option value="<?php echo $rowedit['kategoriKODE'];?>">
                                <?php echo $rowedit['kategoriKODE'];?>
                                 <?PHP echo $rowedit2['kategorinama'];?> 
                            </option>
                            <?php 
                                while($row = mysqli_fetch_array($datakategori))
                                {?>
                                <option value="<?php echo $row['kategorikode'];?>">
                                    <?php echo $row['kategorikode'];?> <!--Pakai nama kolom di tabel database-->
                                    <?php echo $row['kategorinama'];?>
                                    
                                </option>

                               <?php } ?> 
                        </select>
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
                    <th colspan="2" style="text-align:center;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- kode php menampilkan data kalau mau menyisipkan kode php karena isinya dari table, tag html td enggak bisa hilang
            maka si php harus ada diatara tag td. jangan lupa dimana buka dan dimana tutup tag phpnya
            php untuk menampilkan yang ada di dalam tbody-->
            <?php 
                //dipanggil dan disimpan di sebuah array
                //$query = mysqli_query($connection, "select destinasi.* from destinasi");

                if (isset ($_POST["kirim"])){
                    $search = $_POST['search'];
                    $query = mysqli_query ($connection, "select hotel.* 
                    from hotel where hotelNAMA LIKE '%".$search."%'");
                } else if (isset ($_POST["send"])){
                    $cari = $_POST['cari'];
                    $query = mysqli_query ($connection, "select hotel.* 
                    from hotel where hotelALAMAT LIKE '%".$cari."%'");
                }
                else {
                    //kalau enggak di search jalanin yang else
                    $query = mysqli_query($connection, "select hotel.* from hotel");
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
                        <td><?php echo $row['hotelKODE'];?></td>
                        <td><?php echo $row['hotelNAMA'];?></td>
                        <td><?php echo $row['hotelALAMAT'];?></td>
                        <td><?php echo $row['kategoriKODE'];?></td>
                        <td width="5px">
                            <a href="hoteledit.php?ubah=<?php echo $row["hotelKODE"]?>" class="btn btn-success btn-sm" title="EDIT">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                            <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                            <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                            </svg>
                            </a>
                        </td>
                        <td width="5px">
                            <!-- kalau pake ini link nya harus selalu terkoneksi pake internet -->
                            <a href="hotelhapus.php?hapus=<?php echo $row["hotelKODE"]?>" class="btn btn-danger btn-sm" title="HAPUS">
                            <i class="bi bi-trash"></i>
                            </a>
                        </td>
                        
                   </tr>
            <?php $nomor=$nomor+1; ?>
            <?php }?>  <!-- INI PUNYA PHP JADI HARUS DIAPIT PHP     -->
                </tbody>
                </table>
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