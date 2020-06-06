<?php
$autoid = $_POST['hid'];
$nm = $_POST['nama_paket'];
$jlh = $_POST['jumlah'];

include('includes/connection.php');

$sql = "UPDATE pengunjung SET nama_paket='$nm', jumlah='$jlh' WHERE id_pengunjung='$autoid'";

if(mysql_query($sql))
{
	header('location:pengunjung_admin.php');
}
else
{
	die('Tidak dapat menyimpan data pengunjung: ' .mysql_error());
}
?>