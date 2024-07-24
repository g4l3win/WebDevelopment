<!DOCTYPE html>
<?php 
ob_start();?>
<html lang="en">
    <?php include 'include/head.php';?>
    <body class="sb-nav-fixed">
        <?php include 'include/menunav.php';?>
        <div id="layoutSidenav">
            <?php include 'include/menu.php';?>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">Dashboard kategori</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Dashboard kelola kategori</li>
                        </ol>
                        <?php include 'inputkategori.php';?>
                    </div>
                </main>
                <?php include 'include/footer.php';?>
            </div>
        </div>
       <?php include 'include/jsscript.php';?>
    </body>
    <?php 
        
        //mysqli_close($connection);
        ob_end_flush();
    ?>
</html>
