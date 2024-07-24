<?php 
include "config.php";
$sql = mysqli_query($connection, "select * from destinasi_a");
$jumlah = mysqli_num_rows($sql);
$sqlkategori = mysqli_query($connection, "select * from kategoriwisata_a");
$jumlahkategori = mysqli_num_rows($sqlkategori);
$sqlhotel = mysqli_query($connection, "select * from hotel");
$jumlahhotel = mysqli_num_rows($sqlhotel);
$sqlkaoskaki = mysqli_query($connection, "select * from kaoskaki");
$jumlahkaoskaki = mysqli_num_rows($sqlkaoskaki);
$sqlberita = mysqli_query($connection, "select * from winni");
$jumlahberita = mysqli_num_rows($sqlberita);
$sqloleh = mysqli_query($connection, "select * from souvenir");
$jumlaholeh = mysqli_num_rows ($sqloleh);
$sqlresto = mysqli_query($connection, "select * from restoran");
$jumlahresto = mysqli_num_rows($sqlresto);
$sqlgambartravel = mysqli_query($connection, "select * from travel");
$jumlahgambartravel = mysqli_num_rows($sqlgambartravel);
$sqltravel = mysqli_query ($connection, "select * from detailtravel");
$jumlahdetailtravel = mysqli_num_rows($sqltravel);
?>
<div class="row">
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-primary text-white mb-4">
                                    <div class="card-body">Jumlah Destinasi Wisata : <?php echo $jumlah?></div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="daftardestinasinew.php">View Details</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-warning text-white mb-4">
                                    <div class="card-body">Jumlah Kategori Wisata : <?php echo $jumlahkategori?></div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="daftarkategori.php">View Details</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-success text-white mb-4">
                                    <div class="card-body">Jumlah hotel : <?php echo $jumlahhotel?></div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="daftarhotel.php">View Details</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-danger text-white mb-4">
                                    <div class="card-body">Jumlah Kaoskaki : <?php echo $jumlahkaoskaki?></div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="daftarkaoskaki.php">View Details</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-primary text-white mb-4">
                                    <div class="card-body">Jumlah Berita Winni : <?php echo $jumlahberita?></div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="daftarberita.php">View Details</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-warning text-white mb-4">
                                    <div class="card-body">Jumlah Oleh-oleh : <?php echo $jumlaholeh?></div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="daftaroleholeh.php">View Details</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-success text-white mb-4">
                                    <div class="card-body">Jumlah Restoran : <?php echo $jumlahresto?></div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="daftarrestoran.php">View Details</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-danger text-white mb-4">
                                    <div class="card-body">Jumlah Foto Travel : <?php echo $jumlahgambartravel?></div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="daftartravel.php">View Details</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-primary text-white mb-4">
                                    <div class="card-body">Jumlah detail Travel : <?php echo $jumlahdetailtravel?></div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="daftardetailtravel.php">View Details</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                        </div>