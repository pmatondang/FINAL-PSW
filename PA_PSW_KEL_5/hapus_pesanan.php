<?php 
    include 'includes/koneksi.php';
    $id = $_GET['id'];
    mysqli_query($koneksi, "DELETE FROM pemesanan WHERE id_pesanan ='$id'");
    header("location:pemesanan.php");

?>