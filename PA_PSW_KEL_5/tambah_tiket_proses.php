<?php 
include 'includes/koneksi.php';

$id = $_POST['id_tiket'];
$stok = $_POST['stok'];
$harga = $_POST['harga'];
$nama = $_POST['nama_paket'];
$date = $_POST['jadwal'];
$date2 = $_POST['jadwal2'];
$gambar = $_POST['gambar'];

include('includes/connection.php');
   
    $sql = "INSERT INTO tiket VALUES('$id', '$stok', '$harga', '$nama', '$date', '$date2', '$gambar')";
    if (mysql_query($sql)) {
        echo "<script>alert('Data tiket $nama berhasil disimpan!'); window.location = 'tiket.php'</script>";	
    }else{
        echo "<script>alert('Data tiket $nama gagal disimpan!'); window.location = 'tambah_tiket.php'</script>";
    }
?>
	