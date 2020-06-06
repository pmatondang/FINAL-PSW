<?php
$id_pengunjung= $_POST['id_pengunjung'];
$nm= $_POST['nama_paket'];
$jlh= $_POST['jumlah'];

include('includes/connection.php');

$sql = "INSERT INTO pengunjung VALUES('$id_pengunjung','$nm','$jlh')";

if (mysql_query($sql))
{	
	header('location:pengunjung_admin.php');
}
else
{
	echo"Maaf data pengunjung tidak dapat disimpan.";
	echo"<br><a href='add_pengunjung'>Kembali</a>";
}

?>