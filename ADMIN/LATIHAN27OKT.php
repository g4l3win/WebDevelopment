<!doctype html>
<html lang="eng" dir="ltr">
<?php
    include "include/config.php";

    if(isset($_POST['simpan'])){
        //data yang dientry dimasukkan ke input kode akan ditampung ke $kategorikode. trus dicek
        //apakah kode kategori itu tidak kosong. kalau ada isi akan ditamputng ke $kategorikode
        //else akan akan muncul keterangan anda harus ngisi data
        
        $kategorikode = $_POST['inputkodeberita'];
        $kategorinama = $_POST['inputnamaberita'];
        $kategoriket = $_POST['inputketberita'];

        mysqli_query($connection, "insert into berita_a values ('$kategorikode', '$kategorinama', '$kategoriket')");

        header("location:LATIHAN27OKT.php");
    }
?>
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.rtl.min.css" integrity="sha384-nU14brUcp6StFntEOOEBvcJm4huWjB0OcIeQ3fltAfSmuZFrkAif0T+UtNGlKKQv" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <title>Hello World!</title>
  </head>
  <body>
    <!-- judul -->
    <div class="p-3 mb-2 bg-secondary text-white" style="font-size:30px; font-weight:bold;">ENTRI DATA KATEGORI BERITA</div>
    <div class="col-sm-1">
        <div class="mb-3 row"></div>   
    </div>
    <div class="col-sm-10">
        <form method="POST">
            <div class="mb-3 row">
                <label for="kodekategori" class="col-sm-3 col-form-label" style="padding-left:40px;text-align:right;"><b >Kode Kategori Berita :</b> </label>
                <div class="col-sm-9">
                <input type="text" class="form-control" id="kodekategori" name="inputkodeberita" placeholder="Kode kategori Berita"
                maxlength="4" >
                </div>
            </div>
            <div class="mb-3 row">
                <label for="namakategori" class="col-sm-3 col-form-label" style="padding-left:40px;text-align:right;" ><b>Nama Kategori Berita: </b></label>
                <div class="col-sm-9">
                <input type="text" class="form-control" id="namakategori" name="inputnamaberita" placeholder="Nama kategori Berita">
                </div>
            </div>
            <div class="mb-3 row">
                <label for="ketkategori" class="col-sm-3 col-form-label" style="padding-left:40px; text-align:right;"><b>Keterangan Kategori Berita: </b></label>
                <div class="col-sm-9">
                <input type="text" class="form-control" id="ketkategori" name="inputketberita" placeholder="Keterangan kategori Berita">
                </div>
            </div>
            
            <!--button-->
            <div class="mb-3 row">
                <div class="col-sm-3 col-form-label" style="padding-left:40px;"> </div>
                <div class="col-sm-9">
                <input type="submit" class="btn btn-primary" value="Simpan" name="simpan">
                <input type="reset" class="btn btn-info" value="Batal" name="batal" style="color:white">
                </div>
            </div>
        </form>
    </div>
    
   
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
    -->
  </body>
</html>