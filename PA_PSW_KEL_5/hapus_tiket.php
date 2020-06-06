<?php 
    include 'includes/koneksi.php';
    $id = $_GET['id'];
    mysqli_query($koneksi, "DELETE FROM tiket WHERE id_tiket ='$id'");
    header("location:tiket.php");

?>