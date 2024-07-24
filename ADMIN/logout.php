<?php 
session_start();
$_SESSION["useremail"];
unset($_SESSION["useremail"]);
 session_unset();//menghapus sesi untuk penggunaan. dengan session unset masih ada

 session_destroy();//menghapus file ssion dari server
 header("location:login.php")

?>
