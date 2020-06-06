<?php
$autoid = $_POST['hid'];
$nm = $_POST['txtnama_paket'];
$hg = $_POST['txtharga'];
$jam = $_POST['txtjam'];
$kapas = $_POST['txtkap'];

include('includes/connection.php');

$sql = "UPDATE data_jadwal SET nama_paket='$nm', harga='$hg', jam_berangkat='$jam', kapasitas='$kapas' WHERE id_jadwal='$autoid'";

if(mysql_query($sql))
{
	header('location:jadwal.php');
}
else
{
	die('Unable to update record : ' .mysql_error());
}
?>