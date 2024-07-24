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
                        <h1 class="mt-4">nambah kolom Destinasi</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Kelola nama kolom destinasi</li>
                        </ol>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>FOTO TRAVEL WISATA</title>
  	
	<link rel="stylesheet" type = "text/css" href="bootstrap-5.0.2-dist/css/bootstrap.min.css">
    <link rel="stylesheet" type = "text/css" href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css">
    <!-- ini untuk bootstrap icon sampah -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css" integrity="sha384-b6lVK+yci+bfDmaY1u0zE8YYJt0TZxLEAFyYSLHId4xoVvsrQu3INevFKo+Xir8e" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <!-- link yang kita pakai adalah link css, memberitahu browser bahwa link yang kita panggil adalah css -->
</head>

<?php 
	include "include/config.php";
	if(isset($_POST['Simpan']))
	{
		$kodefoto = $_POST['inputkode'];
		$namafoto = $_POST['inputnama'];
		$keterangandestinasi = $_POST['inputket'];
		$kodekategori = $_POST['kodekategori'];

		$namafile = $_FILES['file']['name'];
		$file_tmp = $_FILES["file"]["tmp_name"];

		$ekstensifile = pathinfo($namafile, PATHINFO_EXTENSION);

		// PERIKSA EKSTEN FILE HARUS JPG ATAU jpg
		if(($ekstensifile == "jpg") or ($ekstensifile == "JPG") or ($ekstensifile == "png"))
		{
			move_uploaded_file($file_tmp, 'images/'.$namafile); //unggah file ke folder images
			mysqli_query($connection, "insert into destinasi values ('$kodefoto', '$namafoto','$kodekategori', '$keterangandestinasi', '$namafile')");
			header("location:destinasi.php");
			echo "Data berhasil dimasukkan!";
		}else {
			echo "Error: " . mysqli_error($connection);
		}

	}

	$datakategori = mysqli_query($connection, "select * from kategoriwisata_a");
	
?>


<body>

<div class="row">
<div class="col-sm-1"></div>

<div class="col-sm-10">

	<form method="POST" enctype="multipart/form-data">
		<div class="form-group mb-3 row">
			<label for="kodefoto" class="col-sm-2 col-form-label">Kode Destinasi </label>
			<div class="col-sm-10">
				<input type="text" class="form-control" id="kodefoto" name="inputkode" placeholder="Kode destinasi" maxlength="4">
			</div>
		</div>

		<div class="form-group mb-3 row">
			<label for="namafoto" class="col-sm-2 col-form-label">Nama Destinasi</label>
			<div class="col-sm-10">
				<input type="text" class="form-control" id="namafoto" name="inputnama" placeholder="Nama Destinasi">
			</div>
		</div>
		

		<div class="form-group mb-3 row">
			<label for="kodekategori" class="col-sm-2 col-form-label">Kode Kategori</label>
			<div class="col-sm-10">
			<select class="form-control" id="kodekategori" name="kodekategori">
				<option>Kode Kategori</option>
				<?php while($row = mysqli_fetch_array($datakategori))
				{ ?>
					<option value="<?php echo $row["kategorikode"]?>">
						<?php echo $row["kategorikode"]?>
						<?php echo $row["kategorinama"]?>
					</option>
				<?php } ?>				

			</select>
			</div>
		</div>
        <div class="form-group mb-3 row">
            <label for="namafoto" class="col-sm-2 col-form-label">Keterangan Destinasi</label>
             <div class="col-sm-10">
                <input type="text" class="form-control" id="namafoto" name="inputket" placeholder="keterangan">
            </div>
        </div>
		
		<div class="form-group mb-3 row">
			<label for="file" class="col-sm-2 col-form-label">Foto destinasi</label>
			<div class="col-sm-10">
				<input type="file" id="file" name="file">
				<p class="help-block">Field ini digunakan untuk unggah file</p>
			</div>
		</div>

		<div class="form-group row">
			<div class="col-sm-2"></div>
			<div class="col-sm-10">
				<input type="submit" name="Simpan" class="btn btn-primary" value="Simpan">
				<input type="submit" name="Batal" class="btn btn-secondary" value="Batal">
			</div>		
		</div>	
	</form>
</div>
<div class="col-sm-1"></div>
</div>
<div class="row">
	<div class="col-sm-1"></div>
	<div class="col-sm-10">
		<div class="jumbotron jumbotron-fluid">
			<div class="container">
				<h1 class="display-4">Daftar Foto destinasi</h1>
			</div>
		</div>

<!-- buat search -->
<form method="POST" class="row mb-3">
            <div class="col-sm-3">
                <label for="search" class="col-form-label">Nama Foto</label>
            </div>
            <div class="col-sm-6">
                <input type="text" name="search" class="form-control" id="search" placeholder="cari nama destinasi"
                value="<?php if(isset($_POST['search'])){
                    echo $_POST['search'];
                }
                    ?>">
            </div>
            <div class="col-sm-3">
                <input type="submit" name="kirim" class="btn btn-primary" value="Search">
            </div>

        </form>
	<table class="table table-hover table-dark">
		<thead class="thead-dark">
			<tr>
				<th>No</th>
				<th>Kode destinasi</th>
				<th>Nama destinasi</th>
				<th>Foto Destinasi</th>
                <th>Keterangan destinasi</th>
				<th>Kode Kategori</th>  
				<th colspan="2" style="text-align: center">Action</th> 
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
			//cari nama foto
			if (isset($_POST["kirim"])){
                $search=$_POST['search'];
                //menampung variabel kuery
                $query=mysqli_query($connection,"select * from destinasi 
				where destinasiNAMA LIKE '%".$search."%'");
			}
				else{
					$query = mysqli_query($connection, "select * from destinasi
					limit $mulaitampilan, $jumlahtampilan");
				}
		
			$nomor = 1;
			while ($row = mysqli_fetch_array($query))
			{ ?>
				<tr>
					<td><?php echo $mulaitampilan + $nomor;?></td>
					<td><?php echo $row['destinasiKODE'];?></td>
					<td><?php echo $row['destinasiNAMA'];?></td>
                    <td><?php echo $row['kategoriKODE'];?></td>
					<td><?php echo $row['destinasiKET'];?></td>
					<td>
						<?php if(is_file("images/".$row['destinasiFOTO']))
						{ ?>
							<img src="images/<?php echo $row['destinasiFOTO']?>" width="80">
						<?php } else
							echo "<img src='images/noimage.png' width='80'>"
						?>
					</td>
					 
					<td>
						<a href="destinasiedit.php?ubah=<?php echo $row['destinasiKODE']?>" class="btn btn-success btn-sm" title="EDIT">
							<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
  							<path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
  							<path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
							</svg>
						</a>
					</td>
					<td>
						<a href="destinasihapus.php?hapus=<?php echo $row['destinasiKODE']?>" class="btn btn-danger btn-sm" title="DELETE">
						<svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-trash" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
  						<path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
  						<path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4L4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
						</svg>
						</a>
					</td>
				</tr>
			<?php $nomor = $nomor + 1;?>
			<?php }	?>
		</tbody>
	</table>
	<!--------------------- PAGING -- MEMBUAT GANTI HALAMAN ---------------->
	<?php 
    	$query = mysqli_query($connection, "SELECT * FROM destinasi");
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

	<div class="col-sm-1"></div>

	
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
<script type="text/javascript" src="bootstrap-5.0.2-dist/js/bootstrap.min.js"></script> 

<script >
        $(document).ready(function(){
            $('#kodekategori').select2({//disesuaikan nama atribut di form
                closeOnSelect:true,
                allowClear:true,
                placeholder:"Pilih destinasi wisata"
            });
        });
		
    </script>

</body>
	 
	<!-- <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script> -->
	
	</div>
                </main>
                <?php include 'include/footer.php';?>
            </div>
        </div>
       <?php include 'include/jsscript.php';?>
  <?php ob_end_flush(); ?>
</html>