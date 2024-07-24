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
                        <h1 class="mt-4">Kelola Data Restoran</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Input data Restoran</li>
                        </ol>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Restoran</title>
  	
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
		$restoranKODE = $_POST['restoranKODE'];
		$restoranNAMA = $_POST['restoranNAMA'];
		$restoranALAMAT = $_POST['restoranALAMAT'];

		$namafile = $_FILES['file']['name'];
		$file_tmp = $_FILES["file"]["tmp_name"];

		$ekstensifile = pathinfo($namafile, PATHINFO_EXTENSION);

		// PERIKSA EKSTEN FILE HARUS JPG ATAU jpg
		if(($ekstensifile == "jpg") or ($ekstensifile == "JPG") or ($ekstensifile == "png"))
		{
			move_uploaded_file($file_tmp, 'images/'.$namafile); //unggah file ke folder images
			mysqli_query($connection, "insert into restoran value ('$restoranKODE', '$restoranNAMA', '$restoranALAMAT', '$namafile')");
			header("location:restoran.php");
		}

	}

	$datadestinasi = mysqli_query($connection, "select * from restoran");
?>


<body>

<div class="row">
<div class="col-sm-1"></div>

<div class="row">
	<div class="col-sm-1"></div>
	<div class="col-sm-10">
		<div class="jumbotron jumbotron-fluid">
			<div class="container">
				<h1 class="display-4">Daftar Restoran</h1>
			</div>
		</div>

<!-- buat search -->
<form method="POST" class="row mb-3">
            <div class="col-sm-3">
                <label for="search" class="col-form-label">Nama Restoran</label>
            </div>
            <div class="col-sm-6">
                <input type="text" name="search" class="form-control" id="search" placeholder="cari nama restoran"
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
				<th>Kode Restoran</th>
				<th>Nama Restoran</th>
				<th>Alamat Restoran</th>  
				<th>Foto Restoran</th>
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
                $query=mysqli_query($connection,"select * from restoran 
				where restoranNAMA LIKE '%".$search."%'");
			}
				else{
					$query = mysqli_query($connection, "select * from restoran
					limit $mulaitampilan, $jumlahtampilan");
				}
		
			$nomor = 1;
			while ($row = mysqli_fetch_array($query))
			{ ?>
				<tr>
					<td><?php echo $mulaitampilan + $nomor;?></td>
					<td><?php echo $row['restoranKODE'];?></td>
					<td><?php echo $row['restoranNAMA'];?></td>
					<td><?php echo $row['restoranALAMAT'];?></td>  
					<td>
						<?php if(is_file("images/".$row['restoranFOTO']))
						{ ?>
							<img src="images/<?php echo $row['restoranFOTO']?>" width="80">
						<?php } else
							echo "<img src='images/noimage.png' width='80'>"
						?>
					</td>
				</tr>
			<?php $nomor = $nomor + 1;?>
			<?php }	?>
		</tbody>
	</table>
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

	</div>

	<div class="col-sm-1"></div>

	
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>
<script type="text/javascript" src="bootstrap-5.0.2-dist/js/bootstrap.min.js"></script> 

<script >
        $(document).ready(function(){
            $('#namadestinasi').select2({//disesuaikan nama atribut di form
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